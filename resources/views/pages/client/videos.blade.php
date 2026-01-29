@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Video',
        'data' => 'Koleksi Video',
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
                            @forelse ($videos as $item)
                                <div class="md:col-span-6 col-span-12">
                                    <div class="relative mb-4.75">
                                        <div class="rounded-[4px] overflow-hidden align-middle relative">
                                            <a href="{{ route('video_detail', $item->slug) }}">
                                                <img class="w-full h-auto block" src="{{ getFile($item->image) }}" alt="{{ $item->title }}">
                                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                                                    <div class="rounded-full flex items-center justify-center">
                                                        <i class="fas fa-play text-primary text-lg ml-1"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="relative">
                                            <div class="mb-1.25 px-1.25 pt-4">
                                                <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                                    <li class="inline-block text-[#707070] font-medium text-[13px]  after:inline-block after:font-normal after:mx-1 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>	
                                        <div class="mb-1.25">
                                            <h4 class="mb-1.25 text-xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                                                <a href="{{ route('video_detail', $item->slug) }}">{{ $item->title }}</a>
                                            </h4>
                                        </div>
                                        <div class="relative"> 
                                            <a href="{{ route('video_detail', $item->slug) }}" title="TONTON VIDEO" rel="bookmark" class="text-[#171717] border-b-[2px] hover:text-primary hover:duration-500 duration-500 inline-block">TONTON VIDEO</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-12">
                                    @include('widget.client.no-data-search')
                                </div>
                            @endforelse
                        </div>	
                        <!-- Blog large img END -->
                        
                        <!-- Pagination start -->
                        <div class="clearfix text-center mb-7.5">
                            @if($videos->hasPages())
                                <ul class="w-full py-2.5 flex rounded-x-[4px] justify-center">
                                    {{-- Previous Page Link --}}
                                    @if ($videos->onFirstPage())
                                        <li class="previous">
                                            <span class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </span>
                                        </li>
                                    @else
                                        <li class="previous">
                                            <a href="{{ $videos->previousPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                                        @if ($page == $videos->currentPage())
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
                                    @if ($videos->hasMorePages())
                                        <li class="next">
                                            <a href="{{ $videos->nextPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
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
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Pencarian</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="get" action="{{ route('videos') }}">
                                        <div class="border border-[#efefef] w-full relative flex flex-wrap items-stretch">
                                            <input name="qr" value="{{ request('qr') }}" class="text-[15px] h-[45px] py-1.25 px-5 table-cell relative flex-auto w-[1%] leading-5 outline-none" placeholder="Cari video..." type="text">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Recent Videos Widget -->
                            @if(isset($recentVideos) && $recentVideos->count() > 0)
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Video Terbaru</h6>
                                <div>
                                    @foreach($recentVideos->take(3) as $recentVideo)
                                    <div class="overflow-hidden mb-2.5 clearfix">
                                        <div class="table-cell align-middle pr-3.75 w-[110px] relative"> 
                                            <img class="w-full h-auto rounded-[4px]" src="{{ getFile($recentVideo->image) }}" width="200" height="143" alt="{{ $recentVideo->title }}"> 
                                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                <div class="bg-opacity-90 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-play text-primary text-xs ml-0.5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-hidden table-cell align-middle ml-[110px]">
                                            <div class="dlab-post-header">
                                                <h6 class="leading-4 mb-2 capitalize text-[15px] text-black font-bold">
                                                    <a href="{{ route('video_detail', $recentVideo->slug) }}">{{ Str::limit($recentVideo->title, 50) }}</a>
                                                </h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul class="flex items-center">
                                                    <li class="text-[#707070] inline-block text-[13px]  after:inline-block after:mx-1.25 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($recentVideo->created_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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