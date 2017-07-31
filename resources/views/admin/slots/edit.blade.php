@extends('layouts.dashboard')
    @section('title')
        Dashboard | Update Slot
    @endsection

    @section('content')
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                @include('layouts.dashboard_sidebar')
                
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase"> Edit Slot {{$slot->id}} </span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper">
                                            <span> </span>
                                          
                                        </div>
                                        
                                        <a href="{{ url('/admin/slots/create') }}" title="Back">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                        </a>
                                        <br />
                                        <br />
                                        <div class="row">
                                            <form method="POST" action="{{url('admin/slots/update',$slot->id)}}">
                                                {{csrf_field()}}
                                                @if ($errors->any())
                                                    <ul class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <div class="col-lg-6">
                                                     <div class="form-group {{ $errors->has('day_of_week') ? 'has-error' : ''}}">
                                                        {!! Form::label('day_of_week', 'Day of week', ['class' => 'col-md-4 control-label']) !!}
                                                        <div class="col-md-6">
                                                            <select name="day_of_week" id="input" class="form-control" required="required">
                                                            @if($slot->day_of_week == 0)
                                                                <option value="0">Sunday</option>
                                                            @elseif($slot->day_of_week == 1)
                                                                <option value="1">Monday</option>
                                                            @elseif($slot->day_of_week == 2)
                                                                <option value="2">Tuesday</option>
                                                            @elseif($slot->day_of_week == 3)
                                                                <option value="3">Wednesday</option>
                                                            @elseif($slot->day_of_week == 4) 
                                                                <option value="4">Thursday</option>
                                                              
                                                            @elseif($slot->day_of_week == 5)
                                                                <option value="5">Friday</option>
                                                              
                                                            @elseif($slot->day_of_week == 6)
                                                                <option value="6">Saturday</option>
                                                            @else
                                                                <option value="">Select</option>
                                                            @endif
                                                                <option value="0">Sunday</option>
                                                                <option value="1">Monday</option>
                                                                <option value="2">Tuesday</option>
                                                                <option value="3">Wednesday</option>
                                                                <option value="4">Thursday</option>
                                                                <option value="5">Friday</option>
                                                                <option value="6">Saturday</option>
                                                            </select>
                                                            {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
                                                    </div> <br> <br> <br>

                                                     {!! Form::model($slot, [
                                                            
                                                            'class' => 'form-horizontal',
                                                            'files' => true
                                                        ]) !!}

                                                        <div class="form-group {{ $errors->has('time_range') ? 'has-error' : ''}}">
                                                            {!! Form::label('time_range', 'Time Range', ['class' => 'col-md-4 control-label']) !!}
                                                            <div class="col-md-6">
                                                                {!! Form::text('time_range', null, ['class' => 'form-control']) !!}
                                                                {!! $errors->first('time_range', '<p class="help-block">:message</p>') !!}
                                                            </div> <br> <br>
                                                        </div><div class="form-group {{ $errors->has('slot_available') ? 'has-error' : ''}}">
                                                            {!! Form::label('slot_available', 'No of slot available', ['class' => 'col-md-4 control-label']) !!}
                                                            <div class="col-md-6">
                                                                {!! Form::number('slot_available', null, ['class' => 'form-control']) !!}
                                                                {!! $errors->first('slot_available', '<p class="help-block">:message</p>') !!}
                                                            </div> <br> <br>
                                                        </div>

                                                        <div class="form-group">
                                                           <center>
                                                               <div class="col-md-offset-4 col-md-4">
                                                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Update', ['class' => 'btn btn-primary']) !!}
                                                                </div>
                                                           </center>
                                                        </div>


                                                        {!! Form::close() !!}
                                                </div>                                                
                                            </form>
                                        </div>
                                    </div>
                                    {{-- {{ $orders->links() }} --}}
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
        </div>
@endsection


