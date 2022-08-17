@extends('layouts.app')
@section('title',config('constant.company_name').'Product Wishlist')
@section('main')
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
			<li><a href="{{ route('wishlist') }}">My Wish List</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			
			
			<div id="content" class="col-sm-9 wishlist_section">
				@if (total_wishlist()>0)
		
				<h2 class="title">My Wish List</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-right">Stock</td>
								<td class="text-right">Unit Price</td>
								<td class="text-right">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($wishlists as $wishlist)
								
							<tr class="wishlist_row{{$wishlist->id}}">
								<td class="text-center">
									<a  href="product.html"><img width="70px" src="{{ asset('assets/backend/image/product/small/'.$wishlist->product->thumbnail) }}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
									</a>
								</td>
								<td class="text-left"><a href="product.html">{{$wishlist->product->name}}</a>
								</td>
								
								<td class="text-right">In Stock</td>
								<td class="text-right">
									<div class="price"> <span class="price-new">{{price_format($wishlist->product->current_price)}}</span> 
										@if ($wishlist->product->previous_price>$wishlist->product->current_price)
											<span class="price-old">{{price_format($wishlist->product->previous_price)}}</span>
										@endif
										
									</div>
								
								</td>
								<td class="text-right">
									<button class="btn btn-primary add_to_cart_single"
									title="" data-toggle="tooltip"
									product_id="{{$wishlist->product->id}}" data-action="{{ route('add_to_cart_single') }}"
									type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
									</button>
									<a class="btn btn-danger delete_wishlist" title="" data-toggle="tooltip" href="javascript:;" data-original-title="Remove" wishlist_id="{{$wishlist->id}}" data-action="{{ route('wishlist.delete') }}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
			<h4 class="text-center">Wishlist Empty</h4>
			@endif
			</div>
			
			<!--Middle Part End-->
			<aside class="col-sm-3 hidden-xs content-aside col-md-3" id="column-right">
				<h2 class="subtitle">Account</h2>
				<div class="list-group">
					<ul class="list-item">
						<li><a href="login.html">Login</a>
						</li>
						<li><a href="register.html">Register</a>
						</li>
						<li><a href="#">Forgotten Password</a>
						</li>
						<li><a href="#">My Account</a>
						</li>
						<li><a href="#">Address Books</a>
						</li>
						<li><a href="wishlist.html">Wish List</a>
						</li>
						<li><a href="#">Order History</a>
						</li>
						<li><a href="#">Downloads</a>
						</li>
						<li><a href="#">Reward Points</a>
						</li>
						<li><a href="#">Returns</a>
						</li>
						<li><a href="#">Transactions</a>
						</li>
						<li><a href="#">Newsletter</a>
						</li>
						<li><a href="#">Recurring payments</a>
						</li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
@endsection