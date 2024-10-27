@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Shopping Cart</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Shopping Cart
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                    <div class="xl:col-span-9 products-list">
                        <div class="flex items-center gap-3 mb-5">
                            <h5 class="underline text-16 grow sumQuantity">Shopping Cart ({{ $cart->cartDetail->sum('quantity') }})</h5>
                            <div>
                                <a href="#!" class="text-red-500 transition-all duration-300 ease-linear hover:text-red-600"><i data-lucide="trash-2" class="inline-block mr-1 align-middle size-4"></i> <span class="align-middle">Delete All</span></a>
                            </div>
                        </div>
                        @foreach($cart->cartDetail as $key => $list)
                            <div class="card products products-cart" id="product{{ $key }}">
                                <div class="card-body" data-cartDetail="{{ $list->id }}" >
                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12 card-body-all-cart">
                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600">
                                            <img src="{{ Storage::url($list->product->image) }}" alt="">
                                        </div><!--end col-->
                                        <div class="flex flex-col lg:col-span-4">
                                            <div>
                                                <h5 class="mb-1 text-16"><a >{{ $list->product->name }}</a></h5>
                                                <p class="mb-2 text-slate-500 dark:text-zink-200"><a href="#!">{{ $list->product->category->name }}</a></p>
                                                <p class="mb-1 text-slate-500 dark:text-zink-200">Color: <span class="text-slate-800 dark:text-zink-50">{{ $list->product_variant->color->name }}</span></p>
                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Size: <span class="text-slate-800 dark:text-zink-50">{{ $list->product_variant->size->name }}</span></p>
                                            </div>
                                            <div class="flex items-center gap-2 mt-auto">
                                                <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                    <button type="button" onclick="reduce('{{ $list->id }}')" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="1" max="{{ $list->product_variant->quantity }}" id="quantityInput-{{ $list->id }}" readonly="" data-cartDetail="{{ $list->id }}">
                                                    <button type="button" onclick="increaseCart('{{ $list->id }}')" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                </div>
                                                    <button type="submit" data-cartDetail="{{ $list->id }}" onclick="deleteCart('{{ $list->id }}')" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                            </div>
                                        </div><!--end col-->
                                        <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                            <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                <h6 class="text-16 products-price">$<span>{{ $list->product_variant->price_sale }}</span> <small class="font-normal line-through text-slate-500 dark:text-zink-200">${{ $list->product_variant->price }}</small></h6>
                                            </div>
                                            <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left">$<span class="products-line-price">{{ $list->product_variant->price_sale * $list->quantity }}</span></h6>
                                        </div><!--end col-->
                                    </div><!--end grid-->
                                </div>
                            </div><!--end card-->
                        @endforeach
                    </div><!--end col-->
                    <div class="xl:col-span-3">
                        <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                            <div class="card ">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Order Summary</h6>
                                    <div class="overflow-x-auto">
                                        <table class="w-full">
                                            <tbody class="table-total">
                                            <tr>
                                                <td class="py-2 text-slate-500 dark:text-zink-200">
                                                    Sub Total
                                                </td>
                                                <td class="py-2 text-slate-500 dark:text-zink-200 cart-subtotal">
                                                    $932.16
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 dark:text-zink-200">
                                                    Estimated Tax (18%)
                                                </td>
                                                <td class="py-2 text-slate-500 dark:text-zink-200 cart-tax">
                                                    $167.79
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 dark:text-zink-200">
                                                    Item Discounts (12%)
                                                </td>
                                                <td class="py-2 text-slate-500 dark:text-zink-200 cart-discount">
                                                    -$111.86
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 text-slate-500 dark:text-zink-200">
                                                    Shipping Charge
                                                </td>
                                                <td class="py-2 text-slate-500 dark:text-zink-200 cart-shipping">
                                                    $0
                                                </td>
                                            </tr>
                                            <tr class="font-semibold">
                                                <td class="pt-2">
                                                    Total Amount (USD)
                                                </td>
                                                <td class="pt-2 cart-total">
                                                    ${{ $cart->total_amuont }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-5 shrink-0">
                                <a href="../admin/cart/" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">Continue to Shopping</a>
                                <a href="{{route('admin.order.index')}}" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Checkout</a>
                            </div>

                            <div class="flex items-center gap-5 p-4 mt-5 card">
                                <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                    <i data-lucide="truck" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Estimated Delivery</h6>
                                    <p class="text-slate-500">01 - 07 Dec, 2023</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-5 p-4 card">
                                <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                    <i data-lucide="container" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Free Shipping & Returns</h6>
                                    <p class="text-slate-500 dark:text-zink-200">On all orders over $200.00</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
