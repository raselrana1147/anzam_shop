@extends("layouts.seller")
@section("seller_title","Seller | Order List")
@section("breadcrumb","Order")
@section("seller_content")
   <div class="row">
       <div class="col-12">
           <div class="card">
               <div class="card-body">
                    <h4 class="mt-0 header-title">Order List</h4>
                   <table id="tables_item" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                       <thead>
                       <tr>
                           <th>Serial</th>
                           <th>Grand Total</th>
                           <th>Order Number</th>
                           <th>Quantity</th>
                           <th>Ordered At</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       </thead>
                      
                   </table>
   
               </div>
           </div>
       </div> 
   </div> 
@endsection
@section('seller_js')

 <script>
         var table = $("#tables_item").DataTable({
             processing: true,
             responsive: true,
             serverSide: true,
             ordering: false,
             pagingType: "full_numbers",
             ajax: '{{ route('seller.load_order') }}',
             columns: [
                 { data: 'DT_RowIndex',name:'DT_RowIndex' },
                 { data: 'grand_total',name:'grand_total'},
                 { data: 'order_number',name:'order_number'},
                 { data: 'quantity',name:'quantity'},
                 { data: 'order_at',name:'order_at'},
                 { data: 'status',name:'status'},
                 { data: 'action',name:'action' },
             ],

              language : {
                   processing: 'Processing'
               },
              
         });
    </script>
  
@endsection()