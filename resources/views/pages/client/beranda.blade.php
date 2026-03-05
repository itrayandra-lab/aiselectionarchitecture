@extends('layouts.client.app')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "{{ $meta->web_name ?? 'Labcos' }}",
  "url": "{{ url('/') }}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ url('/search') }}?qr={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "{{ $meta->web_name ?? 'Labcos' }}",
  "image": "{{ getFile($meta->logo) }}",
  "@id": "{{ url('/') }}",
  "url": "{{ url('/') }}",
  "telephone": "{{ $meta->phone_number ?? '' }}",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "ID"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "08:00",
    "closes": "17:00"
  },
  "sameAs": [
    @if(!empty($meta->facebook_link))"{{ $meta->facebook_link }}",@endif
    @if(!empty($meta->instagram_link))"{{ $meta->instagram_link }}",@endif
    @if(!empty($meta->youtube_link))"{{ $meta->youtube_link }}",@endif
    @if(!empty($meta->twitter_link))"{{ $meta->twitter_link }}"@endif
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "{{ url('/') }}"
  }]
}
</script>
@endpush

@push('styles')
<style>
.icon-wrapper {
    position: relative;
    z-index: 1;
}

.icon-editor-card {
    opacity: 0;
    visibility: hidden;
    transform: translateX(-50%) translateY(10px);
    transition: all 0.3s ease;
    pointer-events: none;
    z-index: 9999 !important;
}

/* Show card on hover when in edit mode */
.edit-mode-active .icon-wrapper:hover .icon-editor-card {
    opacity: 1 !important;
    visibility: visible !important;
    transform: translateX(-50%) translateY(0) !important;
    pointer-events: auto !important;
    display: block !important;
}

/* Keep card visible when hovering over it */
.edit-mode-active .icon-editor-card:hover {
    opacity: 1 !important;
    visibility: visible !important;
    pointer-events: auto !important;
}

.icon-editor-card::before {
    content: '';
    position: absolute;
    top: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 8px solid #ff69b4;
}

.icon-editor-card input:focus {
    outline: none;
    border-color: #ff69b4;
    box-shadow: 0 0 0 3px rgba(255, 105, 180, 0.1);
}

/* Edit mode indicator for icons */
.edit-mode-active .icon-display {
    cursor: pointer;
    transition: all 0.3s ease;
}

.edit-mode-active .icon-wrapper:hover .icon-display {
    transform: scale(1.1);
    color: #ff69b4 !important;
}

/* Increase z-index for hovered service box */
.edit-mode-active [data-service-index]:hover {
    z-index: 100 !important;
}

/* Editable content styles */
.editable-content[contenteditable="true"],
.editable-service[contenteditable="true"] {
    transition: all 0.3s ease;
}

.editable-content[contenteditable="true"]:hover,
.editable-service[contenteditable="true"]:hover {
    background-color: rgba(255, 105, 180, 0.05);
}

/* Hover hint for icons in edit mode */
.edit-mode-active .icon-wrapper::after {
    content: 'Hover to edit';
    position: absolute;
    bottom: -25px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 11px;
    color: #ff69b4;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s ease;
    font-weight: 600;
    background: white;
    padding: 2px 8px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.edit-mode-active .icon-wrapper:hover::after {
    opacity: 1;
}

#services-section .container {
    overflow: visible !important;
}

#services-section .grid {
    overflow: visible !important;
}

#services-section [data-service-index] > div {
    overflow: visible !important;
}

/* Why Section Image Upload Overlay */
.image-wrapper-section {
    position: relative;
}

.image-upload-overlay-1,
.image-upload-overlay-2 {
    transition: all 0.3s ease;
    cursor: pointer;
}

.image-upload-overlay-1:hover,
.image-upload-overlay-2:hover {
    background-color: rgba(0, 0, 0, 0.7) !important;
}

.image-upload-overlay-1 label,
.image-upload-overlay-2 label {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Editable Why Content */
.editable-why-content[contenteditable="true"],
.editable-why-feature[contenteditable="true"] {
    transition: all 0.3s ease;
}

.editable-why-content[contenteditable="true"]:hover,
.editable-why-feature[contenteditable="true"]:hover {
    background-color: rgba(255, 105, 180, 0.05);
}

/* Why Section Edit Buttons - Make sure they're visible */
#why-section-1 > div > div:first-child,
#why-section-2 > div > div:first-child {
    position: absolute !important;
    top: 1rem !important;
    right: 1rem !important;
    z-index: 100 !important;
}

#why-section-1 button,
#why-section-2 button {
    display: inline-flex !important;
    align-items: center !important;
    gap: 0.5rem !important;
}

/* CTA Section Editable Content */
.editable-cta-content[contenteditable="true"] {
    transition: all 0.3s ease;
}

.editable-cta-content[contenteditable="true"]:hover {
    background-color: rgba(255, 105, 180, 0.05);
}

/* CTA Button Editor */
#cta-button-editor {
    transition: all 0.3s ease;
}

#cta-button-editor input:focus {
    outline: none;
    border-color: #ff69b4;
    box-shadow: 0 0 0 3px rgba(255, 105, 180, 0.1);
}

/* News Section Editable Content */
.editable-news-content[contenteditable="true"] {
    transition: all 0.3s ease;
}

