<div class="module deals-layout1">
                    <div class="head-title">
                        <div class="modtitle">
                            <span>Flash Sale</span>
                            <div class="cslider-item-timer">
                              <div class="product_time_maxprice">
                                
                                <div class="item-time">
                                  <div class="item-timer">
                                    <div class="defaultCountdown-30"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                              
                              <a class="viewall" href="?route=product/special">View All</a>
                            
                        </div>    
                    </div>
                    <div class="modcontent">
                        <div id="so_deal_1" class="so-deal style1">
                            <div class="extraslider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="6" data-items_column0="5" data-items_column1="3" data-items_column2="2"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                @foreach ($flash_deals as $flash_deal)
                                    
                                <div class="item">         
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                <div class="box-label">
                                                    <span class="label-product label-sale">-11%</span>
                                                </div>
                                                <div class="product-image-container second_img">
                                                    <a href="{{ route('product.detail',$flash_deal->slug) }}" target="_self" title="Pastrami bacon">
                                                        <img src="{{ asset('assets/backend/image/product/small/'.$flash_deal->thumbnail)}}" class="img-1 img-responsive" alt="image1">
                                                        <img src="{{ count($flash_deal->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$flash_deal->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$flash_deal->thumbnail)}}" class="img-2 img-responsive" alt="image2">
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
                                                    <button type="button" class="addToCart add_to_cart_single" title="Add to cart" product_id="{{$flash_deal->id}}" data-action="{{ route('add_to_cart_single') }}">
                                                        <span>Add to cart </span>   
                                                    </button>
                                                    <button type="button" class="wishlist btn-button add_to_wishlist" title="Add to Wish List" product_id="{{$flash_deal->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                    </button>
                                                    <button type="button" class="compare btn-button add_to_comparelist" title="Compare this Product " product_id="{{$flash_deal->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-retweet"></i><span>Compare this Product</span>
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
                                                    <h4><a href="product.html" title="Pastrami bacon" target="_self">{{$flash_deal->name}}</a></h4>
                                                    
                                                </div>
                                                <p class="price">
                                                  <span class="price-new">{{price_format($flash_deal->current_price)}}</span>
                                                  @if ($flash_deal->previous_price>$flash_deal->current_price)
                                                       <span class="price-old">{{price_format($flash_deal->previous_price)}}</span>
                                                  @endif
                                                 
                                                </p>
                                            </div>

                                            <div class="item-available">
                                                <div class="available">
                                                  <span class="color_width" data-title="77%" data-toggle='tooltip' style="width: 77%"></span>
                                                </div>                          
                                                <p class="a2">Sold: <b>51</b>  </p>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                 @endforeach
                            </div>
                        </div>
                      </div>
                </div>