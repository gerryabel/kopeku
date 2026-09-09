<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index(Request $request)
    {
        $query = Breed::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $breeds = $query->orderBy('name')->paginate(10);

        $breeds->appends($request->only('search'));

        return view('admin.breeds.index', compact('breeds'));
    }

    public function create()
    {
        return view('admin.breeds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:breeds,name',
        ]);

        Breed::create($request->only('name'));

        return redirect()->route('admin.breeds.index')->with('success', 'Jneis kucing berhasil ditambahkan.');
    }

    public function edit(Breed $breed)
    {
        return view('admin.breeds.edit', compact('breed'));
    }

    public function update(Request $request, Breed $breed)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:breeds,name,' . $breed->id,
        ]);

        $breed->update($request->only('name'));

        return redirect()->route('admin.breeds.index')->with('success', 'Jneis kucing berhasil diupdate.');
    }

    public function destroy(Breed $breed)
    {
        $breed->delete();
        return redirect()->route('admin.breeds.index')->with('success', 'Jneis kucing berhasil dihapus.');
    }
}
