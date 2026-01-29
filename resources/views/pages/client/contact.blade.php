@extends('layouts.client.app')

@section('header')
    @include('widget.client.header-section', [
        'segment' => 'Kontak Kami',
        'data' => 'Kontak Kami',
    ])
@endsection

@section('content')
    <!-- Contact Information & Form -->
    <section>
        <div class="lg:py-20 py-8 bg-white">
            <div class="container">
                <div class="text-center md:mb-14">
                    <h2 class="lg:text-4.5xl text-3xl font-extrabold mb-2.5 text-primary font-nunito">Hubungi Kami</h2>
                    <div class="overflow-hidden">
                        <div class="relative inline-block before:content-[''] before:bg-[url('{{ asset('clinet/package/src/assets/images/line.png') }}')] before:absolute before:top-1/2 before:w-20 before:h-3.75 before:-translate-y-1/2 before:bg-[length:auto_100%] before:bg-no-repeat before:bg-center before:left-auto before:right-13.5
                        after:content-[''] after:bg-[url('{{ asset('clinet/package/src/assets/images/line1.png') }}')] after:absolute after:top-1/2 after:w-20 after:h-3.75 after:-translate-y-1/2 after:bg-[length:auto_100%] after:bg-no-repeat after:bg-center after:right-auto after:left-13.5 after:right-13.5">
                            <i class="flaticon-spa text-primary text-4.5xl"></i>
                        </div>
                    </div>
                    <p class="mx-auto max-w-[700px] pt-2.5 text-[#494949] mb-5">Kami siap membantu Anda dengan layanan laboratorium kosmetik terbaik. Hubungi kami untuk konsultasi dan informasi lebih lanjut.</p>
                </div>
            </div>
        </div>
    </section>

  <!-- contact area -->
	<section>
		<div class="md:pt- pt- md:pb-13.5 pd-5 relative">
			<div class="container">
				<div class="grid grid-cols-12 gap-x-7.5">
					<!-- right part start -->
					<div class="xl:col-span-4 lg:col-span-6 col-span-12 lg:flex">
						<div class="p-7.5 border border-[#dee2e6] mb-7.5 contact-area self-stretch">
							<h4 class="mb-2.5 text-[28px]/[35px] font-bold text-black font-nunito">Kunjungi Kami Di</h4>
							<p class="mb-6">Jika Anda memiliki pertanyaan, silakan gunakan detail kontak berikut.</p>
							<ul class="">
								<li class="relative left mb-7.5">
									<div class="float-left mr-5 border border-[#eee] size-4.75 ml-auto table text-center rounded-[3px]"> 
										<span class="table-cell align-middle text-primary">
											<i class="text-xl ti-location-pin"></i>
										</span>
									</div>
									<div class="overflow-hidden">
										<h6 class="text-lg text-black font-bold uppercase font-nunito">Alamat:</h6>
										<p class="leading-6">Gedung 1, Lt 3, Fakultas Farmasi Unpad. Jl. Raya Bandung-Sumedang KM 21 Jatinangor.</p>
									</div>
								</li>
								<li class="relative left mb-7.5">
									<div class="float-left mr-5 border border-[#eee] size-4.75 ml-auto table text-center rounded-[3px]"> 
										<span class="table-cell align-middle text-primary">
											<i class="text-xl ti-email"></i>
										</span> 
									</div>
									<div class="overflow-hidden">
										<h6 class="text-lg text-black font-bold uppercase font-nunito">Email:</h6>
										<p class="leading-6">{{ $meta->email }}</p>
									</div>
								</li>
								<li class="relative left mb-7.5">
									<div class="float-left mr-5 border border-[#eee] size-4.75 ml-auto table text-center rounded-[3px]"> 
										<span class="table-cell align-middle text-primary">
											<i class="text-xl ti-mobile"></i>
										</span>
									</div>
									<div class="overflow-hidden">
										<h6 class="text-lg text-black font-bold uppercase font-nunito">Telepon:</h6>
										<p class="leading-6">{{ $meta->phone_number }}</p>
									</div>
								</li>
								<li class="relative left ">
									<div class="float-left mr-5 border border-[#eee] size-4.75 ml-auto table text-center rounded-[3px]"> 
										<span class="table-cell align-middle text-green-600">
											<i class="text-xl fab fa-whatsapp"></i>
										</span>
									</div>
									<div class="overflow-hidden">
										<h6 class="text-lg text-black font-bold uppercase font-nunito">WhatsApp:</h6>
										<p class="leading-6">
											<a href="https://wa.me/{{ $meta->whatsapp_number }}" target="_blank" class="text-green-600 hover:text-green-700">
												+{{ substr($meta->whatsapp_number, 0, 2) }} {{ substr($meta->whatsapp_number, 2, 3) }}-{{ substr($meta->whatsapp_number, 5, 4) }}-{{ substr($meta->whatsapp_number, 9) }}
											</a>
										</p>
									</div>
								</li>
							</ul>
							<div class="mt-5">
								<ul class="inline-block border-t border-[#eee] pt-5 text-left w-full">
									<li class="inline-block mr-2">
										<a target="_blank" href="{{ $meta->facebook_link }}" class="text-white size-[35px] !leading-[34px] align-middle text-center bg-primary hover:bg-blue-700 duration-300 fa-brands fa-facebook-f"></a>
									</li>
									<li class="inline-block mr-2">
										<a target="_blank" href="{{ $meta->twitter_link }}" class="text-white size-[35px] !leading-[34px] align-middle text-center bg-primary hover:bg-gray-800 duration-300 fa-brands fa-x-twitter"></a>
									</li>
									<li class="inline-block mr-2">
										<a target="_blank" href="{{ $meta->instagram_link }}" class="text-white size-[35px] !leading-[34px] align-middle text-center bg-primary hover:bg-pink-600 duration-300 fa-brands fa-instagram"></a>
									</li>
									<li class="inline-block mr-2">
										<a target="_blank" href="{{ $meta->youtube_link }}" class="text-white size-[35px] !leading-[34px] align-middle text-center bg-primary hover:bg-red-600 duration-300 fa-brands fa-youtube"></a>
									</li>
									<li class="inline-block">
										<a target="_blank" href="https://wa.me/{{ $meta->whatsapp_number }}" class="text-white size-[35px] !leading-[34px] align-middle text-center bg-green-600 hover:bg-green-700 duration-300 fa-brands fa-whatsapp"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- right part END -->
					
					<!-- Left part start -->
					<div class="xl:col-span-4 lg:col-span-6 col-span-12 mb-7.5">
						<div class="p-7.5 border border-[#e1e6eb] clearfix">
							<h4 class="mb-2.5 text-[28px]/[35px] font-bold text-black font-nunito">Kirim Pesan WhatsApp</h4>
							<p class="mb-4 text-gray-600">Kirim pesan langsung ke WhatsApp kami untuk respon yang lebih cepat</p>
							<div class="dzFormMsg"></div>
							<form method="post" class="clearfix clear-both" id="whatsappForm">
								<div class="grid grid-cols-12">
									<div class="col-span-12">
										<div class="mb-6.25">
											<div class="w-full relative flex flex-wrap items-stretch">
												<input name="dzName" id="dzName" type="text" required class="px-5 py-2.5 table-cell relative flex-auto w-[1%] h-13.5 leading-5 text-base text-[#495057] bg-white border border-[#e1e6eb] outline-none hover:border-[silver] duration-500" placeholder="Nama Anda">
											</div>
										</div>
									</div>
									<div class="col-span-12">
										<div class="mb-6.25">
											<div class="w-full relative flex flex-wrap items-stretch"> 
												<input name="dzPhone" id="dzPhone" type="tel" class="px-5 py-2.5 table-cell relative flex-auto w-[1%] h-13.5 leading-5 text-base text-[#495057] bg-white border border-[#e1e6eb] outline-none hover:border-[silver] duration-500" placeholder="Nomor Telepon (Opsional)" >
											</div>
										</div>
									</div>
									 <div class="col-span-12">
										<div class="mb-6.25">
											<div class="w-full relative flex flex-wrap items-stretch">
												<textarea name="dzMessage" id="dzMessage" rows="4" class="px-5 py-2.5 table-cell relative flex-auto w-[1%] h-auto leading-5 text-base text-[#495057] bg-white border border-[#e1e6eb] outline-none hover:border-[silver] duration-500" required placeholder="Pesan Anda..."></textarea>
											</div>
										</div>
									</div>
									<div class="col-span-12">
										<button name="submit" type="submit" value="Submit" class="site-button rounded-none h-13.5 w-full bg-green-600 hover:bg-green-700 duration-300"> 
											<span class="flex items-center justify-center">
												<i class="fab fa-whatsapp mr-2 text-xl"></i>
												Kirim ke WhatsApp
											</span> 
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- Left part END -->
					<div class="xl:col-span-4 col-span-12 mb-7.5">
						<div class="map-container" style="width:100%; height:400px; position:relative;">
							<iframe 
								src="{{ $meta->google_maps }}" 
								class="align-self-stretch" 
								style="border:0; width:100%; height:100%;" 
								allowfullscreen
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade">
							</iframe>
							<div id="map-fallback" style="display:none; width:100%; height:100%; background:#f8f9fa; border:1px solid #dee2e6; position:absolute; top:0; left:0; align-items:center; justify-content:center; flex-direction:column;">
								<i class="ti-location-pin text-primary text-4xl mb-3"></i>
								<p class="text-center text-gray-600">
									<strong>Lokasi Kami:</strong><br>
									Latitude: {{ $meta->latitude }}<br>
									Longitude: {{ $meta->longitude }}<br>
									<a href="https://www.google.com/maps?q={{ $meta->latitude }},{{ $meta->longitude }}" target="_blank" class="text-primary hover:underline mt-2 inline-block">
										Buka di Google Maps
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- contact area  END -->
		
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const whatsappForm = document.getElementById('whatsappForm');
        if (whatsappForm) {
            whatsappForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('dzName').value;
                const phone = document.getElementById('dzPhone').value;
                const message = document.getElementById('dzMessage').value;
                
                if (name && message) {
                    let whatsappMessage = `Halo, saya ${name}`;
                    
                    if (phone) {
                        whatsappMessage += `\nNomor Telepon: ${phone}`;
                    }
                    
                    whatsappMessage += `\n\nPesan:\n${message}`;
                    const encodedMessage = encodeURIComponent(whatsappMessage);
                    const whatsappURL = `https://wa.me/{{ $meta->whatsapp_number }}?text=${encodedMessage}`;
                    window.open(whatsappURL, '_blank');
                    this.reset();
                    alert('WhatsApp akan terbuka dengan pesan yang sudah disiapkan. Silakan klik kirim di WhatsApp.');
                } else {
                    alert('Mohon isi nama dan pesan Anda.');
                }
            });
        }

        const mapIframe = document.querySelector('.map-container iframe');
        const mapFallback = document.getElementById('map-fallback');
        
        if (mapIframe && mapFallback) {
            mapIframe.addEventListener('error', function() {
                this.style.display = 'none';
                mapFallback.style.display = 'flex';
            });
            
            setTimeout(function() {
                try {
                    if (mapIframe.contentDocument === null) {
                        mapIframe.style.display = 'none';
                        mapFallback.style.display = 'flex';
                    }
                } catch (e) {
                    console.log('Maps loaded successfully');
                }
            }, 10000);
        }
    });
    </script>
@endpush