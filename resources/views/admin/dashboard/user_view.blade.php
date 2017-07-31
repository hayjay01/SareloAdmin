@extends('layouts.dashboard')
    @section('title')
        Dashboard | View User 
    @endsection

    @section('content')
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                @include('layouts.dashboard_sidebar')
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
                                        <span class="caption-subject font-dark sbold lowercase"> Viewing {{ucfirst($user->first_name)."'s ". " Details"}} 
                                            <span class="hidden-xs">|  </span>
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
                                                    <div class="portlet yellow-crusta box">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="glyphicon glyphicon-user"></i>User Details</div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row static-info">
                                                                <div class="col-md-5 name"> Firstname: {{$user->first_name}}</div>
                                                                <div class="col-md-7 value"> 
                                                                </div>
                                                            </div>
                                                            <div class="row static-info">
                                                                <div class="col-md-5 name"> Lastname: {{$user->last_name}}</div>
                                                                <div class="col-md-7 value">
                                                              
                                                                </div>
                                                            </div>
                                                            <div class="row static-info">
                                                                <div class="col-md-5 name"> Email: {{$user->email}} </div>
                                                                <div class="col-md-7 value">
                                                                    
                                                            </div>
                                                                 
                                                            </div>
                                                            <div class="row static-info">
                                                                <div class="col-md-8 name"> Phone:  {{$user->phone}} </div>
                                                                <div class="col-md-7 value"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="portlet blue-hoki box">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-cogs"></i>Addresses 
                                                                ({{count($user->user_addresses)}})</div>
                                                            <!--<div class="actions">
                                                                <a href="javascript:;" class="btn btn-default btn-sm">
                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                            </div>-->
                                                        </div>
                                                        <div class="portlet-body">
                                                        <?php $num = 1;?>
                                                        @if(count($user->user_addresses))
                                                            @foreach($user->user_addresses as $address)
                                                                <div class="row static-info">
                                                                    <div class="col-md-10 name"> Address {{$num++ .":"}}  {{$address->address}}</div> <br> <br>
                                                                    <div class="col-md-7 value"> City: {{$address->city}} </div>
                                                                </div> <hr>
                                                            @endforeach
                                                        @else
                                                            {{" No Address Found for this user  "}}
                                                        @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                <div id="order_message" class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Success:</strong> Order Updated Successfully
                                                </div>
                                                <div id="payment_message" class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Success:</strong> Payment Updated Successfully
                                                </div>
                                                    <div class="portlet grey-cascade box">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-cogs"></i>Order Details </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-bordered table-striped">
                                                                    <thead>

                                                                           <tr role="row" class="heading">
                                                                               <th width="10%"> Order&nbsp;# </th>
                                                                               <th width="15%"> Order Date</th>
                                                                               <th width="15%"> Update Status</th>
                                                                               <th width="15%"> Update Payment</th>
                                                                               <th width="15%"> Reciever's Phone</th>
                                                                               <th width="15%"> Total</th>
                                                                           </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @if(count($user->orders))
                                                                            @foreach($user->orders as $item)
                                                                                    <tr>
                                                                                        <td>
                                                                                            {{$item->order_unique_reference}}
                                                                                        <td> 
                                                                                            @if(isset($item->created_at))
                                                                                                {{$item->created_at}} 
                                                                                            @endif
                                                                                        </td>
                                                                                       
                                                                                        <td> 

                                                                                        <select class="updateStatus" name="order_status" class="form-control" data-payload="{{$item->id}}">
                                                                                        
                                                                                         @if($item->status == "confirmed")
                                                                                             <option value="{{$item->status}}">{{ucfirst($item->status)}}</option>
                                                                                             <option value="processing">Processing</option>
                                                                                             <option value="gone-to-market">Gone to Market</option>
                                                                                             <option value="delivered">Delivered</option>
                                                                                         @elseif($item->status == "processing")
                                                                                             <option value="{{$item->status}}">{{ucfirst($item->status)}}</option>
                                                                                             <option value="confirmed">Confirmed</option>
                                                                                             <option value="gone-to-market">Gone to Market</option>
                                                                                             <option value="delivered">Delivered</option>
                                                                                         @elseif($item->status == "gone-to-market")
                                                                                             <option value="{{$item->status}}">{{ucfirst($item->status)}}</option>
                                                                                             <option value="processing">Processing</option>
                                                                                             <option value="confirmed">Confirmed</option>
                                                                                             <option value="delivered">Delivered</option>
                                                                                        @elseif($item->status == "delivered")
                                                                                             <option value="{{$item->status}}">{{ucfirst($item->status)}}</option>
                                                                                             <option value="processing">Processing</option>
                                                                                             <option value="confirmed">Confirmed</option>
                                                                                             <option value="gone-to-market">Gone to Market</option>
                                                                                         @endif
                                                                                        </select>
                                                                                    

                                                                                         </td>
                                                                                        <td> 
                                                                                        <select class="paymentStatus" name="paymentStatus" class="form-control form-filter input-sm" data-payload="{{$item->id}}">
                                                                                        @if($item->payment_status ==  "paid")
                                                                                         <option value="{{$item->payment_status}}"> {{ ucfirst($item->payment_status)}}</option>
                                                                                         <option value="unpaid">Unpaid</option>
                                                                                        @elseif($item->payment_status == "unpaid")
                                                                                          <option value="{{$item->payment_status}}">{{ucfirst($item->payment_status)}}</option>
                                                                                          <option value="paid">Paid</option>
                                                                                        @endif
                                                                                                
                                                                                        </select>
                                                                                           

                                                                                        </td>
                                                                                        <td> {{$item->receiver_phone}} </td>
                                                                                        <td> &#8358;{{number_format($item->total, 2)}} </td>
                                                                                        <td>
                                                                                            <a target="_blank" href="{{url('admin/orders',$item->id)}}" data-toggle="modal" class="btn btn-primary" >Full Details</a>
                                                                                        </td>
                                                                                    </tr>
                                                                            @endforeach
                                                                        @else 
                                                                            {{" This user has no order"}}
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- PRODUCTS OF EACH ORDER START --}}



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
