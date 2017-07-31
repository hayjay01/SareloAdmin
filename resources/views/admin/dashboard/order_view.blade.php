@extends('layouts.dashboard')
    @section('title')
        Dashboard | View Order
    @endsection

    @section('content')
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                @include('layouts.dashboard_sidebar')
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->

                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->

                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Order {{$order->user_id}}
                                        @if(isset($order->created_at))
                                            <span class="hidden-xs">| {{$order->created_at->diffForHumans()}} </span>
                                        @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav-tabs-lg">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab"> Details </a> 
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                    <div id="order_message" class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <strong>Success:</strong> Order Updated Successfully
                                                    </div>
                                                    <div id="payment_message" class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <strong>Success:</strong> Payment Updated Successfully
                                                    </div>
                                                        <div class="portlet yellow-crusta box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-cogs"></i>Order Details </div>
                                                                <!--<div class="actions">
                                                                    <a href="javascript:;" class="btn btn-default btn-sm">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </div>-->
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Order No: </div>
                                                                    <div class="col-md-7 value"> {{$order->order_unique_reference}}
                                                                        <!--<span class="label label-info label-sm"> Email confirmation was sent </span>-->
                                                                    </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Order Date</div>
                                                                    <div class="col-md-7 value">
                                                                    @if(isset($order->created_at))
                                                                    {{$order->created_at->diffForHumans()}} @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Order Status: </div>
                                                                    <div class="col-md-7 value">
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
                                                                </div>
                                                                     
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Grand Total: </div>
                                                                    <div class="col-md-7 value"> &#8358; {{$order->total}} </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Delivery Instruction: </div>
                                                                    <div class="col-md-7 value"> {{$order->delivery_instruction}} </div>
                                                                </div>
                                                                 <div class="row static-info">
                                                                    <div class="col-md-5 name"> Payment Status: </div>
                                                                    <div class="col-md-7 value">
                                                                    
                                                                         <select class="paymentStatus" name="paymentStatus" class="form-control form-filter input-sm" data-payload="{{$order->id}}">
                                                                      @if($order->payment_status ==  "paid")
                                                                        <option value="{{$order->payment_status}}"> {{ ucfirst($order->payment_status)}}</option>
                                                                        <option value="unpaid">Unpaid</option>
                                                                      @elseif($order->payment_status == "unpaid")
                                                                         <option value="{{$order->payment_status}}">{{ucfirst($order->payment_status)}}</option>
                                                                         <option value="paid">Paid</option>
                                                                    
                                                                       @endif
                                                                       </select>
                                                                    </select>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="portlet blue-hoki box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-cogs"></i>Customer Information </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row static-info">

                                                                    <div class="col-md-5 name"> Customer Name: </div>
                                                                    <div class="col-md-7 value"> {{$order->user->first_name}} </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Email: </div>
                                                                    <div class="col-md-7 value"> {{$order->user->email}} </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Address: </div>
                                                                    <div class="col-md-7 value"> {{$order->user_address->address}} {{$order->user_address->city}}  </div>
                                                                </div>
                                                                <div class="row static-info">
                                                                    <div class="col-md-5 name"> Phone Number: </div>
                                                                    <div class="col-md-7 value"> {{$order->user->phone}} </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="portlet grey-cascade box">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-cogs"></i>Shopping Cart </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-striped">
                                                                        <thead>

                                                                                <tr>
                                                                                    <th> Product Name</th>
                                                                                    <th> Quantity </th>
                                                                                    <th> Price (per each item) </th>
                                                                                    <th> Total </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($order->order_products as $item)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <a target="_blank" href="/admin/products/{{$item->product->id}}">
                                                                                            {{$item->product->name}}
                                                                                            </a>
                                                                                        </td>
                                                                                        <td> {{$item->qty}} </td>
                                                                                        <td>&#8358;  {{$item->price}}</td>
                                                                                        <td>&#8358; {{$item->sub_total}} </td>
                                                                                    </tr>

                                                                                @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
@endsection
