<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Product Details</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ url('assets/plugins/morris/morris.css')}}">

        <link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

             @yield('stylesheet')
        <script src="{{ url('assets/js/modernizr.min.js')}}"></script>
    </head>
           

     <body class="center">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Header -->
            @include('include.header')
            <!-- /Header -->
            <br/><br/><br/><br/>
            <div class="content">
                @yield('content')
                 <div id="confirmModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Delete</h3>
                            </div>
                            <div class="modal-body">
                                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                            </div>
                            <div class="modal-footer">
                             <button name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>     
        </div>
            
        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ url('assets/js/jquery.min.js')}}"></script>
        <script src="{{ url('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ url('assets/js/detect.js')}}"></script>
        <script src="{{ url('assets/js/fastclick.js')}}"></script>

        <script src="{{ url('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ url('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{ url('assets/js/waves.js')}}"></script> 
        <script src="{{ url('assets/js/wow.min.js')}}"></script>
        <script src="{{ url('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{ url('assets/js/jquery.scrollTo.min.js')}}"></script>
       
       <script src="{{ url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        
        <script src="{{ url('assets/plugins/peity/jquery.peity.min.js')}}"></script>

        <!-- jQuery  -->
        <script src="{{ url('assets/plugins/waypoints/lib/jquery.waypoints.js')}}"></script>
        <script src="{{ url('assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

        <script src="{{ url('assets/plugins/raphael/raphael-min.js')}}"></script>
        <script src="{{ url('assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
        <script src="{{ url('assets/js/jquery.core.js')}}"></script>

        <script src="{{ url('assets/js/jquery.core.js')}}"></script>
        <script src="{{ url('assets/js/jquery.app.js')}}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script
            src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet"
            href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> 


        <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css')}}" integrity="sha256-Vzbj7sDDS/woiFS3uNKo8eIuni59rjyNGtXfstRzStA=" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha256-yt2kYMy0w8AbtF89WXb2P1rfjcP/HTHLT7097U8Y5b8=" crossorigin="anonymous"></script> 

        <script type="text/javascript">
            $('.iframe-btn').fancybox({  
                  'width'     : 900,
                  'height'    : 600,
                  'type'      : 'iframe',
                  'autoScale' : false,
            });

        function responsive_filemanager_callback(field_id){
              var url=jQuery('#'+field_id).val();
              $(".image-preview").attr('src','/storage/image_plugin/source/'+url);
            }
        </script>

         @yield('scripts')
         
    </body>
</html>