@extends('layouts.main')

@section('title','Berita Pesantren')


@section('content')
      {{-- berita --}}
      <section id="berita" class="py-5">
        <div class="container">
            <div class="header-berita text-center">
                <h3 class="fw-bold">Berita Kegiatan Pondok Pesantern</h3>
            </div>

            <div class="row py-5">

                @foreach ($artikels as $artikel)
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset($artikel->image) }}" class="img-fluid mb-3" alt="">
                        <div class="konten-berita">
                            <p class="mb-3 text-secondary">{{ $artikel->created_at }}</p>
                            <h4 class="fw-bold mb-3">{{ $artikel->title }}</h4>
                            <p class="text-secondary">#pesantrenmoderen</p>
                            <a href="/detail-berita/{{ $artikel->slug }}" class="text-decoration-none text-danger">Selengkapny</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/il-berita-01.png') }}" class="img-fluid mb-3" alt="">
                        <div class="konten-berita">
                            <p class="mb-3 text-secondary">21/04/2023</p>
                            <h4 class="fw-bold mb-3">Pengajian Bulanan Pesantren Al Hijrahh</h4>
                            <p class="text-secondary">#pesantrenmoderen</p>
                            <a href="#" class="text-decoration-none text-danger">Selengkapny</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/il-berita-01.png') }}" class="img-fluid mb-3" alt="">
                        <div class="konten-berita">
                            <p class="mb-3 text-secondary">21/04/2023</p>
                            <h4 class="fw-bold mb-3">Pengajian Bulanan Pesantren Al Hijrahh</h4>
                            <p class="text-secondary">#pesantrenmoderen</p>
                            <a href="#" class="text-decoration-none text-danger">Selengkapny</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <img src="{{ asset('assets/images/il-berita-01.png') }}" class="img-fluid mb-3" alt="">
                        <div class="konten-berita">
                            <p class="mb-3 text-secondary">21/04/2023</p>
                            <h4 class="fw-bold mb-3">Pengajian Bulanan Pesantren Al Hijrahh</h4>
                            <p class="text-secondary">#pesantrenmoderen</p>
                            <a href="#" class="text-decoration-none text-danger">Selengkapny</a>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="footer-berita text-center">
                <a href="#" class="btn btn-outline-danger">Berita Lainya</a>
            </div>
        </div>
      </section>
      {{-- end berita --}}
@endsection