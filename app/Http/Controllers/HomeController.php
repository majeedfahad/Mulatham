<?php

namespace App\Http\Controllers;

use App\Models\AnswerUser;
use App\Models\Question;
use App\Models\Setting;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $question = Question::where('status', 1)->first();
        $listOfUsers = User::where('role', '<>', 1);
        $users = $listOfUsers->where('status', 1)->get();
        $activeUsers = $listOfUsers->active()->orderBy('score', 'desc')->orderBy('order', 'asc')->get();
        $eliminatedUsers = User::where('status', 0)->get();
        // $winners = $listOfUsers->where('status', 1)->orderBy(DB::raw("`score` + `hidden_score`"), 'desc')->get();
        $winners = User::getWinners();
        return view('home', compact('users','activeUsers', 'eliminatedUsers', 'question', 'winners'));
    }

    public function question($id)
    {
        $question = Question::find($id);
        Gate::authorize('view', $question);
        return view('question', compact('question'));
    }

    public function answerQuestion(Request $request, $question_id)
    {
        try {
            $user = Auth::user();
            $answer = new AnswerUser();
            $answer->user_id = $user->id;
            $answer->question_id = $question_id;


            if($request['answer']) $answer->answer = $request['answer'];

            $answer->answer;
            $answer->answer_id = $request['answer'] ? null : $request['selectedAnswer'];

            $answer->save();

            $answer->assignScore($question_id);
            return redirect()->route('home')->with(['success' => 'فالك الاجابة الصح']);
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->route('home')->with(['success' => 'وصلت إجابتك، فالك التوفيق']);
            }
        }
    }
}
