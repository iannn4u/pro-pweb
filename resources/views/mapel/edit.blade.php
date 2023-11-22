@extends('templates.index')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="/mapel/{{ $mapel['kd_mapel'] }}" method="post" class="w-50 p-4"
            style="background: rgba(255, 255, 255, .5)">
            <h1 class="text-center mb-4">Edit Data Guru</h1>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_mapel" class="form-label">Nama Mapel</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama guru..."
                    value="{{ old('nama_mapel', $mapel['nama_mapel']) }}">
            </div>
            <div class="mb-3">
                <label for="id_guru" class="form-label">Nama Guru</label>
                <select class="form-select" id="id_guru" name="id_guru">
                        <option value="{{ $mapel['id_guru'] }}" selected>{{ $mapel->guru->nama_guru }}</option>
                        @foreach ($guru as $g)
                        <option value="{{ $g['id_guru'] }}">{{ $g['nama_guru'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jam_mapel" class="form-label">Jam Mapel</label>
                <input type="text" class="form-control" id="jam_mapel" name="jam_mapel" placeholder="Prodi guru..."
                    value="{{ old('jam_mapel', $mapel['jam_mapel']) }}">
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-semibold">Edit</button>
        </form>
    </div>
@endsection
