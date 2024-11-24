<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        $refunds = Refund::with('order', 'user')->get();
        return view('admin.refund.index', compact('refunds'));
    }

    public function show($id)
    {
        $refund = Refund::with('order', 'user')->findOrFail($id);
        return view('admin.refund.show', compact('refund'));
    }

    public function update(Request $request, $id)
    {
        // Tìm yêu cầu hoàn trả
        $refund = Refund::findOrFail($id);

        // Cập nhật trạng thái của yêu cầu
        $refund->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.refund.index')->with('success', 'Trạng thái yêu cầu hoàn trả đã được cập nhật.');
    }


}
