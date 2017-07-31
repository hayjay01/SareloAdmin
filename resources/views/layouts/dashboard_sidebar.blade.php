<div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <?php $uri = Request::path(); ?>
                        

                        <li @if($uri === "admin/dashboard") class="nav-item  active open" @else  class="nav-item" @endif >
                            <a href="{{url('/admin/dashboard')}}" class="nav-link ">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li @if($uri === "admin/orders") class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="{{url('/admin/orders')}}" class="nav-link ">
                                <i class="icon-basket"></i>
                                <span class="title">Orders</span>
                            </a>
                        </li>
                        
                        <li @if($uri === "admin/products") class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="{{url('/admin/products')}}" class="nav-link ">
                                <i class="icon-graph"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
                        <li @if($uri === "admin/unit-types" || $uri === "admin/unit-types/create") class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="{{url('/admin/unit-types')}}"  class="nav-link nav-toggle"> 
                                <i class=""></i>
                                <span class="title"> Unit Types</span>
                                <span class="selected"></span>
                                <span class="glyphicon glyphicon-chevron-down" style="color: #F90707;"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="nav-item  active open">
                                    <a href="{{url('admin/unit-types/create')}}" class="nav-link">
                                        <span class="title">Add Unit-Type</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/unit-types')}}" class="nav-link">
                                        <span class="title">Edit Unit-Type</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/unit-types')}}" class="nav-link">
                                        <span class="title">Delete Unit-Type</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if($uri === "admin/slots" || $uri === "admin/slots/create" ) class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="#"  class="nav-link nav-toggle"> 
                                <i></i>
                                <span class="title"> Slots</span>
                                <span class="selected"></span>
                                <span class="glyphicon glyphicon-chevron-down" style="color: #F90707;"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="nav-item  active open">
                                    <a href="{{url('admin/slots/create')}}" class="nav-link">
                                        <span class="title">Add Slot</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/slots')}}" class="nav-link">
                                        <span class="title">Edit Slot</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/slots')}}" class="nav-link">
                                        <span class="title">Delete Slot</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if($uri === "admin/users") class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="{{url('/admin/users')}}" class="nav-link ">
                                <i class=""></i>
                                <span class="title">Users</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li @if($uri === "admin/show" || $uri === "admin/create")   class="nav-item  active open" @else  class="nav-item" @endif>
                            <a href="{{url('/admin/show')}}" class="nav-link nav-toggle"> 
                                <i class=""></i>
                                <span class="title"> Manage Admin</span>
                                <span class="selected"></span>
                                <span class="glyphicon glyphicon-chevron-down" style="color: #F90707;"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                <li class="nav-item  active open">
                                    <a href="{{url('admin/create')}}" class="nav-link ">
                                        <span class="title"> Add Admin</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/show')}}" class="nav-link">
                                        <span class="title"> Edit Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
@yield('sidebar')
