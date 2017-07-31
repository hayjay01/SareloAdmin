@extends('layouts.dashboard')
    @section('title')
        Dashboard | Manage Admin
    @endsection
    @section('content')
        <div class="page-container">
            <div class="page-sidebar-wrapper">
                @include('layouts.dashboard_sidebar')
            </div>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Manage Admin</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                   				<div class="well">
                                   					<form action="" method="POST" role="form">
                                                               {{csrf_field()}}
                                   						
                                   						<legend><center>
                                   							Create Administrator
                                   						</center></legend>

                                   						@if (session('success'))
                                                                   <div class="alert alert-success">
                                                                       {{ session('success') }}
                                                                   </div>
                                                               @elseif(session('delete_message'))
                                                                   <div class="alert alert-danger">
                                                                       {{ session('delete_message') }}
                                                                   </div>
                                                                   
                                                               @endif
                                   						<div class="form-group">
                                   							<label for="">Email:</label>
                                   							<input type="text" name="email" class="form-control" id="" placeholder="Email address here"> <br>
                                   								@if ($errors->has('email')) <p class="help-block" style="color: red">{{ $errors->first('email') }}</p> @endif
                                   						</div>
                                   						<div class="form-group">
                                   							<label for="">Password:</label>
                                   							<input type="password" name="password" class="form-control" id="" placeholder="Password here"> <br>
                                   								@if ($errors->has('password')) <p class="help-block" style="color: red">{{ $errors->first('password') }}</p> @endif

                                   						</div>
                                   						<div class="form-group">
                                   							<label for="">Confirm Password:</label>
                                   							<input type="password" name="confirm_password" class="form-control" id="" placeholder="Confirm password"> <br>
                                   								@if ($errors->has('confirm_password')) <p class="help-block" style="color: red">{{ $errors->first('confirm_password') }}</p> @endif
                                   						</div>
                                   						<center>
                                   							<button type="submit" class="btn btn-primary"> <i class="fa fa-key"></i> Signup</button>
                                   						</center>
                                   						
                                   					</form>
                                   				</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
@endsection
