@extends('admin.layouts.master')

@section('title')
    Danh mục sản phẩm
@endsection
@section('body')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        @if(Session::has('message'))
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                swal("Message", "{{ Session::get("message") }}", "success", {
                    button:true,
                    button:"OK",
                })
            </script>
        @endif

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
            <div class="container-fluid mx-auto">
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Danh sách đơn chưa nhận</h5>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap" id="customerTable">
                        <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>

                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">Mã Đơn Hàng</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Tên Khách</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Trang Thái</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Thu Tiền Khách</th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody class="list form-check-all">
                        @forelse ($orders as $order)
                            <tr>

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary id">#VZ2101</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{$order->barcode}}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">{{$order->user->name}}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone" style="color: red">
                                    {{ $order->status == 'delivery person' ? 'Giao bên vận chuyển' : ''}}
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    @if($order->payment->status == 1)
                                        Khác hàng đã thanh toán,<br> Vui Lòng không Thu Tiền Khách
                                    @else
                                        {{ number_format($order->payment->amount) }}VND
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <div class="edit">
                                            <form action="../admin/shipment/" method="post">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <input type="hidden" name="shiper_id" value="{{ Auth::user()->id }}">
                                                <button type="submit" data-modal-target="showModal" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Nhận Đơn</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <h2>
                                Hiện Tại Chưa có đơn Hàng nào
                            </h2>
                        @endforelse
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


        <footer
            class="ltr:md:left-vertical-menu rtl:md:right-vertical-menu group-data-[sidebar-size=md]:ltr:md:left-vertical-menu-md group-data-[sidebar-size=md]:rtl:md:right-vertical-menu-md group-data-[sidebar-size=sm]:ltr:md:left-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:md:right-vertical-menu-sm absolute right-0 bottom-0 px-4 h-14 group-data-[layout=horizontal]:ltr:left-0  group-data-[layout=horizontal]:rtl:right-0 left-0 border-t py-3 flex items-center dark:border-zink-600">
            <div class="group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl w-full">
                <div
                    class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200 ltr:lg:text-left rtl:lg:text-right">
                    <div>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> AE BOUTIQUE
                    </div>
                    <div class="hidden lg:block">
                        <div class="ltr:text-right rtl:text-left">
                            Design & Develop by AE BOUTIQUE
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
