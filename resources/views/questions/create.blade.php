@extends('layouts.app')

@section('content')
    <div class="container text-right">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h1>إنشاء سؤال</h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('settings.questions.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h2>اكتب السؤال</h2>
                                <input type="text" name="question" class="form-control">
                            </div>
                            <div class="form-group">
                                <h2>Answer Option</h2>
                                <select name="answer_option" id="" class="form-control">
                                    <option value="1">نصي</option>
                                    <option value="2">خيارات</option>
                                </select>
                            </div>
                            <div class="form-group options-answer disabled">
                                <div class="row p-1">
                                    <div class="col-md-6 col-xs-12 mt-4">
                                        <label for="opt-1">الخيار الأول</label>
                                        <input type="text" name="opt-1" id="" class="form-control">
                                        <input type="radio" name="correct_answer" id="" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12 mt-4">
                                        <label for="opt-2">الخيار الثاني</label>
                                        <input type="text" name="opt-2" id="" class="form-control">
                                        <input type="radio" name="correct_answer" id="" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12 mt-4">
                                        <label for="opt-3">الخيار الثالث</label>
                                        <input type="text" name="opt-3" id="" class="form-control">
                                        <input type="radio" name="correct_answer" id="" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12 mt-4">
                                        <label for="opt-4">الخيار الرابع</label>
                                        <input type="text" name="opt-4" id="" class="form-control">
                                        <input type="radio" name="correct_answer" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h2>Score</h2>
                                <input type="number" name="score" class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <h2>User Groups</h2>
                                @foreach ($groups as $group)
                                    <label><input type="checkbox" name="groups[]" id="groups" value="{{$group->id}}">  {{$group->name}}</label>
                                @endforeach
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection