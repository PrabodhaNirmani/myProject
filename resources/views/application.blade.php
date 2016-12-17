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
    <form class="col s12" name="action" method="post" id="action" action="{{ route('getApplicationPart1') }}">
        <div class="input-field col s6" >
            <input id="category" type="text" class="validate" required>
            <label for="category">Category applied for</label>
        </div>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>Details of the Child</div>
                <div class="collapsible-body">
                    <div class="container">

                        <div class="row">
                            <div class="input-field col s8">
                                <input  id="full_name" type="text" class="validate" required>
                                <label for="full_name">Name in full</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="initials" type="text" class="validate" required>
                                <label for="initials">Name with initials</label>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <input id="religion" type="text" class="validate" required>
                            <label for="religion">Religion</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <div class="input-field col s6">

                                    <p>
                                        <input class="with-gap" name="male" type="radio" id="male"  />
                                        <label for="male">Male</label>
                                    </p>

                                </div>
                                <div class="input-field col s6">
                                    <p>
                                        <input class="with-gap" name="female" type="radio" id="female"  />
                                        <label for="female">Female</label>
                                    </p>
                                </div>
                                <label for="gender">Gender</label>

                            </div>

                            <div class="input-field col s6">
                                <div class="input-field col s6">

                                    <p>
                                        <input class="with-gap" name="sinhala" type="radio" id="sinhala"  />
                                        <label for="sinhala">Sinhala</label>
                                    </p>

                                </div>
                                <div class="input-field col s6">
                                    <p>
                                        <input class="with-gap" name="tamil" type="radio" id="tamil"  />
                                        <label for="tamil">Tamil</label>
                                    </p>
                                </div>
                                <label for="medium">Medium of learning</label>

                            </div>
                        </div>
                        <div class="row input-field col">
                            <div class="input-field col s3">
                                <label for="bday">Date of Birth :</label>
                            </div>


                            <div class="input-field col s3">
                                <input  id="year1" type="text" class="validate" required>
                                <label for="year1">Year</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="month1" type="text" class="validate" required>
                                <label for="month1">Month</label>
                            </div>
                            <div class="input-field col s3">
                                <input  id="date1" type="text" class="validate" required>
                                <label for="date1">Date</label>
                            </div>
                        </div>
                        <div class="row input-field col">
                            <div class="input-field col s3">
                                <label for="age">Age :</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="year2" type="text" class="validate" required>
                                <label for="year2">Years</label>
                            </div>
                            <div class="input-field col s3">
                                <input  id="month2" type="text" class="validate" required>
                                <label for="month2">Months</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="date2" type="text" class="validate" required>
                                <label for="date2">Days</label>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
</ul>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>




</div>

<br><br><br>



@endsection
@section('javascript')

<script>
    $('.pushpin-demo-nav').each(function() {
        var $this = $(this);
        var $target = $('#' + $(this).attr('data-target'));
        $this.pushpin({
            top: $target.offset().top,
            bottom: $target.offset().top + $target.outerHeight() - $this.height()
        });
    });

    $(document).ready(function(){
        $('.target').pushpin({
            top: 0,
            bottom: 1000,
            offset: 0
        });
    });



</script>
@endsection