 <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Overview</li>

                            <li>
                                <a href="{{ route('seller.dashboard') }}" class="waves-effect">
                                    <i class="ion ion-md-speedometer"></i><span>Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('seller.order_list') }}" class="waves-effect">
                                    <i class="ion ion-md-speedometer"></i><span>My Orders</span>
                                </a>
                            </li>


                            <li class="menu-title">Components</li>
                                <li>
                                 <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Reports<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                 <ul class="submenu">
                                     <li><a href="{{ route('seller.product_create') }}">Custom Reports</a></li>
                                     <li><a href="{{ route('seller.product_create') }}">Daily Reports</a></li>
                                     <li><a href="{{ route('seller.product_create') }}">Weekly Reports</a></li>
                                     <li><a href="{{ route('seller.product_create') }}">Monthly Reports</a></li>
                                 </ul>
                              </li>
                              <li>
                               <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Product<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                               <ul class="submenu">
                                   <li><a href="{{ route('seller.product_create') }}">Create Product</a></li>
                                   <li><a href="{{ route('seller.product_list') }}">Product List</a></li>
                               </ul>
                            </li>

                              <li>
                               <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-list"></i><span>Account<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                               <ul class="submenu">
                                   <li><a href="{{ route('seller.product_create') }}">Balance</a></li>
                                   <li><a href="{{ route('seller.product_list') }}">Withdrawal</a></li>
                                   <li><a href="{{ route('seller.product_list') }}">Transaction</a></li>
                               </ul>
                            </li>
                        
                           
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>