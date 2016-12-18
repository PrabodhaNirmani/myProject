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
                        <input id="address" type="text" class="validate" required>
                        <label for="address">Permanent Address</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="tele" type="text" class="validate" required>
                            <label for="tele">Telephone Number</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="district" type="text" class="validate" required>
                            <label for="district">Name of residential district</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="division" type="text" class="validate" required>
                            <label for="division">Divisional Secretary Area</label>
                        </div>
                        <div class="input-field col s5">
                            <input id="grama" type="text" class="validate" required>
                            <label for="grama">Grama Niladari Division</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="no" type="text" class="validate" required>
                            <label for="no">Division no.</label>
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