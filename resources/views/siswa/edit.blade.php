@extends('templates.index')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="/siswa/{{ $siswa['nis'] }}" method="post" class="w-50 p-4"
            style="background: rgba(255, 255, 255, .5)">
            <h1 class="text-center mb-4">Edit Data Siswa</h1>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS Siswa..."
                    value="{{ old('nis', $siswa['nis']) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa..."
                    value="{{ old('nama_siswa', $siswa['nama_siswa']) }}">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir Siswa</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir Siswa..."
                    value="{{ old('tgl_lahir', $siswa['tgl_lahir']) }}">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin Siswa</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="{{ $siswa['jenis_kelamin'] }}">{{ $siswa['jenis_kelamin'] }}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <textarea class="form-control" placeholder="Alamat Siswa..." id="alamat" name="alamat">{{ $siswa['alamat'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Telepon Siswa</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp"
                    placeholder="No Telepon Siswa..." value="{{ old('no_hp', $siswa['no_hp']) }}">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama Siswa</label>
                <select class="form-select" id="agama" name="agama">
                    <option value="{{ $siswa['agama'] }}">{{ $siswa['agama'] }}</option>
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Khonghucu">Konghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <select class="form-select" id="id_kelas" name="id_kelas">
                    <option value="{{ $siswa['id_kelas'] }}">{{ $siswa->kelas->nama_kelas }}</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k['id_kelas'] }}">{{ $k['nama_kelas'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-semibold">Edit</button>
        </form>
    </div>
@endsection
