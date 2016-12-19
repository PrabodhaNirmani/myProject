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
                    <div class="col"><a  href="{{route('getDashboard')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Back to home" >
                            <i class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>

        </div>

    </nav>


@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2">Grade One Registration</h1>
        <h1 class="header center teal-text text-darken-2">Manage Session</h1>
        <div class="row">
            <form class="col s12" name="action" method="post" id="action" action="#">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="date" class="datepicker">
                        <label for="session_date">Session Date</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="Activate" name="action">Activate
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <a href="#" class="waves-effect waves-light btn"><i class="material-icons right">verified_user</i>Deactivate</a>
            </form>
        </div>
        <br><br><br>
    </div>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>
@endsection


