<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function checkout(Request $request)
    {
        $order = new Order;

        $total = 15000 * $request->qty;

        $order->qty = $request->qty;
        $order->name = $request->name;
        $order->total_price = $total;
        $order->status = 'Unpaid';
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;

        // \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $order->name,
                'phone' => $order->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('checkout', compact('order', 'snapToken'));

    }

    public function callback(Request $request)
    {
        $serverkey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverkey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $order = Order::find($request->order_id);
                $order->status = 'Paid';
                $order->save();
            }
        }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
}