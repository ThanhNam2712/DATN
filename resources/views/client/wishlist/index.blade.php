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
                        <div class="">
                            <section class="relative py-24 xl:py-32" id="product">
                                <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
                                    <div class="mx-auto text-center xl:max-w-3xl">
                                        <h1 class="mb-0 leading-normal capitalize">Sản Phẩm Được Thích</h1>
                                    </div>
                                    @if(Session::has('success'))
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script>
                                            swal("Message", "{{ Session::get("success") }}", "success", {
                                                button:true,
                                                button:"OK",
                                            })
                                        </script>
                                    @endif
                                    <div class="grid grid-cols-1 gap-5 mt-12 md:grid-cols-2 xl:grid-cols-4">
                                        @foreach($wishlists as $key => $list)
                                            @if($list->product && !$list->product->trashed())
                                                <div class="p-5 rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900"
                                                     data-aos="fade-up" data-aos-easing="linear">
                                                    <form action="{{ route('client.wishlist.toggle', $list->product->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="favorite-btn">
                                                            <i class="{{ Auth::check() && Auth::user()->wishlists->contains('product_id', $list->product->id) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                                                        </button>
                                                    </form>

                                                    <img src="{{ Storage::url($list->product->image) }}" style="mix-blend-mode: darken; width: 200px; height: auto"
                                                         alt="" class="mx-auto">
                                                    <div class="mt-3">
                                                        <p class="mb-3"><i data-lucide="star"
                                                                           class="inline-block text-yellow-500 align-middle size-4 ltr:mr-1 rtl:ml-1"></i> (4.8)</p>
                                                        <h5><a href="../client/home/detail/{{ $list->product->id }}/color/{{ $list->product->variant->first()->id }}">{{ $list->product->name }}</a></h5>

                                                        <div class="flex items-center gap-3 mt-3">
                                                            <h6 class="text-16 grow">${{ $list->product->variant->first()->price_sale }}</h6>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!--end grid-->
                                </div>
                                <!--end container-->
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
