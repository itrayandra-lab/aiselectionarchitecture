@extends('layouts.client.app')
@push('styles')

@endpush

@section('content')
<section>
    <div class="page-content bg-white">
        <div class="main-banner relative">
            <div class="swiper home-slider1 benner-swiper-button !h-[50vh] lg:!h-[86vh]">
                <div class="swiper-wrapper">
                    @foreach($heros as $item)
                    <div class="swiper-slide bg-no-repeat bg-cover bg-[50%] relative" 
                         style="background-image: url('{{ getFile($item->image) }}');">
                        
                        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%); pointer-events: none;"></div>
                        
                        <div class="px-3.75 relative lg:w-[1200px] md:w-[720px] sm:w-[540px] w-full !h-60vh mx-auto max-md:text-center top-1/2 -translate-y-1/2" style="z-index: 10;">
                            
                            <div style="max-width: 850px; text-align: left;">
                                
                                <h1 class="md:text-[65px] sm:text-[50px] text-3xl leading-10 md:leading-[80px] sm:leading-[60px] font-extrabold font-nunito capitalize" 
                                    style="color: white !important; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); margin-bottom: 10px;">
                                    {!! $item->title !!}
                                </h1>
                                
                                <div class="sm:text-lg max-sm:px-4.75 text-sm md:leading-[28px] leading-[20px] font-medium font-nunito py-5" 
                                     style="color: rgba(255, 255, 255, 0.95) !important; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                    {!! $item->description !!}
                                </div>

                                <div class="buttons">
                                    <a class="site-button sm:px-7.5 px-5 py-2.5 sm:py-3.75 mr-[18px] inline-block rotate-[3deg] leading-[22px]" href="https://api.whatsapp.com/send/?phone=6285220710909&text=Halo%21">Hubungi Kami</a>
                                    <a class="site-button-secondry sm:px-7.5 px-5 py-2.5 sm:py-3.75 inline-block rotate-[3deg] leading-[22px]" href="/about-us">About us</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next !text-white"></div>
                <div class="swiper-button-prev !text-white"></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Services start -->
