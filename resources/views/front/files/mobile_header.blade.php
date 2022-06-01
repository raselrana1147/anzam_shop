<div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('assets/frontend/assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <input type="text" name="keyword" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                 
                    <nav>
                        <ul class="mobile-menu font-heading">
                            @foreach (categories() as $category)
                            <li class="menu-item-has-children">
                                <a href="{{ route('product.category_product',$category->id) }}">{{$category->category_name}}</a>
                                @if (count($category->sub_categories)>0)
                                    
                                <ul class="dropdown">
                                    @foreach ($category->sub_categories as $sub_cat)
                                      <li><a href="{{ route('product.subcategory_product',$sub_cat->id) }}">{{$sub_cat->sub_cat_name}}</a></li>
                                     @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    @guest()
                      <div class="single-mobile-header-info">
                          <a href="{{ route('login') }}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    @endauth
                    
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    @foreach (social_link() as $link)
                       <a href="{{$link->link}}"><img src="{{ asset('assets/backend/image/social/'.$link->image)}}" alt="" /></a>
                    @endforeach
                   
                    
                </div>
                <div class="site-copyright">Copyright {{date('Y')}} © Nest. All rights reserved.</div>
            </div>
        </div>
    </div>