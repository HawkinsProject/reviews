<html>
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/review.css') }}">
</head>
<body>
<div class="row2">
    @auth <!--- user is logged in --->
        <form method="POST" action= "{{url('/logout')}}">
            {{csrf_field()}}
            <label>{{Auth::user()->name}} is logged in as a {{Auth::user()->type}}</label>
            <input class="right but" type="submit" value="Logout">
        </form>
    @else <!--- user is not logged in --->
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
</div>

    
    @yield('content')
</body>
</html>