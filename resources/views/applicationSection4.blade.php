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
        <form method="post" action="{{route('submitApplicationPart2')}}">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Details of the Guardian</div>
                    <div class="collapsible-body">
                        <div class="container">
                            <div class="row">
                                <div class="input-field col s8">
                                    <input id="full_name" type="text" class="validate" required>
                                    <label for="full_name">Name in full</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="initials" type="text" class="validate" required>
                                    <label for="initiials">Name with initials</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="id" type="text" class="validate" required>
                                    <label for="id">National Identity Card Number</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="nationality" type="text" class="validate" required>
                                    <label for="nationality">Nationality</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="religion" type="text" class="validate" required>
                                    <label for="religion">Religion</label>
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
                        </div>
                    </div>
                </li>
            </ul>
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