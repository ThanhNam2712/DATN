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
                    <h5 class="text-16">Listjs</h5>
                </div>
                <a  class="btn bg-custom-500 text-white" href="{{ route("admin.categories.create") }}">Thêm Mới</a>
            </div>
  @if (session('success'))
            <div class="alert alert-success text-green-500 bg-green-100 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
            <div class="card" id="customerList">
                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            <thead class="bg-slate-100 dark:bg-zinc-600">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Ảnh</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td class="customer_name">{{ $category->name }}</td>
                                    <td class="image">
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->name }}" class="w-16 h-16">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                           class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                           Edit
                                        </a>
                                        <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                           class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn"
                                           onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn muốn xóa?')) { document.getElementById('delete-form-{{ $category->id }}').submit(); }">
                                           Xóa
                                        </a>
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end mt-4">
                        <div class="flex gap-2 pagination-wrap">
                            <a class="page-item pagination-prev" href="#">Previous</a>
                            <ul class="flex gap-2 mb-0 pagination listjs-pagination"></ul>
                            <a class="page-item pagination-next" href="#">Next</a>
                        </div>
                    </div>
                </div>
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
                    <script>
                        document.write(new Date().getFullYear())
                    </script> StarCode Kh
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
