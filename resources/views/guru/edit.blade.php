@extends('templates.index')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="/guru/{{ $guru['id_guru'] }}" method="post" class="w-50 p-4" style="background: rgba(255, 255, 255, .5)">
          <h1 class="text-center mb-4">Edit Data Guru</h1>
          @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama guru..." value="{{ old('nama_guru', $guru['nama_guru']) }}">
            </div>
            <div class="mb-3">
                <label for="pendidikan_guru" class="form-label">Pendidikan Guru</label>
                <input type="text" class="form-control" id="pendidikan_guru" name="pendidikan_guru"
                    placeholder="Tingkat pendidikan guru..." value="{{ old('pendidikan_guru', $guru['pendidikan_guru']) }}">
            </div>
            <div class="mb-3">
                <label for="prodi_guru" class="form-label">Prodi Guru</label>
                <input type="text" class="form-control" id="prodi_guru" name="prodi_guru" placeholder="Prodi guru..." value="{{ old('prodi_guru', $guru['prodi_guru']) }}">
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-semibold">Edit</button>
        </form>
    </div>
@endsection
