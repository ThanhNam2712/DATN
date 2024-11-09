@extends('client.master')
@section('Main')
<!-- Main Content -->
<div class="payment-container">
    <h1>Đơn hàng của bạn</h1>
    <!-- phần trạng thái đơn hàng -->
    <div class="order-progress">
        <div class="step completed">
            <i class="fas fa-box"></i>
            <p>Đã đặt hàng</p>
        </div>
        <div class="step completed">
            <i class="fas fa-hourglass-half"></i>
            <p>Đang chờ đơn vị vận chuyển</p>
        </div>
        <div class="step">
            <i class="fas fa-truck"></i>
            <p>Đang vận chuyển</p>
        </div>
        <div class="step">
            <i class="fas fa-check-circle"></i>
            <p>Đơn hàng đã được giao</p>
        </div>
    </div>
    

    <div class="payment-container">
        <!-- Phần tóm tắt thanh toán -->
        <div class="payment-summary">
            <div class="payment-info">
                <div class="info-item">
                    <p class="label"><strong>Mã đơn hàng:</strong> 32780</p>
                    <p class="label"><strong>Ngày:</strong> 05/11/2024</p>
                    <p class="label"><strong>Tổng cộng:</strong> 1,800,000đ</p>
                    <p class="label"><strong>Phương thức thanh toán:</strong> Thanh toán chuyển khoản</p>
                </div>
            </div>
        </div>
    
        <p class="payment-note">Lưu ý: Hãy đợi nhân viên của chúng tôi gọi lại cho bạn để xác nhận đơn hàng trong vòng 12 tiếng.</p>
    <div class="chitiet">

        <h2>Chi tiết đơn hàng</h2>
        <!-- Phần chi tiết đơn hàng -->
        <div class="product-details">
            <a href="#" class="name">Áo Khoác LV Đen Logo Đen Nổi Cổ Bé Likeauth - 1 x1</a>
            <p class="value">1,800,000đ</p>
        </div>
        
    
        <div class="additional-info">
            <p class="label">Tạm tính:</p>
            <p class="value">1,800,000đ</p>
        </div>
        <div class="additional-info">
            <p class="label">Giao nhận hàng:</p>
            <p class="value">Giao hàng miễn phí</p>
        </div>
        <div class="additional-info">
            <p class="label">Phương thức thanh toán:</p>
            <p class="value">Trả tiền mặt khi nhận hàng (COD)</p>
        </div>
        <div class="total">
            <p class="label"><strong>Tổng cộng:</p>
            <p class="value"><strong>1,800,000đ</p>
        </div>
    
        <h2>Địa chỉ thanh toán</h2>
        <div class="payment-address">
            <p>sadasd</p>
            <p>Thượng Cốc - Phúc Thọ - Hà Nội</p>
            <p>Xã Hoàng Văn Thụ</p>
            <p>Huyện Chương Mỹ</p>
            <p>Hà Nội</p>
            <p>📞 0456789123</p>
            <p>✉️ dasd@gmail.com</p>
            <p>Số điện thoại người nhận hàng: 0456789123</p>
        </div>
    </div>
    </div>
    
    
</div>
@endsection