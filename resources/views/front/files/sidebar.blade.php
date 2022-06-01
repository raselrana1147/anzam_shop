 <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">New Category</h5>
                        <ul>
                            @foreach (categories() as $category)
                            @break($loop->index>5)
                            <li>
                                <a href="{{ route('product.category_product',$category->id) }}"> <img src="{{ asset('assets/backend/image/category/small/'.$category->image) }}" alt="" />{{$category->category_name}}</a><span class="count">{{count($category->products)}}</span>
                            </li>
                           @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                   
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>

                        @foreach (new_products() as $new_product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('assets/backend/image/product/small/'.$new_product->thumbnail) }}" alt="#" />
                            </div>
                            <div class="content pt-10">
                                <h5><a href="{{ route('product.detail',$new_product->slug) }}">{{$new_product->name}}</a></h5>
                                <p class="price mb-0 mt-5">{{price_format($new_product->current_price)}}</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                        <img src="{{ asset('assets/frontend/assets/imgs/banner/banner-11.png')}}" alt="" />
                        <div class="banner-text">
                            <span>Oganic</span>
                            <h4>
                                Save 17% <br />
                                on <span class="text-brand">Oganic</span><br />
                                Juice
                            </h4>
                        </div>
                    </div>
                </div>