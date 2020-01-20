<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
@yield('header')

    <!-- Bootstrap core CSS -->
    <link href="/teacher/css/bootstrap.min.css" rel="stylesheet">
    <link href="/teacher/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/teacher/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
{{--    <link href="/teacher/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet"/>--}}
    <!-- Custom styles for this template -->
    <link href="/teacher/css/style.css" rel="stylesheet">
    <link href="/teacher/css/style-responsive.css" rel="stylesheet"/>

    <!--right slidebar-->
    <link href="/teacher/css/slidebars.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/teacher/js/html5shiv.js"></script>
    <script src="/teacher/js/respond.min.js"></script>
    <![endif]-->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/teacher/js/jquery.js"></script>
    <script type="text/javascript" src="/teacher/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/teacher/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/teacher/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/teacher/js/jquery.scrollTo.min.js"></script>
    <script src="/teacher/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/teacher/js/respond.min.js"></script>

    <!--common script for all pages-->
    <script src="/teacher/js/common-scripts.js"></script>

    <!--right slidebar-->
    <script src="/teacher/js/slidebars.min.js"></script>

    @yield('links')

</head>
<body>

<section id="container" class="">

    @include('partials.header')
    @include('partials.sidebar')

    <!--content-->
        <section id="main-content">
            <section class="wrapper">
                <section class="panel">
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </section>
            </section>
        </section>
    <!--content end-->

</section>
@yield('scripts')
</body>
</html>
