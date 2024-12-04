@extends('client.layouts.master')

@section('title', 'Đặt lại mật khẩu')

@section('body')
<div class="flex items-center justify-center min-h-screen bg-gray-1000">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold mb-4 text-center">Đặt lại mật khẩu</h2>
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

            <button type="submit" class="w-full py-2 btn bg-custom-500 text-white rounded-lg hover:bg-custom-600 focus:ring focus:ring-custom-100">
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
@endsection
