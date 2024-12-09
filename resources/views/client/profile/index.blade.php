@extends('client.layouts.master')
@section('title', 'Profile')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

                <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                            <div class="grow">
                                <h5 class="text-16">Tài Khoản Người Dùng</h5>
                            </div>
                            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                    <a href="#!" class="text-slate-400 dark:text-zink-200">Pages</a>
                                </li>
                                <li class="text-slate-700 dark:text-zink-100">
                                    Account Settings
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 2xl:grid-cols-12">
                                    <div class="lg:col-span-2 2xl:col-span-1">
                                        <div class="relative inline-block rounded-full shadow-md size-20 bg-slate-100 profile-user xl:size-28">
                                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" style="width: 112px; height: 112px" class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                            <div class="absolute bottom-0 flex items-center justify-center rounded-full size-8 ltr:right-0 rtl:left-0 profile-photo-edit">
                                                <input id="profile-img-file-input" type="file" class="hidden profile-img-file-input">
                                                <label for="profile-img-file-input" class="flex items-center justify-center bg-white rounded-full shadow-lg cursor-pointer size-8 dark:bg-zink-600 profile-photo-edit">
                                                    <i data-lucide="image-plus" class="size-4 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="lg:col-span-10 2xl:col-span-9">
                                        <h5 class="mb-1">{{ Auth::user()->name }} <i data-lucide="badge-check" class="inline-block size-4 text-sky-500 fill-sky-100 dark:fill-custom-500/20"></i></h5>
                                        <div class="flex gap-3 mb-4">
                                            <p class="text-slate-500 dark:text-zink-200"><i data-lucide="user-circle" class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>@if(Auth::user()->role_id == 2) Super Admin @else User @endif</p>
                                        </div>
                                        <ul class="flex flex-wrap gap-3 mt-4 text-center divide-x divide-slate-200 dark:divide-zink-500 rtl:divide-x-reverse">
                                            <li class="px-5">
                                                <h5>${{ number_format(Auth::user()->order->sum('total_amount') * 25397) }}</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Tổng Tiền Đặt Hàng</p>
                                            </li>
                                            <li class="px-5">
                                                <h5>10.65k</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Followers</p>
                                            </li>
                                            <li class="px-5">
                                                <h5>{{ Auth::user()->order->count() }}+</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Order Products</p>
                                            </li>
                                        </ul>
                                        <p class="mt-4 text-slate-500 dark:text-zink-200">Strong leader and negotiator adept at driving collaboration and innovation. Highly accomplished Web Developer with 10+ years of experience creating, launching and leading successful business ventures. Proven ability to build relationships, drive customer loyalty and increase profitability.</p>
                                        <div class="flex gap-2 mt-4">
                                            <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear rounded size-9 text-sky-500 bg-sky-100 hover:bg-sky-200 dark:bg-sky-500/20 dark:hover:bg-sky-500/30">
                                                <i data-lucide="facebook" class="size-4"></i>
                                            </a>
                                            <a href="#!" class="flex items-center justify-center text-pink-500 transition-all duration-200 ease-linear bg-pink-100 rounded size-9 hover:bg-pink-200 dark:bg-pink-500/20 dark:hover:bg-pink-500/30">
                                                <i data-lucide="instagram" class="size-4"></i>
                                            </a>
                                            <a href="#!" class="flex items-center justify-center text-red-500 transition-all duration-200 ease-linear bg-red-100 rounded size-9 hover:bg-red-200 dark:bg-red-500/20 dark:hover:bg-red-500/30">
                                                <i data-lucide="globe" class="size-4"></i>
                                            </a>
                                            <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear rounded text-custom-500 bg-custom-100 size-9 hover:bg-custom-200 dark:bg-custom-500/20 dark:hover:bg-custom-500/30">
                                                <i data-lucide="linkedin" class="size-4"></i>
                                            </a>
                                            <a href="#!" class="flex items-center justify-center text-pink-500 transition-all duration-200 ease-linear bg-pink-100 rounded size-9 hover:bg-pink-200 dark:bg-pink-500/20 dark:hover:bg-pink-500/30">
                                                <i data-lucide="dribbble" class="size-4"></i>
                                            </a>
                                            <a href="#!" class="flex items-center justify-center transition-all duration-200 ease-linear rounded size-9 text-slate-500 bg-slate-100 hover:bg-slate-200 dark:bg-zink-600 dark:hover:bg-zink-500">
                                                <i data-lucide="github" class="size-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-12 2xl:col-span-2">
                                        <div class="flex gap-2 2xl:justify-end">
                                            <a href="mailto:StarCode Kh@gmail.com" class="flex items-center justify-center size-[37.5px] p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i data-lucide="mail" class="size-4"></i></a>
                                            <button type="button" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Hire Us</button>

                                            <div class="relative dropdown">
                                                <button class="flex items-center justify-center size-[37.5px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="accountSettings" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-4"></i></button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white dark:bg-zink-600 rounded-md shadow-md dropdown-menu min-w-[10rem]" aria-labelledby="accountSettings">
                                                    <li class="px-3 mb-2 text-sm text-slate-500">
                                                        Payments
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Create Invoice</a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Pending Billing</a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Generate Bill</a>
                                                    </li>
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!">Subscription</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end grid-->
                            </div>
                            <div class="card-body !py-0">
                                <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">
                                    <li class="group active">
                                        <a href="javascript:void(0);" data-tab-toggle="" data-target="personalTabs" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Thông Tin Tài Khoản</a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-tab-toggle="" data-target="integrationTabs" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Integration</a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-tab-toggle="" data-target="changePasswordTabs" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Đổi Mật Khẩu</a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-tab-toggle="" data-target="privacyPolicyTabs" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Địa Chỉ Người Dùng</a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-tab-toggle="" data-target="couponProfile" class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Phiếu Giảm Giá</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end card-->

                        <div class="tab-content">
                            <div class="block tab-pane" id="personalTabs">
                                <div class="card">
                                    <div class="card-body">
                                        @if(session('message'))
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ session('message') }}</span>
                                            </div>
                                        @endif
                                        <h6 class="mb-1 text-15">Cập Nhật Thông Tin</h6>
                                        <p class="mb-4 text-slate-500 dark:text-zink-200">Update your photo and personal details here easily.</p>
                                        <form action="../client/profile/update/{{ Auth::id() }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                                <div class="xl:col-span-6" style="display: flex">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Ảnh Đại Diện</label>
                                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" style="width: 112px; height: 112px" class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                                                    <input name="avatar" type="file">
                                                    <input type="hidden" name="file_old" value="{{ Auth::user()->avatar }}">
                                                </div><!--end col-->
                                                <div class="xl:col-span-6">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Tên Người Dùng</label>
                                                    <input type="text" id="inputValue" name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ Auth::user()->name }}">
                                                </div><!--end col-->
                                                <div class="xl:col-span-6">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Email</label>
                                                    <input type="email" id="inputValue" disabled name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Enter your value" value="{{ Auth::user()->email }}">
                                                </div><!--end col-->
                                                <div class="xl:col-span-6">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Số Điện Thoại</label>
                                                    <input type="number" id="inputValue" name="sdt" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="+855 8456 5555 23" value="{{ Auth::user()->sdt }}">
                                                </div><!--end col-->
                                            </div><!--end grid-->
                                            <div class="flex justify-end mt-6 gap-x-4">
                                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Updates</button>
                                                <a href="../client/home" class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20"><i data-lucide="arrow-left" class="inline-block size-4"></i><span class="align-middle">Back Home</span></a>
                                            </div>
                                        </form><!--end form-->
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="integrationTabs">
                                <h6 class="mb-4 text-15">Connected Apps</h6>
                                <div class="grid grid-cols-1 gap-x-5 sm:grid-cols-2 xl:grid-cols-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="flex gap-3 mb-5">
                                                <div class="grow">
                                                    <img src="assets/images/meta.png" alt="" class="h-8">
                                                </div>
                                                <div class="shrink-0">
                                                    <button type="button" class="px-2 py-1.5 text-xs bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i data-lucide="cable" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> Connect</button>
                                                </div>
                                            </div>

                                            <h6 class="mb-2 text-16">Meta</h6>
                                            <p class="text-slate-500 dark:text-zink-200">Meta Platforms Inc, which used to be called Facebook Inc.</p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="flex gap-3 mb-5">
                                                <div class="grow">
                                                    <img src="data:image/png;base64,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" alt="" class="h-8">
                                                </div>
                                                <div class="shrink-0">
                                                    <button type="button" class="px-2 py-1.5 text-xs bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i data-lucide="cable" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> Connect</button>
                                                </div>
                                            </div>

                                            <h6 class="mb-2 text-16">Figma Tools</h6>
                                            <p class="text-slate-500 dark:text-zink-200">Figma is a cloud-based design tool that is similar to Sketch in functionality and features.</p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="flex gap-3 mb-5">
                                                <div class="grow">
                                                    <img src="data:image/png;base64,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" alt="" class="h-8">
                                                </div>
                                                <div class="shrink-0">
                                                    <button type="button" class="px-2 py-1.5 text-xs bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i data-lucide="cable" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> Connect</button>
                                                </div>
                                            </div>

                                            <h6 class="mb-2 text-16">Telegram Channel</h6>
                                            <p class="text-slate-500 dark:text-zink-200">Telegram Tools offers multiple useful tools for Telegram users.</p>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end grid-->
                            </div>
                            <div class="hidden tab-pane" id="changePasswordTabs">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Thay Đổi Mật Khẩu</h6>
                                        <form action="../client/profile/changePass" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                                <div class="xl:col-span-4">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Mật Khẩu Cũ*</label>
                                                    <div class="relative">
                                                        <input type="password" name="passOld" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Enter current password">
                                                        <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Mật Khẩu Mới*</label>
                                                    <div class="relative">
                                                        <input type="password" name="passNew" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Enter new password">
                                                        <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="xl:col-span-4">
                                                    <label for="inputValue" class="inline-block mb-2 text-base font-medium">Xác Thực Mật Khẩu*</label>
                                                    <div class="relative">
                                                        <input type="password" name="pass_confirm" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="oldpasswordInput" placeholder="Confirm password">
                                                        <button class="absolute top-2 ltr:right-4 rtl:left-4 " type="button"><i class="align-middle ri-eye-fill text-slate-500 dark:text-zink-200"></i></button>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="flex items-center xl:col-span-6">
                                                    <a href="../client/reset/" class="underline text-custom-500 text-13">Quên Mật Khẩu ?</a>
                                                </div>
                                                <div class="flex justify-end xl:col-span-6">
                                                    <button type="submit" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Change Password</button>
                                                </div>
                                            </div><!--end grid-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="privacyPolicyTabs">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Thông Tin Địa Chỉ</h6>
                                        <div class="space-y-6">
                                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                                <div class="xl:col-span-12">
                                                    <div class="card" >
                                                        <div class="card-body" id="usersTable">
                                                            <div style="display: flex ;justify-content: space-between;">
                                                                <h6 class="mb-4 text-15">Các Địa Chỉ Và Thêm Địa chỉ</h6>
                                                                <div class="shrink-0">
                                                                    <button data-modal-target="addressModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Add User</span></button>
                                                                </div>
                                                            </div>
                                                            <div class="!pt-1 card-body mt-4">
                                                                <div class="overflow-x-auto">
                                                                    @foreach($address as $key => $list)
                                                                        <span class="mt-4 status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">Address :  {{ $key + 1 }}</span>
                                                                        <table class="w-full whitespace-nowrap mt-5" id="productTable">
                                                                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                                                            <tr>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Tên</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Tỉnh</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">Huyện</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">Địa Chỉ Cụ Thể</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Căn Hộ</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Hành Động</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="list">
                                                                            <tr>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                                                    <a href="" class="flex items-center gap-2">
                                                                                        <h6 class="product_name">{{ $list->user->name }}</h6>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                                                                    <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                                                                        {{ $list->Province }}
                                                                                    </span>
                                                                                </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">
                                                                                    {{ $list->district }}
                                                                                </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">{{ $list->Neighborhood }}</td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock">
                                                                                    {{ $list->Apartment }}
                                                                                </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                                                                    <div class=" dropdown">
                                                                                        <button class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20" id="productAction1" data-bs-toggle="dropdown"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                                                                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="productAction1">
                                                                                            <li>
                                                                                                <a data-modal-target="updateAddress{{ $key }}" style="cursor: pointer" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <form action="../client/profile/delete/{{ $list->id }}" method="post">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button onclick="return confirm('Do you want to delete address')" data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></button>
                                                                                                </form>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        {{-- Update Address client --}}
                                                                        <div id="updateAddress{{ $key }}" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                                                                            <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                                                <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                                                                    <h5 class="text-16">Update User</h5>
                                                                                    <button data-modal-close="updateAddress{{ $key }}" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                                                                </div>
                                                                                <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                                                    <form action="../client/profile/changeAddress/{{ $list->id }}" method="post" >
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput{{ $key }}" class="inline-block mb-2 text-base font-medium">Product Title</label>
                                                                                                <input type="text" id="productNameInput{{ $key }}" disabled name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->user->name }}">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Phone</label>
                                                                                                <input type="number" id="qualityInput{{ $key }}" disabled name="phone" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->user->sdt }}" >
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->Province }}" name="Province" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->district }}" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->Apartment }}" name="Apartment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="lg:col-span-2 xl:col-span-12">
                                                                                                <div>
                                                                                                    <label for="productDescription" class="inline-block mb-2 text-base font-medium">Specific Address</label>
                                                                                                    <textarea name="Neighborhood" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" rows="5">{{ $list->Neighborhood }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Default</label>
                                                                                                <input id="Checkbox1" name="is_default" class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer" type="checkbox" value="1" {{ $list->is_default == 1 ? 'checked' : ''}}>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex justify-end gap-2 mt-4">
                                                                                            <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                                                                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div><!--end add user-->
                                                                        {{-- End Update Address client --}}
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="couponProfile">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Phiếu Giảm Giá</h6>
                                        <div class="space-y-6">
                                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                                <div class="xl:col-span-12">
                                                    <div class="card" >
                                                        <div class="card-body" id="usersTable">
                                                            <div style="display: flex ;justify-content: space-between;">
                                                                <h6 class="mb-4 text-15">Các Phiếu Giảm Giá</h6>
                                                            </div>
                                                            <div class="!pt-1 card-body mt-4">
                                                                <div class="overflow-x-auto">
                                                                    @foreach($coupon as $key => $list)
                                                                        <span class="mt-4 status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">Address :  {{ $key + 1 }}</span>
                                                                        <table class="w-full whitespace-nowrap mt-5" id="productTable">
                                                                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                                                            <tr>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Mã Giảm Giá</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Tên Giảm Giá</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">Giá Trị</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">Tên Giá Trị</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Đơn Tối Thiểu</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Ngày Bắt Đầu</th>
                                                                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort stock" data-sort="stock">Ngày Kết Thúc</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="list">
                                                                            <tr>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                                                    <a class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">#TAD-2321000{{ $key + 1 }}</a>
                                                                                </td>

                                                                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                                                        <a class="flex items-center gap-2">
                                                                                            <h6 class="product_name">{{ $list->code }}</h6>
                                                                                        </a>
                                                                                    </td>

                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">{{ $list->discount_value }}%</td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">{{ $list->discount_type }}</td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> ${{ $list->minimum_order_amount }} </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> {{ $list->start_end }} </td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock"> {{ $list->expiration_date }} </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        {{-- Update Address client --}}
                                                                        <div id="updateAddress{{ $key }}" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
                                                                            <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                                                <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                                                                                    <h5 class="text-16">Add User</h5>
                                                                                    <button data-modal-close="updateAddress{{ $key }}" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                                                                                </div>
                                                                                <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                                                                                    <form action="../client/profile/changeAddress/{{ $list->id_address }}" method="post" >
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput{{ $key }}" class="inline-block mb-2 text-base font-medium">Product Title</label>
                                                                                                <input type="text" id="productNameInput{{ $key }}" name="full_name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->full_name }}" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Phone</label>
                                                                                                <input type="number" id="qualityInput" name="phone" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->phone }}" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="phoneAddress" class="inline-block mb-2 text-base font-medium">City</label>
                                                                                                <input type="text" id="phoneAddress{{ $key }}" name="city" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->city }}" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                                                                                                <input type="text" id="productNameInput" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->district }}" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Wards</label>
                                                                                                <input type="text" id="productNameInput" name="wards" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->wards }}" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="lg:col-span-2 xl:col-span-12">
                                                                                                <div>
                                                                                                    <label for="productDescription" class="inline-block mb-2 text-base font-medium">Specific Address</label>
                                                                                                    <textarea name="specific_address" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" rows="5">{{ $list->specific_address }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Default</label>
                                                                                                <input id="Checkbox1" name="is_default" class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer" type="checkbox" value="1" {{ $list->is_default == 1 ? 'checked' : ''}}>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="flex justify-end gap-2 mt-4">
                                                                                            <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                                                                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div><!--end add user-->
                                                                        {{-- End Update Address client --}}
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
        </div>
    </div>
    <div id="addressModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Add User</h5>
                <button data-modal-close="addressModal" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="../client/profile/create" method="post">
                    @csrf
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Province</label>
                            <input type="text" id="productNameInput" name="Province" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Province" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Districts</label>
                            <input type="text" id="productNameInput" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Apartment</label>
                            <input type="text" id="productNameInput" name="Apartment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Apartment" required="">
                        </div><!--end col-->
                        <div class="lg:col-span-2 xl:col-span-12">
                            <div>
                                <label for="productDescription" class="inline-block mb-2 text-base font-medium">Specific Address</label>
                                <textarea name="Neighborhood" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Specific Address" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="xl:col-span-12">
                            <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Default</label>
                            <input id="Checkbox1" name="is_default" class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer" type="checkbox">
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end add user-->
@endsection
