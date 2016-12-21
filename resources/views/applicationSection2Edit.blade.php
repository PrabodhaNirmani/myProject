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
                    <div id="my" class="col"><a  href="{{route('logout')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i class="material-icons">power_settings_new</i></a></div>
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
        <form method="post" action="{{route('submitApplicantGuardian')}}">

            <div class="row">
                <input value="{{$applicant_id}}" name="applicant_id" id="applicant_id" type="number" class="validate" readonly>
                <label for="applicant_id">Applicant ID</label>
            </div>
            <div class="header">Details of the Parent/Guardian</div>
            <div class="row">

                <div class="input-field col s2">
                    <label for="guardian_type">Guardian Type</label>
                </div>
                <div class="input-field col s2">
                    <select name="guardian_type" id="guardian_type" class="browser-default">
                        <option>Father</option>
                        <option>Mother</option>
                        <option>Guardian</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <input name="first_name" id="first_name" type="text" class="validate" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s4">
                    <input name="last_name" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="national_id_no" type="text" name="national_id_no" class="validate" required maxlength="10" minlength="10">
                    <label for="national_id_no">National Identity Card Number</label>
                </div>
                <div class="input-field col s5">
                    <input type="checkbox" class="filled-in" id="nationality_srilankan" name="nationality_srilankan" />
                    <label for="nationality_srilankan">Whether the Guardian is a SriLankan</label>
                </div>
                <div class="input-field col s3">

                    <div class="input-field col s5">
                        <label for="religion">Religion</label>
                    </div>
                    <div class="input-field col s7">
                        <select name="religion" id="religion" class="browser-default">
                            <option>Buddhism</option>
                            <option>Hindu</option>
                            <option>Islam</option>
                            <option>Christian</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="input-field col s12">
                {{--<input id="address" type="text" class="validate" required>--}}
                <div class="row">
                    <div class="input-field col s2">
                        <label for="address">Permanent Address :</label>
                    </div>
                    <div class="input-field col s1">
                        <input id="address_no" name="address_no" type="text" class="validate" required>
                        <label for="address_no">Street No.</label>

                    </div>
                    <div class="input-field col s3">
                        <input id="address_street" name="address_street" type="text" class="validate" required>
                        <label for="address_street">Street Name</label>

                    </div>
                    <div class="input-field col s3">
                        <input id="address_city" name="address_city" type="text" class="validate" required>
                        <label for="address_city">City</label>

                    </div>
                    <div class="input-field col s3">
                        <div class="input-field col s4">
                            <label for="district">District</label>
                        </div>
                        <div class="input-field col s8">
                            <select name="district" id="district" class="browser-default">
                                {{--<option disabled selected>District</option>--}}

                                @foreach($districts as $district)
                                    <option>{{$district[0]}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input name="tele_no" id="tele_no" type="number" class="validate" required>
                    <label for="tele_no">Telephone Number</label>
                </div>
                <div class="input-field col s5">
                    <input name="div_sec_area" id="div_sec_area" type="text" class="validate" required>
                    <label for="div_sec_area">Divisional Secretary Area</label>
                </div>
                <div class="input-field col s3">
                    <input name="grama_nil_res_no" id="grama_nil_res_no" type="text" class="validate" required>
                    <label for="grama_nil_res_no">Grama Niladari division no.</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Next
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