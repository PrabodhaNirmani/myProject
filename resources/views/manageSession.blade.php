@extends('mine.master2')

@section('title')
    Manage Session Page
@endsection
<style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 30px;
        font-size: 17px;
    }

    .show {
        visibility: visible !important;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
</style>
@section('header')
    <nav class="teal" role="navigation">
        <div class="nav-wrapper ">
            <a id="logo-container" href="#" class="brand-logo left">
                <i class="material-icons">visibility</i>iSolve
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <div class="col">
                        <i class="material-icons">perm_identity</i>
                    </div>
                </li>
                <li>
                    <div class="col">
                        <?php


                        $user_name=Auth::user()->user_name;

                        ?>

                        {{$user_name}}
                    </div>

                </li>
                <li>
                    <div class="col"><a  href="{{route('getDashboard')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Back to home" >
                            <i id="my" class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i id="my" class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>
        </div>
    </nav>
    <style>
        #my {
            color: white;
        }
    </style>
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2">Grade One Registration</h1>
        @if($year[0]==null or $flag[0]==0)
            <h1 class="header center teal-text text-darken-2">Session Deactivated</h1>
        @else
            <h1 class="header center teal-text text-darken-2">{{$year[0]}}</h1>
        @endif
        <div class="row">
            <form method="post" action={{route('submitManageSession')}}>
                <div class="row">
                    <div class="row">
                        <div class="input-field col s3">
                            <label for="session_date">The Age of an Applicant is until :</label>
                        </div>
                        <div class="input-field col s3">
                            <label for="date">{{$date[0]}}</label>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="input-field col s3">
                            <label for="change_row">Change Date :</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="session_date" name="session_date" type="date" class="datepicker" required>
                        </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Activate
                    <i class="material-icons right">done</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <a href="{{route('deactivateSession')}}" class="waves-effect waves-light btn"> <i class="material-icons right">lock_outline</i>Deactivate</a>
                <a href="{{route('evaluateResults')}}" class="waves-effect waves-light btn"> <i class="material-icons right">lock_outline</i>Evaluate Results</a>

            </form>

        </div>
        <br><br><br>
    </div>

@endsection

@section('javascript')
<div id="snackbar">          Results evaluated successfully..          </div>
@if($done=="done")
    <script>
        window.onload =function myFunction() {
            var x = document.getElementById("snackbar")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
@endif

@endsection


