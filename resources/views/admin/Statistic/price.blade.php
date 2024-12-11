@extends('admin.layouts.master')
@section('title', 'statistic')
@section('body')

<div class="container" style="padding: 80px 70px"  >
<div  class="flex flex-col gap-4 mb-4 md:mb-3 md:items-center ">
    <h6 class="grow text-15">Thống kê doanh thu theo tháng</h6>
    <canvas id="priceChart"></canvas>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
    // Chart.js - Biểu đồ doanh thu theo tháng
    var ctx = document.getElementById('priceChart').getContext('2d');
    var priceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7','Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11','Tháng 12'],
            datasets: @json($priceChart['datasets']),
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
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
