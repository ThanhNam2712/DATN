<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShipmentOrder;
use Carbon\CarbonPeriod;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StatisticController extends Controller

{
    public function index(Request $request)
    {
        $filters = [
            'month' => $request->input('month'),
            'year' => $request->input('year')
        ];
        $order = $this->getOrderSuccess();
        $orderCancel = $this->getOrderCancel();
        $orderChart = $this->getOrderChart();
        $orderChartYear = $this->getOrderChartByYear();
        $orderPayments = $this->getOrdersPay();
        $orderUser = $this->getTopCustomer($filters);
        $orderProduct = $this->getProductTopSale($filters);
        $category = $this->getCategory();
        $categoryChart = $this->getCategoryChart();
        $countShipment = $this->countShipment();
        return view('admin.Statistic.index', compact('order', 'orderCancel',
            'orderChart', 'orderPayments','orderUser', 'orderProduct', 'category', 'categoryChart', 'orderChartYear', 'countShipment'));
    }

    public function chart(Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));
        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();

        $ordersSuccess = Order::selectRaw('DAY(created_at) as day, SUM(total_amount) as total')
            ->whereIn('status', ['completed', 'Giao Thành công'])
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        $ordersCancelled = Order::selectRaw('DAY(created_at) as day, SUM(total_amount) as total')
            ->where('status', 'cancelled')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        $labels = [];
        $dataChartSuccess = [];
        $dataChartCancelled = [];
        $daysInMonth = $startOfMonth->daysInMonth;

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $labels[] = $i;
            $dataChartSuccess[] = $ordersSuccess->get($i)->total ?? 0;
            $dataChartCancelled[] = $ordersCancelled->get($i)->total ?? 0;
        }

        $datasets = [
            [
                'label' => 'Số sản phẩm giao thành công',
                'data' => $dataChartSuccess,
                'backgroundColor' => '#36A2EB'
            ],
            [
                'label' => 'Số sản phẩm giao thất bại',
                'data' => $dataChartCancelled,
                'backgroundColor' => '#FF6384'
            ]
        ];

        return response()->json([
            'labels' => $labels,
            'datasets' => $datasets,
        ]);
    }

    public function chartYear(Request $request)
    {
        $year = $request->input('year', now()->year);
        $startOfYear = Carbon::create($year, 1, 1)->startOfYear();
        $endOfYear = Carbon::create($year, 12, 31)->endOfYear();

        $ordersSuccess = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereIn('status', ['completed', 'Giao Thành công'])
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $ordersCancelled = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->where('status', 'cancelled')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $labels = [];
        $dataChartSuccess = [];
        $dataChartCancelled = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create($year, $i, 1)->format('F'); // Tháng dưới dạng chữ
            $dataChartSuccess[] = $ordersSuccess->get($i)->total ?? 0;
            $dataChartCancelled[] = $ordersCancelled->get($i)->total ?? 0;
        }

        $datasets = [
            [
                'label' => 'Số sản phẩm thành công',
                'data' => $dataChartSuccess,
                'backgroundColor' => '#36A2EB'
            ],
            [
                'label' => 'Số sản phẩm giao thất bại',
                'data' => $dataChartCancelled,
                'backgroundColor' => '#FF6384'
            ]
        ];

        return response()->json([
            'labels' => $labels,
            'datasets' => $datasets,
        ]);
    }
    private function getOrderSuccess()
    {
        return Order::whereIn('status',['completed', 'Giao thành công'])->get();
    }

    private function getOrderCancel()
    {
        return Order::where('status', '=', 'cancelled')->get();
    }

    private function getOrderChart()
    {
        $ordersSuccess = Order::selectRaw('DAY(created_at) as day, SUM(total_amount) as total')
            ->whereIn('status', ['completed', 'Giao Thành công'])
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        $ordersCancelled = Order::selectRaw('DAY(created_at) as day, SUM(total_amount) as total')
            ->where('status', 'cancelled')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->keyBy('day');

        $labels = [];
        $dataChartSuccess = [];
        $dataChartCancelled = [];
        $color = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#009688', '#795548', '#FE9800', '#CDDC39', '#607D8B'];
        $daysInMonth = now()->daysInMonth;

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $labels[] = $i;
            $dataChartSuccess[] = $ordersSuccess->get($i)->total ?? 0;
            $dataChartCancelled[] = $ordersCancelled->get($i)->total ?? 0;
        }

        $datasets = [
            [
                'label' => 'Số sản phẩm giao thành công',
                'data' => $dataChartSuccess,
                'backgroundColor' => '#36A2EB'
            ],
            [
                'label' => 'Số sản phẩm giao thất bại',
                'data' => $dataChartCancelled,
                'backgroundColor' => '#FF6384'
            ]
        ];

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }

    private function getOrderChartByYear()
    {
        $ordersSuccess = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereIn('status', ['completed', 'Giao Thành công'])
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $ordersCancelled = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->where('status', 'cancelled')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $labels = [];
        $dataChartSuccess = [];
        $dataChartCancelled = [];
        $color = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#009688', '#795548', '#FE9800', '#CDDC39', '#607D8B'];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = "Tháng $i";
            $dataChartSuccess[] = $ordersSuccess->get($i)->total ?? 0;
            $dataChartCancelled[] = $ordersCancelled->get($i)->total ?? 0;
        }

        $datasets = [
            [
                'label' => 'Số sản phẩm giao thành công',
                'data' => $dataChartSuccess,
                'backgroundColor' => '#36A2EB'
            ],
            [
                'label' => 'Số sản phẩm giao thất bại',
                'data' => $dataChartCancelled,
                'backgroundColor' => '#FF6384'
            ]
        ];

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }


    private function getOrdersPay()
    {
        return Order::where('status', 'completed')->whereHas('paymentAll', function ($query){
            $query->whereIn('payment_method', ['Thanh Toán Khi Nhận Hàng', 'card']);
        })->paginate(5);
    }

    private function getTopCustomer(array $filters = [])
    {
        $query = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->selectRaw('users.id, users.name, users.avatar, users.email, SUM(orders.total_amount) as total_spent')
            ->whereIn('orders.status', ['completed', 'Giao Thành công']);

        if (!empty($filters['year'])) {
            $query->whereYear('orders.created_at', $filters['year']);
        }

        if (!empty($filters['month'])) {
            $query->whereMonth('orders.created_at', $filters['month']);
        }

        return $query->groupBy('users.id', 'users.name', 'users.avatar', 'users.email')
            ->orderBy('total_spent', 'desc')
            ->limit(4)
            ->get();
    }

    private function getProductTopSale(array $filters = [])
    {
        $query = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->selectRaw('order_items.product_id as productID,
                    MAX(products.name) as name,
                    MAX(product_colors.name) as color,
                    MAX(product_sizes.name) as size,
                    MAX(products.image) as image,
                    orders.status as status,
                    SUM(order_items.quantity) as quantity')
            ->leftJoin('orders', 'order_items.order_id', '=', 'orders.id')
            ->leftJoin('product_colors', 'order_items.color_id', '=', 'product_colors.id')
            ->leftJoin('product_sizes', 'order_items.size_id', '=', 'product_sizes.id')
            ->whereIn('orders.status', ['completed', 'Giao Thành công']);

        if (!empty($filters['year'])) {
            $query->whereYear('orders.created_at', $filters['year']);
        }

        if (!empty($filters['month'])) {
            $query->whereMonth('orders.created_at', $filters['month']);
        }

        return $query->groupBy('order_items.product_id', 'orders.status')
            ->orderByDesc('quantity')
            ->limit(4)
            ->get();
    }

    private function getCategory()
    {
        return Category::selectRaw('categories.id as id,
                                    categories.name as name,
                                    categories.image as img,
                                    COUNT(products.id) as countPro,
                                    MIN(product_variants.price) as minPrice,
                                    MAX(product_variants.price) as maxPrice,
                                    SUM(product_variants.price) as sumPrice')
                        ->leftJoin('products', 'categories.id', '=' , 'products.category_id')
                        ->leftJoin('product_variants', 'products.id', '=' , 'product_variants.product_id')
                        ->groupBy('categories.id', 'categories.name', 'categories.image')
                        ->orderByDesc('sumPrice')
                        ->get();

    }

    private function getCategoryChart()
    {
        $category = Category::selectRaw('categories.id as id,
                                        categories.name as nameC,
                                        COUNT(products.id) as countID')
                                        ->leftJoin('products', 'categories.id', '=', 'products.category_id')
                                        ->groupBy('categories.id', 'categories.name')
                                        ->orderBy('categories.id', 'asc')
                                        ->get();
        $labels = $category->pluck('nameC')->toArray();
        $dataChart = $category->pluck('countID')->toArray();
        $color = ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795548', '#009688', '#795548', '#FE9800', '#CDDC39', '#607D8B'];

        $datasets = [
            [
                'label' => "Count Products",
                'data' => $dataChart,
                'backgroundColor' => $color
            ],
        ];

        return [
            'labels' => $labels,
            'datasets' => $datasets,
        ];
    }

    private function countShipment()
    {
        return ShipmentOrder::where('shipments_5', 'completed')->count();
    }


    public function revenuePrice(Request $request)
    {
        // Lấy năm và tháng từ request, nếu không có thì dùng năm và tháng hiện tại
        $selectedYear = $request->get('year', now()->year);
        $selectedMonth = $request->get('month', now()->month);

        // Lấy dữ liệu thống kê doanh thu cho tháng và năm đã chọn
        $priceChart = $this->getPriceChartByMonth($selectedYear, $selectedMonth);

        return view('admin.Statistic.price', compact('priceChart', 'selectedYear', 'selectedMonth'));
    }

    public function getPriceChartByMonth($selectedYear)
{
    // Fetch the order statistics for the selected year
    $ordersSuccess = Order::selectRaw('YEAR(orders.created_at) as year, MONTH(orders.created_at) as month, SUM(orders.total_amount) as total')
        ->whereIn('orders.status', ['completed', 'Giao Thành công'])
        ->whereYear('orders.created_at', $selectedYear)
        ->groupBy('year', 'month')
        ->orderBy('month')
        ->get()
        ->keyBy(function ($item) {
            return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
        });

    $labels = [];
    $dataChartSuccess = [];
    $monthsInYear = range(1, 12);

    foreach ($monthsInYear as $month) {
        $label = Carbon::createFromFormat('m', $month)->format('F');
        $labels[] = $label;
        $dataChartSuccess[] = $ordersSuccess->get($selectedYear . '-' . str_pad($month, 2, '0', STR_PAD_LEFT))->total ?? 0;
    }

    $datasets = [
        [
            'label' => 'Doanh thu',
            'data' => $dataChartSuccess,
            'backgroundColor' => '#36A2EB'
        ]
    ];

    return [
        'labels' => $labels,
        'datasets' => $datasets,
    ];
}

}
