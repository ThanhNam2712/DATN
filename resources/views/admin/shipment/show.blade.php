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
                    @if(Session::has('message'))
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            swal("Message", "{{ Session::get("message") }}", "success", {
                                button:true,
                                button:"OK",
                            })
                        </script>
                    @endif
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
                    <div class="2xl:col-span-9">
                        <div class="grid grid-cols-1 2xl:grid-cols-5 gap-x-5">

                        </div><!--end grid-->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Tổng Đơn Hàng Cần Giao</h6>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                        @foreach($shipment->order->orderDetail as $key => $list)
                                            <tr>
                                                <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                            <img src="{{ Storage::url($list->products->image) }}" alt="" class="h-8">
                                                        </div>
                                                        <div class="grow">
                                                            <h6 class="mb-1 text-15"><a href="apps-ecommerce-product-overview.html" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->products->name }}</a></h6>
                                                            <p class="text-slate-500 dark:text-zink-200">${{ $list->price }} x 0{{ $list->quantity }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">{{ number_format($list->price * $list->quantity * 25422) }} VND</td>
                                            </tr>
                                        @endforeach
                                        <tr class="font-semibold">
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Total Amount (USD)
                                            </td>
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">@if($shipment->order->payment->status == 1) Khác hàng đã thanh toán, Vui lòng không thu tiền khách! @else Vui Lòng Thu KHách : {{ number_format($shipment->order->total_amount * 25422) }} VND @endif</td>
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
                                    <div class="shrink-0" style="display: flex">
                                        @if ($shipment->order->status != 'completed' && $shipment->order->status != 'cancelled' && $shipment->order->status != 'Giao Thành công')
                                            <button type="button" data-modal-target="deleteModal" class="me-3 text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Giao Thất Bại</button>
                                            <form action="../admin/shipment/update/{{ $shipment->order->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                                    @if($shipment->order->shipmentOrder->shipments_1 == 'Chưa nhận đơn')
                                                       Đã Nhận Đơn
                                                    @elseif($shipment->order->shipmentOrder->shipments_1 == 'Đã Nhận Đơn' && $shipment->order->shipmentOrder->shipments_2 == 'Chưa xử lý')
                                                        Bắt Đầu Giao Hàng
                                                    @elseif($shipment->order->shipmentOrder->shipments_2 == 'Bắt Đầu Giao Hàng' && $shipment->order->shipmentOrder->shipments_3 == 'Chưa xử lý')
                                                        Đã Đến Điểm Giao
                                                    @elseif($shipment->order->shipmentOrder->shipments_3 == 'Đã Đến Điểm Giao' && $shipment->order->shipmentOrder->shipments_4 == 'Chưa xử lý')
                                                        Giao Thành Công
                                                    @endif


                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    @if($shipment->order->shipmentOrder->cancel != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Order Cancel</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->cancel}}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->order->shipmentOrder->shipments_5 != 'Chưa hoàn thành')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Hoàn Thành</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->shipments_5 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->order->shipmentOrder->shipments_4 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                        <div class="flex gap-4">
                                            <div class="grow">
                                                <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Hoàn Thành</h6>
                                                <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->shipments_4 }}.</p>
                                            </div>
                                            <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($shipment->order->shipmentOrder->shipments_3 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                        <div class="flex gap-4">
                                            <div class="grow">
                                                <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Đã Đến nơi</h6>
                                                <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->shipments_3 }}.</p>
                                            </div>
                                            <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($shipment->order->shipmentOrder->shipments_2 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Bắt Đầu</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->shipments_2 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($shipment->order->shipmentOrder->shipments_1 != 'Chưa nhận đơn')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Đã Nhận Đơn</h6>
                                                    <p class="text-gray-400 dark:text-zink-200">{{ $shipment->order->shipmentOrder->shipments_1 }}</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $shipment->order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
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
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Mã Đơn Hàng : </td>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">
                                                <a  class="text-custom-500">{{ $shipment->order->barcode }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Liên Hệ Người Nhận : </td>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">
                                                <a  class="text-custom-500">{{ $shipment->order->phone_number }}</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">Địa Chỉ Giao Hàng : </td>
                                            <td class="px-3.5 first:pl-0 last:pr-0 py-2 border-y border-transparent">
                                                <a  class="text-custom-500">{{ $shipment->order->district ?? 'tỉnh chưa có' }} - {{ $shipment->order->ward ?? 'huyện--'}} - {{ $shipment->order->address_detail }}</a>
                                            </td>
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
        </div>
    </div>

    <div id="deleteModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_280px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                </div>
                <div class="mt-5 text-center">
                    <h5 class="mb-1">GIAO THẤT BẠI?</h5>
                    <p class="text-slate-500 dark:text-zink-200">Vui Lòng Nhập lý do giao thất bại?</p>
                    <form action="../admin/shipment/cancel/{{ $shipment->order->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <textarea name="cancel_8" class="mt-4 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Reason for Cancellation" rows="5" style="height: 80px;"></textarea>
                        <div class="flex justify-center gap-2 mt-6">
                            <button type="reset" data-modal-close="deleteModal" class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                            <button type="submit" class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Giao Thất Bại!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
