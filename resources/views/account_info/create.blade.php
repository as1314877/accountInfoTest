@extends('layouts.hw')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Create account</h2>
            @if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $err)
						<li>{{ $err }}</li>
					@endforeach
				</ul>
			</div>
			@endif

            <form action="{{ route('account_info.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="account">帳號</label>
                    <input type="text" class="form-control" id="account" name = "account">
                </div>
                <div class="form-group">
                    <label for="name">姓名</label>
                    <input type="text" class="form-control" id="name" name = "name">
                </div>
                <div >
                    <label for="gender">性別</label>
                    <input name = "gender" type="radio"  id="gender1" value = "male"><label>男</label>
                    <input name = "gender" type="radio"  id="gender2" value = "female"><label>女</label>
                </div>
                <div class="form-group">
                    <label for="birthday">生日</label>
                    <input type="date" class="form-control" id="birthday" name = "birthday">
                </div>
                <div class="form-group">
                    <label for="email">信箱</label>
                    <input type="email" class="form-control" id="email" name = "email">
                </div>
                <div class="form-group">
                    <label for="remark">備註</label>
                    <input type="text" class="form-control" id="remark" name = "remark">
                </div>
                <button type="submit" class="btn btn-primary">新增</button>
            </form>
        </div>
    </div>
</div>