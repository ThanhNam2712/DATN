@extends('client.layouts.master')
@section('title', 'Profile')
@section('body')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            display: flex;
            align-items: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section:nth-child(odd) .image {
            transform: rotate(-5deg);
        }

        .section:nth-child(even) .image {
            transform: rotate(5deg);
        }

        .section .image {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .section .image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .section .content {
            flex: 1;
            padding: 20px;
            z-index: 2;
            position: relative;
            transform: rotate(-3deg);
        }

        .section:nth-child(even) .content {
            transform: rotate(3deg);
            text-align: right;
        }

        .section h1 {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                text-align: center;
            }

            .section .image,
            .section .content {
                transform: none;
            }

            .section:nth-child(even) .content {
                text-align: center;
            }
        }
    </style>
    <section class="relative pb-28 xl:pb-36 pt-44 xl:pt-52" id="home">
        <div
            class="absolute top-0 left-0 size-64 bg-custom-500 opacity-10 blur-3xl"
        ></div>
        <div
            class="absolute bottom-0 right-0 size-64 bg-purple-500/10 blur-3xl"
        ></div>
        <div class="container 2xl:max-w-[87.5rem] px-4 mx-auto">
            <div class="grid items-center grid-cols-12 gap-5 2xl:grid-cols-12">
                <div class="col-span-12 xl:col-span-5 2xl:col-span-5">
                    <h1
                        class="mb-4 !leading-normal lg:text-5xl 2xl:text-6xl dark:text-zinc-100"
                        data-aos="fade-right"
                        data-aos-delay="300"
                    >
                        Giới thiệu về chúng tôi AE Boutique
                    </h1>
                    <p
                        class="text-lg mb-7 text-slate-500 dark:text-zinc-400"
                        data-aos="fade-right"
                        data-aos-delay="600"
                    >
                        AE Boutique là thương hiệu thời trang Việt Nam nổi bật, chuyên
                        mang đến các sản phẩm thời trang thiết kế cao cấp, đa dạng phong
                        cách và luôn cập nhật xu hướng mới nhất. Từ khi ra mắt, AE
                        Boutique đã nhanh chóng chiếm được lòng tin của khách hàng nhờ sự
                        kết hợp hoàn hảo giữa chất lượng, thiết kế tinh tế và dịch vụ tận
                        tâm.
                    </p>
                </div>
                <div class="col-span-12 xl:col-span-7 2xl:col-start-8 2xl:col-span-6">
                    <div class="relative mt-10 xl:mt-0">
                        <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                            <img
                                src="../assets/images/aeboutique.webp"
                                alt=""
                                class="mx-auto"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <!-- Section 1 -->
        <div class="section">
            <div class="content">
                <h1>Câu chuyện của chúng tôi</h1>
                <p>
                    Từ năm 2020, AE Boutique đã đổi mới và định nghĩa lại thời trang với
                    các sản phẩm denim mang tính biểu tượng của mình. AE Boutique không
                    chỉ là một thương hiệu; đó là biểu tượng toàn cầu của sự độc đáo và
                    chân thực.
                </p>
            </div>
            <div class="image">
                <img
                    src="../assets/images/img-10.png"
                    alt="AE Boutique History"
                />
            </div>
        </div>

        <!-- Section 2 -->
        <div class="section">
            <div class="image">
                <img
                    src="../assets/images/img-03.png"
                    alt="AE Boutique Mission"
                />
            </div>
            <div class="content">
                <h1>Sứ mệnh của chúng tôi</h1>
                <p>
                    AE Boutique cam kết tạo ra các sản phẩm thời trang bền vững và độc
                    đáo, thể hiện tinh thần sáng tạo của người Việt. Từng sản phẩm được
                    thiết kế với sự tỉ mỉ để mang đến giá trị và phong cách riêng biệt
                    cho khách hàng.
                </p>
            </div>
        </div>
        <div class="section">
            <div class="content">
                <h1>Tính bền vững</h1>
                <p>
                    AE Boutique đi đầu trong thời trang bền vững. Bằng cách áp dụng các
                    kỹ thuật tiết kiệm nước, sử dụng vật liệu tái chế và thúc đẩy các
                    hoạt động lao động công bằng, chúng tôi hướng đến mục tiêu xây dựng
                    một tương lai tốt đẹp hơn cho mọi người.
                </p>
            </div>
            <div class="image">
                <img
                    src="../assets/images/img-012.png"
                    alt="AE Boutique History"
                />
            </div>
        </div>
    </div>

@endsection
