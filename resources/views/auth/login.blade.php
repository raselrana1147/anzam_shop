@extends('layouts.app')
@section('title',config('constant.company_name').' Sing in')
@section('main')
  <div class="main-container container">
    <ul class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Account</a></li>
      <li><a href="#">Login</a></li>
    </ul>
    
    <div class="row">
      <div id="content" class="col-sm-12">
        <div class="page-login">
        
          <div class="account-border">
            <div class="row">
              <div class="col-sm-6 new-customer">
                <div class="well">
                  <h2><i class="fa fa-file-o" aria-hidden="true"></i> New Customer</h2>
                  <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                </div>
                <div class="bottom-form">
                  <a href="{{ route('register') }}" class="btn btn-default pull-right">Create Account</a>
                </div>
              </div>
              
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="col-sm-6 customer-login">
                  <div class="well">
                    <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Returning Customer</h2>
                    <p><strong>I am a returning customer</strong></p>
                    <div class="form-group">
                      <label class="control-label " for="input-email">E-Mail Address</label>
                      <input type="text" name="email" class="form-control" required="" />
                    </div>
                    <div class="form-group">
                      <label class="control-label " for="input-password">Password</label>
                      <input type="password" name="password" class="form-control" required="" />
                    </div>
                  </div>
                  <div class="bottom-form">
                    <a href="#" class="forgot">Forgotten Password</a>
                    <button type="submit" class="btn btn-default pull-right">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
@endsection
@section('ecommerce_js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection
