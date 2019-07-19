<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Halaman Login</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

                <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

        <!-- page specific plugin styles -->
    

        <!-- text fonts -->
        <link rel="stylesheet" href="{{asset('public/assets/css/fonts.googleapis.com.css')}}" />

        <!-- ace styles -->
        <link rel="stylesheet" href="{{asset('public/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="{{asset('public/assets/css/ace-skins.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/assets/css/ace-rtl.min.css')}}" />


        


        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="{{asset('public/assets/js/ace-extra.min.js')}}"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout blur-login">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-leaf green"></i>
                                    <span class="green">BMT</span>
                                    <span class="white" id="id-text2">AT-TAQWA</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">&copy; Muhammad Jabir</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h6 class="header blue lighter bigger center">
                                                <i class="ace-icon fa fa-users green"></i>
                                                Masukkan Username Dan Password
                                            </h6>

                                            <div class="space-6"></div>

                                            <form method="POST" action="{{ route('login') }}">
                                             @csrf
                                                <fieldset class="">
                                                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" value="{{ old('email') }}" placeholder="Username" name="email" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                        @if($errors->has('email'))
                                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                                        @endif
                                                    </label>
                                                    </div>

                                                    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" name="password" class="form-control" placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                        @if($errors->has('password'))
                                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                                        @endif
                                                    </label>
                                                    </div>
                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <input type="checkbox" {{ old('remember') ? 'checked' : '' }} class="ace" />
                                                            <span class="lbl"> Remember Me</span>
                                                        </label>

                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                            
                                            
                                        </div><!-- /.widget-main -->

                                        
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->

                                
                            </div><!-- /.position-relative -->

                            
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="{{asset('public/assets/js/jquery-2.1.4.min.js')}}"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

        <!-- inline scripts related to this page -->

    </body>
</html>
