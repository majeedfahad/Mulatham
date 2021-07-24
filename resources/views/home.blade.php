@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card-header text-right">
            <h2>قائمة اليحياويين</h2>
        </div>

        @push('background')
            <div class="circle2"></div>
            <div class="circle1"></div>
            <img src="imgs/logo.png" class="myBg">
        @endpush
        @if ($isStart)
            <div class="col-12 p-0 rounded rounded-lg-0 my-2" id="myTable">
                <div id="table_header" class="row text-center d-flex align-content-center" dir="rtl">
                    <div class="col-2">#</div>
                    <div class="col-5">اليحياوي</div>
                    <div class="col-2">النقاط</div>
                    <div class="col-3">اقصاء</div>
                </div>

                <!-- لوب هنا يا وحش -->
                @foreach ($users as $user)
                <div id="table_row" class="row text-center d-flex align-content-center" dir="rtl">
                    <div class="col-2">{{$user->id}}</div>
                    <div class="col-5">{{$user->fakename}}</div>
                    <div class="col-2">{{$user->score}}</div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="selectedName"
                            style="background-color: #b5def5; color: black; border: none;">اقصاء</button>
                    </div>
                    {{-- data-whatever -> Fake Name selected --}}
                </div>
                @endforeach

                <!-- Modal "ما عليك منها لا تلمسها الا اذا تبي تعدل الفورم" -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" dir="rtl">
                                <form>
                                    <div class="form-group text-right" dir="rtl">
                                        <label for="recipient-name" class="col-form-label">المتهم:</label>
                                        <input type="text" class="form-control" id="selectedId" name="fakeId" disabled>
                                    </div>
                                    <div class="form-group text-right">
                                        <label for="message-text" class="col-form-label">اسمه:</label>
                                        <select name="nameId" class="form-control">
                                            <option value="1">يزيد الطويل</option>
                                            <option value="2">مجيد</option>
                                            <option value="3">سارة الطويل</option>
                                            <option value="4">يزيد الطويل</option>
                                        </select>
                                        {{-- loop for all users --}}
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" dir="rtl">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="button" class="btn btn-primary">اتهام</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @push('scripts')
                <script>
                    $(document).ready(function() {
                    $('#exampleModal').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var recipient = button.data('whatever')
                        var modal = $(this)
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    })
                    })
                </script>
            @endpush
        @else
            <div class="col-12 offset-1 align-self-center p-2 rounded rounded-lg-0 mt-3 ml-0">
                <h2 class="d-flex d-sm-flex justify-content-center text-info font-weight-light mb-2"><img
                        class="d-flex justify-content-sm-center" src="imgs/logo.png" style="height: 200px;"></h2>
                <h2 class="text-center text-white">هلا باليحياوي! ننتظر باقي المتسابقين</h2>
            </div>
        @endif
    </div>
@endsection
