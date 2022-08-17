@extends('layouts.app')
@section('title',config('constant.company_name').' Checkout')

@section('main')
		<div class="main-container container">
			<ul class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i></a></li>
				<li><a href="#">Checkout</a></li>
				
			</ul>
			
			<div class="row">
				<!--Middle Part Start-->
				 <form action="{{ route('submit.checkout') }}" method="post">
		               @csrf
				<div id="content" class="col-sm-12 cart_section">
					@if (total_item()>0)
				  <h2 class="title">Checkout</h2>
				  <div class="so-onepagecheckout row">
					<div class="col-left col-sm-3">
					  
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
						</div>
						  <div class="panel-body">
								<fieldset id="account">
								  <div class="form-group required">
									<label for="input-payment-firstname" class="control-label">Name</label>
									<input type="text" class="form-control" required="" value="{{Auth::user()->name}}" name="name">
								  </div>
								 
								  <div class="form-group required">
									<label for="input-payment-email" class="control-label">E-Mail</label>
									<input type="text" class="form-control" required="" value="{{Auth::user()->email}}" name="email">
								  </div>
								  <div class="form-group required">
									<label for="input-payment-telephone" class="control-label">Phone</label>
									<input type="text" class="form-control" required="" value="{{Auth::user()->phone}}" name="phone">
								  </div>
								  <div class="form-group">
									<label for="input-payment-fax" class="control-label">Address</label>
									<input type="text" required="" class="form-control" value="{{Auth::user()->address}}" name="address">
								  </div>
								  <div class="form-group">
									<label for="input-payment-fax" class="control-label">Zip Codes</label>
									<input type="text" required="" class="form-control" value="{{Auth::user()->zip_code}}" name="zip_code">
								  </div>

								  <div class="form-group">
									<label for="input-payment-fax" class="control-label">City</label>
	                               <select name="city" required="" class="form-control">
	                               		<option value="">--Select options--</option>
   									   	<option value="Dhaka">Dhaka</option>
   									   	<option value="Mymensing">Mymensing</option>
   									   	<option value="Rajshahi">Rajshahi</option>
   									   	<option value="Rangpur">Rangpur</option>
   									   	<option value="Barishal">Barishal</option>
   									   	<option value="Khulna">Khulna</option>
   									   	<option value="Chittagong">Chittagong</option>
   									   	<option value="Sylhet">Sylhet</option>
	                               </select>
								  </div>
								</fieldset>
							  </div>
					  </div>
					 
					</div>
					<div class="col-right col-sm-9">
					  <div class="row">
						<div class="col-sm-12">
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon?</h4>
							</div>
							  <div class="panel-body row">
								<div class="col-sm-6 ">
								<div class="input-group">
								  <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
								  <span class="input-group-btn">
								  <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
								  </span></div>
								</div>
							  </div>
						  </div>
						</div>
						
						<div class="col-sm-12">
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
							</div>
							  <div class="panel-body">
								<div class="table-responsive">
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
											{{-- expr --}}
										
									  <tr class="cart_row{{$cart->id}}">
										<td class="text-center">
											<a href="{{ route('product.detail',$cart->product->slug) }}">
											<img width="60px" src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail) }}" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail"></a></td>
										<td class="text-left"><a href="{{ route('product.detail',$cart->product->slug) }}">{{$cart->product->name}}</a></td>
										<td class="text-left"><div class="input-group btn-block" style="min-width: 100px;">
											<input type="text" id="quantity{{$cart->id}}" value="{{$cart->quantity}}" class="form-control" >
											<span class="input-group-btn">
											<button type="button" data-toggle="tooltip" title="Update" class="btn btn-primary update_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.update') }}"><i class="fa fa-refresh"></i></button>

											<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger delete_cart" cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}"><i class="fa fa-times-circle"></i></button>
											</span></div></td>
										<td class="text-right">{{price_format($cart->product->current_price)}}</td>
										<td class="text-right">{{price_format($cart->product->current_price*$cart->quantity)}}</td>
									  </tr>
									  @endforeach
									</tbody>
									<tfoot>
									  <tr>
										<td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
										<td class="text-right sub_total">{{price_format(sub_total())}}</td>
									  </tr>
									  <tr>
										<td class="text-right" colspan="4"><strong>Flat Shipping:</strong></td>
										<td class="text-right">{{price_format(shipping_charge())}}</td>
									  </tr>
									 
									  <tr>
										<td class="text-right" colspan="4"><strong>VAT:</strong></td>
										<td class="text-right">{{price_format(tax())}}</td>
									  </tr>
									  <tr>
										<td class="text-right" colspan="4"><strong>Grand Total:</strong></td>
										<td class="text-right grand_total">{{price_format(grand_total())}}</td>
									  </tr>
									</tfoot>
								  </table>
								</div>
							  </div>
						  </div>
						</div>

						<div class="col-sm-12">
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title"><i class="fa fa-pencil"></i>Payment Detail</h4>
							</div>
							  <div class="panel-body">
							  	@foreach ($payments as $payment)

							  	  <input type="radio" class="select_payment" name="payment_id" value="{{$payment->id}}"  {{($payment->account_number==NULL) ? 'checked' : ''}} account_number="{{$payment->account_number}}" image_name="{{$payment->image}}" account_type="{{$payment->type}}" ref_num="{{$payment->ref_number}}">
							  	       {{$payment->payment_name}}
							  	 @endforeach

						  	 		<p id="payment_area" style="display: none">
						  	 		    <label>Transaction Number</label>      
						  	          
						  	             <input type="text" class="form-control" name="transaction_number" id="transaction_number" /> 

						  	             <img src="" class="set_image" style="width: 40px;height: 40px;position: absolute;"><br>
						  	 		</p>

							  </div>
						  </div>
						</div>


						<div class="col-sm-12">
						  <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
							</div>
							  <div class="panel-body">
								<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
								<br>
								<label class="control-label" for="confirm_agree">
								  <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
								  <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
								<div class="buttons">
								  <div class="pull-right">
									<input type="submit" class="btn btn-primary" id="button-confirm" value="Confirm Order">
								  </div>
								</div>
							  </div>
						  </div>
						</div>


					  </div>
					</div>
				  </div>
				  @else
				  <h4 class="text-center"><a href="{{ route('front.index') }}">Please select product to continue checkout</a></h4>
				  @endif
				</div>
				<!--Middle Part End -->
				</form>
			</div>
		</div>
@endsection

@section('ecommerce_js')

<script>
    $(document).ready(function(){
        $('body').on('click','.select_payment',function(){
            let payment_id=$(this).val();
            let account_number=$(this).attr('account_number');
            let type=$(this).attr('account_type');
            let ref_num=$(this).attr('ref_num');

            if (account_number=="") {
                $('#account_number').text();
                $('#payment_area, #accountt_area').hide();
                $('#transaction_number').removeAttr('required');
            }else{
                $('.set_number').text(account_number+' ( '+type+' ) '+' Referal Number '+ref_num);
                $('#payment_area, #accountt_area').show();
                $('#transaction_number').attr('required', 'true');
                let image=$(this).attr('image_name')
                $('.set_image').attr('src', '{{ asset('assets/backend/image/payment/small/') }}'+'/'+image);
            }
        });

      
    });
</script>
@endsection
