@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Chi Tiết Đơn Hàng</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a class="text-slate-400 dark:text-zink-200">Đơn hàng</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Chi Tiết
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
                                        <h6 class="mb-1 underline">{{ $order->barcode }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Mã Đơn hàng</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ $order->updated_at->format('d-m-Y') }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Ngày Đặt Hàng</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ $order->payment->payment_method }}</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Thanh Toán Bằng</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        <h6 class="mb-1">{{ number_format($order->total_amount) }}VND</h6>
                                        <p class="uppercase text-slate-500 dark:text-zink-200">Tổng Tiền</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div>
                                <div class="card">
                                    <div class="text-center card-body">
                                        @php
                                        $statusMap = [
                                            'pending' => 'Chờ xử lý',
                                            'processing' => 'Đang xử lý',
                                            'delivery person' => 'Giao bên vận chuyển',
                                            'completed' => 'Hoàn thành',
                                            'cancelled' => 'Đã hủy',
                                        ];
                                    @endphp
                                                              <h6 class="mb-1">{{ $statusMap[$order->status] ?? $order->status }}</h6>
                                                              <p style="color: red" class="uppercase text-slate-500 dark:text-zink-200">Trạng Thái Đơn</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end grid-->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Chi Tiết Đơn Hàng</h6>
                                    @if ($order->shipmentOrder->shipments_1 != 'Đã Nhận Đơn' && $order->status != 'delivery person')
                                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" style="color: red" class="form-select">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                                                <option value="delivery person" {{ $order->status == 'delivery person' ? 'selected' : '' }}>Giao bên vận chuyển</option>
                                            </select>
                                            <button style="color: green" type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                                        </form>
                                    @else
                                    @endif
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
                                                            <h6 class="mb-1 text-15"><a class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->products->name }}</a></h6>
                                                            <p class="text-slate-500 dark:text-zink-200">{{ number_format($list->product_variants->price_sale) }}VND x {{ $list->quantity }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">{{ number_format($list->product_variants->price_sale * $list->quantity) }}VND</td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Mã Giảm Giá
                                                </td>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">{{ $order->coupon ?? 'Đơn Hàng Này Bạn Không Sử Dụng Mã'}}</td>
                                            </tr>
                                            <tr>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                    Tổng Tiền Được Giảm
                                                </td>
                                                <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">-{{ number_format($order->total_discount) }} VND</td>
                                            </tr>
                                            <tr class="font-semibold">
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Tổng Tiền Thu Được
                                            </td>
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">{{ number_format($order->total_amount) }} VND</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--end card-->
                        <div class="card">
                            <div class="card-body">
                                <div class="flex items-center gap-3 mb-4">
                                    <h6 class="text-15 grow">Trạng Thái Đơn Hàng</h6>
                                    <div class="shrink-0" style="display: flex">
                                        <button onclick="window.print()" type="button" class="me-3 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="save" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Save & Print</span></button>
                                        @if (!in_array($order->status, ['completed', 'cancelled', 'Giao Thành công']) && $order->shipmentOrder->shipments_1 != 'Đã Nhận Đơn')
                                            <button type="button" data-modal-target="deleteModal" class="me-3 text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Hủy Đơn Hàng</button>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    @if($order->shipmentOrder->cancel != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Hủy Đơn Hàng</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->cancel}}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0" >{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->shipmentOrder->shipments_5 != 'Chưa hoàn thành')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Hoàn Thành</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->shipments_5 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->shipmentOrder->shipments_4 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Đã Điểm Giao</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->shipments_4 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->shipmentOrder->shipments_3 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Đến Điểm Giao</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->shipments_3 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->shipmentOrder->shipments_2 != 'Chưa xử lý')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Trạng Thái Giao</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->shipments_2 }}.</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($order->shipmentOrder->shipments_1 != 'Chưa nhận đơn')
                                        <div class="relative ltr:pl-6 rtl:pr-6 before:absolute ltr:before:border-l rtl:before:border-r ltr:before:left-[0.1875rem] rtl:before:right-[0.1875rem] before:border-slate-200 [&.done]:before:border-custom-500 before:top-1.5 before:-bottom-1.5 after:absolute after:size-2 after:bg-white after:border after:border-slate-200 after:rounded-full ltr:after:left-0 rtl:after:right-0 after:top-1.5 pb-4 last:before:hidden [&.done]:after:bg-custom-500 [&.done]:after:border-custom-500 done">
                                            <div class="flex gap-4">
                                                <div class="grow">
                                                    <h6 class="mb-2 text-gray-800 text-15 dark:text-zink-50">Trạng Thái Nhận</h6>
                                                    <p class="text-gray-400 dark:text-zink-200" style="color: red">{{ $order->shipmentOrder->shipments_1 }}</p>
                                                </div>
                                                <p class="text-sm text-gray-400 dark:text-zink-200 shrink-0">{{ $order->shipmentOrder->updated_at }}</p>
                                            </div>
                                        </div>
                                    @endif
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
                                            <img src="{{ Storage::url($order->user->avatar) }}" alt="" class="h-12 rounded-md">
                                        </div>
                                        <h6 class="mb-4 text-15">Thông Tin Người Dùng</h6>

                                        <h6 class="mb-1">{{ $order->user->name }}</h6>
                                        <p class="mb-1 text-slate-500 dark:text-zink-200">{{ $order->email }}</p>
                                        <p class="text-slate-500 dark:text-zink-200">+{{ $order->phone_number }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="card">
                            <div class="2xl:col-span-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Thông Tin Thanh Toán</h6>
                                        <h6 class="mb-1">Phương Thức: {{ $order->payment->payment_method }}</h6>
                                        <p class="mb-1 text-slate-500 dark:text-zink-200">Tổng Tiền : {{ number_format($order->payment->amount) }}VND</p>
                                        <p class="text-slate-500 dark:text-zink-200">Trạng Thái : {{ $order->payment->status == '1' ? 'Đã Thanh Toán' : 'Thanh Toán Sau'}}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="card">
                            <div class="2xl:col-span-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Thông Tin Vận Chuyển</h6>

                                        <h6 class="mb-1">Thành Phố: {{ $order->province }}</h6>
                                        <p class="mb-1 text-slate-500 dark:text-zink-200">Quận Huyện : {{ $order->district }}</p>
                                        <p class="text-slate-500 dark:text-zink-200">Ngõ : {{ $order->ward }}</p>
                                        <p class="text-slate-500 dark:text-zink-200">Số Nhà : {{ $order->address_detail }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="card">
                            <div class="2xl:col-span-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Thông Tin Cần Thêm Nếu Muốn</h6>
                                        <h6 class="mb-1"><a href="../admin/orders/download-load/{{ $order->barcode }}">{{ QrCode::size(200)->generate($order->barcode) }}</a></h6>
                                        <p class="text-slate-500 dark:text-zink-200">Tải Xuống Nếu Cần</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <div id="deleteModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_280px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal" class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
                </div>
                <div class="mt-5 text-center">
                    <h5 class="mb-1">HỦY ĐƠN HÀNG</h5>
                    <p class="text-slate-500 dark:text-zink-200">Vui Lòng nhập lý do hủy đơn hàng?</p>
                    <form action="../admin/orders/cancel/{{ $order->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <textarea name="cancel_8" class="mt-4 form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Reason for Cancellation" rows="5" style="height: 80px;"></textarea>
                        <div class="flex justify-center gap-2 mt-6">
                            <button type="reset" data-modal-close="deleteModal" class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Thoát</button>
                            <button type="submit" class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
