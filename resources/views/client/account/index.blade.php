@extends('client.layouts.master')

@section('title')
    Thông Tin Tài Khoản
@endsection
@section('Banner')
<section class="banner">
        @include('client.partials.banner')
    </section>
@endsection
@section('body')
<div class="container">
    <h2 class="mb-4 text-center">Thông Tin Tài Khoản</h2>

    <h6 class="info-title">Thông tin người dùng</h6>
    <p class="info-value"><strong>Tên:</strong> {{ $user->name }}</p>
    <p class="info-value"><strong>Email:</strong> {{ $user->email }}</p>
    <p class="info-value"><strong>Số điện thoại:</strong> {{ $user->sdt ?? 'Chưa có thông tin' }}</p>

    <h6 class="info-title">Địa chỉ của bạn</h6>
    <a href="{{ route('auth.address.create') }}" class="btn btn-primary">Thêm địa chỉ</a>
    @if($address->isEmpty())
        <p class="info-value">Chưa có địa chỉ.</p>
        <a href="{{ route('auth.address.create') }}" class="btn btn-primary">Thêm địa chỉ</a>

    @else
        @foreach($address as $address)
            <div class="info-value">
                <strong>Tỉnh/Thành phố:</strong> {{ $address->Province }}<br>
                <strong>Quận/Huyện:</strong> {{ $address->district }}<br>
                <strong>Xã/Phường:</strong> {{ $address->Neighborhood }}<br>
                <strong>Địa chỉ cụ thể:</strong> {{ $address->Apartment }}<br>

                <div class="mt-2">
                    <a href="{{ route('auth.address.edit', $address->id) }}" class="btn btn-warning">Sửa địa chỉ</a>
                    <form action="{{ route('auth.address.destroy', $address->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa địa chỉ này không?');">Xóa địa chỉ</button>
                    </form>
                </div>
                <hr>
            </div>
        @endforeach
    @endif

    <div class="mt-4 text-center">
        <a href="{{ route('auth.user.edit') }}" class="btn btn-primary">Sửa thông tin</a>
    </div>
</div>
@endsection
