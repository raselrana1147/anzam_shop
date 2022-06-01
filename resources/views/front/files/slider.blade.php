<div class="content-top-w">
            
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 main-left">
                <div class="module col1 hidden-sm hidden-xs"></div>
            </div>    
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 main-right">
                <div class="slider-container row"> 
                                
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col2">
                        <div class="module sohomepage-slider ">
                            <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach ($sliders as $slider)
                                  
                                <div class="yt-content-slide">
                                    <a href="#"><img src="{{ asset('assets/backend/image/slider/large/'.$slider->image)}}" alt="slider1" class="img-responsive"></a>
                                </div>
                                 @endforeach
                               
                            </div>
                            
                            <div class="loadeding"></div>
                        </div>
                        
                    </div>

                    
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col3">
                        <div class="module product-simple extra-layout1">
                            <h3 class="modtitle">
                                <span>Best Selling</span>
                            </h3>
                            <div class="modcontent">
                                <div id="so_extra_slider_1" class="so-extraslider" >
                                    <!-- Begin extraslider-inner -->
                                    <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                        <div class="item ">
                                            @foreach ($best_sales1 as $best_sale)
                                             
                                            <div class="product-layout item-inner style1 ">
                                                <div class="item-image">
                                                    <div class="item-img-info">
                                                        <a href="{{ route('product.detail',$best_sale->slug) }}" target="_self" title="Mandouille short ">
                                                            <img src="{{ asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" alt="Mandouille short">
                                                            </a>
                                                    </div>
                                                    
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title">
                                                        <a href="{{ route('product.detail',$best_sale->slug) }}" target="_self" title="Mandouille short">{{$best_sale->name}}</a>
                                                    </div>
                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                    </div>
                                                    <div class="content_price price">
                                                        <span class="price-new product-price">{{price_format($best_sale->current_price)}} </span>&nbsp;&nbsp;
                                                        @if ($best_sale->previous_price>$best_sale->current_price)
                                                            <span class="price-old">{{price_format($best_sale->previous_price)}} </span>
                                                        @endif
                                                       

                                                    </div>
                                                </div>
                                                <!-- End item-info -->
                                                <!-- End item-wrap-inner -->
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="item ">
                                            @foreach ($best_sales2 as $best_sale)
                                              
                                            <div class="product-layout item-inner style1 ">
                                                <div class="item-image">
                                                    <div class="item-img-info">
                                                        <a href="{{ route('product.detail',$best_sale->slug) }}" target="_self" title="Qeserunt shortloin ">
                                                        <img src="{{ asset('assets/backend/image/product/small/'.$best_sale->thumbnail)}}" alt="Qeserunt shortloin">
                                                        </a>
                                                    </div>
                                                   
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title">
                                                        <a href="{{ route('product.detail',$best_sale->slug) }}" target="_self" title="Qeserunt shortloin">{{$best_sale->name}}</a>
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
                                                        <span class="price product-price">
                                                    {{price_format($best_sale->current_price)}}
                                                </span>
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
                    </div>                
                </div>
            </div>                                        
        </div>