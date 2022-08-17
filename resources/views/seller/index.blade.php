@extends("layouts.seller")
@section("seller_title","E-Union Admin | Dashboard")
@section("breadcrumb","Dashboard")
@section("seller_content")
   

 <div class="row">
        <div class="col-lg-4">
            <div class="card mini-stat bg-info">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-broadcast bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Orders</h6>
                    <h5 class="mb-3">10</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-success">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-box bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Sales</h6>
                    <h5 class="mb-3">555,425</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-tags bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Products</h6>
                    <h5 class="mb-3">50</h5>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mini-stat bg-warning">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-broadcast bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Category</h6>
                    <h5 class="mb-3">54</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-danger">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-box bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Sub Category</h6>
                    <h5 class="mb-3">555</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mini-stat bg-dark">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="dripicons-tags bg-soft-primary text-primary float-right h4"></i>
                    </div>
                    <h6 class="text-uppercase mb-3 mt-0">Brands</h6>
                    <h5 class="mb-3">55</h5>
                   
                </div>
            </div>
        </div>
    </div>

   

@endsection
@section('seller_js')
   
@endsection