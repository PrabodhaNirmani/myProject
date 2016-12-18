@extends('mine.master2')

@section('title')
    Application Page
@endsection
@section('header')
    @include('includes.header')
@endsection

@section('body')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form method="post" action="{{route('submitApplicantGuardian')}}">
                    <div class="header">Details of the Guardian</div>
                    <div class="row">
                        <div class="input-field col s8">
                            <input name="first_name" id="full_name" type="text" class="validate" required>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="last_name" id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="id" type="text" class="validate" required maxlength="10" minlength="10">
                            <label for="id">National Identity Card Number</label>
                        </div>
                        <div class="input-field col s5">
                            <input type="checkbox" class="filled-in" id="filled-in-box" name="nationality" />
                            <label for="filled-in-box">Whether Guardian is in SriLanka</label>

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
                                <input id="street_no" name="street_no" type="text" class="validate" required>
                                <label for="street_no">Street No.</label>

                            </div>
                            <div class="input-field col s3">
                                <input id="street_name" name="street_name" type="text" class="validate" required>
                                <label for="street_name">Street Name</label>

                            </div>
                            <div class="input-field col s3">
                                <input id="city" name="city" type="text" class="validate" required>
                                <label for="city">City</label>

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
                            <input name="secretary_division" id="secretary_division" type="text" class="validate" required>
                            <label for="secretary_division">Divisional Secretary Area</label>
                        </div>
                        <div class="input-field col s3">
                            <input name="grama_division_no" id="grama_division_no" type="text" class="validate" required>
                            <label for="grama_division_no">Grama Niladari division no.</label>
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