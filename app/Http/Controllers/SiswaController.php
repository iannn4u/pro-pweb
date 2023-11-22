<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Mapel';
        $data['siswa'] = Siswa::all();
        $data['kelas'] = Kelas::all();
        return view('siswa.index', $data);
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
    public function store(StoreSiswaRequest $request)
    {
        DB::table('siswa')->insert([
            'nis' => request('nis'),
            'nama_siswa' => request('nama_siswa'),
            'tgl_lahir' => request('tgl_lahir'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'no_hp' => request('no_hp'),
            'agama' => request('agama'),
            'id_kelas' => request('id_kelas')
        ]);

        session()->flash('success', 'berhasil menyimpan data');
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $data['title'] = 'Edit Guru';
        $data['siswa'] = $siswa;
        $data['kelas'] = Kelas::all();
        return view('siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $data = [
            'nis' => request('nis'),
            'nama_siswa' => request('nama_siswa'),
            'tgl_lahir' => request('tgl_lahir'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
            'no_hp' => request('no_hp'),
            'agama' => request('agama'),
            'id_kelas' => request('id_kelas')
        ];
        $siswa->update($data);

        session()->flash('success', 'berhasil mengedit data');
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        session()->flash('success', 'berhasil menghapus data');
        return redirect('/siswa');
    }
}
