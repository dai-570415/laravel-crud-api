@extends('layouts.json')
@section('title', 'ユーザーJSON')

@section('content')
    @foreach($items as $item)
        {{ $item }}
    @endforeach
@endsection