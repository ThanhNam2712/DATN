@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    @if($refund->reason === 'Hàng Không Đúng Muốn Bồi Hoàn')
        <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

            <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <div class="grow">
                            <h5 class="text-16">Bồi Hoàn Đơn Hàng</h5>
                        </div>
                        <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                            <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                <a class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                            </li>
                            <li class="text-slate-700 dark:text-zink-100">
                                View Return Order
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                        <table class="w-full whitespace-nowrap" id="customerTable">
                            <thead class="bg-slate-100 dark:bg-zink-600">
                                <tr>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500" scope="col" style="width: 50px;">
                                        <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" id="checkAll" value="option">
                                    </th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">Mã Đơn Hàng</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Trạng Thái</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Mô Tả</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Giá Tiền Cần Hoàn</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Thời Gian Gửi Yêu Cầu</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Email</th>
                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $refund->order->barcode }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{ $refund->status }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone" style="color: red">
                                    {{ $refund->reason }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone" style="color: red">
                                    ${{ $refund->refund_amount }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $refund->request_date }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    {{ $refund->user->email }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    @if($refund->status != 'Đã Tiếp Nhận')
                                        <form action="../admin/refund/update/{{ $refund->id }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Tiếp Nhận Đơn</button>
                                        </form>
                                    @else
                                        Đã Chấp Nhận
                                    @endif

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="grow mt-4">
                        <h5 class="text-16">Thông Tin Sản Phẩm Cần Bồi Hoàn</h5>
                    </div>
                    <form action="../admin/refund/check/{{ $refund->id }}" method="post" class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                        @csrf
                        @method('PUT')
                        <div class="xl:col-span-8">
                            <div class="card-body">
                                <div class="card products" id="product1">
                                    @forelse ($refund->returnDetail as $list)
                                        <div class="card-body mt-3">
                                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                                                    <div class="rounded-md lg:col-span-2">
                                                        <img src="{{ Storage::url($list->product->image) }}" alt="" style="height: 150px; ">
                                                    </div><!--end col-->
                                                    <div class="flex flex-col lg:col-span-4">
                                                        <div>
                                                            <h5 class="mb-1 text-16"><a >{{ $list->product->name }}</a></h5>
                                                            <p class="mb-2 text-slate-500 dark:text-zink-200"><a href="#!">{{ $list->product->category->name }}</a></p>
                                                            <p class="mb-1 text-slate-500 dark:text-zink-200">Color: <span class="text-slate-800 dark:text-zink-50">{{ $list->colorPro->name }}</span></p>
                                                            <p class="mb-3 text-slate-500 dark:text-zink-200">Size: <span class="text-slate-800 dark:text-zink-50">{{ $list->sizePro->name }}</span></p>
                                                        </div>
                                                        <div class="flex items-center gap-2 mt-auto">
                                                            <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                <input type="number" disabled class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="0" max="100" readonly="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h5 class="mt-1 text-16">Lý Do Trả Hàng: <a style="color: red">{{ $list->reason_item }}</a></h5>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                                        <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                            <h6 class="text-16 products-price">$<span>{{ $list->variantPro->price_sale}}</span> <small class="font-normal line-through text-slate-500 dark:text-zink-200">${{ $list->variantPro->price }}</small></h6>
                                                        </div>
                                                        <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left">$<span class="products-line-price">{{ $list->variantPro->price_sale * $list->quantity }}</span></h6>
                                                    </div><!--end col-->
                                                </div><!--end grid-->
                                            </div>
                                    @empty
                                        <h2 class="text-16">
                                            Hiện Tại Chưa có đơn Hàng nào
                                        </h2>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-4">
                            <div class="mt-4">
                                <div class="flex items-center gap-3">
                                    <input id="deliveryOption1" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="payments" value="Hoàn Tiền Trực Tiếp">
                                    <label for="deliveryOption1" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">

                                        <span class="grow">
                                            <span class="block mb-1 font-semibold text-15">Hoàn Tiền Trực Tiếp</span>
                                            <span class="text-slate-500 dark:text-zink-200">Trả Tiền Mặt Cho Khách Hàng</span>
                                        </span>
                                    </label>
                                </div>
                                <div class="mt-4 flex items-center gap-3">
                                    <input id="deliveryOption2" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="payments" value="Thẻ Tín Dụng">
                                    <label for="deliveryOption2" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">

                                        <span class="grow">
                                            <span class="block mb-1 font-semibold text-15">Thẻ Tín Dụng</span>
                                            <span class="text-slate-500 dark:text-zink-200">Thanh Toán Trước Khi Nhận Hàng</span>
                                        </span>
                                    </label>
                                </div>
                                <input type="hidden" name="namePro" value="{{ $refund->returnDetaill->product->name }}">
                                <button type="submit" class="mt-3 w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
