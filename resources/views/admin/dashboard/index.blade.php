@extends('layouts.dashboard')
    @section('title')
        Dashboard | Dashoard 
        {{-- manage admin wen clicked should show all admins by default --}}
    @endsection
    @section('content')
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                @include('layouts.dashboard_sidebar')
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row widget-row">
                         @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('delete_message'))
                                <div class="alert alert-danger">
                                    {{ session('delete_message') }}
                                </div>
                                @elseif(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @foreach($errors->all() as $error)
                                        <strong>Error Upon Submission...</strong> {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        <div class="col-md-3">

                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Revenue</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">NGN</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$completedOrders}}">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">All Users</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><i class="fa fa-user"></i></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$users}}">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Products</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon icon-bar-chart" style="background-color: #337ab7;"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$products}}">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Total Orders</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-yellow icon-pie-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"></span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$totalOrders}}">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div> 

                        <div class="col-md-12">
                            
                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Delivered Orders</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon glyphicon glyphicon-shopping-cart" style="background-color:rgba(61, 178, 6, 1)"> </i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle"></span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$ordersResult}}">0</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div> 

                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Processing Orders</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon bg-yellow icon-pie-chart"></i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle"></span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$processingOrders}}">0</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- END WIDGET THUMB -->
                            </div> 

                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                        <h4 class="widget-thumb-heading">Orders at Market</h4>
                                        <div class="widget-thumb-wrap">
                                            <i class="widget-thumb-icon bg-grey icon-pie-chart" ></i>
                                            <div class="widget-thumb-body">
                                                <span class="widget-thumb-subtitle"></span>
                                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$goneToMarket}}">0</span>
                                            </div>
                                        </div>
                                </div>
                                    <!-- END WIDGET THUMB -->
                                
                                <!-- END WIDGET THUMB -->
                            </div> 

                            <div class="col-md-3">
                                <!-- BEGIN WIDGET THUMB -->
                               

                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                    <h4 class="widget-thumb-heading">Cancelled Orders</h4>
                                    <div class="widget-thumb-wrap">
                                        <i class="widget-thumb-icon glyphicon glyphicon-trash" style="background-color: red"> </i>
                                        <div class="widget-thumb-body">
                                            <span class="widget-thumb-subtitle"></span>
                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$cancelledOrders}}">0</span>
                                        </div>
                                    </div>
                            </div>

                        </div> 

                          <div class="col-md-12">

                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase"> Order Listing </span> 
                                    </div>
                                     <div class="actions">
                                         <form id="search_text" name="form_search" method="POST" action="{{url('admin/search_order')}}" class="form-inline">
                                         {{csrf_field()}}
                                           <div class="form-group">
                                             <div class="input-group">
                                              <input class="form-control" name="search" placeholder="Search for an order..." type="text">
                                              <span class="input-group-btn">
                                                 <input type="submit" class="btn btn-default"  value="Go!"/> 
                                              </span>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div class="row">
                                    <div class="table-actions-wrapper">
                                            <div id="order_message" class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Success:</strong> Order Updated Successfully
                                            </div>
                                            <div id="payment_message" class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Success:</strong> Payment Updated Successfully
                                            </div>
                                        </div>
                                <div>
                                    
                                </div>
                                <div class="portlet-body">

                                    <div class="table-container">
                                        
                                        {{ $orders->links() }}
                                         <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_orders">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="10%"> Order&nbsp;# </th>
                                                    <th width="15%"> Order Date</th>
                                                    <th width="10%"> Price </th>
                                                    <th width="15%"> Payment Method</th>
                                                    <th width="15%"> Update Payment</th>
                                                    <th width="15%"> Phone</th>
                                                    <th width="15%"> Update Status </th>
                                                    <th width="5%"> Details </th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php $num = 1; ?>
                                                <form method="POST" action="">
                                                   <form method="POST" action="">
                                                    @foreach($orders as $order)

                                                            <tr>

                                                                <td>
                                                                   {{$order->order_unique_reference}}
                                                                </td>
                                                                <td>
                                                                    @if(isset($order->created_at))
                                                                    {{$order->created_at->diffForHumans()}}
                                                                    @endif
                                                                </td>
                                                                <td> {{$order->total}} </td>
                                                                <td> @if(!empty($order->payment_method))
                                                                        {{ucfirst($order->payment_method)}}
                                                                    @else
                                                                        {{"Bank"}}
                                                                    @endif
                                                                </td>
                                                                 <td>
                                                                       <select class="paymentStatus" name="paymentStatus" class="form-control form-filter input-sm" data-payload="{{$order->id}}">
                                                                       @if($order->payment_status ==  "paid")
                                                                        <option value="{{$order->payment_status}}"> {{ ucfirst($order->payment_status)}}</option>
                                                                        <option value="unpaid">Unpaid</option>
                                                                       @elseif($order->payment_status == "unpaid")
                                                                         <option value="{{$order->payment_status}}">{{ucfirst($order->payment_status)}}</option>
                                                                         <option value="paid">Paid</option>
                                                                       @endif
                                                                         
                                                                     </select>
                                                                </td>
                                                                <td> {{$order->receiver_phone}} </td>
                                                                <td>
                                                                <select class="updateStatus" name="order_status" class="form-control" data-payload="{{$order->id}}">
                                                                        @if($order->status == "confirmed")
                                                                            <option value="{{$order->status}}">{{ucfirst($order->status)}}</option>
                                                                            <option value="processing">Processing</option>
                                                                            <option value="gone-to-market">Gone to Market</option>
                                                                            <option value="delivered">Delivered</option>
                                                                        @elseif($order->status == "processing")
                                                                            <option value="{{$order->status}}">{{ucfirst($order->status)}}</option>
                                                                            <option value="confirmed">Confirmed</option>
                                                                            <option value="gone-to-market">Gone to Market</option>
                                                                            <option value="delivered">Delivered</option>
                                                                        @elseif($order->status == "gone-to-market")
                                                                            <option value="{{$order->status}}">{{ucfirst($order->status)}}</option>
                                                                            <option value="processing">Processing</option>
                                                                            <option value="confirmed">Confirmed</option>
                                                                            <option value="delivered">Delivered</option>
                                                                       @elseif($order->status == "delivered")
                                                                            <option value="{{$order->status}}">{{ucfirst($order->status)}}</option>
                                                                            <option value="processing">Processing</option>
                                                                            <option value="confirmed">Confirmed</option>
                                                                            <option value="gone-to-market">Gone to Market</option>
                                                                        @endif
                                                                    </select>
                                                                </td>
                                                            </form>
                                                                <td>
                                                                    <a href="{{url('admin/orders',$order->id)}}"><button class="btn btn-sm btn-success margin-bottom">
                                                                            <i class="fa fa-eye"></i> View</button></a> </br> </br>
                                                                    <a id="a_del1" href="{{url('admin/orders/delete',$order->id)}}"><button class="btn btn-sm btn-danger margin-bottom">
                                                                            <i class="icon-remove-sign"></i> Cancel</button></a>
                                                                </td>

                                                            </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

        </script>
@endsection

