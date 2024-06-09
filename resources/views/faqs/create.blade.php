@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create FAQ</h1>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div>
            <label>Question</label>
            <input type="text" name="question">
        </div>
        <div>
            <label>Answer</label>
            <textarea name="answer"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
