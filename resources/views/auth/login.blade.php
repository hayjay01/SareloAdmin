<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<style>
   
.loading {
  position: absolute;
  top: 25px;
  right: 10px;
  position: absolute;
  display: none;
}
.loading-bar {
  display: inline-block;
  width: 4px;
  height: 18px;
  border-radius: 4px;
  animation: loading 1s ease-in-out infinite;
}
.loading-bar:nth-child(1) {
  background-color: #3498db;
  animation-delay: 0;
}
.loading-bar:nth-child(2) {
  background-color: #c0392b;
  animation-delay: 0.09s;
}
.loading-bar:nth-child(3) {
  background-color: #f1c40f;
  animation-delay: .18s;
}
.loading-bar:nth-child(4) {
  background-color: #27ae60;
  animation-delay: .27s;
}

@keyframes loading {
  0% {
    transform: scale(1);
  }
  20% {
    transform: scale(1, 2.2);
  }
  40% {
    transform: scale(1);
  }
}
.or-separator:before, .or-separator:after {
    content: ' ';
    border-bottom: 1px solid #fff;
    width: 42%;
    display: block;
    position: absolute;
    top: 0.6em;
}
.login-box{
  margin-bottom: 20px;
  background: rgba(181,181,181,0.3);
  min-height: 50px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  position: relative;
  padding: 20px 20px 20px 20px;
  border-radius: 0px;
}

.login-box .logo a{
    display: flex;
}

.login-box .logo a img{
    margin: 0 auto;
}

.form-control {
    display: inline-block;
    width: 100%;
    height: auto;
    padding: 8px 12px;
    font-size: 13px;
    color: #555;
    border: 1px solid #d3d3d3;
    border-radius: 2px;
    -moz-transition: all .2s linear 0,box-shadow .2s linear 0;
    -o-transition: all .2s linear 0,box-shadow .2s linear 0;
    transition: all .2s linear 0,box-shadow .2s linear 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.form-control:focus {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    outline: 0;
}


#submit-form {
    margin: 20px auto;
    display: block;
}


</style>

<body class="clearfix">
    <div class="main clearfix">
        <div class="overlay">
            <!-- ===Nav bar starts here == -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!--<div class="navbar-header">
                        <a class="navbar-brand navbar-link" href="index.html">
                            <img src="assets/img/logo/sarelo2.svg">
                        </a>
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>-->
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li role="presentation" class="hidden">
                                <span>Already Have an account</span><br>
                                <a href="/signin" class="c-brand-purple"><span> Sign In</span></a>
                            </li>
                            <li class="hidden">
                                <div class="divider"></div>
                            </li>
                            <li role="presentation">
                                <span>No Account?</span><br>
                                <a href="/signup">
                                    <span>Sign Up</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- ===Nav bar endss here == -->

            <!-- ===Main contents begins here ==-->
            <div class="container clearfix" style="padding: 20px; width: 30%; margin: 0 auto; color: #222;">


                <!--login box in here -->
                <div class="login-box">
                  <!-- logo in here -->
                  <div class="logo">
                      <a href="/">
                         <img src="assets/img/logo/sarelo2.svg">
                      </a>
                  </div>
                  <div><br><br></div>
                    <form action="{{ route('login') }}" method="post" class="forms">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" name="email" placeholder="email@example.com" class="form-control" value="{{ old('email') }}" required autofocus/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         
                            <input type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-cart btn-block">Sign In</button>
                    </form>
                    </form>
                    <div class="or-separator">OR</div>
                    <div class="social-login">
                        <a href="/social/login/facebook" class="btn btn-block btn-facebook"><i class="fa fa-facebook m-r-20"></i> Sign in with Facebook</a>
                    </div>
                 
                </div>


            </div>

        </div>
    </div>
    <!-- BEGIN RIGHT MENU -->
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        
        $(document).ready(function(){
           // app.dataFetcher();
           app.fecther();
           app.cartCtrl();
        

           /* $('.loading').bind('ajaxStart', function(){
                $(this).show();
            }).bind('ajaxStop', function(){
                $(this).hide();
            });*/
            
        });
    </script>
</body>

</html>