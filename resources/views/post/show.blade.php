@extends('layouts.app')
@section('title', '詳細')

@section('content')
<div class="posts-page">
    <label>エディット</label>
    @if($item !== '')
        <div class="list-item">
            <form action="/post/{{$item->id}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $authUser->id }}" />
                <div>
                    <input
                        type="text"
                        name="title" 
                        value="{{ $item->title }}"
                        placeholder="タイトルを入力..."
                    />
                </div>

                <div>
                    <textarea
                        name="message"
                        placeholder="メッセージを入力..."
                    >{{ $item->message }}</textarea>
                </div>
                
                <div class="button">
                    <label>
                        <span class="filelabel" title="ファイルを選択">
                            <img src="/img/upload.png" width="20" height="20" alt="upload">
                        </span>
                        <input type="file" class="default-file" name="thumbnail">
                    </label>
                    <div>
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="submit" class="post-button" value="編集する" />
                        <a href="/post">戻る</a>
                    </div>
                </div>
                @if(!empty($item->image))
                    <img src="/storage/post/{{ $item->image }}" style="width:100%;">
                @endif
            </form>
        </div>
    @endif
</div>
@endsection