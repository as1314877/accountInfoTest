@extends('layouts.hw')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form type="get" action="{{ url('/account_info/search') }}" id="searchAccount">
                帳號查詢:
                <input type="text" id="searchAccunt" name="searchAccount">
                <button type="submit" id="subBtn" class="btn btn-primary">查詢</button>
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
                <tbody>
					{{ Log::info("123 IN:") }}
                    @isset($resAccount)
                    @foreach($resAccount as $a)
                    <tr>
                        <td>{{ $a->accoont }}</td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->gender }}</td>
                        <td>{{ $a->birthday }}</td>
                        <td>{{ $a->email }}</td>
                        <td>{{ $a->remark }}</td>
                    </tr>

                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection