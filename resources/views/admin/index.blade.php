@extends('layouts.main')

@section('content')
    <section style="margin-top:100px">
        <div class="container col-xxl-8 py-5">
            <h3 class="fw-bold mb-3">Halaman Dashboard Admin</h3>
            <p>Selamat datang di halaman dashboard admin</p>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/il-blog.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Blog Artikel</h5>
                          <p class="card-text">Atur dan kelola artikel kegiatan pesantren</p>
                          <a href="{{ route('blog') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/il-kegiatan.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Poto Kegiatan</h5>
                          <p class="card-text">Atur dan kelola poto kegiatan pesantren</p>
                          <a href="{{ route('photo') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/il-video.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Video Kegiatan</h5>
                          <p class="card-text">Atur dan kelola video kegiatan pesantren</p>
                          <a href="{{ route('video') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection