@extends("layouts.admin")
@section("title","Admin | Payment Update")
@section("breadcrumb","Payment Update")
@section("content")
      <div class="message_section" style="display: none"></div>
   <div class="row">

       <div class="col-lg-8 offset-2">
           <div class="card">
               <div class="card-body">
             <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
                 <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a>
                  <form id="submit_form" class="custom-validation" data-action="{{ route('admin.payment_update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                      <input type="hidden" name="id" value="{{$payment->id}}">
                       <div class="form-group">
                           <label>Payment Name</label>
                           <input type="text" class="form-control" name="payment_name" required value="{{$payment->payment_name}}" />
                       </div>

                       <div class="form-group">
                           <label>Account Number</label>
                           <input type="text" class="form-control" name="account_number"value="{{$payment->account_number}}"/>
                       </div>


                       <div class="form-group">
                           <label>Ref number</label>
                           <input type="text" class="form-control" name="ref_number" value="{{$payment->ref_number}}"/>
                       </div>


   
                       <div class="form-group">
                           <label>Image</label>
                           <div>
                               <input type="file" name="image" class="form-control dropify" data-default-file="{{($payment->image !=null) ?  asset('assets/backend/image/payment/small/'.$payment->image) : asset('assets/backend/image/default.png') }}"/>
                           </div>
                           
                       </div>
                       <div class="form-group mb-0">
                           <div>
                               <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                   Submit
                               </button>
                           </div>
                       </div>
                   </form>
   
               </div>
           </div>
       </div> <!-- end col -->
   </div> <!-- end row -->
@endsection

@section('js')

  <script>
    $(document).ready(function(){
              
        $('body').on('submit','#submit_form',function(e){
            
                  e.preventDefault();
                  let formDta = new FormData(this);
               $(".submit_button").html("Processing...").prop('disabled', true)
            
                  $.ajax({
                    url: $(this).attr('data-action'),
                    method: "POST",
                    data: formDta,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                         toastr.success(data.message);
                        $(".submit_button").text("Submit").prop('disabled', false)
                        $('.message_section').html('').hide();
                    },

                    error:function(response){
                        var errors=response.responseJSON
                         if (response.responseJSON.errors['brand_name']) 
                         {
                             $('.message_section').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">`+response.responseJSON.errors['brand_name']+`<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>`).show();
                           $(".submit_button").text("Submit").prop('disabled', false)
                          }

            
                    }

                  });
            });
    })
</script>

@endsection