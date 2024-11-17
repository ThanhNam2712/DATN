@extends('client.master')
@section('Main')
    <div class="payment-container">
        <h1>Đơn hàng của bạn</h1>
        <!-- Phần trạng thái đơn hàng -->
        <div class="order-progress">
            <div class="step {{ $order->status >= 1 ? 'completed' : '' }}">
                <i class="fas fa-box"></i>
                <p>Đã đặt hàng</p>
            </div>
            <div class="step {{ $order->status >= 2 ? 'completed' : '' }}">
                <i class="fas fa-hourglass-half"></i>
                <p>Đang chờ đơn vị vận chuyển</p>
            </div>
            <div class="step {{ $order->status >= 3 ? 'completed' : '' }}">
                <i class="fas fa-truck"></i>
                <p>Đang vận chuyển</p>
            </div>
            <div class="step {{ $order->status == 4 ? 'completed' : '' }}">
                <i class="fas fa-check-circle"></i>
                <p>Đơn hàng đã được giao</p>
            </div>
        </div>

        <!-- Phần tóm tắt thanh toán -->
        <div class="payment-summary">
            <div class="payment-info">
                <div class="info-item">
                    <p class="label"><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                    <p class="label"><strong>Ngày:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                    <p class="label"><strong>Tổng cộng:</strong>${{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    <p class="label"><strong>Phương thức thanh toán:</strong>
                        {{ $order->payment_method == 'bank_transfer' ? 'Thanh toán chuyển khoản' : 'Thanh toán khi nhận hàng (COD)' }}
                    </p>
                </div>
            </div>
        </div>

        <p class="payment-note">Lưu ý: Hãy đợi nhân viên của chúng tôi gọi lại để xác nhận đơn hàng trong vòng 12 giờ.</p>

        <div class="chitiet">
            <h2>Chi tiết đơn hàng</h2>
            <table id="orderTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Người đặt</th>
                    <th>Tên sản phẩm</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thời gian đặt</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->orderDetail as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                           {{ $item->products->name }}
                        </td>
                        <td>${{ $order->total_amount }}</td>
                        <td>
                    <span class="status {{ $order->status == 'confirmed' ? 'confirmed' : 'pending' }}">
                        {{ $order->status == 'confirmed' ? 'Đã xác nhận' : 'Đang xử lý' }}
                    </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- Phần chi tiết đơn hàng -->


            <div class="additional-info">
                <p class="label">Tạm tính:</p>
                <p class="value">{{ number_format($order->total_amount, 0, ',', '.') }}đ</p>
            </div>
            <div class="additional-info">
                <p class="label">Giao nhận hàng:</p>
                <p class="value">Giao hàng miễn phí</p>
            </div>
            <div class="additional-info">
                <p class="label">Phương thức thanh toán:</p>
                <p class="value">{{ $order->payment_method == 'bank_transfer' ? 'Thanh toán chuyển khoản' : 'Thanh toán khi nhận hàng (COD)' }}</p>
            </div>
            <div class="total">
                <p class="label"><strong>Tổng cộng:</strong></p>
                <p class="value"><strong>{{ number_format($order->total_amount, 0, ',', '.') }}đ</strong></p>
            </div>

            <h2>Địa chỉ thanh toán</h2>
            <div class="payment-address">
                @foreach ($address as $item)
                    <p>Tỉnh/Thành phố: {{  $item->Province ?? '' }}</p>
                    <p>Neighborhood: {{ $item->Neighborhood ?? '' }}</p>
                    <p>Quận/Huyện: {{ $item->district ?? '' }}</p>
                    <p>Địa chỉ cụ thể: {{ $item->Apartment ?? '' }}</p>
                    <p>📞 {{$item->phone ?? 'Không có số điện thoại' }}</p>
                    <p>✉️ {{ $item->email ?? 'Không có email' }}</p>
                    <p>Số điện thoại người nhận hàng: {{ $item->phone ?? 'Không có số điện thoại' }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
