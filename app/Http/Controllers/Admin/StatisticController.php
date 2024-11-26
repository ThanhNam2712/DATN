<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $order = $this->getOrderSuccess();
        $orderCancel = $this->getOrderCancel();
        $orderChart = $this->getOrderChart();
        $orderPayments = $this->getOrdersPay();
        $orderUser = $this->getTopCustomer();
        $orderProduct = $this->getProductTopSale();
        $category = $this->getCategory();
        $categoryChart = $this->getCategoryChart();
        return view('admin.Statistic.index', compact('order', 'orderCancel',
            'orderChart', 'orderPayments', 'orderUser', 'orderProduct', 'category', 'categoryChart'));
    }

    private function getOrderSuccess()
    {
        return Order::where('status', '=', 'completed')->get();
    }

    private function getOrderCancel()
    {
        return Order::where('status', '=', 'cancelled')->get();
    }

    private function getOrderChart()
    {
        $ordersSuccess = Order::selectRaw('DAY(created_at) as day, SUM(total_amount) as total')
            ->where('status', 'completed')
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
                'label' => 'Total Revenue',
                'data' => $dataChartSuccess,
                'backgroundColor' => '#36A2EB'
            ],
            [
                'label' => 'Total Revenue Cancel',
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

    private function getTopCustomer()
    {
        return Order::join('users', 'orders.user_id', '=' , 'users.id')
                    ->selectRaw('users.id, users.name, users.avatar, users.email ,SUM(orders.total_amount) as total_spent')
                    ->whereIn('orders.status', ['completed', 'Giao Thành công'])
                    ->groupBy('users.id', 'users.name', 'users.avatar', 'users.email')
                    ->orderBy('total_spent', 'desc')
                    ->limit(4)
                    ->get();
    }

    private function getProductTopSale()
    {
        return OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
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
                        ->whereIn('orders.status', ['completed', 'Giao Thành công'])
                        ->groupBy('order_items.product_id', 'orders.status')
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
}
