@extends('client.layouts.master')
@section('title', 'Home')
@section('body')
<style>
    .card-body {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    max-width: 100%;
    overflow: hidden;
}

.swiper-slide img {
    width: 100%;
    max-width: 1479px;
    height: auto;
    object-fit: cover;
}.card-body {
    padding: 0 15px;
}

.swiper {
    width: 100%;
    max-width: 1479px;
    height: 460px;
    margin: 0 auto;
}

</style>
{{-- brand controller --}}
<section class="relative pb-10 xl:pb-36 pt-44 xl:pt-52" id="home">
    <div class="absolute top-0 left-0 size-64 bg-custom-500 opacity-10 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 size-64 bg-purple-500/10 blur-3xl"></div>
    <div style="margin-top: -130px" class="card">
            <div class="card-body">
                <!-- Swiper -->
                <div class="swiper navigation-swiper" style="height: 460px">
                    <div class="swiper-wrapper">
                        @foreach($slides as $key => $list)
                            <div class="swiper-slide">
                                <img style="width: 1479px;" src="{{ Storage::url($list->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-slide">
                        <img src="../assets/images/pngtree-yellow-background-autumn-and-winter-new-product-promotion-poster-banner-men-image_900086.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="../assets/images/banner-thoi-trang.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-button-next after:hidden text-custom-500">
                    <i data-lucide="chevron-right"></i>
                </div>
                <div class="swiper-button-prev after:hidden text-custom-500">
                    <i data-lucide="chevron-left"></i>
                </div>
            </div>
        </div>
    </div>

</section>
<!--end -->
{{-- brand controller --}}
<section style="margin-top: -180px" class="relative py-24 xl:py-32" id="product">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="mx-auto text-center xl:max-w-3xl">
            <h1 class="mb-0 leading-normal capitalize">Sản Phẩm Nổi Bật</h1>
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
            @foreach($product->items() as $key => $list)
            <div class="p-5 rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900"
                data-aos="fade-up" data-aos-easing="linear">
                <form action="{{ route('client.wishlist.toggle', $list->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="favorite-btn">
                        <i class="{{ Auth::check() && Auth::user()->wishlists->contains('product_id', $list->id) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                    </button>
                </form>

                <img src="{{ Storage::url($list->image) }}" style="mix-blend-mode: darken; width: 200px; height: auto"
                    alt="" class="mx-auto">
                <div class="mt-3">
                    <p class="mb-3"><i data-lucide="star"
                            class="inline-block text-yellow-500 align-middle size-4 ltr:mr-1 rtl:ml-1"></i>{{ $list->category->name }}</p>
                    <h5><a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}">{{
                            $list->name }}</a></h5>

                    <div class="flex items-center gap-3 mt-3">
                        <h6 class="text-16 grow">{{ number_format($list->variant->first()->price_sale) }}VND</h6>
                        <div class="shrink-0">
                            <a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}"
                                class="px-2 py-1.5 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-->
            @endforeach
        </div>
        <nav aria-label="..." style="margin-top: 10px; float: inline-end;">
            <ul class="pagination pagination-sm">
                {{ $product->links() }}
            </ul>
        </nav>
    </div>
    <!--end container-->
</section>
<!--end -->

