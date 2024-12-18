@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Thêm mới</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Sản phẩm</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Thêm mới
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h6 class="mb-4 text-15">Create Product</h6> --}}
                            <form action="../admin/products/create" method="post" id="form-product" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    {{-- Product creare --}}
                                    <div class="xl:col-span-6">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Tên sản phẩm</label>
                                        <input type="text" id="productNameInput" name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Tên sản phẩm" >
                                        {{-- <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20 characters when entering the product name.</p> --}}
                                        @error('name')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Mô tả</label>
                                        <input type="text" id="productNameInput" name="description" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Mô tả" >
                                        {{-- <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20 characters when entering the product name.</p> --}}
                                        @error('description')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Thương hiệu</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="brand_id" id="categorySelect">
                                            <option value="">Chọn thương hiệu</option>
                                            @foreach($brand as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Danh mục</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="category_id" id="categorySelect">
                                            <option value="">Chọn danh mục</option>
                                            @foreach($category as $list)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div><!--end col-->
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Tag</label>
                                        <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="tags[]" id="categorySelect" multiple>
                                            <option value=""  >Chọn Tag</option>
                                            @foreach ($tags as $id => $name)
                                                <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div><!--end col-->
                                    {{-- active --}}
                                    <div class="xl:col-span-4">
                                        <label for="yellowIconSwitch" class="inline-block text-base font-medium cursor-pointer">Sản phẩm xu hướng</label>
                                        <div class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                            <input type="checkbox" name="is_trending" id="is_trending" class="absolute block size-5 transition duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0 checked:bg-none checked:border-yellow-500 dark:checked:border-yellow-500 arrow-none after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99'] after:text-xs after:inset-0 after:flex after:items-center after:justify-center after:font-remix after:leading-none checked:after:text-yellow-500 dark:checked:after:text-yellow-500 checked:after:content-['\eb7b']">
                                            <label for="yellowIconSwitch" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-yellow-500 peer-checked/published:border-yellow-500"></label>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-4">
                                        <label for="customIconSwitch" class="inline-block text-base font-medium cursor-pointer">Sản phẩm giảm giá</label>
                                        <div class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                            <input type="checkbox" name="is_sale" id="customIconSwitch" class="absolute block size-5 transition duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0 checked:bg-none checked:border-custom-500 dark:checked:border-custom-500 arrow-none after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99'] after:text-xs after:inset-0 after:flex after:items-center after:justify-center after:font-remix after:leading-none checked:after:text-custom-500 dark:checked:after:text-custom-500 checked:after:content-['\eb7b']" >
                                            <label for="customIconSwitch" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500"></label>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-4">
                                        <label for="orangeIconSwitch" class="inline-block text-base font-medium cursor-pointer">Sản phẩm mới</label>
                                        <div class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                            <input type="checkbox" name="is_new" id="orangeIconSwitch" class="absolute block size-5 transition duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0 checked:bg-none checked:border-orange-500 dark:checked:border-orange-500 arrow-none after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99'] after:text-xs after:inset-0 after:flex after:items-center after:justify-center after:font-remix after:leading-none checked:after:text-orange-500 dark:checked:after:text-orange-500 checked:after:content-['\eb7b']" >
                                            <label for="orangeIconSwitch" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-orange-500 peer-checked/published:border-orange-500"></label>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-4">
                                        <label for="yellowIconSwitch" class="inline-block text-base font-medium cursor-pointer">Hiện trên trang chủ</label>
                                        <div class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                            <input type="checkbox" name="is_show_home" id="yellowIconSwitch" class="absolute block size-5 transition duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0 checked:bg-none checked:border-yellow-500 dark:checked:border-yellow-500 arrow-none after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99'] after:text-xs after:inset-0 after:flex after:items-center after:justify-center after:font-remix after:leading-none checked:after:text-yellow-500 dark:checked:after:text-yellow-500 checked:after:content-['\eb7b']" >
                                            <label for="yellowIconSwitch" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-yellow-500 peer-checked/published:border-yellow-500"></label>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-4">
                                        <label for="redIconSwitch" class="inline-block text-base font-medium cursor-pointer">Kích hoạt sản phẩm</label>
                                        <div class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                            <input type="checkbox" name="is_active" id="redIconSwitch" class="absolute block size-5 transition duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0 checked:bg-none checked:border-red-500 dark:checked:border-red-500 arrow-none after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99'] after:text-xs after:inset-0 after:flex after:items-center after:justify-center after:font-remix after:leading-none checked:after:text-red-500 dark:checked:after:text-red-500 checked:after:content-['\eb7b']" >
                                            <label for="redIconSwitch" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-red-500 peer-checked/published:border-red-500"></label>
                                        </div>
                                    </div>
                                    {{-- end active --}}
                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <label for="genderSelect" class="inline-block mb-2 text-base font-medium">Ảnh sản phẩm</label>
                                        <div class="flex items-center justify-center bg-white border border-dashed rounded-md cursor-pointer dropzone border-slate-300 dark:bg-zink-700 dark:border-zink-500">
                                            <div class="w-full py-5 text-lg text-center ">
                                                <div class="dropzone needsclick p-0 dz-clickable" id="dropzone-basic">
                                                    <div class="dz-message needsclick">
                                                        <p class="h4 needsclick pt-4 mb-2">Kéo và thả hình ảnh của bạn vào đây</p>
                                                        <p class="h6 text-muted d-block fw-normal mb-2">hoặc</p>
                                                        <span class="note needsclick btn btn-sm btn-label-primary" id="btnBrowse">
                                                            Duyệt hình ảnh
                                                            <input type="file" name="image" id="fileInput">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete" id="dzPreview" style="display: none; width: 100px; height: 200px">
                                            <div class="border rounded border-slate-200 dark:border-zink-500">
                                                <div class="dz-details">
                                                    <div class="dz-thumbnail">
                                                        <img id="imageThumbnail" data-dz-thumbnail="" alt="Image Preview">
                                                        <span class="dz-nopreview">No preview</span>
                                                        <div class="dz-success-mark"></div>
                                                        <div class="dz-error-mark"></div>
                                                        <div class="dz-error-message">
                                                            <span data-dz-errormessage=""></span>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="dz-filename" id="fileName"></div>
                                                    {{-- <div class="dz-size" id="fileSize"><strong>0.8</strong> MB</div> --}}
                                                </div>
                                                <a class="dz-remove px-2 py-1.5 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20" href="javascript:void(0);" id="removeFile">Remove file</a>
                                            </div>

                                        </div>
                                        @error('image')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <div>
                                            <h6 class="mb-4 text-15">Nội Dung Dài</h6>
                                            <textarea class="ckeditor-classic text-slate-800" name="content">

                                            </textarea>
                                        </div>
                                        @error('content')
                                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div><!--end card-->
                                    {{-- End Product creare --}}
                                </div><!--end grid-->
                                <h6 class="mb-4 text-30 mt-5 mb-5" style="text-align: center">Biến thể sản phẩm</h6>
                                <div id="variants" >
                                    <div style="margin-top: 38px" class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    {{-- Products variants --}}
                                        <div class="xl:col-span-4">
                                            <label for="productPrice" class="inline-block mb-2 text-base font-medium">Giá</label>
                                            <input type="number" name="variants[0][price]" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="VND">
                                            @error('price')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="xl:col-span-4">
                                            <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Giảm giá</label>
                                            <input type="number" name="variants[0][price_sale]" id="productDiscounts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="VND">
                                            @error('price_sale')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="xl:col-span-4">
                                            <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Số lượng</label>
                                            <input type="number" id="qualityInput" name="variants[0][quantity]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Số lượng">
                                            @error('quantity')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        {{-- color--}}
                                        <div class="xl:col-span-4">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Màu sắc</label>
                                            <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="variants[0][product_color_id]" id="categorySelect">
                                                <option value="">Chọn màu</option>
                                                @foreach($color as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_color_id')
                                                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                    <span class="font-bold">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <!--end col-->
                                        {{-- size --}}
                                        <div class="xl:col-span-4">
                                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Kích cỡ</label>
                                            <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="variants[0][product_size_id]" id="categorySelect">
                                                <option value="">Chọn kích cỡ</option>
                                                @foreach($size as $list)
                                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_size_id')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                        <!--end col-->
                                </div>
                                </div>
                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Đặt lại</button>
                                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Lưu</button>
                                    <button type="button" onclick="addVariant()" class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Thêm biến thể</button>
                                </div>
                            </form>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->

            </div><!--end grid-->
        </div>
        <!-- container-fluid -->
    </div>
    <script>
        let variantIndex = 1;
        document.getElementById('form-product').addEventListener('submit', function(e) {
            // Iterate through all the variants before submitting
            const priceInputs = document.querySelectorAll(`input[name^="variants"][name$="[price]"]`);
            const priceSaleInputs = document.querySelectorAll(`input[name^="variants"][name$="[price_sale]"]`);

            const colors = document.querySelectorAll(`select[name^="variants"][name$="[product_color_id]"]`);
            const sizes = document.querySelectorAll(`select[name^="variants"][name$="[product_size_id]"]`);

            priceInputs.forEach((priceInput, index) => {
                const priceSaleInput = priceSaleInputs[index];

                if (parseFloat(priceSaleInput.value) > parseFloat(priceInput.value)) {
                    e.preventDefault();
                    alert("Giá tiền giảm không được lớn hơn giá tiền gốc.");
                    return;
                }
            });

            const selectedColors = Array.from(colors).map(select => select.value);
            const selectedSizes = Array.from(sizes).map(select => select.value);

            const colorSet = new Set(selectedColors.filter(val => val !== ""));
            if (colorSet.size !== selectedColors.filter(val => val !== "").length) {
                alert("Vui Lòng Không Chọn Trùng Màu Sắc!");
                e.preventDefault();
                return;
            }

            const sizeSet = new Set(selectedSizes.filter(val => val !== ""));
            if (sizeSet.size !== selectedSizes.filter(val => val !== "").length) {
                alert("Vui Lòng Không Chọn Trùng Kích Thước!");
                e.preventDefault();
                return;
            }
            return true;
        });
        function addVariant(){
            const variantTemplate = `
            <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    {{-- Products variants --}}
                <div class="xl:col-span-4">
                    <label for="productPrice" class="inline-block mb-2 text-base font-medium">Giá</label>
                    <input type="number" name="variants[${variantIndex}][price]" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="VND" required="">
                </div>

                <div class="xl:col-span-4">
                    <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Giảm Giá</label>
                    <input type="number" name="variants[${variantIndex}][price_sale]" id="productDiscounts" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="VND" required="">
                </div>

                <div class="xl:col-span-4">
                    <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Số Lượng</label>
                    <input type="number" id="qualityInput" name="variants[${variantIndex}][quantity]" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Quantity" required="">
                </div>

                {{-- color--}}
                <div class="xl:col-span-4">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Màu Sắc</label>
                    <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="variants[${variantIndex}][product_color_id]" id="categorySelect">
                        <option value="">Select Color</option>
                        @foreach($color as $list)
                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!--end col-->
                {{-- size --}}
                <div class="xl:col-span-4">
                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Kích Thước</label>
                    <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="variants[${variantIndex}][product_size_id]" id="categorySelect">
                    <option value="">Select Size</option>
                        @foreach($size as $list)
                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="xl:col-span-4">
                    <button style="margin-top: 31px" type="button" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i class="ri-delete-bin-line w-4 h-4"></i></button>
                </div>
            <!--end col-->
</div>
`;
            document.getElementById('variants').insertAdjacentHTML('beforeend', variantTemplate);
            const removeButtons = document.querySelectorAll('.remove-button');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Lấy phần tử cha của nút xóa và xóa nó
                    this.closest('.grid').remove();
                });
            });
            variantIndex++;
        }

    </script>
@endsection
