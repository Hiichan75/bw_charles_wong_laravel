@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Message</label>
            <textarea name="message" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</div>
@endsection
