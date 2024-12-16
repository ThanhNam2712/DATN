@extends('admin.layouts.master')
@section('title', 'statistic')
@section('body')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
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