<section class="relative py-100 xl:py-100" id="features">
    <h1 class="mb-12 text-center text-3xl font-bold leading-normal capitalize" data-aos="fade-down">
        Khám Phá Các Sản Phẩm Nổi Bật Của Chúng Tôi
    </h1>
    <p class="mb-16 text-center text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-down" data-aos-delay="100">
        Khám phá những tính năng độc đáo của bộ sưu tập chủ lực, được thiết kế cho phong cách và hiệu suất tối ưu.
    </p>
    <div class="grid grid-cols-1 gap-4 mt-12 md:grid-cols-3 xl:grid-cols-3" style="margin-left: 70px">
        @foreach($viewProduct as $list)
        <div class="p-5 rounded-md bg-gradient-to-b from-slate-100 to-white dark:from-zinc-800 dark:to-zinc-900">
            <div class="" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ Storage::url($list->image) }}" alt="Sản phẩm 1" class="object-contain mb-4"
                    style="width: 300px; height: auto; align-items: center">
                <a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}"
                    class="text-xl font-bold mb-3">{{ $list->name }}</a>
                <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-300 mb-6">
                    <li>{{ $list->description }}</li>
                    <li>Category : {{ $list->category->name }}</li>
                    <li>Brand : {{ $list->brand->name }}</li>
                </ul>
                <a href="../client/home/detail/{{ $list->id }}/color/{{ $list->variant->first()->id }}"
                    class="text-custom-500 text-sm font-semibold">Mua Ngay <i data-lucide="move-right"
                        class="inline-block align-middle ml-1"></i></a>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="relative py-24 xl:py-32" id="about">
    <div class="absolute bottom-0 right-0 size-64 bg-custom-500/10 blur-3xl"></div>
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="grid items-center grid-cols-1 gap-6 mt-20 lg:grid-cols-12">
            <div class="relative lg:col-span-5">
                <div class="relative before:absolute before:h-full before:w-full before:border-[15px] before:border-double before:border-green-500/10 before:-top-16 lg:before:-right-16"
                    data-aos="zoom-out-up">
                    <img src="../assets/images/imgbottom.jpg" alt="" class="relative inline-block rounded-md"
                        data-aos="zoom-out-up" data-aos-delay="500">
                </div>
            </div>
            <!--end col-->
            <div class="ml-auto lg:col-span-5 lg:col-start-8">
                <p class="mb-2 text-purple-500 text-15" data-aos="fade-left" data-aos-delay="300">Giới thiệu về chúng tôi</p>
                <h1 class="mb-3 leading-normal capitalize" data-aos="fade-left" data-aos-delay="400">Chúng tôi cam kết</h1>
                <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">AE Boutique cam kết tạo ra các sản phẩm thời trang bền vững và độc đáo, thể hiện tinh thần sáng tạo của người Việt. Từng sản phẩm được thiết kế với sự tỉ mỉ để mang đến giá trị và phong cách riêng biệt cho khách hàng.</p>
                <p class="mb-5 text-lg text-slate-500 dark:text-zinc-400" data-aos="fade-left" data-aos-delay="500">
                    AE Boutique đi đầu trong thời trang bền vững. Bằng cách áp dụng các kỹ thuật tiết kiệm nước, sử dụng vật liệu tái chế và thúc đẩy các hoạt động lao động công bằng, chúng tôi hướng đến mục tiêu xây dựng một tương lai tốt đẹp hơn cho mọi người.</p>
                <button type="button"
                    class="px-8 py-3 text-white border-0 text-15 btn bg-gradient-to-r from-custom-500 to-purple-500 hover:text-white hover:from-purple-500 hover:to-custom-500"
                    data-aos="fade-left" data-aos-delay="600"> <a href="../client/shop/introduce/">Xem ngay<i data-lucide="move-right"
                        class="inline-block align-middle size-4 rtl:mr-1 ltr:ml-1"></i></a></button>
            </div>
            <!--end col-->
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
</section>
<!--end -->

<section class="relative py-24 xl:py-32" id="feedback">
    <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
        <div class="mx-auto mb-8 text-center xl:max-w-3xl">
            <h1 class="mb-0 leading-normal capitalize">Khách hàng nói gì về chúng tôi</h1>
        </div>
        <!-- Swiper -->
        <div class="pb-6 swiper feedback-slider">
            <div class="swiper-wrapper">
                @foreach($comment as $key => $list)
                <div class="swiper-slide">
                    <div class="p-5 text-center" data-aos="fade-up" data-aos-easing="linear">
                        <div class="mx-auto rounded-full size-20 bg-custom-500/10">
                            <img src="{{ $list->avatar ? Storage::url($list->avatar) : asset('assets/images/avatar-2.png') }}" alt="" class="rounded-full size-20">
                        </div>
                        <p class="mt-6 text-16">" {{ $list->comment }}. "</p>
                        <h6 class="mt-4 mb-1 text-15">{{ $list->user->name }}</h6>
                        <div class="text-yellow-500">
                            @for($i = 1; $i <= 5; $i++) @if($i <=$list->rating)
                                <i class="ri-star-fill"></i>
                                @endif
                                @endfor

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!--end container-->
</section>
<!--end -->


@endsection
