@extends('layouts.app')
@section('title',config('constant.company_name').' Category Product')

@section('main')
			<div class="main-container container">
				<ul class="breadcrumb">
					<li><a href="{{ route('front.index') }}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{ route('product.category_product',$category->id) }}">{{$category->category_name}}</a></li>
				</ul>
				
				<div class="row">
					<!--Left Part Start -->
					@include('front.files.asidebar')
		          
		        	<div id="content" class="col-md-9 col-sm-8">
		        		<div class="products-category">
		                    <h3 class="title-category ">Category's Product</h3>
		        			<div class="category-desc">
		        				<div class="row">
		        					<div class="col-sm-12">
		        						<div class="banners">
		        							<div>
		        								<a  href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/demo/category/img-cate.jpg') }}" alt="img cate"><br></a>
		        							</div>
		        						</div>
		        					
		        					</div>
		        				</div>
		        			</div>
		        			<!-- Filters -->
		                    <div class="product-filter product-filter-top filters-panel">
		                        <div class="row">
		                            <div class="col-md-5 col-sm-3 col-xs-12 view-mode">
		                                
		                                    <div class="list-view">
		                                        <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
		                                        <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
		                                    </div>
		                        
		                            </div>
		                            <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
		                                <div class="form-group short-by">
		                                    <label class="control-label" for="input-sort">Sort By:</label>
		                                    <select id="input-sort" class="form-control"
		                                    onchange="location = this.value;">
		                                        <option value="" selected="selected">Default</option>
		                                        <option value="">Name (A - Z)</option>
		                                        <option value="">Name (Z - A)</option>
		                                        <option value="">Price (Low &gt; High)</option>
		                                        <option value="">Price (High &gt; Low)</option>
		                                        <option value="">Rating (Highest)</option>
		                                        <option value="">Rating (Lowest)</option>
		                                        <option value="">Model (A - Z)</option>
		                                        <option value="">Model (Z - A)</option>
		                                    </select>
		                                </div>
		                                <div class="form-group">
		                                    <label class="control-label" for="input-limit">Show:</label>
		                                    <select id="input-limit" class="form-control" onchange="location = this.value;">
		                                        <option value="" selected="selected">15</option>
		                                        <option value="">25</option>
		                                        <option value="">50</option>
		                                        <option value="">75</option>
		                                        <option value="">100</option>
		                                    </select>
		                                </div>
		                            </div>
		                            <!-- <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
		                                <ul class="pagination">
		                                    <li class="active"><span>1</span></li>
		                                    <li><a href="">2</a></li><li><a href="">&gt;</a></li>
		                                    <li><a href="">&gt;|</a></li>
		                                </ul>
		                            </div> -->
		                        </div>
		                    </div>
		                    <!-- //end Filters -->

		        			<!--changed listings-->
		                    <div class="products-list row nopadding-xs so-filter-gird">
		            	
		        				
		                       @foreach ($products as $product)
		                       
		                        <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
		                            <div class="product-item-container">
		                                <div class="left-block left-b">
		                                   
		                                    <div class="product-image-container second_img">
		                                        <a href="{{ route('product.detail',$product->slug) }}" target="_self" title="Sed ut perspicia">
		                                            <img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" class="img-1 img-responsive" alt="image1">
		                                            <img src="{{ count($product->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$product->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$product->thumbnail)}}" class="img-2 img-responsive" alt="image2">
		                                        </a>
		                                    </div>
		                                    <!--quickview--> 
		                                   {{--  <div class="so-quickview">
		                                      <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
		                                    </div>  --}}                                                    
		                                    <!--end quickview-->

		                                    
		                                </div>
		                                <div class="right-block">
		                                    <div class="button-group so-quickview cartinfo--left">
		                                        <button type="button" class="addToCart add_to_cart_single" title="Add to cart" product_id="{{$product->id}}" data-action="{{ route('add_to_cart_single') }}">
		                                            <span>Add to cart </span>   
		                                        </button>
		                                        <button type="button" class="wishlist btn-button add_to_wishlist" title="Add to Wish List" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
		                                        </button>
		                                        <button type="button" class="compare btn-button add_to_comparelist" title="Compare this Product " product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-retweet"></i><span>Compare this Product</span>
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
		                                            <span class="rating-num">( 1 )</span>
		                                        </div>
		                                        <h4><a href="product.html" title="Pastrami bacon" target="_self">{{$product->name}}</a></h4>
		                                        
		                                    </div>
		                                    <p class="price">{{price_format($product->current_price)}}</p>
		                                    <div class="description item-desc">
		                                        <p>{{$product->title}}</p>
		                                    </div>
		                                    <div class="list-block">
		                                        <button class="addToCart btn-button add_to_cart_single" type="button" title="Add to Cart" product_id="{{$product->id}}" data-action="{{ route('add_to_cart_single') }}"><i class="fa fa-shopping-basket"></i>
		                                        </button>
		                                        <button class="wishlist btn-button add_to_wishlist" type="button" title="Add to Wish List" product_id="{{$product->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart"></i>
		                                        </button>
		                                        <button class="compare btn-button add_to_comparelist" type="button" title="Compare this Product" product_id="{{$product->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-refresh"></i>
		                                        </button>
		                                        <!--quickview-->                                                      
		                                       {{--  <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a> --}}                                                        
		                                        <!--end quickview-->
		                                    </div>
		                                </div>                                               
		                            </div>
		                        </div>
		                         @endforeach
		                    </div>
		        			<!--// End Changed listings-->
		        			<!-- Filters -->
		        			<div class="product-filter product-filter-bottom filters-panel">
		                        <div class="row">
		                            <div class="col-sm-6 text-left"></div>
		                            <div class="col-sm-6 text-right">{{$products->links()}}</div>
		                        </div>
		                    </div>
		        			<!-- //end Filters -->	
		        		</div>
		        		
		        	</div>
		        	<!--Middle Part End-->
		        </div>
		    </div>
@endsection
@section('ecommerce_js')
<script type="text/javascript"><!--
// Check if Cookie exists
    if($.cookie('display')){
        view = $.cookie('display');
    }else{
        view = 'grid';
    }
    if(view) display(view);
//--></script
@endsection