.editable-news-content[contenteditable="true"]:hover {
    background-color: rgba(255, 105, 180, 0.05);
}
</style>
@endpush

@section('content')
<section>
    <div class="page-content bg-white">
        <div class="main-banner relative">
            <div class="swiper home-slider1 benner-swiper-button !h-[50vh] lg:!h-[86vh]">
                <div class="swiper-wrapper">
                    @foreach($heros as $item)
                    <div class="swiper-slide bg-no-repeat bg-cover bg-[50%] relative" 
                         style="background-image: url('{{ getFile($item->image) }}');">
                        
                        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%); pointer-events: none;"></div>
                        
                        <div class="px-3.75 relative lg:w-[1200px] md:w-[720px] sm:w-[540px] w-full !h-60vh mx-auto max-md:text-center top-1/2 -translate-y-1/2" style="z-index: 10;">
                            
                            <div style="max-width: 850px; text-align: left;">
                                
                                <h1 class="md:text-[65px] sm:text-[50px] text-3xl leading-10 md:leading-[80px] sm:leading-[60px] font-extrabold font-nunito capitalize" 
                                    style="color: white !important; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); margin-bottom: 10px;">
                                    {!! $item->title !!}
                                </h1>
                                
                                <div class="sm:text-lg max-sm:px-4.75 text-sm md:leading-[28px] leading-[20px] font-medium font-nunito py-5" 
                                     style="color: rgba(255, 255, 255, 0.95) !important; text-shadow: 1px 1px 5px rgba(0,0,0,0.5);">
                                    {!! $item->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next !text-white"></div>
                <div class="swiper-button-prev !text-white"></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Services start -->
<section id="services-section" data-section-id="{{ $servicesSection->id }}" data-section-unique="services_section">
    <div class="md:py-20 py-7.5 relative">
        @auth
        <!-- Edit Button for Logged In Users -->
        <div class="absolute top-4 right-5 z-50">
            <button onclick="toggleServiceEditMode()" class="bg-primary text-white px-4 py-2 rounded-lg shadow-lg hover:bg-opacity-90 transition m-4">
                <i class="fa fa-edit mr-2"></i>
                <span id="service-edit-mode-text">Edit Mode</span>
            </button>
        </div>
        @endauth
        
        <div class="container relative z-[1]">
            <div class="text-center mb-14">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito editable-content" 
                    contenteditable="false" 
                    data-field="title">
                    {{ $servicesSection->content['title'] ?? 'layanan labcos' }}
                </h2>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5 editable-content" 
                   contenteditable="false" 
                   data-field="description">
                    {{ $servicesSection->content['description'] ?? 'Solusi lengkap untuk pengembangan dan pengujian produk kosmetik dengan standar internasional dan teknologi terdepan.' }}
                </p>
            </div>
            <div class="grid grid-cols-12">
                @foreach($servicesSection->content['services'] ?? [] as $index => $service)
                <!-- Service {{ $index + 1 }} -->
                <div class="lg:col-span-6 md:col-span-6 col-span-12 max-lg:px-3.75 max-lg:mb-7.5" data-service-index="{{ $index }}">
                    <div class="md:border-r md:border-b border-[#80808036] relative hover:z-10 text-center p-7.5 hover:bg-white hover:shadow-[0_0_10px_0_rgba(0,0,0,.1)] hover:scale-105 duration-500 hover:border-white max-lg:border-none max-lg:shadow-[0_0_10px_0_rgba(0,0,0,.1)]">
                        <div class="w-20 mb-5 inline-block align-center relative icon-wrapper">
                            <a href="#!" class="icon-cell text-primary">
                                <i class="{{ $service['icon'] ?? 'fas fa-flask' }} text-6xl align-middle icon-display"></i>
                            </a>
                            <!-- Icon Editor Card (Hidden by default, shown on hover in edit mode) -->
                            <div class="icon-editor-card hidden absolute top-full left-1/2 transform -translate-x-1/2 mt-2 bg-white p-4 rounded-lg shadow-xl z-50 border-2 border-pink-400" style="width: 380px; max-height: 450px; overflow-y: auto;">
                                <div class="mb-3">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fa fa-icons mr-1"></i> Change Icon
                                    </label>
                                    <input type="text" 
                                           class="icon-input w-full px-3 py-2 text-sm border-2 border-gray-300 rounded-lg focus:border-pink-400 focus:outline-none transition" 
                                           data-field="services.{{ $index }}.icon"
                                           value="{{ $service['icon'] ?? 'fas fa-flask' }}"
                                           placeholder="e.g., fas fa-flask">
                                </div>
                                
                                <div class="text-xs text-gray-600 bg-gray-50 p-3 rounded mb-2">
                                    <strong class="block mb-2 text-sm">Quick Select Icons:</strong>
                                    <div class="grid grid-cols-4 gap-2 max-h-72 overflow-y-auto">
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-flask" title="Flask">
                                            <i class="fas fa-flask text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Flask</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-microscope" title="Microscope">
                                            <i class="fas fa-microscope text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Microscope</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-vial" title="Vial">
                                            <i class="fas fa-vial text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Vial</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-vials" title="Vials">
                                            <i class="fas fa-vials text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Vials</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-prescription-bottle" title="Bottle">
                                            <i class="fas fa-prescription-bottle text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Bottle</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-pump-soap" title="Soap">
                                            <i class="fas fa-pump-soap text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Soap</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-spray-can" title="Spray">
                                            <i class="fas fa-spray-can text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Spray</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-certificate" title="Certificate">
                                            <i class="fas fa-certificate text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Certificate</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-award" title="Award">
                                            <i class="fas fa-award text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Award</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-user-tie" title="Consultant">
                                            <i class="fas fa-user-tie text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Consultant</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-clipboard-check" title="Check">
                                            <i class="fas fa-clipboard-check text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Check</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-file-medical" title="Medical">
                                            <i class="fas fa-file-medical text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Medical</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-heartbeat" title="Health">
                                            <i class="fas fa-heartbeat text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Health</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-shield-alt" title="Shield">
                                            <i class="fas fa-shield-alt text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Shield</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-leaf" title="Natural">
                                            <i class="fas fa-leaf text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Natural</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-seedling" title="Organic">
                                            <i class="fas fa-seedling text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Organic</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-atom" title="Science">
                                            <i class="fas fa-atom text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Science</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-dna" title="DNA">
                                            <i class="fas fa-dna text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">DNA</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-hand-holding-heart" title="Care">
                                            <i class="fas fa-hand-holding-heart text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Care</span>
                                        </button>
                                        <button type="button" class="icon-quick-select flex flex-col items-center gap-1 p-2 bg-white border border-gray-300 rounded hover:border-pink-400 hover:bg-pink-50 transition" data-icon="fas fa-star" title="Star">
                                            <i class="fas fa-star text-2xl text-pink-500"></i>
                                            <span class="text-[9px]">Star</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="text-xs text-center text-gray-500 mt-2">
                                    <i class="fa fa-info-circle mr-1"></i>
                                    Click an icon to select or type Font Awesome class above
                                    <div class="mt-1">
                                        <a href="https://fontawesome.com/icons" target="_blank" class="text-pink-500 hover:underline">
                                            Browse all Font Awesome icons →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <h3 class="text-2xl text-black mb-2.5 font-bold font-nunito editable-service" 
                                contenteditable="false" 
                                data-field="services.{{ $index }}.title">
                                <a href="#!">{{ $service['title'] ?? 'Service Title' }}</a>
                            </h3>
                            <p class="mb-6 editable-service" 
                               contenteditable="false" 
                               data-field="services.{{ $index }}.description">
                                {{ $service['description'] ?? 'Service description here.' }}
                            </p>
                        </div>
                    </div>	
                </div>
                @endforeach
            </div>	
        </div>
    </div>
</section>
<!-- Our Services end -->

<!-- Why Our Clients start -->
<section id="why-section-1" data-section-id="{{ $whySection1->id }}" data-section-unique="why_section_1" class="relative">		
    <div class="md:py-20 py-7.5 relative bg-white bg-cover" style="background-image: url('{{ asset('assets/img/imgi_57_bg-footer.png') }}');">
        @auth
        <!-- Edit Button for Logged In Users -->
        <div class="absolute top-4 right-4 z-[100]">
            <button onclick="toggleWhyEditMode(1)" class="bg-primary text-white px-4 py-2 rounded-lg shadow-lg hover:bg-opacity-90 transition">
                <i class="fa fa-edit mr-2"></i>
                <span id="why-edit-mode-text-1">Edit Mode</span>
            </button>
        </div>
        @endauth
        <div class="container">
            <div class="grid grid-cols-12 gap-x-7.5">
                <div class="lg:col-span-5 col-span-12 mb-7.5 self-center">
                    <div class="table-cell align-middle mb-7.5">							
                        <h2 class="md:text-4.5xl text-[30px] font-extrabold leading-[48px] text-[#232323] font-nunito mt-0 mb-2.5 editable-why-content" 
                            contenteditable="false" 
                            data-field="title">
                            {{ $whySection1->content['title'] ?? 'Pengalaman Expert dengan Hasil Terbaik' }}
                        </h2>
                        <p class="font-bold text-lg mb-3.75 text-[#232323] font-nunito editable-why-content" 
                           contenteditable="false" 
                           data-field="description">
                            {{ $whySection1->content['description'] ?? 'Labcos menggabungkan pengalaman luas dan keahlian teknis untuk membantu brand kosmetik mencapai standar kualitas tertinggi dengan hasil yang nyata.' }}
                        </p>
                        <ul class="text-3.75 font-Montserrat mb-5">
                            @foreach($whySection1->content['features'] ?? [] as $index => $feature)
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f] editable-why-feature" 
                                contenteditable="false" 
                                data-index="{{ $index }}">
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-7 col-span-12 lg:ml-15.5">
                    <div class="relative flex-wrap flex items-center image-wrapper-section">
                        <div class="w-12 inline-block px-2.5 relative">
                            <img class="section-image-1" 
                                 src="{{ getFile($whySection1->content['image'] ?? 'assets/img/About-expert.webp') }}" 
                                 alt="Expert Image">
                            
                            <!-- Image Upload Overlay (Hidden by default) -->
                            <div class="image-upload-overlay-1 hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg">
                                <label class="cursor-pointer text-white text-center">
                                    <i class="fas fa-camera text-4xl mb-2"></i>
                                    <p class="text-sm">Click to change image</p>
                                    <input type="file" 
                                           class="image-upload-input hidden" 
                                           accept="image/*"
                                           data-section-id="{{ $whySection1->id }}"
                                           data-section-number="1">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="why-section-2" data-section-id="{{ $whySection2->id }}" data-section-unique="why_section_2" class="relative">		
    <div class="md:py-20 py-7.5 relative bg-white bg-cover" style="background-image: url('{{ asset('assets/img/imgi_55_bg-expert.png') }}');">
        @auth
        <!-- Edit Button for Logged In Users -->
        <div class="absolute top-4 right-4 z-[100]">
            <button onclick="toggleWhyEditMode(2)" class="bg-primary text-white px-4 py-2 rounded-lg shadow-lg hover:bg-opacity-90 transition">
                <i class="fa fa-edit mr-2"></i>
                <span id="why-edit-mode-text-2">Edit Mode</span>
            </button>
        </div>
        @endauth
        <div class="container">
            <div class="grid grid-cols-12 gap-x-7.5">
                <div class="lg:col-span-7 col-span-12 lg:ml-15.5">
                    <div class="relative flex-wrap flex items-center image-wrapper-section">
                        <div class="w-12 inline-block px-2.5 relative">
                            <img class="border-8 border-white shadow-frame section-image-2" 
                                 style="border-radius: 20px;" 
                                 src="{{ getFile($whySection2->content['image'] ?? 'assets/img/why-chooce-min-1.webp') }}" 
                                 alt="Why Choose Us">
                            
                            <!-- Image Upload Overlay (Hidden by default) -->
                            <div class="image-upload-overlay-2 hidden absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg">
                                <label class="cursor-pointer text-white text-center">
                                    <i class="fas fa-camera text-4xl mb-2"></i>
                                    <p class="text-sm">Click to change image</p>
                                    <input type="file" 
                                           class="image-upload-input hidden" 
                                           accept="image/*"
                                           data-section-id="{{ $whySection2->id }}"
                                           data-section-number="2">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 col-span-12 mb-7.5 self-center">
                    <div class="table-cell align-middle mb-7.5">							
                        <h2 class="md:text-4.5xl text-[30px] font-extrabold leading-[48px] text-[#232323] font-nunito mt-0 mb-2.5 editable-why-content" 
                            contenteditable="false" 
                            data-field="title">
                            {{ $whySection2->content['title'] ?? 'Kenapa memilih kami ?' }}
                        </h2>
                        <p class="font-bold text-lg mb-3.75 text-[#232323] font-nunito editable-why-content" 
                           contenteditable="false" 
                           data-field="description">
                            {{ $whySection2->content['description'] ?? 'Kami Berkomitmen Menjadi Mitra Strategis dalam Memastikan Produk Anda Mencapai Standar Kualitas Terbaik' }}
                        </p>
                        <ul class="text-3.75 font-Montserrat mb-5">
                            @foreach($whySection2->content['features'] ?? [] as $index => $feature)
                            <li class="relative p-1.25 pl-7.5 before:content-['\e628'] before:absolute before:font-['themify'] before:left-0 before:top-1.25 before:block before:text-3.75 before:text-[#777] text-[#6f6f6f] editable-why-feature" 
                                contenteditable="false" 
                                data-index="{{ $index }}">
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Our Clients end -->
    

