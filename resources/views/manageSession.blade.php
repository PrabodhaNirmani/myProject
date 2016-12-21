@extends('mine.master2')

@section('title')
    Manage Session Page
@endsection

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
                            <input id="session_date" name="session_date" type="date" class="datepicker">
                        </div>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Activate
                    <i class="material-icons right">done</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                {{----}}
                {{--<button class="btn waves-effect waves-light" type="submit" name="action">Activate--}}
                {{--<i class="material-icons right">send</i>--}}
                {{--</button>--}}
                {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}
                <a href="{{route('deactivateSession')}}" class="waves-effect waves-light btn"> <i class="material-icons right">lock_outline</i>Deactivate</a>
                <a href="{{route('evaluateResults')}}" class="waves-effect waves-light btn"> <i class="material-icons right">lock_outline</i>Deactivate</a>
            </form>
        </div>
        <br><br><br>
    </div>
    {{--<script>--}}
    {{--$('.datepicker').pickadate({--}}
    {{--selectMonths: true, // Creates a dropdown to control month--}}
    {{--selectYears: 15 // Creates a dropdown of 15 years to control year--}}
    {{--});--}}
    {{--</script>--}}
@endsection


