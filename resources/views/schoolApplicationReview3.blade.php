@extends('mine.master2')
@section('title')
    Application Review
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
        <h3 class="header center teal-text text-darken-2">Application Review</h3>
        <div class="container" align="center">
            <ul class="pagination">
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="waves-effect"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="active"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!">6</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
        <br>
        <form action="4/{{$applicant_id}}" method="post" >

            <div class="divider" ></div>
            <br>
            <div class="col s3 offset-s1">
                <div class="header">Guardian Past Pupil Details</div>
            </div>
            <br><br>
            <div class="row">
                <div class="input-field col s2 offset-s1">
                    <label for="admission_id">Admission Id</label>
                </div>
                <div class="col s2">
                    <input name="admission_id" id="admission_id" type="text" class="validate" value="{{$guardian['past_stu_id']}}"  readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 offset-s1">
                    <label for="reg_date">Registered date</label>
                </div>
                <div class="col s2">
                    <input name="reg_date" id="reg_date" type="text" class="validate" value="{{$reg_date}}"  readonly>
                </div>
                <div class="input-field col s2">
                    <label for="school_left_date">School Left Date</label>
                </div>
                <div class="col s2">
                    <input name="school_left_date" id="school_left_date" type="text" class="validate" value="{{$guardian['school_left_date']}}"  readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2 offset-s1">
                    <label for="membership_date">Membership Date</label>
                </div>
                <div class="col s2">
                    <input name="membership_date" id="membership_date" type="text" class="validate" value="{{$guardian['membership_date']}}"  readonly>
                </div>
                <div class="input-field col s2">
                    <label for="membership_id">Membership ID</label>
                </div>
                <div class="col s2">
                    <input name="membership_id" id="membership_id" type="text" class="validate" value="{{$guardian['membership_id']}}"  readonly>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s2">
                    <input onclick= "document.getElementById('deduct').checked = false;
                        document.getElementById('add_mark').disabled = false;
                        document.getElementById('deduct_mark').disabled = true;"
                           name="add" type="radio" id="add" />
                    <label for="add">Add Marks for Past Student</label>
                </div>
                <div class="input-field col s2">
                    <input name="add_mark" id="add_mark" type="number" disabled = "disabled">
                </div>
            </div>
            <div class="row">


                <div class="input-field col s2">
                    <input onclick= "document.getElementById('add').checked = false;
                        document.getElementById('add_mark').disabled = true;
                        document.getElementById('deduct_mark').disabled = false;"
                           name="deduct" type="radio" id="deduct" />
                    <label for="deduct">Deduct Marks for Past Student</label>
                </div>

                <div class="input-field col s2">
                    <input name="deduct_mark" id="deduct_mark" type="number" disabled ="disabled">
                </div>
            </div>

            <br><br>
            <div align="center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Next
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </div>
        </form>
    </div>







@endsection
@section('javascript')

    <script>

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

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