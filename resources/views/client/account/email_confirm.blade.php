@extends('client.layouts.master')

@section('title', 'Quên mật khẩu')

@section('body')
<div class="grid grid-cols-1 gap-x-5 xl:grid-cols-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-lg font-semibold mb-4">Quên mật khẩu</h2>
            @if (session('status'))
                <div class="mb-4 text-green-500 font-medium">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('account.password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="inline-block mb-2 text-base font-medium">Địa chỉ email <span class="text-red-500">*</span></label>
                    <input
                        type="email"
                        name="email"
                        id="inputEmail"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        required
                        placeholder="Nhập email của bạn">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                    Gửi email khôi phục
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
