<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/teacher/img/favicon.html">

    <title>پنل مدیریت</title>

    <!-- Bootstrap core CSS -->
    <link href="/teacher/css/bootstrap.min.css" rel="stylesheet">
    <link href="/teacher/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/teacher/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/teacher/css/style.css" rel="stylesheet">
    <link href="/teacher/css/style-responsive.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/teacher/js/html5shiv.js"></script>
    <script src="/teacher/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method="POST" action="{{ route('login')}}">
        @csrf
        <h2 class="form-signin-heading">ورود به پنل مدیریت</h2>
        <div class="login-wrap">
            @if(\Session::has('alert-failed'))
                <div class="fade in">
                    <p style="color: red">{!! \Session::get('alert-failed') !!} </p>
                </div>
            @endif
            <input type="text" name="username" class="form-control" placeholder="نام کاربری" value="{{ old('email') }}"
                   required autofocus>
            <input type="password" name="password" id="password" class="form-control" placeholder="کلمه عبور" required
                   autocomplete="current-password">
            <button class="btn btn-lg btn-login btn-block" type="submit">ورود</button>
        </div>
    </form>

</div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="/teacher/js/jquery.js"></script>
<script src="/teacher/js/bootstrap.min.js"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:57 GMT -->
</html>
