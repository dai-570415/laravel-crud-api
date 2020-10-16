@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="user-page">
    <div class="thumbnail">
        @if(!empty($authUser->thumbnail))
            <img src="/storage/user/{{ $authUser->thumbnail }}">
        @else
            <img src="/img/noimage.png">
        @endif
    </div>

    <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <input type="hidden" name="user_id" value="{{ $authUser->id }}">
        @if($errors->has('user_id'))<div class="error">{{ $errors->first('user_id') }}</div>@endif

        <div>
            <input type="text" name="name" placeholder="お名前" value="{{ $authUser->name }}">
            @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
        </div>

        <div>
            <input type="file" name="thumbnail">
        </div>

        <div class="buttonSet">
            <input type="submit" name="send" value="変更する">
            <a href="{{ route('post.index') }}">戻る</a>
        </div>
    </form>
</div>
@endsection