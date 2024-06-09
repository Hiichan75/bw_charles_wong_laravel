@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ $user->username }}">
        </div>
        <div>
            <label>Birthday</label>
            <input type="date" name="birthday" value="{{ $user->birthday }}">
        </div>
        <div>
            <label>About Me</label>
            <textarea name="about_me">{{ $user->about_me }}</textarea>
        </div>
        <div>
            <label>Avatar</label>
            <input type="file" name="avatar">
        </div>
        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection
