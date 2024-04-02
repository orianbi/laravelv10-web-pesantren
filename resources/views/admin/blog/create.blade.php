@extends('layouts.main')

@section('content')
    <section style="margin-top:100px">
        <div class="container col-xxl-8 py-5">

            <div class="d-flex">
                <a href="{{ route('blog') }}">Blog</a>
                <div class="mx-1">.</div>
                <a href="">Buat Artikal</a>
            </div>
            <h4 class="fw-bold mb-3">Halaman Buat Artikel</h4>

            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="">Masukan Judul Kegiatan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}">

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group mb-4">
                        <label for="">Masukan Foto Kegiatan</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group mb-4">
                        <label for="">Artikel Berita</label>
                        <textarea name="desc" id="summernote">
                            {{ old('desc') }}
                        </textarea>
                        @error('desc')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
           
        </div>
    
    </section>
@endsection