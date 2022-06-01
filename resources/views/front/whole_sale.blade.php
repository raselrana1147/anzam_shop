@extends('layouts.app')
@section('title',config('constant.company_name').' Whole Sale Product')

@section('ecommerce')
	<main class="main">
	    <div class="page-header mt-30 mb-50">
	        <div class="container">
	            <div class="archive-header">
	                <div class="row align-items-center">
	                    <div class="col-xl-3">
		                    <h1 class="mb-15">Whole sale products</h1>
		                    <div class="breadcrumb">
		                        <a href="{{ route('front.index') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
		                        <span>Whole sale products list</span>
		                       
		                    </div>
		                </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="container mb-30">
	        <div class="row">
	            <div class="col-lg-4-5">
	                <div class="shop-product-fillter">
	                    <div class="totall-product">
	                        <p>We found <strong class="text-brand">{{$products->total()}}</strong> items for you!</p>
	                    </div>
	                    <div class="sort-by-product-area">
	                        <div class="sort-by-cover mr-10">
	                            <div class="sort-by-product-wrap">
	                                <div class="sort-by">
	                                    <span><i class="fi-rs-apps"></i>Show:</span>
	                                </div>
	                                <div class="sort-by-dropdown-wrap">
	                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
	                                </div>
	                            </div>
	                           
	                        </div>
	                        <div class="sort-by-cover">
	                            <div class="sort-by-product-wrap">
	                                <div class="sort-by">
	                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
	                                </div>
	                                <div class="sort-by-dropdown-wrap">
	                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
	                                </div>
	                            </div>
	                            <div class="sort-by-dropdown">
	                                <ul>
	                                    <li><a class="active" href="#">Featured</a></li>
	                                    <li><a href="#">Price: Low to High</a></li>
	                                    <li><a href="#">Price: High to Low</a></li>
	                                    <li><a href="#">Release Date</a></li>
	                                    <li><a href="#">Avg. Rating</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row product-grid">
	                    	@foreach ($products as $product)

	                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
	                            <div class="product-cart-wrap mb-30">
	                                <div class="product-img-action-wrap">
	                                    <div class="product-img product-img-zoom">
	                                        <a href="{{ route('product.detail',$product->slug) }}">
	                                            <img class="default-img" src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" alt="" />
	                                            <img class="hover-img" src="{{ count($product->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$product->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$product->thumbnail)}}" alt="" />
	                                        </a>
	                                    </div>
	                                    <div class="product-action-1">
	                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
	                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
	                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
	                                    </div>
	                                    
	                                </div>
	                                <div class="product-content-wrap">
	                                    <div class="product-category">
	                                        <a href="">{{$product->category->category_name}}</a>
	                                    </div>
	                                    <h2><a href="{{ route('product.detail',$product->slug) }}">{{$product->name}}</a></h2>
	                                    <div class="product-rate-cover">
	                                        <div class="product-rate d-inline-block">
	                                            <div class="product-rating" style="width: 90%"></div>
	                                        </div>
	                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
	                                    </div>
	                                    <div>
	                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
	                                    </div>
	                                    <div class="product-card-bottom">
	                                        <div class="product-price">
	                                            <span>{{price_format($product->current_price)}}</span>
	                                           @if ($product->previous_price>$product->current_price)
	                                                <span class="old-price">{{price_format($product->previous_price)}}</span>
	                                            @endif
	                                        </div>
	                                        <div class="add-cart">
	                                            <a class="add add_to_cart_single" product_id="{{$product->id}}" data-action="{{ route('add_to_cart_single') }}" href="javascript:;"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                       @endforeach
	                    <!--end product card-->
	                </div>
	                <!--product grid-->
	                <div class="pagination-area mt-20 mb-20">
	                    <nav aria-label="Page navigation example">
	                        {{$products->links()}}
	                    </nav>
	                </div>
	                <section class="section-padding pb-5">
	                    <div class="section-title">
	                        <h3 class="">Deals Of The Day</h3>
	                        <a class="show-all" href="shop-grid-right.html">
	                            All Deals
	                            <i class="fi-rs-angle-right"></i>
	                        </a>
	                    </div>
	                    <div class="row">
	                        	@foreach ($flash_deals as $flash_deal)
	                        		
	                            <div class="col-xl-3 col-lg-4 col-md-6">
	                                <div class="product-cart-wrap style-2">
	                                    <div class="product-img-action-wrap">
	                                        <div class="product-img">
	                                            <a href="shop-product-right.html">
	                                                <img src="{{ asset('assets/backend/image/product/small/'.$flash_deal->thumbnail)}}" alt="" />
	                                            </a>
	                                        </div>
	                                    </div>
	                                    <div class="product-content-wrap">
	                                        <div class="deals-countdown-wrap">
	                                            <div class="deals-countdown" data-countdown="{{$flash_deal->end_date}}"></div>
	                                        </div>
	                                        <div class="deals-content">
	                                            <h2><a href="shop-product-right.html">{{$flash_deal->name}}</a></h2>
	                                            <div class="product-rate-cover">
	                                                <div class="product-rate d-inline-block">
	                                                    <div class="product-rating" style="width: 90%"></div>
	                                                </div>
	                                                <span class="font-small ml-5 text-muted"> (4.0) {{-- {{$flash_deal->end_date}} --}}</span>
	                                            </div>
	                                            
	                                            <div class="product-card-bottom">
	                                                <div class="product-price">
	                                                     <span>{{price_format($flash_deal->current_price)}}</span>
	                                                     @if ($flash_deal->previous_price>$flash_deal->current_price)
	                                                    	<span class="old-price">{{price_format($flash_deal->previous_price)}}</span>
	                                                     @endif
	                                                </div>
	                                                <div class="add-cart">
	                                                    <a class="add add_to_cart_single" href="javascript:;" product_id="{{$flash_deal->id}}" data-action="{{ route('add_to_cart_single') }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                          	
	                          @endforeach
	                    </div>
	                </section>
	                <!--End Deals-->
	            </div>
	           @include('front.files.sidebar')
	        </div>
	    </div>
	</main>
@endsection