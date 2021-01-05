@extends('layouts.hw')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit account</h2>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $err)
						<li>{{ $err }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if (session('success'))
			<div class="alert alert-success">
				Updated Successfully!
			</div>
			@endif
            <form action="{{ route('account_info.update', [$result->account]) }}" method="post">
                @csrf
				@method('put')
                <div class="form-group">
                    <label for="account">帳號</label>
                    <input type="text" class="form-control" id="account" name = "account" value= "{{ old('account', $result->account) }}">
                </div>
                <div class="form-group">
                    <label for="name">姓名</label>
                    <input type="text" class="form-control" id="name" name = "name" value = "{{ old('name', $result->name) }}">
                </div>
                <div >
                    <label for="gender">性別</label>
                    <input name = "gender" type="radio"  id="gender1" value = "male" {{ old('gender', ($result->gender == "male") ? "checked" : "") }}><label>男</label>
                    <input name = "gender" type="radio"  id="gender2" value = "female" {{ old('gender', ($result->gender == "female") ? "checked" : "") }}><label>女</label>
                </div>
                <div class="form-group">
                    <label for="birthday">生日</label>
                    <input type="date" class="form-control" id="birthday" name = "birthday" value = "{{ old('birthday', $result->birthday) }}">
                </div>
                <div class="form-group">
                    <label for="email">信箱</label>
                    <input type="email" class="form-control" id="email" name = "email" value = "{{ old('email', $result->email) }}">
                </div>
                <div class="form-group">
                    <label for="remark">備註</label>
                    <input type="text" class="form-control" id="remark" name = "remark" value = "{{ old('remark', $result->remark) }}">
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
            </form>

			<hr>

			<form action="{{ route('account_info.destroy', [$result->account]) }}" method="post">
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger" onclick="return confirm('確定要刪除嗎?')">刪除</button>
			</form>
        </div>
    </div>
</div>