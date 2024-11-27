<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden scroll-smooth group" data-mode="light" dir="ltr">

<head>
    <base href="/">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <title>Product Landing Page | StarCode & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="../../css2?family=Tourney:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../aos%403.0.0-beta.6/dist/aos.css">

    <!-- Swiper Slider css-->

    <!-- Layout config Js -->
    <script src="../assets/js/layout.js"></script>
    <!-- Icons CSS -->
    <!-- StarCode CSS -->


    <link rel="stylesheet" href="../assets/css/starcode2.css">
    <link rel="stylesheet" href="../assets/css/check.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
</head>

<body class="text-base bg-white text-body font-public dark:text-zink-50 dark:bg-zinc-900">

<nav class="fixed inset-x-0 top-0 z-50 flex items-center justify-center h-20 py-3 [&.is-sticky]:bg-white dark:[&.is-sticky]:bg-zinc-900 border-b border-slate-200 dark:border-zinc-800 [&.is-sticky]:shadow-lg [&.is-sticky]:shadow-slate-200/25 dark:[&.is-sticky]:shadow-zinc-700/30 navbar" id="navbar">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto flex items-center self-center w-full">
        <div class="shrink-0">
            <a href="#!">
                <img src="../assets/images/logo-dark.png" alt="" class="block h-6 dark:hidden">
                <img src="../assets/images/logo-light.png" alt="" class="hidden h-6 dark:block">
            </a>
        </div>
        <div class="mx-auto">
            <ul id="navbar7" class="absolute inset-x-0 z-20 items-center hidden py-3 mt-px bg-white shadow-lg md:mt-0 dark:bg-zinc-800 dark:md:bg-transparent md:z-0 navbar-menu rounded-b-md md:shadow-none md:flex top-full ltr:ml-auto rtl:mr-auto md:relative md:bg-transparent md:rounded-none md:top-auto md:py-0">
                <li>
                    <a href="#home" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500 active">Home</a>
                </li>
                <li>
                    <a href="../client/shop" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Shop Product</a>
                </li>
                <li>
                    <a href="#features" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Features</a>
                </li>
                <li>
                    <a href="#about" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">About Us</a>
                </li>
                <li>
                    <a href="#feedback" class="block md:inline-block px-4 md:px-3 py-2.5 md:py-0.5 text-15 font-medium text-slate-800 transition-all duration-300 ease-linear hover:text-custom-500 [&.active]:text-custom-500 dark:text-zinc-200 dark:hover:text-custom-500 dark:[&.active]:text-custom-500">Feedback</a>
                </li>
            </ul>
        </div>
        <div class="flex gap-2">
            <div class="ltr:ml-auto rtl:mr-auto md:hidden navbar-toggale-button">
                <button type="button" class="flex items-center  justify-center size-[37.5px] p-0 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="menu"></i></button>
            </div>
            <button type="button" data-drawer-target="cartSidePenal" class="text-slate-500 dark:text-zinc-300 hover:text-custom-500 dark:hover:text-custom-500 border-0 btn bg-gradient-to-r w-[36.39px] p-0 flex items-center justify-center"><i data-lucide="shopping-bag" class="inline-block size-4"></i></button>
            @if(Auth::check())
                <div class="dropdown">
                    <button type="button" class="inline-block p-0 transition-all duration-200 ease-linear bg-topbar rounded-full text-topbar-item dropdown-toggle btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        <div class="bg-pink-100 rounded-full">
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="w-[37.5px] h-[37.5px] rounded-full">
                        </div>
                    </button>
                    <div class="absolute z-50 hidden p-4 ltr:text-left rtl:text-right bg-white rounded-md shadow-md !top-4 dropdown-menu min-w-[14rem] dark:bg-zink-600" aria-labelledby="dropdownMenuButton">
                        <h6 class="mb-2 text-sm font-normal text-slate-500 dark:text-zink-300">Welcome to starcode</h6>
                        <a href="#!" class="flex gap-3 mb-3">

                            <div class="relative inline-block shrink-0">
                                <div class="rounded bg-slate-100 dark:bg-zink-500">
                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" class="w-12 h-12 rounded">
                                </div>
                                <span class="-top-1 ltr:-right-1 rtl:-left-1 absolute w-2.5 h-2.5 bg-green-400 border-2 border-white rounded-full dark:border-zink-600"></span>
                            </div>
                            <div>
                            <h6 class="mb-1 text-15">{{ Auth::user()->name }}</h6>
                            <p class="text-slate-500 dark:text-zink-300">{{ Auth::user()->email }}</p>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/profile/"><i data-lucide="user-2" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Profile</a>
                            </li>
                            <li>
                                <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/order/view"><i data-lucide="mail" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Order <span class="inline-flex items-center justify-center w-5 h-5 ltr:ml-2 rtl:mr-2 text-[11px] font-medium border rounded-full text-white bg-red-500 border-red-500"></span></a>
                            </li>
                            <li>
                                <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="apps-chat.html"><i data-lucide="messages-square" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Chat</a>
                            </li>
                            <li>
                                <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/coupon"><i data-lucide="ri-gift-line" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> WishLisst </a>
                            </li>
                            <li>
                                <a  class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../client/reset/password">Reset Pass</a>
                            </li>
                            <li class="pt-2 mt-2 border-t border-slate-200 dark:border-zink-500">
                                <a class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500" href="../account/logout"><i data-lucide="log-out" class="inline-block size-4 ltr:mr-2 rtl:ml-2"></i> Sign Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <a href="../account/show-login" class="text-white border-0 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500"><span class="align-middle">Sign In</span> <i data-lucide="log-in" class="inline-block size-4 ltr:ml-1 rtl:mr-1"></i></a>
            @endif
        </div>
    </div>
