@extends('layouts.app')
@section('title',config('constant.company_name').' Product Detail')
@section('main')
			<div class="main-container container">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a></li>
					<li><a href="#">Smartphone & Tablets</a></li>
					<li><a href="#">Chicken swinesha</a></li>
					
				</ul>
				<div class="row">
		
					@include('front.files.asidebar')
		           
					<div id="content" class="col-md-9 col-sm-8">
						
						<div class="product-view row">
							<div class="left-content-product">
						
								<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
									<div class="large-image  ">
										<img itemprop="image" class="product-image-zoom" src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail) }}"  title="Chicken swinesha" alt="Chicken swinesha">
									</div>
									<a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>
									
									<div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
										@foreach ($product->galleries as $gallery)
										<a data-index="0" class="img thumbnail " data-image="i{{ asset('assets/backend/image/gallery/small/'.$gallery->image) }}" title="Chicken swinesha">
											<img src="{{ asset('assets/backend/image/gallery/large/'.$gallery->image) }}" title="Chicken swinesha" alt="Chicken swinesha">
										</a>
										@endforeach
									</div>
									
								</div>

								<div class="content-product-right col-md-7 col-sm-12 col-xs-12">
									<div class="title-product">
										<h1>{{$product->name}}</h1>
									</div>
									<!-- Review ---->
									<div class="box-review form-group">
										<div class="ratings">
											<div class="rating-box">
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
												<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
											</div>
										</div>

										<a class="reviews_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>	| 
										<a class="write_review_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
									</div>

									<div class="product-label form-group">
										<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
											<span class="price-new" itemprop="price">{{price_format($product->current_price)}}</span>
											@if ($product->previous_price>$product->current_price)
												{{price_format($product->previous_price)}}
											@endif
											
										</div>
										<div class="stock"><span>Availability:</span> <span class="status-stock">In Stock</span></div>
									</div>

									<div class="product-box-desc">
										<div class="inner-box-desc">
											
											
											<div class="brand"><span>Brand:</span><a href="#">{{$product->brand->brand_name}}</a>		</div>
											<div class="model"><span>Product Model:</span> {{$product->model}}</div>
											<div class="reward"><span>Cartegory:</span> {{$product->category->category_name}}</div>
										</div>
									</div>


									<div id="product">
										<h4>Available Options</h4>
										{{-- <div class="image_option_type form-group required">
											<label class="control-label">Colors</label>
											<ul class="product-options clearfix"id="input-option231">
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="33"> 
														<img src="image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="34"> 
														<img src="image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="radio">
													<label>
														<input class="image_radio" type="radio" name="option[231]" value="35"> <img src="image/demo/colors/green.jpg"
														data-original-title="green +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
														<label> </label>
													</label>
												</li>
												<li class="selected-option">
												</li>
											</ul>
										</div> --}}
										
									{{-- 	<div class="box-checkbox form-group required">
											<label class="control-label">Checkbox</label>
											<div id="input-option232">
												<div class="checkbox">
													<label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1"> Checkbox 1 (+$12.00)</label>
												</div>
												<div class="checkbox">
													<label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2"> Checkbox 2 (+$36.00)</label>
												</div>
												<div class="checkbox">
													<label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3"> Checkbox 3 (+$24.00)</label>
												</div>
												<div class="checkbox">
													<label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4"> Checkbox 4 (+$48.00)</label>
												</div>
											</div>
										</div> --}}
										<form id="submit_cart_form" data-action="{{ route('add_to_cart') }}" method="post">
											@csrf
										<div class="form-group box-info-product">
											<div class="option quantity">
												<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
													<label>Qty</label>
													<input class="form-control" type="text" name="quantity"
													value="1">
													<input type="hidden" name="product_id" value="{{$product->id}}">
													
													<span class="input-group-addon product_quantity_down">−</span>
													<span class="input-group-addon product_quantity_up">+</span>
												</div>
											</div>
											<div class="cart">
												<input type="submit" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" data-original-title="Add to Cart">
											</div>
											<div class="add-to-links wish_comp">
												<ul class="blank list-inline">
													<li class="wishlist">
														<a class="icon add_to_wishlist" data-toggle="tooltip" title=""
														product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
														</a>
													</li>
													<li class="compare">
														<a class="icon add_to_comparelist" data-toggle="tooltip" title=""
														product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
														</a>
													</li>
												</ul>
											</div>

										</div>
									</form>

									</div>
									<!-- end box info product -->

								</div>
						
							</div>
						</div>
						<!-- Product Tabs -->
						<div class="producttab ">
							<div class="tabsslider  vertical-tabs col-xs-12">
								<ul class="nav nav-tabs col-lg-2 col-sm-3">
									<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
									<li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
									<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Spesification</a></li>
									<li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Return Policy</a></li>
								</ul>
								<div class="tab-content col-lg-10 col-sm-9 col-xs-12">
									<div id="tab-1" class="tab-pane fade active in">
										{!! $product->description !!}
										
									</div>
									<div id="tab-review" class="tab-pane fade">
										<form>
											<div id="review">
												<table class="table table-striped table-bordered">
													<tbody>
														<tr>
															<td style="width: 50%;"><strong>Super Administrator</strong></td>
															<td class="text-right">29/07/2015</td>
														</tr>
														<tr>
															<td colspan="2">
																<p>Best this product opencart</p>
																<div class="ratings">
																	<div class="rating-box">
																		<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																		<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																		<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																		<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																		<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
												<div class="text-right"></div>
											</div>
											<h2 id="review-title">Write a review</h2>
											<div class="contacts-form">
												<div class="form-group"> <span class="icon icon-user"></span>
													<input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}"> 
												</div>
												<div class="form-group"> <span class="icon icon-bubbles-2"></span>
													<textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
												</div> 
												<span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>
												
												<div class="form-group">
												 <b>Rating</b> <span>Bad</span>&nbsp;
												<input type="radio" name="rating" value="1"> &nbsp;
												<input type="radio" name="rating"
												value="2"> &nbsp;
												<input type="radio" name="rating"
												value="3"> &nbsp;
												<input type="radio" name="rating"
												value="4"> &nbsp;
												<input type="radio" name="rating"
												value="5"> &nbsp;<span>Good</span>
												
												</div>
												<div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
											</div>
										</form>
									</div>
									<div id="tab-4" class="tab-pane fade">
										{!! $product->specification !!}				
									</div>
									<div id="tab-5" class="tab-pane fade">
										{!! $product->return_policy !!}
									</div>
								</div>
							</div>
						</div>
						<!-- //Product Tabs -->

						<!-- Related Products -->
		    			<div class="related titleLine products-list grid module ">
		    				<h3 class="modtitle">Related Products  </h3>
		    		
		    				<div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="5" data-items_column0="5" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">

		    						@foreach ($releted_products as $related)
		    							
		    						
		    					    <div class="item">         
		    					        <div class="item-inner product-layout transition product-grid">
		    					            <div class="product-item-container">
		    					                <div class="left-block left-b">
		    					                    
		    					                    <div class="product-image-container second_img">
		    					                        <a href="{{ route('product.detail',$related->slug) }}" target="_self" title="Lastrami bacon">
		    					                            <img src="{{ asset('assets/backend/image/product/small/'.$related->thumbnail)}}" class="img-1 img-responsive" alt="image1">
		    					                            <img src="{{ count($related->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$related->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$related->thumbnail)}}" class="img-2 img-responsive" alt="image2">
		    					                        </a>
		    					                    </div>
		    					                    <!--quickview--> 
		    					                    {{-- <div class="so-quickview">
		    					                      <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
		    					                    </div>   --}}                                                   
		    					                    <!--end quickview-->

		    					                    
		    					                </div>
		    					                <div class="right-block">
		    					                    <div class="button-group so-quickview cartinfo--left">
		    					                        <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
		    					                            <span>Add to cart </span>   
		    					                        </button>
		    					                        <button type="button" class="wishlist btn-button add_to_wishlist" title="Add to Wish List" product_id="{{$related->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
		    					                        </button>
		    					                        <button type="button" class="compare btn-button add_to_comparelist" title="Compare this Product "product_id="{{$related->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-retweet"></i><span>Compare this Product</span>
		    					                        </button>
		    					                        
		    					                    </div>
		    					                    <div class="caption hide-cont">
		    					                        <div class="ratings">
		    					                            <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		    					                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		    					                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		    					                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		    					                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
		    					                            </div>
		    					                            <span class="rating-num">( 2 )</span>
		    					                        </div>
		    					                        <h4><a href="product.html" title="Pastrami bacon" target="_self">{{$related->name}}</a></h4>
		    					                        
		    					                    </div>
		    					                    <p class="price">
		    					                      <span class="price-new">{{price_format($related->current_price)}}</span>
		    					                      
		    					                    </p>
		    					                </div>

		    					            </div>
		    					        </div>      
		    					    </div>

		    					   @endforeach
		    				</div>
		    			</div>

		    			<!-- end Related  Products-->
					</div>
						
					</div>
				</div>
				<!--Middle Part End-->
			</div>
@endsection
@section('ecommerce_js')
	<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/application.js') }}"></script>
@endsection

