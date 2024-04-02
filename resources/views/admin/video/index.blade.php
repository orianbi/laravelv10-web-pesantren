@extends('layouts.main')

@section('content')
    <section style="margin-top:100px">
        <div class="container col-xxl-8 py-5">
            <div class="d-flex">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
            <h3 class="fw-bold mb-3">Halaman Video Kegiatan</h3>

            <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">Tambah Video</a>

            {{-- Pesan Sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif
            {{-- menampilkan error validasi --}}

            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach                 
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

           <div class="table-responsive py-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Video</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                @endphp

              @foreach ($videos as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <iframe height="150" src="https://www.youtube.com/embed/7sXHA1RGFy8?si={{ $item->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $item->id }}" data-bs-toggle="modal">Edit</a>
                            <form action="{{ route('video.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" onclick="alert('Apakah yakin akan di hapus ?')" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                      <!-- Modal Edit-->
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Video Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('video.update', $item->id) }}" method="POST">
                                @csrf

                                <input type="hidden" name="id_video" value="{{ $item->id }}">

                                <div class="form-group mb-3">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{ $item->judul }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Youtube Kode</label>
                                    <input type="text" name="youtube_code" class="form-control" value="{{ $item->youtube_code }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

                @endforeach
                </tbody>
            </table>
           </div>
           </div>
        </div>
    </section>

    <!-- Modal Upload-->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="uploadModalLabel">Tambah Video Kegiatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="">Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Youtube Kode</label>
                        <input type="text" name="youtube_code" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
</div>

 
@endsection