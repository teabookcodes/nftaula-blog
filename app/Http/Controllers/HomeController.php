<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'articles' => Article::with('user')->latest()->get(),
        ]);
    }

    public function show(Article $article): View
    {
        return view('show-article', [
            'article' => $article,
        ]);
    }
}
