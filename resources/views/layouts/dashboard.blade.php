<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        {{-- <link href="/dashboard/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" /> --}}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/dashboard/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/dashboard/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/dashboard/assets/layouts/layout4/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/dashboard/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <style type="text/css">
        #payment_message{
            display:none;
        }
        #order_message{
            display:none;
        }
        #edit_each_product{
            display: none;
        }
        #current_status{
            background-color: white;
            color: #222;
            font-weight: bold;
        }
        .dataTables_extended_wrapper div.dataTables_info, .dataTables_extended_wrapper div.dataTables_length, .dataTables_extended_wrapper div.dataTables_paginate{
            display: none;
        }
    </style>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{url('/admin/')}}">
                        <img src="/dashboard/assets/layouts/layout4/img/sarelo2.svg" alt="Sarelo" class="logo-default" />
                    </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="page-top">
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="separator hide"> </li>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <li class="separator hide"> </li>
                            <li class="separator hide"> </li>
                            <li class="dropdown dropdown-user dropdown-dark" style="margin-top: 10px;">
                                <a href="{{url('admin/logout')}}" >
                                    <span style="color: #222; cursor: default;" class="username username-hide-on-mobile"><b> {{$email}} </b>| </span>
                                    <span class="username username-hide-on-mobile"> Logout
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li class="divider"> </li>

                                    <li>
                                        <a href="{{url('admin/logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->

            @yield('content')

                <div class="page-footer">

            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        
        <script src="/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        {{-- <script src="/dashboard/assets/global/plugins/jquery.min.js" type="text/javascript"></script> --}}
        <script src="/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        
        <script src="/dashboard/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/dashboard/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/dashboard/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/dashboard/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        {{-- <script src="/dashboard/assets/pages/scripts/ecommerce-orders.min.js" type="text/javascript"></script> --}}
                <script src="/dashboard/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/dashboard/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/dashboard/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          
            function ConfirmDelete()
              {
              var x = confirm("Are you sure you want to delete?");
              if (x)
                return true;
              else
                return false;
              }
              $("a#a_del").click(function(){
               return ConfirmDelete();
              });
              $("button#a_del").click(function(){
               return ConfirmDelete();
              });
        </script>
        <script type="text/javascript">
            $('.updateStatus').change(function(){

                var status = $(this).find('option:selected').val();

                var id = $(this).data("payload");

                $.ajax({
                        url: "/admin/update_status/"+id,
                        type: "POST",
                        data: {status:status},
                        success: function(data){
                            displayMessage(status, id);
                            $("#"+id).html(data);
                        },error:function(){
                            alert("Please pick a valid order status");
                        }
                });

            });


            function displayMessage(status, id) {
                $("#"+id).css('color', '#fff');
                    $("#order_message").show()
                setTimeout(function(){
                    $("#order_message").hide()
                },3000);
                $("#payment_message").hide();



                switch (status) {
                    case "Delivered":
                        $("#"+id).css('background-color', '#5cb85c').css('color','white');

                        $("#"+id).html('Delivered');
                        break;
                    case "Processing":
                        $("#"+id).css('background-color', 'orange');
                        $("#"+id).html('Processing');
                        break;
                    case "Confirmed":
                        $("#"+id).css('background-color', '#22b9b7');
                        $("#"+id).html('Confirmed');
                        break;
                    case "Gone to Market":
                        $("#"+id).css('background-color', '#b92296').css('color', '#ffffff');
                        $("#"+id).html('Gone to Market');
                    default:
                        break;
                }
            }

                 $('.paymentStatus').change(function(){

                    var payment_status = $(this).find('option:selected').val();
                    var pay_id = $(this).data("payload");
                    $.ajax({
                            url: "/admin/payment_status/"+pay_id,
                            type: "POST",
                            data: {payment_status:payment_status},
                            success: function(data){
                                paymentMessage(payment_status, pay_id);
                                $("#payment"+pay_id).html(data);
                            },error:function(){
                                alert("Please pick a valid payment status");
                            }
                    });

                });


            function paymentMessage(payment_status, pay_id) {
                $("#payment"+pay_id).css('color', '#fff');
                    $("#payment_message").show()
                setTimeout(function(){
                    $("#payment_message").hide()
                },3000);
                $("#order_message").hide();
                switch (payment_status) {
                    case "Pending":
                        $("#payment"+pay_id).css('background-color', 'orange').css('color','white');
                        $("#payment"+pay_id).text('Pending');
                        break;
                    case "Cancel":
                        $("#payment"+pay_id).css('background-color', 'red');
                        $("#payment"+pay_id).text('Cancel');
                        break;
                    case "Successfull":
                        $("#payment"+pay_id).css('background-color', '#22b9b7');
                        $("#payment"+pay_id).text('Successfull');
                        break;
                    default:
                        break;
                }
            }

            // $("#submit_search").click(function(){
            //     var text = $("#search_text").val();
            //     if ($("#search_text").val() == '') {
            //         alert('Please input a product name to search..');
            //         return false;
            //     }else{
                   
            //     }
            // });
            // $.ajax({
            //                 url: "/admin/category",
            //                 type: "POST",
            //                 data: {payment_status:payment_status},
            //                 success: function(data){
            //                     paymentMessage(payment_status, pay_id);
            //                     $("#payment"+pay_id).html(data);
            //                 },error:function(){
            //                     alert("Please pick a valid payment status");
            //                 }
            //         });
            </script>
    </body>

</html>
