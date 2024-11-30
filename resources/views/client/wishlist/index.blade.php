@extends('client.layouts.master')
@section('title', 'Profile')

@section('body')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">

    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        <!-- Căn giữa toàn bộ card -->
        <div class="card mx-auto max-w-4xl">
            <div class="card-body">
                <h2 class="mb-4 text-22 text-center">Sản phẩm yêu thích</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-center">
                        <thead class="">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">ID</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Sản phẩm</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Ảnh</th>
                                <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                                @php
                                    $product = $wishlist->product;
                                @endphp
                                <tr class="{{ $product && !$product->trashed() ? '' : 'opacity-50' }}">
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $product && !$product->trashed() ? $product->id : 'N/A' }}
                                    </td>

                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        @if ($product && !$product->trashed())
                                            <a href="{{ route('client.home.detail', ['id' => $product->id, 'idColor' => $product->color_id ?? 0]) }}" class="text-custom-500 hover:text-custom-600">
                                                {{ $product->name }}
                                            </a>
                                        @else
                                            <span class="text-red-500">Sản phẩm không tồn tại</span>
                                        @endif
                                    </td>

                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        @if ($product && !$product->trashed())
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-red-500">Không có ảnh</span>
                                        @endif
                                    </td>

                                    <!-- Nút xóa -->
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        @if ($product && !$product->trashed())  <!-- Kiểm tra nếu sản phẩm tồn tại và chưa bị xóa mềm -->
                                            <form action="{{ route('client.wishlist.toggle', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-custom-500 hover:text-custom-600">
                                                    <i class="ri-heart-line"></i>
                                                    Xóa khỏi yêu thích
                                                </button>
                                            </form>
                                        @else
                                            <!-- Nếu sản phẩm đã bị xóa mềm hoặc không tồn tại -->
                                            <span class="text-red-500">Sản phẩm không còn tồn tại</span>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
