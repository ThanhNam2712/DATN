@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Add New</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Add New
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Create Coupon</h6>
                            @if(session('message'))
                                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                    <span class="font-bold">{{ session('message') }}</span>
                                </div>
                            @endif
                            <form action="../admin/coupon/create" method="post" id="form-coupon">
                            @csrf
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    {{-- Product creare --}}
                                    <div class="xl:col-span-12">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Coupon Name</label>
                                        <input type="text" id="productNameInput" name="code" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title">
                                        <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20 characters when entering the product name.</p>
                                        @error('code')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div><!--end col-->

                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Discount Type</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="discount_type" id="categorySelect">
                                            <option value="">Select Discount Type</option>
                                            <option value="Phần Trăm">Phần Trăm</option>
                                            <option value="Giá Tiền">Giá Tiền</option>
                                        </select>
                                        @error('discount_type')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div><!--end col-->

                                    <div class="xl:col-span-4">
                                        <label for="productPrice" class="inline-block mb-2 text-base font-medium">Discount Value</label>
                                        <input type="number" max="50" min="1" name="discount_value" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder=" < 100">
                                        @error('discount_value')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="productPrice" class="inline-block mb-2 text-base font-medium">Minimum amount</label>
                                        <input type="number" name="minimum_order_amount" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Minimum amount">
                                        @error('minimum_order_amount')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Users (Nếu cần)</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="user_id" id="categorySelect">
                                            <option value="">Select Users</option>
                                            @foreach($user as $list)
                                                <option value="{{ $list->id }}">{{ $list->email }}</option>
                                            @endforeach
                                        </select>
                                    </div><!--end col-->

                                    <div class="xl:col-span-4">
                                        <label for="dateCouponSt" class="inline-block mb-2 text-base font-medium">Date Start</label>
                                        <input type="date" name="start_end" id="dateCouponSt" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" >
                                        @error('start_end')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="dateCouponEn" class="inline-block mb-2 text-base font-medium">Date End</label>
                                        <input type="date" name="expiration_date" id="dateCouponEn" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                        @error('expiration_date')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="productQuantity" class="inline-block mb-2 text-base font-medium">Quantity</label>
                                        <input type="number" name="number" id="productQuantity" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                        @error('number')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
