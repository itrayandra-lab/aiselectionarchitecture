@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Detail Informasi',
        'data' => $info->title,
    ])
@endsection

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
                                    @foreach($information->take(6) as $item)
                                    <li class="mb-[3px] {{ $item->id == $info->id ? 'active' : '' }}">
                                        <a href="{{ route('info_detail', $item->slug) }}" class="py-3.75 px-5 bg-[#fef5fe] block w-full text-[#4f0035] {{ $item->id == $info->id ? 'border-l-[3px] border-primary' : '' }}">
                                            {{ Str::limit($item->title, 30) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="p-7.5 bg-[#fef5fe] mb-7.5">
                                    <h4 class="text-[28px]/[35px] mb-3.75 font-bold text-black font-nunito">Informasi</h4>
                                    <div class="mb-4">
                                        <p class="text-sm text-[#707070] mb-1"><strong>Dibuat:</strong></p>
                                        <p class="text-sm">{{ \Carbon\Carbon::parse($info->created_at)->locale('id')->translatedFormat('d M Y') }}</p>
                                    </div>
                                  
                                    <a href="{{ route('info') }}" class="site-button">Lihat Semua Informasi</a>
                                </div>
                            </div>
                        </div>		
                        <div class="lg:col-span-9 md:col-span-8 col-span-12">
                            <h2 class="mb-2.5 text-4.5xl/[48px] text-black font-nunito font-semibold max-md:mt-5">{{ $info->title }}</h2>
                            <div class="mb-6">
                                <div class="flex items-center text-sm text-[#707070] space-x-4">
                                    <span>{{ \Carbon\Carbon::parse($info->created_at)->locale('id')->translatedFormat('d M Y') }}</span>
                                </div>
                            </div>
                            
                            @if($info->image)
                            <div class="mb-7.5">
                                <img class="w-full h-auto rounded-[4px]" src="{{ getFile($info->image) }}" alt="{{ $info->title }}">
                            </div>
                            @endif
                            
                            <div class="content leading-6 mb-6">
                                {!! $info->description !!}
                            </div>

                            <!-- Tags/Share Section -->
                            <div class="flex flex-wrap justify-between items-center mb-7.5 p-5 bg-[#f7f9fb] rounded-lg">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-semibold text-[#707070]">Bagikan:</span>
                                    <a href="#" class="w-8 h-8 bg-[#3B5998] text-white rounded-full flex items-center justify-center hover:bg-opacity-80 duration-300">
                                        <i class="fab fa-facebook-f text-xs"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center hover:bg-opacity-80 duration-300">
                                        <i class="fab fa-x-twitter text-xs"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 bg-[#007BB6] text-white rounded-full flex items-center justify-center hover:bg-opacity-80 duration-300">
                                        <i class="fab fa-linkedin-in text-xs"></i>
                                    </a>
                                    <a href="#" class="w-8 h-8 bg-[#25D366] text-white rounded-full flex items-center justify-center hover:bg-opacity-80 duration-300">
                                        <i class="fab fa-whatsapp text-xs"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Related Services Grid -->
                            <div class="grid grid-cols-12 mt-10">
                                <div class="lg:col-span-4 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                                    <div class="bg-[#f7f9fb] relative text-center p-7.5 max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                                        <div class="w-20 mb-5 inline-block align-center">
                                            <a href="{{ route('info') }}" class="icon-cell text-primary">
                                                <i class="fas fa-info-circle text-6xl align-middle"></i>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('info') }}">Informasi Lainnya</a>
                                            </h5>
                                            <p class="mb-6">Lihat koleksi informasi dan pengumuman penting lainnya dari laboratorium kami.</p>
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
                                            <a href="{{ route('banners') }}" class="icon-cell text-primary">
                                                <i class="fas fa-bullhorn text-6xl align-middle"></i>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('banners') }}">Banner Promosi</a>
                                            </h5>
                                            <p class="mb-6">Lihat banner promosi dan penawaran khusus dari layanan kami.</p>
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


