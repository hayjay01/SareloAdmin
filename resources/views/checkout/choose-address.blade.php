<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sarelo - Checkout Step:2</title>
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

                                <li role="presentation" class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-transparent">
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
                                                2
                                            </span>
                                            Delivery Slot
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="active">
                                    <a href="#">
                                        <span class="round-tab">
                                            <span class="badge bg-brand-green">3</span>
                                            Confirmation
                                        </span>
                                    </a>
                                </li>

                                <li role="presentation" class="active">
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
                           <div class="card" id="addressContent">
                                <div class="header">
                                    <h4 class="title">
                                        <i class="fa fa-map-marker c-brand-green f-27"></i> Choose Delivery Address
                                    </h4>
                                </div>
                               <form method="post">
                                    {{csrf_field()}}
                                    <?php $i = 0; ?>
                                    @foreach($addresses as $address)
                                        <div class="content p-t-10 clearfix m-t-20">
                                            <!--starts here -->
                                            <label class="@if($i == 0) bg-brand-purple-op @endif  card m-b-0 bd-brand-purple bd-4 width-100p pos-rel w-100">

                                                <div class="p-15 clearfix">
                                                    <p class="pull-left m-b-0 c-brand-purple"><span><i class="fa fa-home"></i></span> {{$address->address}}</p>
                                                    <div class="pull-right"><i class="fa fa-check-circle-o f-23 c-brand-purple"></i></div>
                                                </div>
                                                <input @if($i == 0) checked @endif type="radio" name="address" value="{{$address->id}}" class="addresses pos-abs">

                                            </label>
                                            <!-- starts here end -->
                                        </div>
                                    <?php $i++;?>
                                    @endforeach
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                <div class="content p-t-10 clearfix">
                                    <a href="/new-address" class="btn btn-block bg-white bd-gray bd-4">Add New Address</a>
                                </div>
                                <div class="content p-t-10">
                                    <div class="divider">
                                        <hr>
                                    </div>
                                </div>
                                <div class="content p-t-10">
                                    <div class="card no-bd m-b-0">
                                        <div class="row">
                                            <div class="col-md-8">
                                               <p>Phone Number 
                                                @if(!empty(auth()->user()->phone))
                                                    
                                                @else
                                                    <small style="color: #C75757; font-weight: bold;">
                                                        *Please, provide phone number
                                                    </small>
                                                @endif
                                               </p>
                                               <p class="w-600" id="editor">{{Auth::user()->phone}}</p>
                                               @if ($errors->has('receiver_no'))
                                                            <span class="help-block">
                                                                <strong>Phone number must be 11 digits</strong>
                                                            </span>
                                                 @endif
                                               <input type="hidden" name="receiver_no" id="receiverNo" value="{{Auth::user()->phone}}">
                                            </div>
                                            <div class="col-md-4">
                                               <button class="btn bg-white pull-right uppercase w-600" id="editBtn">edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content p-t-10 clearfix">
                                    <button class="btn btn-md bg-brand-green pull-right f-18">Continue</button>
                                </div>
                                </form>
                           </div>
                            <p class="text-center">*Terms and conditions apply on free delivery. <a href="#" class="c-brand-purple">Learn more</a></p>

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
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
         <script>
             $(document).ready(function(){

                app.radioChooser("bg-brand-purple-op");
                app.contentEditor();

             });
         </script>
    </body>
</html>