<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sarelo - Checkout Step:5 (Payment)</title>
        <!--my icons here -->
        <link rel="stylesheet" type="text/css" href="/assets/icon/font-awesome/css/font-awesome.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">
        <!-- Main CSS here -->
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="/assets/icon/flaticon/flaticon.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

        <div class="wrapper clearfix">
            <header class="m-b-30">
                <!-- ===Nav bar starts here == -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid dis-flex">
                        <div class="navbar-header">
                            <a class="navbar-brand navbar-link" href="/">
                                <img src="/assets/img/logo/sarelo3.svg">
                            </a>
                        </div>

                    </div>
                </nav>
            <!-- ===Nav bar endss here == -->
                <!-- Progress -->
               <!--wizard here-->
               <div class="progressContainer dis-flex">
                    <div class="wizard">
                        <div class="wizard-inner">

                            <ul class="nav nav-tabs">

                                <li role="presentation" class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Address
                                        </span>
                                    </a>
                                </li>

                                <li role="presentation" class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Delivery Slot
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Confirmation
                                        </span>
                                    </a>
                                </li>

                                <li role="presentation"  class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-transparent">4</span>
                                            Payment
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
                <!-- wizard ended -->
               <!-- Progress -->
            </header>
            <section>
                <div class="container width-94p">
                   <div class="row">
                       <div class="col-md-8">
                           <div class="card">
                                <div class="header">
                                    <h4 class="title">
                                        <i class="flaticon-money c-brand-green"></i> Select Payment Method
                                    </h4>
                                </div>
                                <div class="content">
                                	<div class="row">
                                		<div class="col-md-4 col-sm-12 p-b-40">
                                			<label class="online-pay btn p-l-30 p-r-30 p-t-10 p-b-10 bg-transparent-black bd-gray" onclick="payWithPaystack({{$order->id}})">
                                				<input type="radio" name="bank" class="addresses">
                                                <span><i class="fa fa-credit-card"></i></span> Pay Online
                                			</label>
                                		</div>
                                		<div class="col-md-4 col-sm-12 p-b-40">
                                			<label class="btn p-l-30 p-r-30 p-t-10 p-b-10 bg-transparent-black bd-gray bg-dark">
                                                <input type="radio" name="bank" class="addresses">
                                				<span><i class="fa fa-university"></i></span> Bank Transfer
                                			</label>
                                		</div>

                                	</div>
                                	<p>Use the following details to pay via Bank transfer</p>
                                	<div class="p-l-30 p-b-60">
                                		<table>
                                			<tbody>
                                				<tr>
                                					<td class="p-b-10">Account Name</td>
                                					<td class="w-600 p-l-20 p-b-10">Sarelo Ltd</td>
                                				</tr>
                                				<tr>
                                					<td class="p-b-10">Account Number</td>
                                					<td class="w-600 p-l-20 p-b-10">0032014612</td>
                                				</tr>
                                			</tbody>
                                		</table>

                                        <div class="row">
                                            <p>Paying via mobile app? Use this number in the comment</p>
                                            <div class="w-600">
                                                <span id="copyTarget"> {{strtoupper($order->order_unique_reference)}}</span>
                                                <button id="copyButton" class="btn bg-transparent uppercase f-12">copy</button>
                                            </div>
                                        </div>
                                	</div>
                                	<div class="clearfix p-b-20">
                                	    {{-- <div class="f-left">
                                	        <button type="button" class="btn btn-md bg-transparent f-18">Back</button>
                                	    </div> --}}
                                	    <div class="f-right">
                                	        <a href="/checkout/bank/{{$order->order_unique_reference}}" type="button" class="btn btn-md bg-brand-green f-18">Continue</a>
                                	    </div>
                                	</div>
                                </div>
                           </div>
                            <p class="text-center">*Terms and conditions apply on free delivery. <a href="#" class="c-brand-purple">Learn more</a></p>

                       </div>
                       <div class="col-md-4">

                           <div class="card">
                                <div class="header">
                                    <h4 class="title">Cart Summary</h4>
                                </div>
                                <div class="content">
                                    <p class="category">The total cost is inclusive of tax, delivery and service charge.</p>

                                    <ul class="p-l-0 list-style-none">
                                        <li>
                                            <hr>
                                        </li>
                                        <li>
                                            <p class="menus">
                                                <span>Your Basket</span>
                                                <span class="pull-right">
                                                    &#8358;
                                                    <span class="cash">{{$order->orderProducts->sum('sub_total')}}</span>
                                                </span>
                                            </p>
                                        </li>

                                        <li>
                                            <p class="menus">
                                                <span>Service charge</span>
                                                <span class="pull-right">
                                                    &#8358;
                                                    <span class="cash">{{$charge_arr['service_charge']}}</span>
                                                </span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="menus">
                                                <span>Delivery Charge</span>
                                                <span class="pull-right">
                                                    &#8358;
                                                    <span class="cash">
                                                    {{$order->orderProducts->sum('sub_total') * 0.1}}
                                                    </span>
                                                </span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="menus">
                                                <span>Delivery Slot</span>
                                                <span class="pull-right">
                                                    <span class="cash">
                                                        {{$order->orderSlot->slot->time_range}}, {{date('l d M', strtotime($order->orderSlot->delivery_date))}}
                                                    </span>
                                                </span>
                                            </p>
                                        </li>
                                        <li>
                                            <hr>
                                        </li>
                                        <li>
                                            <p class="menus">
                                                <span>Total Due</span>
                                                <span class="pull-right c-brand-green f-20">
                                                    &#8358;
                                                    <span class="cash">{{number_format($order->total, 2)}}</span>
                                                </span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                           </div>
                       </div>
                       </div>
                   </div>
                </div>
            </section>
        </div>

        <script src="https://js.paystack.co/v1/inline.js"></script>
        <!-- jQuery -->
        <script src="/assets/js/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         <script src="/assets/js/main.js"></script>
         <script src="/js/payment.js"></script>
         <script>
            $(document).ready(function(){
                app.radioChooser("bg-dark");
                app.copyLinkCtrl();
            });
         </script>
    </body>
</html>