@extends('templates.index')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="/nilai/{{ $nilai['id_nilai'] }}" method="post" class="w-50 p-4"
            style="background: rgba(255, 255, 255, .5)">
            <h1 class="text-center mb-4">Edit Data Nilai</h1>
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" placeholder="Nama siswa..."
                    value="{{ $nilai->siswa->nama_siswa }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kehadiran" class="form-label">Kehadiran</label>
                <input type="number" class="form-control" id="kehadiran" name="kehadiran" placeholder="Jumlah kehadiran..."
                    value="{{ old('kehadiran', $nilai['kehadiran']) }}" max="14">
            </div>
            <div class="mb-3">
                <label for="tugas" class="form-label">Tugas</label>
                <input type="number" class="form-control" id="tugas" name="tugas" placeholder="Nilai tugas..."
                    value="{{ old('tugas', $nilai['tugas']) }}" max="100">
            </div>
            <div class="mb-3">
                <label for="formatif" class="form-label">Formatif</label>
                <input type="number" class="form-control" id="formatif" name="formatif" placeholder="Nilai formatif..."
                    value="{{ old('formatif', $nilai['formatif']) }}" max="100">
            </div>
            <div class="mb-3">
                <label for="uts" class="form-label">UTS</label>
                <input type="number" class="form-control" id="uts" name="uts" placeholder="Nilai UTS..."
                    value="{{ old('uts', $nilai['uts']) }}" max="100">
            </div>
            <div class="mb-3">
                <label for="uas" class="form-label">UAS</label>
                <input type="number" class="form-control" id="uas" name="uas" placeholder="Nilai UAS..."
                    value="{{ old('uas', $nilai['uas']) }}" max="100">
            </div>
            <button type="submit" class="btn btn-info w-100 text-white fw-semibold">Edit</button>
        </form>
    </div>
@endsection
