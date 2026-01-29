@if ($menu->count() > 0)
<!-- header start -->
<header class="relative z-10 block">
    <div class="bg-primary border-b text-white md:block hidden py-[11px]">
        <div class="container">
            <div class="flex flex-wrap justify-between">
                <div class="float-left">
                    <ul class="flex gap-1.5">
                        <li class="mr-3.75 inline-block"><i class="fa-solid fa-phone mr-1.25"></i> <a href="tel:{{ $meta->phone_number ?? '001 1234 6789' }}">{{ $meta->phone_number ?? '001 1234 6789' }}</a></li>
                        <li class="mr-3.75 inline-block"><i class="fa-solid fa-at mr-1.25"></i> {{ $meta->email ?? '6701 Democracy Blvd, Suite 300, USA' }}</li>
                    </ul>
                </div>
                <div class="topbar-social float-right">
                    <ul class="flex">
                        @if($meta->facebook ?? false)
                        <li class="inline-block">
                            <a target="_blank" href="{{ $meta->facebook }}" class="hover:text-[#3b5998] duration-500 px-1.5 inline-block">
                                <i class="fa-brands fa-facebook-f ml-2.5"></i>
                            </a>
                        </li>
                        @endif
                        @if($meta->instagram ?? false)
                        <li class="inline-block">
                            <a target="_blank" href="{{ $meta->instagram }}" class="hover:text-[#de4e43] duration-500 px-1.5 inline-block">
                                <i class="fa-brands fa-instagram ml-2.5"></i>
                            </a>
                        </li>
                        @endif
                        @if($meta->twitter ?? false)
                        <li class="inline-block">
                            <a target="_blank" href="{{ $meta->twitter }}" class="hover:text-black duration-500 px-1.5 inline-block">
                                <i class="fa-brands fa-x-twitter ml-2.5"></i>
                            </a>
                        </li>
                        @endif
                        @if($meta->youtube ?? false)
                        <li class="inline-block">
                            <a target="_blank" href="{{ $meta->youtube }}" class="hover:text-[#de4e43] duration-500 px-1.5 inline-block">
                                <i class="fa-brands fa-youtube ml-2.5"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header -->
    <div class="sticky-header">
        <div class="main-bar clearfix">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="max-lg:w-[110px] lg:w-[190px] absolute lg:left-1/2 lg:text-center h-20 table float-left align-middle z-10 duration-500 lg:-translate-x-1/2">
                    <a href="{{ url('/') }}" class="table-cell lg:align-middle">
                        <img class="w-[140px] z-[2] object-contain relative inline-block" src="{{ getFile($meta->logo) ?? asset('clinet/package/src/assets/images/logo-black.png') }}" alt="{{ $meta->web_name ?? 'BeautyZone' }}">
                    </a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler relative lg:hidden w-5 h-4.5 relative rotate-0 duration-500 ease-in-out cursor-pointer md:mt-6.25 mt-4.5 md:mb-4.5 mb-3.5 md:ml-3.75 ml-2.5 float-right" type="button">
                    <span class="block absolute h-0.5 w-full rounded-[1px] opacity-100 left-0 rotate-0 bg-[#666] duration-200 ease-in-out top-0"></span>
                    <span class="block absolute h-0.5 w-full rounded-[1px] opacity-100 left-0 rotate-0 bg-[#666] duration-200 ease-in-out top-[7px]"></span>
                    <span class="block absolute h-0.5 w-full rounded-[1px] opacity-100 left-0 rotate-0 bg-[#666] duration-200 ease-in-out top-3.5"></span>
                </button>
                <!-- main nav -->
                <div class="Navigationbar lg:flex relative lg:justify-between max-lg:justify-end max-lg:fixed max-lg:h-full max-lg:top-0 max-lg:left-[-300px] max-lg:bg-white max-lg:z-10 max-lg:w-72 max-lg:overflow-y-scroll max-lg:duration-700">
                    <div class="max-lg:block lg:hidden border-b border-[rgb(213_204_204)] max-lg:py-5 max-lg:px-3.75">
                        <a href="{{ url('/') }}" class="flex justify-center">
                            <img class="w-[140px] z-[2] object-contain relative" src="{{ getFile($meta->logo) ?? asset('clinet/package/src/assets/images/logo-black.png') }}" alt="{{ $meta->web_name ?? 'BeautyZone' }}">
                        </a>
                    </div>
                    
                    @php
                        $parents = $menu->where('type_1', 'parent');
                        $menuItems = $menu->groupBy('parent_id');
                        $menuCount = $parents->count();
                        $halfCount = ceil($menuCount / 2);
                        $firstHalf = $parents->take($halfCount);
                        $secondHalf = $parents->skip($halfCount);
                    @endphp

                    <ul class="lg:flex lg:justify-between lg:w-[35%]">    
                        @foreach ($firstHalf as $parent)
                            @php
                                $submenus = $menuItems[$parent->id] ?? collect();
                                $hasSubmenus = $submenus->count() > 0;
                            @endphp
                            <li class="collapse-btn1 max-lg:border-b max-lg:border-[rgb(213_204_204)] uppercase relative group">
                                <a href="{{ $parent->type_2 == 'page' ? url('page/' . $parent->slug) : url($parent->slug) }}" class="text-[15px] lg:py-7.5 lg:px-3 font-semibold text-black inline-block max-lg:py-2.5 max-lg:px-3.75 lg:group-hover:text-primary duration-500 max-lg:flex max-lg:justify-between max-lg:items-center">
                                    {{ $parent->name }}
                                    @if ($hasSubmenus)
                                        <i class="!text-[9px] ml-[3px] mt-[-3px] align-middle fa fa-chevron-down"></i>
                                    @endif
                                </a>
                                @if ($hasSubmenus)
                                    <ul class="dropdown-item hidden lg:block bg-white border-t border-primary lg:left-0 lg:opacity-0 lg:py-2.5 lg:absolute lg:invisible lg:w-[220px] z-10 lg:shadow-[0_0_40px_rgba(0,_0,_0,_.2)] lg:group-hover:visible max-lg:bg-[#f6f6f6] lg:group-hover:opacity-100 lg:group-hover:mt-0 duration-500 text-left">
                                        @foreach ($submenus as $submenu)
                                            <li class="relative">
                                                <a href="{{ $submenu->type_2 == 'page' ? url('page/' . $submenu->slug) : url($submenu->slug) }}" class="text-[#505050] block text-sm py-2 px-5 capitalize duration-150 font-montserrat font-medium ease-linear hover:bg-[#F2F2F2] hover:text-primary">
                                                    {{ $submenu->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>    
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    
                    <ul class="lg:flex lg:justify-between lg:w-[35%]">    
                        @foreach ($secondHalf as $parent)
                            @php
                                $submenus = $menuItems[$parent->id] ?? collect();
                                $hasSubmenus = $submenus->count() > 0;
                            @endphp
                            <li class="collapse-btn1 max-lg:border-b max-lg:border-[rgb(213_204_204)] uppercase relative group">
                                <a href="{{ $parent->type_2 == 'page' ? url('page/' . $parent->slug) : url($parent->slug) }}" class="max-lg:py-2.5 max-lg:px-3.75 rounded-none text-black text-3.75 lg:py-7.5 lg:px-3 cursor-pointer font-semibold inline-block lg:group-hover:text-primary duration-500 max-lg:flex max-lg:justify-between max-lg:items-center">
                                    {{ $parent->name }}
                                    @if ($hasSubmenus)
                                        <i class="ml-[4px] mt-[-3px] align-middle fa fa-chevron-down !text-[9px]"></i>
                                    @endif
                                </a>
                                @if ($hasSubmenus)
                                    <ul class="dropdown-item hidden bg-white lg:block lg:left-0 lg:opacity-0 lg:py-2.5 lg:absolute lg:invisible lg:w-[220px] z-10 border-t border-primary lg:shadow-[0_0_40px_rgba(0,_0,_0,_.2)] lg:group-hover:visible max-lg:bg-[#f6f6f6] lg:group-hover:opacity-100 lg:group-hover:mt-0 duration-500 text-left">
                                        @foreach ($submenus as $submenu)
                                            <li class="relative">
                                                <a href="{{ $submenu->type_2 == 'page' ? url('page/' . $submenu->slug) : url($submenu->slug) }}" class="text-[#505050] block text-sm py-2 px-5 capitalize duration-150 font-montserrat font-medium ease-linear hover:bg-[#F2F2F2] hover:text-primary">
                                                    {{ $submenu->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header end -->

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.navbar-toggler');
    const navMenu = document.querySelector('.Navigationbar');
    
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('max-lg:left-[-300px]');
            navMenu.classList.toggle('max-lg:left-0');
        });
    }
});
</script>
@endpush
@endif