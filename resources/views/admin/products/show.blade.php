@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')

<div
    class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Thông tin sản phẩm: {{$product->name}}</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li
                    class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="#!" class="text-slate-400 dark:text-zink-200">Sản phẩm</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Thông tin sản phẩm
                </li>
            </ul>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
            <div class="xl:col-span-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h6 class="mb-4 text-15">Update Product : {{$product->name}}</h6> --}}

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            {{-- Product creare --}}
                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Tên sản
                                    phẩm</label>
                                <input disabled value="{{$product->name}}" type="text" id="productNameInput" name="name"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Tên sản phẩm">
                                {{-- <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20
                                    characters when entering the product name.</p> --}}
                            </div>
                            <!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Mô
                                    tả</label>
                                <input disabled type="text" value="{{$product->description}}" id="productNameInput"
                                    name="description"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Mô tả">
                                {{-- <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Do not exceed 20
                                    characters when entering the product name.</p> --}}
                                @error('description')
                                <div
                                    class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                    <span class="font-bold">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="xl:col-span-4">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Thương
                                    hiệu</label>
                                <select disabled
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    data-choices="" data-choices-search-false="" name="brand_id" id="categorySelect">
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach($brand as $id => $name)
                                    <option @selected($product->brand_id == $id)
                                        value="{{ $id }}">{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div
                                    class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                    <span class="font-bold">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="xl:col-span-4">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Danh
                                    mục</label>
                                <select disabled
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    data-choices="" data-choices-search-false="" name="category_id" id="categorySelect">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($category as $id => $name)
                                    <option @selected($product->category_id == $id)
                                        value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div
                                    class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                    <span class="font-bold">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <!--end col-->

                            {{-- active --}}
                            <div class="xl:col-span-4">
                                <label for="yellowIconSwitch"
                                    class="inline-block text-base font-medium cursor-pointer">Sản phẩm xu hướng</label>
                                <div
                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                    <input disabled type="checkbox" {{ $product->is_trending ? 'checked' : '' }}
                                    name="is_trending" id="is_trending" class="absolute block size-5 transition
                                    duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full
                                    appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published
                                    checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0
                                    checked:bg-none checked:border-yellow-500 dark:checked:border-yellow-500 arrow-none
                                    after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99']
                                    after:text-xs after:inset-0 after:flex after:items-center after:justify-center
                                    after:font-remix after:leading-none checked:after:text-yellow-500
                                    dark:checked:after:text-yellow-500 checked:after:content-['\eb7b']">
                                    <label for="yellowIconSwitch"
                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-yellow-500 peer-checked/published:border-yellow-500"></label>
                                </div>
                            </div>
                            <div class="xl:col-span-4">
                                <label for="customIconSwitch"
                                    class="inline-block text-base font-medium cursor-pointer">Sản phẩm giảm giá</label>
                                <div
                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                    <input disabled type="checkbox" {{ $product->is_sale ? 'checked' : '' }}
                                    name="is_sale" id="is_sale" class="absolute block size-5 transition duration-300
                                    ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full
                                    appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published
                                    checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0
                                    checked:bg-none checked:border-custom-500 dark:checked:border-custom-500 arrow-none
                                    after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99']
                                    after:text-xs after:inset-0 after:flex after:items-center after:justify-center
                                    after:font-remix after:leading-none checked:after:text-custom-500
                                    dark:checked:after:text-custom-500 checked:after:content-['\eb7b']" >
                                    <label for="customIconSwitch"
                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-500 peer-checked/published:border-custom-500"></label>
                                </div>
                            </div>
                            <div class="xl:col-span-4">
                                <label for="orangeIconSwitch"
                                    class="inline-block text-base font-medium cursor-pointer">Sản phẩm mới</label>
                                <div
                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                    <input disabled type="checkbox" {{ $product->is_new ? 'checked' : '' }}
                                    name="is_new" id="orangeIconSwitch" class="absolute block size-5 transition
                                    duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full
                                    appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published
                                    checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0
                                    checked:bg-none checked:border-orange-500 dark:checked:border-orange-500 arrow-none
                                    after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99']
                                    after:text-xs after:inset-0 after:flex after:items-center after:justify-center
                                    after:font-remix after:leading-none checked:after:text-orange-500
                                    dark:checked:after:text-orange-500 checked:after:content-['\eb7b']" >
                                    <label for="orangeIconSwitch"
                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-orange-500 peer-checked/published:border-orange-500"></label>
                                </div>
                            </div>
                            <div class="xl:col-span-4">
                                <label for="yellowIconSwitch"
                                    class="inline-block text-base font-medium cursor-pointer">Hiện trang chủ</label>
                                <div
                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                    <input disabled type="checkbox" {{ $product->is_show_home ? 'checked' : '' }}
                                    name="is_show_home" id="is_show_home" class="absolute block size-5 transition
                                    duration-300 ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full
                                    appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published
                                    checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0
                                    checked:bg-none checked:border-yellow-500 dark:checked:border-yellow-500 arrow-none
                                    after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99']
                                    after:text-xs after:inset-0 after:flex after:items-center after:justify-center
                                    after:font-remix after:leading-none checked:after:text-yellow-500
                                    dark:checked:after:text-yellow-500 checked:after:content-['\eb7b']" >
                                    <label for="yellowIconSwitch"
                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-yellow-500 peer-checked/published:border-yellow-500"></label>
                                </div>
                            </div>
                            <div class="xl:col-span-4">
                                <label for="redIconSwitch"
                                    class="inline-block text-base font-medium cursor-pointer">Kích hoạt sản phẩm</label>
                                <div
                                    class="relative inline-block w-10 align-middle transition duration-200 ease-in ltr:mr-2 rtl:ml-2">
                                    <input disabled type="checkbox" {{ $product->is_active ? 'checked' : '' }}
                                    name="is_active" id="is_active" class="absolute block size-5 transition duration-300
                                    ease-linear border-2 border-slate-200 dark:border-zink-500 rounded-full
                                    appearance-none cursor-pointer bg-white/80 dark:bg-zink-600 peer/published
                                    checked:bg-white dark:checked:bg-white ltr:checked:right-0 rtl:checked:left-0
                                    checked:bg-none checked:border-red-500 dark:checked:border-red-500 arrow-none
                                    after:absolute after:text-slate-500 dark:after:text-zink-200 after:content-['\eb99']
                                    after:text-xs after:inset-0 after:flex after:items-center after:justify-center
                                    after:font-remix after:leading-none checked:after:text-red-500
                                    dark:checked:after:text-red-500 checked:after:content-['\eb7b']" >
                                    <label for="redIconSwitch"
                                        class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-red-500 peer-checked/published:border-red-500"></label>
                                </div>
                            </div>
                            {{-- end active --}}
                            <div class="lg:col-span-2 xl:col-span-12">
                                <label for="genderSelect" class="inline-block mb-2 text-base font-medium">Ảnh sản
                                    phẩm</label>

                                <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete"
                                    style="width: 200px; height: 200px">
                                    <div class="border rounded border-slate-200 dark:border-zink-500">
                                        <div class="dz-details">
                                            <div class="dz-thumbnail">
                                                <img src="{{ Storage::url($product->image) }}" alt="Image Preview">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="dz-size" id="fileSize"><strong>0.8</strong> MB</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-2 xl:col-span-12">
                                <div>
                                    <label for="productDescription"
                                        class="inline-block mb-2 text-base font-medium">Nội dung</label>
                                    <textarea disabled name="content"
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        id="productDescription" placeholder="Nội dung..."
                                        rows="5">{{$product->content}}</textarea>
                                </div>
                            </div>
                            @error('content')
                            <div
                                class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                <span class="font-bold">{{ $message }}</span>
                            </div>
                            @enderror
                            {{-- End Product creare --}}
                        </div>
                        <!--end grid-->
                        <h6 class="mb-4 text-30 mt-5 mb-5" style="text-align: center">Biến thể sản phẩm</h6>
                        <div id="variants">
                            @foreach($product->variant as $index => $list)
                            <div id="variant-{{ $index }}">
                                <div style="margin-top: 38px"
                                    class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    {{-- Products variants --}}
                                    @if(isset($list->id))
                                    <input disabled type="hidden" name="variants[{{ $index }}][id]"
                                        value="{{ $list->id }}">
                                    @endif

                                    <div class="xl:col-span-4">
                                        <label for="productPrice"
                                            class="inline-block mb-2 text-base font-medium">Giá</label>
                                        <input disabled type="number" name="variants[{{ $index ?? variants[0]}}][price]"
                                            id="productPrice" class="form-input ..." value="{{ $list->price }}"
                                            required="">
                                        @error('price')
                                        <div
                                            class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="productDiscounts"
                                            class="inline-block mb-2 text-base font-medium">Giảm giá</label>
                                        <input disabled type="number"
                                            name="variants[{{ $index ?? variants[0] }}][price_sale]"
                                            id="productDiscounts" class="form-input ..." value="{{ $list->price_sale }}"
                                            required="">
                                        @error('price_sale')
                                        <div
                                            class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="xl:col-span-4">
                                        <label for="qualityInput"
                                            class="inline-block mb-2 text-base font-medium">Số lượng</label>
                                        <input disabled type="number" id="qualityInput"
                                            name="variants[{{ $index ?? variants[0] }}][quantity]"
                                            class="form-input ..." value="{{ $list->quantity }}" required="">
                                        @error('quantity')
                                        <div
                                            class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    {{-- color --}}
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect"
                                            class="inline-block mb-2 text-base font-medium">Màu sắc</label>
                                        <select disabled class="form-input ..."
                                            name="variants[{{ $index ?? variants[0] }}][product_color_id]"
                                            id="categorySelect">
                                            <option value="">Select Color</option>
                                            @foreach($color as $listColor)
                                            <option value="{{ $listColor->id }}" {{ $listColor->id ==
                                                $list->product_color_id ? 'selected' : ''}}>{{ $listColor->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('product_color_id')
                                        <div
                                            class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    {{-- size --}}
                                    <div class="xl:col-span-4">
                                        <label for="categorySelect"
                                            class="inline-block mb-2 text-base font-medium">Kích cỡ</label>
                                        <select disabled class="form-input ..."
                                            name="variants[{{ $index ?? variants[0] }}][product_size_id]"
                                            id="categorySelect">
                                            <option value="">Select Size</option>
                                            @foreach($size as $listSize)
                                            <option value="{{ $listSize->id }}" {{ $listSize->id ==
                                                $list->product_size_id ? 'selected' : ''}}>{{ $listSize->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('product_size_id')
                                        <div
                                            class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex justify-end gap-2 mt-4">

                            {{-- <a href="../admin/products"
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Edit
                                Product</a> --}}
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->

        </div>
        <!--end grid-->
    </div>
    <!-- container-fluid -->
</div>

@endsection
