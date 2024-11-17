@extends('client.layouts.master')

@section('title', 'Quên mật khẩu')

@section('body')

    <div class=" mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold mb-6 text-center">Quên mật khẩu</h2>

        @if (session('status'))
            <div class="mb-4 text-green-500 font-medium text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="../client/reset/password">
            @csrf
            <div class="mb-8">
                <label for="inputEmail" class="block text-sm font-medium text-gray-700">
                    Địa chỉ email <span class="text-red-500">*</span>
                </label>
                <input
                    type="email"
                    name="email"
                    id="inputEmail"
                    class="form-input w-full border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                    required
                    placeholder="Nhập email của bạn"
                >
                @if(Session::has('message'))
                    <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500 dark:bg-zink-700 dark:border-custom-500">
                        <span class="font-bold">{{ session('message') }}</span>
                    </div>
                @endif
            </div>

            <button type="submit" class="w-full btn bg-custom-500 text-white hover:bg-custom-600 focus:ring focus:ring-custom-100 dark:ring-custom-400/20">
                Gửi email khôi phục
            </button>
        </form>
    </div>

@endsection
