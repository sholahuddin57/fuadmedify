<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($request->filled('nama')) {
            $categories->where('nama', 'like', '%' . $request->nama . '%');
        }

        if ($request->filled('kode')) {
            $categories->where('kode', 'like', '%' . $request->kode . '%');
        }

        $categories = $categories->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kode' => 'required|string',
        ]);

        $category = Category::create($request->only('nama', 'kode'));

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::with('items')->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'kode' => 'required|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('nama', 'kode'));

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}

