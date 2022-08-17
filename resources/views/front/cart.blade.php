@extends('layouts.app')
@section('title',config('constant.company_name').' View Cart')
@section('main')
			<div class="main-container container">
				<ul class="breadcrumb">
					<li><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ route('view.cart') }}">Shopping Cart</a></li>
				</ul>
				
				<div class="row">
					<!--Middle Part Start-->
		        <div id="content" class="col-sm-12 cart_section">
		        	@if (total_item()>0)
		        		
		          <h2 class="title">Shopping Cart</h2>
		            <div class="table-responsive form-group">
		              <table class="table table-bordered">
		                <thead>
		                  <tr>
		                    <td class="text-center">Image</td>
		                    <td class="text-left">Product Name</td>
		                    <td class="text-left">Quantity</td>
		                    <td class="text-right">Unit Price</td>
		                    <td class="text-right">Total</td>
		                  </tr>
		                </thead>
		                <tbody>
		                	@foreach (carts() as $cart)
		                  <tr class="cart_row{{$cart->id}}">
		                    <td class="text-center"><a href="product.html"><img width="70px" src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
		                    <td class="text-left"><a href="{{ route('product.detail',$cart->product->id) }}">{{$cart->product->name}}</a><br />
		                     </td>
		             
		                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">

		                        <input type="text" id="quantity{{$cart->id}}" value="{{$cart->quantity}}" class="form-control" />
		                        <span class="input-group-btn">
		                        <button type="button" data-toggle="tooltip" title="Update" class="btn btn-primary update_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}"><i class="fa fa-clone"></i></button>


		                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"><i class="fa fa-times-circle"></i></button>
		                        </span></div></td>

		                    <td class="text-right">{{price_format($cart->product->price())}}</td>
		                    <td class="text-right each_cart_price{{$cart->id}}">{{price_format($cart->product->price()*$cart->quantity)}}
		                    </td>
		                  </tr>
		                @endforeach
		                </tbody>
		              </table>
		            </div>
		         
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">Use Coupon Code 
									
									<i class="fa fa-caret-down"></i>
								</a>
							</h4>
						</div>
						<div id="collapse-coupon" class="panel-collapse collapse in" aria-expanded="true">
							<div class="panel-body">
								<label class="col-sm-2 control-label" for="input-coupon">Enter your coupon here</label>
								<div class="input-group">
									<input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
									<span class="input-group-btn"><input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary"></span>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="text-right">
										<strong>Sub-Total:</strong>
									</td>
									<td class="text-right sub_total">{{price_format(sub_total())}}</td>
								</tr>
								<tr>
									<td class="text-right">
										<strong>Flat Shipping Rate:</strong>
									</td>
									<td class="text-right">{{price_format(shipping_charge())}}</td>
								</tr>
								
								<tr>
									<td class="text-right">
										<strong>VAT (Flat):</strong>
									</td>
									<td class="text-right">{{price_format(tax())}}</td>
								</tr>
								<tr>
									<td class="text-right">
										<strong>Grand Total:</strong>
									</td>
									<td class="text-right grand_total">{{price_format(grand_total())}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				 <div class="buttons">
		            <div class="pull-left"><a href="{{ route('front.index') }}" class="btn btn-primary">Continue Shopping</a></div>
		            <div class="pull-right"><a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a></div>
		          </div>

		        </div>
		        @else
		        <h4 class="text-center">Empty Cart</h4>
		        @endif

		        <!--Middle Part End -->
					
				</div>
			</div>

@endsection