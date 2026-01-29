@extends('layouts.client.app')

@push('styles')
@endpush

@section('content')
<!-- Services Hero Section -->
<section>
    <div class="lg:py-20 py-8 relative bg-[url('{{ asset('clinet/package/src/assets/images/background/bg1.png') }}'),url('{{ asset('clinet/package/src/assets/images/background/bg2.png') }}')] bg-[position:bottom,_top] bg-no-repeat after:content-[''] after:absolute after:bg-white after:opacity-70 after:top-0 after:left-0 after:size-full bg-[length:100%]">
        <div class="container relative z-[1]">
            <div class="text-center mb-14">
                <h1 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Our Services</h1>
                <h3 class="text-lg font-bold mb-2.5 font-nunito text-black">Professional Beauty & Wellness Services</h3>
                <div class="overflow-hidden">
                    <div class="relative inline-block before:content-[''] before:bg-[url('{{ asset('clinet/package/src/assets/images/line.png') }}')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                    after:content-[''] after:bg-[url('{{ asset('clinet/package/src/assets/images/line1.png') }}')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                        <i class="flaticon-spa text-primary text-4.5xl"></i>
                    </div>
                </div>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5">Discover our comprehensive range of beauty and wellness services designed to help you look and feel your absolute best.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section>
    <div class="lg:py-20 py-8 bg-white">
        <div class="container">
            <div class="grid grid-cols-12 gap-7.5">
                <!-- Facial Treatments -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic1.jpg') }}" alt="Facial Treatments">
                            <i class="flaticon-woman-1 text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="{{ url('facial-treatments') }}">Facial Treatments</a>
                            </h6>
                            <p class="mb-6">Rejuvenate your skin with our professional facial treatments including deep cleansing, anti-aging, and hydrating facials.</p>
                            <a href="{{ url('facial-treatments') }}" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Hair Styling -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic2.jpg') }}" alt="Hair Styling">
                            <i class="flaticon-lotus text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="{{ url('hair-styling') }}">Hair Styling</a>
                            </h6>
                            <p class="mb-6">Transform your look with our expert hair styling services including cuts, colors, highlights, and special occasion styling.</p>
                            <a href="{{ url('hair-styling') }}" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Body Massage -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic3.jpg') }}" alt="Body Massage">
                            <i class="flaticon-candle text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="{{ url('body-massage') }}">Body Massage</a>
                            </h6>
                            <p class="mb-6">Relax and unwind with our therapeutic massage services including Swedish, deep tissue, and hot stone massages.</p>
                            <a href="{{ url('body-massage') }}" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Nail Care -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic4.jpg') }}" alt="Nail Care">
                            <i class="flaticon-candle-1 text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="{{ url('nail-care') }}">Nail Care</a>
                            </h6>
                            <p class="mb-6">Perfect your nails with our comprehensive nail care services including manicures, pedicures, and nail art.</p>
                            <a href="{{ url('nail-care') }}" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Makeup Services -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic1.jpg') }}" alt="Makeup Services">
                            <i class="flaticon-woman-1 text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="{{ url('makeup-services') }}">Makeup Services</a>
                            </h6>
                            <p class="mb-6">Look stunning for any occasion with our professional makeup services for weddings, events, and photoshoots.</p>
                            <a href="{{ url('makeup-services') }}" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Spa Packages -->
                <div class="lg:col-span-4 md:col-span-6 col-span-12 mb-8">
                    <div class="text-center">
                        <div class="relative px-5 pb-0 pt-5 mb-3.5">
                            <img class="rounded-full shadow-cardicon block w-full border-[10px] border-white" src="{{ asset('clinet/package/src/assets/images/our-services/pic2.jpg') }}" alt="Spa Packages">
                            <i class="flaticon-lotus text-4.75xl size-15.5 rounded-full absolute bottom-2.5 right-2.5 bg-white text-primary shadow-xl"></i>
                        </div>
                        <div class="p-2">
                            <h6 class="uppercase text-primary text-lg font-extrabold mb-2.5 font-nunito">
                                <a href="#">Spa Packages</a>
                            </h6>
                            <p class="mb-6">Indulge in our luxurious spa packages combining multiple treatments for the ultimate relaxation experience.</p>
                            <a href="#" class="site-button-secondry">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section>
    <div class="lg:py-20 py-8 bg-[#fef7fe]">
        <div class="container">
            <div class="text-center">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Ready to Book Your Appointment?</h2>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-8">Contact us today to schedule your beauty and wellness session with our expert team.</p>
                <div class="space-x-4">
                    <a href="{{ url('contact') }}" class="site-button">Book Now</a>
                    <a href="tel:{{ $meta->phone ?? '001-234-5678' }}" class="site-button-secondry">Call Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@endpush