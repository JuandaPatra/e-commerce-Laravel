<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Stuff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $order =  Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(empty(Auth::user()->id) || empty($order->id))
        {
            return redirect('/');
            
        }
        $find = Order_detail::where('order_id', $order->id)->get();
        return view('cart', compact('find', 'order'));
    }

    public function delete($id)
    {
        $pesanan = Order_detail::where('id', $id)->first();
        // return $pesanan;

        $order = Order::where('id', $pesanan->order_id)->first();
        $order->total_price = $order->total_price-$pesanan->total_price;
        $order->update();

        $pesanan->delete();

        $order =  Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $find = Order_detail::where('order_id', $order->id)->get();
        return view('cart', compact('find', 'order'));
    }

    public function konfirmasi()
    {
        $order =  Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->phone_number) || empty($user->address))
        {
            return redirect('/');
        }

        $order->status = 1;
        $orderid = $order->id;
        $order->update();

        $order_detail = Order_detail::where('order_id', $orderid)->get();

        foreach($order_detail as $order_item){
            $stuff_edit = Stuff::where('id', $order_item->stuff_id)->first();
            $stuff_edit->stock = $stuff_edit->stock-$order_item->total;
            $stuff_edit->update(); 
        }

        return redirect('/');
        
    }
}
