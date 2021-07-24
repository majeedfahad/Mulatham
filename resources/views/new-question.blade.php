@if(!Auth::user()->isAdmin() && $question && !Auth::user()->hasAnsweredQuestion($question))
        <div class="col-md-12  alert alert-warning">
            فيه سؤال ينتظر اجابتك! ادخل عليه <a href="{{route('question', ['id' => $question->id])}}">من هنا</a>
        </div>
@endif

@if(Session::has('success'))
        <div class="col-md-12 alert alert-success">
            {{Session::get('success')}}
        </div>
@endif

@if(Session::has('failed'))
        <div class="col-md-12  alert alert-danger ">
            {{Session::get('failed')}}
        </div>
@endif