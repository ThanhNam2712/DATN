<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>404 | StarCode & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="StarCode Kh" name="author"><!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/starcode2.css') }}">

</head>

<body class="flex items-center justify-center min-h-screen py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark font-public">

    <div  style="border: 1px solid red" class="mb-0 border-none shadow-none lg:w-[500px] card bg-white/70 dark:bg-zink-500/70">
        <div class="!px-10 !py-12 card-body">
            <h2 style="color: red" class="mb-2 text-purple-500">Tài khoản của bạn đã bị khóa!</h2>

            <div class="mt-10">
                <img src="https://www.pngall.com/wp-content/uploads/2016/06/6a00d83451b36c69e20168eaa60893970c-600wi.png" alt="" class="h-64 mx-auto">
            </div>
            <div class="mt-8 text-center">
                <p class="mb-6 text-slate-500 dark:text-zink-200">
                    {{-- Vì lý do: <span style="color: red;">{{ $block_reason }} --}}
                        </span> vui lòng liên hệ QTV qua "aeclothing@gmail.com"</p>
                <a href="
                {{ route('account.showFormLogin') }}
                 " class="text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                    <i data-lucide="home" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Back to Home</span>
                </a>
            </div>
        </div>
    </div>

    <script src='assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script src="assets/libs/%40popperjs/core/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/lucide/umd/lucide.js"></script>
    <script src="assets/js/starcode.bundle.js"></script>
</body>

</html>
