<div class="navbar-header">
<button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">      
    <i class="fa fa-bars"></i>
    <span>  All Categories     </span>
</button>
</div>
<div class="vertical-wrapper" >
<span id="remove-verticalmenu" class="fa fa-times"></span>
<div class="megamenu-pattern">
    <div class="container-mega">
        <ul class="megamenu">
            @foreach (categories() as $category)
            <li class="item-vertical  with-sub-menu hover">
                <p class="close-menu"></p>
                <a href="{{ route('product.category_product',$category->id) }}" class="clearfix">
                    <img src="{{ asset('assets/frontend/assets/image/catalog/menu/icons/ico10.png')}}" alt="icon">
                    <span>{{$category->category_name}}</span>
                    @if (count($category->sub_categories)>0) 
                       <b class="fa-angle-right"></b>
                    @endif
                </a>
                <div class="sub-menu" data-subwidth="60" >
                     @if (count($category->sub_categories)>0) 
                    <div class="content" >
                        <div class="row">
                            <div class="col-sm-12">
                              
                                <div class="row">
                                    @foreach ($category->sub_categories as $sub)
                                    <div class="col-md-4 static-menu">
                                        <div class="menu">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('product.subcategory_product',$sub->id) }}"  class="main-menu">{{$sub->sub_cat_name}}</a>
                                                     @if (count($sub->child_category)>0)
                                                    <ul>
                                                        @foreach ($sub->child_category as $child)
                                                        <li><a href="{{ route('product.childcategory_product',$child->id) }}" >{{$child->child_cat_name}}</a></li>
                                                           @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                            @endif
                                        </div>
                                         
                                    </div>
                                      @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   @endif
                </div>
                
            </li>
              @endforeach

            </ul>
        </div>
    </div>
</div>
