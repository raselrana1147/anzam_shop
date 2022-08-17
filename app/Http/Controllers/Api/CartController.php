<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


	public function __construct()
	{
	    $this->middleware('auth:api');
	}


    public function add_to_cart(Request $request)
    {
		$cart=Cart::where('product_id','=',$request->product_id)
		->where('user_id',auth()->user()->id)->first();
          if (is_null($cart)) {
          	$cart            =new Cart();
          	$cart->product_id=$request->product_id;
          	$cart->quantity  =$request->quantity;
          	$cart->user_id=auth()->user()->id;
          	$cart->save();
          }else
          {
          	$cart->increment('quantity');
          }
		      return response()->json([
			      'message'=>"Item added to cart",
			      'sub_total'=>sub_total(),
			      'total_item'=>total_item(),
			      'status' =>200
		    ],Response::HTTP_OK);
    }



    public function cart_list()
    {
        $carts=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('products.name as product_name','products.thumbnail as product_image',
        'products.current_price as product_price',
        'carts.id',
        'carts.quantity','carts.created_at','carts.updated_at')
        ->where('user_id',auth()->user()->id)
        ->get();

        return response()->json([
            'carts'=>$carts,
            'sub_total'=>sub_total(),
            'total_item'=>total_item(),
            'status' =>200
      ],Response::HTTP_OK);

    }


    public function cart_update(Request $request)
    {
        $cart=Cart::findOrFail($request->id);
        $cart->update(['quantity'=>$request->quantity]);

        return response()->json([
            'message'=>"Item update successfully",
            'sub_total'=>sub_total(),
            'total_item'=>total_item(),
            'status' =>200
      ],Response::HTTP_OK);

    }


    public function delete_cart(Request $request)
    {
        DB::table('carts')->delete($request->cart_id);

        return response()->json([
            'message'=>"Item removed successfully",
            'sub_total'=>sub_total(),
            'total_item'=>total_item(),
            'status' =>200
      ],Response::HTTP_OK);

    }


     protected function total_item()
     {
      	$cart_item=Cart::where('user_id',auth()->user()->id)->count();
        return $cart_item;
     }


     protected function total_price(){
     	$total_price=0;
        $new_price=0;

	  	 $carts=Cart::where('user_id',auth()->user()->id)->get();
	  	 foreach($carts as $cart)
	  	 {
		     if ($cart->product->flash_deal==0) {
		          $new_price=($cart->product->current_price-($cart->product->current_price*$cart->product->discount)/100);
		         $total_price+=$new_price*$cart->quantity;
		     }else{
		         $total_price+=$cart->product->current_price*$cart->quantity;
		     }
	  	 }
    	  return $total_price;
    }


    public function carts()
    {
   	  $carts=DB::table('carts')->where('user_id',auth()->user()->id)->get();
      return $carts;
    }


}
