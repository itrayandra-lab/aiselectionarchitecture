@extends('layouts.client.app')

@section('content')
    <!-- inner page banner -->
    <section>
        <div class="lg:h-[300px] md:h-[200px] h-[150px] bg-top bg-cover bg-center table w-full text-left after:content-[''] after:absolute after:bg-primary after:opacity-80 after:left-0 after:top-0 after:size-full relative" style="background-image:url({{ asset('assets/img/dot.png') }});">
            <div class="container relative z-[1] h-full table">
                <div class="table-cell align-middle text-center">
                    <h1 class="text-white font-nunito font-extrabold md:mb-3.75 mb-1.25 text-xl md:text-[48px]/[58px]">Informasi</h1>
                    <!-- Breadcrumb row Start-->
                    <div>
                        <ul class="text-[15px] font-montserrat">
                            <li class="mr-[3px] text-white inline-block md:text-lg text-[15px] font-medium">
                                <a href="{{ route('beranda') }}" class="after:content-['\f105'] after:ml-[7px] after:font-[fontawesome] after:text-sm">Beranda</a>
                            </li>
                            <li class="mr-[3px] text-white inline-block md:text-lg text-[15px] font-medium">Informasi</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
    </section>
    <!-- inner page banner END -->

    <!-- section Blog large start -->
    <section>
        <div class="md:pt-14.5 py-7.5 md:mb-13.5">
            <div class="container">
                @forelse ($info as $item)
                <!-- Blog large img -->
                <div class="relative md:mb-4.75 mb-7.5">
                    <div class="rounded-[4px] block overflow-hidden align-middle group">
                        <a href="{{ route('info_detail', $item->slug) }}">
                            <div class="w-full h-48 bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
                                <i class="fas fa-info-circle text-white text-6xl"></i>
                            </div>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="mb-1.25 px-1.25 pt-4">
                            <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                <li class="inline-block text-[#707070] font-medium text-[13px] after:content-['|'] after:inline-block after:font-normal after:mx-1 after:opacity-50">{{ \Carbon\Carbon::parse($item->published_at)->locale('id')->translatedFormat('d M Y') }}</li>
                                <li class="inline-block text-[#707070] font-medium text-[13px] after:inline-block after:font-normal after:mx-1 after:opacity-50">Oleh <a href="#">{{ $item->createdBy->name ?? 'Admin' }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-1.25">
                        <h4 class="mb-1.25 text-2xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                            <a href="{{ route('info_detail', $item->slug) }}">{{ $item->title }}</a>
                        </h4>
                    </div>
                    <div class="mb-2.5">
                        <p class="leading-6">{{ Str::limit(strip_tags($item->description), 200) }}</p>
                    </div>
                    <div class="relative">
                        <a href="{{ route('info_detail', $item->slug) }}" title="BACA SELENGKAPNYA" rel="bookmark" class="inline-block font-normal text-[#171717] border-b-[2px] hover:text-primary hover:duration-500 duration-500">BACA SELENGKAPNYA</a>
                    </div>
                </div>
                @empty
                <div class="text-center py-10">
                    <h3 class="text-2xl font-bold text-[#232323] mb-4">Tidak ada informasi ditemukan</h3>
                    <p class="text-[#707070]">Belum ada informasi yang tersedia saat ini.</p>
                </div>
                @endforelse

                <!-- Pagination -->
                @if($info->hasPages())
                <div class="text-center mt-10">
                    {{ $info->appends(request()->query())->links() }}
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- section Blog large end -->
@endsection