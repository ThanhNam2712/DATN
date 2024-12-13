@extends('client.layouts.master')
@section('title', 'Cart')
@section('body')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
                @if(Session::has('error'))
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        swal("Error", "{{ Session::get("error") }}", "error", {
                            button:true,
                            button:"OK",
                        })
                    </script>
                @endif
                <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                            <div class="grow">
                                <h5 class="text-16">Shopping Cart</h5>
                            </div>
                            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                                    <a href="#!" class="text-slate-400 dark:text-zink-200">Ecommerce</a>
                                </li>
                                <li class="text-slate-700 dark:text-zink-100">
                                    Shopping Cart
                                </li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                            <div class="xl:col-span-9 products-list">
                                <div class="flex items-center gap-3 mb-5">
                                    <h5 class="underline text-16 grow">Số Lượng Sản Phẩm Giỏ Hàng ({{ $cart->cartDetail->sum('quantity') }})</h5>
                                </div>
                                @if($cart->cartDetail->count() == 0)
                                    <div class="flex items-center gap-3 mb-5">
                                        <h5 class="text-16 grow"></h5>
                                        <div>
                                            <a class="text-red-500 transition-all duration-300 ease-linear hover:text-red-600"><i data-lucide="trash-2" class="inline-block mr-1 align-middle size-4"></i> <span class="align-middle">Delete All</span></a>
                                        </div>
                                    </div>
                                @else
                                    @foreach($cart->cartDetail as $key => $list)
                                        @if($list->product && !$list->product->trashed())
                                            <div class="card products products-cart" id="product{{ $key }}">
                                                <div class="card-body" data-cartDetail="{{ $list->id }}">
                                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                                                        <div class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                                            <div class="flex items-center h-full">
                                                                <input id="Checkbox" class="size-4 bg-white border cart-checkbox" name="selected_carts[]" value="{{ $list->id }}" type="checkbox">
                                                            </div>
                                                        </div>
                                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600" style="width: 130px; height: 130px">
                                                            <img src="{{ Storage::url($list->product->image) }}" alt="">
                                                        </div><!--end col-->
                                                        <div class="flex flex-col lg:col-span-4">
                                                            <div>
                                                                <h5 class="mb-1 text-16"><a href="../client/home/detail/{{ $list->product->id }}/color/{{ $list->product_variant_id }}">{{ $list->product->name }}</a></h5>
                                                                <p class="mb-2 text-slate-500 dark:text-zink-200"><a >Danh Mục : {{ $list->product->category->name }}</a></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Màu: <span class="text-slate-800 dark:text-zink-50">{{ $list->color->name }}</span></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Kích Thước: <span class="text-slate-800 dark:text-zink-50">{{ $list->size->name }}</span></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Sản Phẩm Còn: <span class="text-slate-800 dark:text-zink-50">{{ $list->product_variant->quantity }} sản phẩm</span></p>
                                                            </div>
                                                            <div class="flex items-center gap-2 mt-auto">
                                                                <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                    <button type="button" onclick="reduce('{{ $list->id }}')" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="1" max="{{ $list->product_variant->quantity }}" id="quantityInput-{{ $list->id }}" readonly="" data-cartDetail="{{ $list->id }}">
                                                                    <button type="button" onclick="increaseCart('{{ $list->id }}')" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                                </div>
                                                                <button type="submit" data-cartDetail="{{ $list->id }}" onclick="if (confirm('Bạn có muốn xóa không?')) deleteCart('{{ $list->id }}')" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                                            <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                                <h6 class="text-16 products-price"><span class="price">{{ number_format($list->product_variant->price_sale) }}</span>VND <small class="font-normal line-through text-slate-500 dark:text-zink-200">{{ number_format($list->product_variant->price) }}VND</small></h6>
                                                            </div>
                                                            <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left"><span class="products-line-price">{{ number_format($list->product_variant->price_sale * $list->quantity) }}</span>VND</h6>
                                                        </div><!--end col-->
                                                    </div><!--end grid-->
                                                </div>
                                            </div><!--end card-->
                                        @else
                                            <div class="px-4 py-3 mb-4 text-sm text-black-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                                                Sản phẩm <span class="font-bold text-red-500">{{ $list->product->name }}</span> Quản Trị Thay Đổi, Vui Lòng xóa sản phẩm có tên màu đỏ, và load lại trang để tiếp tục đặt hàng
                                            </div>
                                            <div class="card products products-cart" id="product{{ $key }}">
                                                <div class="card-body" data-cartDetail="{{ $list->id }}">
                                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
                                                        <div class="p-4 rounded-md lg:col-span-2 bg-slate-100 dark:bg-zink-600" style="width: 130px; height: 130px">
                                                            <img src="{{ Storage::url($list->product->image) }}" alt="">
                                                        </div><!--end col-->
                                                        <div class="flex flex-col lg:col-span-4">
                                                            <div>
                                                                <h5 class="mb-1 text-16 text-red-500"><a >{{ $list->product->name }}</a></h5>
                                                                <p class="mb-2 text-slate-500 text-red-500"><a href="#!">Danh Mục : {{ $list->product->category->name }}</a></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Màu: <span class="text-slate-800 dark:text-zink-50">{{ $list->color->name }}</span></p>
                                                                <p class="mb-3 text-slate-500 dark:text-zink-200">Kích Thước: <span class="text-slate-800 dark:text-zink-50">{{ $list->size->name }}</span></p>
                                                            </div>
                                                            <div class="flex items-center gap-2 mt-auto">
                                                                <div class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                                    <button type="button" disabled onclick="reduce('{{ $list->id }}')" class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                                    <input type="number" class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 dark:bg-zink-700 focus:shadow-none" value="{{ $list->quantity }}" min="1" max="{{ $list->product_variant->quantity }}" id="quantityInput-{{ $list->id }}" readonly="" data-cartDetail="{{ $list->id }}">
                                                                    <button type="button" disabled onclick="increaseCart('{{ $list->id }}')" class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                                </div>
                                                                <button type="submit" data-cartDetail="{{ $list->id }}" onclick="if (confirm('Bạn có muốn xóa không?')) deleteCart('{{ $list->id }}')" class="flex items-center justify-center size-[37.5px] p-0 text-red-500 bg-red-100 btn hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20 remove-button"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="flex justify-between w-full lg:flex-col lg:col-end-13 lg:col-span-2">
                                                            <div class="mb-auto ltr:lg:text-right rtl:lg:text-left">
                                                                <h6 class="text-16 products-price"><span>{{ number_format($list->product_variant->price_sale) }}</span>VND <small class="font-normal line-through text-slate-500 dark:text-zink-200">{{ number_format($list->product_variant->price) }}</small>VND</h6>
                                                            </div>
                                                            <h6 class="mt-auto text-16 ltr:lg:text-right rtl:lg:text-left"><span class="products-line">{{ number_format($list->product_variant->price_sale * $list->quantity) }}</span>VND</h6>
                                                        </div><!--end col-->
                                                    </div><!--end grid-->
                                                </div>
                                            </div><!--end card-->
                                        @endif
                                    @endforeach
                                @endif
                            </div><!--end col-->
                            <div class="xl:col-span-3">
                                <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h6 class="mb-4 text-15">Tổng Tiền</h6>
                                            <div class="overflow-x-auto">
                                                <table class="w-full">
                                                    <tbody class="table-total">
                                                    <tr class="font-semibold">
                                                        <td class="pt-2">
                                                            Số Tiền Sản Phẩm Bạn Chọn
                                                        </td>
                                                        <td class="pt-2" id="total-amount-check">
                                                            0 VND
                                                        </td>
                                                    </tr>
                                                    <tr class="font-semibold">
                                                        <td class="pt-2">
                                                            Tổng Tiền Các Sản Phẩm
                                                        </td>
                                                        <td class="pt-2 cart-total">
                                                            {{ number_format($cart->total_amuont) }} VND
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 mt-5 shrink-0">
                                        <a href="../client/shop/" class="w-full text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">Tiếp Tục Mua Hàng</a>
                                        <a href="javascript:void(0);" id="submit-cart" class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20" >Đặt Hàng</a>
                                    </div>

                                    <div class="flex items-center gap-5 p-4 mt-5 card">
                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                            <i data-lucide="truck" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Giao Hàng Nhanh Chóng</h6>
                                            <p class="text-slate-500"></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-5 p-4 card">
                                        <div class="flex items-center justify-center rounded-md size-12 bg-slate-100 dark:bg-zink-600">
                                            <i data-lucide="container" class="size-6 text-slate-500 fill-slate-300 dark:text-zink-200 dark:fill-zink-500"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">Miễn Phí Vận Chuyển</h6>
                                            <p class="text-slate-500 dark:text-zink-200"></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

            </div>
        </div>
    </div>

    <script>
        document.getElementById('submit-cart').addEventListener('click', function() {
            // Lấy tất cả các checkbox đã chọn
            let selectedCarts = [];
            document.querySelectorAll('.cart-checkbox:checked').forEach(function(checkbox) {
                selectedCarts.push(checkbox.value);
            });

            if (selectedCarts.length === 0) {
                alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
                return;
            }

            fetch('{{ route('client.order.checkBox') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ selected_carts: selectedCarts })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/client/order';
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

    </script>
    <script>
        function calculateTotal() {
            let total = 0;

            document.querySelectorAll('.cart-checkbox:checked').forEach(selected => {
                let parent = selected.closest('.grid');

                if (parent) {
                    let priceElement = parent.querySelector('.price');
                    let quantityElement = parent.querySelector('.products-quantity');

                    if (priceElement && quantityElement) {
                        let price = parseFloat(priceElement.textContent.replace(/,/g, '').replace(/VND/g, '').trim());
                        let quantity = parseInt(quantityElement.value.trim());
                        if (!isNaN(price) && !isNaN(quantity)) {
                            total += price * quantity;
                        }
                        console.log('Price:', price);
                        console.log('Quantity:', quantity);
                    }
                }
            });

            function formatCurrency(amount) {
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'VND';
            }
            let totalFormatted = formatCurrency(total);
            let totalElement = document.getElementById('total-amount-check');
            if (totalElement) {
                totalElement.textContent = totalFormatted;
            }
        }

        document.querySelectorAll('.cart-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotal);
        });

        document.querySelectorAll('.products-quantity').forEach(quantityInput => {
            quantityInput.addEventListener('input', calculateTotal);
        });

    </script>
@endsection
