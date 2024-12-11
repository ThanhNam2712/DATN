@extends('admin.layouts.master')
@section('title', 'statistic')
@section('body')

<div class="container" style="padding: 80px 70px">
    <div class="flex flex-col gap-4 mb-4 md:mb-3 md:items-center">
        <h6 class="grow text-15">Thống kê doanh thu theo tháng</h6>
        <form method="GET" action="{{ route('admin.statistic.price') }}">
            <div class="row mb-7">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="year">Chọn năm:</label>
                        <select id="year" name="year" class="form-control">
                            @foreach(range(2015, now()->year) as $year)
                                <option value="{{ $year }}" {{ request('year', now()->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="month">Chọn tháng:</label>
                        <select id="month" name="month" class="form-control">
                            <option value="">Tất cả các tháng</option>
                            @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                    Tháng {{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button style="background-color: green; color:white" type="submit" class="btn btn-primary">Tìm kiếm</button>
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
            labels: @json($priceChart['labels']),
            datasets: @json($priceChart['datasets']),
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Doanh thu theo {{ $selectedMonth ? 'ngày' : 'tháng' }}',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.raw + ' VND';
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: '{{ $selectedMonth ? 'Ngày' : 'Tháng' }}'
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
