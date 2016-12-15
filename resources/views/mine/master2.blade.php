<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::to('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::to('materialize/css/materialize.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::to('materialize/css/style.css') }}"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <!--<meta charset="UTF-8" /> -->
    <title>
        @yield('title')
    </title>
    @yield('header')
    @yield('style')

    <!--<link rel="icon" type="images/x-icon" href="{{ asset('favicon.ico') }}" />-->
</head>
<body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
{{--<script type="text/javascript" src="{{ asset('bundles/materialize/js/materialize.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ URL::to('materialize/js/init.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('materialize/js/materialize.js') }}"></script>
{{--{#<div id="index-banner" class="parallax-container">#}--}}
    {{--{#<div class="parallax"><img src="materialize/images/Pic6.png" alt="Unsplashed background img 1"></div>#}--}}
    {{--{#</div>#}--}}

@yield('body')
<div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="materialize/images/Pic5.png" alt="Unsplashed background img 3"></div>
</div>
<footer class="page-footer teal">
    <div class="col">
        <div class="row">
            <div class="col s9">
                <h5 class="white-text">Ministry of Education</h5>

            </div>

            <div class="col offset-l1">
                <h6 class="white-text">- Grade One Entry Evaluation System</h6>

            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="col offset-l1">

            <h6 align="right">iSolve Project by Thirasara, Prabodha, Saarrah and Surani</h6>
        </div>
    </div>
</footer>

</footer>
@yield('javascript')
</body>
</html>
