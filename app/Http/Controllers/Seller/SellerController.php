<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    
	public function __construct()
	{
	    $this->middleware('auth:seller');
	}


    public function index()
    {
    	return view('seller.index');
    }
}
