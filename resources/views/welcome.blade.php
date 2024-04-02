@extends('layouts.main')

@section('title', 'Pesantren Al Hijrah')
    


@section('content')
    

{{-- hero --}}
          <section id="hero">
            <div class="container text-center text-white">
                <div class="hero-title" data-aos="fade-down">
                    <div class="hero-text">
                        Selamat Datang <br> di Pesantern Al Hijrah                     
                    </div>
                    <h4>Pondok Pesantren Modern dengan Konsep Islam Kaffah</h4>
                </div>
            </div>
          </section>
{{-- Program --}}
          <section id="program" style="margin-top: -30px">
            <div class="container col-xxl-9">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="zoom-in">
                        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Berkualitas</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-book.png') }}" width="55" height="55" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="zoom-in">
                        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Berakhlak</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-globe.png') }}" width="55" height="55" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="zoom-in">
                        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Muammalah</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-neraca.png') }}" width="55" height="55" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col mb-2" data-aos="zoom-in">
                        <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p>Pendidikan <br> Teknologi</p>
                            </div>
                            <img src="{{ asset('assets/icons/ic-komputer.png') }}" width="55" height="55" alt="">
                        </div>
                    </div>
                </div>
            </div>
          </section>
          {{-- end program --}}

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
                    </div> --}}
                </div>

                <div class="footer-berita text-center">
                    <a href="/berita" class="btn btn-outline-danger">Berita Lainya</a>
                </div>
            </div>
          </section>
          {{-- end berita --}}

          {{-- join --}}
          <div class="join py-5">
                <div class="container py-5">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="stripe me-2"></div>
                                <h5>Daftar Santri</h5>
                            </div>
                            <h1 class="fw-bold mb-2">Gabung bersama kami, mewujudkan generasi rabbani</h1>
                            <p class="mb-3">
                                Pesantren Al Hijrah merupakan pesantren terbaik di Jawa Barat, dengan meluluskan santri menjadi ustadz terkemuka mendakwahkan di pelosok nusantara
                            </p>
                            <button class="btn btn-outline-danger">Register</button>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/images/il-join.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
          </div>
          {{-- end join --}}

          {{-- video --}}

          <section id="video" class="py-5">
            <div class="container py-5">
                <div class="text-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/8dN3QKrveOk?si=5mJAkgm_CBsMlNeg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
          </section>
          {{-- end video --}}

          <section id="video_youtube" class="py-5">
                <div class="container py-5">
                    <div class="header-berita text-center">
                        <h2 class="fw-bold">Video Kegiatan Pondok Pesantren</h2>
                    </div>
                    <div class="row py-5">
                        @foreach ($videos as $item)
                        <div class="col-lg-4">
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $item->youtube_code }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        @endforeach
                        {{-- <div class="col-lg-4">
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/8dN3QKrveOk?si=5mJAkgm_CBsMlNeg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-4">
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/8dN3QKrveOk?si=5mJAkgm_CBsMlNeg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-4">
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/8dN3QKrveOk?si=5mJAkgm_CBsMlNeg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div> --}}
                    </div>

                    <div class="footer-berita text-center">
                        <a href="video" class="btn btn-outline-danger">Video Lainya</a>
                    </div>
                </div>
          </section>

          {{-- foto --}}

          <section id="foto" class="section-foto parallax" >
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <div class="stripe-putih me-2"></div>
                        <h5 class="fw-bold text-white">Foto Kegiatan</h5>
                    </div>
                    <div>
                        <a href="" class="btn btn-outline-white">Foto Lainnya</a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($photos as $item)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down" data-aos-duration="3000">
                            <a class="image-link" href="{{ asset($item->image) }}">
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                            </a>
                            {{-- <p>{{ $item->judul }}</p> --}}
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down" data-aos-duration="3000">
                        <a class="image-link" href="{{ asset('assets/images/il-photo-011.png') }}">
                        <img src="{{ asset('assets/images/il-photo-011.png') }}" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down" data-aos-duration="3000">
                        <a class="image-link" href="{{ asset('assets/images/il-photo-02.png') }}">
                            <img src="{{ asset('assets/images/il-photo-02.png') }}" class="img-fluid" alt="">
                            </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down" data-aos-duration="3000">
                        <a class="image-link" href="{{ asset('assets/images/il-photo-03.png') }}">
                            <img src="{{ asset('assets/images/il-photo-03.png') }}" class="img-fluid" alt="">
                            </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6" data-aos="fade-down" data-aos-duration="3000">
                        <a class="image-link" href="{{ asset('assets/images/il-photo-04.png') }}">
                            <img src="{{ asset('assets/images/il-photo-04.png') }}" class="img-fluid" alt="">
                            </a>
                    </div> --}}
                </div>
            </div>
          </section>

          {{-- Fasilitas --}}

          <section id="fasilitas" class="py-5" data-aos="zoom-in" data-aos-duration="3000">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h3 class="fw-bold">Fasilitas Pesantren</h3>
                </div>
                <div class="text-center">

                    <img src="{{ asset('assets/images/il-bg-foto.png') }}" class="img-fluid" alt="">
                </div>
                <div class="text-center py-5">
                    <a href="#" class="btn btn-outline-danger">Foto Lainya</a>
                </div>
            </div>
          </section>
@endsection