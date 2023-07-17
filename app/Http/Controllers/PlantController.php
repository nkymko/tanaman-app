<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tanaman.index', [
            'title' => 'Data Tanaman',
            'style' => 'indexTanaman',
            'plants' => Plant::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tanaman.create', [
            'title' => 'Tambah Data Tanaman',
            'style' => 'addTanaman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlantRequest $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:255'],
            'khasiat' => ['required', 'max:255'],
            'latin' => ['required', 'max:255'],
            'thumbnail' => ['required', 'image', 'file', 'max:5120']
        ]);

        $validated['uniqid'] = uniqid('tanaman_');
        if ($request->file('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('tanaman/' . $validated['uniqid']);
        }

        Plant::create($validated);

        return redirect(route('plants.index'))->with('success', 'Data tanaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        return view('tanaman.detail', [
            'title' => 'Detail Tanaman',
            'style' => 'detailTanaman',
            'data' => $plant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        return view('tanaman.edit', [
            'title' => 'Edit Data Tanaman',
            'style' => 'addTanaman',
            'data' => $plant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantRequest  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlantRequest $request, Plant $plant)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:255'],
            'khasiat' => ['required', 'max:255'],
            'latin' => ['required', 'max:255'],
            'thumbnail' => ['required', 'image', 'file', 'max:5120']
        ]);

        if ($request->file('thumbnail')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('tanaman/' . $plant->uniqid);
        }

        Plant::where('id', $plant->id)
            ->update($validated);
        
        return redirect(route('plants.index'))->with('success', 'Data tanaman berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        if($plant->thumbnail){
            Storage::deleteDirectory('tanaman/' . $plant->uniqid);
        }
        Plant::where('id', $plant->id)->delete();

        return redirect(route('plants.index'))->with('success', 'Data tanaman berhasil dihapus!');
    }
}
