@extends('layouts.main')

@section('content')
    <section style="margin-top:100px">
        <div class="container col-xxl-8 py-5">
            <div class="d-flex">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
            <h3 class="fw-bold mb-3">Halaman Blog Artikel</h3>

            <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Buat Artikel</a>

            {{-- Pesan Sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif

           <div class="table-responsive py-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($artikels as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" height="100" alt="">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <a href="{{ route('blog.edit' , $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('blog.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" onclick="alert('Apakah yakin akan di hapus ?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
           </div>
        </div>
    </section>
@endsection