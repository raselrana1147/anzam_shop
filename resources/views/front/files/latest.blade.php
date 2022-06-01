<div class="module product-simple extra-layout1">
                    <h3 class="modtitle">
                        <span>Latest Products</span>
                    </h3>
                    <div class="modcontent">
                        <div id="so_extra_slider_1" class="so-extraslider" >
                            <!-- Begin extraslider-inner -->
                            <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">

                                <div class="item ">
                                   
                                  @foreach (new_products() as $product)
                                      {{-- expr --}}
                                
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
                                            <div class="item-img-info">
                                                <a href="{{ route('product.detail',$product->slug) }}" target="_self" title="Chicken swinesha "><img src="{{ asset('assets/backend/image/product/small/'.$product->thumbnail)}}" alt="Chicken swinesha"></a>
                                            </div>
                                           
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="{{ route('product.detail',$product->slug) }}" target="_self" title="Chicken swinesha">
                                                            {{$product->name}} 
                                                        </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                                <span class="fa fa-stack">
                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                </span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">{{price_format($product->current_price)}} </span>&nbsp;&nbsp;
                                                @if ($product->previous_price>$product->current_price)
                                                     <span class="price-old">{{price_format($product->previous_price)}} </span>&nbsp;
                                                @endif
                                               



                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                      @endforeach
                                    <!-- End item-wrap -->
                                </div>

                              
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>