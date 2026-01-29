@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Album Foto',
        'data' => 'Album Foto',
    ])
@endsection

@section('content')
    <!-- section Blog large start -->
    <section>	
        <div class="md:pt-14.5 md:mb-13.5 pt-7.5 mb-7.5">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-7.5">
                    <!-- Blog large img -->
                    <div class="lg:col-span-8 md:col-span-7 col-span-12">
                        <div class="grid grid-cols-12 gap-x-7.5">
                            @forelse ($albums as $item)
                                <div class="md:col-span-6 col-span-12">
                                    <div class="relative mb-4.75">
                                        <div class="rounded-[4px] overflow-hidden align-middle">
                                            <a href="javascript:void(0);" data-lightbox="album-{{ $item->id }}" data-title="{{ $item->name }}">
                                                @if($item->photos->count() > 0)
                                                    <img class="w-full h-auto block" src="{{ getFile($item->photos->first()->image) }}" alt="{{ $item->name }}">
                                                @else
                                                    <img class="w-full h-auto block" src="{{ asset('clinet/package/src/assets/images/blog/grid/pic1.jpg') }}" alt="{{ $item->name }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="relative">
                                            <div class="mb-1.25 px-1.25 pt-4">
                                                <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                                    <li class="inline-block text-[#707070] font-medium text-[13px] after:content-['|'] after:inline-block after:font-normal after:mx-1 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                    <li class="inline-block text-[#707070] font-medium text-[13px]">
                                                        {{ $item->photos->count() }} foto
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>	
                                        <div class="mb-1.25">
                                            <h4 class="mb-1.25 text-xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                                                <a href="javascript:void(0);" data-lightbox="album-{{ $item->id }}" data-title="{{ $item->name }}">{{ $item->name }}</a>
                                            </h4>
                                        </div>
                                        @if($item->description)
                                        <div class="mb-2.5">
                                            <p class="leading-6">{{ Str::limit($item->description, 100) }}</p>
                                        </div>
                                        @endif
                                        <div class="relative"> 
                                            <a href="javascript:void(0);" data-lightbox="album-{{ $item->id }}" data-title="{{ $item->name }}" title="LIHAT ALBUM" rel="bookmark" class="text-[#171717] border-b-[2px] hover:text-primary hover:duration-500 duration-500 inline-block">LIHAT ALBUM</a>
                                        </div>
                                        
                                        <!-- Hidden images for lightbox -->
                                        @foreach($item->photos->skip(1) as $photo)
                                            <a href="{{ getFile($photo->image) }}" data-lightbox="album-{{ $item->id }}" data-title="{{ $item->name }}" style="display: none;"></a>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-12">
                                    <div class="text-center py-10">
                                        <h3 class="text-2xl font-bold text-[#232323] mb-4">Tidak ada album ditemukan</h3>
                                        <p class="text-[#707070]">Belum ada album foto yang tersedia saat ini.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>	
                        <!-- Blog large img END -->
                        
                        <!-- Pagination start -->
                        <div class="clearfix text-center mb-7.5">
                            @if($albums->hasPages())
                                <ul class="w-full py-2.5 flex rounded-x-[4px] justify-center">
                                    {{-- Previous Page Link --}}
                                    @if ($albums->onFirstPage())
                                        <li class="previous">
                                            <span class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </span>
                                        </li>
                                    @else
                                        <li class="previous">
                                            <a href="{{ $albums->previousPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($albums->getUrlRange(1, $albums->lastPage()) as $page => $url)
                                        @if ($page == $albums->currentPage())
                                            <li class="active">
                                                <span class="bg-[#ed3d8b] text-white border border-primary py-2 px-4 text-sm font-montserrat">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $url }}" class="hover:text-white text-black border border-[#efefef] py-2 px-4 text-sm font-montserrat hover:bg-[#ed3d8b] duration-500 hover:border-primary">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($albums->hasMorePages())
                                        <li class="next">
                                            <a href="{{ $albums->nextPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
                                                Selanjutnya <i class="text-xs ti-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="next">
                                            <span class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat">
                                                Selanjutnya <i class="text-xs ti-arrow-right"></i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                        <!-- Pagination END -->
                    </div>
                    
                    <!-- Side bar start -->
                    <div class="lg:col-span-4 md:col-span-5 col-span-12">
                        <aside class="sticky !top-[100px] block">
                            <!-- Search Widget -->
                            <div class="mb-7.5 max-md:mt-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Pencarian Album</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="get" action="{{ url('/albums') }}">
                                        <div class="border border-[#efefef] w-full relative flex flex-wrap items-stretch">
                                            <input name="qr" value="{{ request('qr') }}" class="text-[15px] h-[45px] py-1.25 px-5 table-cell relative flex-auto w-[1%] leading-5 outline-none" placeholder="Masukkan nama album..." type="text">
                                            </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Recent Albums Widget -->
                            @if(isset($recentAlbums) && $recentAlbums->count() > 0)
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Album Terbaru</h6>
                                <div>
                                    @foreach($recentAlbums->take(3) as $recentAlbum)
                                    <div class="overflow-hidden mb-2.5 clearfix">
                                        <div class="table-cell align-middle pr-3.75 w-[110px] relative"> 
                                            @if($recentAlbum->photos->count() > 0)
                                                <img class="w-full h-auto rounded-[4px]" src="{{ getFile($recentAlbum->photos->first()->image) }}" width="200" height="143" alt="{{ $recentAlbum->name }}"> 
                                            @else
                                                <img class="w-full h-auto rounded-[4px]" src="{{ asset('clinet/package/src/assets/images/blog/grid/pic1.jpg') }}" width="200" height="143" alt="{{ $recentAlbum->name }}">
                                            @endif
                                        </div>
                                        <div class="overflow-hidden table-cell align-middle ml-[110px]">
                                            <div class="dlab-post-header">
                                                <h6 class="leading-4 mb-2 capitalize text-[15px] text-black font-bold">
                                                    <a href="javascript:void(0);" data-lightbox="recent-album-{{ $recentAlbum->id }}" data-title="{{ $recentAlbum->name }}">{{ Str::limit($recentAlbum->name, 50) }}</a>
                                                </h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul class="flex items-center">
                                                    <li class="text-[#707070] inline-block text-[13px] after:content-['|'] after:inline-block after:mx-1.25 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($recentAlbum->created_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                    <li class="text-[#707070] inline-block text-[13px]">
                                                        {{ $recentAlbum->photos->count() }} foto
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Popular Albums Widget -->
                            @if(isset($popularAlbums) && $popularAlbums->count() > 0)
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Album Populer</h6>
                                <ul>
                                    @foreach($popularAlbums->take(5) as $popularAlbum)
                                    <li class="capitalize border-b border-[#6666661c] relative p-2.5 pl-3.75 leading-5 after:content-['\f105'] after:absolute after:left-0 after:top-2.5 after:block after:font-[FontAwesome] after:text-xs hover:text-primary duration-500">
                                        <a href="javascript:void(0);" data-lightbox="popular-album-{{ $popularAlbum->id }}" data-title="{{ $popularAlbum->name }}">{{ $popularAlbum->name }} ({{ $popularAlbum->photos->count() }} foto)</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </aside>
                    </div>
                    <!-- Side bar END -->	
                </div>
            </div>	
        </div>
    </section>
    <!-- section Blog large end -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush