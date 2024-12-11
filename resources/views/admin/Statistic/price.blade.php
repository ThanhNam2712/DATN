@extends('admin.layouts.master')
@section('title', 'statistic')
@section('body')

<div class="container" style="padding: 80px 70px">
    <div class="flex flex-col gap-4 mb-4 md:mb-3 md:items-center">
        <h6 class="grow text-15">Thống kê doanh thu theo tháng</h6>

        <!-- Form chọn năm (nếu cần) -->
        <form method="GET" action="{{ route('admin.statistic.price') }}">
            <div class="form-group">
                <label for="year">Chọn năm:</label>
                <select id="year" name="year" class="form-control">
                    @foreach(range(2015, now()->year) as $year)
                        <option value="{{ $year }}" {{ request('year', now()->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Xem thống kê</button>
        </form>

        <canvas id="priceChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
    var ctx = document.getElementById('priceChart').getContext('2d');
    var priceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: @json($priceChart['datasets']),
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Doanh thu theo tháng',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.raw + ' VND'; // Hiển thị tooltip với đơn vị VND
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tháng'
                    },
                    beginAtZero: true
                },
                y: {
                    title: {
                        display: true,
                        text: 'Doanh thu (VND)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
