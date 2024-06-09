@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->username }}'s Profile</h1>
    <p>Birthday: {{ $user->birthday }}</p>
    <p>About me: {{ $user->about_me }}</p>
    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="width:150px;height:150px;">
</div>
@endsection
