@extends('client.layouts.master')
@section('title', 'Cart')
@section('body')
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
                @if(Session::has('error'))
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        swal("Error", "{{ Session::get("error") }}", "error", {
                            button:true,
                            button:"OK",
                        })
                    </script>
                @endif
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Đơn hàng</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="" class="text-slate-400 dark:text-zink-200">Giỏ Hàng</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Đơn Hàng
                    </li>
                </ul>
            </div>
            <form action="{{ route('client.order.create') }}" method="POST" id="postOrderCreate">
                @csrf
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    @if($hasDeletedProduct)
                        <div style="width: auto" class="px-4 py-3 mb-4 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                            <span class="font-bold">Đã Có Một Số Sản phẩm Đang Thay Đổi, Vui Lòng Xóa Các Sản Phẩm Được Chỉ Định Ra Khỏi Giỏ Hàng và tải lại trang</span>
                        </div>
                    @else
                        <div class="flex gap-1 px-4 py-3 mb-5 text-sm text-green-500 border border-green-200 rounded-md md:items-center bg-green-50 dark:bg-green-400/20 dark:border-green-500/50">
                            <i data-lucide="shopping-bag" class="h-4 shrink-0"></i> <p>Vui Lòng Điền Đầy Đủ thông tin nhận hàng trước khi mua hàng.</p>
                        </div>
                    @endif

                </div><!--end col-->

                    <div class="xl:col-span-8">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="grow">
                                <a href="../client/cart" class="transition-all duration-300 ease-linear text-custom-500 hover:text-custom-600"><i data-lucide="chevron-left" class="inline-block align-middle size-4 ltr:mr-1 rtl:ml-1 rtl:rotate-180"></i> <span class="align-middle">Quay Lại Giỏ Hàng</span></a>
                            </div>
                            <div class="shrink-0">
                                <button type="button" data-modal-target="updateAddressOrder" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i class="ri-map-pin-5-fill"></i><span class="align-middle">Đổi Địa Chỉ</span></button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-4 text-15">Thông Tin Vận Chuyển</h6>
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                        <!-- First Name -->
                                        <div class="xl:col-span-4">
                                            <label for="firstNameInput" class="inline-block mb-2 text-base font-medium">Tên Đầy Đủ</label>
                                            <input type="text" id="firstNameInput" name="first_name" value="{{ $user->name }}" class="form-input" placeholder="Enter First Name">
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="xl:col-span-4">
                                            <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Số Điện Thoại</label>
                                            <input type="text" id="phoneNumberInput" name="phone_number" value="{{ $user->sdt ?? 'Chưa có thông tin' }}" class="form-input" placeholder="(012) 345 678 9010">
                                        </div>

                                        <!-- Email Address -->
                                        <div class="xl:col-span-4">
                                            <label for="emailAddressInput" class="inline-block mb-2 text-base font-medium">Địa Chỉ Email</label>
                                            <input type="email" id="emailAddressInput" name="email" value="{{ $user->email }}" class="form-input" placeholder="Enter email">
                                        </div>

                                        <!-- Address Information (Optional) -->
                                        @if($address != null)
                                                <div class="xl:col-span-12">
                                                    <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                                                    <input type="text" id="provinceInput" name="province" value="{{ $address->Province }}" class="form-input" placeholder="Enter Province">
                                                </div>

                                                <div class="xl:col-span-12">
                                                    <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                                                    <input type="text" id="townCityInput" name="district" value="{{ $address->district }}" class="form-input" placeholder="Enter District">
                                                </div>

                                                <div class="xl:col-span-6">
                                                    <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                                                    <input type="text" id="apartmentInput" name="ward" value="{{ $address->Apartment }}" class="form-input" placeholder="Enter Apartment">
                                                </div>

                                                <div class="xl:col-span-6">
                                                    <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Số Nhà</label>
                                                    <input type="text" id="neighborhoodInput" name="address_detail" value="{{ $address->Neighborhood }}" class="form-input" placeholder="Enter Neighborhood">
                                                </div>

                                        @else
                                            <!-- Form for adding new address -->
                                            <div class="xl:col-span-12">
                                                <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                                                <input type="text" id="provinceInput" name="province" class="form-input" placeholder="Enter Province">
                                            </div>

                                            <div class="xl:col-span-12">
                                                <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                                                <input type="text" id="townCityInput" name="district" class="form-input" placeholder="Enter District">
                                            </div>

                                            <div class="xl:col-span-6">
                                                <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Neighborhood</label>
                                                <input type="text" id="neighborhoodInput" name="address_detail" class="form-input" placeholder="Enter Neighborhood">
                                            </div>

                                            <div class="xl:col-span-6">
                                                <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                                                <input type="text" id="apartmentInput" name="ward" class="form-input" placeholder="Enter Apartment">
                                            </div>
                                        @endif
                                    </div><!--end grid-->
                            </div>
                        </div><!--end card-->
                    </div><!--end col-->
                    <div class="xl:col-span-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Đơn Hàng</h6>
                            {{--  sản phẩm -------------------------------------------------------------------------  --}}
                            <div class="overflow-x-auto">

                                <table class="w-full">
                                    <tbody class="deleteOrder">
                                        @foreach($cartDetails as $key => $list)
                                            @if($list->product && !$list->product->trashed())
                                                <tr>
                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                        <div class="flex items-center gap-3">
                                                            <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                <img src="{{ Storage::url($list->product->image) }}" alt="">
                                                            </div>
                                                            <div class="grow">
                                                                <h6 class="mb-1 text-15"><a href="../client/home/detail/{{ $list->product_id }}/color/{{ $list->product_variant_id }}" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->product->name }}</a></h6>
                                                                <p class="text-slate-500 dark:text-zink-200">{{ number_format($list->product_variant->price_sale) }} VND x {{$list->quantity}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">{{ number_format($list->product_variant->price_sale * $list->quantity) }} VND</td>
                                                </tr>
                                            @else
                                                <tr data-cartDetail="{{ $list->id }}">
                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                        <div style="width: auto" class="px-4 py-3 mb-4 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                                                            <span class="font-bold">Sản phẩm {{ $list->product->name }} Đang Thay Đổi, Vui Lòng Xóa Khỏi Giỏ Hàng và tải lại trang</span>
                                                        </div>
                                                        <div class="flex items-center gap-3">
                                                            <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                <img src="{{ Storage::url($list->product->image) }}" alt="">
                                                            </div>
                                                            <div class="grow">
                                                                <h6 class="mb-1 text-15"><a class="text-red-500 transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->product->name }}</a></h6>
                                                                <p class="text-slate-500 dark:text-zink-200">{{ number_format($list->product_variant->price_sale) }}VND x {{$list->quantity}}</p>
                                                                <a data-cartDetail="{{ $list->id }}" onclick="if (confirm('Bạn có muốn xóa không?')) deleteCart('{{ $list->id }}')" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">{{ number_format($list->product_variant->price_sale * $list->quantity) }}VND</td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        <div>
                                        <tr>
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Giá
                                            </td>
                                            {{--  @dd($cart);  --}}
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left response_discount_value">{{ number_format($totalAmount) }}VND</td>
                                        </tr>
                                    </div>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Tiền Được Giảm
                                            </td>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left response_discount">0VND</td>
                                        </tr>
                                        <tr>
                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                <input type="text" name="coupon" id="couponApply" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Coupon Client">
                                            </td>

                                            <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                <a href="javascript:couponApply()">
                                                    <button type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Áp Mã</span></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="cursor: pointer" data-modal-target="addressModal" class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Chọn mã giảm giá
                                            </td>
                                        </tr>
                                        <tr class="font-semibold">
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Tổng Tiền Cần Trả
                                        </td>
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left hidden_response_total">{{ number_format($totalAmount) }}VND</td>
                                        <input type="hidden" class="order_total_amount" name="order_total_amount" value="{{ $totalAmount }}">
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            {{--  sản phẩm -----------------------------------------------------------  --}}
                            <div class="mt-4">
                                <div class="flex items-center gap-3">
                                    <input id="deliveryOption1" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="payments" value="Thanh Toán Khi Nhận Hàng">
                                    <label for="deliveryOption1" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">

                                        <span class="grow">
                                            <span class="block mb-1 font-semibold text-15">Thanh Toán Khi Nhận Hàng</span>
                                            <span class="text-slate-500 dark:text-zink-200">Khi Nhận Hàng Thanh Toán</span>
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

                                <input type="hidden" class="order_total_amount" name="total_amount" value="{{ $totalAmount }}">
                                <input type="hidden" class="order_total_amount" name="total_discount" value="0">
                                <input type="hidden" name="allQuantity" value="{{ $cartDetails->sum('quantity') }}">
                                @if(!$hasDeletedProduct)
                                    <button type="submit" class="mt-3 w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600">
                                        Xác Nhận Đặt Hàng
                                    </button>
                                @else
                                    <div style="width: auto; text-align: center" class="px-4 py-3 mb-4 text-sm border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                                        <span class="font-bold">Bạn Vui Lòng Thực Hiện Thao Tác Yêu Cầu Trên</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div><!--end col-->
            </div><!--end grid-->
            </form>
        </div>
        <!-- container-fluid -->
    </div>

    <div id="addressModal" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Danh Sách Mã Giảm Giá</h5>
                <button data-modal-close="addressModal" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_380px)] p-4 overflow-y-auto">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                        <div class="xl:col-span-12">
                            @foreach($coupons as $key => $coupon)
                                <p>Phiếu Giảm Giá 0{{ $key + 1 }}.</p>
                                <a class="px-4 py-3 mb-5 block transition-all duration-150 ease-linear border-t card-body border-slate-200 hover:bg-slate-50 [&.active]:bg-slate-100 dark:border-zink-500 dark:hover:bg-zink-600 dark:[&.active]:bg-zink-600 active">
                                    <div class="float-right">
                                        <span class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-yellow-100 border-transparent text-yellow-500 dark:bg-yellow-500/20 dark:border-transparent">Chưa Dùng</span>
                                        <input type="hidden" id="clipboard{{ $key }}" value="{{ $coupon->code }}" aria-describedby="button-addon2" placeholder="">
                                        <button style="float: right" type="button" id="copyButton" data-clipboard-action="copy" data-clipboard-target="#clipboard{{ $key }}" class="flex items-center justify-center w-[39px] h-[39px] ltr:rounded-l-none rtl:rounded-r-none p-0 text-slate-500 btn bg-slate-200 border-slate-200 hover:text-slate-600 hover:bg-slate-300 hover:border-slate-300 focus:text-slate-600 focus:bg-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-100 active:text-slate-600 active:bg-slate-300 active:border-slate-300 active:ring active:ring-slate-100 dark:bg-zink-600 dark:hover:bg-zink-500 dark:border-zink-600 dark:hover:border-zink-500 dark:text-zink-200 dark:ring-zink-400/50">
                                            <i data-lucide="clipboard-list" class="inline-block size-4"></i>
                                        </button>
                                    </div>
                                    <h6>Hình Thức Giảm: {{ $coupon->discount_type }}</h6>
                                    <div class="flex">
                                        <div class="grow">
                                            <h6 class="mt-3 mb-1 text-16">{{ $coupon->code }}</h6>
                                            <p class="text-slate-500 dark:text-zink-200">{{ number_format($coupon->discount_value) }} {{ $coupon->discount_type == 'Phần Trăm' ? '%' : 'VND'}}</p>
                                        </div>
                                        <p class="self-end mb-0 text-slate-500 dark:text-zink-200 shrink-0"><i data-lucide="calendar-clock" class="inline-block size-4 ltr:mr-1 rtl:ml-1"></i>
                                            <span class="align-middle">{{ $coupon->expiration_date }}
                                            </span>
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div><!--end add user-->
    <div id="updateAddressOrder" modal-center="" class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600" style="width: 800px">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-300/20">
                <h5 class="text-16">Chọn Địa Chỉ</h5>
                <button data-modal-close="updateAddressOrder" class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x" class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_380px)] p-4 overflow-y-auto">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                    @foreach($addressSelect as $key => $list)
                        <div class="xl:col-span-12">
                            <p>Địa Chỉ Nhận Hàng 0{{ $key + 1 }}.</p>
                            <table class="w-full whitespace-nowrap mt-5" id="productTable">
                                <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                <tr>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort category" data-sort="category">Tỉnh</th>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price" data-sort="price">Huyện</th>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort revenue" data-sort="revenue">Địa Chỉ Cụ Thể</th>
                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">Hành Động</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 category">
                                        <span class="category px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-slate-100 border-slate-200 text-slate-500 dark:bg-slate-500/20 dark:border-slate-500/20 dark:text-zink-200">
                                            {{ $list->Province }}
                                        </span>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">
                                        {{ $list->district }}
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 stock">
                                        {{ $list->Neighborhood }}
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 action">
                                        <form action="../client/order/address/{{ $list->id }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Chọn</span></button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div><!--end add user-->
    <script>
        document.getElementById('postOrderCreate').addEventListener('submit', function (e) {
            const seleted1 = document.getElementById('deliveryOption1');
            const seleted2 = document.getElementById('deliveryOption2');

            if (!seleted1.checked && !seleted2.checked){
                e.preventDefault();
                alert('Vui Lòng Chọn Phương Thức Thanh Toán Cho Đơn Hàng');
            }
        });
    </script>

@endsection

