<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sarelo - Checkout Step:3</title>
        <!--my icons here -->
        <link rel="stylesheet" type="text/css" href="/assets/icon/font-awesome/css/font-awesome.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">
        <!-- Main CSS here -->
        <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
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

                                <li role="presentation"  class="active">
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
                                            <span class="badge bg-transparent">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Delivery Slot
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation"  class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">3</span>
                                            Confirmation
                                        </span>
                                    </a>
                                </li>

                                <li role="presentation"  class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">4</span>
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
                                        <i class="fa fa-clock-o c-brand-green f-27"></i> Choose Delivery Times
                                    </h4>
                                </div>
                                @if (session('error_message'))
                                    <div class="alert alert-warning">
                                        {{ session('error_message') }}
                                    </div>
                                @endif
                                <div class="content clearfix">
                                    <!--starts here -->
                                    <div class="card">
                                        <form method="post">
                                            <div class="tabcordion">
                                                <ul id="myTab" class="nav nav-tabs">
                                                    <?php $i = 0;?>
                                                    @foreach($slots as $key=>$value)
                                                    <li @if($i == 0) class="active delivery_date" @else class="delivery_date"@endif data-payload="{{date('Y-m-d', strtotime($key))}}">
                                                        <a href="#{{$key}}" data-toggle="tab">
                                                            @if($key == date('Y-m-d'))
                                                                <p>Today</p>
                                                            @else
                                                            <p>{{date('l', strtotime($key))}}</p>
                                                            @endif
                                                            <p>{{date('M d', strtotime($key))}}</p>
                                                        </a>
                                                    </li>
                                                    <?php $i++;?>
                                                    @endforeach
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <?php $j = 0; ?>
                                                    @foreach($slots as $key=>$value)
                                                    <div class="tab-pane fade @if($j == 0) active in @endif" id="{{$key}}">
                                                        <div class="table-responsive">
                                                            <table class="table border-bottom table-hover m-b-0">
                                                                <tbody>
                                                                    <?php $count = 0;?>
                                                                        @foreach($value as $slot_details)
                                                                        <tr>
                                                                            @if($slot_details->slot_available > $slot_details->used_count)
                                                                            <td class="p-t-14 @if($count == 0) no-bd @endif">{{$slot_details->time_range}}</td>

                                                                            <td class="text-right @if($count == 0) no-bd @endif">
                                                                                <label class="btn bg-transparent uppercase f-12">
                                                                                    choose
                                                                                    <input type="radio" value="{{$slot_details->id}}" name="slot_id"  class="addresses pos-abs">
                                                                                </label> <br>
                                                                                @if ($errors->has('slot_id'))
                                                                                    <span class="help-block" style="color: #a94442;">
                                                                                        <strong>{{ $errors->first('slot_id') }}</strong>
                                                                                    </span>
                                                                                @endif                                 
                                                                            </td>
                                                                            @else
                                                                            <td class="p-t-14 no-bd opacity-70">{{$slot_details->time_range}}</td>
                                                                            <td class="p-t-14 no-bd text-right">
                                                                        <label class="btn bg-transparent-black no-bd p-0 uppercase" disabled="">
                                                                            unavailable
                                                                             <input type="radio" name="slot" class="addresses pos-abs" disabled="">
                                                                        </label>
                                                                    </td>
                                                                    @endif
                                                                        </tr>
                                                                        <?php $count++;?>
                                                                        <?php $j++;?>
                                                                        @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{--<button class="btn btn-block bg-transparent-black text-center p-b-15 p-t-15">See more...</button>--}}
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                            <?php
                                            $slot_x = $slots;
                                            reset($slot_x);
                                            $first_key = key($slot_x);
                                            ?>
                                            <input type="hidden" class="delivery_date_v" name="delivery_date" value="{{$first_key}}">

                                    </div>
                                    <!-- starts here end -->
                                    <div class="clearfix p-r-20 p-l-20">
                                        <div class="f-left">
                                            <a href="/checkout/choose-address" class="btn btn-md bg-transparent f-18">Back</a>
                                        </div>
                                        <div class="f-right">
                                            <button type="submit" class="btn btn-md bg-brand-green f-18">Continue</button>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    </form>
                                </div>
                           </div>
                           <p class="text-center">*Terms and condtions apply on free delivery. <a href="#" class="c-brand-purple">Learn more</a></p>
                       </div>
                       <div class="col-md-4">
                           @include('checkout.billing-summary')
                       </div>
                   </div>
                </div>
            </section>
        </div>


        <!-- jQuery -->
        <script src="/assets/js/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/assets/js/main.js"></script>
         <script>
             $(document).ready(function(){
                 app.buttonChooser();
                 app.selectDeliveryDate();
             });
         </script>
    </body>
</html>