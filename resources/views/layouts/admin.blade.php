<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/backend/assets/images/logosmk.png')}}">
        <!-- App title -->
        <title>ComplaintZone</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{ asset('/backend/plugins/morris/morris.css')}}">

        <!-- App css -->
        <link href="{{ asset('/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('/backend/plugins/switchery/switchery.min.css')}}">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}"></script>
        <![endif]-->

        <script src="{{ asset('/backend/assets/js/modernizr.min.js')}}"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>SMK <span> assalaam</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{ asset('/backend/assets/images/logo.png')}}" alt="" height="30">
                        </span>
                        <i>
                            <img src="{{ asset('/backend/assets/images/logo_sm.png')}}" alt="" height="28">
                        </i>
                    </a> -->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    @include('partial.nav')
                </div>
                <!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                @include('partial.side')
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                    </div> <!-- container -->
                    <section class="content">
                    @include('layouts._flash')
                    @yield('content')
                    </section>
                </div> <!-- content -->
                <!-- Footer -->
                <footer class="footer text-right">
                    @include('partial.footer')
                </div>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('/backend/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/detect.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/fastclick.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/waves.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('/backend/plugins/switchery/switchery.min.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{ asset('/backend/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('/backend/plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!--Morris Chart-->
		<script src="{{ asset('/backend/plugins/morris/morris.min.js')}}"></script>
		<script src="{{ asset('/backend/plugins/raphael/raphael-min.js')}}"></script>

        <!-- Dashboard init -->
        <script src="{{ asset('/backend/assets/pages/jquery.dashboard.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('/backend/assets/js/jquery.core.js')}}"></script>
        <script src="{{ asset('/backend/assets/js/jquery.app.js')}}"></script>

    </body>
</html>