<!DOCTYPE html>
<html lang="id">
<head>
    <!-- TITLE -->
    <title>{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}</title>
    
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="{{ $meta->web_name ?? 'BeautyZone' }}">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=no">
    
    <!-- Google Site Verification -->
    @if(!empty($meta->google_site_verification))
    <meta name="google-site-verification" content="{{ $meta->google_site_verification }}">
    @endif

    <meta name="keywords" content="{{ $meta->meta_keywords ?? 'beauty, spa, salon, tailwind css, beauty spa template, salon website, spa design, responsive design, wellness center, beauty salon template' }}">
    <meta name="description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS. Perfect for wellness centers, beauty salons, and spa services.' }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}">
    <meta property="og:description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS.' }}">
    <meta property="og:image" content="{{ getFile($meta->og_image) ?? asset('clinet/package/src/assets/images/social-image.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $meta->web_name ?? 'BeautyZone' }}">
    <meta property="og:locale" content="id_ID">
    
    <!-- TWITTER META -->
    <meta name="twitter:title" content="{{ $meta->meta_title ?? 'BeautyZone : Beauty Spa Salon' }}">
    <meta name="twitter:description" content="{{ $meta->meta_description ?? 'Discover a modern and responsive Beauty Spa Salon template designed with Tailwind CSS.' }}">
    <meta name="twitter:image" content="{{ getFile($meta->og_image) ?? asset('clinet/package/src/assets/images/social-image.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- favicon Icons -->
    <link rel="icon" type="image/x-icon" href="{{ getFile($meta->favicon) ?? asset('clinet/package/src/assets/images/favicon.png') }}">
    
    <!-- Google Analytics -->
    @if(!empty($meta->google_analytics_id))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $meta->google_analytics_id }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $meta->google_analytics_id }}', {
        'page_path': window.location.pathname,
        'page_title': document.title
      });
    </script>
    @endif
    
    <!-- Google Tag Manager -->
    @if(!empty($meta->google_tag_manager_id))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ $meta->google_tag_manager_id }}');</script>
    @endif
    
    <!-- Custom Google Analytics Code -->
    @if(!empty($meta->google_analytics_code))
    {!! $meta->google_analytics_code !!}
    @endif
    
    <!-- Custom GTM Head Code -->
    @if(!empty($meta->google_tag_manager_head))
    {!! $meta->google_tag_manager_head !!}
    @endif
    
    <!-- Facebook Pixel -->
    @if(!empty($meta->facebook_pixel_id))
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '{{ $meta->facebook_pixel_id }}');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id={{ $meta->facebook_pixel_id }}&ev=PageView&noscript=1"
    /></noscript>
    @endif
    
    <!-- Custom Head Scripts -->
    @if(!empty($meta->custom_head_scripts))
    {!! $meta->custom_head_scripts !!}
    @endif
    
    <!-- Schema.org Organization -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "{{ $meta->web_name ?? 'BeautyZone' }}",
      "url": "{{ $meta->domain ?? url('/') }}",
      "logo": "{{ getFile($meta->logo) ?? asset('clinet/package/src/assets/images/logo.png') }}",
      "description": "{{ $meta->meta_description ?? 'Beauty Spa Salon' }}",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "{{ $meta->phone_number ?? '' }}",
        "contactType": "Customer Service",
        "areaServed": "ID",
        "availableLanguage": ["Indonesian", "English"]
      },
      "sameAs": [
        @if(!empty($meta->facebook_link))"{{ $meta->facebook_link }}",@endif
        @if(!empty($meta->instagram_link))"{{ $meta->instagram_link }}",@endif
        @if(!empty($meta->youtube_link))"{{ $meta->youtube_link }}",@endif
        @if(!empty($meta->twitter_link))"{{ $meta->twitter_link }}"@endif
      ]
    }
    </script>
    
    @stack('schema')
    
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

    <style>
        .benner-swiper-button .swiper-button-prev {
            border-radius: 40px;
        }
        .benner-swiper-button .swiper-button-next {
            border-radius: 40px;
        }
    </style>
</head>
<body id="bg" class="selection:bg-primary selection:text-white font-Sans skin-1">
    
    <!-- Google Tag Manager (noscript) -->
    @if(!empty($meta->google_tag_manager_id))
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $meta->google_tag_manager_id }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif
    
    <!-- Custom GTM Body Code -->
    @if(!empty($meta->google_tag_manager_body))
    {!! $meta->google_tag_manager_body !!}
    @endif
    
    <!-- Custom Body Scripts -->
    @if(!empty($meta->custom_body_scripts))
    {!! $meta->custom_body_scripts !!}
    @endif
    
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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Stack untuk JavaScript tambahan --}}
    @stack('scripts')
</body>
</html>
