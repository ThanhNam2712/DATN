<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\ShipmentOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckOrderConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-order-confirmation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Chạy ngay đi');
        $now = Carbon::now();
        $orders = Order::where('status', '=' ,'Giao Thành công')
                        ->where('confirmation_deadline', '<=', $now)
                        ->get();

        if ($orders->isEmpty()) {
            $this->info('khong có gì để cập nhật');
            return;
        }
        foreach ($orders as $order){
            $shipment = ShipmentOrder::where('order_id', $order->id)->first();

            if ($shipment && $shipment->shipments_5 != 'completed') {
                $order->status = 'completed';
                $shipment->shipments_5 = 'completed';
                $order->save();
                $shipment->save();
            }
        }
        $this->info('Vui Lòng Kiểm Tra trạng thái');
    }
}
