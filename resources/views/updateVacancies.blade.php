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
        <h1 class="header center teal-text text-darken-2">Update Vacancies</h1>
        <div class="row">
            <form class="col s12" method="post" action="{{route('saveUpdateVacancies')}}" >
                <div class="row">
                    <div class="input-field col s6">
                        <input id="school_id" id="school_id" type="number" class="validate" value="{{$school[0]}}"
                               readonly>
                        <label for="school_id">School ID.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="school_name" id="school_name" type="text" class="validate" value="{{ $school[1] }}"
                               readonly>
                        <label for="school_name">School Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <?php
                        if($school[2]==null)
                            $vacancies=0;
                        else
                            $vacancies=$school[2];

                            ?>
                        <input name="current_value" id="current_value" type="number" class="validate" value="{{ $vacancies }}" readonly>
                        <label for="current_value">Current Value</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="new_value" id="new_value" type="number" class="validate" required>
                        <label for="new_value">New Value</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Save
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <br><br><br>
    </div>

@endsection