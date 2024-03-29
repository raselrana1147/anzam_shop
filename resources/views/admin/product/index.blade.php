@extends("layouts.admin")
@section("title","Admin | Product List")
@section("breadcrumb","Product List")
@section('css')
<link href="{{ asset('assets/backend/style/css/jquery-ui.css') }}" rel = "stylesheet">
 <style>
   .product-status{
           margin-left: 100px
      }
   .product-status span{
       position: absolute;
       padding-left: 10px;
      
   }

   .ui-widget-header{

    border: #ddd solid red !important;
    background: #000 !important
  }
 </style>
@endsection
@section("content")
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-body">
                     <a href="{{ route('admin.product_create') }}" class="btn btn-primary btn-icon float-right"><span class="btn-icon-label"><i class="fas fa-plus mr-2"></i></span>Add New</a>

                    <h4 class="mt-0 header-title">Product List</h4>

                    <a href="javascript:void(0)" data-target="#flashDeal" data-toggle="modal" class="btn btn-dark btn-icon flash_deal_button" style="display: none"><span class="btn-icon-label"><i class="fas fa-plus mr-2"></i></span>Set Flash Deal</a>

                   <table id="tables_item" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                       <tr>
                           <th>Fash Deal</th>
                           <th>Fash Deal Status</th>
                           <th>Image</th>
                           <th>Name</th>
                           <th>Sale Price</th>
                           <th>Attributes</th>
                           <th>Action</th>

                       </tr>
                       </thead>
                      
                   </table>
   
               </div>
           </div>
       </div> <!-- end col -->
   </div> <!-- end row -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Product Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <div class="product-status">
                 
                    <input type="hidden" class="store_product_id" name="store_product_id" value="" data-action="{{ route('admin.update_product_status') }}">
                 

                  <div>
                      <input type="checkbox" id="featured" switch="dark" class="change_product_status" status_type="featured"/>
                      <label for="featured" data-on-label="Yes" data-off-label="No"></label><span>Featured</span>
                  </div>

                  <div>
                      <input type="checkbox" id="best_sale" switch="dark" class="change_product_status" status_type="best_sale"/>
                      <label for="best_sale" data-on-label="Yes" data-off-label="No"></label><span>Best Sale</span>
                  </div>

                  <div>
                      <input type="checkbox" id="trending" switch="dark" class="change_product_status" status_type="trending"/>
                      <label for="trending" data-on-label="Yes" data-off-label="No"></label><span>Treanding</span>
                  </div>

                   <div>
                      <input type="checkbox" id="new_arrival" switch="dark" class="change_product_status" status_type="new_arrival"/>
                      <label for="new_arrival" data-on-label="Yes" data-off-label="No"></label><span>New Arrival</span>
                  </div>

                  <div>
                      <input type="checkbox" id="hot_sale" switch="dark" class="change_product_status" status_type="hot_sale"/>
                      <label for="hot_sale" data-on-label="Yes" data-off-label="No"></label><span>Hot sale</span>
                  </div>

                  <div>
                      <input type="checkbox" id="top_sale" switch="dark" class="change_product_status" status_type="top_sale"/>
                      <label for="top_sale" data-on-label="Yes" data-off-label="No"></label><span>Top sale</span>
                  </div>

                  <div>
                      <input type="checkbox" id="publish" switch="dark" class="change_product_status" status_type="publish"/>
                      <label for="publish" data-on-label="Yes" data-off-label="No"></label><span>Publish</span>
                  </div>
                  

                 </div>
            </div>
            
        </div>
    </div>
     </div>


    <div id="flashDeal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Set Flash deal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="product-status">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body">
                 
                                 <form id="set_flash_deal" data-action="{{ route('admin.set_flash_deal') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="product_id[]" value="" class="keep_product_id">
                                  <div>
                                      <input type="checkbox" id="flash_deal"  switch="dark" status_type="flash_deal" name="flash_deal" value="0" />
                                      <label for="flash_deal" data-on-label="Yes" data-off-label="No"></label><span>Flash Deal</span>
                                  </div>
                                  <div>
                                      <label class="control-label">End Date</label>
                                     <input type="text" id="end_date" name="end_date" class="form-control" />
                                  </div>
                                     <div class="form-group">
                                         <label class="control-label">Flash Deal Amount <span class="current_discount"></span></label>
                                         <select class="form-control" name="discount">
                                                <option>Select</option>
                                                 <option value="5">5 %</option>
                                                 <option value="10">10 %</option>
                                                 <option value="15">15 %</option>
                                                 <option value="20">20 %</option>
                                                 <option value="25">25 %</option>
                                                 <option value="30">30 %</option>
                                                 <option value="35">35 %</option>
                                                 <option value="45">45 %</option>
                                                 <option value="50">50 %</option>
                                                 <option value="55">55 %</option>  
                                                 <option value="60">60 %</option> 
                                                 <option value="65">65 %</option> 
                                                 <option value="70">70 %</option> 
                                                 <option value="75">75 %</option> 
                                                 <option value="80">80 %</option> 
                                                 <option value="85">85 %</option> 
                                                 <option value="90">90 %</option> 

                                         </select>
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
                     </div>
                 </div>
            </div>
            </div>
        </div>
    </div>
     </div>
@endsection
@section('js')
<script src="{{ asset('assets/backend/style/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/backend/style/js/product.js') }}"></script>
 <script>
         var table = $("#tables_item").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('admin.load_product') }}',
             columns: [
                 {data: 'flash_deal', name: 'flash_deal'},
                 {data: 'flash_deal_status', name: 'flash_deal_status'},
                 { data: 'thumbnail',name:'thumbnail'},
                 { data: 'name',name:'name'},
                 { data: 'current_price',name:'current_price'},
                 { data: 'attribute',name:'attribute'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>

    <script>
        $(document).ready(function(){
            $('body').on('click','.flash_deal_product_id',function(){

                var products = [];
                    $.each($(".flash_deal_product_id:checked"), function(){
                        products.push($(this).val());
                    });
                     
                    if(products.length>=1){
                          $('.flash_deal_button').show();
                               
                    }else{
                       $('.flash_deal_button').hide();
                      
                    }
                  $('.keep_product_id').val(products)
                    
            });
        });
    </script>
   
@endsection()