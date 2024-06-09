@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('faqs.create') }}">Create New FAQ</a>
    <ul>
        @foreach($faqs as $faq)
            <li>
                <a href="{{ route('faqs.show', $faq->id) }}">{{ $faq->question }}</a>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
