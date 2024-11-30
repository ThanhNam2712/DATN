
@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
            <div class="container-fluid mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Listjs</h5>
                    </div>
                    <a href="{{route('brands.create')}}" data-modal-target="addCustomerModal" class="btn bg-custom-500 text-white">Add Customer</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap" id="customerTable">
                        <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" scope="col" style="width: 50px;">
                                <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" id="checkAll" value="option">
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">STT</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Mã Đơn Hàng</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Status</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Reason</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Người Yêu Cầu</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                        </tr>
                        </thead>
                        <tbody class="list form-check-all">
                        @foreach ($refunds as $key => $list)
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $key + 1 }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{ $list->order->barcode }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $list->status }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $list->reason }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $list->user->name }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <div class="remove">
                                            <a href="../admin/refund/{{ $list->id }}" id="delete-record" class="btn bg-custom-500 text-white"
                                                        >Chi Tiết Yêu Cầu</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="text-center p-7">
                            <h5 class="mb-2">Sorry! No Result Found</h5>
                            <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                        </div>
                    </div>
                </div>




                <!-- Modal Xóa Khách Hàng -->
            </div>
        </div>


    </div>
@endsection
