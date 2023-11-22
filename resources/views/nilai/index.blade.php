@extends('templates.index')

@section('content')
    <div class="container">
        <h1 class="my-3 fw-semibold text-center">Data Nilai</h1>
        <div class="d-flex justify-content-between">
            <form class="w-50">
                <div class="input-group mb-3 w-50">
                    <input type="text" class="form-control" placeholder="Cari sesuatu..." aria-label="Cari sesuatu..." aria-describedby="button-addon2" name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>
            <form class="d-flex gap-2" action="nilai" method="post">
                @csrf
                <select class="form-select h-75" aria-label="Default select example" name="siswa">
                    <option selected value="0">Pilih Siswa</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s['nis'] }}">{{ $s['nama_siswa'] }}</option>
                    @endforeach
                </select>
                <select class="form-select h-75" aria-label="Default select example" name="mapel">
                    <option selected value="0">Pilih Mapel</option>
                    @foreach ($mapel as $m)
                        <option value="{{ $m['kd_mapel'] }}">{{ $m['nama_mapel'] }}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary h-75" type="submit" id="button-addon2">Tambah</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Mapel</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>Formatif</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @empty(count($nilai) != 0)
                    <tr>
                        <th colspan="13">Tidak ada data nilai.</th>
                    </tr>
                @endempty
                @if ($nilai)
                    @foreach ($nilai as $n)
                        <tr>
                            <td class="text-center">{{ $n['nis'] }}</td>
                            <td class="text-center">{{ $n->siswa->nama_siswa }}</td>
                            <td class="text-center">{{ $n->kelas }}</td>
                            <td class="text-center">{{ $n->mapel->nama_mapel }}</td>
                            <td class="text-center">{{ $n->kehadiran }}</td>
                            <td class="text-center">{{ $n->tugas }}</td>
                            <td class="text-center">{{ $n->formatif }}</td>
                            <td class="text-center">{{ $n->uts }}</td>
                            <td class="text-center">{{ $n->uas }}</td>
                            <td class="text-center">{{ $n->nilai_akhir }}</td>
                            <td class="text-center">{{ $n->grade }}</td>
                            <td class="text-center">
                                <a href="/nilai/{{ $n['id_nilai'] }}/edit" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                                <form action="/nilai/{{ $n['id_nilai'] }}" method="post" class="d-inline">
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
@endsection
