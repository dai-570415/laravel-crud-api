@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<div class="users-page">
  <table>
    <thead>
    <tr>
      <th></th>
      <th>ID</th>
      <th>名前</th>
      <th>メールアドレス</th>
      <th></th>
    </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
      <tr>
        <td>
          @if(!empty($user->thumbnail))
            <img src="/storage/user/{{ $user->thumbnail }}" class="user-thumb">
          @else
            <img src="/img/noimage.png" class="user-thumb">
          @endif
        </td>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if($authUser->id === $user->id)
            <a href="{{ route('user.userEdit') }}" class="edit-button">
              <img src="/img/edit.png" class="edit-icon">
            </a>
          @endif
        </td>     
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endsection