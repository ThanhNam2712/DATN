@extends('client.layouts.master')

@section('title', 'Gửi lại Email Xác Minh')

@section('body')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-3xl p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-8 text-center">Gửi lại Email Xác Minh</h2>

        <form method="POST" action="{{ route('account.resendVerification') }}">
            @csrf
            <div class="mb-8">
                <label for="inputEmail" class="block text-sm font-medium text-gray-700">
                    Địa chỉ email <span class="text-red-500">*</span>
                </label>
                <input
                    type="email"
                    name="email"
                    id="inputEmail"
                    class="form-input w-full max-w-md border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-400"
                    required
                    placeholder="Nhập email của bạn"
                >
                @error('email')
                    <div class="mt-2 text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" style="background: rgba(59,130,246)" class="w-full py-2 btn bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-100">
                Gửi lại email xác minh
            </button>
        </form>
    </div>
</div>
@endsection
