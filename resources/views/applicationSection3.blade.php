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

    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if($error!=null)<br>
        <div class="container">
            <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
        </div>
        <br>
        @endif
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form method="post" action="{{route('submitApplicantPriority')}}">
            <div class="row">
                <input value="{{$applicant_id}}" name="applicant_id" id="applicant_id" type="number" class="validate" readonly>
                <label for="applicant_id">Applicant ID</label>
            </div>
            <div class="header">The order of the preference to Schools</div>

                    <div class="row">
                        <div class="input-field col s1">
                            <label for="serial">Serial No.</label>
                        </div>
                        <div class="input-field col s5">
                            <label for="schools">Name of the School</label>
                        </div>

                        <div class="input-field col s3">
                            <label for="distance">Distance to the School from the place of residence</label>
                        </div>
                        <div class="input-field col s3">
                            <label for="no_of_schools">No. of schools passing from residence</label>
                        </div>
                    </div>
                    <br><br><br>

            <div class="row">
                <div class="input-field col s1" align="center">
                    <input name="no1" id="no1" type="text" class="validate" value="1" readonly>
                </div>
                <div class="input-field col s5">
                    {{--<input name="school{{$i}}" id="school{{$i}}" type="text" class="validate" required>--}}
                    <div class="row">



                            <select name="school1" id="school1" class="browser-default">
                                @foreach($schools as $school)
                                    <option>{{$school[0]}}-{{$school[1]}}</option>

                                @endforeach
                            </select>

                    </div>
                </div>

                <div class="input-field col s3">
                    <input name="distance1" id="distance1" type="text" class="validate" required>
                </div>
                <div class="input-field col s3">
                    <input name="no_schools1" id="no_schools1" type="text" class="validate" required>
                </div>
            </div>
                    @for($i=2;$i<=5;$i++)

                    <div class="row">
                        <div class="input-field col s1" align="center">
                            <input name="no{{$i}}" id="no{{$i}}" type="text" class="validate" value="{{$i}}" readonly>
                        </div>
                        <div class="input-field col s5">
                            {{--<input name="school{{$i}}" id="school{{$i}}" type="text" class="validate" required>--}}
                            <div class="row">



                                    <select name="school{{$i}}" id="guardian_type" class="browser-default">
                                        @foreach($schools as $school)
                                            <option>{{$school[0]}}-{{$school[1]}}</option>

                                        @endforeach
                                    </select>

                            </div>
                        </div>

                        <div class="input-field col s3">
                            <input name="distance{{$i}}" id="distance{{$i}}" type="text" class="validate">
                        </div>
                        <div class="input-field col s3">
                            <input name="no_schools{{$i}}" id="no_schools{{$i}}" type="text" class="validate">
                        </div>
                    </div>
                    @endfor
                    {{--<div class="row">--}}
                        {{--<div class="input-field col s1">--}}
                            {{--<label for="no2">2.</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s5">--}}
                            {{--<input id="school1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s4">--}}
                            {{--<input id="type1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s2">--}}
                            {{--<input id="dist1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="input-field col s1">--}}
                            {{--<label for="no3">3.</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s5">--}}
                            {{--<input id="school1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s4">--}}
                            {{--<input id="type1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s2">--}}
                            {{--<input id="dist1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="input-field col s1">--}}
                            {{--<label for="no4">4.</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s5">--}}
                            {{--<input id="school1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s4">--}}
                            {{--<input id="type1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s2">--}}
                            {{--<input id="dist1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="input-field col s1">--}}
                            {{--<label for="no5">5.</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s5">--}}
                            {{--<input id="school1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s4">--}}
                            {{--<input id="type1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s2">--}}
                            {{--<input id="dist1" type="text" class="validate" required>--}}
                        {{--</div>--}}
                    {{--</div>--}}



            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">
        </form>


    </div>

    <br><br><br>



@endsection
@section('javascript')

    <script>
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