@extends('layouts.dashboard')
    @section('title')
        Dashboard | Product
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
                    
                    <span>



                    {{-- EDIT EACH PRODUCT ENDS --}}


                    <div class="row">
                        <div class="col-md-12" id="add_product">
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
                                
                        </div>

                        <div class="col-md-12">
                        @if(count($products) <= 0)
                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3">
                                            
                                                    <div class="row">
                                                        <h3> 
                                                            <center>
                                                                NO RESULT FOUND! FOR YOUR SEARCH <a href="{{url('admin/products')}}"><< back</a>
                                                            </center>
                                                        </h3>
                                                    </div>
                                    </div>
                                </div>

                        @else
                            <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>
                                            Product List
                                        </div>
                                        <div class="pull-right">
                                            <form id="search_text" name="form_search" method="POST" action="{{url('admin/search_product')}}" class="form-inline">
                                             {{csrf_field()}}
                                               <div class="form-group">
                                                 <div class="input-group">
                                                  <input class="form-control" name="search" placeholder="Search for a product..." type="text">
                                                  <span class="input-group-btn">
                                                     <input type="submit" class="btn btn-default" id="submit_search"  value="Go!"/> 
                                                  </span>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                     {{ $products->links() }}

                                    <div class="table-container">
                                        <table class="table table-striped table-bordered table-hover" id="datatable_history">
                                            <thead>
                                                <tr role="row" class="heading">
                                                    <th width="5%"> ID </th>
                                                    <th width="20%"> Product Name </th>
                                                    <th width="15%"> Price (&#8358;) </th>
                                                    <th width="15%"> Image </th>
                                                    <th width="15%"> Date Created </th>
                                                    <th width="25%"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $num = 1;
                                                ?>
                                                @foreach($products as $product)
                                                    <tr role="row" class="filter">
                                                        <td>
                                                            {{$num++}}
                                                        </td>
                                                        <td>
                                                            {{$product->name}}
                                                        </td>
                                                        <td>
                                                            {{$product->price}}
                                                        </td>
                                                        <td>
                                                            <div class="" style="background: #eee;">
                                                                <img class="" style="width: 100%; height: 80px;" src="{{env("MEDIA_CDN").$product->products_image}}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if(isset($product->created_at))
                                                                {{$product->updated_at}}
                                                                
                                                            @endif
                                                        </td>
                                                        <td>
                                                             <div class="margin-bottom-5">
                                                                <center>
                                                                    <a href="{{url('admin/products',$product->id)}}" class="btn btn-sm btn-default margin-bottom" id="edit_product">
                                                                    <i class="fa fa-pencil"></i> Edit</a>

                                                                <a id="a_del" href="{{url('admin/products/destroy',$product->id)}}" class="btn btn-sm btn-danger margin-bottom">
                                                                    <i class="fa fa-trash"></i> Delete</a>
                                                                </center>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                     {{ $products->links() }}
                            </div>
                        @endif
                        </div>
                    <!-- END PAGE BASE CONTENT -->
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->

            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
@endsection
