@extends('admin.layouts.master')
@section('title', 'Products')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Order</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="{{route('admin.cart.detail')}}" class="text-slate-400 dark:text-zink-200">Cart</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Order
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="flex gap-1 px-4 py-3 mb-5 text-sm text-green-500 border border-green-200 rounded-md md:items-center bg-green-50 dark:bg-green-400/20 dark:border-green-500/50">
                        <i data-lucide="shopping-bag" class="h-4 shrink-0"></i> <p>The minimum order requirement is <b>$1,800</b>. To meet this threshold, please add additional products with a combined value of <b>$300</b>.</p>
                    </div>
                </div><!--end col-->
                <div class="xl:col-span-8">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="grow">
                            <a href="{{route('admin.cart.detail')}}" class="transition-all duration-300 ease-linear text-custom-500 hover:text-custom-600"><i data-lucide="chevron-left" class="inline-block align-middle size-4 ltr:mr-1 rtl:ml-1 rtl:rotate-180"></i> <span class="align-middle">Back to Cart</span></a>
                        </div>
                        <div class="shrink-0">
                            <button type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span> <i data-lucide="move-right" class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Shipping Information</h6>
                            <form action="{{ route('admin.order.create') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                    
                                    <!-- First Name -->
                                    <div class="xl:col-span-4">
                                        <label for="firstNameInput" class="inline-block mb-2 text-base font-medium">First Name</label>
                                        <input type="text" id="firstNameInput" name="first_name" value="{{ $user->name }}" class="form-input" placeholder="Enter First Name">
                                    </div>
                    
                                    <!-- Phone Number -->
                                    <div class="xl:col-span-4">
                                        <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Phone Number</label>
                                        <input type="text" id="phoneNumberInput" name="phone" value="{{ $user->sdt ?? 'Chưa có thông tin' }}" class="form-input" placeholder="(012) 345 678 9010">
                                    </div>
                    
                                    <!-- Email Address -->
                                    <div class="xl:col-span-4">
                                        <label for="emailAddressInput" class="inline-block mb-2 text-base font-medium">Email Address</label>
                                        <input type="email" id="emailAddressInput" name="email" value="{{ $user->email }}" class="form-input" placeholder="Enter email">
                                    </div>
                    
                                    <!-- Address Information (Optional) -->
                                    @if($address->isNotEmpty())
                                        @foreach ($address as $item)
                                            <div class="xl:col-span-12">
                                                <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                                                <input type="text" id="provinceInput" name="Province" value="{{ $item->Province }}" class="form-input" placeholder="Enter Province">
                                            </div>
                    
                                            <div class="xl:col-span-12">
                                                <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                                                <input type="text" id="townCityInput" name="district" value="{{ $item->district }}" class="form-input" placeholder="Enter District">
                                            </div>
                    
                                            <div class="xl:col-span-6">
                                                <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Neighborhood</label>
                                                <input type="text" id="neighborhoodInput" name="Neighborhood" value="{{ $item->Neighborhood }}" class="form-input" placeholder="Enter Neighborhood">
                                            </div>
                    
                                            <div class="xl:col-span-6">
                                                <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                                                <input type="text" id="apartmentInput" name="Apartment" value="{{ $item->Apartment }}" class="form-input" placeholder="Enter Apartment">
                                            </div>
                                        @endforeach
                                    @else
                                        <!-- Form for adding new address -->
                                        <div class="xl:col-span-12">
                                            <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                                            <input type="text" id="provinceInput" name="Province" class="form-input" placeholder="Enter Province">
                                        </div>
                    
                                        <div class="xl:col-span-12">
                                            <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                                            <input type="text" id="townCityInput" name="district" class="form-input" placeholder="Enter District">
                                        </div>
                    
                                        <div class="xl:col-span-6">
                                            <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Neighborhood</label>
                                            <input type="text" id="neighborhoodInput" name="Neighborhood" class="form-input" placeholder="Enter Neighborhood">
                                        </div>
                    
                                        <div class="xl:col-span-6">
                                            <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                                            <input type="text" id="apartmentInput" name="Apartment" class="form-input" placeholder="Enter Apartment">
                                        </div>
                                    @endif
                                </div><!--end grid-->
                    
                                <!-- Save Button -->
                                <button type="submit" class="btn btn-primary mt-4">Save Address</button>
                            </form>
                        </div>
                    </div><!--end card-->

                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Delivery</h6>

                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                                <div class="flex items-center gap-3">
                                    <input id="deliveryOption1" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery" checked="">
                                    <label for="deliveryOption1" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                    <span class="shrink-0">
                                        <img src="assets/images/delivery-1.png" alt="" class="h-12">
                                    </span>
                                        <span class="grow">
                                        <span class="block mb-1 font-semibold text-15">Express Delivery</span>
                                        <span class="text-slate-500 dark:text-zink-200">Expected delivery: 01 Nov, Wednesday</span>
                                    </span>
                                        <span class="shrink-0">
                                        <span class="block text-lg font-semibold">$11.99</span>
                                    </span>
                                    </label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <input id="deliveryOption2" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery">
                                    <label for="deliveryOption2" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                    <span class="shrink-0">
                                        <img src="assets/images/delivery-2.png" alt="" class="h-12">
                                    </span>
                                        <span class="grow">
                                        <span class="block mb-1 font-semibold text-15">Air Logistic Delivery</span>
                                        <span class="text-slate-500 dark:text-zink-200">Expected delivery: 06 Nov, Monday</span>
                                    </span>
                                        <span class="shrink-0">
                                        <span class="block text-lg font-semibold">$5</span>
                                    </span>
                                    </label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <input id="deliveryOption3" class="border rounded-full appearance-none cursor-pointer size-4 bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-purple-500 checked:border-purple-500 dark:checked:bg-purple-500 dark:checked:border-purple-500 checked:disabled:bg-purple-400 checked:disabled:border-purple-400 peer" type="radio" name="deliveryChoose" value="express-delivery">
                                    <label for="deliveryOption3" class="flex flex-col gap-4 p-5 border rounded-md cursor-pointer md:flex-row border-slate-200 dark:border-zink-500 peer-checked:border-purple-500 dark:peer-checked:border-purple-700 grow">
                                    <span class="shrink-0">
                                        <img src="assets/images/delivery-3.png" alt="" class="h-12">
                                    </span>
                                        <span class="grow">
                                        <span class="block mb-1 font-semibold text-15">Free Delivery</span>
                                        <span class="text-slate-500 dark:text-zink-200">Expected delivery: 11 Nov, Saturday</span>
                                    </span>
                                        <span class="shrink-0">
                                        <span class="block text-lg font-semibold">$0</span>
                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->

                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Payment Information</h6>
                            <form action="#!">
                                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                    <div class="xl:col-span-12">
                                        <label for="cardNumberInput" class="inline-block mb-2 text-base font-medium">Card Number</label>
                                        <input type="text" pattern="\d*" maxlength="16" id="cardNumberInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="XXXX XXXX XXXX XXXX">
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="expiringInput" class="inline-block mb-2 text-base font-medium">Expiring (MM/YY)</label>
                                        <input type="text" pattern="\d*" maxlength="4" id="expiringInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="MM/YY">
                                    </div><!--end col-->
                                    <div class="xl:col-span-6">
                                        <label for="cvvInput" class="inline-block mb-2 text-base font-medium">CVV Code</label>
                                        <input type="text" pattern="\d*" maxlength="3" id="cvvInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="000">
                                    </div><!--end col-->
                                </div><!--end grid-->
                            </form>

                            <div class="mt-3">
                                <h6 class="mb-1">We accept the following cards</h6>
                                <div class="flex items-center gap-2">
                                    <img src="assets/images/img-013.png" alt="" class="h-8">
                                    <img src="assets/images/img-022.png" alt="" class="h-8">
                                    <img src="assets/images/img-032.png" alt="" class="h-8">
                                    <img src="assets/images/img-042.png" alt="" class="h-8">
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
                <div class="xl:col-span-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 text-15">Orders Summary</h6>
                            <div class="px-4 py-3 mb-4 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                                These products are limited, checkout within <span class="font-bold">03m 21s</span>
                            </div>
                            {{--  sản phẩm -------------------------------------------------------------------------  --}}
                            <div class="overflow-x-auto">

                                <table class="w-full">
                                    <tbody>
                                    @foreach($cart->cartDetail as $key => $list)
                                        <tr>
                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                <div class="flex items-center gap-3">
                                                    <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                        <img src="{{ Storage::url($list->product->image) }}" alt="">
                                                    </div>
                                                    <div class="grow">
                                                        <h6 class="mb-1 text-15"><a href="apps-ecommerce-product-overview.html" class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $list->product->name }}</a></h6>
                                                        <p class="text-slate-500 dark:text-zink-200">{{ $list->product_variant->price_sale }} x {{$list->quantity}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">{{ number_format($list->product_variant->price_sale * $list->quantity) }}</td>
                                        </tr>
                                    @endforeach
                                    <div>
                                        <tr>
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                Sub Total
                                            </td>
                                            {{--  @dd($cart);  --}}
                                            <td class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">${{ $cart->total_amuont}}</td>
                                        </tr>
                                    </div>
                                    <tr>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Estimated Tax
                                        </td>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left response_discount">$0</td>
                                    </tr>
                                    <tr>
                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            <input type="text" name="coupon" id="couponApply" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Coupon Client">
                                        </td>

                                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                            <a href="javascript:couponApply()">
                                                <button type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span class="align-middle">Place Order</span></button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="font-semibold">
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                            Total Amount (USD)
                                        </td>
                                        <td class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left hidden_response_total">${{ $cart->total_amuont}}</td>
                                        <input type="hidden" class="order_total_amount" name="order_total_amount" value="{{ $cart->total_amuont }}">
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                            {{--  sản phẩm -----------------------------------------------------------  --}}
                            <div class="mt-4">
                                <form action="{{ route('admin.order.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="order_total_amount" name="total_amount" value="{{ $cart->total_amuont }}">
                                    <button type="submit" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600">
                                        Place Order
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-4 underline text-16">Additional Service</h6>
                    <div class="card">
                        <div class="flex flex-col gap-3 md:items-center card-body md:flex-row">
                            <div class="grow">
                                <h6 class="mb-1 text-15">Care + Package</h6>
                                <p class="text-slate-500 dark:text-zink-200">2 year of additional care</p>
                            </div>
                            <div class="shrink-0">
                                <b>$24.99</b>
                            </div>
                            <div class="shrink-0">
                                <div class="relative inline-block w-10 align-middle transition duration-200 ease-in">
                                    <input type="checkbox" name="carePackage" id="carePackage" class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none">
                                    <label for="carePackage" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                    <div class="card">
                        <div class="flex flex-col gap-3 md:items-center card-body md:flex-row">
                            <div class="grow">
                                <h6 class="mb-1 text-15">Environment Friendly</h6>
                                <p class="text-slate-500 dark:text-zink-200">The primary goal of eco-warriors is creating</p>
                            </div>
                            <div class="shrink-0">
                                <b>$19.99</b>
                            </div>
                            <div class="shrink-0">
                                <div class="relative inline-block w-10 align-middle transition duration-200 ease-in">
                                    <input type="checkbox" name="friendlyCheckbox" id="friendlyCheckbox" class="absolute block transition duration-300 ease-linear border-2 rounded-full appearance-none cursor-pointer size-5 border-slate-200 dark:border-zink-600 bg-white/80 dark:bg-zink-400 peer/published checked:bg-custom-500 dark:checked:bg-custom-500 ltr:checked:right-0 rtl:checked:left-0 checked:border-custom-100 dark:checked:border-custom-900 arrow-none checked:bg-none">
                                    <label for="friendlyCheckbox" class="block h-5 overflow-hidden duration-300 ease-linear border rounded-full cursor-pointer cursor-pointertransition border-slate-200 dark:border-zink-500 bg-slate-200 dark:bg-zink-600 peer-checked/published:bg-custom-100 dark:peer-checked/published:bg-custom-900 peer-checked/published:border-custom-100 dark:peer-checked/published:border-custom-900"></label>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end grid-->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
