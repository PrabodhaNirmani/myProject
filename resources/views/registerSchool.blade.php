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

    <div class="container">
        <h1 class="header center teal-text text-darken-2">School Registration Form</h1>
        <div class="row">
            {{--routes--}}
            <form class="col s12" action="#" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="school_name" name="school_name" type="text" class="validate" required>
                        <label for="school_name">School Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <label for="district">District</label>
                    </div>
                    <div class="input-field col s4">
                        <select name="district" id="district" class="browser-default">
                            {{--<option disabled selected>District</option>--}}
                            @foreach($district_row as $row)
                                <option>{{$row[0]}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="address" id="address" type="text" class="validate" required>
                        <label for="address">Address</label>
                    </div>
                </div>
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
