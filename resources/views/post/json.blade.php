@extends('layouts.json')
@section('title', '投稿JSON')

@section('content')
    @foreach($items as $item)
        {{ $item }}
    @endforeach
@endsection