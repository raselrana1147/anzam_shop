@extends('layouts.app')
@section('title',config('constant.company_name').' Ecommerce')
@section('main')
	<div class="main-container container">
    <div id="content">
        @include('front.files.slider')
        <div class="row content-main-w">
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 main-left">
                
                <div class="module">
                    <div class="banners banners2">
                        <div class="banner">
                            <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner1.jpg')}}" alt="image"></a>
                        </div>
                    </div>
                </div>

                @include('front.files.latest')

                @include('front.files.shipping')

                @include('front.files.recommended')
               
                @include('front.files.latest_post')
                
                 @include('front.files.testimoni')
                

                <div class="module">
                    <div class="banners banners5">
                        <div class="banner">
                          <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner2.jpg')}}" alt="image"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">
                

              @include('front.files.category_section')

                <!-- Deals -->
                @include('front.files.flash_deal')
                <!-- End Deals -->

                <!-- Banners -->
                <div class="banners3 banners">
                    <div class="item1">
                        <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner3.jpg')}}" alt="image"></a>
                    </div>
                    <div class="item2">
                        <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner4.jpg')}}" alt="image"></a>
                    </div>
                    <div class="item3">
                        <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/banner5.jpg')}}" alt="image"></a>
                    </div>
                </div>
            
             
              
              @include('front.files.featured')

              @include('front.files.trending')
              @include('front.files.top_sale')

                <!-- Banners -->
                <div class="banners4 banners">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/bn1.jpg')}}" alt="image"></a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a href="#"><img src="{{ asset('assets/frontend/assets/image/catalog/banners/bn2.jpg')}}" alt="image"></a>
                        </div>
                    </div>
                </div>
                <!-- end Banners -->

                <!-- Listing tabs -->
              @include('front.files.best_sale')
                <!-- end Listing tabs -->
                
                <!-- Slider Brands -->
               @include('front.files.brand')
                <!-- Slider Brands -->


            </div>
            
        </div>
        
    </div>
</div>
@endsection

