<!DOCTYPE html>
<html lang="en">

<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Anzam Shop | Seller Create Account</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('assets/backend/assets/images/favicon.ico')}}">

        <link href="{{ asset('assets/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/backend/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/backend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-primary">
        <div class="home-btn d-none d-sm-block">
            <a href="{{ route('admin.dashboard') }}" class="text-white"><i class="fas fa-home h2"></i></a>
        </div>

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern shadow-none">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a href="index.html" class="logo"><img src="{{ asset('assets/backend/image/common/logo1.png') }}" height="20" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3"> 
                                    <h4 class="font-18 text-center">{{config('constant.company_name')}}</h4>
                                    <p class="text-muted text-center mb-4">Create a seller account.</p>
                                    <div id="message_area" style="display: none"></div>
                                    <form  class="form-horizontal" data-action="{{ route('seller.register.submit') }}" method="POST" id="kt_sign_up_form">
                						@csrf

                                        <div class="form-group">
                                            <label >Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                            <span class="valids error_name" style="color: red;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label >E-mail</label>
                                            <input type="text" class="form-control" name="email" placeholder="Enter E-mail">
                                            <span class="valids error_email" style="color: red;"></span>
                                        </div>

                                        <div class="form-group">
                                            <label >Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                                            <span class="valids error_phone" style="color: red;"></span>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                                            <span class="valids error_password" style="color: red;"></span>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light submit_button" type="submit">Create Account</button>
                                        </div>
            
                                        <div class="mt-4 text-center">
                                            <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                
                                </div>
                    
                            </div>
                        </div>
                        <div class="mt-5 text-center text-white-50">
                            <p>Already have an account ? <a href="{{ route('seller.login') }}" class="font-500 text-white"> Signin now </a> </p>
                            <p>© {{date('Y')}} {{config('constant.company_name')}}.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('assets/backend/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/backend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/backend/assets/js/metismenu.min.js')}}"></script>
        <script src="{{ asset('assets/backend/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('assets/backend/assets/js/waves.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/backend/assets/js/app.js')}}"></script>
        <script>
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
      </script>


        <script>
            $(document).ready(function(){

                $('body').on('submit','#kt_sign_up_form',function(e){
              
                e.preventDefault();
                let formDta = new FormData(this);

                $('.submit_button').text("Processing").prop('disabled',true);

                $.ajax({
                  url: $(this).attr('data-action'),
                  method: "POST",
                  data: formDta,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success:function(response){

                    let data=JSON.parse(response);

                    if(data.status==200){
                        $('#message_area').html('<div class="alert alert-success">Registration successfull !!!</div>').show();
                        setInterval(function(){
                            $('#message_area').html('<div class="alert alert-success">Redecting to seller login !!!</div>').show();
                            window.location = data.route
                        },1000);
                    }
                  },

                  error:function(response){
                       if (response.status === 422) {
                          
                              if (response.responseJSON.errors.hasOwnProperty('name')) {
                                   $('.error_name').html(response.responseJSON.errors.name)      
                               }else{
                                   $('.error_name').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('email')) {
                                   $('.error_email').html(response.responseJSON.errors.email)      
                               }else{
                                   $('.error_email').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('phone')) {
                                   $('.error_phone').html(response.responseJSON.errors.phone)      
                               }else{
                                   $('.error_phone').html('') 
                               }

                               if (response.responseJSON.errors.hasOwnProperty('password')) {
                                   $('.error_password').html(response.responseJSON.errors.password)      
                               }else{
                                   $('.error_password').html('') 
                               }
                           
                       }
                       $('.submit_button').text("Sing In").prop('disabled',false);
                    }

                 
                });
          })
            })
        </script>
        
    </body>
</html>