  <div class="module listingtab-layout1">
                    
                    <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                        <div class="loadeding"></div>
                        <div class="ltabs-wrap">
                            <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="3" data-sm="2" data-xs="1" data-margin="30">
                                <!--Begin Tabs-->
                                <div class="ltabs-tabs-wrap"> 
                                <span class="ltabs-tab-selected">Bathroom</span> <span class="ltabs-tab-arrow">▼</span>
                                    <div class="item-sub-cat">
                                        <ul class="ltabs-tabs cf">
                                            <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label">Best Seller</span> </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Tabs-->
                            </div>
                        
                            <div class="ltabs-items-container products-list grid">
                                <!--Begin Items-->
                                <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                                    <div class="ltabs-items-inner ltabs-slider">
                                        @foreach ($best_sales as $best_sale)
                                          
                                        <div class="item">         
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        
                                                        <div class="product-image-container second_img">
                                                            <a href="{{ route('product.detail',$best_sale->slug) }}" target="_self" title="Ullamco occaeca">
                                                                <img src="{{ asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" class="img-1 img-responsive" alt="image1">
                                                                <img src="{{ count($best_sale->galleries)>0 ? asset('assets/backend/image/gallery/small/'.$best_sale->galleries['0']['image']) : asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" class="img-2 img-responsive" alt="image2">
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
                                                            <button type="button" class="addToCart add_to_cart_single" title="Add to cart" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_cart_single') }}">
                                                                <span>Add to cart </span>   
                                                            </button>
                                                            <button type="button" class="wishlist btn-button add_to_wishlist" title="Add to Wish List" product_id="{{$best_sale->id}}" data-action="{{ route('add_to_wishlist') }}"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button add_to_comparelist" title="Compare this Product " product_id="{{$best_sale->id}}" data-action="{{ route('add_to_comparelist') }}"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                            </button>
                                                            
                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <h4><a href="{{ route('product.detail',$best_sale->slug) }}" title="Pastrami bacon" target="_self">{{$best_sale->name}} </a></h4>
                                                            
                                                        </div>
                                                        <p class="price">
                                                          <span class="price-new">{{price_format($best_sale->current_price)}}</span>
                                                          
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>      
                                        </div>
                                         @endforeach
                                      
                                    </div>
                                    
                                </div>
                               
                                <!--End Items-->
                            </div>
                            
                        </div>   
                    </div>
                </div>