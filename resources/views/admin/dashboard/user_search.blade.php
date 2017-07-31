@extends('layouts.dashboard')
    @section('title')
        Dashboard | Users
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
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Users' Profile</span>
                                    </div>
                                       <div class="actions">
                                         <form id="search_text" name="form_search" method="POST" action="{{url('admin/search_user')}}" class="form-inline">
                                         {{csrf_field()}}
                                           <div class="form-group">
                                             <div class="input-group">
                                              <input class="form-control" name="search" placeholder="Search for an order..." type="text">
                                              <span class="input-group-btn">
                                                 <input type="submit" class="btn btn-default"  value="Go!"/> 
                                              </span>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                                 @if(count($users) <= 0)
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3">
                                                    
                                                            <div class="row">
                                                                <h3> 
                                                                    <center>
                                                                        NO RESULT FOUND! FOR YOUR SEARCH <a href="{{url('admin/users')}}"><< back</a>
                                                                    </center>
                                                                </h3>
                                                            </div>
                                            </div>
                                        </div>

                                @else
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th> First name </th>
                                                <th> Last name</th>
                                                <th> Email </th>
                                                <th> Date registered </th>
                                                <th> Phone Number </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)

                                                <tr class="odd gradeX">
                                                    <td>
                                                        {{$user->first_name}} 
                                                    </td>

                                                    <td>
                                                        {{$user->last_name}} </a>
                                                    </td>

                                                    <td>
                                                        <a href="mailto:{{$user->email}}"> {{$user->email}} </a>
                                                    </td>

                                                    <td class="center">
                                                    @if(isset($user->created_at))
                                                     {{$user->created_at}} 
                                                    @endif
                                                     </td>
                                                    <td>

                                                    @if(isset($user->phone))
                                                        {{$user->phone}}
                                                    @else
                                                        {{"No Phone Number Uploaded"}}
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="{{url('admin/users',$user->id)}}" data-toggle="modal" class="btn btn-primary" >Full Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            
                                        </tbody>
                                    </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
@endsection
