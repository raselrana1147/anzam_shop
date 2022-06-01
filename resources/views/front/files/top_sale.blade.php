  <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
                    <div class="modcontent">                                                                
                        <div class="page-top">
                            <div class="page-title-categoryslider">Top Sale Products</div>

                        </div>

                        <div class="categoryslider-content">
                            <div class="item-cat-image" style="min-height: 351px;">
                                <a href="#" title="Fashion & Accessories" target="_self">
                                  <img class="categories-loadimage" alt="Fashion & Accessories" src="{{ asset('assets/frontend/assets/image/catalog/demo/category/tab1.jpg')}}">
                                </a>
                            </div>
                            <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                 @foreach ($top_sales as $top_sale)
                                    <div class="item">         
                                        <div class="item-inner product-layout transition product-grid">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">
                                                    
                                                    <div class="product-image-container second_img">
                                                        <a href="{{ route('product.detail',$top_sale->slug) }}" target="_self" title="Lastrami bacon">
                                                            <img src="{{ asset('assets/backend/image/product/small/'.$top_sale->thumbnail)}}" class="img-1 img-responsive" alt="image1">
                                                            <img src="{{ count($top_sale->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$top_sale->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$top_sale->thumbnail)}}" class="img-2 img-responsive" alt="image2">
                                                        </a>
                                                    </div>
                                                    <!--quickview--> 
                                                   {{--  <div class="so-quickview">
                                                      <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                    </div> --}}                                                     
                                                    <!--end quickview-->

                                                    
                                                </div>
                                                <div class="right-block">
                                                    <div class="button-group so-quickview cartinfo--left">
                                                        <button type="button" class="addToCart add_to_cart_single" title="Add to cart" product_id="{{$top_sale->id}}" data-action="{{ route('add_to_cart_single') }}">
                                                            <span>Add to cart </span>   
                                                        </button>
                                                        <button type="button" class="wishlist btn-button add_to_wishlist" title="Add to Wish List" product_id="{{$top_sale->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                        </button>
                                                        <button type="button" class="compare btn-button add_to_comparelist" title="Compare this Product " product_id="{{$top_sale->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-retweet"></i><span>Compare this Product</span>
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
                                                            <span class="rating-num">( 3 )</span>
                                                        </div>
                                                        <h4><a href="product.html" title="Pastrami bacon" target="_self">{{$top_sale->name}}</a></h4>
                                                        
                                                    </div>
                                                    <p class="price">
                                                      <span class="price-new">{{price_format($top_sale->current_price)}}</span>
                                                      
                                                    </p>
                                                </div>

                                            </div>
                                        </div>      
                                    </div>
                                 @endforeach 
                                    
                               
                            </div>
                        </div>
                    </div>
                </div>