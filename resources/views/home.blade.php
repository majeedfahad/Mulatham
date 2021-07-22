@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right"> <h2>قائمة اليحياويين</h2> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover" id="reports" style="direction: rtl">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 40%">اليحياوي</th>
                                <th style="width: 40%">النقاط</th>
                                <th style="width: 10%">إقصاء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fakename}}</td>
                                    <td>{{$user->score}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
