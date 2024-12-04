@extends('client.layouts.master')
@section('title', 'Cart')
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                @if(Session::has('message'))
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        swal("Message", "{{ Session::get("message") }}", "success", {
                            button:true,
                            button:"OK",
                        })
                    </script>
                @endif
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Return Order</h5>
                    </div>
                    <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                        <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                            <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                        </li>
                        <li class="text-slate-700 dark:text-zink-100">
                            Return Order
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
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Tên Sản phẩm</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Trang Thái</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Giá Tiền</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Số Lượng</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                        </tr>
                        </thead>
                        <tbody class="list form-check-all">
                        @forelse ($order->orderDetail as $list)
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input class="border rounded-sm appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400" type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{$order->barcode}}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{ $list->products->name }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone" style="color: red">
                                    {{ $order->status }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone" style="color: red">
                                    ${{ $list->price }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    {{ $list->quantity }}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <div class="edit">
                                            @php
                                                $isProductInReturn = $order->returnOrder && $order->returnOrder->returnDetail->contains('return_order_id', $order->returnOrder->id);
                                            @endphp

                                            @if (!$isProductInReturn)
                                                <form action="../client/refund/{{ $order->id }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="orderItem" value="{{ $list->id }}">
                                                    <button type="submit" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Chọn Sản Phẩm</button>
                                                </form>
                                            @else
                                                <span class="text-xs text-gray-500">Sản phẩm đã được chọn</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h2 class="text-16">
                                Hiện Tại Chưa có đơn Hàng nào
                            </h2>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <form action="../client/refund/update/{{ $order->returnOrder->id }}" method="post" class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                    @csrf
                    @method('PUT')
                    <div class="xl:col-span-8">
                        <div class="card products" id="product1">
                            @forelse($order->returnOrder->returnDetail as $list)
                                <div class="xl:col-span-4">
                                    <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Lý Do Trả Hàng Và Hoàn Đơn</label>
                                    <select required class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices="" data-choices-search-false="" name="reason" id="categorySelect">
                                        <option value="">Chọn Lý Do</option>
                                        <option value="Đổi Kích Thước">Đổi Kích Thước</option>
                                        <option value="Hàng Không Đúng Muốn Bồi Hoàn">Hàng Không Đúng Muốn Bồi Hoàn</option>
                                    </select>
                                </div>
                                <div class="card-body mt-3">
                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600">
                                            <img src="{{ Storage::url($list->product->image) }}" alt="">
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
                                                    <button type="button" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="0" max="100" readonly="">
                                                    <button type="button" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                </div>
                                                <button data-modal-target="deleteModal" type="button" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
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
                                <div class="grow">
                                    <h2 class="text-16">
                                        Hiện Tại Chưa có đơn Hàng nào
                                    </h2>
                                </div>
                            @endforelse

                        </div><!--end card-->

                    </div><!--end col-->
                    <div class="xl:col-span-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-4 text-15">Orders Summary</h6>

                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <tbody>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Mã Giảm Giá Đã Dùng
                                            </td>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">{{ $order->coupon ?? '' }}</td>
                                        </tr>
                                        <tr class="font-semibold">
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Số Tiền Trả Lại Nếu Thành Công
                                            </td>
                                            <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $order->returnOrder->refund_amount ?? 'Chọn Sản phẩm Để Trả Giá' }}</td>
                                        </tr>
                                        <tr class="font-semibold">
                                            <div>
                                                <label for="productDescription" class="inline-block mb-2 text-base font-medium">Content Return Item</label>
                                                <textarea name="reason_item" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Description" rows="5" required></textarea>
                                            </div>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                @if($order->returnOrder->reason == null)
                                    <div class="mt-4">
                                        <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Yêu Cầu Hoàn Đơn Hàng</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                    </div>
                                @else
                                    <p class="mt-5 first:pl-0 last:pr-0 text-slate-500" style="color: red; text-align: center; font-size: 16px">
                                        {{ $order->returnOrder->status }}
                                    </p>
                                @endif

                            </div>
                        </div>
                    </div><!--end col-->
                </form><!--end grid-->
                    <a href="../client/order/view" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Yêu Cầu Hoàn Đơn Hàng</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></a>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
