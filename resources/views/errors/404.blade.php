@extends('layouts.app')
@section('title',config('constant.company_name').' 404 page')

@section('ecommerce')
			<main class="main page-404">
			    <div class="page-content pt-150 pb-150">
			        <div class="container">
			            <div class="row">
			                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
			                    <p class="mb-20"><img src="{{ asset('assets/frontend/assets/imgs/page/page-404.png') }}" alt="" class="hover-up" /></p>
			                    <h1 class="display-2 mb-30">Page Not Found</h1>
			                    <p class="font-lg text-grey-700 mb-30">
			                        The link you clicked may be broken or the page may have been removed.<br />
			                        visit the <a href="index.html"> <span> Homepage</span></a> or <a href="#"><span>Contact us</span></a> about the problem
			                    </p>
			                    <div class="search-form">
			                        <form action="#">
			                            <input type="text" placeholder="Search…" />
			                            <button type="submit"><i class="fi-rs-search"></i></button>
			                        </form>
			                    </div>
			                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="{{ route('front.index') }}"><i class="fi-rs-home mr-5"></i> Back To Home Page</a>
			                </div>
			            </div>
			        </div>
			    </div>
			</main>
@endsection