<!-- Call to Action -->
<section id="cta-section" data-section-id="{{ $ctaSection->id }}" data-section-unique="cta_section" class="relative">
    <div class="lg:py-20 py-8 bg-[#fef7fe]">
        @auth
        <!-- Edit Button for Logged In Users -->
        <div class="absolute top-4 right-5 z-[100]">
            <button onclick="toggleCtaEditMode()" class="bg-primary text-white px-4 py-2 rounded-lg shadow-lg hover:bg-opacity-90 transition">
                <i class="fa fa-edit mr-2"></i>
                <span id="cta-edit-mode-text">Edit Mode</span>
            </button>
        </div>
        @endauth
        
        <div class="container">
            <div class="text-center">
                <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito editable-cta-content" 
                    contenteditable="false" 
                    data-field="title">
                    {{ $ctaSection->content['title'] ?? 'Siap Mengembangkan Produk Kosmetik Anda?' }}
                </h2>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-8 editable-cta-content" 
                   contenteditable="false" 
                   data-field="description">
                    {{ $ctaSection->content['description'] ?? 'Hubungi tim ahli kami untuk konsultasi gratis dan dapatkan solusi terbaik untuk kebutuhan pengujian dan pengembangan produk kosmetik Anda.' }}
                </p>
                <div class="text-center">
                    <div class="space-x-4">
                        <a href="{{ $ctaSection->content['button_url'] ?? '#' }}" class="site-button-secondry">{{ $ctaSection->content['button_text'] ?? 'Hubungi Kami' }}</a>
                    </div>
                </div>
                
                <!-- Button Editor (Hidden by default, positioned below) -->
                <div id="cta-button-editor" class="hidden mt-6 max-w-md mx-auto">
                    <div class="bg-white p-4 rounded-lg shadow-lg border-2 border-pink-400 text-left">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa fa-text mr-1"></i> Teks Button
                        </label>
                        <input type="text" 
                               id="cta-button-text-input" 
                               class="w-full px-3 py-2 text-sm border-2 border-gray-300 rounded-lg focus:border-pink-400 focus:outline-none transition mb-3" 
                               value="{{ $ctaSection->content['button_text'] ?? 'Hubungi Kami' }}"
                               placeholder="Teks Button">
                        
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fa fa-link mr-1"></i> URL Button
                        </label>
                        <input type="text" 
                               id="cta-button-url-input" 
                               class="w-full px-3 py-2 text-sm border-2 border-gray-300 rounded-lg focus:border-pink-400 focus:outline-none transition" 
                               value="{{ $ctaSection->content['button_url'] ?? '#' }}"
                               placeholder="https://...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section Our Professional Team start -->
	
