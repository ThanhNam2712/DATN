@extends('client.layouts.master')

@section('title', 'Đặt lại mật khẩu')

@section('body')
<div class="">
    <div class="card">
        <div class="card-body">
            <h2 class="text-lg font-semibold mb-4">Đặt lại mật khẩu</h2>
            <form method="POST" action="{{ route('account.password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="inputEmail" class="inline-block mb-2 text-base font-medium">Địa chỉ email <span class="text-red-500">*</span></label>
                    <input
                        type="email"
                        name="email"
                        id="inputEmail"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        required
                        value="{{ old('email') }}"
                        placeholder="Nhập email của bạn">
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
            </form>
        </div>
    </div>
</div>
@endsection
