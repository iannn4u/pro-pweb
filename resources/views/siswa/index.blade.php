@extends('templates.index')

@section('content')
    <div style="max-width: 80%;margin: 0 auto;">
        <h1 class="my-3 fw-semibold text-center">Data Siswa</h1>
        <button class="btn btn-secondary float-end mb-2" data-bs-toggle="modal" data-bs-target="#siswa">Tambah Siswa</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No Telepon</th>
                    <th class="text-center">Jurusan</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @empty(count($siswa) != 0)
                    <tr>
                        <th colspan="11">Tidak ada data siswa.</th>
                    </tr>
                @endempty
                @if ($siswa)
                    @foreach ($siswa as $s)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $s['nis'] }}</td>
                            <td class="text-center">{{ $s['nama_siswa'] }}</td>
                            <td class="text-center">{{ $s['tgl_lahir'] }}</td>
                            <td class="text-center">{{ $s['jenis_kelamin'] }}</td>
                            <td class="text-center">{{ $s['alamat'] }}</td>
                            <td class="text-center">{{ $s['no_hp'] }}</td>
                            <td class="text-center">{{ $s->kelas->jurusan }}</td>
                            <td class="text-center">{{ $s->kelas->nama_kelas }}</td>
                            <td class="text-center">
                                <a href="/siswa/{{ $s['nis'] }}/edit" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                                <form action="/siswa/{{ $s['nis'] }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/siswa" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis"
                                placeholder="NIS Siswa...">
                        </div>
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                                placeholder="Nama Siswa...">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir Siswa</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                placeholder="Tanggal Lahir Siswa...">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin Siswa</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Alamat Siswa..." id="alamat" name="alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Telepon Siswa</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                placeholder="No Telepon Siswa...">
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama Siswa</label>
                            <select class="form-select" id="agama" name="agama">
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
                                @foreach ($kelas as $k)
                                    <option value="{{ $k['id_kelas'] }}">{{ $k['nama_kelas'] }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