<section id="news-section" data-section-id="{{ $newsSection->id }}" data-section-unique="news_section" class="relative">
    <div class="lg:pt-20 lg:pb-13.5 py-8 relative bg-[position:bottom,_top] bg-no-repeat bg-[length:100%] after:content-[''] after:absolute after:bg-white after:opacity-70 after:top-0 after:left-0 after:size-full after:z-0"
     style="background-image: url('{{ asset('assets/img/imgi_55_bg-expert.png') }}'), url('{{ asset('assets/img/imgi_55_bg-expert.png') }}');">
        @auth
        <!-- Edit Button for Logged In Users -->
        <div class="absolute top-4 right-5" style="z-index: 99999">
            <button onclick="toggleNewsEditMode()" class="bg-primary text-white px-4 py-2 rounded-lg shadow-lg hover:bg-opacity-90 transition">
                <i class="fa fa-edit mr-2"></i>
                <span id="news-edit-mode-text">Edit Mode</span>
            </button>
        </div>
        @endauth
        
        <div class="container relative z-[1]">
            <div class="text-center mb-14">
                <h2 class="lg:text-4.5xl text-3xl font-bold text-primary font-nunito mb-2.5 editable-news-content" 
                    contenteditable="false" 
                    data-field="title">
                    {{ $newsSection->content['title'] ?? 'Wawasan & Berita Terbaru' }}
                </h2>
                <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5 font-lato editable-news-content" 
                   contenteditable="false" 
                   data-field="description">
                    {{ $newsSection->content['description'] ?? 'Temukan informasi terkini seputar inovasi produk, tren pasar kecantikan, dan panduan regulasi langsung dari tim ahli Labcos untuk mendukung kesuksesan brand Anda.' }}
                </p>
            </div>
            <div class="blog-carousel owl-carousel owl-btn-center-lr owl-btn-3 owl-theme owl-btn-center-lr owl-btn-1">
                @foreach ($latestPost as $item)
                    <div class="item md:mb-4.75">
                        <div>
                            <img class="rounded-[4px]" src="{{ getFile($item->image) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="mb-1.25 px-1.25 pt-4">
                            <ul class="flex items-center -mx-1 capitalize font-montserrat">
                                <li class="inline-block text-[#707070] font-medium text-[13px]">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                                </li>
                            </ul>
                        </div>
                        <div class="mb-1.25">
                            <h3 class="text-xl text-[#232323] leading-8 font-bold hover:text-primary duration-500 font-nunito">
                                <a href="/{{ $item?->category?->slug }}/{{ $item->slug }}">{{ $item->title }}</a>
                            </h3>
                        </div>
                        <div class="relative"> 
                            <a href="/{{ $item?->category?->slug }}/{{ $item->slug }}" title="Lihat Selengkapnya" rel="bookmark" class="text-[#171717] border-b-[2px] text-sm hover:text-primary hover:duration-500 duration-500 inline-block font-normal">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
        <div class="text-center">
            <div class="space-x-4">
                <a href="/posts" class="site-button-secondry">Lihat Artikel Lainnya</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
