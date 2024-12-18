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
                    <h5 class="text-16">Danh sách</h5>
                </div>
                <a href="../admin/brands/create" data-modal-target="addCustomerModal" class="btn bg-custom-500 text-white">Thêm mới</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="customerTable">
                    <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" scope="col" style="width: 50px;">
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">STT</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Tên</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Ảnh</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($brands as $key => $brand)
                        <tr>
                            <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                            </th>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $key + 1 }}</td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{$brand->name}}</td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                <img src="{{ Storage::url($brand->image) }}" width="100px" alt="">
                            </td>
                            <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                <div class="flex gap-2">
                                    <div class="edit">
                                        <a href="../admin/brands/update/{{ $brand->id }}" data-modal-target="showModal" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Sửa</a>
                                    </div>
                                    <div class="remove">
                                        <form action="../admin/brands/destroy/{{ $brand->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-modal-target="deleteRecordModal" id="delete-record" class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn"
                                            onclick="return confirm('bạn có muốn xóa')">Xóa</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="..." style="margin-top: 10px">
                    <ul class="pagination pagination-sm">
                        {{ $brands->links() }}
                    </ul>
                </nav>
            </div>




            <!-- Modal Xóa Khách Hàng -->
        </div>
    </div>


    <footer
        class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
        <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
            <div
                class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                <div>
                  
                </div>
                <div class="hidden lg:block">
                    <div class="ltr:text-right rtl:text-left">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
