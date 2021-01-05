@extends('layouts.hw')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myCreate">新增</button>
            <a type="button" href="/search" class="btn btn-info">查詢</a>
            <div class="modal" id="myCreate">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('account_info.store') }}" method="post" id="createAccount">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">新增帳號</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                @csrf
                                <div class="form-group">
                                    <label for="account">帳號</label>
                                    <input type="text" class="form-control " id="account" name="account">
                                </div>
                                <div class="form-group">
                                    <label for="name">姓名</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div>
                                    <label for="gender">性別</label>
                                    <input name="gender" type="radio" id="gender1" value="male"><label>男</label>
                                    <input name="gender" type="radio" id="gender2" value="female"><label>女</label>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">生日</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                </div>
                                <div class="form-group">
                                    <label for="email">信箱</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="remark">備註</label>
                                    <input type="text" class="form-control" id="remark" name="remark">
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" id="subBtn" class="btn btn-primary">新增</button>
                                <button type="button" class="createButtoon btn btn-danger" data-dismiss="modal">關閉</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @foreach ($data as $account)
            <div class="card">
                <div class="card-header">
                    {{ $account->account }} / {{ $account->name }} / {{ $account->gender }} / {{ $account->birthday }} /
                    {{  $account->email }}
                    <button onClick="getEditData({{ $account }})" class="btn btn-success" data-toggle="modal" data-target="#myEdit">編輯</button>
                    <button onClick="getDeleteData({{ $account }})" class="btn btn-warning" data-toggle="modal" data-target="#myDelete">刪除</button>
                </div>

                <div class="card-body">
                    {{  $account->remark }}
                </div>
            </div>
            @endforeach
            <hr>
            {{ $data->render() }}
            <div class="modal" id="myEdit">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form>
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">編輯帳號</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                @csrf
                                <div class="form-group">
                                    <label for="account">帳號: </label>
                                    <input type="text" class="form-control" id="edit_account" name="edit_account">
                                </div>
                                <div class="form-group">
                                    <label for="name">姓名: </label>
                                    <input type="text"  class="form-control" id="edit_name" name="edit_name">
                                </div>
                                <div>
                                    <label for="gender">性別: </label>
                                    <input name="gender" type="radio" id="edit_gender1" value="male"><label>男</label>
                                    <input name="gender" type="radio" id="edit_gender2" value="female"><label>女</label>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">生日: </label>
                                    <input type="date" class="form-control" id="edit_birthday" name="edit_birthday">
                                </div>
                                <div class="form-group">
                                    <label for="email">信箱: </label>
                                    <input type="email" class="form-control" id="edit_email" name="edit_email">
                                </div>
                                <div class="form-group">
                                    <label for="remark">備註: </label>
                                    <input type="text" class="form-control" id="edit_remark" name="edit_remark">
                                </div>


                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onClick="updateAccountInfo()">修改</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal" id="myDelete">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form>
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">刪除帳號</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
								@csrf

								<label id="askDeleteAccoounnt" name="askDeleteAccoounnt">你確定要刪除此帳號嗎?</label>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onClick="deleteAccountInfo()">刪除</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection