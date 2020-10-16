@extends('layouts.app')
@section('title', '詳細')

@section('content')
<div class="posts-page">
    @if($item !== '')
        {{ $item->title }}: {{ $item->message }}
        @if(!empty($item->image))
            <img src="/storage/post/{{ $item->image }}">
        @endif

        <form action="/post/{{$item->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $authUser->id }}" />
            <div>
                <label>title</label>
                <input
                    type="text"
                    name="title" 
                    value="{{ $item->title }}"
                    placeholder="title"
                />
            </div>

            <div>
                <label>message</label>
                <textarea
                    name="message"
                    placeholder="message"
                >{{ $item->message }}</textarea>
            </div>

            <div>
                <input type="file" name="thumbnail">
            </div>
            
            <div>
                <input type="hidden" name="_method" value="PUT" />
                <input type="submit" value="update" />
            </div>
        </form>
    @endif

    <a href="/post">Back</a>
</div>
@endsection