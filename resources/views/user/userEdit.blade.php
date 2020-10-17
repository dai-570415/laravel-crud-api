@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="user-page">
    <div class="user-form">
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

            <div class="button">
                <label>
                    <span class="filelabel" title="ファイルを選択">
                        <img src="/img/upload.png" style="margin:0 0 16px 0" width="20" height="20" alt="upload">
                    </span>
                    <input type="file" class="default-file" name="thumbnail">
                </label>
            
                <div class="buttonSet">
                    <input type="submit" name="send" value="変更する">
                    <a href="{{ route('post.index') }}">戻る</a>
                </div>
            </div>
        </form>
    </div>
    <div class="another-user-list">
        <label>その他ユーザー</label>
        @foreach($users as $user)
            <div class="another-user-item">
                @if($authUser->id !== $user->id)
                    @if(!empty($user->thumbnail))
                        <img src="/storage/user/{{ $user->thumbnail }}" alt="{{$user->name}}">
                    @else
                        <img src="/img/noimage.png" alt="{{$user->name}}">
                    @endif
                    <div>
                        <a href="">{{ $user->name }}</a>
                        <h6>{{ $user->email }}</h6>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection