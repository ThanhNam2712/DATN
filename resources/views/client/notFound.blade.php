@extends('client.layouts.master')
@section('title', 'Shop')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div  class="mb-0 border-none shadow-none lg:w-[500px] card bg-white/70 dark:bg-zink-500/70">
                    <div class="!px-10 !py-12 card-body">
                        <a href="index-1.html">
                            <img src="../assets/images/logo-light.png" alt="" class="hidden h-6 mx-auto dark:block">
                            <img src="../assets/images/logo-dark.png" alt="" class="block h-6 mx-auto dark:hidden">
                        </a>

                        <div class="mt-10">
                            <img src="../assets/images/error-404.png" alt="" class="h-64 mx-auto">
                        </div>
                        <div class="mt-8 text-center">
                            <h4 class="mb-2 text-purple-500">OPPS, Không Tìm Thấy Sản Phẩm</h4>
                            <p class="mb-6 text-slate-500 dark:text-zink-200">Vui Lòng Quay Lại Trang Chủ Để Tìm Hiểu Sản Phẩm Khác.</p>
                            <a href="../client/home" class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="home" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Quay Lại Trang Chủ</span></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection
