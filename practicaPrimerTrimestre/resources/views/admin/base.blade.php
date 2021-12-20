<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/admin/css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{ url('assets/admin/images/icons/css/font-awesome.css') }}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            
        <style>
            .sidebar{
                position: relative;
                left:0;
                top:20px;
            }
        </style>
    </head>
    <body>
        @yield('contentnavbar')
        @yield('sidebar')
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    
                    @yield('contentindex')
             
                    @yield('content')
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
            </div>
        </div>
        @yield('js')
        <script src="{{ url('assets/admin/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/admin/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/admin/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/admin/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/admin/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/admin/scripts/common.js') }}" type="text/javascript"></script>
        
      
    </body>
</html>
