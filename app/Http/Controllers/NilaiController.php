<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Nilai';
        $data['mapel'] = Mapel::all();
        $data['siswa'] = Siswa::all();
        if(request('search')) {
            $data['nilai'] = Nilai::where('nis', 'like', '%' . request('search') . '%')->orWhere('kelas', 'like', '%' . request('search') . '%')->get();
        } else {
            $data['nilai'] = Nilai::all();
        }
        return view('nilai.index', $data);
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
    public function store(StoreNilaiRequest $request)
    {
        $nilai = Nilai::where('nis', request('siswa'))->first();
        if ($nilai) {
            session()->flash('errors', 'data sudah ada');
            return redirect()->back();
        } elseif(request('mapel') == 0 && request('siswa') == 0) {
            session()->flash('errors', 'pilih data yang sesuai');
            return redirect()->back();
        }
        $mapel = Mapel::where('kd_mapel', request('mapel'))->first();
        $siswa = Siswa::where('nis', request('siswa'))->first();
        DB::table('nilai')->insert([
            'nis' => $siswa->nis,
            'kelas' => $siswa->kelas->nama_kelas,
            'kd_mapel' => $mapel->kd_mapel,
            'kehadiran' => 0,
            'tugas' => 0,
            'formatif' => 0,
            'uts' => 0,
            'uas' => 0,
            'nilai_akhir' => 0,
            'grade' => '',
        ]);

        session()->flash('success', 'berhasil menyimpan data');
        return redirect('/nilai');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $data['title'] = 'Edit Nilai';
        $data['nilai'] = $nilai;

        return view('nilai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNilaiRequest $request, Nilai $nilai)
    {
        $kehadiran = request('kehadiran');
        $hasilkehadiran = ($kehadiran / 14) * 5;

        $nilaitugas = request('tugas');
        $hasiltugas = $nilaitugas * 0.1;

        $nilaiformatif = request('formatif');
        $hasilformatif = $nilaiformatif * 0.15;

        $nilaiuts = request('uts');
        $hasiluts = $nilaiuts * 0.3;

        $nilaiuas = request('uas');
        $hasiluas = $nilaiuas * 0.4;

        $nilaiakhir = $hasilkehadiran + $hasiltugas + $hasilformatif + $hasiluts + $hasiluas;

        $grade = "F";
        if ($nilaiakhir >= 90) {
            $grade = "A";
        } else if ($nilaiakhir >= 82) {
            $grade = "B";
        } else if ($nilaiakhir >= 75) {
            $grade = "C";
        } else if ($nilaiakhir >= 50) {
            $grade = "D";
        }

        $data = [
            'kehadiran' => request('kehadiran'),
            'tugas' => request('tugas'),
            'formatif' => request('formatif'),
            'uts' => request('uts'),
            'uas' => request('uas'),
            'nilai_akhir' => $nilaiakhir,
            'grade' => $grade
        ];
        $nilai->update($data);

        session()->flash('success', 'berhasil mengedit data');
        return redirect('/nilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        session()->flash('success', 'berhasil menghapus data');
        return redirect('/nilai');
    }
}
