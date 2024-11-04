@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Grid View</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Grid View
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5 ">
                    <div class="2xl:col-span-12">
                        <div class="flex flex-wrap items-center gap-2">
                            <p class="grow">Showing all <b>7,410</b> items results</p>
                            <div class="flex gap-2 shrink-0 items-cente">
                                <div class="relative dropdown">
                                    <a href="#!" class="bg-white text-custom-500 btn border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:bg-zink-700 dark:hover:bg-custom-500 dark:ring-custom-400/20 dark:focus:bg-custom-500 dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown">Sort by: <b class="font-medium">Highest Price</b> <i data-lucide="chevron-down" class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i></a>

                                    <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Lowest Price</a>
                                        </li>
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Highest Price</a>
                                        </li>
                                        <li>
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Hight to Low</a>
                                        </li>
                                        <li class="pt-2 mt-2 border-t dark:border-zink-300/50">
                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Low to High</a>
                                        </li>
                                    </ul>
                                </div>
                                <button type="button" id="listView" class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&.active]:text-white [&.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&.active]:bg-sky-500 dark:[&.active]:text-white dark:ring-sky-400/20"><i data-lucide="list" class="size-4"></i></button>
                                <button type="button" id="gridView" class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&.active]:text-white [&.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&.active]:bg-sky-500 dark:[&.active]:text-white dark:ring-sky-400/20 active"><i data-lucide="layout-grid" class="size-4"></i></button>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mt-3">
                            <span class="px-2.5 py-0.5 text-sm font-medium rounded-full border bg-slate-100 border-slate-300 text-slate-500 inline-flex items-center dark:bg-zink-800 dark:border-zink-500 dark:text-zink-200">High to Low <a href="#!" class="transition text-slate-500 dark:text-zink-200 hover:text-slate-600 dark:hover:text-zink-100"><i data-lucide="x" class="w-3 h-3 ltr:ml-1 rtl:mr-1"></i></a></span>
                            <span class="px-2.5 py-0.5 text-sm font-medium rounded-full border bg-slate-100 border-slate-300 text-slate-500 inline-flex items-center dark:bg-zink-800 dark:border-zink-500 dark:text-zink-200">New <a href="#!" class="transition text-slate-500 dark:text-zink-200 hover:text-slate-600 dark:hover:text-zink-100"><i data-lucide="x" class="w-3 h-3 ltr:ml-1 rtl:mr-1"></i></a></span>
                            <a href="../admin/cart/cart_detail" class="px-2.5 py-0.5 text-sm font-medium rounded border bg-transparent border-transparent text-slate-500 transition hover:bg-slate-200 dark:bg-zink-800 dark:hover:bg-zink-600 dark:text-zink-200">Cart Detail</a>
                        </div>

                        <div class="grid grid-cols-4 mt-5 md:grid-cols-5 [&.gridView]:grid-cols-5 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-4 gap-x-5" id="cardGridView">
                            @foreach($product as $key => $list)
                                <div class="card md:group-[.gridView]:flex relative">
                                <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                    <a href="#!" class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6 active"><i data-lucide="heart" class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                    <div class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                        <img src="{{ Storage::url($list->image) }}" alt="" class="group-[.gridView]:h-16">
                                    </div>
                                </div>
                                <div class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                    <div class="group-[.gridView]:grow">
                                        <h6 class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500"><a href="apps-ecommerce-product-overview.html">{{ $list->name }}</a></h6>

                                        <div class="flex items-center text-slate-500 dark:text-zink-200">
                                            <div class="mr-1 text-yellow-500 shrink-0 text-15">
                                               @foreach($list->variant as $keyColor => $allColor)
                                                    <input id="selectColor{{ $keyColor }}" class="inline-block align-middle {{ $colorClasses[$allColor->color->name]  ?? '' }} border border-orange-500 rounded-sm appearance-none cursor-pointer size-5  checked:{{ $colorClasses[$allColor->color->name] ?? '' }} disabled:opacity-75 disabled:cursor-default" type="checkbox" value="{{ $allColor->color->name }}" name="name">
                                                @endforeach
                                            </div>
                                        </div>
                                        <h5 class="mt-4 text-16">${{ $list->variant->first()->price_sale }} <small class="font-normal line-through text-slate-500 dark:text-zink-200">${{ $list->variant->first()->price }}</small></h5>
                                    </div>

                                    <div class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                        <button type="button" data-modal-target="addToCart{{ $key }}" class="w-full bg-white border-dashed text-slate-500 btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i data-lucide="shopping-cart" class="inline-block w-3 h-3 leading-none"></i> <span class="align-middle">Add to Cart</span></button>
                                    </div>
                                </div>
                            </div>
                                <!--end col & card-->
                                <div id="addToCart{{ $key }}" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                                    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600" style="width: 45rem">
                                        <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
                                            <h5 class="text-16">Search Products Add To Cart</h5>
                                            <div class="relative">
                                                <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                                <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                            </div>
                                            <button data-modal-close="addToCart{{ $key }}" id="addToCart{{ $key }}" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="w-5 h-5"></i></button>
                                        </div>
                                        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                            <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">
                                                <div class="xl:col-span-12">
                                                    <div class="card sticky top-[calc(theme('spacing.header')_*_1.3)]" style="display: flex">
                                                        <div class="card-body">
                                                            <div class="px-5 py-8 rounded-md bg-sky-50 dark:bg-zink-600">
                                                                <img src="{{ Storage::url($list->image) }}" alt="" class="block mx-auto h-44">
                                                            </div>
                                                        </div>
                                                        <form action="{{route('admin.cart.create')}}" method="post">
                                                            @csrf
                                                            <div class="card-body">
                                                            <div class="mt-6">
                                                                <h5 class="mb-2">${{ $list->variant->first()->price_sale }} <small class="font-normal line-through">${{ $list->variant->first()->price }}</small></h5>
                                                                <h6 class="mb-1 text-15">{{ $list->name }}</h6>
                                                                <p class="text-slate-500 dark:text-zink-200">{{ $list->category->name }}</p>
                                                            </div>
                                                            <div class="xl:col-span-6 mt-3">
                                                                <div class="inline-flex text-center input-step">
                                                                    <button type="button" onclick="decrease('{{ $key }}')" class="border size-9 leading-[15px] bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                                                    <input type="number" id="numberCart-{{ $key }}" name="quantity" class="w-12 text-center ltr:pl-2 rtl:pr-2 h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="1" min="1" max="{{ $list->variant->first()->quantity }}" readonly="">
                                                                    <button type="button" onclick="increase('{{ $key }}')" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l size-9 border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                                                </div>
                                                            </div>
                                                            <h6 class="mt-3 mb-2 text-15">Colors</h6>
                                                            <div class="flex flex-wrap items-center gap-2">
                                                                @foreach($list->variant as $keyColor => $color)
                                                                    <div>
                                                                        <input id="selectColorPre{{ $keyColor }}" class="inline-block align-middle border rounded-full appearance-none cursor-pointer size-5 {{ $colorClasses[$color->color->name]  ?? '' }} border-sky-500 checked:{{ $colorClasses[$color->color->name]  ?? '' }} checked:border-sky-500 disabled:opacity-75 disabled:cursor-default" type="checkbox" value="{{ $color->color->id }}"
                                                                         name="color_id">
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <h6 class="mt-3 mb-2 text-15">Colors</h6>
                                                            <div class="flex flex-wrap items-center gap-2">
                                                                @foreach($list->variant as $keySize => $size)
                                                                    <div>
                                                                        <input id="selectSizePre{{ $size->size->name }}" class="hidden peer" type="checkbox" value="{{ $size->size->id }}" 
                                                                        name="size_id">
                                                                        <label for="selectSizePre{{ $size->size->name }}" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-8 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">{{ $size->size->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="flex gap-2 mt-4">
                                                                <input type="hidden" name="product_id" value="{{ $list->id }}">
                                                                <input type="hidden" name="product_variant_id" value="{{ $list->variant->first() }}">
                                                                <button type="button" class="w-full bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20">Create Products</button>
                                                                <button type="submit" class="w-full text-white bg-purple-500 border-purple-500 btn hover:text-white hover:bg-purple-600 hover:border-purple-600 focus:text-white focus:bg-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-100 active:text-white active:bg-purple-600 active:border-purple-600 active:ring active:ring-purple-100 dark:ring-purple-400/10">Add To Cart</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div><!--end card-->
                                                </div>
                                            </div>
                                            <div class="flex justify-end gap-2 mt-4">
                                                <button type="reset" data-modal-close="addProductsCart" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--end grid-->
                        <div class="flex flex-col items-center mb-5 md:flex-row">
                            <div class="mb-4 grow md:mb-0">
                                <p class="text-slate-500 dark:text-zink-200">Showing <b>12</b> of <b>44</b> Results</p>
                            </div>
                            <ul class="flex flex-wrap items-center gap-2 shrink-0">
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i class="mr-1 size-4 rtl:rotate-180" data-lucide="chevron-left"></i> Prev</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">1</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto active">2</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">3</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">4</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 w-8 h-8 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">5</a>
                                </li>
                                <li>
                                    <a href="#!" class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">Next <i class="ml-1 size-4 rtl:rotate-180" data-lucide="chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!--end col-->
                </div>
            </div>
        </div>
    </div>
@endsection
