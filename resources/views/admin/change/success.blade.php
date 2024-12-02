
@extends('admin.layouts.master')

@section('title')
    Danh mục sản phẩm
@endsection
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
            <div class="container-fluid mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">List Email Change</h5>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap" id="customerTable">
                        <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" scope="col" style="width: 50px;">
                                <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" id="checkAll" value="option">
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">STT</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Email Change</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Status</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                        </tr>
                        </thead>
                        <tbody class="list form-check-all">
                        @forelse($change as $key => $list)
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $key + 1 }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{ $list->users->email }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $list->status }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <div class="edit">
                                            <a href="../admin/email/view/{{ $list->id }}" data-modal-target="showModal" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Chi Tiết</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                <h4>
                                    Hiện tại chưa có email nào cần đổi
                                </h4>
                            </td>

                        @endforelse
                        </tbody>
                    </table>
                                            <nav aria-label="..." style="margin-top: 10px">
                                                <ul class="pagination pagination-sm">
                                                    {{ $change->links() }}
                                                </ul>
                                            </nav>
                </div>

            </div>
        </div>
    </div>
@endsection