let isServiceEditMode = false;

function toggleServiceEditMode() {
    isServiceEditMode = !isServiceEditMode;
    const section = document.getElementById('services-section');
    const editables = document.querySelectorAll('#services-section .editable-content, #services-section .editable-service');
    const button = document.getElementById('service-edit-mode-text');
    
    // Toggle edit mode class on section
    if (isServiceEditMode) {
        section.classList.add('edit-mode-active');
        console.log('Edit mode activated');
    } else {
        section.classList.remove('edit-mode-active');
        console.log('Edit mode deactivated');
    }
    
    // Toggle text editables
    editables.forEach(el => {
        el.contentEditable = isServiceEditMode;
        if (isServiceEditMode) {
            el.style.outline = '2px dashed #ff69b4';
            el.style.padding = '5px';
        } else {
            el.style.outline = 'none';
            el.style.padding = '';
        }
    });
    
    button.textContent = isServiceEditMode ? 'Save Changes' : 'Edit Mode';
    
    if (!isServiceEditMode) {
        saveServiceSection();
    }
}

// Update icon when input changes
document.addEventListener('DOMContentLoaded', function() {
    const iconInputs = document.querySelectorAll('.icon-input');
    const iconWrappers = document.querySelectorAll('.icon-wrapper');
    const quickSelectButtons = document.querySelectorAll('.icon-quick-select');
    
    console.log('Found ' + iconWrappers.length + ' icon wrappers');
    console.log('Found ' + iconInputs.length + ' icon inputs');
    console.log('Found ' + quickSelectButtons.length + ' quick select buttons');
    
    // Handle quick select buttons
    quickSelectButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const iconClass = this.dataset.icon;
            const card = this.closest('.icon-editor-card');
            const input = card.querySelector('.icon-input');
            const serviceIndex = card.closest('[data-service-index]').dataset.serviceIndex;
            const iconDisplay = card.closest('[data-service-index]').querySelector('.icon-display');
            
            console.log('Quick selecting icon: ' + iconClass);
            
            // Update input value
            input.value = iconClass;
            
            // Get all current classes
            const currentClasses = Array.from(iconDisplay.classList);
            
            // Remove Font Awesome AND Flaticon classes
            const filteredClasses = currentClasses.filter(cls => {
                // Remove fas, far, fab, fa-*, flaticon-*
                return !cls.match(/^(fas|far|fab|fa-|flaticon-)/);
            });
            
            // Clear all classes
            iconDisplay.className = '';
            
            // Add back non-icon classes (text-6xl, align-middle, etc)
            filteredClasses.forEach(cls => {
                iconDisplay.classList.add(cls);
            });
            
            // Add new icon classes
            const classes = iconClass.split(' ');
            classes.forEach(cls => {
                if (cls) iconDisplay.classList.add(cls);
            });
            
            console.log('Updated classes:', iconDisplay.className);
            
            // Visual feedback
            this.style.backgroundColor = '#fce7f3';
            setTimeout(() => {
                this.style.backgroundColor = '';
            }, 300);
        });
    });
    
    // Add hover event listeners to icon wrappers
    iconWrappers.forEach((wrapper, index) => {
        wrapper.addEventListener('mouseenter', function() {
            const section = document.getElementById('services-section');
            if (section.classList.contains('edit-mode-active')) {
                console.log('Hovering icon wrapper ' + index);
                const card = this.querySelector('.icon-editor-card');
                if (card) {
                    console.log('Showing card for icon ' + index);
                }
            }
        });
        
        wrapper.addEventListener('mouseleave', function(e) {
            // Check if mouse is moving to the card
            const card = this.querySelector('.icon-editor-card');
            if (card && !card.contains(e.relatedTarget)) {
                console.log('Mouse left icon wrapper ' + index);
            }
        });
    });
    
    iconInputs.forEach(input => {
        input.addEventListener('input', function() {
            const serviceIndex = this.closest('[data-service-index]').dataset.serviceIndex;
            const iconDisplay = this.closest('[data-service-index]').querySelector('.icon-display');
            
            console.log('Updating icon for service ' + serviceIndex + ' to: ' + this.value);
            
            // Get all current classes
            const currentClasses = Array.from(iconDisplay.classList);
            
            // Remove Font Awesome AND Flaticon classes
            const filteredClasses = currentClasses.filter(cls => {
                // Remove fas, far, fab, fa-*, flaticon-*
                return !cls.match(/^(fas|far|fab|fa-|flaticon-)/);
            });
            
            // Clear all classes
            iconDisplay.className = '';
            
            // Add back non-icon classes
            filteredClasses.forEach(cls => {
                iconDisplay.classList.add(cls);
            });
            
            // Add new icon classes
            const newIconClass = this.value.trim();
            if (newIconClass) {
                // Split the class (e.g., "fas fa-flask" into ["fas", "fa-flask"])
                const classes = newIconClass.split(' ');
                classes.forEach(cls => {
                    if (cls) iconDisplay.classList.add(cls);
                });
            }
            
            console.log('Updated classes:', iconDisplay.className);
        });
        
        // Prevent card from closing when clicking inside
        input.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
    
    // Prevent card from closing when clicking on it
    document.querySelectorAll('.icon-editor-card').forEach(card => {
        card.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        card.addEventListener('mouseenter', function() {
            console.log('Mouse entered card');
        });
    });
});

