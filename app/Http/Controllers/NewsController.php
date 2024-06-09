<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        News::create($request->all());
        return redirect()->route('news.index');

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('news_images', 'public');
            $data['cover_image'] = $path;
        }

        News::create($data);
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return redirect()->route('news.index');

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('news_images', 'public');
            if ($news->cover_image) {
                Storage::disk('public')->delete($news->cover_image);
            }
            $data['cover_image'] = $path;
        }

        $news->update($data);
        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index');

        if ($news->cover_image) {
            Storage::disk('public')->delete($news->cover_image);
        }
        $news->delete();
        return redirect()->route('news.index');
    }
    
}
