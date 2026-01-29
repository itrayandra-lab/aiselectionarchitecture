@extends('layouts.client.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $page->title }}</h2>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li>{{ $page->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Blog Details Area -->
    <div class="blog-details-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li><span>Dilihat:</span> {{ $page->counter ?? 0 }} kali</li>
                                    <li><span>Terakhir diperbarui:</span> {{ \Carbon\Carbon::parse($page->updated_at)->locale('id')->translatedFormat('d M Y') }}</li>
                                </ul>
                            </div>

                            <h3>{{ $page->title }}</h3>
                            
                            <div class="content">
                                {!! $content !!}
                            </div>
                        </div>

                        <div class="article-footer">
                            <div class="article-tags">
                                <span><i class="bx bx-share-alt"></i></span>
                                <a href="#">Halaman</a>
                                <a href="#">Informasi</a>
                            </div>

                            <div class="article-share">
                                <ul class="social">
                                    <li><a href="#" class="facebook"><i class="bx bxl-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="bx bxl-twitter"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="bx bxl-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <section class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <input type="search" class="search-field" placeholder="Cari halaman...">
                                </label>
                                <button type="submit">Cari</button>
                            </form>
                        </section>

                        @if(isset($galleryPhotos) && $galleryPhotos->count() > 0)
                        <section class="widget widget_gallery">
                            <h3 class="widget-title">Galeri Kami</h3>
                            <ul class="gallery-list">
                                @foreach($galleryPhotos->take(6) as $photo)
                                <li>
                                    <a href="{{ getFile($photo->image) }}" data-lightbox="gallery">
                                        <img src="{{ getFile($photo->image) }}" alt="Galeri">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </section>
                        @endif

                        <section class="widget widget_categories">
                            <h3 class="widget-title">Menu Navigasi</h3>
                            <ul>
                                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li><a href="{{ route('posts') }}">Blog</a></li>
                                <li><a href="#">Layanan</a></li>
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Kontak</a></li>
                            </ul>
                        </section>

                        <section class="widget widget_text">
                            <h3 class="widget-title">Tentang Kami</h3>
                            <div class="textwidget">
                                <p>Laboratorium kosmetik terpercaya yang menyediakan layanan testing, analisis, dan konsultasi untuk produk kecantikan berkualitas tinggi.</p>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection


