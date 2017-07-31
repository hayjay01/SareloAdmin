@extends('layouts.dashboard')
    @section('title')
        Dashboard | Slots
    @endsection

    @section('content')
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
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
                             @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('delete_message'))
                                <div class="alert alert-danger">
                                    {{ session('delete_message') }}
                                </div>
                            @endif
                            
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase"> Slots </span>
                                        
                                    </div>
                              
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <div class="table-actions-wrapper">

                                            <span> </span>
                                            
                                        </div>
                                             <br> <br>
                                            <a href="{{ url('/admin/slots/create') }}" class="btn btn-success btn-sm" title="Add New Slot">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                            </a> <div class="pull-right">
                                                {{ $slots->links() }} 
                                            </div>   
                                            
                                        <br><br>
                                        <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_orders">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="10%"> S/N&nbsp;</th>
                                                    <th width="15%"> Time Range</th>
                                                    <th width="10%"> Day of Week </th>
                                                    <th width="10%"> Number of Slot Available </th>
                                                    <th width="15%"> Actions</th>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>
                                                <?php $num = 1; ?>
                                                <form method="POST" action="{{url('admin/slots/delete/,$slot->id')}}">
                                                    @foreach($slots as $item)
                                                        <tr>
                                                            <td>{{ $num++ }}</td>
                                                            <td>{{ $item->time_range }}</td>
                                                            
                                                                  <td> 
                                                                      @if($item->day_of_week == 0)
                                                                        {{ "Sunday" }} 
                                                                      @elseif($item->day_of_week == 1)
                                                                        {{ "Monday" }} 
                                                                      @elseif($item->day_of_week == 2)
                                                                        {{ "Tuesday"}}
                                                                      @elseif($item->day_of_week == 3)
                                                                        {{ "Wednesday" }} 
                                                                      @elseif($item->day_of_week == 4) 
                                                                        {{ "Thursday"}}
                                                                      @elseif($item->day_of_week == 5)
                                                                        {{ "Friday"}}
                                                                      @elseif($item->day_of_week == 6)
                                                                        {{ "Saturday" }} 
                                                                      @else
                                                                        {{"No date selected for this slot"}}
                                                                      @endif
                                                                  </td>  
                                                           
                                                                  
                                                            <td>{{ $item->slot_available }}</td>
                                                            <td>
                                                                
                                                                <a class="btn btn-primary btn-xs" href="{{ url('/admin/slots/edit/' . $item->id) }}" title="Edit Slot">Edit Slot</a>
                                                                {!! Form::open([
                                                                    'style' => 'display:inline'
                                                                ]) !!}
                                                                <a class="btn btn-danger btn-xs" id="a_del" href="{{ url('/admin/slots/delete/' . $item->id) }}" title="Delete Slot">Delete Slot</a>
                                                                {!! Form::close() !!}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </form>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination-wrapper"> {!! $slots->appends(['search' => Request::get('search')])->render() !!} </div>
                                    </div>
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
        <!-- END CONTAINER -->
@endsection
