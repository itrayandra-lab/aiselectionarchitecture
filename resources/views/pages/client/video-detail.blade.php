@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Detail Video',
        'data' => $video->title,
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
                                    @foreach($videos->take(6) as $item)
                                    <li class="mb-[3px] {{ $item->id == $video->id ? 'active' : '' }}">
                                        <a href="{{ route('video_detail', $item->slug) }}" class="py-3.75 px-5 bg-[#fef5fe] block w-full text-[#4f0035] {{ $item->id == $video->id ? 'border-l-[3px] border-primary' : '' }}">
                                            {{ Str::limit($item->title, 30) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="p-7.5 bg-[#fef5fe] mb-7.5">
                                    <h4 class="text-[28px]/[35px] mb-3.75 font-bold text-black font-nunito">Info Video</h4>
                                    <div class="mb-4">
                                        <p class="text-sm text-[#707070] mb-1"><strong>Dibuat:</strong></p>
                                        <p class="text-sm">{{ \Carbon\Carbon::parse($video->created_at)->locale('id')->translatedFormat('d M Y') }}</p>
                                    </div>
                                    <a href="{{ $video->link_yt }}" target="_blank" class="site-button">Tonton di YouTube</a>
                                </div>
                            </div>
                        </div>		
                        <div class="lg:col-span-9 md:col-span-8 col-span-12">
                            <h2 class="mb-2.5 text-4.5xl/[48px] text-black font-nunito font-semibold max-md:mt-5">{{ $video->title }}</h2>
                            <p class="leading-6 mb-6">{{ Str::limit(strip_tags($video->description), 200) }}</p>
                            
                            <!-- Video Player -->
                            <div class="mb-7.5">
                                <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px;">
                                    @if($video->link_yt)
                                        <iframe 
                                            src="{{ 'https://www.youtube.com/embed/' . (strpos($video->link_yt, 'v=') !== false ? Str::after($video->link_yt, 'v=') : Str::afterLast($video->link_yt, '/')) . '?autoplay=0&mute=0&rel=0&showinfo=0&controls=1' }}"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 8px;"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen>
                                        </iframe>
                                    @else
                                        <div class="flex items-center justify-center h-full bg-gray-200 rounded-lg">
                                            <p class="text-gray-500">Video tidak tersedia</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Video Description -->
                            <div class="content mb-7.5">
                                {!! $content !!}
                            </div>

                            <!-- Video Tags/Share -->
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
                                    <a href="#" class="w-8 h-8 bg-[#DE4E43] text-white rounded-full flex items-center justify-center hover:bg-opacity-80 duration-300">
                                        <i class="fab fa-youtube text-xs"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Related Videos Grid -->
                            <div class="grid grid-cols-12">
                                @foreach($videos->where('id', '!=', $video->id)->take(6) as $relatedVideo)
                                <div class="lg:col-span-4 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5">
                                    <div class="bg-[#f7f9fb] relative text-center p-7.5 max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)] {{ $loop->even ? '' : 'bg-white' }}">
                                        <div class="w-full mb-5 relative">
                                            <a href="{{ route('video_detail', $relatedVideo->slug) }}" class="icon-cell text-primary block relative">
                                                <img class="w-full h-32 object-cover rounded-lg" src="{{ getFile($relatedVideo->image) }}" alt="{{ $relatedVideo->title }}">
                                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                                                    <div class="w-10 h-10 bg-white bg-opacity-90 rounded-full flex items-center justify-center">
                                                        <i class="fas fa-play text-primary text-sm ml-0.5"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="overflow-hidden">
                                            <h5 class="text-lg text-black mb-2.5 font-bold font-nunito">
                                                <a href="{{ route('video_detail', $relatedVideo->slug) }}">{{ Str::limit($relatedVideo->title, 40) }}</a>
                                            </h5>
                                            <p class="mb-3 text-sm text-[#707070]">{{ \Carbon\Carbon::parse($relatedVideo->created_at)->locale('id')->translatedFormat('d M Y') }}</p>
                                            <p class="mb-6 text-sm">{{ Str::limit(strip_tags($relatedVideo->description), 80) }}</p>
                                        </div>
                                    </div>	
                                </div>
                                @endforeach
                            </div>	
                        </div>		
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area END -->
    
    <!-- Gallery section start -->	
    @if(isset($galleryPhotos) && $galleryPhotos->count() > 0)
    <section>
        <div class="portfolio-gallery">
            <div class="container-fluid p-0">
                <div class="flex">
                    <div class="carousel-gallery dots-none owl-none owl-carousel owl-btn-center-lr owl-btn-3 owl-theme owl-btn-center-lr owl-btn-1 mfp-gallery">	
                        @foreach($galleryPhotos->take(8) as $photo)
                        <div class="item dlab-box group">
                            <a href="{{ getFile($photo->image) }}" data-lightbox="gallery" class="mfp-link dlab-media dlab-img-overlay3 after:content-[''] after:absolute relative after:size-0 after:left-2/4 after:top-2/4 after:z-[1] after:opacity-80 after:duration-500 after:bg-[linear-gradient(45deg,_rgba(255,_94,_165,_1)_5%,_rgba(0,_190,_207,_1)_100%);] group-hover:after:size-full group-hover:after:top-0 group-hover:after:left-0" title="Galeri Foto">
                                <img src="{{ getFile($photo->image) }}" alt="Galeri Foto" class="w-full h-48 object-cover">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Gallery section end -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush


