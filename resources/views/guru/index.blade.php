@extends('templates.index')

@section('content')
    <div class="container">
        <h1 class="my-3 fw-semibold text-center">Data Guru</h1>
        <button class="btn btn-secondary float-end mb-2" data-bs-toggle="modal" data-bs-target="#guru">Tambah Guru</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Guru</th>
                    <th class="text-center">Pendidikan Guru</th>
                    <th class="text-center">Prodi Guru</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @empty(count($guru) != 0)
                    <tr>
                        <th colspan="5">Tidak ada data guru.</th>
                    </tr>
                @endempty
                @if ($guru)
                    @foreach ($guru as $g)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $g['nama_guru'] }}</td>
                            <td class="text-center">{{ $g['pendidikan_guru'] }}</td>
                            <td class="text-center">{{ $g['prodi_guru'] }}</td>
                            <td class="text-center">
                                <a href="/guru/{{ $g['id_guru'] }}/edit" class="btn btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                                <form action="/guru/{{ $g['id_guru'] }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
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
    <div class="modal fade" id="guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Guru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/guru" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_guru" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                                placeholder="Nama guru...">
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_guru" class="form-label">Pendidikan Guru</label>
                            <input type="text" class="form-control" id="pendidikan_guru" name="pendidikan_guru"
                                placeholder="Tingkat pendidikan guru...">
                        </div>
                        <div class="mb-3">
                            <label for="prodi_guru" class="form-label">Prodi Guru</label>
                            <input type="text" class="form-control" id="prodi_guru" name="prodi_guru"
                                placeholder="Prodi guru...">
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
