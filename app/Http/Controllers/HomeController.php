<?php

namespace App\Http\Controllers;

use App\Models\AnswerUser;
use App\Models\Question;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $users = User::where('role', '<>', 1)->get();
        $isStart = Setting::isCompetetionStart();
        return view('home', compact('users', 'isStart'));
    }

    public function question($id)
    {
        $question = Question::find($id);
        Gate::authorize('view', $question);
        return view('question', compact('question'));
    }

    public function answerQuestion(Request $request, $question_id)
    {
        $user = Auth::user();
        // dd($request['answer']);
        $answer = AnswerUser::create([
            'user_id' => $user->id,
            'question_id' => $question_id,
            'answer_id' => $request['selectedAnswer'],
        ]);
        $answer->assignScore($question_id);
        return redirect()->route('home');

    }
}