</nav>
{{-- body --}}
    @yield('body')
{{-- end body --}}
<footer class="relative pt-20 pb-12 border-t border-slate-200 dark:border-zinc-800">
    <div class="absolute left-0 bg-purple-500 size-64 -top-16 opacity-10 blur-3xl"></div>
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="relative z-10 grid grid-cols-12 gap-5 xl:grid-cols-12">
            <div class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-4">
                <div class="mb-5">
                    <a href="#!"><img src="../assets/images/logo-light.png" alt="" class="hidden h-7 dark:block"></a>
                    <a href="#!"><img src="../assets/images/logo-dark.png" alt="" class="block h-7 dark:hidden"></a>
                </div>
                <p class="mb-5 text-slate-500 dark:text-zinc-400">Premium Multipurpose Admin & Dashboard Template You can build any type of web application like eCommerce, CRM, CMS, Project management apps, Admin Panels, etc using starcode.</p>
                <ul class="flex items-center gap-3">
                    <li>
                        <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i data-lucide="facebook" class="size-4"></i></a>
                    </li>
                    <li>
                        <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i data-lucide="linkedin" class="size-4"></i></a>
                    </li>
                    <li>
                        <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i data-lucide="instagram" class="size-4"></i></a>
                    </li>
                    <li>
                        <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i data-lucide="twitter" class="size-4"></i></a>
                    </li>
                    <li>
                        <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear border rounded-full size-10 text-slate-500 border-slate-200 dark:text-zinc-400 dark:border-zinc-800 hover:text-custom-500 dark:hover:text-custom-500"><i data-lucide="youtube" class="size-4"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                <h5 class="mb-4 font-medium tracking-wider dark:text-zink-50">Dashboards</h5>
                <ul class="flex flex-col gap-3 text-15">
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Analytics</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">CRM</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Ecommerce</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Email</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">HR</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Social Media</a>
                    </li>
                </ul>
            </div><!--end col-->
            <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-3">
                <h5 class="mb-4 font-medium tracking-wider dark:text-zinc-50">About Us</h5>
                <ul class="flex flex-col gap-3 text-15">
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">News</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Service</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Our Policy</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Support 24/7</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">FAQ's</a>
                    </li>
                </ul>
            </div><!--end col-->
            <div class="col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-2">
                <h5 class="mb-4 font-medium tracking-wider dark:text-zink-50">Get Help</h5>
                <ul class="flex flex-col gap-3 text-15">
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">About Us</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Contact Us</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Payment Policy</a>
                    </li>
                    <li>
                        <a href="#!" class="relative inline-block transition-all duration-200 ease-linear text-slate-500 dark:text-zinc-400 hover:text-slate-800 dark:hover:text-zinc-50 before:absolute before:border-b before:border-slate-200 dark:before:border-zinc-700 before:inset-x-0 before:bottom-0 before:w-0 hover:before:w-full before:transition-all before:duration-300 before:ease-linear">Return Policy</a>
                    </li>
                </ul>
            </div><!--end col-->
        </div><!--end grid-->

    </div>
    <div class="pt-10 mt-16 text-center border-t text-slate-500 dark:text-zinc-400 dark:border-zinc-800 text-16">
        <p>
            <script>document.write(new Date().getFullYear())</script> StarCode Kh Design & Develop by <a href="#!" class="underline text-slate-800 dark:text-zinc-100">StarCode Kh</a>
        </p>
    </div>
