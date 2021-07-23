@extends('layouts.app')
<link rel="stylesheet" href="css/homeStyle.css">

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

                    @if ($isStart)
                    <div class="circle2"></div>
    <div class="circle1"></div>
    <img src="imgs/logo.png" class="myBg">
    <div class="col-12 p-0 rounded rounded-lg-0 my-2" id="myTable">
        <div id="table_header" class="row text-center d-flex align-content-center" dir="rtl">
            <div class="col-2">#</div>
            <div class="col-5">اليحياوي</div>
            <div class="col-2">النقاط</div>
            <div class="col-3">اقصاء</div>
        </div>

        <!-- لوب هنا يا وحش -->
        <div id="table_row" class="row text-center d-flex align-content-center" dir="rtl">
            <div class="col-2">1</div>
            <div class="col-5">يزييديددديددد</div>
            <div class="col-2">45</div>
            <div class="col-3"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#exampleModal" data-whatever="selectedName" style="background-color: #b5def5; color: black; border: none;">اقصاء</button></div>
                                                {{-- data-whatever -> Fake Name selected --}}
        </div>
        
        <!-- Modal "ما عليك منها لا تلمسها الا اذا تبي تعدل الفورم" -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('whatever') 
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
                    @else
                    <div class="circle2"></div>
                    <div class="circle1"></div>
                    <img src="imgs/logo.png" class="myBg">
                    <div class="col-12 offset-1 align-self-center p-2 rounded rounded-lg-0 mt-3 ml-0">
                        <h2 class="d-flex d-sm-flex justify-content-center text-info font-weight-light mb-2"><img class="d-flex justify-content-sm-center" src="imgs/logo.png" style="height: 200px;"></h2>
                        <h2 class="text-center text-white">هلا باليحياوي! ننتظر باقي المتسابقين</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
