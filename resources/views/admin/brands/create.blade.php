@extends('admin.layouts.master')

@section('title')
Thêm sản phẩm
@endsection
@section('body')
<div
class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
<div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
        <div class="grow">
            <h5 class="text-16"> Thêm mới</h5>
        </div>
        <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
            <li
                class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                <a href="{{route('brands.index')}}" class="text-slate-400 dark:text-zink-200">Thương hiệu</a>
            </li>
            <li class="text-slate-700 dark:text-zink-100">
               Thêm mới
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="../admin/brands/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid ">
                    <div class="mb-4">
                        <label for="firstNameInput2"
                            class="inline-block mb-2 text-base font-medium">Tên thương hiệu<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="firstNameInput2"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Nhập tên thương hiệu" value="" name="name" id="name" required="">
                    </div>
                    <div class="mb-4">
                        <label for="lastNameInput2" class="inline-block mb-2 text-base font-medium">Ảnh<span class="text-red-500">*</span></label>
                        <input type="file" name="image" id="image"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                             required="">
                    </div>
                </div>
                <div class="flex justify-end gap-2">

                    <button type="submit"
                        class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Lưu</button>
                </div>
            </form>
        </div>
    </div>



</div>
<!-- container-fluid -->
</div>
@endsection
