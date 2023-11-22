@extends('templates.index')

@section('content')
@php
   $kelas = $kelas[0]
@endphp
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="/kelas/{{ $kelas['id_kelas'] }}" method="post" class="w-50 p-4" style="background: rgba(255, 255, 255, .5)">
            <h1 class="text-center mb-4">Edit Data Kelas</h1>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="X RPL 1" value="{{ old('nama_kelas', $kelas['nama_kelas']) }}">
            </div>
            <div class="mb-3">
                <label for="kapasitas_kelas" class="form-label">Kapasitas Kelas</label>
                <input type="number" class="form-control" id="kapasitas_kelas" name="kapasitas_kelas"
                    placeholder="Kapasitas kelas..." value="{{ old('kapasitas_kelas', $kelas['kapasitas_kelas']) }}">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Nama Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                    <option value="{{ $kelas['jurusan'] }}">{{ $kelas['jurusan'] }}</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Tehnik Audio Video">Tehnik Audio Video</option>
                    <option value="ehnik Kendaraan Ringan">Tehnik Kendaraan Ringan</option>
                    <option value="Tehnik Instalasi Tenaga Listrik">Tehnik Instalasi Tenaga Listrik</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_guru" class="form-label">Nama Guru</label>
                <select class="form-select" id="id_guru" name="id_guru">
                    <option value="{{ $kelas['id_guru'] }}" selected>{{ $kelas->guru->nama_guru }}</option>
                    @foreach ($guru as $g)
                        <option value="{{ $g['id_guru'] }}">{{ $g['nama_guru'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-semibold">Edit</button>
        </form>
    </div>
@endsection
