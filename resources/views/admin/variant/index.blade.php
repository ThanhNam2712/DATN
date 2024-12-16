@extends('admin.layouts.master')
@section('title', 'color')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Update Product Variant : {{$product->name}}</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a class="text-slate-400 dark:text-zink-200">Products</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Update
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                    <div class="xl:col-span-12">
                        <div class="card">
                            @if(session('message'))
                                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                    <span class="font-bold">{{ session('message') }}</span>
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                                    <button data-modal-target="addVariantProduct" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="plus" class="inline-block size-4"></i>
                                        Add Variant
                                    </span>
                                    </button>
                                </div>
                                <form action="../admin/variant/update" method="post" id="variants">
                                    @csrf
                                    @method('PUT')
                                    @foreach($product->variant as $index => $list)
                                        <div style="margin-top: 35px" class="mb-0 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                            <span class="font-bold">Biến Thể {{ $product->name }}: 00{{ $index + 1 }}</span>
                                        </div>
                                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                            <input type="hidden" name="id[]" value="{{ $list->id }}">
                                            <div class="xl:col-span-4">
                                                <label for="productPrice" class="inline-block mb-2 text-base font-medium">Price</label>
                                                <input type="number" name="price[]" id="productPrice" class="form-input ..." value="{{ $list->price }}" required="">

                                            </div>
                                            <div class="xl:col-span-4">
                                                <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Discounts</label>
                                                <input type="number" name="price_sale[]" id="productDiscounts" class="form-input ..." value="{{ $list->price_sale }}" required="">

                                            </div>
                                            <div class="xl:col-span-4">
                                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Quantity</label>
                                                <input type="number" id="qualityInput" name="quantity[]" class="form-input ..." value="{{ $list->quantity }}" required="">

                                            </div>
                                            {{-- color --}}
                                            <div class="xl:col-span-4">
                                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Color</label>
                                                <select class="form-input ..." name="product_color_id[]" id="categorySelect">
                                                    <option value="">Select Color</option>
                                                    @foreach($color as $listColor)
                                                        <option value="{{ $listColor->id }}" {{ $listColor->id == $list->product_color_id ? 'selected' : ''}}>{{ $listColor->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product_color_id')
                                                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                    <span class="font-bold">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            {{-- size --}}
                                            <div class="xl:col-span-4">
                                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Size</label>
                                                <select class="form-input ..." name="product_size_id[]" id="categorySelect">
                                                    <option value="">Select Size</option>
                                                    @foreach($size as $listSize)
                                                        <option value="{{ $listSize->id }}" {{ $listSize->id == $list->product_size_id ? 'selected' : ''}}>{{ $listSize->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product_size_id')
                                                <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                    <span class="font-bold">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="xl:col-span-4">
                                                <a onclick="return confirm('Do you want to delete this product')" href="../admin/variant/delete/{{ $list->id }}" class="mt-7 flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="flex justify-end gap-2 mt-4">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <a href="../admin/products" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Quay Lại</a>
                                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Cập Nhật Biến Thể</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addVariantProduct" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Add Variant</h5>
                <button data-modal-close="addVariantProduct" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="../admin/variant/create" method="post" id="newVariantPost">
                    @csrf
                     {{-- Products variants --}}
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="productPrice" class="inline-block mb-2 text-base font-medium">Price</label>
                                <input type="number" name="price" id="variantPriceNew" class="form-input ...">
                            </div>

                            <div class="xl:col-span-6">
                                <label for="productDiscounts" class="inline-block mb-2 text-base font-medium">Discounts</label>
                                <input type="number" name="price_sale" id="variantDiscountsNew" class="form-input ..." >

                            </div>

                            <div class="xl:col-span-6">
                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Quantity</label>
                                <input type="number" id="qualityInput" name="quantity" class="form-input ..." >

                            </div>

                            {{-- color --}}
                            <div class="xl:col-span-6">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Color</label>
                                <select class="form-input ..." name="product_color_id" id="categorySelect">
                                    <option value="">Select Color</option>
                                    @foreach($color as $listColor)
                                        <option value="{{ $listColor->id }}" >{{ $listColor->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            {{-- size --}}
                            <div class="xl:col-span-6">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Size</label>
                                <select class="form-input ..." name="product_size_id" id="categorySelect">
                                    <option value="">Select Size</option>
                                    @foreach($size as $listSize)
                                        <option value="{{ $listSize->id }}">{{ $listSize->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="reset" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Reset</button>
                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end add user-->

    <script>
        document.getElementById('variants').addEventListener('submit', function(e){
            const priceInputs = document.querySelectorAll(`input[name="price[]"]`);
            const priceSaleInputs = document.querySelectorAll(`input[name="price_sale[]"]`);

            priceInputs.forEach((priceInput, index) => {
                const priceSaleInput = priceSaleInputs[index];

                if (parseFloat(priceSaleInput.value) > parseFloat(priceInput.value)) {
                    e.preventDefault(); // Ngăn form gửi đi
                    alert(`Giá giảm không được lớn hơn giá gốc ở hàng ${index + 1}.`);
                }
            });
        });
    </script>

    <script>
        document.getElementById('newVariantPost').addEventListener('submit', function(e){
            const variantPriceNew = document.getElementById('variantPriceNew').value;
            const variantDiscountsNew = document.getElementById('variantDiscountsNew').value;


            if (variantDiscountsNew > variantPriceNew) {
                e.preventDefault(); // Ngăn form gửi đi
                alert(`Giá giảm không được lớn hơn giá gốc`);
            }

        });
    </script>
@endsection
