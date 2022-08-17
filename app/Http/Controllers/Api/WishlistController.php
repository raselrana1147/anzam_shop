<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{


    public function __construct()
	{
	    $this->middleware('auth:api');
	}


    public function add_to_wishlist(Request $request)
    {
        $data=DB::table('wishlists')->where(['user_id'=>auth()->user()->id,'product_id'=>$request->product_id])->first();
        if (is_null($data))
        {
            DB::table('wishlists')->insert([
                'product_id'=>$request->product_id,
                'user_id'=>auth()->user()->id
            ]);

            return response()->json([
                'message'=>"Successfully added to wishlist",
                'type'=>'success',
                'status' =>200
          ],Response::HTTP_OK);

        }else{
            return response()->json([
                'message'=>"Already added to wishlist",
                'type'=>'info',
                'status' =>200
          ],Response::HTTP_OK);
        }
    }


    public function wishlist_list()
    {
        $datas=DB::table('wishlists')
        ->join('products','wishlists.product_id','=','products.id')
        ->where('user_id',auth()->user()->id)
        ->select('wishlists.*','products.name as product_name','products.current_price as product_price',
        'products.thumbnail as product_image')
        ->orderBy('id','desc')->get();
        return response()->json([
            'message'=>$datas,
            'status' =>200
      ],Response::HTTP_OK);

    }


    public function delete_wishlist(Request $request)
    {
        DB::table('wishlists')->delete($request->id);

        return response()->json([
            'message'=>"Item removed successfully",
            'status' =>200
      ],Response::HTTP_OK);
    }



}
