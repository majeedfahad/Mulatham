@extends('layouts.app')


@section('content')
    <div class="container">

        @push('background')
            <div class="circle2"></div>
            <div class="circle1"></div>
            <img src="{{asset('imgs/logo.png')}}" class="myBg">
        @endpush

        <div class="col-12 offset-1 align-self-center p-2 rounded rounded-lg-0 mt-3 ml-0">
            <form action="{{route('answerQuestion', ['id' => $question->id])}}" method="POST">
                @csrf
                <div class="text-center">
                    <h3 class="question">{{$question->title}}</h3>
                </div>

                @if ($question->isText())
                    <div>
                        <input type="text" name="answer" id="" class="border rounded border-info shadow form-control">
                    </div>
                @else
                    @foreach ($question->answers as $answer)
                        <button class="btn btn-info" id="{{$answer->id}}" type="button" onclick="getAnswer(this)">{{$answer->title}}</button>
                    @endforeach
                    <input type="hidden" name="selectedAnswer" value="0" id="answer">
                @endif
            
                <input type="submit" value="إرسال" class="btn btn-primary">
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            var selectedAnswer = 0;
            function getAnswer(evt) {
                selectedAnswer = evt.id
                $('#answer').val(selectedAnswer);
                console.log($('#answer').val());
            }

        </script>
    @endpush
@endsection