function saveServiceSection() {
    const section = document.getElementById('services-section');
    const sectionId = section.dataset.sectionId;
    
    // Get title and description
    const title = document.querySelector('[data-field="title"]').textContent.trim();
    const description = document.querySelector('[data-field="description"]').textContent.trim();
    
    // Get all services
    const services = [];
    document.querySelectorAll('[data-service-index]').forEach((serviceEl, index) => {
        const titleEl = serviceEl.querySelector('[data-field^="services."][data-field$=".title"]');
        const descEl = serviceEl.querySelector('[data-field^="services."][data-field$=".description"]');
        const iconInput = serviceEl.querySelector('.icon-input');
        
        services.push({
            icon: iconInput ? iconInput.value.trim() : 'fas fa-flask',
            title: titleEl ? titleEl.textContent.trim() : '',
            description: descEl ? descEl.textContent.trim() : ''
        });
    });
    
    console.log('Saving services:', services);
    
    // Prepare content object
    const content = {
        title: title,
        description: description,
        services: services
    };
    
    // Show loading
    Swal.fire({
        title: 'Saving...',
        text: 'Please wait while we save your changes',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Send AJAX request
    fetch('{{ route("sections.update-inline") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            section_id: sectionId,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Section updated successfully!',
                confirmButtonColor: '#ff69b4',
                confirmButtonText: 'OK'
            }).then(() => {
                // Reload page to show updated content
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to update section: ' + data.message,
                confirmButtonColor: '#ff69b4'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'An error occurred while saving. Please try again.',
            confirmButtonColor: '#ff69b4'
        });
    });
}

