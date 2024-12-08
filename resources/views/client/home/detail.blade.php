@extends('client.layouts.master')
@section('title', 'Detail')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

                <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                        @if(session('message'))
                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                <span class="font-bold">{{ session('message') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                <span class="font-bold">{{ session('error') }}</span>
                            </div>
                        @endif
                        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                            <div class="grow">
                                <h5 class="text-16">Overview</h5>
                            </div>

                            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                    <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                                </li>
                                <li class="text-slate-700 dark:text-zink-100">
                                    details
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                            <div class="xl:col-span-4">
                                <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="grid grid-cols-1 gap-5 md:grid-cols-12">
                                                <div class="rounded-md md:col-span-8 md:row-span-2 bg-slate-100 dark:bg-zink-600">
                                                    <img src="{{ Storage::url($product->image) }}" style="width: 271px;" alt="">
                                                </div>
                                                @foreach($image as $img)
                                                    <div class="rounded-md md:col-span-4 bg-slate-100 dark:bg-zink-600">
                                                        <img src="{{ Storage::url($img->file_path) }}" alt="">
                                                    </div>
                                                @endforeach

                                            </div>

                                            <div class="flex gap-2 mt-4 shrink-0">
                                                <a href="apps-ecommerce-cart.html" type="button" class="w-full bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i data-lucide="shopping-cart" class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Add to Cart</span></a>
                                                <button type="button" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">Buy Now</button>
                                            </div>

                                            <div class="flex items-center gap-3 mt-3 justify-evenly">
                                                <a href="#!" class="transition-all duration-300 ease-linear hover:text-custom-500"><i data-lucide="repeat" class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Compare</span></a>
                                                <a href="#!" data-modal-target="askQuestionModal" class="transition-all duration-300 ease-linear hover:text-custom-500"><i data-lucide="help-circle" class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Ask a Question</span></a>
                                                <a href="#!" data-modal-target="shareModal" class="transition-all duration-300 ease-linear hover:text-custom-500"><i data-lucide="share-2" class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Share</span></a>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                    <div class="card">
                                        <div class="border-b card-body border-slate-200 dark:border-zink-500">
                                            <div class="flex">
                                                <h6 class="grow text-15"><i data-lucide="store" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">StarCode Kh</span></h6>
                                                <div class="shrink-0">
                                                    <i data-lucide="star" class="inline-block text-yellow-500 size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">(4.8)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="flex">
                                                <h6 class="grow text-15"><i data-lucide="map-pin" class="inline-block text-orange-500 size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">California, USA</span></h6>
                                                <div class="shrink-0">
                                                    <button type="button" class="px-2.5 py-2 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">View Store</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div>
                            </div><!--end col-->
                            <div class="xl:col-span-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="relative ltr:float-right rtl:float-left dropdown">
                                            <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="categoryNotes1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="categoryNotes1">
                                                <li>
                                                    <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="apps-ecommerce-product-create.html"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                </li>
                                                <li>
                                                    <a data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-sky-100 border-sky-100 text-sky-500 dark:bg-sky-400/20 dark:border-transparent"> New Arrivals</span>
                                        <h5 class="mt-3 mb-1">{{ $product->name }}</h5>
                                        <ul class="flex flex-wrap items-center gap-4 mb-5 text-slate-500 dark:text-zink-200">
                                            <li><a href="#!" class="font-medium underline text-custom-500">{{ $product->category->name }}</a></li>
                                            <li>Seller: <a href="#!" class="font-medium">{{ $product->brand->name }}</a></li>
                                            <li>Published: <span class="font-medium">{{ $product->updated_at }}</span></li>
                                        </ul>

                                        <div class="flex flex-wrap items-center gap-3 mb-4">
                                            <div class="flex items-center gap-2 text-yellow-500">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-half-line"></i>

                                                <div class="text-slate-800 dark:text-zink-50 shrink-0">
                                                    <h6>(4.8)</h6>
                                                </div>
                                            </div>
                                            <div class="shrink-0">
                                                <h6>{{ $product->review->count() }} Reviews</h6>
                                            </div>
                                            <div class="shrink-0">
                                                <h6>1,231 Sold</h6>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <p class="mb-1 text-green-500">Special Price</p>
                                            <h4>${{ $priceVariant->price_sale }} <small class="font-normal line-through align-middle text-slate-500 dark:text-zink-200">${{ $priceVariant->price }}</small> <small class="text-green-500 align-middle">{{ round(($priceVariant->price - $priceVariant->price_sale) / $priceVariant->price * 100) }}% ON</small></h4>
                                        </div>
                                        <form action="../client/cart/add" method="post">
                                            @csrf
                                            <h6 class="mb-3 text-15">Select Color</h6>
                                            <div class="flex flex-wrap items-center gap-2">
                                                @foreach($product->variant as $key => $color)
                                                    <a href="../client/home/detail/{{ $product->id }}/color/{{ $color->id }}" class="color inline-block align-middle {{ $colorClasses[$color->color->name]  ?? '' }} border border-orange-500 rounded-sm appearance-none cursor-pointer size-5  checked:{{ $colorClasses[$color->color->name] ?? '' }} disabled:opacity-75 disabled:cursor-default @if($variant == $color->id) checkA @endif"></a>
                                                    @if($variant == $color->id)
                                                        <input type="hidden" name="color_id" value="{{ $color->color->id }}">
                                                    @endif
                                                @endforeach
                                            </div>

                                            <h6 class="mt-5 mb-3 text-15">Select Size</h6>
                                            <div class="flex flex-wrap items-center gap-2">
                                                @foreach($product->variant as $key => $size)
                                                    <div>
                                                        <input id="selectSize{{ $size->size->name }}" class="hidden peer" type="radio" value="{{ $size->size->id }}" name="size_id">
                                                        <label for="selectSize{{ $size->size->name }}" class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">{{ $size->size->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="flex gap-2 mt-4 shrink-0">
                                                <div class="inline-flex text-center input-step">
                                                    <button type="button" onclick="decrease()" class="border size-9 leading-[15px] minusBtn bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                                    <input type="number" name="quantity" id="numberCounter" class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="1" min="1" max="{{ $product->variant->first()->quantity }}" readonly="">
                                                    <button type="button" onclick="increase()" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l size-9 border-slate-200 plusBtn text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                                </div>
                                            </div>

                                            <div class="flex gap-2 mt-4 shrink-0">

                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="product_variant_id" value="{{ $priceVariant->id }}">
                                            <button type="submit" id="add-to-cart" data-product-id="{{ $product->id }}" class="w-full bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20">
                                                <i data-lucide="shopping-cart" class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i>
                                                <span class="align-middle">Add to Cart</span>
                                            </button>

                                            <button type="button" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">Buy Now</button>
                                        </div>
                                        </form>

                                        <h6 class="mt-5 mb-3 text-15">Available Offers (4)</h6>
                                        <ul class="flex flex-col gap-2">
                                            <li><i data-lucide="tag" class="inline-block text-green-500 size-4 ltr:mr-1 rtl:ml-1 fill-green-200 dark:fill-green-500/20"></i> <span class="font-semibold">Bank Offer</span> 10% Instant Discount on Paypal, up to $1250 on orders of $5,000 and above <a href="#!" class="underline text-custom-500">T&C</a></li>
                                            <li><i data-lucide="tag" class="inline-block text-green-500 size-4 ltr:mr-1 rtl:ml-1 fill-green-200 dark:fill-green-500/20"></i> <span class="font-semibold">Special Price</span> Get at flat $199 <a href="#!" class="underline text-custom-500">T&C</a></li>
                                            <li><i data-lucide="tag" class="inline-block text-green-500 size-4 ltr:mr-1 rtl:ml-1 fill-green-200 dark:fill-green-500/20"></i> <span class="font-semibold">Partner Offer</span> Purchase now & get 1 surprise cashback coupon in Future <a href="#!" class="underline text-custom-500">Know More</a></li>
                                            <li><i data-lucide="tag" class="inline-block text-green-500 size-4 ltr:mr-1 rtl:ml-1 fill-green-200 dark:fill-green-500/20"></i> <span class="font-semibold">Bank Offer</span> UPI Offer Men's Clothing <a href="#!" class="underline text-custom-500">T&C</a></li>
                                        </ul>

                                        <div class="grid grid-cols-1 gap-5 my-5 xl:grid-cols-3">
                                            <div class="flex items-center gap-5 p-4 border rounded-md border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center justify-center">
                                                    <i data-lucide="truck" class="w-6 h-6 text-slate-500 fill-slate-200 dark:text-zink-200 dark:fill-zink-500"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Estimated Delivery</h6>
                                                    <p class="text-slate-500 dark:text-zink-200">01 - 07 Dec, 2023</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5 p-4 border rounded-md border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center justify-center">
                                                    <i data-lucide="container" class="w-6 h-6 text-slate-500 fill-slate-200 dark:text-zink-200 dark:fill-zink-500"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Free Shipping & Returns</h6>
                                                    <p class="text-slate-500 dark:text-zink-200">On all orders over $200.00</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <h6 class="mb-3 text-15">Product Description:</h6>
                                            <p class="mb-2 text-slate-500 dark:text-zink-200">{{ $product->description }}.</p>
                                            <p class="text-slate-500 dark:text-zink-200"><b>Avoid shapeless and baggy clothing</b>. {{ $product->content }}!</p>
                                        </div>

                                        <div class="mt-5">
                                            <h6 class="mb-3 text-15">Features:</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Type</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">{{ $product->brand->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Sleeve</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">{{ $product->category->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Trending</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">@if($product->is_trending == 1)
                                                                <span class="px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-sky-100 border-sky-100 text-sky-500 dark:bg-sky-400/20 dark:border-transparent"> New Arrivals</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Fabric</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">Cotton Blend</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Pack of</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">1</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Product Code</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">TWT{{ $product->id }}</td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <th class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">Ideal for</th>--}}
{{--                                                        <td class="px-3.5 py-2.5 border-b border-transparent">Women</td>--}}
{{--                                                    </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <h6 class="mt-5 mb-3 text-15">Ratings & Reviews</h6>
                                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                            <div class="xl:col-span-4">
                                                <div class="border border-dashed rounded-md border-slate-200 dark:border-zink-500">
                                                    <div class="p-5">
                                                        <div class="text-center">
                                                            <h5 class="mb-2 text-16">Customer Ratings</h5>
                                                            <span class="px-3.5 py-1.5 inline-flex gap-3 text-xs font-medium rounded-full border bg-slate-100 border-slate-100 text-slate-500 dark:bg-zink-600 dark:text-zink-200 dark:border-zink-600">
                                                        <span class="flex items-center gap-2 text-yellow-500">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-half-line"></i>
                                                        </span>
                                                        (4.8 out of 5)
                                                    </span>
                                                            <p class="mt-2 text-sm text-slate-500 dark:text-zink-200">4,213 total ratings</p>
                                                        </div>
                                                        <div class="flex flex-col gap-3 mt-4">
                                                            <div class="flex items-center gap-3">
                                                                <div class="text-sm shrink-0">
                                                                    5 <i class="ml-1 text-yellow-500 align-middle ri-star-fill"></i>
                                                                </div>
                                                                <div class="w-full h-1.5 rounded-full bg-slate-200 dark:bg-zink-600">
                                                                    <div class="h-1.5 rounded-full bg-green-500" style="width: 79%"></div>
                                                                </div>
                                                                <div class="text-sm text-right w-9 shrink-0">
                                                                    1,210
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-3">
                                                                <div class="text-sm shrink-0">
                                                                    4 <i class="ml-1 text-yellow-500 align-middle ri-star-fill"></i>
                                                                </div>
                                                                <div class="w-full h-1.5 rounded-full bg-slate-200 dark:bg-zink-600">
                                                                    <div class="h-1.5 rounded-full bg-sky-500" style="width: 66%"></div>
                                                                </div>
                                                                <div class="text-sm text-right w-9 shrink-0">
                                                                    1,174
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-3">
                                                                <div class="text-sm shrink-0">
                                                                    3 <i class="ml-1 text-yellow-500 align-middle ri-star-fill"></i>
                                                                </div>
                                                                <div class="w-full h-1.5 rounded-full bg-slate-200 dark:bg-zink-600">
                                                                    <div class="h-1.5 rounded-full bg-purple-500" style="width: 45%"></div>
                                                                </div>
                                                                <div class="text-sm text-right w-9 shrink-0">
                                                                    762
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-3">
                                                                <div class="text-sm shrink-0">
                                                                    2 <i class="ml-1 text-yellow-500 align-middle ri-star-fill"></i>
                                                                </div>
                                                                <div class="w-full h-1.5 rounded-full bg-slate-200 dark:bg-zink-600">
                                                                    <div class="h-1.5 rounded-full bg-yellow-500" style="width: 22%"></div>
                                                                </div>
                                                                <div class="text-sm text-right w-9 shrink-0">
                                                                    274
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center gap-3">
                                                                <div class="text-sm shrink-0">
                                                                    1 <i class="ml-1 text-yellow-500 align-middle ri-star-fill"></i>
                                                                </div>
                                                                <div class="w-full h-1.5 rounded-full bg-slate-200 dark:bg-zink-600">
                                                                    <div class="h-1.5 rounded-full bg-red-500" style="width: 5%"></div>
                                                                </div>
                                                                <div class="text-sm text-right w-9 shrink-0">
                                                                    32
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            <div class="xl:col-span-8">
                                                <div class="flex items-center gap-3 mb-4">
                                                    <h5 class="text-16 grow">Reviews</h5>
                                                    @if(Auth::check())
                                                        <button type="button" data-modal-target="addReviewsModal" class="px-2 shrink-0 py-1.5 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add Review</button>
                                                    @else
                                                        <h5 class="text-16 grow">Please Login to comment</h5>
                                                        <a href="" class="px-2 shrink-0 py-1.5 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Login</a>
                                                    @endif
                                                </div>
                                                @if($product->review->count() == 0)
                                                    <h3 class="text-16 grow">There are no comments for this product yet</h3>
                                                @else
                                                    @foreach($product->review as $list)
                                                        <div class="pt-3 mt-3 border-t border-slate-200 dark:border-zink-500">
                                                        <div class="relative ltr:float-right rtl:float-left dropdown">
                                                            <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="reviews4" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="reviews4">
                                                                <li>
                                                                    <a data-modal-target="addReviewsModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                                </li>
                                                                <li>
                                                                    <a data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="flex items-center gap-3">
                                                            <div class="w-10 h-10 bg-green-100 rounded-full shrink-0 dark:bg-green-500/20">
                                                                <img src="assets/images/avatar-8.png" alt="" class="h-10 rounded-full">
                                                            </div>
                                                            <div class="grow">
                                                                <h6 class="text-15"><a href="#!">{{ $list->user->name }}</a></h6>
                                                                <p class="text-sm text-slate-500 dark:text-zink-200">{{ $list->updated_at }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center gap-2 mt-4 mb-2 text-yellow-500">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= $list->rating)
                                                                    <i class="ri-star-fill"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <p class="text-slate-500 dark:text-zink-200">"{{ $list->comment }}."</p>
                                                        <div class="flex items-center gap-3 mt-3">
                                                            <a href="#!" class="text-slate-500 shrink-0 count-button [&.active]:text-green-500 active"><i data-lucide="thumbs-up" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle count-number">49</span></a>
                                                            <a href="#!" class="text-slate-500 shrink-0 count-button [&.active]:text-red-500 active"><i data-lucide="thumbs-down" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle count-number">17</span></a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif

                                            </div><!--end col-->
                                        </div><!--end grid-->
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end grid-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
        </div>
    </div>

    <div id="addReviewsModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen lg:xl:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-5 border-b dark:border-zink-500">
                <h5 class="text-16">Add Review</h5>
                <button data-modal-close="addReviewsModal" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="../client/home/post" method="post">
                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                        @csrf
                        <div class="xl:col-span-4">
                            <div>
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Rating</label>
                                <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="rating" id="statusSelect">
                                    <option value="">Select Rating</option>
                                    <option value="5">5 Star</option>
                                    <option value="4">4 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="2">2 Star</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                        </div>
                        <div class="xl:col-span-12">
                            <div>
                                <label for="textArea" class="inline-block mb-2 text-base font-medium">Your review</label>
                                <textarea name="comment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="textArea" placeholder="Enter Description" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button data-modal-close="addReviewsModal" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end modal-->

@endsection
