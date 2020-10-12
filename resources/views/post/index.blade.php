@extends('layouts.app')
@section('title', '投稿ページ')

@section('content')
    <form action="/post" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $authUser->id }}" />

        <div>
            @if($errors->has('title'))
                <p class="error">{{ $errors->first('title') }}</p>
            @endif
            <label>title</label>
            <input
                type="text"
                name="title" 
                value="{{ old('title') }}"
                placeholder="title"
            />
        </div>

        <div>
            @if($errors->has('message'))
                <p class="error">{{ $errors->first('message') }}</p>
            @endif
            <label>message</label>
            <textarea
                name="message"
                placeholder="message"
            >
                {{ old('message') }}
            </textarea>
        </div>

        <div>
            <input type="file" name="thumbnail">
        </div>

        <div>
            <input type="submit" value="create" />
        </div>
    </form>

    @if(count($items) > 0)
        @foreach($items as $item)
            @if($authUser->id === $item->user_id)
                <div>
                    <form action="/post/{{ $item->id }}" method="POST">
                        {{ csrf_field() }}
                        @foreach($users as $user)
                            @if($user->id === $item->user_id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                        <a href="/post/{{ $item->id }}">
                            {{ $item->title }}: {{ $item->message }}
                        </a>
                        @if(!empty($item->image))
                            <img src="/storage/post/{{ $item->image }}">
                        @endif
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="submit" value="delete" /> 
                    </form>
                </div>
            @else
                <div>
                    @foreach($users as $user)
                        @if($user->id === $item->user_id)
                            {{ $user->name }}
                        @endif
                    @endforeach
                    {{ $item->title }}: {{ $item->message }}
                    @if(!empty($item->image))
                        <img src="/storage/post/{{ $item->image }}">
                    @endif
                </div>
            @endif
        @endforeach
    @else
        No Posts
    @endif
@endsection
