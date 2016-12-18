@extends('mine.master2')

@section('title')
    Register Page
@endsection

@section('header')
    @include('includes.header')


@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2">User Login</h1>
        <div class="row">
            <form class="col s12" name="action" method="post" id="action" action="{{ route('login') }}">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="username" id="username" type="text" class="validate" required>
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="password" id="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Login
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <a href ="{{route('signup')}}" class="waves-effect waves-light btn"><i class="material-icons right">verified_user</i>SINGUP</a>
            </form>

        </div>
        <br><br><br>
    </div>

@endsection
