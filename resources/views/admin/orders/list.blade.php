@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
        <div id="cartSidePenal" drawer-end="" class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow dark:bg-zink-600 ltr:right-0 rtl:left-0 md:w-96 z-drawer show">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <div class="grow">
                    <h5 class="mb-0 text-16">Shopping Cart <span class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-custom-500 border-custom-500">3</span></h5>
                </div>
                <div class="shrink-0">
                    <button data-drawer-close="cartSidePenal" class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800"><i data-lucide="x" class="size-4"></i></button>
                </div>
            </div>
            <div class="px-4 py-3 text-sm text-green-500 border border-transparent bg-green-50 dark:bg-green-400/20">
                <span class="font-bold underline">starcode50</span> Coupon code applied successfully.
            </div>
            <div>
                <div class="h-[calc(100vh_-_370px)] p-4 overflow-y-auto product-list">
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-2 product">
                            <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                <img src="assets/images/img-012.png" alt="" class="h-8">
                            </div>
                            <div class="overflow-hidden grow">
                                <div class="ltr:float-right rtl:float-left">
                                    <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                </div>
                                <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                    <h6 class="mb-1 text-15">Cotton collar t-shirts for men</h6>
                                </a>
                                <div class="flex items-center mb-3">
                                    <h5 class="text-base product-price"> $<span>155.32</span></h5>
                                    <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-500 dark:text-zink-200">(Fashion)</div>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="inline-flex text-center input-step">
                                        <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                        <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="2" min="0" max="100" readonly="">
                                        <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                    </div>
                                    <h6 class="product-line-price">310.64</h6>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 product">
                            <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                <img src="assets/images/img-03.png" alt="" class="h-8">
                            </div>
                            <div class="overflow-hidden grow">
                                <div class="ltr:float-right rtl:float-left">
                                    <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                </div>
                                <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                    <h6 class="mb-1 text-15">Like style travel black handbag</h6>
                                </a>
                                <div class="flex items-center mb-3">
                                    <h5 class="text-base product-price"> $<span>349.95</span></h5>
                                    <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-400 dark:text-zink-200">(Luggage)</div>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="inline-flex text-center input-step">
                                        <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                        <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="1" min="0" max="100" readonly="">
                                        <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                    </div>
                                    <h6 class="product-line-price">349.95</h6>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 product">
                            <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                                <img src="assets/images/img-09.png" alt="" class="h-8">
                            </div>
                            <div class="overflow-hidden grow">
                                <div class="ltr:float-right rtl:float-left">
                                    <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                                </div>
                                <a href="#!" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                    <h6 class="mb-1 text-15">Blive Printed Men Round Neck</h6>
                                </a>
                                <div class="flex items-center mb-3">
                                    <h5 class="text-base product-price">$<span>546.74</span></h5>
                                    <div class="font-normal rtl:mr-1 ltr:ml-1 text-slate-400 dark:text-zink-200">(Fashion)</div>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <div class="inline-flex text-center input-step">
                                        <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                        <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="4" min="0" max="100" readonly="">
                                        <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                    </div>
                                    <h6 class="product-line-price end">2,186.96</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-t border-slate-200 dark:border-zink-500">
        
                    <table class="w-full mb-3 ">
                        <tbody class="table-total">
                            <tr>
                                <td class="py-2">Sub Total :</td>
                                <td class="text-right cart-subtotal">$2,847.55</td>
                            </tr>
                            <tr>
                                <td class="py-2">Discount <span class="text-muted">(starcode50)</span>:</td>
                                <td class="text-right cart-discount">-$476.00</td>
                            </tr>
                            <tr>
                                <td class="py-2">Shipping Charge :</td>
                                <td class="text-right cart-shipping">$89.00</td>
                            </tr>
                            <tr>
                                <td class="py-2">Estimated Tax (12.5%) : </td>
                                <td class="text-right cart-tax">$70.62</td>
                            </tr>
                            <tr class="font-semibold">
                                <td class="py-2">Total : </td>
                                <td class="text-right cart-total">$2,531.17</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex items-center justify-between gap-3">
                        <a href="apps-ecommerce-product-grid.html" class="w-full text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:border-slate-600 active:ring active:ring-slate-100 dark:ring-slate-400/10">Continue Shopping</a>
                        <a href="apps-ecommerce-checkout.html" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
    
            <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                    
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">Order Overview</h5>
                        </div>
                        <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                            <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                            </li>
                            <li class="text-slate-700 dark:text-zink-100">
                                Order Overview
                            </li>
                        </ul>
                    </div>
                    <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
                        <div class="2xl:col-span-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center justify-center bg-purple-100 rounded-md size-12 dark:bg-purple-500/20 ltr:float-right rtl:float-left">
                                        <i data-lucide="truck" class="text-purple-500 fill-purple-200 dark:fill-purple-500/30"></i>
                                    </div>
                                    <h6 class="mb-4 text-15">Shipping Details</h6>
    
                                    <h6 class="mb-1">Pauline Hylton</h6>
                                    <p class="mb-1 text-slate-500 dark:text-zink-200">1235 Crossing Meadows Dr, Onalaska</p>
                                    <p class="text-slate-500 dark:text-zink-200">West Virginia, USA</p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="2xl:col-span-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center justify-center bg-orange-100 rounded-md size-12 dark:bg-orange-500/20 ltr:float-right rtl:float-left">
                                        <i data-lucide="credit-card" class="text-orange-500 fill-orange-200 dark:fill-orange-500/30"></i>
                                    </div>
                                    <h6 class="mb-4 text-15">Billing Details</h6>
    
                                    <h6 class="mb-1">Pauline Hylton</h6>
                                    <p class="mb-1 text-slate-500 dark:text-zink-200">1235 Crossing Meadows Dr, Onalaska</p>
                                    <p class="text-slate-500 dark:text-zink-200">West Virginia, USA</p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="2xl:col-span-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center justify-center rounded-md size-12 ltr:float-right rtl:float-left bg-sky-100 dark:bg-sky-500/20">
                                        <i data-lucide="circle-dollar-sign" class="text-sky-500 fill-sky-200 dark:fill-sky-500/30"></i>
                                    </div>
                                    <h6 class="mb-4 text-15">Payment Details</h6>
    
                                    <h6 class="mb-1">ID: #TSD456DF41SD5</h6>
                                    <p class="mb-1 text-slate-500 dark:text-zink-200">Payment Method: <b>Credit Card</b></p>
                                    <p class="mb-1 text-slate-500 dark:text-zink-200">Card Number: <b>xxxx xxxx xxxx 1501</b></p>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="2xl:col-span-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="bg-yellow-100 rounded-md size-12 ltr:float-right rtl:float-left dark:bg-yellow-500/20">
                                        <img src="assets/images/avatar-4.png" alt="" class="h-12 rounded-md">
                                    </div>
                                    <h6 class="mb-4 text-15">Customer Info</h6>
    
                                    <h6 class="mb-1">Pauline Hylton</h6>
                                    <p class="mb-1 text-slate-500 dark:text-zink-200">pauline@starcode.com</p>
                                    <p class="text-slate-500 dark:text-zink-200">+(78) 120 4843 4714</p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid-->
    
                    <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
                        <div class="2xl:col-span-9">
                            <div class="grid grid-cols-1 2xl:grid-cols-5 gap-x-5">
                                <div>
                                    <div class="card">
                                        <div class="text-center card-body">
                                            <h6 class="mb-1 underline">#TWT5015100366</h6>
                                            <p class="uppercase text-slate-500 dark:text-zink-200">Order ID</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div>
                                    <div class="card">
                                        <div class="text-center card-body">
                                            <h6 class="mb-1">02 Nov, 2023</h6>
                                            <p class="uppercase text-slate-500 dark:text-zink-200">Order Date</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div>
                                    <div class="card">
                                        <div class="text-center card-body">
                                            <h6 class="mb-1">09 Nov, 2023</h6>
                                            <p class="uppercase text-slate-500 dark:text-zink-200">Delivery Date</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div>
                                    <div class="card">
                                        <div class="text-center card-body">
                                            <h6 class="mb-1">$843.49</h6>
                                            <p class="uppercase text-slate-500 dark:text-zink-200">Order Amount</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div>
                                    <div class="card">
                                        <div class="text-center card-body">
                                            <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-purple-100 border-purple-200 text-purple-500 dark:bg-purple-500/20 dark:border-purple-500/20">Shipping</span>
                                            <p class="uppercase text-slate-500 dark:text-zink-200">Order Status</p>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                
                            </div><!--end grid-->
                            {{--  List-----------------------------------------------------------------------  --}}
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h6 class="text-15 grow">Order Summary</h6>
                                        <!-- Nếu đơn hàng đã bị hủy, hiển thị thông báo -->
                                        <a href="#!" class="text-red-500 underline shrink-0">Cancelled Order</a>
                                    </div>
                                    <div class="overflow-x-auto">  
                                        <div class="orders-list">
                                            <!-- Lặp qua từng đơn hàng -->
                                            @foreach($orders as $order)
                                                <div class="order-summary mb-8">
                                                    <!-- Khi người dùng nhấp vào tiêu đề này, chi tiết đơn hàng sẽ hiển thị -->
                                                    <h4 class="text-lg font-bold mb-2 cursor-pointer" onclick="toggleOrderDetails('order-details-{{ $order->id }}')">
                                                        Order #{{ $order->id }} - Date: {{ $order->created_at->format('d/m/Y') }}
                                                    </h4>
                                                    <p class="text-slate-500 dark:text-zink-200">Total Amount: ${{ number_format($order->total_amount, 2) }}</p>
                                        
                                                    <!-- Đây là phần chi tiết đơn hàng sẽ được ẩn hoặc hiện khi nhấp vào -->
                                                    <div id="order-details-{{ $order->id }}" class="order-details hidden mt-4">
                                                        <table class="w-full mt-4 border border-slate-200">
                                                            <tbody>
                                                                <!-- Lặp qua từng sản phẩm trong đơn hàng -->
                                                                @foreach($order->Order_Items as $item)
                                                                <tr>
                                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                                        <div class="flex items-center gap-3">
                                                                            <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                                <!-- Hiển thị ảnh sản phẩm -->
                                                                                <img src="{{ Storage::url($item->product_variants->product->image) }}" alt="" class="h-8">
                                                                            </div>
                                                                            <div class="grow">
                                                                                <h6 class="mb-1 text-15">
                                                                                    <!-- Tên sản phẩm -->
                                                                                    <a href="" class="transition-all duration-300 ease-linear hover:text-custom-500">
                                                                                        {{ $item->product_variants->product->name }}
                                                                                    </a>
                                                                                </h6>
                                                                                <!-- Giá và số lượng -->
                                                                                <p class="text-slate-500 dark:text-zink-200">
                                                                                    ${{ number_format($item->product_variants->price, 2) }} x {{ $item->quantity }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <!-- Tổng giá cho sản phẩm -->
                                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">
                                                                        ${{ number_format($item->product_variants->price * $item->quantity, 2) }}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                         
                                        
                                    </div>
                                </div>
                            </div><!--end card-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h6 class="text-15 grow">Order Status</h6>
                                        <div class="shrink-0">
                                            <a href="#!" class="inline-block text-red-500 underline ltr:mr-2 rtl:ml-2">Cancelled Order</a>
                                            <a href="apps-invoice-overview.html" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="download" class="inline-block align-middle size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Invoice</span></a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Order Placed</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">Your order has been successfully submitted.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">02 Nov, 2023</p>
                                            </div>
                                        </div>
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Order Processing</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">Once the order is received, it goes through the processing stage. During this time, the items are gathered, and the order is prepared for shipment.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">02 Nov, 2023</p>
                                            </div>
                                        </div>
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Shipped Order</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">The order is shipped out to the customer's designated delivery address.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">04 Nov, 2023</p>
                                            </div>
                                        </div>
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Out for Delivery</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">This status indicates that the order is currently out for delivery by the shipping or courier company.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">06 Nov, 2023</p>
                                            </div>
                                        </div>
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Delivered</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">Finally, when the order successfully reaches the customer's address and is handed over, the status changes to "Delivered."</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">09 Nov, 2023</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="2xl:col-span-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-3 text-gray-800 text-15 dark:text-white">Documents</h6>
                                    <div class="overflow-x-auto">
                                        <table class="w-full">
                                            <tbody>
                                                <tr>
                                                    <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Invoice No.</td>
                                                    <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent"><a href="apps-invoice-overview.html" class="text-custom-500">#TWI154203</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Shipping No</td>
                                                    <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent"><a href="#!" class="text-custom-500">#TWS987102301</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="flex items-center gap-3 mb-4">
                                        <h6 class="text-15 grow">Logistics Details</h6>
                                        <a href="#!" class="underline text-custom-500 shrink-0">Track Order</a>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="shrink-0">
                                            <img src="assets/images/delivery-1.png" alt="" class="h-10">
                                        </div>
                                        <div class="grow">
                                            <h6 class="mb-1 text-15">Express Delivery</h6>
                                            <p class="text-slate-500 dark:text-zink-200">ID: EDTW1400457854</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid-->
    
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
    
            <footer class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
                <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
                    <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                        <div>
                            <script>document.write(new Date().getFullYear())</script> StarCode Kh
                        </div>
                        <div class="hidden lg:block">
                            <div class="ltr:text-right rtl:text-left">
                                Design & Develop by StarCode Kh
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
 
@endsection
<script>
            // Hàm để ẩn/hiện chi tiết đơn hàng khi nhấp chuột
            function toggleOrderDetails(orderId) {
                var details = document.getElementById(orderId);
                if (details.classList.contains('hidden')) {
                    details.classList.remove('hidden');
                } else {
                    details.classList.add('hidden');
                }
            }
        </script>
        
        <style>
            .hidden {
                display: none;
            }
        </style>