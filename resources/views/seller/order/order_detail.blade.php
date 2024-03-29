@extends("layouts.seller")
@section("seller_title","Seller | Order Detail")
@section("breadcrumb","Order Detail")
@section('seller_css')
  <style>
    .my_table tr th ,.my_table tr td {
        border: none;
    }
  </style>
@endsection
@section("seller_content")
<div class="row">

  <div class="col-md-6">

    <div class="card">

      <div class="card-header">
        <h6>Oder Detail</h6>
      </div>
      <div class="card-body">
        <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2">
             <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a>
          <table class="my_table table" style="border:none">
            <tr>
              <th>Order Number:</th>
              <td>{{$order->order_number}}</td>
            </tr>
            <tr>
              <th>Ordered At:</th>
              <td>{{date('Y-d-m H:m', strtotime($order->created_at))}}</td>
            </tr>

           @if ($order->coupon_id !=null)
             <tr>
               <th>Coupon Code:</th>
               <td><a href="{{ route('admin.coupon_list') }}">{{$order->coupon->coupon_code}}</a></td>
             </tr>
           @endif
            <tr>
              <th>Transaction:</th>
              <td>{{$order->order_id}}</td>
            </tr>
            
            <tr>
              <th>Total Item:</th>
              <td>{{$order->quantity}}</td>
            </tr>
            <tr>
              <th>Status:</th>
              <td>{{$order->status}}</td>
            </tr>
            
          </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h6>Billing Detail</h6>
        </div>
        <div class="card-body">
            <table class="my_table table" style="border:none">
              <tr>
                <th>Name</th>
                <td>{{$order->billing->customer_name}}</td>
              </tr>

              <tr>
                <th>E-mail</th>
                <td>{{$order->billing->customer_email}}</td>
              </tr>

              <tr>
                <th>Phone</th>
                <td>{{$order->billing->customer_phone}}</td>
              </tr>
              
              <tr>
                <th>Address</th>
                <td>{{$order->billing->customer_address}}</td>
              </tr>

              <tr>
                <th>City</th>
                <td>{{$order->billing->city}}</td>
              </tr>

              <tr>
                <th>Zip Code</th>
                <td>{{$order->billing->zip_code}}</td>
              </tr>
            </table>
        </div>
      </div>
  </div>
</div>

  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">

                  <div class="row">
                      <div class="col-12">
                          <div>
                              <div class="p-2">
                                  <h3 class="font-16"><strong>Order summary</strong></h3>
                              </div>
                              <div class="">
                                  <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                          <tr>
                                              <td><strong>Product Name</strong></td>
                                              <td class="text-center"><strong>Image</strong></td>
                                              <td class="text-center"><strong>Price</strong>
                                              </td>
                                              <td class="text-right"><strong>Quantity</strong></td>
                                              <td class="text-right"><strong>Total</strong></td>

                                          </tr>
                                          </thead>
                                          <tbody>
                                         @foreach ($order_details as $order_detail)
                                          <tr>
                                              <td>{{$order_detail->product->name}}</td>
                                              <td class="text-center"><img src="{{ asset('assets/backend/image/product/small/'.$order_detail->product->thumbnail) }}" style="width: 80px;height: 50px"></td>
                                              <td class="text-center">{{currency()}} {{$order_detail->product->current_price}}</td>
                                              <td class="text-right">{{$order_detail->product_quantity}}</td>
                                              <td class="text-right">{{currency()}} {{$order_detail->product->current_price*$order_detail->product_quantity}}</td>

                                          </tr>

                                          @endforeach
                                         
                                          <tr>
                                          
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="thick-line"></td>
                                              <td class="thick-line text-center">
                                                  <strong>Subtotal</strong></td>
                                              <td class="thick-line text-right">{{currency()}} {{number_format($order->sub_total,2)}}</td>
                                          </tr>
                                          <tr>
                                             
                                             
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line text-center">
                                                  <strong>Shipping</strong></td>
                                              <td class="no-line text-right">{{currency()}} {{number_format(shipping_charge(),2)}}</td>
                                          </tr>
                                           <tr>
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line text-center">
                                                  <strong>Tax</strong></td>
                                              <td class="no-line text-right">{{currency()}} {{number_format(tax(),2)}}</td>
                                          </tr>

                                          <tr>
                                             
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line"></td>
                                              <td class="no-line text-center">
                                                  <strong>Grand Total</strong></td>
                                              <td class="no-line text-right">{{currency()}} {{number_format($order->grand_total,2)}}</td>
                                          </tr>
                                          
                                          </tbody>
                                      </table>
                                  </div>
  
                                
                              </div>
                          </div>
  
                      </div>
                  </div> <!-- end row -->
  
              </div>
          </div>
      </div> <!-- end col -->
  </div>
@endsection
@section('js')

 
@endsection()