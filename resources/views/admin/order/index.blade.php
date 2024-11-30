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
                        <form action="#!">
                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                <div class="relative xl:col-span-2">
                                    <input type="text"
                                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="Search for name, email, phone number etc..." autocomplete="off">
                                    <i data-lucide="search"
                                        class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                </div>

                            </div>
                        </form>
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
                                            data-sort="name">Tên khách hàng</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="location">Địa chỉ</th>
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
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->user->name }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            {{ $order->province ?? 'tỉnh chưa có' }} - {{ $order->district ?? 'huyện
                                            chưa có'}} - {{ $order->ward ?? 'xã chưa có' }} - {{ $order->address_detail
                                            ?? 'dchi ctiet chưa có' }}<br>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->user->email }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->phone_number ?? 'sđt
                                            đặt hàng chưa có' }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">{{ $order->created_at ?? 'N/A' }}
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" style="color: red" class="form-select">
                                                    <option value="pending" {{ $order->status == 'pending' ? 'selected'
                                                        : '' }}>Chờ xử lý</option>
                                                    <option value="processing" {{ $order->status == 'processing' ?
                                                        'selected' : '' }}>Đang xử lý</option>
                                                    <option value="completed" {{ $order->status == 'completed' ?
                                                        'selected' : '' }}>Hoàn thành</option>
                                                    <option value="cancelled" {{ $order->status == 'cancelled' ?
                                                        'selected' : '' }}>Đã hủy</option>
                                                </select>
                                                <button style="color: green" type="submit"
                                                    class="btn btn-primary mt-2">Cập nhật</button>
                                            </form>
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
                                                            href="{{-- {{ route('admin.orders.show', $order->id) }} --}}">
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
                         
                        </div>
                        <div class="flex flex-col items-center mt-8 md:flex-row">
                            <div class="mb-4 grow md:mb-0">
                                <p class="text-slate-500 dark:text-zink-200">Showing <b>10</b> of <b>57</b> Results</p>
                            </div>
                            <ul class="flex flex-wrap items-center gap-2">
                                <li>
                                    <a href="#!"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border border-slate-200 dark:border-zink-500 rounded text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-50 dark:[&.active]:text-custom-50 [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                            class="size-4 rtl:rotate-180" data-lucide="chevrons-left"></i></a>
                                </li>
                                <li>
                                    <a href="#!"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border border-slate-200 dark:border-zink-500 rounded text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-50 dark:[&.active]:text-custom-50 [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                            class="size-4 rtl:rotate-180" data-lucide="chevron-left"></i></a>
                                </li>
                                <li>
                                    <a href="#!"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border border-slate-200 dark:border-zink-500 rounded text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-50 dark:[&.active]:text-custom-50 [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">1</a>
                                </li>

                                <li>
                                    <a href="#!"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border border-slate-200 dark:border-zink-500 rounded text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-50 dark:[&.active]:text-custom-50 [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                            class="size-4 rtl:rotate-180" data-lucide="chevron-right"></i></a>
                                </li>
                                <li>
                                    <a href="#!"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 size-8 transition-all duration-150 ease-linear border border-slate-200 dark:border-zink-500 rounded text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-50 dark:[&.active]:text-custom-50 [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto"><i
                                            class="size-4 rtl:rotate-180" data-lucide="chevrons-right"></i></a>
                                </li>
                            </ul>
                        </div>
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
@endsection
