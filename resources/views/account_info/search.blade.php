@extends('layouts.hw')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>
                帳號查詢:
                <input type="text" id="account" name="account">
                <button type="button" onClick="searchAccount()" id="subBtn" class="btn btn-primary">查詢</button>
            </form>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>帳號</th>
                        <th>姓名</th>
                        <th>性別</th>
                        <th>生日</th>
                        <th>信箱</th>
                        <th>備註</th>
                    </tr>
                </thead>
                <tbody id="searchItem">
				</tbody>
            </table>
        </div>
    </div>
</div>
@endsection