@extends('layouts.app')
@section('title', 'ツイート')

@section('content')
<div class="posts-page">
    <label>ツイート</label>
    <form action="/post" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $authUser->id }}" />

        <div>
            <input
                type="text"
                name="title" 
                value="{{ old('title') }}"
                placeholder="タイトルを入力..."
            />
            @if($errors->has('title'))
                <p class="error">{{ $errors->first('title') }}</p>
            @endif
        </div>

        <div>
            <textarea
                name="message"
                placeholder="メッセージを入力..."
            >
                {{ old('message') }}
            </textarea>
            @if($errors->has('message'))
                <p class="error">{{ $errors->first('message') }}</p>
            @endif
        </div>

        <div class="button">
            <label>
                <span class="filelabel" title="ファイルを選択">
                    <img src="/img/upload.png" width="20" height="20" alt="upload">
                </span>
                <input type="file" class="default-file" name="thumbnail">
            </label>
            <input type="submit" class="post-button" value="投稿する" />
        </div>
    </form>

    <div class="list">
        @if(count($items) > 0)
            @foreach($items as $item)
                @if($authUser->id === $item->user_id)
                    <div class="list-item">
                        <form action="/post/{{ $item->id }}" method="POST">
                            {{ csrf_field() }}

                            <div class="post-upper">
                                @foreach($users as $user)
                                    @if($user->id === $item->user_id)
                                        <a href="{{ route('user.userEdit') }}">
                                        @if(!empty($user->thumbnail))
                                            <img
                                                src="/storage/user/{{ $user->thumbnail }}"
                                                class="user-thumbnail"
                                            >
                                        @else
                                            <img
                                                src="/img/noimage.png"
                                                class="user-thumbnail"
                                            >
                                        @endif
                                        </a>
                                    @endif
                                @endforeach
                                <div class="post-text">
                                    <div class="post-text-title">
                                        <a href="/post/{{ $item->id }}">{{ $item->title }}</a>
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <input type="submit"　class="delete" value="×" /> 
                                    </div>
                                    <h6>
                                        @foreach($users as $user)
                                            @if($user->id === $item->user_id)
                                                &#64;{{ $user->name }}
                                            @endif
                                        @endforeach
                                    </h6>
                                    <p>{{ $item->message }}</p>
                                </div>
                            </div>
                            
                            @if(!empty($item->image))
                                <img src="/storage/post/{{ $item->image }}" class="post-image">
                            @endif
                        </form>
                    </div>
                @else
                    <div class="list-item">
                        <div class="post-upper">
                        @foreach($users as $user)
                            @if($user->id === $item->user_id)
                                @if(!empty($user->thumbnail))
                                    <img
                                        src="/storage/user/{{ $user->thumbnail }}"
                                        class="user-thumbnail"
                                    >
                                @else
                                    <img
                                        src="/img/noimage.png"
                                        class="user-thumbnail"
                                    >
                                @endif
                            @endif
                        @endforeach
                            <div class="post-text">
                                <div class="post-text-title">
                                    {{ $item->title }}
                                </div>
                                <h6>
                                    @foreach($users as $user)
                                        @if($user->id === $item->user_id)
                                            &#64;{{ $user->name }}
                                        @endif
                                    @endforeach
                                </h6>
                                <p>{{ $item->message }}</p>
                            </div>
                        </div>
                        @if(!empty($item->image))
                            <img src="/storage/post/{{ $item->image }}" class="post-image">
                        @endif
                    </div>
                @endif
            @endforeach
        @else
            No Posts
        @endif
    </div>
</div>
@endsection
