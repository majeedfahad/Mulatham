@if(!Auth::user()->isAdmin() && $question && !Auth::user()->hasAnsweredQuestion($question))
        <div class="col-md-12  alert alert-warning">
            فيه سؤال ينتظر اجابتك! ادخل عليه <a href="{{route('question', ['id' => $question->id])}}">من هنا</a>
        </div>
@endif