@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => $page->title,
        'data' => 'Halaman',
    ])
@endsection

@section('content')
    <!-- section Blog large start -->
    <section>	
        <div class="md:pt-14.5 md:mb-13.5 pt-7.5">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-7.5">
                    <!-- Blog large img -->
                    <div class="lg:col-span-8 md:col-span-7 col-span-12 mb-2.5">
                        <!-- blog start -->
                        <div class="relative mb-4.75">
                            <div class="mb-1.25 px-1.25">
                                <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                    <li class="inline-block text-[#707070] font-medium text-[13px]">
                                        {{ \Carbon\Carbon::parse($page->updated_at)->locale('id')->translatedFormat('d M Y') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-1.25">
                                <h1 class="mb-1.25 md:text-[28px]/[35px] text-[24px]/[28px] font-bold text-black font-nunito">{{ $page->title }}</h1>
                            </div>
                            <div class="mt-5 mb-2.5">
                                <div class="text-justify leading-6">
                                    {!! $content !!}
                                </div>
                            </div>
                        </div>
                        <!-- blog END -->
                    </div>
                    <!-- Blog large img END -->
                    
                    <!-- Side bar start -->
                    <div class="lg:col-span-4 md:col-span-5 col-span-12">
                        <aside class="sticky !top-[100px] block">
                            <!-- Search Widget -->
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Pencarian</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="get" action="{{ url('/posts') }}">
                                        <div class="border border-[#efefef] w-full relative flex flex-wrap items-stretch">
                                            <input name="search" class="text-[15px] h-[45px] py-1.25 px-5 table-cell relative flex-auto w-[1%] leading-5 outline-none" placeholder="Masukkan kata kunci..." type="text">
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
                                                    <a href="/{{ $popular?->category?->slug }}/{{ $popular->slug }}">{{ Str::limit($popular->title, 50) }}</a>
                                                </h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul class="flex items-center">
                                                    <li class="text-[#707070] inline-block text-[13px]">
                                                        {{ \Carbon\Carbon::parse($popular->published_at)->locale('id')->translatedFormat('d M Y') }}
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

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ $page->title }}",
  "description": "{{ strip_tags(Str::limit($page->content, 200)) }}",
  "url": "{{ url()->current() }}",
  "inLanguage": "id-ID",
  "datePublished": "{{ $page->created_at->toIso8601String() }}",
  "dateModified": "{{ $page->updated_at->toIso8601String() }}",
  "publisher": {
    "@type": "Organization",
    "name": "{{ $meta->web_name ?? config('app.name') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ getFile($meta->logo ?? asset('assets/img/logo.png')) }}"
    }
  },
  "mainEntity": {
    "@type": "Article",
    "headline": "{{ $page->title }}",
    "articleBody": "{{ strip_tags($page->content) }}",
    "datePublished": "{{ $page->created_at->toIso8601String() }}",
    "dateModified": "{{ $page->updated_at->toIso8601String() }}"
  }
}
</script>

<!-- BreadcrumbList Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Beranda",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "{{ $page->title }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endpush


