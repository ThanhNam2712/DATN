@extends('admin.layouts.master')

@section('title')
    Thông Tin Tài Khoản
@endsection

@section('body')
<style>
    /* Thông tin tài khoản */
.container {
    max-width: 800px; /* Chiều rộng tối đa của khung chứa */
    margin: 0 auto; /* Căn giữa khung chứa */
    padding: 20px; /* Đệm cho khung chứa */
    background-color: #f8f9fa; /* Màu nền */
    border-radius: 10px; /* Bo tròn các góc */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho khung chứa */
}

h2 {
    color: #333; /* Màu chữ cho tiêu đề */
    margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
}

.info-title {
    font-weight: bold; /* Chữ đậm cho tiêu đề thông tin */
    margin-top: 20px; /* Khoảng cách trên tiêu đề thông tin */
    color: #007bff; /* Màu chữ cho tiêu đề thông tin */
}

.info-value {
    margin-bottom: 10px; /* Khoảng cách dưới mỗi giá trị thông tin */
    font-size: 16px; /* Kích thước chữ cho giá trị thông tin */
}

.btn {
    margin-top: 10px; /* Khoảng cách trên nút */
}

.btn-primary {
    background-color: #007bff; /* Màu nền cho nút chính */
    border-color: #007bff; /* Màu biên cho nút chính */
}

.btn-warning {
    background-color: #ffc107; /* Màu nền cho nút sửa */
    border-color: #ffc107; /* Màu biên cho nút sửa */
}

.btn-danger {
    background-color: #dc3545; /* Màu nền cho nút xóa */
    border-color: #dc3545; /* Màu biên cho nút xóa */
}

hr {
    border-top: 1px solid #e0e0e0; /* Màu cho đường phân cách */
}

form {
    margin-top: 20px; /* Khoảng cách trên form */
}

input[type="text"],
input[type="email"],
input[type="number"] {
    width: 100%; /* Chiều rộng đầy đủ */
    padding: 10px; /* Đệm cho ô nhập liệu */
    margin-bottom: 10px; /* Khoảng cách dưới ô nhập liệu */
    border: 1px solid #ccc; /* Màu biên cho ô nhập liệu */
    border-radius: 5px; /* Bo tròn các góc cho ô nhập liệu */
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus {
    border-color: #007bff; /* Màu biên khi ô nhập liệu được chọn */
    outline: none; /* Ẩn viền khi ô nhập liệu được chọn */
}

</style>
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
