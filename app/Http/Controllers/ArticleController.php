<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:articles|min:3|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,avif,webp|max:2048',
            'content' => 'required|string|min:3|max:800',
        ]);

        $imageName = uniqid('article_') . '.' . $request->file('image')->getClientOriginalExtension();

        $request->file('image')->storeAs('public/cover_images', $imageName);

        $request->user()->articles()->create(array_merge($validated, ['image' => $imageName]));

        return redirect(route('home'))->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $this->authorize('update', $article);

        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255|unique:articles,title,' . $article->id,
            'image' => 'file|mimes:jpeg,png,jpg,gif,avif,webp|max:2048',
            'content' => 'required|string|min:3|max:800',
        ]);

        if ($request->has('image')) {
            $imagePath = 'public/cover_images/' . $article->image;
            Storage::delete($imagePath);
            $imageName = uniqid('article_') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/cover_images', $imageName);
        } else {
            $imageName = $article->image;
        }

        $article->update(array_merge($validated, ['image' => $imageName]));

        return redirect(route('home'))->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect(route('home'))->with('success', 'Article deleted successfully!');
    }
}
