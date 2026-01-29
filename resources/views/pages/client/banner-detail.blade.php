@extends('layouts.client.app')

@section('content')
    <!-- contact area -->
    <section>
        <div class="content-block">
            <div class="md:py-20 py-7.5 relative">
                <div class="container">
                    <div class="grid grid-cols-12 gap-x-7.5">
                        <div class="lg:col-span-3 md:col-span-4 col-span-12">
                            <div class="sticky-top sticky top-29">
                                <ul class="service-list mb-7.5">    
                                    @foreach($banners->take(6) as $item)
                                    <li class="mb-[3px] {{ $item->id == $banner->id ? 'active' : '' }}">
                                        <a href="{{ route('banner_detail', $item->slug) }}" class="py-3.75 px-5 bg-[#fef5fe] block w-full text-[#4f0035] {{ $item->id == $banner->id ? 'border-l-[3px] border-primary' : '' }}">
                                            {{ Str::limit($item->title, 30) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="p-7.5 bg-[#fef5fe] mb-7.5">
                                    <h4 class="text-[28px]/[35px] mb-3.75 font-bold text-black font-nunito">Informasi</h4>
                                    <p class="leading-6 mb-6">Dapatkan informasi terbaru tentang layanan laboratorium kosmetik kami.</p>
                                    <a href="{{ route('banners') }}" class="site-button">Lihat Semua Banner</a>
                                </div>
                            </div>
                        </div>		
                        <div class="lg:col-span-9 md:col-span-8 col-span-12">
                            <h2 class="mb-2.5 text-4.5xl/[48px] text-black font-nunito font-semibold max-md:mt-5">{{ $banner->title }}</h2>
                            <div class="mb-6">
                                <div class="flex items-center text-sm text-[#707070] space-x-4">
                                    <span>{{ \Carbon\Carbon::parse($banner->created_at)->locale('id')->translatedFormat('d M Y') }}</span>
                                </div>
                            </div>
                            
                            @if($banner->image)
                            <div class="mb-7.5">
                                <img class="w-full h-auto rounded-[4px]" src="{{ getFile($banner->image) }}" alt="{{ $banner->title }}">
                            </div>
                            @endif
                            
                            <div class="content leading-6 mb-6">
                                {!! $content !!}
                            </div>


                            <div class="grid grid-cols-12 mt-10">
                                <div class="lg:col-span-4 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                                    <div class="bg-[#f7f9fb] relative text-center p-7.5 max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                                        <div class="w-20 mb-5 inline-block align-center">
                                            <a href="{{ route('banners') }}" class="icon-cell text-primary">
                                                <i class="fas fa-bullhorn text-6xl align-middle"></i>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('banners') }}">Banner Lainnya</a>
                                            </h5>
                                            <p class="mb-6">Lihat koleksi banner informasi dan promosi lainnya dari laboratorium kami.</p>
                                        </div>
                                    </div>	
                                </div>
                                <div class="lg:col-span-4 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                                    <div class="relative text-center p-7.5 max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                                        <div class="w-20 mb-5 inline-block align-center">
                                            <a href="{{ route('posts') }}" class="icon-cell text-primary">
                                                <i class="fas fa-newspaper text-6xl align-middle"></i>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('posts') }}">Artikel Blog</a>
                                            </h5>
                                            <p class="mb-6">Baca artikel terbaru tentang penelitian dan inovasi kosmetik.</p>
                                        </div>
                                    </div>	
                                </div>	
                                <div class="lg:col-span-4 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                                    <div class="bg-[#f7f9fb] relative text-center p-7.5 max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                                        <div class="w-20 mb-5 inline-block align-center">
                                            <a href="{{ route('info') }}" class="icon-cell text-primary">
                                                <i class="fas fa-info-circle text-6xl align-middle"></i>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('info') }}">Informasi</a>
                                            </h5>
                                            <p class="mb-6">Dapatkan informasi penting dan pengumuman terbaru.</p>
                                        </div>
                                    </div>	
                                </div>		
                            </div>	
                        </div>		
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area END -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush


