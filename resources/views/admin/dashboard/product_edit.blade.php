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
                                {{-- <div id="error" style="display: none;" class="alert alert-danger">
                                   <span>Please Input a product name or price to search....</span>
                                </div> --}}

                            <form method="POST"  enctype='multipart/form-data' action="{{url('admin/products')}}" class="form-horizontal form-row-seperated" action="#">
                            {{csrf_field()}}
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-shopping-cart"></i>Add Product </div>
                                        <div class="actions btn-set">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                        <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Name:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="name" placeholder=""> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Description:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <textarea class="form-control" name="description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Unit:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="unit" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Unit Type:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <select name="unit_type_id" id="unit_type_id" class="form-control" required="required">
                                                                    <option value="">Select type</option>
                                                                    @foreach($unit_type as $unit_types)
                                                                         <option value="{{$unit_types->id}}">{{$unit_types->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Price:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control" name="price" placeholder=""> </div>
                                                        </div>


                                                        <div class="prod_im\g">
                                                            <div id="tab_images_uploader_container" class="margin-bottom-10">

                                                                <input type="file" name="product_image"  id="tab_images_uploader_pickfiles" href="javascript:;" class="btn btn-success">
                                                                </input>

                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success"><i class="fa fa-check"></i> Add</button>
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12">
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
