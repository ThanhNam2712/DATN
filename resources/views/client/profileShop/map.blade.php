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
                        Địa Chỉ Cửa Hàng Chúng Tôi
                    </h1>
                    <p
                        class="text-lg mb-7 text-slate-500 dark:text-zinc-400"
                        data-aos="fade-right"
                        data-aos-delay="600"
                    >
                        Nằm Trên Đường Trịnh Văn Bô, Đối Diện Xuân Phương, Cổng 1 .
                    </p>
                </div>
                <div class="col-span-12 xl:col-span-7 2xl:col-start-8 2xl:col-span-6">
                    <div class="relative mt-10 xl:mt-0">
                        <div class="relative" data-aos="zoom-in" data-aos-delay="500">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7447.736175823848!2d105.7409125031963!3d21.037963500000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1733333480739!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
