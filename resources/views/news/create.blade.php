@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create News Post</h1>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Content</label>
            <textarea name="content"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
