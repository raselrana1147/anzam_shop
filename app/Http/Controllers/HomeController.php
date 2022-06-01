<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Stock;
use Illuminate\Http\Response;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function index()
    {



      $featureds   =Product::where(['featured'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $best_sales  =Product::where(['best_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $trendings   =Product::where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $new_arrivals=Product::where(['new_arrival'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $top_sales  =Product::where(['top_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $hot_sales  =Product::where(['hot'=>0,'sale_type'=>'retail','flash_deal'=>1])
      ->orderByDesc('id')->take(10)->get();
      $flash_deals =Product::where(['flash_deal'=>0])->orderBy('updated_at','DESC')->take(10)->get();

      $sliders=DB::table('sliders')->orderBy('id','desc')->get();
       $best_sales1  =Product::where(['best_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderByDesc('id')->take(4)->get();

        $best_sales2  =Product::where(['best_sale'=>0,'sale_type'=>'retail','flash_deal'=>1])
       ->orderByDesc('id')->skip(4)->take(4)->get();
      
      return view('index',compact('featureds','best_sales','trendings','new_arrivals','top_sales','flash_deals','sliders','hot_sales','best_sales1','best_sales2'));
      
    }



    public function subcategory_product($id)
    {

      $products=Product::where(['sub_category_id'=>$id,'sale_type'=>'retail','flash_deal'=>1])
      ->orderBy('id','DESC')->paginate(10);
      $sub_cat=SubCategory::findOrFail($id);
      return view('front.sub_category',compact('products','sub_cat'));
    }

    public function product_detail($slug)
    {
    	  $product=Product::where('slug',$slug)->first();
        $releted_products=Product::where("category_id",$product->category_id)->get();
        $recommendeds=Product::all()->where('sale_type','!=','whole')->random(8);
        $new_products=DB::table('products')->orderBy('id','DESC')->take(3)->get();
    	 return view('front.product_detail',compact('product','releted_products','recommendeds','new_products'));

    }


    public function category_product($id)
    {
         $products=Product::where('category_id','=',$id)->latest()->paginate(10);
         $category=Category::findOrFail($id);
         return view('front.category_product',compact("products","category"));
    }

    

    public function brand_wise_product($id)
    {
         $products=Product::where(['brand_id'=>$id,'sale_type'=>'retail','flash_deal'=>1])
         ->orderBy('id','DESC')->paginate(12);
         $brand=Brand::findOrFail($id);
         return view('front.brand_product',compact('products','brand'));
    }

  public function search(Request $request)
    {


        if ($request->isMethod('post')){
           
          if (!empty($request->keyword) && empty($request->category_id)) {
              $products=Product::where('name',"LIKE","%$request->keyword%")->paginate(12);

          }elseif (empty($request->keyword) && !empty($request->category_id)) {
              $products=Product::where('category_id',$request->category_id)->paginate(12);

          }elseif (!empty($request->keyword) && !empty($request->category_id)) {

              $products=Product::where('category_id',$request->category_id)
              ->Orwhere('name',"LIKE","%$request->keyword%")
              ->paginate(12);

          }else{
             $products=Product::latest()->paginate(12);;
         }

         return view('front.search',compact("products"));
       }
       else{
            
            return redirect()->route('front.index');
        }
    }



    public function search_by_price(Request $request)
    {
        
     
      if ($request->isMethod('post')){
      $min_price=$request->min_price;
      $max_price=$request->max_price;

       $products=Product::
       where('current_price', '>=', $min_price)
       ->where('current_price', '<=', $max_price) 
       ->paginate(8);;
      

       $categories=Category::orderBy('id','DESC')->get();
       $brands=DB::table('brands')->orderBy("id","DESC")->get();      
      return view('front.search_by_price',compact("products","categories","brands"));
    }else{
          return redirect()->route('front.index');  
      }
    }
    
    
    public function api_callback()
    {

       return view('front.callback');
    }


    public function about_us()
    {
       return view('about');
    }

    public function contact_us()
    {
       return view('contact');
    }

    public function privacy_policy()
    {
        $trendings =Product::where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderByDesc('id')->take(3)->get();
       return view('privacy',compact('trendings'));
    }

    public function guide()
    {
        $trendings =Product::where(['trending'=>0,'sale_type'=>'retail','flash_deal'=>1])
        ->orderByDesc('id')->take(3)->get();
       return view('guide',compact('trendings'));
    }
}