// Why Section Edit Mode
let isWhyEditMode = {1: false, 2: false};

function toggleWhyEditMode(sectionNumber) {
    isWhyEditMode[sectionNumber] = !isWhyEditMode[sectionNumber];
    const section = document.getElementById('why-section-' + sectionNumber);
    const editables = section.querySelectorAll('.editable-why-content, .editable-why-feature');
    const button = document.getElementById('why-edit-mode-text-' + sectionNumber);
    const imageOverlay = section.querySelector('.image-upload-overlay-' + sectionNumber);
    
    // Toggle editables
    editables.forEach(el => {
        el.contentEditable = isWhyEditMode[sectionNumber];
        if (isWhyEditMode[sectionNumber]) {
            el.style.outline = '2px dashed #ff69b4';
            el.style.padding = '5px';
        } else {
            el.style.outline = 'none';
            el.style.padding = '';
        }
    });
    
    // Toggle image overlay
    if (imageOverlay) {
        if (isWhyEditMode[sectionNumber]) {
            imageOverlay.classList.remove('hidden');
        } else {
            imageOverlay.classList.add('hidden');
        }
    }
    
    button.textContent = isWhyEditMode[sectionNumber] ? 'Simpan Perubahan' : 'Edit Mode';
    
    if (!isWhyEditMode[sectionNumber]) {
        saveWhySection(sectionNumber);
    }
}

// Handle image upload for Why sections
document.addEventListener('DOMContentLoaded', function() {
    const imageInputs = document.querySelectorAll('.image-upload-input');
    
    imageInputs.forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            const sectionId = this.dataset.sectionId;
            const sectionNumber = this.dataset.sectionNumber;
            
            if (!file) return;
            
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type',
                    text: 'Please upload a valid image file (jpeg, png, jpg, gif, webp)',
                    confirmButtonColor: '#ff69b4'
                });
                return;
            }
            
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File Too Large',
                    text: 'Image size must be less than 2MB',
                    confirmButtonColor: '#ff69b4'
                });
                return;
            }
            
            // Show loading
            Swal.fire({
                title: 'Uploading...',
                text: 'Please wait while we upload your image',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Upload image
            const formData = new FormData();
            formData.append('image', file);
            formData.append('section_id', sectionId);
            
            fetch('{{ route("sections.upload-image") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update image preview
                    const img = document.querySelector('.section-image-' + sectionNumber);
                    if (img) {
                        img.src = '/storage/' + data.path;
                    }
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Image uploaded successfully!',
                        confirmButtonColor: '#ff69b4'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed',
                        text: data.message,
                        confirmButtonColor: '#ff69b4'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred while uploading. Please try again.',
                    confirmButtonColor: '#ff69b4'
                });
            });
        });
    });
});

function saveWhySection(sectionNumber) {
    const section = document.getElementById('why-section-' + sectionNumber);
    const sectionId = section.dataset.sectionId;
    
    // Get title and description
    const titleEl = section.querySelector('[data-field="title"]');
    const descEl = section.querySelector('[data-field="description"]');
    
    const title = titleEl ? titleEl.textContent.trim() : '';
    const description = descEl ? descEl.textContent.trim() : '';
    
    // Get all features
    const features = [];
    section.querySelectorAll('.editable-why-feature').forEach(featureEl => {
        const text = featureEl.textContent.trim();
        if (text) {
            features.push(text);
        }
    });
    
    // Get current image path (we don't change it here, only via upload)
    const img = section.querySelector('.section-image-' + sectionNumber);
    const currentImageSrc = img ? img.getAttribute('src') : '';
    
    // Extract path from src (remove domain/storage prefix if present)
    let imagePath = currentImageSrc;
    if (imagePath.includes('/storage/')) {
        imagePath = imagePath.split('/storage/')[1];
    } else if (imagePath.includes('assets/')) {
        imagePath = imagePath.split('assets/')[1];
        imagePath = 'assets/' + imagePath;
    }
    
    console.log('Saving why section ' + sectionNumber + ':', {title, description, features, imagePath});
    
    // Prepare content object
    const content = {
        title: title,
        description: description,
        image: imagePath,
        features: features
    };
    
    // Show loading
    Swal.fire({
        title: 'Menyimpan...',
        text: 'Mohon tunggu sementara kami menyimpan perubahan',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Send AJAX request
    fetch('{{ route("sections.update-inline") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            section_id: sectionId,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Section berhasil diperbarui!',
                confirmButtonColor: '#ff69b4',
                confirmButtonText: 'OK'
            }).then(() => {
                // Reload page to show updated content
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gagal memperbarui section: ' + data.message,
                confirmButtonColor: '#ff69b4'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat menyimpan. Silakan coba lagi.',
            confirmButtonColor: '#ff69b4'
        });
    });
}

// CTA Section Edit Mode
let isCtaEditMode = false;

