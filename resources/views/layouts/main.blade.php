<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Meta untuk tampil di Whatsapp --}}
    @if (Request::segment(1) == '')
    <meta property="og:title" content="Pesantren Al Hijrah" />
    <meta name="description" content="Pesantren Moderan dengan Fasilitas Lengkap" />
    <meta property="og:url" content="http://pesantrenalhijrah.com" />
    <meta property="og:description" content="Pesantren Al Hijrah" />
    <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png') }}" />
    <meta property="og:type" content="article" />
    <title>@yield('title')</title>
@elseif (Request::segment(1) == 'detail')
    <meta property="og:title" content="{{ $artikel->judul }}" />
    <meta name="description" content="{{ $artikel->judul }}" />
    <meta property="og:url" content="http://pesantrenalhijrah.com/detail/{{ $artikel->slug }}" />
    <meta property="og:description" content="{{ $artikel->judul }}" />
    @if ($artikel->image)
        <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
    @else
        <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png') }}" />
    @endif
    <meta property="og:type" content="article" />

    <title> @yield('title') | {{ $artikel->title }}</title>
@endif

{{-- Meta untuk tampil di Whatsapp --}}

        <link rel="shortcut icon" href="{{ asset('assets/icons/ic-logo.ico') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        {{-- AOS --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        {{-- Magnific --}}
        <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">

        {{-- Summernote CSS di antara Head--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />

        {{--my css --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

 
    <body>

        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Content --}}
        @yield('content')


          {{-- Footer --}}
          <section id="footer" class="bg-white">
            <div class="container py-4">
                <footer>
                    <div class="row">
                        {{-- kolom 1 Navigasi--}}
                        <div class="col-12 col-md-3 mb-3">
                            <h5 class="fw-bold mb-3">Navigasi</h5>
                            <div class="d-flex">
                                <ul class="nav flex-column me-5">
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Berita</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Profil</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Gallery</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kegiatan</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sosial</a></li>
                                   
                                </ul>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Alumni</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Info PSB</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Prestasi</a></li>
                                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Video</a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- kolom 2 Media Sosial--}}
                        <div class="col-12 col-md-3 mb-3">
                            <h5 class="fw-bold mb-3">Follow kami</h5>
                            <div class="d-flex mb-3">
                                <a href="" target="_blank" class="text-decoration-none text-dark">
                                    <img src="{{ asset('assets/icons/ig.svg') }}" height="30" width="30" class="me-4" alt="">
                                </a>
                                <a href="" target="_blank" class="text-decoration-none text-dark">
                                    <img src="{{ asset('assets/icons/fb.svg') }}" height="30" width="30" class="me-4" alt="">
                                </a>
                                <a href="" target="_blank" class="text-decoration-none text-dark">
                                    <img src="{{ asset('assets/icons/tiktok.svg') }}" height="30" width="30" class="me-4" alt="">
                                </a>
                                <a href="" target="_blank" class="text-decoration-none text-dark">
                                    <img src="{{ asset('assets/icons/yt.svg') }}" height="30" width="30" class="me-4" alt="">
                                </a>
                            </div>
                        </div>

                        {{-- kolom 3 Kontak --}}
                        <div class="col-12 col-md-3 mb-3">
                            <h5 class="font-inter fw-bold mb-3">Kontak kami</h5>

                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">info@alhijrah.sch.id</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">021-xxx-xxx</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">021-xxx-xxx</a></li>
                            </ul>
                        </div>

                        {{-- kolom 4 alamat --}}
                        <div class="col-12 col-md-3 mb-3">
                            <h5 class="font-inter fw-bold mb-3">Alamat Sekolah</h5>
                            <p>Jl. Haji Nawi, No 115, Bandung, Jawa Barat</p>
                        </div>
                    </div>
                </footer>
            </div>
          </section>
          {{-- end Footer --}}

          <section class="bg-light border-top">
            <div class="container py-4">
                <div class="d-flex justify-content-between">
                    <div>
                        Pesantren Al Hijrah
                    </div>
                    <div class="d-flex">
                        <p class="me-4">Syarat & Ketentuan</p>
                        <p>
                            <a href="#" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                        </p>
                    </div>
                </div>
            </div>
          </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
          {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/magnific.js') }}"></script>
    {{-- Summernote JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

    <script>
        const navbar = document.querySelector('.fixed-top');

        window.onscroll = () => {
            if (window.scrollY > 100) {
                navbar.classList.add("scroll-nav-active");
                navbar.classList.add("text-nav-active");
                // navbar.classList.remove("navbar-dark");
            } else {
                navbar.classList.remove("scroll-nav-active");
                // navbar.classList.add("navbar-dark");
            }
        }

        // animasi aos
        AOS.init();

        // Magnific
        $(document).ready(function() {
            $('.image-link').magnificPopup({
                type: 'image',
                retina: {
                    ratio: 1,
                    replaceSrc: function(item, ratio) {
                        return item.src.replace(/\.\w+$/, function(m) {
                            return '@2x' + m;
                        });
                    }
                }
            });
        });

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });
 });
    </script>
    </body>
</html>
