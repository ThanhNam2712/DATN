@extends('client.layouts.master')
@section('title', 'Cart')
@section('body')
<br><br><br><br> <br> <br> <br>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 bg-white p-4 border rounded shadow-lg">
        <h2 class="text-center mb-4 text-primary">Yêu cầu hoàn trả cho đơn hàng #{{ $order->id }}</h2>

        <form action="{{ route('client.refund.store', $order->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="reason" class="font-weight-bold">Lý do yêu cầu hoàn trả:</label>
                <textarea id="reason"  style="border: 1px solid red" name="reason" class="form-control" rows="4" required></textarea>

                @error('reason')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button style="border: 1px solid red" type="submit" class="btn btn-warning btn-block mt-4">Gửi yêu cầu hoàn trả</button>
        </form>
    </div>
</div>
@endsection
