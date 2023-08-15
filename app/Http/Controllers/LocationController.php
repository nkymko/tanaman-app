<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Plant;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lokasi.index', [
            'title' => 'Lokasi Tanaman',
            'style' => 'lokasi',
            'locations' => Location::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.create', [
            'title' => 'Tambah Lokasi',
            'style' => 'addLokasi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:55'],
        ]);

        Location::create($validated);

        return redirect(route('locations.index'))->with('success', 'Lokasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $plants = Plant::where('location_id', $location->id)->get();

        return view('tanaman.index', [
            'title' => $location->nama,
            'style' => 'indexTanaman',
            'plants' => $plants,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('lokasi.edit', [
            'title' => 'Edit Data Kategori',
            'style' => 'addKategori',
            'data' => $location
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:55'],
        ]);

        Location::where('id', $location->id)
            ->update($validated);

        return redirect(route('locations.index'))->with('success', 'Data lokasi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        Location::where('id', $location->id)->delete();

        return redirect(route('locations.index'))->with('success', 'Data lokasi berhasil dihapus!');
    }
}
