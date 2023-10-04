<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);
        $statuses = Order::STATUSES;
        return view('admin.index', compact('orders', 'statuses'));
    }
}
