@extends('mine.master2')

@section('title')
    Register Page
@endsection

@section('header')
    <nav class="teal" role="navigation">
        <div class="nav-wrapper ">
            <a id="logo-container" href="#" class="brand-logo left">
                <i class="material-icons">visibility</i>iSolve
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <div class="col"><a  href="#"
                                         class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Back to home" >
                            <i class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('loginView')}}" >Sign in</a></div>
                </li>
            </ul>

        </div>

    </nav>


@endsection

@section('body')

    <div class="container">
        <br><br>
        @if ($error!= null)
            <div class="card-panel #ef9a9a red lighten-3" align="center"><h5>{{$error}}</h5></div>
        @endif
        <br><br>
        <h1 class="header center teal-text text-darken-2">User Sign Up</h1>
        <div class="row">
            <form class="col s12" name="action" method="post" id="action" action="{{ route('signUp') }}">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="user_name" id="user_name" type="text" class="validate" required>
                        <label for="user_name">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="password" id="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="confirm_password" id="confirm_password" type="password" class="validate" required>
                        <label for="confirm_password">Confirm Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Sign Up
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>

        </div>
        <br><br><br>
    </div>

@endsection
