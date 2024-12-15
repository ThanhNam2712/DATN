@extends('client.layouts.master')
@section('title', 'Cart')
@section('body')

    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="card" id="ordersTable">
                <div class="card-body">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                        <div class="lg:col-span-3">
                            <form action="../client/order/view" method="GET" class="relative">
                                <input type="text" name="search" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                                <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                            </form>
                        </div><!--end col-->
                        <div class="lg:col-span-2 lg:col-start-11">
                            <div class="ltr:lg:text-right rtl:lg:text-left">
                                <a href="../client/home" data-modal-target="addOrderModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i data-lucide="arrow-left" class="inline-block size-4"></i> <span class="align-middle">Quay Lại</span></a>
                            </div>
                        </div>
                    </div><!--col grid-->

                    <ul class="flex flex-wrap w-full mt-5 text-sm font-medium text-center text-gray-500 nav-tabs">
                        <li class="group active">
                            <a href="javascript:void(0);" data-tab-toggle="" data-target="allOrders" class="inline-block px-4 py-1.5 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i data-lucide="boxes" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Hiển Thị Tất</span></a>
                        </li>
                        <li class="group">
                            <div id="reader" style="width: 500px; margin-top: 20px;display: none; text-align: center"></div>
                            <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">

                                <button type="button" id="start-scan-btn" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="scan" class="inline-block size-4"></i>
                                    Start Scan
                                    </span>
                                </button>
                                <button style="display: none" type="button" id="stop-scan-btn" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span>
                                    <i data-lucide="scan" class="inline-block size-4"></i>
                                    Stop Scan
                                    </span>
                                </button>
                            </div>
                        </li>

                    </ul>

                    <div class="mt-5 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">

                                </th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_id">Mã Đơn Hàng</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_date">Trạng Thái</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="payment_method">Phương Thức Thanh Toán</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="amount">Tổng Tiền</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_status">Mã Giảm Giá</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">Hành Động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">

                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"><a href="{{route('client.order.detail',$order)}}" class="transition-all duration-150 ease-linear order_id text-custom-500 hover:text-custom-600">{{ $order->barcode }}</a></td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 delivery_date">{{ $order->status }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 payment_method">{{ $order->payment->payment_method }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 amount">{{ number_format($order->total_amount) }}VND</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">{{ $order->coupon ?? 'Không App Mã'}}</span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <div class="relative dropdown">
                                            <button id="orderAction1" data-bs-toggle="dropdown" class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                            <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="orderAction1">
                                                <li>
                                                    <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="{{route('client.order.detail',$order)}}"><i data-lucide="eye" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle" >Chi Tiết</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="..." style="margin-top: 10px; float: inline-end">
                            <ul class="pagination pagination-sm">
                                {{ $orders->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><!--end card-->
        </div>
        <!-- container-fluid -->
    </div>
    <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>
    <script>
        const html5QrCode = new Html5Qrcode("reader");
        const startCode = document.getElementById('start-scan-btn');
        const stopCode = document.getElementById('stop-scan-btn');
        startCode.addEventListener('click', () => {
            const readerDiv = document.getElementById('reader');
            const stopCode = document.getElementById('stop-scan-btn');
            readerDiv.style.display = "block";
            stopCode.style.display = "block";
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                fetch(`/client/order/get-id-by-barcode?barcode=${encodeURIComponent(decodedText)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success){
                            window.location.href = `/client/order/detail/${data.id}`;
                        }else {
                            alert("Thằng ranh lấy mã tài xỉu à");
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            };
            html5QrCode.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: 250 },
                qrCodeSuccessCallback
            ).catch(err => console.error("Không thể khởi động camera: ", err));
        });

        stopCode.addEventListener('click', () => {
            const readerDiv = document.getElementById('reader');
            readerDiv.style.display = "none";
            stopCode.style.display = "none";
            html5QrCode.stop(

            ).catch(err => console.error("Lỗi: ", err));
        });
    </script>
@endsection
