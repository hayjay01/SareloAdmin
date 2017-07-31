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
                                   							Moderate Admin
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
                                                <label for="">First name:</label>
                                                <input type="text" name="text" value="{{$admin->first_name}}" class="form-control" id="" placeholder=""> <br>
                                              </div>
                                              <div class="form-group">
                                                <label for="">Last name:</label>
                                                <input type="text" name="text" value="{{$admin->last_name}}" class="form-control" id="" placeholder=""> <br>
                                              </div>
                                   						<div class="form-group">
                                   							<label for="">Email:</label>
                                   							<input type="text" name="email" value="{{$admin->email}}" class="form-control" id="" placeholder="Email address here"> <br>
                                   								@if ($errors->has('email')) <p class="help-block" style="color: red">{{ $errors->first('email') }}</p> @endif
                                   						</div>
                                   						<center>
                                   							<button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Update </button>
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
