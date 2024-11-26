@extends('admin.layouts.master')

@section('title')
Danh mục sản phẩm
@endsection
@section('body')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">List View</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="#!" class="text-slate-400 dark:text-zink-200">Category</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    List View
                </li>
            </ul>
        </div>
        @if (session('success'))
            <div class="alert alert-success text-green-500 bg-green-100 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
<<<<<<< HEAD
            <div class="card" id="customerList">
                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            <thead class="bg-slate-100 dark:bg-zinc-600">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Ảnh</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td class="customer_name">{{ $category->name }}</td>
                                    <td class="image">
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->name }}" class="w-16 h-16">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                           class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                           Edit
                                        </a>
                                        <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                           class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn"
                                           onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $category->id }}').submit(); }">
                                           Xóa
                                        </a>
                                        {{-- <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
                                    </td>
=======
>>>>>>> 32488c3c0171f99681826f3ff09d74f46448a395

        <div class="card" id="productListTable">
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                    <div class="xl:col-span-2">

                    </div><!--end col-->
                    <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                        <a href="{{ route("admin.categories.create") }}" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                            <i data-lucide="plus" class="inline-block size-4"></i>
                            <span class="align-middle">Add Product</span>
                        </a>
                    </div>
                </div><!--end grid-->
            </div>
            <div class="!pt-1 card-body">
                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap" id="productTable">
                        <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code" data-sort="product_code">Category Code</th>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Category Name</th>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort status" data-sort="status">Category Product</th>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($categories as $index => $category)
                            <tr>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <a href="#!" class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">#TAD-2321000{{ $index + 1 }}</a>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                    <a href="apps-ecommerce-product-overview.html" class="flex items-center gap-2">
                                        <img src="{{ Storage::url($category->image) }}" alt="Product images" style="width: 60px; height: 100%" class="h-6">
                                        <h6 class="ms-3 product_name">{{ $category->name }}</h6>
                                    </a>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <span class="status px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-orange-100 border-transparent text-orange-500 dark:bg-orange-500/20 dark:border-transparent">{{ $category->products->count() }}</span>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                       class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                       class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn"
                                       onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $category->id }}').submit(); }">
                                        Xóa
                                    </a>
                                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="py-6 text-center">
                            <i data-lucide="search" class="w-6 h-6 mx-auto mb-3 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                            <h5 class="mt-2 mb-1">Sorry! No Result Found</h5>
                            <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+ product We did not find any product for you search.</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center gap-4 px-4 mt-4 md:flex-row" id="pagination-element">
                    <div class="grow">
                        <p class="text-slate-500 dark:text-zink-200">Showing <b class="showing">10</b> of <b class="total-records">38</b> Results</p>
                    </div>

                    <div class="col-sm-auto mt-sm-0">
                        <div class="flex gap-2 pagination-wrap justify-content-center">
                            <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev " href="javascript:void(0)">
                                <i class="mr-1 size-4 rtl:rotate-180" data-lucide="chevron-left"></i> Prev
                            </a>
                            <ul class="flex flex-wrap items-center gap-2 pagination listjs-pagination">
                            </ul>
                            <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-next" href="javascript:void(0)">
                                Next <i class="ml-1 size-4 rtl:rotate-180" data-lucide="chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
