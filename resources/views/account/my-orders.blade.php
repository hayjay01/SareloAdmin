    @extends('layouts.account')
@section('content')

<!-- BEGIN CONTENT BODY -->
<div class="page-content p-t-0 p-l-40">
    <div class="row">
        
        @if(count($pending_orders))
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">Processing Orders{{-- : <span class="c-brand-green">Processing</span> --}}</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>
                @foreach($pending_orders as $order)
                <div class="card">
                    <div class="header">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd opacity-50">Order #{{$order->order_unique_reference}}</td>

                                        <td class="no-bd text-right @if($order->payment_status =="paid") c-brand-green @else c-brand-red @endif" > @if($order->payment_status =="paid") Paid @else Not Paid @endif</td>

                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{$order->user_address->address}}</td>
                                        @if($order->status != 'cancelled')<td class="text-right no-bd">
                                        <a href="/order/{{$order->id}}/cancel" class="btn bg-transparent no-bd c-blue m-r-0 p-r-0">Cancel Order</a></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd"> 
                                            Delivery Fee : &#8358; @if(!empty($order->delivery_fee)) {{number_format($order->delivery_fee, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="p-t-14 no-bd"> 
                                            Service Charge : &#8358; @if(!empty($order->service_charge)) {{number_format($order->service_charge, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="content p-t-10">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 tables">
                                <tbody>
                                @foreach($order->order_products as $order_product)
                                    <tr>
                                        <td class="">
                                            <div class="clearfix">
                                                <div class="f-left p-r-15">
                                                    <img src="{{env("MEDIA_CDN").$order_product->product->products_image}}" class="width-40 h-40 bd-50p">
                                                </div>
                                                <div class="f-left">
                                                    <div>{{$order_product->product->name}}</div>
                                                    <div class="f-12 opacity-50">
                                                    @if(isset($order_product->product->unit_type->name))
                                                        {{$order_product->product->unit_type->name}}
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="width-33_3p text-center">
                                            <div class="">{{$order_product->qty}}</div>
                                        </td>
                                        <td class="width-33_3p text-right">
                                            <div class="w-600">
                                                &#8358; <span class="cash">{{number_format($order_product->product->price, 2)}}</span>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{-- Fri, March 24 --}} {{date('l, M d ', strtotime($order->created_at))}}</td>
                                        <td class="text-right no-bd">
                                            <button class="btn bg-transparent-black opacity-50 no-bd m-r-0 p-r-0 mores">Hide Full Reciept</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">No Processing Order</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>
            </div>
        @endif
        
        @if(count($confirmed_orders))
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">Confirmed Orders</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>


                 @foreach($confirmed_orders as $order)
                <div class="card">
                    <div class="header">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd opacity-50">Order #{{$order->order_unique_reference}}</td>

                                        <td class="no-bd text-right @if($order->payment_status =="paid") c-brand-green @else c-brand-red @endif" > @if($order->payment_status =="paid") Paid @else Not Paid @endif</td>

                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{$order->user_address->address}}</td>
                                        <td class="text-right no-bd"><button class="btn bg-transparent no-bd c-blue m-r-0 p-r-0">Cancel Order</button></td>
                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd"> 
                                            Delivery Fee : &#8358; @if(!empty($order->delivery_fee)) {{number_format($order->delivery_fee, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="p-t-14 no-bd"> 
                                            Service Charge : &#8358; @if(!empty($order->service_charge)) {{number_format($order->service_charge, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="content p-t-10">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 tables">
                                <tbody>
                                @foreach($order->order_products as $order_product)
                                    <tr>
                                        <td class="">
                                            <div class="clearfix">
                                                <div class="f-left p-r-15">
                                                    <img src="{{$order_product->product->name}}" class="width-40 h-40 bd-50p">
                                                </div>
                                                <div class="f-left">
                                                    <div>{{$order_product->product->name}}</div>
                                                    <div class="f-12 opacity-50">
                                                    @if(isset($order_product->product->unit_type->name))
                                                        {{$order_product->product->unit_type->name}}
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="width-33_3p text-center">
                                            <div class="">{{$order_product->qty}}</div>
                                        </td>
                                        <td class="width-33_3p text-right">
                                            <div class="w-600">
                                                &#8358; <span class="cash">{{number_format($order_product->product->price, 2)}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{-- Fri, March 24 --}} {{date('l, M d ', strtotime($order->created_at))}}</td>
                                        <td class="text-right no-bd">
                                            <button class="btn bg-transparent-black opacity-50 no-bd m-r-0 p-r-0 mores">Hide Full Reciept</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">No Order has been confirmed</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>
            </div>
        @endif
        
        @if(count($gone_to_market))
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">Gone to market Orders</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>


                 @foreach($gone_to_market as $order)
                <div class="card">
                    <div class="header">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd opacity-50">Order #{{$order->order_unique_reference}}</td>

                                        <td class="no-bd text-right @if($order->payment_status =="paid") c-brand-green @else c-brand-red @endif" > @if($order->payment_status =="paid") Paid @else Not Paid @endif</td>

                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{$order->user_address->address}}</td>
                                        {{-- <td class="text-right no-bd"><button class="btn bg-transparent no-bd c-blue m-r-0 p-r-0">Cancel Order</button></td> --}}
                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd"> 
                                            Delivery Fee : &#8358; @if(!empty($order->delivery_fee)) {{number_format($order->delivery_fee, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="p-t-14 no-bd"> 
                                            Service Charge : &#8358; @if(!empty($order->service_charge)) {{number_format($order->service_charge, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="content p-t-10">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 tables">
                                <tbody>
                                @foreach($order->order_products as $order_product)
                                    <tr>
                                        <td class="">
                                            <div class="clearfix">
                                                <div class="f-left p-r-15">
                                                    <img src="{{$order_product->product->name}}" class="width-40 h-40 bd-50p">
                                                </div>
                                                <div class="f-left">
                                                    <div>{{$order_product->product->name}}</div>
                                                    <div class="f-12 opacity-50">
                                                    @if(isset($order_product->product->unit_type->name))
                                                        {{$order_product->product->unit_type->name}}
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="width-33_3p text-center">
                                            <div class="">{{$order_product->qty}}</div>
                                        </td>
                                        <td class="width-33_3p text-right">
                                            <div class="w-600">
                                                &#8358; <span class="cash">{{number_format($order_product->product->price, 2)}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{-- Fri, March 24 --}} {{date('l, M d ', strtotime($order->created_at))}}</td>
                                        <td class="text-right no-bd">
                                            <button class="btn bg-transparent-black opacity-50 no-bd m-r-0 p-r-0 mores">Hide Full Reciept</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        @else

        @endif

        @if(count($completed_orders))
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">Completed Orders</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>


                 @foreach($completed_orders as $order)
                <div class="card">
                    <div class="header">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd opacity-50">Order #{{$order->order_unique_reference}}</td>

                                        <td class="no-bd text-right @if($order->payment_status =="paid") c-brand-green @else c-brand-red @endif" > @if($order->payment_status =="paid") Paid @else Not Paid @endif</td>

                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{$order->user_address->address}}</td>
                                        {{-- <td class="text-right no-bd"><button class="btn bg-transparent no-bd c-blue m-r-0 p-r-0">Cancel Order</button></td> --}}
                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd"> 
                                            Delivery Fee : &#8358; @if(!empty($order->delivery_fee)) {{number_format($order->delivery_fee, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="p-t-14 no-bd"> 
                                            Service Charge : &#8358; @if(!empty($order->service_charge)) {{number_format($order->service_charge, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="content p-t-10">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 tables">
                                <tbody>
                                @foreach($order->order_products as $order_product)
                                    <tr>
                                        <td class="">
                                            <div class="clearfix">
                                                <div class="f-left p-r-15">
                                                    <img src="{{$order_product->product->name}}" class="width-40 h-40 bd-50p">
                                                </div>
                                                <div class="f-left">
                                                    <div>{{$order_product->product->name}}</div>
                                                    <div class="f-12 opacity-50">
                                                    @if(isset($order_product->product->unit_type->name))
                                                        {{$order_product->product->unit_type->name}}
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="width-33_3p text-center">
                                            <div class="">{{$order_product->qty}}</div>
                                        </td>
                                        <td class="width-33_3p text-right">
                                            <div class="w-600">
                                                &#8358; <span class="cash">{{number_format($order_product->product->price, 2)}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{-- Fri, March 24 --}} {{date('l, M d ', strtotime($order->created_at))}}</td>
                                        <td class="text-right no-bd">
                                            <button class="btn bg-transparent-black opacity-50 no-bd m-r-0 p-r-0 mores">Hide Full Reciept</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else

        @endif
        
        @if(count($cancelled_orders))
            <div class="col-md-12">
                <h2 class="m-t-0 w-400">Cancelled Orders</h2>
                <div>
                    <hr class="bd-top-gray">
                </div>


                 @foreach($cancelled_orders as $order)
                <div class="card">
                    <div class="header">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd opacity-50">Order #{{$order->order_unique_reference}}</td>

                                        <td class="no-bd text-right @if($order->payment_status =="paid") c-brand-green @else c-brand-red @endif" > @if($order->payment_status =="paid") Paid @else Not Paid @endif</td>

                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{$order->user_address->address}}</td>
                                        {{-- <td class="text-right no-bd"><button class="btn bg-transparent no-bd c-blue m-r-0 p-r-0">Cancel Order</button></td> --}}
                                    </tr>
                                    <tr>
                                        <td class="p-t-14 no-bd"> 
                                            Delivery Fee : &#8358; @if(!empty($order->delivery_fee)) {{number_format($order->delivery_fee, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td class="p-t-14 no-bd"> 
                                            Service Charge : &#8358; @if(!empty($order->service_charge)) {{number_format($order->service_charge, 1)}} @else 0.00 @endif

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="content p-t-10">
                        <div class="table-responsive">
                            <table class="table table-hover m-0 tables">
                                <tbody>
                                @foreach($order->order_products as $order_product)
                                    <tr>
                                        <td class="">
                                            <div class="clearfix">
                                                <div class="f-left p-r-15">
                                                    <img src="{{$order_product->product->name}}" class="width-40 h-40 bd-50p">
                                                </div>
                                                <div class="f-left">
                                                    <div>{{$order_product->product->name}}</div>
                                                    <div class="f-12 opacity-50">
                                                    @if(isset($order_product->product->unit_type->name))
                                                        {{$order_product->product->unit_type->name}}
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="width-33_3p text-center">
                                            <div class="">{{$order_product->qty}}</div>
                                        </td>
                                        <td class="width-33_3p text-right">
                                            <div class="w-600">
                                                &#8358; <span class="cash">{{number_format($order_product->product->price, 2)}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td class="p-t-14 no-bd">{{-- Fri, March 24 --}} {{date('l, M d ', strtotime($order->created_at))}}</td>
                                        <td class="text-right no-bd">
                                            <button class="btn bg-transparent-black opacity-50 no-bd m-r-0 p-r-0 mores">Hide Full Reciept</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        @if(!count($pending_orders) && !count($cancelled_orders) && !count($gone_to_market) && !count($completed_orders) && !count($confirmed_orders))

            <div class="col-md-12">
                <h2 class="m-t-0 w-400">You have not order any product yet,  <a href="{{url('/')}}" class="c-brand-green">Order now</a></h2>
                <div>
                    <hr class="bd-top-gray">
                </div>
            </div>
        @else

        @endif
        

    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->

@endsection