function toggleCtaEditMode() {
    isCtaEditMode = !isCtaEditMode;
    const section = document.getElementById('cta-section');
    const editables = section.querySelectorAll('.editable-cta-content');
    const button = document.getElementById('cta-edit-mode-text');
    const buttonEditor = document.getElementById('cta-button-editor');
    
    console.log('CTA Edit Mode:', isCtaEditMode);
    
    // Check if all elements exist
    if (!section || !button || !buttonEditor) {
        console.error('Missing elements:', {
            section: !!section,
            button: !!button,
            buttonEditor: !!buttonEditor
        });
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Elemen tidak ditemukan. Silakan refresh halaman.',
            confirmButtonColor: '#ff69b4'
        });
        return;
    }
    
    // Toggle editables
    editables.forEach(el => {
        el.contentEditable = isCtaEditMode;
        if (isCtaEditMode) {
            el.style.outline = '2px dashed #ff69b4';
            el.style.padding = '5px';
        } else {
            el.style.outline = 'none';
            el.style.padding = '';
        }
    });
    
    // Toggle button editor (TIDAK mengubah style button asli)
    if (isCtaEditMode) {
        buttonEditor.classList.remove('hidden');
    } else {
        buttonEditor.classList.add('hidden');
    }
    
    button.textContent = isCtaEditMode ? 'Simpan Perubahan' : 'Edit Mode';
    
    if (!isCtaEditMode) {
        saveCtaSection();
    }
}

function saveCtaSection() {
    const section = document.getElementById('cta-section');
    const sectionId = section.dataset.sectionId;
    
    // Get title and description
    const titleEl = section.querySelector('[data-field="title"]');
    const descEl = section.querySelector('[data-field="description"]');
    
    const title = titleEl ? titleEl.textContent.trim() : '';
    const description = descEl ? descEl.textContent.trim() : '';
    
    // Get button text and URL
    const buttonText = document.getElementById('cta-button-text-input').value.trim();
    const buttonUrl = document.getElementById('cta-button-url-input').value.trim();
    
    console.log('Saving CTA section:', {title, description, buttonText, buttonUrl});
    
    // Prepare content object
    const content = {
        title: title,
        description: description,
        button_text: buttonText,
        button_url: buttonUrl
    };
    
    // Show loading
    Swal.fire({
        title: 'Menyimpan...',
        text: 'Mohon tunggu sementara kami menyimpan perubahan',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Send AJAX request
    fetch('{{ route("sections.update-inline") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            section_id: sectionId,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Section berhasil diperbarui!',
                confirmButtonColor: '#ff69b4',
                confirmButtonText: 'OK'
            }).then(() => {
                // Reload page to show updated content
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gagal memperbarui section: ' + data.message,
                confirmButtonColor: '#ff69b4'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat menyimpan. Silakan coba lagi.',
            confirmButtonColor: '#ff69b4'
        });
    });
}

// News Section Edit Mode
let isNewsEditMode = false;

function toggleNewsEditMode() {
    isNewsEditMode = !isNewsEditMode;
    const section = document.getElementById('news-section');
    const editables = section.querySelectorAll('.editable-news-content');
    const button = document.getElementById('news-edit-mode-text');
    
    console.log('News Edit Mode:', isNewsEditMode);
    
    // Check if all elements exist
    if (!section || !button) {
        console.error('Missing elements:', {
            section: !!section,
            button: !!button
        });
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Elemen tidak ditemukan. Silakan refresh halaman.',
            confirmButtonColor: '#ff69b4'
        });
        return;
    }
    
    // Toggle editables
    editables.forEach(el => {
        el.contentEditable = isNewsEditMode;
        if (isNewsEditMode) {
            el.style.outline = '2px dashed #ff69b4';
            el.style.padding = '5px';
        } else {
            el.style.outline = 'none';
            el.style.padding = '';
        }
    });
    
    button.textContent = isNewsEditMode ? 'Simpan Perubahan' : 'Edit Mode';
    
    if (!isNewsEditMode) {
        saveNewsSection();
    }
}

function saveNewsSection() {
    const section = document.getElementById('news-section');
    const sectionId = section.dataset.sectionId;
    
    // Get title and description
    const titleEl = section.querySelector('[data-field="title"]');
    const descEl = section.querySelector('[data-field="description"]');
    
    const title = titleEl ? titleEl.textContent.trim() : '';
    const description = descEl ? descEl.textContent.trim() : '';
    
    console.log('Saving News section:', {title, description});
    
    // Prepare content object
    const content = {
        title: title,
        description: description
    };
    
    // Show loading
    Swal.fire({
        title: 'Menyimpan...',
        text: 'Mohon tunggu sementara kami menyimpan perubahan',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Send AJAX request
    fetch('{{ route("sections.update-inline") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            section_id: sectionId,
            content: content
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Section berhasil diperbarui!',
                confirmButtonColor: '#ff69b4',
                confirmButtonText: 'OK'
            }).then(() => {
                // Reload page to show updated content
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gagal memperbarui section: ' + data.message,
                confirmButtonColor: '#ff69b4'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Terjadi kesalahan saat menyimpan. Silakan coba lagi.',
            confirmButtonColor: '#ff69b4'
        });
    });
}
</script>
@endpush
