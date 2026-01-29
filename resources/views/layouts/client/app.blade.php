<!DOCTYPE html>
<html lang="en">
<head>
    <!-- TITLE -->
    <title>{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}</title>
    
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="{{ $meta->web_name ?? 'BeautyZone' }}">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=no">

    <meta name="keywords" content="{{ $meta->meta_keywords ?? 'beauty, spa, salon, tailwind css, beauty spa template, salon website, spa design, responsive design, wellness center, beauty salon template' }}">
    <meta name="description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS. Perfect for wellness centers, beauty salons, and spa services.' }}">
    
    <meta property="og:title" content="{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}">
    <meta property="og:description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS.' }}">
    <meta property="og:image" content="{{ getFile($meta->og_image) ?? asset('clinet/package/src/assets/images/social-image.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- TWITTER META -->
    <meta name="twitter:title" content="{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}">
    <meta name="twitter:description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS.' }}">
    <meta name="twitter:image" content="{{ getFile($meta->og_image) ?? asset('clinet/package/src/assets/images/social-image.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- favicon Icons -->
    <link rel="icon" type="image/x-icon" href="{{ getFile($meta->favicon) ?? asset('clinet/package/src/assets/images/favicon.png') }}">
    
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/icons/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/icons/themify-icons/themify-icons.min.css') }}">
    
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/css/styleSwitcher.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/vendor/owl-carousel/owl.carousel.css') }}">
    
    <!-- lightgallery -->
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/css/lightgallery.css') }}">    
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/css/lg-thumbnail.css') }}">
    <link rel="stylesheet" href="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/css/lg-zoom.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('clinet/package/src/assets/css/custom-laravel.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lobster&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Stack untuk CSS tambahan --}}
    @stack('styles')
</head>
<body id="bg" class="selection:bg-primary selection:text-white font-Sans skin-1">
    
    <!-- Preloader Start -->
    <div id="loading-area"></div>
    <!-- Preloader End -->
    
    <!-- Header Start -->
    @include('widget.client.header')
    <!-- Header End -->
    
    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->
    
    <!-- Footer Start -->
    @include('widget.client.footer')
    <!-- Footer End -->
    
    <button class="scroltop fa fa-chevron-up"></button>
    
    <!-- CUSTOM FUNCTIONS -->
    <script src="{{ asset('clinet/package/src/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/wow/wow.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/swiper/swiper-bundle.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/imagesloaded/imagesloaded.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/masonry/masonry.filter.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/masonry/masonry-3.1.4.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <!-- LIGHT GALLERY -->
    <script src="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/lightgallery.min.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/vendor/imagesloaded/imagesloaded.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/js/dz.ajax.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/js/dz.carousel.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('clinet/package/src/assets/js/custom-laravel.js') }}"></script>

    {{-- Stack untuk JavaScript tambahan --}}
    @stack('scripts')
</body>
</html>
