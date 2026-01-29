<!-- Footer start -->
<footer>
    <!-- footer top start -->
    <div class="lg:pt-[80px] lg:pb-5 pt-8 bg-white bg-cover bg-top bg-no-repeat text-black" 
     style="background-image: url('{{ asset('assets/img/imgi_55_bg-expert.png') }}');">
        <div class="container wow fadeIn" data-wow-delay="0.5s">
            <div class="grid grid-cols-12 md:gap-7.5 gap-5">
                <div class="lg:col-span-2 sm:col-span-3 col-span-5">
                    <div class="mb-4.75xl">
                        <h3 class="mb-5 md:text-lg text-base font-bold font-nunito uppercase">Menu</h3>
                        <ul class="mt-1.25">
                            @if($menu->count() > 0)
                                @php
                                    $parents = $menu->where('type_1', 'parent')->take(5);
                                @endphp
                                @foreach($parents as $parent)
                                    <li class="relative py-2.5 pr-2.5 pl-3.75 leading-5 flex gap-2 before:content-['\f105'] before:absolute before:left-0 before:top-2.5 before:text-xxs before:font-['FontAwesome']">
                                        <a class="text-sm" href="{{ $parent->type_2 == 'page' ? url('page/' . $parent->slug) : url($parent->slug) }}">{{ $parent->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>                                                  
                    </div>
                </div>
                <div class="lg:col-span-2 sm:col-span-3 col-span-7">
                    <div class="mb-4.75xl">
                        <h3 class="mb-5 md:text-lg text-base font-bold font-nunito uppercase">Kategori</h3>
                        <ul class="mt-1.25">
                           @if($menu->count() > 5)
                                @php
                                    $categories = \App\Models\PostCategory::inRandomOrder()->take(5)->get();
                                @endphp

                                @foreach($categories as $parent)
                                    <li class="relative py-2.5 pr-2.5 pl-3.75 leading-5 flex gap-2 before:content-['\f105'] before:absolute before:left-0 before:top-2.5 before:text-xxs before:font-['FontAwesome']">
                                        <a class="text-sm" href="{{ $parent->slug }}">
                                            {{ $parent->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-4 sm:col-span-6 col-span-12">
                    <div class="widget widget_getintuch">
                        <h3 class="md:mb-7.5 mb-2.5 md:text-lg text-base font-bold font-nunito uppercase">Contact us</h3>
                        <ul class="mt-1.25">
                            @if($meta->address ?? false)
                            <li class="mb-5 relative pl-4.75 text-black text-sm/[22px] font-lato">
                                <i class="bg-transparent text-xl absolute left-0 top-1.25 text-center text-[22px] size-7.5 !leading-[30px] ti-location-pin"></i>
                                <strong class="font-bold text-sm">ADDRESS</strong><br>
                                {{ $meta->address }}
                            </li>
                            @endif
                            @if($meta->phone ?? false)
                            <li class="mb-5 relative pl-4.75 text-black text-sm/[22px] font-lato">
                                <i class="bg-transparent text-xl absolute left-0 top-1.25 text-center text-[22px] size-7.5 !leading-[30px] ti-mobile"></i>
                                <strong class="font-bold text-sm">PHONE</strong><br>
                                {{ $meta->phone }}
                            </li>
                            @endif
                            @if($meta->email ?? false)
                            <li class="mb-5 relative pl-4.75 text-black text-sm/[22px] font-lato">
                                <i class="bg-transparent text-xl absolute left-0 top-1.25 text-center text-[22px] size-7.5 !leading-[30px] ti-email"></i>
                                <strong class="font-bold text-sm">EMAIL</strong><br>
                                {{ strtoupper($meta->email) }}
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-4 col-span-12">
                    <div class="mb-4.75">
                        <!-- Logo Section -->
                        <div class="mb-6">
                            <a href="{{ url('/') }}" class="inline-block">
                                <img src="{{ getFile($meta->logo) ?? asset('clinet/package/src/assets/images/logo-black.png') }}" 
                                     alt="{{ $meta->web_name ?? 'Logo' }}" 
                                     class="h-12 w-auto object-contain">
                            </a>
                        </div>
                        
                        <!-- Web Description -->
                        @if($meta->web_description ?? false)
                        <p class="mb-5 text-sm leading-6 text-gray-600">{{ $meta->web_description }}</p>
                        @else
                        <p class="mb-5 text-sm leading-6 text-gray-600">{{ $meta->web_name ?? 'Laboratorium Kosmetik' }} - Solusi terpercaya untuk pengujian dan pengembangan produk kosmetik dengan standar internasional.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end -->
    
    <!--footer bottom start -->
    <div class="py-6.25 text-center" style="background-color: #228fe7; color: white;">
        <div class="container">
            <div class="grid grid-cols-12">
                <div class="sm:col-span-6 col-span-12 text-center md:text-left">
                    <span class=" text-sm capitalize">Copyright ©</span>
                    <span class="current-year text-sm">{{ now()->format('Y') }}</span>
                    <a href="{{ $meta->domain ?? '#' }}" class="text-sm   font-semibold hover:text-primary hover:duration-500 duration-500" target="_blank">{{ $meta->web_name ?? 'BeautyZone' }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom end -->
</footer>
<!-- Footer end -->