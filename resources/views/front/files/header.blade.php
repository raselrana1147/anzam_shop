 <header id="header" class=" typeheader-1">
        
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                        <div class="hidden-md hidden-sm hidden-xs welcome-msg">Welcome to SuperMarket! Wrap new offers / gift every single day on Weekends - New Coupon code: <span>Happy2018</span> </div>
                        <ul class="top-link list-inline hidden-lg ">
                            <li class="account" id="my_account">
                                <a href="#" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">My Account </span>  <span class="fa fa-caret-down"></span>
                                </a>
                                <ul class="dropdown-menu ">
                                    @auth()
                                      <li><a href="{{ route('register') }}"><i class="fa fa-user"></i>Logout</a></li>
                                      <li><a href="{{ route('login') }}"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                                      @else
                                      <li><a href="{{ route('register') }}"><i class="fa fa-user"></i>Logout</a></li>
                                      <li><a href="{{ route('login') }}"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                                    @endauth
                                    
                                </ul>
                            </li>
                        </ul>            
                    </div>
                    <div class="header-top-right collapsed-block col-lg-5 col-md-4 col-sm-6 col-xs-8">
                        <ul class="top-link list-inline lang-curr">
                            <li class="currency">
                                <div class="btn-group currencies-block">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon icon-credit "></span> $ US Dollar  <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu btn-xs">
                                            <li> <a href="#">(€)&nbsp;Euro</a></li>
                                            <li> <a href="#">(£)&nbsp;Pounds    </a></li>
                                            <li> <a href="#">($)&nbsp;US Dollar </a></li>
                                        </ul>
                                    </form>
                                </div>
                            </li>   
                            <li class="language">
                                <div class="btn-group languages-block ">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="bt-language">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{ asset('assets/frontend/assets/image/catalog/flags/gb.png')}}" alt="English" title="English">
                                            <span class="">English</span>
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.html"><img class="image_flag" src="{{ asset('assets/frontend/assets/image/catalog/flags/gb.png')}}" alt="English" title="English" /> English </a></li>
                                            <li> <a href="html_with_RTL/index.html"> <img class="image_flag" src="{{ asset('assets/frontend/assets/image/catalog/flags/ar.png')}}" alt="Arabic" title="Arabic" /> Arabic </a> </li>
                                        </ul>
                                    </form>
                                </div>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->

        <!-- Header center -->
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="logo"><a href="{{ route('front.index') }}"><img src="{{ asset('assets/backend/image/logo.png')}}" title="Your Store" alt="Your Store" /></a></div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-5">
                        <div class="search-header-w">
                            <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>                              
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                <form method="POST" action="{{ route('product.search') }}">
                                    @csrf
                                    <div id="search0" class="search input-group form-group">
                                        <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                            <select class="no-border" name="category_id">
                                                <option value="0">All Categories</option>
                                                @foreach (categories() as $category)
                                                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input class="autosearch-input form-control" type="text" size="50" autocomplete="off" placeholder="Keyword here..." name="keyword">
                                
                                        <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                                    
                                    </div>
                                    <input type="hidden" name="route" value="product/search" />
                                </form>
                            </div>
                        </div>  
                    </div>
                    <!-- //end Search -->
                    <div class="middle-right col-lg-3 col-md-3 col-sm-3">                  
                        <!--cart-->
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">

                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                        <span class="icon-c">
                                <i class="fa fa-shopping-bag"></i>
                              </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">

                                                My cart
                                            </p>

                                            <span class="total-shopping-cart cart-total-full">
                                   <span class="items_cart cart-count">{{total_item()}}</span><span class="items_cart2"> item(s)</span><span class="items_carts sub_total"> ({{price_format(sub_total())}}) </span>
                                            </span>
                                        </div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu pull-right shoppingcart-box cart-item-added" role="menu">
                                    @if (total_item()>0)
                                       
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                @foreach (carts() as $cart)
                                                   
                                                <tr class="cart_row{{$cart->id}}">
                                                    <td class="text-center" style="width:70px">
                                                        <a href="{{route('product.detail',$cart->product->slug)}}">
                                                            <img src="{{ asset('assets/backend/image/product/small/'.$cart->product->thumbnail)}}" style="width:70px" alt="Yutculpa ullamcon" title="Yutculpa ullamco" class="preview">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"> <a class="cart_product_name" href="product.html">{{$cart->product->name}}</a> 
                                                    </td>
                                                    <td class="text-center">x{{$cart->quantity}}</td>
                                                    <td class="text-center">{{price_format($cart->product->current_price)}}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('product.detail',$cart->product->slug) }}" class="fa fa-edit"></a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a cart_id="{{$cart->id}}" data-action="{{ route('cart.delete') }}" class="fa fa-times fa-delete delete_cart"></a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody class="cart_footer">
                                                    <tr>
                                                        <td class="text-left "><strong>Sub-Total</strong>
                                                        </td>
                                                        <td class="text-right sub_total">{{price_format(sub_total())}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="text-left"><strong>VAT {{"Flat"}}</strong>
                                                        </td>
                                                        <td class="text-right">{{price_format(tax())}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-left"><strong>Shipping {{"Flat"}}</strong>
                                                        </td>
                                                        <td class="text-right">{{price_format(shipping_charge())}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left"><strong>Grand Total</strong>
                                                        </td>
                                                        <td class="text-right grand_total">{{price_format(grand_total())}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="text-right"> <a class="btn view-cart" href="{{ route('view.cart') }}"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="{{ route('checkout') }}"><i class="fa fa-share"></i>Checkout</a> 
                                            </p>
                                        </div>
                                    </li>
                                    @else
                                    <h4 style="padding: 12px">Empty Cart</h4>
                                     @endif
                                </ul>
                            </div>

                        </div>
                        <!--//cart-->

                        <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                            <li class="compare hidden-xs"><a href="{{ route('view.comparelist') }}" class="top-link-compare" title="Compare "><i class="fa fa-refresh"></i></a>
                            </li>
                            <li class="wishlist hidden-xs"><a href="{{ route('wishlist') }}" id="wishlist-total" class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart"></i></a>
                            </li>
                        </ul>

                                            
                        
                    </div>
                    
                </div>

            </div>
        </div>
        <!-- //Header center -->

        <!-- Header Bottom -->
        <div class="header-bottom hidden-compact">
            <div class="container">
                <div class="row">
                    
                    <div class="bottom1 menu-vertical col-lg-2 col-md-3 col-sm-3">
                        <div class="responsive so-megamenu megamenu-style-dev ">
                            <div class="so-vertical-menu ">
                                <nav class="navbar-default">    
                                    
                                    <div class="container-megamenu vertical">
                                        <div id="menuHeading">
                                            <div class="megamenuToogle-wrapper">
                                                <div class="megamenuToogle-pattern">
                                                    <div class="container">
                                                        <div>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                        All Categories                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        @if (Route::is(['front.index']))
                                           @include('front.files.category')
                                      @endif 

                                        </div>
                                    </nav>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Main menu -->
                    <div class="main-menu-w col-lg-10 col-md-9">
                        <div class="responsive so-megamenu megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal open ">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    
                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                   
                                                    <li class="{{Route::is('front.index')? 'active': ''}}">
                                                        <p class="close-menu"></p>
                                                        <a href="{{ route('front.index') }}" class="clearfix">
                                                            <strong>Home</strong>
                                         
                                                        </a>
                                                    </li>
                                                    <li class="{{Route::is('about_us')? 'active': ''}}">
                                                        <p class="close-menu"></p>
                                                        <a href="{{ route('about_us') }}" class="clearfix">
                                                            <strong>About Us</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>
                                                     <li class="{{Route::is('contact_us')? 'active': ''}}">
                                                        <p class="close-menu"></p>
                                                        <a href="{{ route('contact_us') }}" class="clearfix">
                                                            <strong>Contact Us</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>
                                                    

                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- //end Main menu -->
                                      
                    <div class="bottom3">                        
                        <div class="telephone hidden-xs hidden-sm hidden-md">
                            <ul class="blank"> 
                                <li><a href="#"><i class="fa fa-truck"></i>track your order</a></li> 
                                <li><a href="#"><i class="fa fa-phone-square"></i>Hotline (+123)4 567 890</a></li> 
                            </ul>
                        </div>  
                        <div class="signin-w hidden-md hidden-sm hidden-xs">
                            <ul class="signin-link blank">  
                            @auth()
                                                                                               
                                <li class="log login"><i class="fa fa-lock"></i> 
                                    <a  onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="link-lg" href="javascript:;">Logout </a> or

                                                  <a href="{{ route('customer.dashboard') }}">Account</a>

                                  
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                    
                                 </li> 


                                 @else
                                 <li class="log login"><i class="fa fa-lock"></i> 
                                     <a class="link-lg" href="{{ route('login') }}">Login </a> or
                                      <a href="{{ route('register') }}">Register</a>
                                  </li> 
                             @endauth                                    
                            </ul>                       
                        </div>                  
                    </div>
                    
                </div>
            </div>

        </div>
    </header>