@extends('layouts.main')

@section('title', 'Detail Berita Pesantren')
    
@section('content')
   <section id="detail-berita" style="margin-top:100px" class="py-5">
    <div class="container col-xxl-8">
        <div class="mb-3">
            <a href="/">Home</a> / <a href="/berita">Berita</a> / Pengajian Bulanan Pesantren Al Hijrahh
        </div>
        <img src="{{ asset($artikel->image) }}" class="img-fluid mb-3" alt="">
        <div class="konten-berita">
            <p class="mb-3 text-secondary">{{ $artikel->created_at }}</p>
            <h4 class="fw-bold mb-3">{{ $artikel->title }}</h4>
            <p class="text-secondary">#pesantrenmoderen</p>
            <a href="#" class="text-decoration-none text-danger">{!! $artikel->desc !!}</a>
        </div>
    </div>
</section>
    
@endsection