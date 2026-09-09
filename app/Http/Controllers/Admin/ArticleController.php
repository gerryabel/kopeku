<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $categoryId = $request->input('category_id');

        $articles = Article::with(['admin', 'category'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($categoryId, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(10)
            ->appends([
                'search' => $search,
                'category_id' => $categoryId,
            ]);

        // Mengirim juga daftar kategori untuk dropdown filter di view
        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('articles', 'public')
            : null;

        Article::create([
            'title'    => $request->title,
            'slug'     => Str::slug($request->title),
            'content'  => $request->content,
            'image'    => $imagePath,
            'category_id' => $request->category_id,
            'admin_id' => auth()->id(),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|image|max:2048',
        ]);

        $data = [
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
