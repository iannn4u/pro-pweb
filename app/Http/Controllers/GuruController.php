<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Guru';
        $data['guru'] = Guru::orderBy('nama_guru', 'ASC')->get();
        return view('guru.index', $data);
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
    public function store(Request $request)
    {
        DB::table('guru')->insert([
            'nama_guru' => $request->input('nama_guru'),
            'pendidikan_guru' => $request->input('pendidikan_guru'),
            'prodi_guru' => $request->input('prodi_guru')
        ]);

        session()->flash('success', 'berhasil menyimpan data');
        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        $data['title'] = 'Edit Guru';
        $data['guru'] = $guru;
        return view('guru.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $data = [
            'nama_guru' => $request->input('nama_guru'),
            'pendidikan_guru' => $request->input('pendidikan_guru'),
            'prodi_guru' => $request->input('prodi_guru'),
        ];
        $guru->update($data);

        session()->flash('success', 'berhasil mengedit data');
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        session()->flash('success', 'berhasil menghapus data');
        return redirect('/guru');
    }
}