</footer>

@php
    $cart = \App\Models\Cart::where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->with('cartDetail:cart_id,id,product_id,product_variant_id,color_id,size_id,quantity')
            ->first();
@endphp

<div id="cartSidePenal" drawer-end="" class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow dark:bg-zink-600 ltr:right-0 rtl:left-0 md:w-96 z-drawer show">
    <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
        <div class="grow">
            <h5 class="mb-0 text-16">Shopping Cart <span class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-custom-500 border-custom-500">3</span></h5>
        </div>
        <div class="shrink-0">
            <button data-drawer-close="cartSidePenal" class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800"><i data-lucide="x" class="size-4"></i></button>
        </div>
    </div>
    <div class="px-4 py-3 text-sm text-green-500 border border-transparent bg-green-50 dark:bg-green-400/20">
        <span class="font-bold underline">starcode50</span> Coupon code applied successfully.
    </div>
    <div>
        @if($cart && $cart->cartDetail->count() > 0)
            <div class="h-[calc(100vh_-_370px)] p-4 overflow-y-auto product-list">
                <div class="flex flex-col gap-4">
                    @foreach($cart->cartDetail as $key => $list)
                        <div class="flex gap-2 product">
                            <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                <img src="{{ Storage::url($list->product->image) }}" alt="" class="h-8">
                            </div>
                            <div class="overflow-hidden grow">
                                <div class="ltr:float-right rtl:float-left">
                                    <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                </div>
                                <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                    <h6 class="mb-1 text-15">{{ $list->product->name }}</h6>
                                </a>
                                <div class="flex items-center mb-3">
                                    <h5 class="text-base product-price"> $<span>{{ $list->product_variant->price_sale }}</span></h5>
                                    <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-500 dark:text-zink-200">({{ $list->product->category->name }})</div>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                        <button type="button" onclick="reduce('{{ $list->id }}')" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                        <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="1" max="{{ $list->product_variant->quantity }}" id="quantityInput-{{ $list->id }}" readonly="" data-cartDetail="{{ $list->id }}">
                                        <button type="button" onclick="increaseCart('{{ $list->id }}')" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                    </div>
                                    <h6 class="products-line-price">${{ $list->product_variant->price_sale * $list->quantity }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-zink-500">

                <table class="w-full mb-3 ">
                    <tbody class="table-total">
                    <tr>
                        <td class="py-2">Sub Total :</td>
                        <td class="text-right cart-subtotal">${{ $cart->total_amuont }}</td>
                    </tr>
                    <tr class="font-semibold">
                        <td class="py-2">Total : </td>
                        <td class="text-right cart-total">${{ $cart->total_amuont }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="flex items-center justify-between gap-3">
                    <a href="apps-ecommerce-product-grid.html" class="w-full text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10">Continue Shopping</a>
                    <a href="../client/cart/" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Checkout</a>
                </div>
            </div>
        @else
            <a href="../account/show-login" class="font-bold underline">Đăng Nhập để mua cart nhanh</a>
        @endif
    </div>
</div>

<button id="back-to-top" class="fixed flex items-center justify-center text-white bg-purple-500 rounded-md size-10 bottom-10 right-10">
    <i data-lucide="chevron-up" class="animate animate-icons"></i>
</button>

<script src='../assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
<script src="../assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/lucide/umd/lucide.js"></script>
<script src="../assets/js/starcode.bundle.js"></script>
<script src="../assets/libs/swiper/swiper-bundle.min.js"></script>
<script src="../assets/libs/aos/aos.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../assets/js/cart/quantity.js"></script>
<script src="../assets/js/cart/cartAddCart.js"></script>
<script src="../assets/js/order/coupon.js"></script>
{{--<script src="../assets/js/apiAddress/api.js"></script>--}}
{{--<script src="../assets/js/apiAddress/api2.js"></script>--}}
<script src="../assets/js/pages/landing-product.init.js"></script>
<script src="../assets/js/pages/notifications.init.js"></script>
<script>
    function increase(){
        let input = document.getElementById('numberCounter');
        let currentValue = parseInt(input.value);
        var maxValue = parseInt(input.max);
        if(currentValue < maxValue){
            input.value = currentValue + 1;
        }else {
            alert('Quantity exceeds limit');
        }
    }

    function decrease(){
        let input = document.getElementById('numberCounter');
        if (input){
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }
    }
</script>
</body>

</html>
