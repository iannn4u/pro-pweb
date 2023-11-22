<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Kelas';
        $data['kelas'] = Kelas::all();
        $data['guru'] = Guru::all();
        return view('kelas.index', $data);
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
    public function store(StoreKelasRequest $request)
    {
        DB::table('kelas')->insert([
            'nama_kelas' => request('nama_kelas'),
            'kapasitas_kelas' => request('kapasitas_kelas'),
            'jurusan' => request('jurusan'),
            'id_guru' => request('id_guru')
        ]);

        session()->flash('success', 'berhasil menyimpan data');
        return redirect('/kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas, $id_kelas)
    {
        $data['title'] = 'Edit Kelas';
        $data['kelas'] = $kelas->where('id_kelas', $id_kelas)->get();
        $data['guru'] = Guru::all();

        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        $data = [
            'nama_kelas' => request('nama_kelas'),
            'kapasitas_kelas' => request('kapasitas_kelas'),
            'jurusan' => request('jurusan'),
            'id_guru' => request('id_guru')
        ];

        DB::table('kelas')->update($data);

        session()->flash('success', 'berhasil mengedit data');
        return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kelas)
    {
        DB::delete('delete from kelas where id_kelas = ' . $id_kelas);

        session()->flash('success', 'berhasil menghapus data');
        return redirect('/kelas');
    }
}
