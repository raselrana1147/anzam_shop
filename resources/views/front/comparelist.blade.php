@extends('layouts.app')
@section('title',config('constant.company_name').' Compare List')
@section('main')
	<div class="main-container container">
	    <ul class="breadcrumb">
	        <li><a href="#"><i class="fa fa-home"></i></a></li>
	        <li><a href="#">Product Comparison</a></li>
	        
	    </ul>
	    @if (total_comparelist()>0)
	    <div class="row">
	        <!--Middle Part Start-->
	        <div id="content" class="col-sm-12">
	            <h2 class="title">Product Comparison</h2>
	            <div class="table-responsive">
	                <table class="table table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <td colspan="4"><strong>Product Details</strong></td>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>Product</td>
	                            @foreach ($comparelists as $comparelist)
	                            	<td><a href="{{ route('product.detail',$comparelist->product->slug) }}">{{$comparelist->product->name}}</a></td>
	                            
	                            @endforeach
	                            
	                        </tr>
	                        <tr>
	                            <td>Image</td>
	                            @foreach ($comparelists as $comparelist)
	                               <td class="text-center"><img class="img-thumbnail" title="Laptop Silver black" alt="Laptop Silver black" width="100px" src="{{ asset('assets/backend/image/product/small/'.$comparelist->product->thumbnail) }}"></td>
	                            @endforeach
	                        </tr>
	                        <tr>
	                            <td>Price</td>
	                             @foreach ($comparelists as $comparelist)
	                            <td><div class="price"><span class="price-new">{{price_format($comparelist->product->current_price)}}</span> 
	                            	@if ($comparelist->product->previous_price>$comparelist->product->current_price)
	                            		<span class="price-old">{{price_format($comparelist->product->previous_price)}}</span> 
	                            	@endif
	                            	
	                            </div></td>
	                            @endforeach
	                        </tr>
	                        <tr>
	                            <td>Model</td>
	                            @foreach ($comparelists as $comparelist)
	                            <td>{{$comparelist->product->model}}</td>
	                            
	                             @endforeach
	                        </tr>
	                        <tr>
	                            <td>Brand</td>
	                            @foreach ($comparelists as $comparelist)
	                             <td>{{$comparelist->product->brand->brand_name}}</td>
	                             @endforeach
	                        </tr>
	                        <tr>
	                            <td>Availability</td>
	                            @foreach ($comparelists as $comparelist)
	                            <td>In Stock</td>
	                             @endforeach
	                        </tr>
	                        <tr>
	                            <td>Rating</td>
	                            @foreach ($comparelists as $comparelist)
	                            <td class="rating">
	                                <div class="rating-box">
	                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
	                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
	                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
	                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
	                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
	                                </div>
	                            Based on 0 reviews.</td>
	                            @endforeach
	                          
	                        </tr>
	                        <tr>
	                            <td>Summary</td>
	                            @foreach ($comparelists as $comparelist)
	                            <td class="description">{!!$comparelist->product->description!!}</td>
	                            @endforeach
	                        </tr>
	                        
	                        
	                    </tbody>
	                   
	                    <tbody>
	                       
	                        
	                        <tr>
	                            <td></td>
	                            @foreach ($comparelists as $comparelist)
	                            <td>
	                            	<input type="button"  product_id="{{$comparelist->product->id}}" data-action="{{ route('add_to_cart_single') }}" class="btn btn-primary btn-block add_to_cart_single" value="Add to Cart">

	                            <a href="{{ route('delete.comparelist',$comparelist->id) }}" class="btn btn-danger btn-block" >Remove</a>
	                        </td>
	                            
	                           
	                              @endforeach
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <!--Middle Part End -->
	        
	    </div>
	    @else
	    <h4 class="text-center">Empty Comparelist</h4>
	    @endif
	</div>
@endsection