<section>
    <div class="md:py-20 py-7.5 relative">
        <div class="container relative z-[1]">
            <div class="text-center mb-14">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">layanan labcos</h2>
                <div class="overflow-hidden">
                    <div class="relative inline-block before:content-[''] before:bg-[url('../images/line.png')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                        after:content-[''] after:bg-[url('../images/line1.png')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                        <i class="flaticon-spa text-primary text-4.5xl"></i>
                    </div>
                </div>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5">Solusi lengkap untuk pengembangan dan pengujian produk kosmetik dengan standar internasional dan teknologi terdepan.</p>
            </div>
            <div class="grid grid-cols-12">
                <!-- Cosmetics Testing & Analysis Services -->
                <div class="lg:col-span-6 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                    <div class="md:border-r md:border-b border-[#80808036] relative hover:z-10 text-center p-7.5 hover:bg-white hover:shadow-[0_0_10px_0_rgba(0,0,0,.1)] hover:scale-105 duration-500 hover:border-white max-lg:border-none max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                        <div class="w-20 mb-5 inline-block align-center">
                            <a href="{{ url('/') }}" class="icon-cell text-primary"><i class="flaticon-makeup text-6xl align-middle"></i></a>
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-2xl text-black mb-2.5 font-bold font-nunito"><a href="{{ url('/') }}">Cosmetics Testing & Analysis Services</a></h3>
                            <p class="mb-6">Pengujian komprehensif untuk memastikan keamanan, kualitas, dan kepatuhan produk kosmetik sesuai standar nasional dan internasional.</p>
                        </div>
                    </div>	
                </div>
                
                <!-- Research & Development Services -->
                <div class="lg:col-span-6 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                    <div class="md:border-b border-[#80808036] relative hover:z-10 text-center p-7.5 hover:bg-white hover:shadow-[0_0_10px_0_rgba(0,0,0,.1)] hover:scale-105 duration-500 hover:border-white max-lg:border-none max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                        <div class="w-20 mb-5 inline-block align-center">
                            <a href="{{ url('/') }}" class="icon-cell text-primary"><i class="flaticon-woman-1 text-6xl align-middle"></i></a>
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-2xl text-black mb-2.5 font-bold font-nunito"><a href="{{ url('/') }}">Research & Development Services</a></h3>
                            <p class="mb-6">Inovasi produk berbasis riset untuk menciptakan formula kosmetik yang efektif, aman, dan sesuai kebutuhan pasar.</p>
                        </div>
                    </div>	
                </div>	
                
                <!-- Consultation Services -->
                <div class="lg:col-span-6 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                    <div class="md:border-r border-[#80808036] relative hover:z-10 text-center p-7.5 hover:bg-white hover:shadow-[0_0_10px_0_rgba(0,0,0,.1)] hover:scale-105 duration-500 hover:border-white max-lg:border-none max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                        <div class="w-20 mb-5 inline-block align-center">
                            <a href="{{ url('/') }}" class="icon-cell text-primary"><i class="flaticon-barbershop text-6xl align-middle"></i></a>
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-2xl text-black mb-2.5 font-bold font-nunito"><a href="{{ url('/') }}">Consultation</a></h3>
                            <p class="mb-6">Konsultasi profesional untuk mendukung pengembangan produk dan strategi pasar yang tepat dengan panduan ahli berpengalaman.</p>
                        </div>
                    </div>	
                </div>	
                
                <!-- Regulatory Compliance Services -->
                <div class="lg:col-span-6 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                    <div class="relative hover:z-10 text-center p-7.5 hover:bg-white hover:shadow-[0_0_10px_0_rgba(0,0,0,.1)] hover:scale-105 duration-500 hover:border-white max-lg:border-none max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                        <div class="w-20 mb-5 inline-block align-center">
                            <a href="{{ url('/') }}" class="icon-cell text-primary"><i class="flaticon-candle-1 text-6xl align-middle"></i></a>
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-2xl text-black mb-2.5 font-bold font-nunito"><a href="{{ url('/') }}">Regulatory Compliance Services</a></h3>
                            <p class="mb-6">Layanan pendampingan untuk memastikan produk kosmetik memenuhi regulasi BPOM dan standar keamanan yang berlaku di Indonesia.</p>
                        </div>
                    </div>	
                </div>		
            </div>	
        </div>
    </div>
</section>
<!-- Our Services end -->

<!-- Why Our Clients start -->
<section>		
    <div class="md:py-20 py-7.5 relative bg-white bg-cover" style="background-image: url('{{ asset('assets/img/imgi_57_bg-footer.png') }}');">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-7.5">
                <div class="lg:col-span-5 col-span-12 mb-7.5 self-center">
                    <div class="table-cell align-middle mb-7.5">							
                        <h2 class="md:text-4.5xl text-[30px] font-extrabold leading-[48px] text-[#232323] font-nunito mt-0 mb-2.5">Pengalaman Expert dengan Hasil Terbaik</h2>
                        <p class="font-bold text-lg mb-3.75 text-[#232323] font-nunito">Labcos menggabungkan pengalaman luas dan keahlian teknis untuk membantu brand kosmetik mencapai standar kualitas tertinggi dengan hasil yang nyata.</p>
                        <ul class="text-3.75 font-Montserrat mb-5">
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute  before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Tim Ahli yang Berpengalaman</li>
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Layanan Pengujian Komprehensif</li>
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Konsultasi Profesional</li>
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-7 col-span-12 lg:ml-15.5">
                    <div class="relative flex-wrap flex items-center">
                        <div class="w-12 inline-block px-2.5">
                            <img class="" 
                            src="{{ asset('assets/img/About-expert.webp') }}" alt="/">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>		
    <div class="md:py-20 py-7.5 relative bg-white bg-cover" style="background-image: url('{{ asset('assets/img/imgi_55_bg-expert.png') }}');">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-7.5">
                <div class="lg:col-span-7 col-span-12 lg:ml-15.5">
                    <div class="relative flex-wrap flex items-center">
                        <div class="w-12 inline-block px-2.5">
                            <img class="border-8 border-white shadow-frame" style="border-radius: 20px;" 
                            src="{{ asset('assets/img/why-chooce-min-1.webp') }}" alt="/">
                        </div>
                        
                    </div>
                </div>

                <div class="lg:col-span-5 col-span-12 mb-7.5 self-center">
                    <div class="table-cell align-middle mb-7.5">							
                        <h2 class="md:text-4.5xl text-[30px] font-extrabold leading-[48px] text-[#232323] font-nunito mt-0 mb-2.5">Kenapa memilih kami ?</h2>
                        <p class="font-bold text-lg mb-3.75 text-[#232323] font-nunito">Kami Berkomitmen Menjadi Mitra Strategis dalam Memastikan Produk Anda Mencapai Standar Kualitas Terbaik</p>
                        <ul class="text-3.75 font-Montserrat mb-5">
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute  before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Pengujian komprehensif untuk keamanan, efektivitas, dan kepatuhan standar.</li>
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Membantu brand menciptakan formula kosmetik inovatif dan unggul.</li>
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f]">Memastikan produk Anda sesuai dengan semua regulasi dan standar.</li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Why Our Clients start -->
    
<section>
    <div class="lg:py-20 py-8 relative bg-[url('../images/background/bg1.png'),url('../images/background/bg2.png')] bg-[position:bottom,_top] bg-no-repeat after:content-[''] after:absolute after:bg-white after:opacity-70 after:top-0 after:left-0 after:size-full after:z-[0] bg-[length:100%]">
        <div class="container relative z-[1]">
            <div class="text-center md:mb-14">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Fokus pada Inovasi Bersama Ekspert Terbaik</h2>
                <div class="overflow-hidden">
                    <div class="relative inline-block before:content-[''] before:bg-[url('../images/line.png')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                    after:content-[''] after:bg-[url('../images/line1.png')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                        <i class="flaticon-spa text-primary text-4.5xl"></i>
                    </div>
                </div>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5">Labcos didukung oleh tim ahli berpengalaman yang memiliki latar belakang akademik dan profesional di bidang kosmetik, penelitian, dan pengembangan.</p>
            </div>
            <div class="relative">
                <div class="team-carousel owl-carousel owl-btn-center-lr owl-btn-3 owl-theme owl-dots-primary-full owl-loaded owl-drag">
                    
                    <div class="item">
                        <div class="team-box relative scale-50 translate-x-[-50%] overflow-hidden will-change-transform transition-transform duration-[700ms] ease-[ease] top-0 left-2/4 w-[290px] origin-center text-center grayscale-[2]">
                            <div class="overflow-hidden relative">
                                <img class="size-[300px]" src="{{ asset('assets/img/et-cahya.webp') }}" alt="apt. Cahya Kusumawulan">
                            </div>
                            <div class="p-2.5 text-center">
                                <h5 class="text-black text-2xl font-bold font-nunito">apt. Cahya Kusumawulan, S.Si., M.Farm</h5>
                                <span class="font-medium">Biotics Skincare Expert</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="team-box relative scale-50 translate-x-[-50%] overflow-hidden will-change-transform transition-transform duration-[700ms] ease-[ease] top-0 left-2/4 w-[290px] origin-center text-center grayscale-[2]">
                            <div class="overflow-hidden relative">
                                <img class="size-[300px]" src="{{ asset('assets/img/et-anis-1.webp') }}" alt="Prof. Dr. rer. nat. apt. Anis Yohana Chaerunisaa">
                            </div>
                            <div class="p-2.5 text-center">
                                <h5 class="text-black text-2xl font-bold font-nunito">Prof. Dr. rer. nat. apt. Anis Yohana Chaerunisaa</h5>
                                <span class="font-medium">Biopharmaceutical Technology Expert</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="team-box relative scale-50 translate-x-[-50%] overflow-hidden will-change-transform transition-transform duration-[700ms] ease-[ease] top-0 left-2/4 w-[290px] origin-center text-center grayscale-[2]">
                            <div class="overflow-hidden relative">
                                <img class="size-[300px]" src="{{ asset('assets/img/et-sriwidodo-1.webp') }}" alt="Prof. Dr. apt. Sriwidodo, M.Si">
                            </div>
                            <div class="p-2.5 text-center">
                                <h5 class="text-black text-2xl font-bold font-nunito">Prof. Dr. apt. Sriwidodo, M.Si</h5>
                                <span class="font-medium">Biopharmaceutical Formulation Expert</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Our Professional Team end -->	

<!-- Call to Action -->
<section>
    <div class="lg:py-20 py-8 bg-[#fef7fe]">
        <div class="container">
            <div class="text-center">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Siap Mengembangkan Produk Kosmetik Anda?</h2>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-8">Hubungi tim ahli kami untuk konsultasi gratis dan dapatkan solusi terbaik untuk kebutuhan pengujian dan pengembangan produk kosmetik Anda.</p>
                <div class="space-x-4">
                    <a href="https://api.whatsapp.com/send/?phone=6285220710909&text=Halo%21+%EF%BF%BD+Terima+kasih+sudah+menghubungi+Labcos.+Ada+yang+bisa+kami+bantu%3F&type=phone_number&app_absent=0" class="site-button-secondry">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Our Professional Team start -->
	
<section>
    <div class="lg:pt-20 lg:pb-13.5 py-8 relative bg-[position:bottom,_top] bg-no-repeat bg-[length:100%] after:content-[''] after:absolute after:bg-white after:opacity-70 after:top-0 after:left-0 after:size-full after:z-0"
     style="background-image: url('{{ asset('assets/img/imgi_55_bg-expert.png') }}'), url('{{ asset('assets/img/imgi_55_bg-expert.png') }}');">
        <div class="container relative z-[1]">
            <div class="text-center mb-14">
                <h2 class="lg:text-4.5xl text-3xl font-bold text-primary font-nunito mb-2.5">Wawasan & Berita Terbaru</h2>
                <div class="overflow-hidden">
                    <div class="relative inline-block before:content-[''] before:bg-[url('../images/line.png')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                        after:content-[''] after:bg-[url('../images/line1.png')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                        <i class="flaticon-spa text-primary text-4.5xl"></i>
                    </div>
                </div>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5 font-lato">Temukan informasi terkini seputar inovasi produk, tren pasar kecantikan, dan panduan regulasi langsung dari tim ahli Labcos untuk mendukung kesuksesan brand Anda.</p>
            </div>
            <div class="blog-carousel owl-carousel owl-btn-center-lr owl-btn-3 owl-theme owl-btn-center-lr owl-btn-1">
                @foreach ($latestPost as $item)
                    <div class="item md:mb-4.75">
                        <div>
                            <img class="rounded-[4px]" src="{{ getFile($item->image) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="mb-1.25 px-1.25 pt-4">
                            <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                <li class="inline-block text-[#707070] font-medium text-[13px] after:content-['|'] after:inline-block after:font-medium after:mx-1 after:opacity-50">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                                </li>
                                <li class="inline-block text-[#707070] font-medium text-[13px]"><a>{{ $item->counter}} Dilihat</a> </li>
                            </ul>
                        </div>
                        <div class="mb-1.25">
                            <h3 class="text-xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                                <a href="/{{ $item->category->slug }}/{{ $item->slug }}">{{ $item->title }}</a>
                            </h3>
                        </div>
                        <div class="relative"> 
                            <a href="/{{ $item->category->slug }}/{{ $item->slug }}" title="Lihat Selengkapnya" rel="bookmark" class="text-[#171717] border-b-[2px] text-sm hover:text-primary hover:duration-500 duration-500 inline-block font-normal">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
        <div class="text-center">
            <div class="space-x-4">
                <a href="/posts" class="site-button-secondry">Lihat Artikel Lainnya</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
  
@endpush
