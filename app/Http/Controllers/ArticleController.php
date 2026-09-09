<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $articles = $query->latest()->paginate(9)->withQueryString(); // agar filter tetap saat pindah halaman
        $categories = Category::all(); // ambil semua kategori

        return view('articles.index', compact('articles', 'categories'));
    }

    // Tampilkan detail artikel berdasarkan slug
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $categories = Category::all(); // tambahkan ini

        return view('articles.show', compact('article', 'categories'));
    }
}
