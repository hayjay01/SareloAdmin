<div class="page-sidebar-wrapper">
                                    <!-- BEGIN SIDEBAR -->
                                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                                    <div class="page-sidebar navbar-collapse collapse">
                                            <ul class="page-sidebar-menu m-t-0 m-b-0" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                                                <li class="nav-item open bd-gray-lite {{ \Request::path() == 'my-account' ? 'active' : '' }}">
                                                    <a href="/my-account" class="clearfix c-brand-green nav-link">
                                                        <span class="title pull-left">Account</span>
                                                        <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item bd-gray-lite {{ \Request::path() == 'my-orders' ? 'active' : '' }}">
                                                    <a href="/my-orders" class="clearfix c-brand-green nav-link">
                                                        <span class="title pull-left">My Orders</span>
                                                        <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item bd-gray-lite {{ \Request::path() == 'my-addresses' ? 'active' : '' }}">
                                                    <a href="/my-addresses" class="clearfix c-brand-green nav-link">
                                                        <span class="title pull-left">Addresses</span>
                                                        <span class="pull-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                                    </a>
                                                </li>

                                                <li class="nav-item bd-gray-lite">

                                                    <a class="clearfix c-brand-green nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        <span class="title pull-left">Log Out</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        <!-- END SIDEBAR MENU -->
                                    </div>
                                    <!-- END SIDEBAR -->
                                </div>