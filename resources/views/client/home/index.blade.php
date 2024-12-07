@extends('client.layouts.master')
@section('title', 'Home')
@section('body')

{{--  brand controller  --}}
    <section class="relative pb-28 xl:pb-36 pt-44 xl:pt-52" id="home">
        <div class="absolute top-0 left-0 size-64 bg-custom-500 opacity-10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 size-64 bg-purple-500/10 blur-3xl"></div>
        @foreach($brandLimit as $brand)
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-12 gap-5 2xl:grid-cols-12">
                <div class="col-span-12 xl:col-span-5 2xl:col-span-5">
                    <h1 class="mb-4 !leading-normal lg:text-5xl 2xl:text-6xl dark:text-zinc-100" data-aos="fade-right" data-aos-delay="300">{{ $brand->name }} 2024</h1>
                    <p class="text-lg mb-7 text-slate-500 dark:text-zinc-400" data-aos="fade-right" data-aos-delay="600">In 2024, metallics will be taking over the sneaker world. I love this trend because there are so many different ways to wear it. You can wear sequined sneakers, white sneakers with metallic accents, or all-over silver.</p>
                    <div class="flex items-center gap-2" data-aos="fade-right" data-aos-delay="800">
                        <button type="button" class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">Shop Now <i data-lucide="shopping-cart" class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></button>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-7 2xl:col-start-8 2xl:col-span-6">
                    <div class="relative mt-10 xl:mt-0">
                        <div class="absolute text-center -top-20 xl:-right-40 lg:text-[10rem] 2xl:text-[14rem] text-slate-100 dark:text-zinc-800/60 font-tourney" data-aos="zoom-in-down" data-aos-delay="1400">
                            Unique Fashion
                        </div>
                        <img src="../assets/images/offer.png" alt="" class="absolute h-40 left-10 xl:-left-10 top-32" data-aos="fade-down-right" data-aos-delay="900" data-aos-easing="linear">
                        <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                            <button data-tooltip="default" data-tooltip-content="$199.99" class="absolute items-center justify-center hidden bg-white rounded-full size-8 xl:flex bottom-20 text-slate-800 left-20"><i data-lucide="plus"></i></button>
                            <img src="../assets/images/product-home.png" alt="" class="mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section><!--end -->
{{--  brand controller  --}}

    <section class="relative py-24 xl:py-32" id="product">
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="mx-auto text-center xl:max-w-3xl">
                <h1 class="mb-0 leading-normal capitalize">Our Latest Product</h1>
            </div>
            <div class="grid grid-cols-1 gap-5 mt-12 md:grid-cols-2 xl:grid-cols-4">
                @foreach($product as $key => $list)
                    <div class="p-5 rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900" data-aos="fade-up" data-aos-easing="linear">
                    <img src="{{ Storage::url($list->image) }}" style="mix-blend-mode: darken" alt="" class="mx-auto h-52">
                    <div class="mt-3">
                        <p class="mb-3"><i data-lucide="star" class="inline-block text-yellow-500 align-middle size-4 ltr:mr-1 rtl:ml-1"></i> (4.8)</p>
                        <h5><a href="../client/home/detail/{{ $list->id }}/color/{{ $list->firstVariant }}">{{ $list->name }}</a></h5>

                        <div class="flex items-center gap-3 mt-3">
                            <h6 class="text-16 grow">${{ $list->variant->first()->price_sale }}</h6>
                            <div class="shrink-0">
                                <button type="button" class="px-2 py-1.5 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div><!--end-->
                @endforeach
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end -->

    <section class="relative py-24 xl:py-32" id="features">
        <div class="absolute top-0 left-0 size-64 bg-purple-500/10 blur-3xl"></div>
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-1 gap-6 mt-20 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <h1 class="mb-3 leading-normal capitalize" data-aos="fade-right" data-aos-delay="400">Explore our flagship product and discover its unique features</h1>
                    <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-right" data-aos-delay="500">Whatever your running gait, a good pair of running shoes will provide flexibility, durability, and support.</p>
                    <ul class="flex flex-col gap-2 mb-6 list-disc list-inside text-15" data-aos="fade-right" data-aos-delay="500">
                        <li>Matches Your Foot Shape & Type</li>
                        <li>Easy to Wear</li>
                        <li>Heels That You Can Wear</li>
                        <li>Good Quality & Condition</li>
                        <li>Segments of Solid Rubber</li>
                    </ul>
                    <a href="#!" class="text-custom-500 text-16" data-aos="fade-right" data-aos-delay="600">Shopping Now <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></a>
                </div><!--end col-->
                <div class="relative lg:col-start-8 lg:col-span-7">
                    <div class="absolute right-0 bg-center bg-cover bottom-40 w-52 h-96 bg-[url('../images/product/cta-2.png')] rounded-md" data-aos="fade-left" data-aos-delay="400">
                        <div class="absolute inset-0 bg-gradient-to-b from-purple-500/30 to-white dark:to-zinc-900 from-30%"></div>
                    </div>
                    <div class="mr-16">
                        <img src="../assets/images/cta.png" alt="" class="relative inline-block" data-aos="fade-up-right">
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end -->

    <section class="relative py-24 xl:py-32" id="about">
        <div class="absolute bottom-0 right-0 size-64 bg-custom-500/10 blur-3xl"></div>
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-1 gap-6 mt-20 lg:grid-cols-12">
                <div class="relative lg:col-span-5">
                    <div class="relative before:absolute before:h-full before:w-full before:border-[15px] before:border-double before:border-green-500/10 before:-top-16 lg:before:-right-16" data-aos="zoom-out-up">
                        <img src="../assets/images/about.jpg" alt="" class="relative inline-block rounded-md" data-aos="zoom-out-up" data-aos-delay="500">
                    </div>
                </div><!--end col-->
                <div class="ml-auto lg:col-span-5 lg:col-start-8">
                    <p class="mb-2 text-purple-500 text-15" data-aos="fade-left" data-aos-delay="300">About Us</p>
                    <h1 class="mb-3 leading-normal capitalize" data-aos="fade-left" data-aos-delay="400">We Provide high Quality shoes</h1>
                    <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">Look for a shoe with solid construction that will give your feet the support they need. Next, look for quality materials that will make your feet comfortable and keep them healthy.</p>
                    <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">Low-quality shoes may skimp on stitching, or use low quality glue that's prone to coming apart. A higher-quality shoe will use advanced construction to ensure that the shoe holds up over time, and also eliminate any spots.</p>
                    <button type="button" class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500" data-aos="fade-left" data-aos-delay="600">Explore Now <i data-lucide="move-right" class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></button>
                </div><!--end col-->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end -->

    <section class="relative py-24 xl:py-32" id="feedback">
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="mx-auto mb-8 text-center xl:max-w-3xl">
                <h1 class="mb-0 leading-normal capitalize">What Our Customer Says</h1>
            </div>
            <!-- Swiper -->
            <div class="pb-6 swiper feedback-slider">
                <div class="swiper-wrapper">
                    @foreach($comment as $key => $list)
                        <div class="swiper-slide">
                        <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                            <div class="mx-auto rounded-full size-20 bg-custom-500/10">
                                <img src="../assets/images/avatar-2.png" alt="" class="rounded-full size-20">
                            </div>
                            <p class="mt-6 text-16">" {{ $list->comment }}. "</p>
                            <h6 class="mt-4 mb-1 text-15">{{ $list->user->name }}</h6>
                            <div class="text-yellow-500">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $list->rating)
                                        <i class="ri-star-fill"></i>
                                    @endif
                                @endfor

                            </div>
                        </div>
                    </div>
                    @endforeach
                 </div>
                <div class="swiper-pagination"></div>
            </div>
        </div><!--end container-->
    </section><!--end -->

    <section class="relative py-20 border-t border-slate-200 dark:border-zinc-800">
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-1 gap-5 lg:grid-cols-12">
                <div class="lg:col-span-8" data-aos="fade-right">
                    <h1 class="mb-4 leading-normal capitalize">Sign up for update & newsletter</h1>
                    <p class="text-lg text-slate-500 dark:text-zinc-400">Tell us which describes you, and we'll get in touch with next steps.</p>
                </div>
                <div class="ltr:lg:text-right rtl:lg:text-left lg:col-span-4">
                    <form action="#!" class="relative" data-aos="fade-left">
                        <input type="email" id="subscribeInput" class="py-3 ltr:pr-40 rtl:pl-40 bg-slate-100 dark:bg-zinc-800/40 form-input text-slate-200 border-slate-200 dark:border-zinc-800 focus:outline-none focus:border-custom-500 dark:focus:border-custom-500 placeholder:text-slate-500 dark:placeholder:text-zinc-400 backdrop-blur-md" autocomplete="off" placeholder="starcode@starcodekh.com" required="">
                        <button type="submit" class="absolute px-6 py-2 text-base transition-all duration-200 ease-linear border-0 ltr:right-1 rtl:left-1 text-custom-50 btn top-1 bottom-1 bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div><!--end container-->
    </section>
@endsection
