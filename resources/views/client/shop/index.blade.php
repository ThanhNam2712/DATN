@extends('client.layouts.master')
@section('title', 'Shop')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                @if(Session::has('success'))
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        swal("Message", "{{ Session::get("success") }}", "success", {
                            button:true,
                            button:"OK",
                        })
                    </script>
                @endif
                <div>
                    <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-1">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-4 text-15" style="text-align: center">Simple Image Gallery</h6>
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">
                                    <div>
                                        <a href="assets/images/small/img-2.jpg" class="glightbox">
                                            <img src="assets/images/img-2.jpg" alt="image" class="rounded-md">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-->
                    </div><!--end grid-->
                </div>
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Xem Dạng Lướt</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Xem Dạng Lướt
                        </li>
                    </ul>
                </div>
                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5 ">
                    <div class="hidden 2xl:col-span-3 2xl:block">
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3">
                                    <h6 class="text-15 grow">Filter</h6>
                                    <div class="shrink-0">
                                        <a href="../client/shop/" class="underline transition-all duration-200 ease-linear hover:text-custom-500">Clear All</a>
                                    </div>
                                </div>

                                <div class="relative mt-4">
                                    <form action="../client/shop">
                                        <input type="text" name="search" value="{{ request('search') }}" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                        <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                    </form>
                                </div>
                                <form action="../client/shop">
                                    {{-- color products --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group">
                                            <h6 class="underline grow">Chọn Màu</h6>
                                        </button>
                                        <div class="mt-4 collapsible-content">
                                            <div class="flex flex-wrap items-center gap-2">
                                                @foreach ($colors as $color)
                                                    <div>
                                                        <input id="selectColor{{ $color->id }}" class="color inline-block align-middle {{ $colorClasses[$color->name]  ?? '' }} border border-orange-500 rounded-sm appearance-none cursor-pointer size-5  checked:{{ $colorClasses[$color->name] ?? '' }} disabled:opacity-75 disabled:cursor-default"
                                                               type="checkbox" value="{{ $color->id }}" name="name_color" onchange="this.form.submit()" {{ request('name_color') == $color->id ? 'checked' : '' }}>
                                                        <label for="selectColor{{ $color->id }}" style="background-color: {{ $color->hex_code }}" class="block w-5 h-5 rounded"></label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{-- size products --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group">
                                            <h6 class="underline grow">Chọn Kích Thước</h6>
                                        </button>
                                        <div class="mt-4 collapsible-content">
                                            <div class="flex flex-wrap items-center gap-2">
                                                @foreach($sizes as $size)
                                                    <div>
                                                        <input id="selectSize{{ $size->name }}" class="hidden peer" type="checkbox" value="{{ $size->id }}" name="name_size" onchange="this.form.submit()" {{ request('name_size') == $size->id ? 'checked' : ''}}>
                                                        <label for="selectSize{{ $size->name }}" class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">{{ $size->name }}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    {{-- price products --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group">
                                            <h6 class="underline grow">Nhập Giá Tiền</h6>
                                            <div class="shrink-0 text-slate-500 dark:text-zink-200">
                                                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]:inline-block"></i>
                                                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]:hidden"></i>
                                            </div>
                                        </button>
                                        <div class="mt-4 collapsible-content">
                                            <div class="flex flex-col gap-2">
                                                <div class="flex items-center gap-2">
                                                    <input type="number" id="productNameInput" value="{{ request('filterMin') }}" name="filterMin" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Price Min" required="">
                                                    <input type="number" id="productNameInput" value="{{ request('filterMax') }}" name="filterMax" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Price Max" required="">
                                                </div>
                                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Filter Price</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- brand products --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group show">
                                            <h6 class="underline grow">Chọn Thương Hiệu</h6>
                                        </button>
                                        <div class=" mt-4 collapsible-content">
                                            <div class="flex flex-col gap-2">
                                                @foreach($brand as $key => $list)
                                                    <div class="flex items-center gap-2">
                                                        <input id="gender{{ $list->name }}" name="brand[{{ $list->id }}]" type="checkbox" {{ (request("brand")[$list->id] ?? '') == 'on' ? 'checked' : ''}} onchange="this.form.submit();" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" >
                                                        <label for="gender{{ $list->name }}" class="align-middle cursor-pointer">
                                                            {{ $list->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Category --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group">
                                            <h6 class="underline grow">Chọn Danh Mục</h6>
                                            <div class="shrink-0 text-slate-500 dark:text-zink-200">
                                                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]:inline-block"></i>
                                                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]:hidden"></i>
                                            </div>
                                        </button>
                                        <div class="mt-4 collapsible-content">
                                            <div class="flex flex-col gap-2">
                                                <div class="flex items-center gap-2">
                                                    <ul>
                                                        @foreach($category as $cate)
                                                            <li class="mt-3">
                                                                <a href="../client/shop/category/{{ $cate->name }}">{{ $cate->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- rating --}}
                                    <div class="mt-4 collapsible">
                                        <button class="flex items-center w-full text-left collapsible-header group">
                                            <h6 class="underline grow">Chọn Số Sao</h6>
                                            <div class="shrink-0 text-slate-500 dark:text-zink-200">
                                                <i data-lucide="chevron-down" class="hidden size-4 group-[.show]:inline-block"></i>
                                                <i data-lucide="chevron-up" class="inline-block size-4 group-[.show]:hidden"></i>
                                            </div>
                                        </button>
                                        <div class="mt-4 collapsible-content">
                                            <div class="flex flex-col gap-2">
                                                <div class="flex items-center gap-2">
                                                        <input id="rating5" {{ request('rating') == '5' ? 'checked' : ''}} onchange="this.form.submit();" name="rating" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="5">
                                                    <label for="rating5" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">5 Rating</span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <input id="rating4" {{ request('rating') == '4' ? 'checked' : ''}} onchange="this.form.submit();" name="rating" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="4">
                                                    <label for="rating4" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">4 Rating and Up</span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <input id="rating3" {{ request('rating') == '3' ? 'checked' : ''}} onchange="this.form.submit();" name="rating" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="3">
                                                    <label for="rating3" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">3 Rating and Up</span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <input id="rating2" {{ request('rating') == '2' ? 'checked' : ''}} onchange="this.form.submit();" name="rating" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="2">
                                                    <label for="rating2" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">2 Rating and Up</span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <input id="rating1" {{ request('rating') == '1' ? 'checked' : ''}} onchange="this.form.submit();" name="rating" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="1">
                                                    <label for="rating1" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">1 Rating and Up</span>
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <input id="rating0" name="rating[]" class="size-4 cursor-pointer bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800" type="checkbox" value="">
                                                    <label for="rating0" class="align-middle cursor-pointer">
                                                        <i data-lucide="star" class="inline-block ml-1 text-yellow-500 align-middle size-4"></i> <span class="align-middle">0 Rating</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="2xl:col-span-9">
                        <div class="flex flex-wrap items-center gap-2">
                            <p class="grow">Showing all <b>{{ $products->count() }}</b> items results</p>
                            <div class="flex gap-2 shrink-0 items-cente">

                                <form action="" style="display: flex">
                                    {{-- show view --}}
                                    <div class="relative dropdown">
                                        <div class="xl:col-span-4">
                                            <select name="show" onchange="this.form.submit();" class="bg-white text-custom-500 btn border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:bg-zink-700 dark:hover:bg-custom-500 dark:ring-custom-400/20 dark:focus:bg-custom-500 dropdown-toggle" data-choices="" data-choices-search-false=""  id="categorySelect">
                                                <option {{ request('show') == '3' ? 'selected' : ''}} value="3">Show : 3</option>
                                                <option {{ request('show') == '6' ? 'selected' : ''}} value="6">Show : 6</option>
                                                <option {{ request('show') == '8' ? 'selected' : ''}} value="8">Show : 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- show asc desc --}}
                                    <div class="relative dropdown ms-3" >
                                        <div class="xl:col-span-4">
                                            <select name="sort_by" onchange="this.form.submit();" class="bg-white text-custom-500 btn border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:bg-zink-700 dark:hover:bg-custom-500 dark:ring-custom-400/20 dark:focus:bg-custom-500 dropdown-toggle" data-choices="" data-choices-search-false="" id="categorySelect">
                                                <option {{ request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Sorting: Latest</option>
                                                <option {{ request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Sorting: Oldest</option>
                                                <option {{ request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Sorting: Name Ascending</option>
                                                <option {{ request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Sorting: Name Descending</option>
                                                <option {{ request('sort_by') == 'discount-ascending' ? 'selected' : ''}} value="discount-ascending">Sorting: Discount Ascending</option>
                                                <option {{ request('sort_by') == 'discount-descending' ? 'selected' : ''}} value="discount-descending">Sorting: Discount Descending</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <a href="../client/cart/cart-Detail" class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&.active]:text-white [&.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&.active]:bg-sky-500 dark:[&.active]:text-white dark:ring-sky-400/20"><i data-lucide="list" class="size-4"></i></a>
                                <button type="button" id="gridView" class="flex items-center justify-center w-[37.5px] h-[37.5px] p-0 text-sky-500 btn bg-sky-100 hover:text-white hover:bg-sky-600 focus:text-white focus:bg-sky-600 [&.active]:text-white [&.active]:bg-sky-600 dark:bg-sky-500/20 dark:text-sky-400 dark:hover:bg-sky-500 dark:hover:text-white dark:focus:bg-sky-500 dark:focus:text-white dark:[&.active]:bg-sky-500 dark:[&.active]:text-white dark:ring-sky-400/20 active"><i data-lucide="layout-grid" class="size-4"></i></button>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mt-3">
                            <span class="px-2.5 py-0.5 text-sm font-medium rounded-full border bg-slate-100 border-slate-300 text-slate-500 inline-flex items-center dark:bg-zink-800 dark:border-zink-500 dark:text-zink-200">High to Low <a href="#!" class="transition text-slate-500 dark:text-zink-200 hover:text-slate-600 dark:hover:text-zink-100"><i data-lucide="x" class="w-3 h-3 ltr:ml-1 rtl:mr-1"></i></a></span>
                            <span class="px-2.5 py-0.5 text-sm font-medium rounded-full border bg-slate-100 border-slate-300 text-slate-500 inline-flex items-center dark:bg-zink-800 dark:border-zink-500 dark:text-zink-200">New <a href="#!" class="transition text-slate-500 dark:text-zink-200 hover:text-slate-600 dark:hover:text-zink-100"><i data-lucide="x" class="w-3 h-3 ltr:ml-1 rtl:mr-1"></i></a></span>
                            <a href="#!" class="px-2.5 py-0.5 text-sm font-medium rounded border bg-transparent border-transparent text-slate-500 transition hover:bg-slate-200 dark:bg-zink-800 dark:hover:bg-zink-600 dark:text-zink-200">All Clear</a>
                        </div>

                        <div class="grid grid-cols-1 mt-5 md:grid-cols-2 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5" id="cardGridView">
                            @foreach($products as $key => $list)
                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <form action="{{ route('client.wishlist.toggle', $list->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="favorite-btn">
                                                <i class="{{ Auth::check() && Auth::user()->wishlists->contains('product_id', $list->id) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                                            </button>
                                        </form>
                                        <div class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ Storage::url($list->image) }}" alt="" class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6 class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500"><a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}">{{ $list->name }}</a></h6>

                                            <div class="flex items-center text-slate-500 dark:text-zink-200">
{{--                                                <div class="mr-1 text-yellow-500 shrink-0 text-15">--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                    <i class="ri-star-fill"></i>--}}
{{--                                                    <i class="ri-star-half-line"></i>--}}
{{--                                                </div>--}}
{{--                                                ({{ $list->comment->count() }})--}}
                                            </div>
                                            <h5 class="mt-4 text-16">${{ $list->variant->first()->price_sale }} <small class="font-normal line-through text-slate-500 dark:text-zink-200">${{ $list->variant->first()->price }}</small></h5>
                                        </div>

                                        <div class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}" class="w-full bg-white border-dashed text-slate-500 btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i data-lucide="shopping-cart" class="inline-block w-3 h-3 leading-none"></i> <span class="align-middle">Chi Tiết Sản Phẩm</span></a>
                                        </div>
                                    </div>
                                </div><!--end col & card-->
                            @endforeach
                        </div><!--end grid-->

                        <nav aria-label="..." style="margin-top: 10px">
                            <ul class="pagination pagination-sm">
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    </div><!--end col-->
                </div><!--end grid-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
