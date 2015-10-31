<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8;FF=3;OtherUA=4" />
    <meta charset="utf-8" />
    <title>Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="{!! asset('pages/assets/plugins/pace/pace-theme-flash.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('pages/assets/plugins/boostrapv3/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('pages/assets/plugins/font-awesome/css/font-awesome.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('pages/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') !!}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{!! asset('pages/pages/css/pages-icons.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('pages/pages/css/pages.css') !!}" class="main-stylesheet" rel="stylesheet" type="text/css" />

    <!--[if lte IE 9]>
    <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{!! asset('pages/pages/css/windows.chrome.fix.css') !!}" />'
        }
    </script>
</head>
<body class="fixed-header">

@include('partials.sidepanel')

@yield('page_content')

<!-- BEGIN VENDOR JS -->
<script src="{!! asset('pages/assets/plugins/pace/pace.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('pages/assets/plugins/jquery/jquery-1.11.1.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('pages/assets/plugins/modernizr.custom.js') !!}" type="text/javascript"></script>
<script src="{!! asset('pages/assets/plugins/boostrapv3/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('pages/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') !!}"></script>
<!-- END VENDOR JS -->

<!-- BEGIN CORE TEMPLATE JS -->
<script src="{!! asset('pages/pages/js/pages.min.js') !!}"></script>
<!-- END CORE TEMPLATE JS -->

<!-- BEGIN PAGE LEVEL JS -->
@yield('page_scripts')
<!-- END PAGE LEVEL JS -->


</body>
</html>