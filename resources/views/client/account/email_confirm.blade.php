@extends('client.layouts.master')

@section('title', 'Quên mật khẩu')

@section('body')
<div class="flex items-center justify-center min-h-screen bg-gray-1000">
    <div class="w-full max-w-3xl p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-8 text-center">Quên mật khẩu</h2>
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
                    class="form-input w-full max-w-md border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-custom-500 focus:border-custom-500 placeholder:text-gray-400"
                    required
                    placeholder="Nhập email của bạn"
                >
                @if(Session::has('message'))
                    <div class="mb-3 px-4 py-3 text-sm bg-white border rounded-md border-custom-300 text-custom-500">
                        <span class="font-bold">{{ session('message') }}</span>
                    </div>
                @endif
            </div>

            <button type="submit" class="w-full py-2 btn bg-custom-500 text-white rounded-lg hover:bg-custom-600 focus:ring focus:ring-custom-100">
                Gửi email khôi phục
            </button>
        </form>
    </div>
</div>
@endsection
