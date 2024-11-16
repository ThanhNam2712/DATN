@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
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
                </div><!--end grid-->

                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5">
                    <div class="2xl:col-span-9">
                        <div class="grid grid-cols-1 2xl:grid-cols-5 gap-x-5">
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1 underline">#TWT50151003{{ $order->id }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Order ID</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ $order->updated_at }}</h6>
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
                                        <h6 class="mb-1">${{ $order->total_amount }}</h6>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Order Summary</h6>
                                    <a href="#!" class="text-red-500 underline shrink-0">Cancelled Order</a>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                        @foreach($order->orderDetail as $key => $list)
                                            <tr>
                                                <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                            <img src="{{ Storage::url($list->products->image) }}" alt="" class="h-8">
                                                        </div>
                                                        <div class="grow">
                                                            <h6 class="mb-1 text-15"><a href="apps-ecommerce-product-overview.html" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->products->name }}</a></h6>
                                                            <p class="text-slate-500 dark:text-zink-200">${{ $list->product_variants->price_sale }} x {{ $list->quantity }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">${{ number_format($list->product_variants->price_sale * $list->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Sub Total
                                            </td>
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $order->total_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Estimated Tax (18%)
                                            </td>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">$167.79</td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Item Discounts (12%)
                                            </td>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">-$111.86</td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Shipping Charge
                                            </td>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">$0</td>
                                        </tr>
                                        <tr class="font-semibold">
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Total Amount (USD)
                                            </td>
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $order->total_amount }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                <div class="2xl:col-span-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="bg-yellow-100 rounded-md size-12 ltr:float-right rtl:float-left dark:bg-yellow-500/20">
                                                    <img src="assets/images/avatar-4.png" alt="" class="h-12 rounded-md">
                                                </div>
                                                <h6 class="mb-4 text-15">Customer Info</h6>

                                                <h6 class="mb-1">{{ $order->user->name }}</h6>
                                                <p class="mb-1 text-slate-500 dark:text-zink-200">{{ $order->user->email }}</p>
                                                <p class="text-slate-500 dark:text-zink-200">+(78) 120 4843 4714</p>
                                            </div>
                                        </div>
                                    </div><!--end col-->
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

    </div>
@endsection
