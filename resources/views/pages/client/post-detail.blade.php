@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => $post->title,
        'data' => $post->category->name,
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
                                    <li class="inline-block text-[#707070] font-medium text-[13px] after:content-['|'] after:inline-block after:font-normal after:mx-1 after:opacity-50">
                                        {{ \Carbon\Carbon::parse($post->published_at)->locale('id')->translatedFormat('d M Y') }}
                                    </li>
                                    <li class="inline-block text-[#707070] font-medium text-[13px]">
                                        Oleh <a href="/author/{{ $post->createdBy->slug }}" class="hover:text-primary">{{ $post->createdBy->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-1.25">
                                <h1 class="mb-1.25 md:text-[28px]/[35px] text-[24px]/[28px] font-bold text-black font-nunito">{{ $post->title }}</h1>
                            </div>
                            <div class="rounded-[4px] relative overflow-hidden block align-middle sm:mt-5 group">
                                <img class="w-full h-auto block group-hover:scale-[1.2] duration-[10s]" src="{{ getFile($post->image) }}" alt="{{ $post->title }}">
                            </div>
                            <div class="mt-5 mb-2.5">
                                <div class="text-justify leading-6">
                                    {!! $content !!}
                                </div>
                            </div>
                            
                            <!-- Tags Section -->
                            @if ($post->tags)
                            <div class="mt-5 border-t border-[#E9E9E9] pt-2.5 clear-both">
                                <div class="mx-[-3px]">
                                    @foreach (json_decode($post->tags) as $tag)
                                        @php $tags = App\Models\PostTags::tagById($tag) @endphp
                                        <a class="border border-[#ebedf2] py-0.5 px-2 inline-block uppercase text-[10px] font-medium hover:bg-primary hover:text-white hover:border-primary duration-300" href="/tag/{{ $tags->slug }}">{{ $tags->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                           
                        </div>
                        
                     
                        <!-- blog EN    D -->
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

                            <!-- Recent Posts Widget -->
                            @if(isset($recommended) && $recommended->count() > 0)
                            <div class="mb-7.5">
                                <h6 class="mb-5 text-black font-extrabold leading-[12px] uppercase relative align-middle text-lg font-nunito">Artikel Terkait</h6>
                                <div>
                                    @foreach($recommended->take(3) as $recentPost)
                                    <div class="overflow-hidden mb-2.5 clearfix">
                                        <div class="table-cell align-middle pr-3.75 w-[110px] relative"> 
                                            <img class="w-full h-auto rounded-[4px]" src="{{ getFile($recentPost->image) }}" width="200" height="143" alt="{{ $recentPost->title }}"> 
                                        </div>
                                        <div class="overflow-hidden table-cell align-middle ml-[110px]">
                                            <div class="dlab-post-header">
                                                <h6 class="leading-4 mb-2 capitalize text-[15px] text-black font-bold">
                                                    <a href="/{{ $recentPost?->category?->slug }}/{{ $recentPost->slug }}">{{ Str::limit($recentPost->title, 50) }}</a>
                                                </h6>
                                            </div>
                                            <div class="dlab-post-meta">
                                                <ul class="flex items-center">
                                                    <li class="text-[#707070] inline-block text-[13px]">
                                                        {{ \Carbon\Carbon::parse($recentPost->published_at)->locale('id')->translatedFormat('d M Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

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
  "@type": "Article",
  "headline": "{{ $post->title }}",
  "description": "{{ strip_tags(Str::limit($post->content, 200)) }}",
  "image": {
    "@type": "ImageObject",
    "url": "{{ getFile($post->image) }}",
    "width": 1200,
    "height": 630
  },
  "author": {
    "@type": "Person",
    "name": "{{ $post->createdBy->name }}",
    "url": "{{ url('/author/' . $post->createdBy->slug) }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ $meta->web_name ?? config('app.name') }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ getFile($meta->logo ?? asset('assets/img/logo.png')) }}"
    }
  },
  "datePublished": "{{ $post->published_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
  "articleSection": "{{ $post->category->name }}",
  @if($post->tags)
  "keywords": [
    @foreach(json_decode($post->tags) as $index => $tagId)
      @php $tag = App\Models\PostTags::tagById($tagId) @endphp
      "{{ $tag->name }}"{{ $loop->last ? '' : ',' }}
    @endforeach
  ],
  @endif
  "inLanguage": "id-ID",
  "url": "{{ url()->current() }}"
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
      "name": "{{ $post->category->name }}",
      "item": "{{ url('/' . $post->category->slug) }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $post->title }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endpush

@push('scripts')
<script>
    function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Link berhasil disalin ke clipboard!');
        }).catch(() => {
            alert('Gagal menyalin link');
        });
    }
</script>
@endpush