@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Kategori',
        'data' => $category->name,
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
                            @forelse ($posts as $item)
                                <div class="md:col-span-6 col-span-12">
                                    <div class="relative mb-4.75">
                                        <div class="rounded-[4px] overflow-hidden align-middle">
                                            <a href="/{{ $item->category->slug }}/{{ $item->slug }}">
                                                <img class="w-full h-auto block" src="{{ getFile($item->image) }}" alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                        <div class="relative">
                                            <div class="mb-1.25 px-1.25 pt-4">
                                                <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                                    <li class="inline-block text-[#707070] font-medium text-[13px] after:content-['|'] after:inline-block after:font-normal after:mx-1 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($item->published_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                    <li class="inline-block text-[#707070] font-medium text-[13px]">
                                                        <a href="/{{ $item->category->slug }}/{{ $item->slug }}">{{ $item->counter ?? '0' }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>	
                                        <div class="mb-1.25">
                                            <h4 class="mb-1.25 text-xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                                                <a href="/{{ $item->category->slug }}/{{ $item->slug }}">{{ $item->title }}</a>
                                            </h4>
                                        </div>
                                        <div class="relative"> 
                                            <a href="/{{ $item->category->slug }}/{{ $item->slug }}" title="BACA SELENGKAPNYA" rel="bookmark" class="text-[#171717] border-b-[2px] hover:text-primary hover:duration-500 duration-500 inline-block">BACA SELENGKAPNYA</a>
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
                            @if($posts->hasPages())
                                <ul class="w-full py-2.5 flex rounded-x-[4px] justify-center">
                                    {{-- Previous Page Link --}}
                                    @if ($posts->onFirstPage())
                                        <li class="previous">
                                            <span class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </span>
                                        </li>
                                    @else
                                        <li class="previous">
                                            <a href="{{ $posts->previousPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
                                                <i class="text-xs ti-arrow-left"></i> Sebelumnya
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                        @if ($page == $posts->currentPage())
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
                                    @if ($posts->hasMorePages())
                                        <li class="next">
                                            <a href="{{ $posts->nextPageUrl() }}" class="py-2 px-4 text-sm font-medium border border-[#efefef] text-[#767676] font-montserrat hover:bg-[#ed3d8b] hover:border-primary duration-500 hover:text-white">
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
                            <!-- Category Info Widget -->
                            <div class="mb-7.5 max-md:mt-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Tentang Kategori</h6>
                                <div class="p-5 border border-[#e9e9e9] text-center">
                                    <div class="w-16 h-16 bg-primary rounded-full mx-auto mb-4 flex items-center justify-center">
                                        <i class="fa-solid fa-folder text-white text-2xl"></i>
                                    </div>
                                    <h5 class="text-lg font-bold text-black font-nunito mb-2">{{ $category->name }}</h5>
                                    @if($category->description)
                                        <p class="text-sm text-[#707070] leading-6">{{ $category->description }}</p>
                                    @else
                                        <p class="text-sm text-[#707070] leading-6">Artikel dalam kategori "{{ $category->name }}".</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Search Widget -->
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Pencarian</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="get" action="{{ url('/posts') }}">
                                        <div class="border border-[#efefef] w-full relative flex flex-wrap items-stretch">
                                            <input name="search" value="{{ request('search') }}" class="text-[15px] h-[45px] py-1.25 px-5 table-cell relative flex-auto w-[1%] leading-5 outline-none" placeholder="Masukkan kata kunci..." type="text">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Most Popular Widget -->
                            @if(isset($mostPopular) && $mostPopular->count() > 0)
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Artikel Populer</h6>
                                <div>
                                    @foreach($mostPopular->take(5) as $popular)
                                    <div class="overflow-hidden mb-2.5 clearfix">
                                        <div class="table-cell align-middle pr-3.75 w-[110px] relative"> 
                                            <img class="w-full h-auto rounded-[4px]" src="{{ getFile($popular->image) }}" width="200" height="143" alt="{{ $popular->title }}"> 
                                        </div>
                                        <div class="overflow-hidden table-cell align-middle ml-[110px]">
                                            <div class="dlab-post-header">
                                                <h6 class="leading-4 mb-2 capitalize text-[15px] text-black font-bold">
                                                    <a href="/{{ $popular->category->slug }}/{{ $popular->slug }}">{{ Str::limit($popular->title, 50) }}</a>
                                                </h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul class="flex items-center">
                                                    <li class="text-[#707070] inline-block text-[13px] after:content-['|'] after:inline-block after:mx-1.25 after:opacity-50">
                                                        {{ \Carbon\Carbon::parse($popular->published_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                    <li class="text-[#707070] inline-block text-[13px]">
                                                        <a href="/{{ $popular->category->slug }}/{{ $popular->slug }}">{{ $popular->counter ?? '0' }}</a>
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
