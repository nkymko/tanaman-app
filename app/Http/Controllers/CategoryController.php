<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index', [
            'title' => 'Kategori Tanaman',
            'style' => 'kategori',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create', [
            'title' => 'Tambah Kategori',
            'style' => 'addKategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:55'],
        ]);

        Category::create($validated);

        return redirect(route('categories.index'))->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $plants = Plant::where('category_id', $category->id)->get();

        return view('tanaman.index', [
            'title' => $category->nama,
            'style' => 'indexTanaman',
            'plants' => $plants,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('kategori.edit', [
            'title' => 'Edit Data Kategori',
            'style' => 'addKategori',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:55'],
        ]);

        Category::where('id', $category->id)
            ->update($validated);

        return redirect(route('plants.index'))->with('success', 'Data kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect(route('categories.index'))->with('success', 'Kategori berhasil dihapus!');
    }
}
