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
                        <div class="col-md-12">
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
                                        <span class="caption-subject bold uppercase"> Admins' Detail</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>
                                                         First name 
                                                    </center>
                                                 </th>
                                                 <th>
                                                    <center>
                                                         Last name 
                                                    </center>
                                                 </th>
                                                <th>
                                                    <center>
                                                         Email 
                                                    </center>
                                                 </th>
                                                <th> 
                                                    <center>
                                                        Date credit 
                                                    </center>
                                                </th>
                                                <th> 
                                                    <center>
                                                        Phone Number
                                                    </center>
                                                </th>
                                                 <th> 
                                                    <center>
                                                        Change Password
                                                    </center>
                                                </th>
                                                <th> 
                                                    <center>
                                                        Moderate
                                                    </center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admins as $admin)
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <center>
                                                            {{$admin->first_name}}
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            {{$admin->last_name}}
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="mailto:{{$admin->email}}"> {{$admin->email}} </a>
                                                        </center>
                                                    </td>
                                                    <td> 
                                                        <center>
                                                            {{$admin->created_at}}
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            {{$admin->phone}}
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="{{url('admin/change_password',$admin->id)}}">Change</a>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="{{url('admin/edit',$admin->id)}}" class="btn btn-sm btn-default margin-bottom" id="edit_product">
                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <a href="{{url('/admin/as/user',$admin->id)}}" class="btn btn-sm btn-danger margin-bottom" id="edit_product">
                                                                    <i class="fa fa-pencil"></i> Sat as User </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
@endsection
