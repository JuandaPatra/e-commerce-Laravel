<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use SweetAlert;
use SweetAlert;


class StuffController extends Controller
{
    public function index()
    {
        $items = Stuff::all();
        // return dd($items);

        return view('home',[
            'items' => $items
        ] );
    }
    

    public function items($id)
    {
        $items = Stuff::find($id);
        // return $items;

        return view('detail',[
            'items' => $items
        ]);
    }

    public function order(Request $request, $id)
    {
        // return $request;
        $stuff = Stuff::where('id', $id)->first();
        $nowTimeDate = Carbon::now();

        //cek stok barang/stuff
        if($request->order_total > $stuff->stock)
        {
            return redirect('items/'.$id);
        }

        $order = new Order;

        $check_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // return $check_order;

        if(!$check_order)
        {
            //simpan pesanan ke tabel order
            $order->user_id = Auth::user()->id;
            $order->order_date = $nowTimeDate;
            // $order->total_price = $stuff->price*$request->order_total;
            $order->total_price = 0;
            $order->status = 0;
            $order->save();
        }


        //simpan pesanan detai ke tabel order_detail
        $new_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        

        //cek apakah barang yang dibeli sudah ada di order_detail
        $new_order_detail = Order_detail::where('stuff_id', $stuff->id)->where('order_id',$new_order->id)->first();
        
        $ord_det = new Order_detail ;
        if(!$new_order_detail)
        {
            $ord_det->stuff_id = $stuff->id;
            $ord_det->order_id = $new_order->id;
            $ord_det->total = $request->order_total;
            $ord_det->total_price = $stuff->price*$request->order_total;
            $ord_det->save();

        }
        else
        {
            $ord_det = Order_detail::where('stuff_id', $stuff->id)->where('order_id',$new_order->id)->first();
            $ord_det->total = $ord_det->total +$request->order_total;
            $ord_det->total_price = $ord_det->total_price+$stuff->price*$request->order_total;
            $ord_det->update();

        }

        $new_total_price = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $new_total_price->total_price =  $new_total_price->total_price+$stuff->price*$request->order_total;

        $new_total_price->update();
        

        // SweetAlert::success('Success Message', 'Optional Title');
        
        return redirect('/');

    }
}
