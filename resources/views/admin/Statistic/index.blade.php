@extends('admin.layouts.master')
@section('title', 'statistic')
@section('body')

<div
    class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        @if(Session::has('message'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            swal("Message", "{{ Session::get("message") }}", "success", {
                        button:true,
                        button:"OK",
                    })
        </script>
        @endif
        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16"></h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li
                    class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="#!" class="text-slate-400 dark:text-zink-200">Trang chủ</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Thống kê
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">
            <div class="relative col-span-12 overflow-hidden card 2xl:col-span-8 bg-slate-900">

                <div class="absolute inset-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-100" version="1.1"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" width="1440"
                        height="560" preserveaspectratio="none" viewbox="0 0 1440 560">
                        <g mask="url(&quot;#SvgjsMask1000&quot;)" fill="none">
                            <use xlink:href="#SvgjsSymbol1007" x="0" y="0"></use>
                            <use xlink:href="#SvgjsSymbol1007" x="720" y="0"></use>
                        </g>
                        <defs>
                            <mask id="SvgjsMask1000">
                                <rect width="1440" height="560" fill="#ffffff"></rect>
                            </mask>
                            <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath1003"></path>
                            <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath1004"></path>
                            <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath1001"></path>
                            <path d="M2 -2 L-2 2z" id="SvgjsPath1005"></path>
                            <path d="M6 -6 L-6 6z" id="SvgjsPath1002"></path>
                            <path d="M30 -30 L-30 30z" id="SvgjsPath1006"></path>
                        </defs>
                        <symbol id="SvgjsSymbol1007">
                            <use xlink:href="#SvgjsPath1001" x="30" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="30" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="30" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="30" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="30" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="30" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="30" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="30" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="30" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="30" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="90" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1004" x="90" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="90" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="90" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="90" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="150" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="150" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="150" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="150" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="150" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="150" y="330" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1004" x="150" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="150" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="150" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="150" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="210" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="210" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="210" y="150" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1002" x="210" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="210" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="210" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="210" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="210" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="210" y="510" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1003" x="210" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="270" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="270" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="270" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="270" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="270" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="270" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="270" y="390" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1002" x="270" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="270" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="270" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="330" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="330" y="90" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1002" x="330" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="330" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="330" y="270" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1001" x="330" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="330" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="330" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="330" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="330" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1004" x="390" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="390" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="390" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="390" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="390" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="390" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="390" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="390" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="390" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="390" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1004" x="450" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="450" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="450" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="450" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="450" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="510" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="510" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="510" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="510" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="510" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1004" x="510" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="510" y="390" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1001" x="510" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="510" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="510" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="570" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="570" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="570" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="570" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="570" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="570" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="570" y="390" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1005" x="570" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="570" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="570" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="630" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="630" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="630" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="630" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="630" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="630" y="330" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1002" x="630" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="630" y="450" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1001" x="630" y="510" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="630" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="690" y="30" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="690" y="90" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="690" y="150" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1002" x="690" y="210" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1005" x="690" y="270" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1001" x="690" y="330" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="690" y="390" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1003" x="690" y="450" stroke="rgba(32, 43, 61, 1)"></use>
                            <use xlink:href="#SvgjsPath1006" x="690" y="510" stroke="rgba(32, 43, 61, 1)"
                                stroke-width="3"></use>
                            <use xlink:href="#SvgjsPath1003" x="690" y="570" stroke="rgba(32, 43, 61, 1)"></use>
                        </symbol>
                    </svg>
                </div>
                <div class="relative card-body">
                    <div class="grid items-center grid-cols-12">
                        <div class="col-span-12 lg:col-span-8 2xl:col-span-7">
                            <h5 class="mb-3 font-normal tracking-wide text-slate-200">Trang quản trị 🎉</h5>
                            <p class="mb-5 text-slate-400">Trang thống kê tổng hợp và hiển thị các số liệu quan trọng
                                của cửa hàng, giúp theo dõi tình hình hoạt động. Với các biểu đồ trực quan và bảng số
                                liệu chi tiết, trang này cung cấp thông tin về doanh thu, số lượng đơn hàng, sản phẩm
                                bán chạy, và tình trạng kho hàng, hỗ trợ việc đưa ra quyết định nhanh chóng và chính
                                xác.
                            </p>
                        </div>
                        <div
                            class="hidden col-span-12 2xl:col-span-3 lg:col-span-2 lg:col-start-11 2xl:col-start-10 lg:block">
                            <img src="assets/images/dashboard.png" alt="" class="h-40 ltr:2xl:ml-auto rtl:2xl:mr-auto">
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card 2xl:col-span-4 2xl:row-span-2">
                <div class="card-body">
                    <div class="flex items-center mb-3">
                        <h6 class="grow text-15">Danh mục</h6>
                        <div class="relative">
                        </div>
                    </div>
                    <div>
                        <canvas id="categoryChart" style="width: 360px; margin: auto; height: 300px"
                            class="apex-charts">

                        </canvas>
                    </div>

                </div>
            </div>

            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div
                        class="flex items-center justify-center mx-auto rounded-full size-14 bg-custom-100 text-custom-500 dark:bg-custom-500/20">
                        <i data-lucide="wallet-2"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value"
                            data-target="{{ $order->sum('total_amount') }}">0</span>VND</h5>
                    <p class="text-slate-500 dark:text-zink-200">Doanh thu</p>
                    <a href="{{ route('admin.statistic.price') }}" style="color: red; bottom: 1px; right: 1px;">-> Chi tiết doanh thu</a>

                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div
                        class="flex items-center justify-center mx-auto text-purple-500 bg-purple-100 rounded-full size-14 dark:bg-purple-500/20">
                        <i data-lucide="package"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $order->count() }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Đơn hàng thành công</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div
                        class="flex items-center justify-center mx-auto text-green-500 bg-green-100 rounded-full size-14 dark:bg-green-500/20">
                        <i data-lucide="truck"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $countShipment }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Đã giao hàng</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div
                        class="flex items-center justify-center mx-auto text-red-500 bg-red-100 rounded-full size-14 dark:bg-red-500/20">
                        <i data-lucide="package-x"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $orderCancel->count() }}">0</span>
                    </h5>
                    <p class="text-slate-500 dark:text-zink-200">Đơn thất bại</p>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card 2xl:col-span-8">
                <div class="card-body">
                    <div class="flex flex-col gap-4 mb-4 md:mb-3 md:items-center md:flex-row">
                        <h6 class="grow text-15">Đơn hàng</h6>
                        <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">
                            <li class="group active">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="personalTabs"
                                    class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Theo
                                    tháng</a>
                            </li>
                            <li class="group">
                                <a href="javascript:void(0);" data-tab-toggle="" data-target="integrationTabs"
                                    class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Theo
                                    năm</a>
                            </li>
                        </ul>

                    </div>

                    <div class="block tab-pane" id="personalTabs" style="min-height: 305px;">
                        <div class="card-body">
                            <h6 class="mb-1 text-15">Chọn tháng</h6>
                            <input type="month" id="monthPicker" onchange="updateChart()"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Select Month">

                        </div>
                        <canvas id="chartOrder" style="min-height: 305px;" class="apex-charts">

                        </canvas>
                    </div>
                    <div class="hidden tab-pane" id="integrationTabs" style="min-height: 305px;">
                        <div class="card-body">
                            <h6 class="mb-1 text-15">Chọn năm</h6>
                            <select id="yearPicker" onchange="updateChartYear()"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                <option value="" disabled selected>Năm</option>
                                <script>
                                    for (let year = 2000; year <= 2029; year++) {
                                            document.write(`<option value="${year}">${year}</option>`);
                                        }
                                </script>
                            </select>
                        </div>
                        <canvas id="chartOrderYear" style="min-height: 305px;" class="apex-charts">

                        </canvas>
                    </div>
                </div>
            </div>
            <!--end col-->
            {{-- <div class="col-span-12 2xl:col-span-4">
                <div class="grid grid-cols-12 gap-x-5">
                    <div class="col-span-12 card lg:col-span-6 2xl:col-span-12">
                        <div class="card-body">
                            <div class="flex items-center mb-3">
                                <h6 class="grow text-15">Traffic Resources</h6>
                                <div class="relative">
                                    <a href="#!"
                                        class="transition-all duration-300 ease-linear text-custom-500 hover:text-custom-700">View
                                        Status <i data-lucide="move-right"
                                            class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1"></i></a>
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-12 md:col-span-6 2xl:col-span-7">
                                    <div id="trafficResourcesChart" class="apex-charts"
                                        data-chart-colors='["bg-sky-500", "bg-purple-500", "bg-green-500", "bg-yellow-500"]'
                                        dir="ltr"></div>
                                </div>
                                <div class="col-span-12 md:col-span-6 2xl:col-span-5">
                                    <ul class="flex flex-col gap-3">
                                        <li class="flex items-center gap-2">
                                            <div class="bg-green-500 size-3 shrink-0 clip-triangle"></div>
                                            <p class="text-green-500">Search Engine (22%)</p>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <div class="bg-purple-500 size-3 shrink-0 clip-triangle"></div>
                                            <p class="text-purple-500">Referral (34%)</p>
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <div class="size-3 bg-sky-500 shrink-0 clip-triangle"></div>
                                            <p class="text-sky-500">Direct (44%)</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-span-12 card lg:col-span-6 2xl:col-span-12">
                        <div class="card-body">
                            <div class="flex items-center mb-2">
                                <h5 class="grow"><span class="counter-value" data-target="1596">0</span></h5>
                                <span
                                    class="px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-white border-red-100 text-red-500 dark:bg-zink-700 dark:border-red-900"><i
                                        data-lucide="trending-down" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                    6.8%</span>
                            </div>
                            <h6 class="mb-0">Monthly Orders Goal (20000+)</h6>
                            <div>
                                <div class="flex items-center justify-between mt-5 mb-2">
                                    <p class="text-slate-500 dark:text-zink-200">Total Orders</p>
                                    <h6 class="mb-0 text-custom-500">85%</h6>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2.54 dark:bg-zink-600">
                                    <div class="bg-custom-500 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end grid-->
            </div>
            <!--end col--> --}}

            <div class="col-span-12 card 2xl:col-span-4 2xl:row-span-2">
                <div class="card-body">
                    <div class="flex items-center mb-3">
                        <h6 class="grow text-15">Khách hàng mua nhiều nhất</h6>
                        <div class="relative dropdown shrink-0">
                            <input type="text" id="loyal-customer-date" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-provider="flatpickr" data-date-format="d M, Y" readonly="readonly" placeholder="Select Date">
                        </div>
                    </div>

                    <ul class="divide-y divide-slate-200 dark:divide-zink-500">
                        @forelse($orderUser as $key => $list)
                        <li class="flex items-center gap-3 py-2 first:pt-0 last:pb-0">
                            <div class="w-8 h-8 rounded-full shrink-0 bg-slate-100 dark:bg-zink-600">
                                <img src="{{ Storage::url($list->avatar) }}" alt="" class="w-8 h-8 rounded-full">
                            </div>
                            <div class="grow">
                                <h6 class="font-medium">{{ $list->name }}</h6>
                                <p class="text-slate-500 dark:text-zink-200">{{ $list->email }}</p>
                            </div>
                            <div class="shrink-0">
                                <h6>{{ number_format($list->total_spent) }}VND</h6>
                            </div>
                        </li>
                        @empty
                        <h2>
                            Chưa có khách hàng nào mua thành công
                        </h2>
                        @endforelse

                    </ul>
                </div>
            </div>
            <!--end col-->

            <div class="col-span-12 card lg:col-span-6 2xl:col-span-12">
                <div class="card-body">
                </div>
            </div>
            <div class="col-span-12 card 2xl:col-span-4 2xl:row-span-2">
                <div class="card-body">
                    <div class="flex items-center mb-3">
                        <h6 class="grow text-15">Giá theo danh mục</h6>
                        <div class="relative dropdown shrink-0">



                        </div>
                    </div>
                    <ul class="flex flex-col gap-5">
                        @forelse($category as $key => $list)
                        <li class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-slate-100 dark:bg-zink-600">
                                <img src="{{ Storage::url($list->img) }}" alt="" class="h-6">
                            </div>
                            <div class="grow">
                                <h6 class="font-medium">{{ $list->name }}</h6>
                                <p class="text-slate-500 dark:text-zink-200">max price: {{
                                    number_format($list->maxPrice) ?? '0' }}VND</p>
                                <p class="text-slate-500 dark:text-zink-200">min price: {{
                                    number_format($list->minPrice) ?? '0'}}VND</p>
                            </div>
                            <h6 class="shrink-0">{{ number_format($list->sumPrice) ?? '0'}}VND</h6>
                        </li>
                        @empty
                        <h2>
                            Hiện Tại Chưa Khách nào
                        </h2>
                        @endforelse

                    </ul>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 card 2xl:col-span-4 2xl:row-span-2">
                <div class="card-body">
                    <div class="flex items-center mb-3">
                        <h6 class="grow text-15">Sản phẩm bán chạy</h6>
                        <div class="relative dropdown shrink-0">
                            <input type="text" id="best-seller-date" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-provider="flatpickr" data-date-format="d M, Y" readonly="readonly" placeholder="Select Date">
                        </div>
                    </div>
                    <ul class="flex flex-col gap-5">
                        @forelse($orderProduct as $key => $list)
                            <li class="flex items-center gap-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 rounded-md bg-slate-100 dark:bg-zink-600">
                                <img src="{{ Storage::url($list->image) }}" alt="" class="h-6">
                            </div>
                            <div class="grow">
                                <h6 class="font-medium">{{ $list->name }}</h6>
                                <p class="text-slate-500 dark:text-zink-200">Color :{{ $list->color }}</p>
                                <p class="text-slate-500 dark:text-zink-200">Size : {{ $list->size }}</p>
                            </div>
                            <h6 class="shrink-0"><i data-lucide="shopping-cart"
                                    class="inline-block align-middle size-4 text-slate-500 dark:text-zink-200 ltr:mr-1 rtl:ml-1"></i>{{
                                $list->quantity }}</h6>
                        </li>
                        @empty
                        <h2>
                            Chưa sản phẩm nào được bán thành công
                        </h2>
                        @endforelse

                    </ul>
                </div>
            </div>
            <!--end col-->
            {{-- <div class="col-span-12 card lg:col-span-6 2xl:col-span-3">
                <div class="card-body">
                    <h6 class="relative mb-3 grow text-15">Audience</h6>
                    <div id="audienceChart" class="-mt-9 apex-charts"
                        data-chart-colors='["bg-sky-500", "bg-orange-400", "bg-green-500", "bg-yellow-500"]' dir="ltr">
                    </div>
                </div>
            </div>
            <!--end col--> --}}
        </div>
        <!--end grid-->
    </div>
    <!-- container-fluid -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        var ctx = document.getElementById('chartOrder').getContext('2d');
            var orderChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($orderChart['labels']) !!},
                    datasets: {!! json_encode($orderChart['datasets']) !!}
                },
            });
    </script>

    <script>
        function updateChart() {
                var selectedMonth = document.getElementById('monthPicker').value;
                var url = `../admin/statistic/chart?month=${selectedMonth || ''}`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        orderChart.data.labels = data.labels;
                        orderChart.data.datasets = data.datasets;
                        orderChart.update();
                    })
                    .catch(error => console.error('Error:', error));
            }
    </script>

    <script>
        var ctxYear = document.getElementById('chartOrderYear').getContext('2d');
            var orderChartYear = new Chart(ctxYear, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($orderChartYear['labels']) !!},
                    datasets: {!! json_encode($orderChartYear['datasets']) !!}
                },
            });
    </script>

    <script>
        function updateChartYear(){
                var selectedYear = document.getElementById('yearPicker').value;
                var url = `../admin/statistic/chartYear?year=${selectedYear || ''}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        orderChartYear.data.labels = data.labels;
                        orderChartYear.data.datasets = data.datasets;
                        orderChartYear.update();
                    })
                    .catch(error => console.error('Error:', error));

            }

    </script>

    <script>
        var ctx = document.getElementById('categoryChart').getContext('2d');
            var $categoryChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($categoryChart['labels']) !!},
                    datasets: {!! json_encode($categoryChart['datasets']) !!}
                },
            });
    </script>

    <script>
        document.getElementById('loyal-customer-date').addEventListener('change', function () {
            const selectedDate = this.value;
            if (selectedDate) {
                const [day, month, year] = selectedDate.split(' ');
                const monthNumber = new Date(Date.parse(month + " 1, 2024")).getMonth() + 1;
                const queryString = `?month=${monthNumber}&year=${year}`;
                window.location.href = window.location.pathname + queryString;
            }
        });
    </script>

    <script>
        document.getElementById('best-seller-date').addEventListener('change', function () {
            const selectedDate = this.value;
            if (selectedDate) {
                const [day, month, year] = selectedDate.split(' ');
                const monthNumber = new Date(Date.parse(month + " 1, 2024")).getMonth() + 1;
                const queryString = `?month=${monthNumber}&year=${year}`;
                window.location.href = window.location.pathname + queryString;
            }
        });
    </script>
@endsection
