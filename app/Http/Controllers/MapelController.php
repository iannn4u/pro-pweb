<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Http\Requests\StoreMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Mapel';
        $data['mapel'] = Mapel::all();
        $data['guru'] = Guru::all();
        return view('mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapelRequest $request)
    {
        DB::table('mapel')->insert([
            'nama_mapel' => request('nama_mapel'),
            'id_guru' => request('id_guru'),
            'jam_mapel' => request('jam_mapel')
        ]);

        session()->flash('success', 'berhasil menyimpan data');
        return redirect('/mapel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        $data['title'] = 'Edit Guru';
        $data['mapel'] = $mapel;
        $data['guru'] = Guru::all();
        return view('mapel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapelRequest $request, Mapel $mapel)
    {
        $data = [
            'nama_mapel' => request('nama_mapel'),
            'id_guru' => request('id_guru'),
            'jam_mapel' => request('jam_mapel')
        ];
        $mapel->update($data);

        session()->flash('success', 'berhasil mengedit data');
        return redirect('/mapel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        session()->flash('success', 'berhasil menghapus data');
        return redirect('/mapel');
    }
}
