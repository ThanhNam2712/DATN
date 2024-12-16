@extends('admin.layouts.master')

@section('title')
@endsection
@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15"></h6>
            <button id="sa-close" type="button"
                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Click
                Me</button>
        </div>
    </div>
    <div

        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Danh sách đơn hàng</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Đơn hàng</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Danh sách đơn hàng</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
                <div class="xl:col-span-12">
                    <div class="card" id="usersTable">

                        <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                            {{--                            <form action="#!">--}}
                            {{--                                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">--}}
                            {{--                                    <div class="relative xl:col-span-2">--}}
                            {{--                                        <input type="text"--}}
                            {{--                                               class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"--}}
                            {{--                                               placeholder="Search for name, email, phone number etc..." autocomplete="off">--}}
                            {{--                                        <i data-lucide="search"--}}
                            {{--                                           class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>--}}
                            {{--                                    </div>--}}

                            {{--                                </div>--}}
                            {{--                            </form>--}}
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
                        </div>
                        <div class="card-body">
                            <div class="-mx-5 -mb-5 overflow-x-auto">
                                <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                                    <thead class="text-left">
                                    <tr
                                        class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">
                                            <div class="flex items-center h-full">
                                                <input id="CheckboxAll"
                                                       class="size-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative"
                                                       type="checkbox">
                                            </div>
                                        </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="order-id">Mã đơn hàng</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="email">Email</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="phone-number">Số điện thoại</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="phone-number">Thời gian đặt</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="status">Trạng thái đơn hàng</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($orders as $order)
                                        <tr class="relative rounded-md">
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                <div class="flex items-center h-full">
                                                    <input id="Checkbox{{ $order->id }}" class="size-4 bg-white border"
                                                           type="checkbox">
                                                </div>
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->id }}</td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->user->email }}</td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->phone_number ?? 'sđt
                                            đặt hàng chưa có' }}</td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->created_at ?? 'N/A' }}
                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                @if($order->status != 'completed' && $order->status != 'cancelled')
                                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" style="color: red" class="form-select">
                                                            <option value="pending" {{ $order->status == 'pending' ? 'selected'
                                                        : '' }}>Chờ xử lý</option>
                                                            <option value="processing" {{ $order->status == 'processing' ?
                                                        'selected' : '' }}>Đang xử lý</option>
                                                            <option value="delivery person" {{ $order->status == 'delivery person' ?
                                                        'selected' : '' }}>Giao bên vận chuyển</option>
                                                        </select>
                                                        <button style="color: green" type="submit"
                                                                class="btn btn-primary mt-2">Cập nhật</button>
                                                    </form>
                                                @else
                                                    <p style="color: red">{{ $order->status }}</p>
                                                @endif

                                            </td>
                                            <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                <div class="relative dropdown">
                                                    <button
                                                        class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100">
                                                        <i data-lucide="more-horizontal" class="size-3"></i>
                                                    </button>
                                                    <ul class="absolute z-50 hidden py-2 mt-1 list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem]"
                                                        aria-labelledby="usersAction{{ $order->id }}">
                                                        <li>
                                                            <a class="block px-4 py-1.5 text-base text-slate-600"
                                                               href="../admin/orders/detail/{{ $order->id }}">
                                                                <i data-lucide="eye" class="inline-block size-3"></i> Xem
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="py-6 text-center">
                                        <i data-lucide="search"
                                           class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+
                                            users We did not find any users for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="..." style="margin-top: 10px">
                                <ul class="pagination pagination-sm">
                                    {{ $orders->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end grid-->

        </div>
    </div>

    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>
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
                fetch(`/admin/orders/get-id-by-barcode?barcode=${encodeURIComponent(decodedText)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success){
                            window.location.href = `/admin/orders/detail/${data.id}`;
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
