@extends('admin.layouts.master')
@section('title', 'Image')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">List Image Color</h5>
                    </div>
                    @if(session('message'))
                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                            <span class="font-bold">{{ session('message') }}</span>
                        </div>
                    @endif
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            List Image
                        </li>
                    </ul>
                </div>
                <div class="card" id="productListTable">
                    <div class="card-body">
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-3">
                                <div class="relative">
                                    <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                    <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                </div>
                            </div><!--end col-->
                            <div class="xl:col-span-2">
                                <div>
                                    <input type="text" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" readonly="readonly" placeholder="Select Date">
                                </div>
                            </div><!--end col-->
                            <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                                <a href="#!" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="plus" class="inline-block size-4"></i>
                                    Add Product
                                    </span>
                                </a>
                            </div>
                        </div><!--end grid-->
                    </div>
                    <div class="!pt-1 card-body">
                        <div class="overflow-x-auto">
                            @foreach($product->variant as $key => $list)
                                <h6 class="product_name" style="text-align: center">{{ $list->color->name }}</h6>
                                <table class="mt-4 w-full whitespace-nowrap" id="productTable">
                                    <thead class="mt-5 ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                    <tr>
                                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code" data-sort="product_code">Product Color</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name" data-sort="product_name">Image Color</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Change Image</th>
                                        <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($list->image as $key => $image)
                                        @if($image->variant_id == $list->id)
                                            <tr>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <a href="" class="transition-all duration-150 ease-linear product_code text-custom-500 hover:text-custom-600">#TAD-2321000{{ $key + 1 }}</a>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                    <a href="" class="flex items-center gap-2">
                                                        <img src="{{ Storage::url($image->file_path) }}" alt="Product images" class="h-6" style="width: 90px; height: 90%">
                                                    </a>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                                        <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                                            <form action="../admin/gallery/update/{{ $image->id }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="file" name="file_path">
                                                                <input type="hidden" name="old_image" value="{{ $image->file_path }}">
                                                                <button type="submit" class="mt-3 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Update Image</button>
                                                            </form>
                                                        </span>
                                                </td>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                                    <form action="../admin/products/{{ $product->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Do you want to delete this image')" style="margin-top: 20px; margin-left: 24px; cursor: pointer" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100">
                                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="../admin/products/" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Back</a>
                                <a href="../admin/gallery/product/{{ $product->id }}/create/{{ $list->id }}" class="mt-3 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Image</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
