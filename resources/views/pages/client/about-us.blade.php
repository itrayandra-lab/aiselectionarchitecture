@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Tentang Kami',
        'data' => 'Tentang Kami',
    ])
@endsection

@section('content')
    <!-- Our Services start -->
    <section>
        <div class="lg:py-20 py-8 relative bg-[url('{{ asset('clinet/package/src/assets/images/background/bg1.png') }}'),url('{{ asset('clinet/package/src/assets/images/background/bg2.png') }}')] bg-[position:bottom,_top] bg-no-repeat after:content-[''] after:absolute after:bg-white after:opacity-70 after:top-0 after:left-0 after:size-full bg-[length:100%]">
            <div class="container relative z-[1]">
                <div class="text-center md:mb-14">
                    <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Laboratorium Kosmetik Terpercaya</h2>
                    <h3 class="text-lg font-bold mb-2.5 font-nunito text-black">Solusi Terbaik untuk Kebutuhan Riset dan Pengembangan Kosmetik Anda!</h3>
                    <div class="overflow-hidden">
                        <div class="relative inline-block before:content-[''] before:bg-[url('{{ asset('clinet/package/src/assets/images/line.png') }}')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                        after:content-[''] after:bg-[url('{{ asset('clinet/package/src/assets/images/line1.png') }}')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                            <i class="flaticon-spa text-primary text-4.5xl"></i>
                        </div>
                    </div>
                    <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5">Kami adalah laboratorium kosmetik profesional yang berdedikasi untuk memberikan layanan terbaik dalam pengujian, penelitian, dan pengembangan produk kosmetik berkualitas tinggi.</p>
                </div>
                
                <!-- About Content -->
                <div class="grid grid-cols-12 gap-7.5 items-center mb-14">
                    <div class="lg:col-span-6 col-span-12">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold mb-4 text-black font-nunito">Visi & Misi Kami</h3>
                            <div class="mb-6">
                                <h4 class="text-xl font-semibold mb-3 text-primary font-nunito">Visi</h4>
                                <p class="text-[#494949] mb-4">
                                    Pengujian komprehensif untuk keamanan, efektivitas, dan kepatuhan standar.
                                </p>
                            </div>
                            <div class="mb-6">
                                <h4 class="text-xl font-semibold mb-3 text-primary font-nunito">Misi</h4>
                                <ul class="text-[#494949] space-y-2">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-primary mr-2 mt-1"></i>
                                        Mengedepankan kenyamanan pelanggan
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-primary mr-2 mt-1"></i>
                                        Menyediaan layanan pengujian bahan baku dan produk kosmetik yang berstandar dan bersertifikat
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-primary mr-2 mt-1"></i>
                                        Menyediakan layanan konsultasi dengan ahli kosmetik
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-primary mr-2 mt-1"></i>
                                        Menyediakan layanan research & development
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-primary mr-2 mt-1"></i>
                                        Mengikuti perkembangan inovasi produk kosmetik
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-6 col-span-12">
                        <div class="relative">
                            <img src="{{ asset('assets/img/About-expert.webp') }}" alt="Laboratorium Kosmetik" class="w-full rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>

            
            </div>
        </div>	
    </section>
    <!-- Our Services end -->	
   <!-- Our Services start -->
<section>
    <div class="md:py-20 py-7.5 relative">
        <div class="container relative z-[1]">
           
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

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush