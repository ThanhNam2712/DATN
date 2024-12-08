@extends('client.layouts.master')

@section('title', 'Đặt lại mật khẩu')

@section('body')

        <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
                <div class="card">
                    <div class="card-body">
                <h2 class="text-lg font-semibold mb-4">Đặt lại mật khẩu</h2>
                <form method="POST" action="../client/reset/resetPass/{{ $user->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="inline-block mb-2 text-base font-medium">Địa chỉ email <span class="text-red-500">*</span></label>
                        <input
                            type="email"
                            name="email"
                            id="inputEmail"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            required
                            value="{{ $user->email }}"
                            placeholder="Nhập email của bạn" disabled>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block mb-2 text-base font-medium">Mật khẩu mới <span class="text-red-500">*</span></label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            required
                            placeholder="Nhập mật khẩu mới">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="inline-block mb-2 text-base font-medium">Xác nhận mật khẩu <span class="text-red-500">*</span></label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            required
                            placeholder="Nhập lại mật khẩu mới">
                    </div>

                    <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        Đặt lại mật khẩu
                    </button>
                    @if(Session::has('message'))
                        <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                            <span class="font-bold">{{ session('message') }}</span>
                        </div>
                    @endif
                </form>

            </div>
                </div>
        </div>

@endsection
