<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sarelo - Checkout Step:1</title>
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
                                <div class="content clearfix">
                                    <form id="addressForm" method="post" parsley-validate>
                                        {{ csrf_field() }}
                                        <fieldset>
                                            <h4 class="title">
                                                <i class="fa fa-map-marker c-brand-green f-27"></i>
                                                Enter Delivery Address
                                            </h4>
                                            <div class="row p-t-30">
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                        <label for="address" class="w-500">
                                                            Street Address
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="Street Address" value="{{old('address')}}" >
                                            
                                                            @if ($errors->has('address'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('address') }}</strong>
                                                                </span>
                                                            @endif
                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <label for="number" class="w-500">
                                                            Phone Number
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="text" class="form-control" id="number" value="{{old('phone')}}" name="phone" placeholder="Phone Number" >
                                                          @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                        <label for="city" class="w-500">
                                                            City
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="text" class="form-control" value="{{old('city')}}" id="city" name="city" placeholder="City" >
                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group{{ $errors->has('instruction') ? ' has-error' : '' }}">
                                                        <label for="instruction" class="w-500">
                                                            Instruction for Delivery <span class="opacity-50">(optional)</span>
                                                        </label>
                                                        <textarea class="form-control" name="instruction" id="instruction" placeholder="(e.g you have vicious dogs)">{{old('instruction')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="divider">
                                            <hr>
                                        </div>
                                        <fieldset>
                                            <h4 class="title">
                                                <i class="fa fa-user-circle-o c-brand-green f-27"></i>
                                                Personal Details
                                            </h4>
                                            <div class="row p-t-30">
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                        <label for="first_name" class="w-500">
                                                            First Name
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" >
                                                         @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                        <label for="last_name" class="w-500">
                                                            Last Name
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="text" class="form-control" id="last_name" value="{{old('last_name')}}" name="last_name" >
                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="w-500">
                                                            Email Address
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-b-20">
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="w-500">
                                                            Password
                                                            <sup class="important f-9">
                                                                <i class="fa fa-asterisk"></i>
                                                            </sup class="important f-9">
                                                        </label>
                                                       <input type="password" class="form-control" name="password" id="password" >
                                                       @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                         @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-md bg-brand-green pull-right f-18" id="submit">Continue</button>
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
        <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/assets/js/parsley.min.js"></script>
        <script src="/assets/js/main.js"></script>
        <script>
            {{-- app.validator(); --}}
        </script>

    </body>
</html>