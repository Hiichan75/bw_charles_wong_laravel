@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <p><strong>Username:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Birthday:</strong> {{ $user->birthday ?? 'N/A' }}</p>
                    <p><strong>Biography:</strong> {{ $user->bio ?? 'N/A' }}</p>
                    <p><strong>Avatar:</strong></p>
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="max-width: 150px;">
                    @else
                        <p>No avatar uploaded.</p>
                    @endif
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
