@extends('mine.master2')

@section('title')
    School Registration Page
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
                            <i class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}"  class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>

        </div>

    </nav>
@endsection

@section('body')
<br>
    <div class="container">
        @if ($error!= null)
            <div class="card-panel #ef9a9a red lighten-3" align="center"><h5>{{$error}}</h5></div>
        @endif
        @if ($done != null)
            <div class="card-panel #1de9b6 teal accent-3" align="center"><h5>{{$done}}</h5></div>
        @endif
        <h1 class="header center teal-text text-darken-2">School Registration Form</h1>

        <div class="row">
            {{--routes--}}
            <form class="col s12" action="{{route('registerSchool')}}" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="school_name" name="school_name" type="text" class="validate" required>
                        <label for="school_name">School Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <label for="school_type">School Type</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s2">
                        <input onclick= "document.getElementById('girls_school').checked = false;
                        document.getElementById('mixed_school').checked = false;" checked = "checked"
                         name="boys_school" type="radio" id="boys_school" />
                        <label for="boys_school">Boys School</label>
                    </div>
                    <div class="input-field col s2">
                        <input onclick= "document.getElementById('boys_school').checked = false;
                        document.getElementById('mixed_school').checked = false;"
                               name="girls_school" type="radio" id="girls_school" />
                        <label for="girls_school">Girls School</label>
                    </div>
                    <div class="input-field col s2">
                        <input onclick= "document.getElementById('boys_school').checked = false;
                        document.getElementById('girls_school').checked = false;"
                               name="mixed_school" type="radio" id="mixed_school" />
                        <label for="mixed_school">Mixed School</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s4">
                        <label for="address">School Address</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s2">
                        <label for="district">District</label>
                    </div>
                    <div class="input-field col s3">
                        <select name="district" id="district" class="browser-default">
                            {{--<option disabled selected>District</option>--}}
                            @foreach($district_row as $row)
                                <option>{{$row[0]}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="street" id="street" type="text" class="validate" required>
                        <label for="street">Street</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="city" id="city" type="text" class="validate" required>
                        <label for="city">City</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s4">
                        <label for="user_details">User Details</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="user_name" id="user_name" type="text" class="validate" required>
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="password" id="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <br><br><br>
    </div>

@endsection
