<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Order;
use Illuminate\Http\Response;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\BillingDetail;
use URL;

class CheckoutController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth:api')->except('payment_confirm');
    }

    public function get_payment_list()
    {
    	$payments=DB::table('payments')->get();
    	return response()->json([
			      'payments'=>$payments,
			      'status' =>200
		    ],Response::HTTP_OK);
    }


    public function checkout(Request $request)
    {

        $order_number=rand(10000,99999);
        $carts=carts();
        $first_cart=first_cart();

        //inser Order table
        $order                  =new Order();
        $order->user_id         =auth()->user()->id;
        $order->quantity        =total_item();
        $order->amount          =total_price();
        $order->total_item_total=total_price();
        $order->sub_total       =sub_total();
        $order->tax             =tax();
        $order->shipping_charge =shipping_charge();
        $order->grand_total     =grand_total();
        $order->order_number    =$order_number;
        $order->order_note      =$request->note;
        $order->payment_id      =$request->payment_id;

        if ($request->has('transaction_number'))
        {
          $order->transaction_number=$request->transaction_number;
        }


        if ($first_cart->coupon_id!=null)
        {
            $order->coupon_id=$first_cart->coupon_id;
        }


        $order->save();

        foreach ($carts as $cart) {

          $order_detail                  =new OrderDetail();
          $order_detail->order_id        =$order->id;
          $order_detail->product_id      =$cart->product_id;
          $order_detail->user_id         =auth()->user()->id;
          $order_detail->product_quantity=$cart->quantity;
          $order_detail->save();

        }
       // insert data into billing details table
        $billing_detail                  =new BillingDetail();
        $billing_detail->user_id         =auth()->user()->id;
        $billing_detail->order_id        =$order->id;
        $billing_detail->customer_name   =$request->name;
        $billing_detail->customer_email  =$request->email;
        $billing_detail->customer_phone  =$request->phone;
        $billing_detail->customer_address=$request->address;
        $billing_detail->zip_code        =$request->zip_code;
        $billing_detail->city            =$request->city;;

        $billing_detail->save();

         foreach ($carts as $c)
         {
           $c->delete();
         }

        return response()->json([
            'message'=>"Order Placed successfully",
            'status' =>200
       ],Response::HTTP_OK);

    }


}
