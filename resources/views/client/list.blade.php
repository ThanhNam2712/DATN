@extends('client.master')
@section('Main')
<div class="text-bg-light">
    <h1>Danh sách đơn hàng</h1>
    <table id="orderTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người đặt</th>
                <th>Tên sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thời gian đặt</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>
                    @foreach ($order->Order_Items as $item)
                        {{ $item->product_variants->product->name }}<br>
                    @endforeach
                </td>
                <td>{{ $order->total_amount }}</td>
                <td>
                    <span class="status {{ $order->status == 'confirmed' ? 'confirmed' : 'pending' }}">
                        {{ $order->status == 'confirmed' ? 'Đã xác nhận' : 'Đang xử lý' }}
                    </span>
                </td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{route('admin.order.show',$order)}}" class="btn btn-primary">Xem chi tiết</a>
                    <a href="#" class="btn btn-danger">Hủy đơn hàng</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection