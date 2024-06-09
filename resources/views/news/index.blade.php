@extends('layouts.app')

@section('content')
<div class="container">
    <h1>News</h1>
    <a href="{{ route('news.create') }}">Create New Post</a>
    <ul>
        @foreach($news as $news_item)
            <li>
                <a href="{{ route('news.show', $news_item->id) }}">{{ $news_item->title }}</a>
                <form action="{{ route('news.destroy', $news_item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
