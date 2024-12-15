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
                                                <h5>{{ number_format($total) }} VND</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Tổng Tiền Đặt Hàng</p>
                                            </li>

                                            <li class="px-5">
                                                <h5>{{ $countOrder }}+</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Số Lần Đặt hàng Thành Công</p>
                                            </li>
                                        </ul>
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
                                        <p class="mb-4 text-slate-500 dark:text-zink-200">Cập nhật ảnh và thông tin cá nhân của bạn tại đây một cách dễ dàng.</p>
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
                                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sửa Thông Tin</button>
                                                <a href="../client/home" class="text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20"><i data-lucide="arrow-left" class="inline-block size-4"></i><span class="align-middle">Trang Chủ</span></a>
                                            </div>
                                        </form><!--end form-->
                                    </div>
                                </div>
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
                                                    <a href="../client/reset/password" class="underline text-custom-500 text-13">Quên Mật Khẩu ?</a>
                                                </div>
                                                <div class="flex justify-end xl:col-span-6">
                                                    <button type="submit" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Đổi Mặt Khẩu</button>
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
                                                                    <button data-modal-target="addressModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="plus" class="inline-block size-4"></i> <span class="align-middle">Thêm Địa Chỉ</span></button>
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
                                                                                                <a data-modal-target="updateAddress{{ $key }}" style="cursor: pointer" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Sửa Địa Chỉ</span></a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <form action="../client/profile/delete/{{ $list->id }}" method="post">
                                                                                                    @csrf
                                                                                                    @method('DELETE')
                                                                                                    <button onclick="return confirm('Do you want to delete address')" data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" ><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Xóa Địa Chỉ</span></button>
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
                                                                                                <label for="productNameInput{{ $key }}" class="inline-block mb-2 text-base font-medium">Tên</label>
                                                                                                <input type="text" id="productNameInput{{ $key }}" disabled name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->user->name }}">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Số Điện Thoại</label>
                                                                                                <input type="number" id="qualityInput{{ $key }}" disabled name="phone" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" value="{{ $list->user->sdt }}" >
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Thành Phố</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->Province }}" name="Province" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-6">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Quận Huyện</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->district }}" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Ngõ</label>
                                                                                                <input type="text" id="productNameInput" value="{{ $list->Apartment }}" name="Apartment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                                                                                            </div><!--end col-->
                                                                                            <div class="lg:col-span-2 xl:col-span-12">
                                                                                                <div>
                                                                                                    <label for="productDescription" class="inline-block mb-2 text-base font-medium">Địa Chỉ Cụ Thể</label>
                                                                                                    <textarea name="Neighborhood" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" rows="5">{{ $list->Neighborhood }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="xl:col-span-12">
                                                                                                <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Đặt Mặc Định</label>
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
                                                                        <span class="mt-4 status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">Coupon :  {{ $key + 1 }}</span>
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

                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">{{ number_format($list->discount_value) }} {{ $list->discount_type == 'Phần Trăm' ? '%' : 'VND'}}</td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 revenue">{{ $list->discount_type }}</td>
                                                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock">{{ number_format($list->minimum_order_amount) }}VND </td>
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
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Thành Phố/Tỉnh</label>
                            <input type="text" id="productNameInput" name="Province" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Province" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Quận Huyện</label>
                            <input type="text" id="productNameInput" name="district" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="District" required="">
                        </div><!--end col-->
                        <div class="xl:col-span-6">
                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Ngõ</label>
                            <input type="text" id="productNameInput" name="Apartment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Apartment" required="">
                        </div><!--end col-->
                        <div class="lg:col-span-2 xl:col-span-12">
                            <div>
                                <label for="productDescription" class="inline-block mb-2 text-base font-medium">Số Nhà Cụ Thể</label>
                                <textarea name="Neighborhood" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Specific Address" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="xl:col-span-12">
                            <label for="Checkbox1" class="inline-block mb-2 text-base font-medium">Mặc Định</label>
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
