@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    @if($change->status === 'pending')
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
            <div
                class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
                <div class="container-fluid mx-auto">
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">View Email Change</h5>
                        </div>
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
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            <thead class="bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" scope="col" style="width: 50px;">
                                    <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" id="checkAll" value="option">
                                </th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">Tên Người Dùng</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Email Change</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Status</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Lý Do</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <tr>
                                    <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                        <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" name="chk_child">
                                    </th>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $change->users->name }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{ $change->users->email }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                        {{ $change->status }}
                                    </td>
                                    <td style="color: red" class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                        {{ $change->reason }}
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <div class="flex gap-2">
                                            <div class="edit">
                                                <form action="../admin/email/view/{{ $change->id }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Xác Nhận Thay</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal Xóa Khách Hàng -->
                </div>
            </div>
        </div>
    @endif
    @if($change->status === 'check')
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
            <div
                class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
                <div class="container-fluid mx-auto">
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">View Email Change</h5>
                        </div>
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
                    <div class="overflow-x-auto">
                        <div class="card">
                            <div class="card-body">
                                <form action="../admin/email/view/{{ $change->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                        {{-- Product creare --}}
                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Email Hiện Tại Của Khách</label>
                                            <input type="text" id="productNameInput" value="{{ $change->users->email }}" disabled name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >

                                        </div><!--end col-->
                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Email Cần Thay Đổi</label>
                                            <input type="text" id="productNameInput" disabled name="change_email" value="{{ $change->change_email }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >
                                            @error('change_email')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div><!--end col-->

                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Lý Do Cần Thay Đổi</label>
                                            <input type="text" id="productNameInput" disabled name="reason" value="{{ $change->reason }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >
                                        </div><!--end col-->
                                    </div>
                                    <div class="flex justify-end gap-2 mt-4">
                                        <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Change Email</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Xóa Khách Hàng -->
                </div>
            </div>
        </div>
    @endif

    @if($change->status === 'Success')
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
            <div
                class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
                <div class="container-fluid mx-auto">
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">View Email Change</h5>
                        </div>
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
                    <div class="overflow-x-auto">
                        <div class="card">
                            <div class="card-body">
                                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                        {{-- Product creare --}}
                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Email Hiện Tại Của Khách</label>
                                            <input type="text" id="productNameInput" value="{{ $change->users->email }}" disabled name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >

                                        </div><!--end col-->
                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Email Cần Thay Đổi</label>
                                            <input type="text" id="productNameInput" disabled name="change_email" value="{{ $change->change_email }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >
                                            @error('change_email')
                                            <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                                                <span class="font-bold">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div><!--end col-->

                                        <div class="xl:col-span-6">
                                            <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Lý Do Cần Thay Đổi</label>
                                            <input type="text" id="productNameInput" disabled name="reason" value="{{ $change->reason }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" >
                                        </div><!--end col-->
                                    </div>
                                    <div class="flex justify-end gap-2 mt-4">
                                        <a href="../admin/email/success" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Back</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Xóa Khách Hàng -->
                </div>
            </div>
        </div>
    @endif
@endsection
