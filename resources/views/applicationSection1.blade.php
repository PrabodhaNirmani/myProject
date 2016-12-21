@extends('mine.master2')

@section('title')
    Application Page
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

    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if($error!=null)<br>
        <div class="container">
            <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
        </div>
        <br>
        @endif
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form action="{{route('submitApplicant')}}" method="post">
            <div class="row">
                <div class="input-field col s4">
                    <input name="applicant_id" id="applicant_id" type="text" class="validate" value="{{$applicant_id}}"  readonly>
                    <label for="applicant_id">Applicant ID</label>
                </div>
                {{--<div class="input-field col s4">--}}
                    {{--<input name="category" id="category" type="text" class="validate" required>--}}
                    {{--<label for="category">Category applied for</label>--}}
                {{--</div>--}}
            </div>
            <div class="header">Details of the Child</div>

            <div class="row">
                <div class="input-field col s7">
                    <input name="first_name" id="first_name" type="text" class="validate" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s5">
                    <input name="last_name" id="last_name" type="text" class="validate" required>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field col s5">
                        <label for="religion">Religion</label>
                    </div>
                    <div class="input-field col s7">
                        <select name="religion" id="religion" class="browser-default">
                            <option>Buddhism</option>
                            <option>Hinduisn</option>
                            <option>Islam</option>
                            <option>Christianity</option>
                        </select>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field col s6">
                        <label for="medium">Medium of learning</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="medium" id="medium" class="browser-default">
                            <option>Sinhala</option>
                            <option>Tamil</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <div class="input-field col s5">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="input-field col s7">
                        <select name="sex" id="sex" class="browser-default">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="input-field col s6">
                    <div class="input-field col s6">
                        <label for="birth_day">Date of Birth :</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="birth_day" name="birth_day" type="date" class="datepicker" max="{{date("Y/m/d")}}" required>
                        {{--<input type="date" class="">--}}
                    </div>

                </div>


            </div>


            <button class="btn waves-effect waves-light" type="submit" name="action">Next
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>


    </div>

    <br><br><br>



@endsection
@section('javascript')

    <script>

//        $('.datepicker').pickadate({
//            selectMonths: true, // Creates a dropdown to control month
//            selectYears: 15 // Creates a dropdown of 15 years to control year
//        });

        $('.pushpin-demo-nav').each(function () {
            var $this = $(this);
            var $target = $('#' + $(this).attr('data-target'));
            $this.pushpin({
                top: $target.offset().top,
                bottom: $target.offset().top + $target.outerHeight() - $this.height()
            });
        });

        $(document).ready(function () {
            $('.target').pushpin({
                top: 0,
                bottom: 1000,
                offset: 0
            });
        });

    </script>
@endsection