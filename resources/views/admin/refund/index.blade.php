
@extends('admin.layouts.master')

@section('title')
@endsection
@section('body')
    <div class="container" style="padding:70px 40px">
        <h1>Danh sách đơn hàng cần hoàn</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Ngày tạo</th>
                    <th>Tổng tiền</th>
                    <th>lý do hoàn</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($refunds as $refunds)
                    <tr>
                        <td>{{ $refunds->id }}</td>
                        <td>{{ $refunds->name }}</td>
                        <td>{{ $refunds->created_at->format('d/m/Y') }}</td>
                        <td>{{ number_format($refunds->refund_amount, 0, ',', '.') }}đ</td>
                        <td>{{ $refunds->reason }}</td>
                        <td>{{ $refunds->status }}</td>
                      <td>  @if($refunds->status == 'pending')
                        <form action="{{ route('admin.refund.update', $refunds->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn btn-success">Duyệt</button>
                        </form>

                        <!-- Nút Từ chối -->
                        <form action="{{ route('admin.refund.update', $refunds->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger">Từ chối</button>
                        </form>
                    @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
