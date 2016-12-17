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
    <form action="post">
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
                <div class="collapsible-header"><i class="material-icons">place</i>Details of the Guardian</div>
                <div class="collapsible-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s8">
                                <input  id="full_name" type="text" class="validate" required>
                                <label for="full_name">Name in full</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="initials" type="text" class="validate" required>
                                <label for="initiials">Name with initials</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6" >
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
            <li>
                <div class="collapsible-header"><i class="material-icons">whatshot</i>The order of the preference to Schools</div>
                <div class="collapsible-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="serial">Serial No.</label>
                            </div>
                            <div class="input-field col s5">

                                <label for="schools">Name of the School</label>
                            </div>
                            <div class="input-field col s4">

                                <label for="catSchool">Category of school (National/Provincial)</label>
                            </div>
                            <div class="input-field col s2">

                                <label for="distance">Distance to the School from the place of residence</label>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no1">1.</label>
                            </div>
                            <div class="input-field col s5">

                                <input id="school1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s4">

                                <input id="type1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s2">

                                <input id="dist1" type="text" class="validate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no2">2.</label>
                            </div>
                            <div class="input-field col s5">

                                <input id="school1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s4">

                                <input id="type1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s2">

                                <input id="dist1" type="text" class="validate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no3">3.</label>
                            </div>
                            <div class="input-field col s5">

                                <input id="school1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s4">

                                <input id="type1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s2">

                                <input id="dist1" type="text" class="validate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no4">4.</label>
                            </div>
                            <div class="input-field col s5">

                                <input id="school1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s4">

                                <input id="type1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s2">

                                <input id="dist1" type="text" class="validate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no5">5.</label>
                            </div>
                            <div class="input-field col s5">

                                <input id="school1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s4">

                                <input id="type1" type="text" class="validate"  required>
                            </div>
                            <div class="input-field col s2">

                                <input id="dist1" type="text" class="validate" required>
                            </div>
                        </div>

                    </div>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">supervisor_account</i>Children of Past Pupils</div>
                <div class="collapsible-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no">No.</label>
                            </div>
                            <div class="input-field col s8">

                                <label for="des">Description</label>
                            </div>

                            <div class="input-field col s3">

                                <label for="marks">Marks (For Office Use Only)</label>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no1">1.</label>
                            </div>
                            <div class="input-field col s8">
                                <div class="row">
                                    <label for="desc1">Period spent in the school as a pupil</label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s3">
                                        <input id="fromD" type="text" class="validate">
                                        <label for="fromD">From</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="toD" type="text" class="validate">
                                        <label for="toD">To</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="fromG" type="text" class="validate">
                                        <label for="fromG">From Grade</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="toG" type="text" class="validate">
                                        <label for="toG">To Grade</label>
                                    </div>
                                </div>
                            </div>

                            <div class="input-field col s3">

                                <input id="mark1" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no2">2.</label>
                            </div>
                            <div class="input-field col s8">
                                <textarea id="desc2" class="materialize-textarea"></textarea>
                                <label for="desc2">Educational Achievements during school Time</label>
                            </div>
                            <div class="input-field col s3">

                                <input id="mark2" type="text" class="validate" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no3">3.</label>
                            </div>
                            <div class="input-field col s8">

                                <textarea id="desc3" class="materialize-textarea"></textarea>
                                <label for="desc3">Extra curriculum activities during school Time</label>
                            </div>

                            <div class="input-field col s3">

                                <input id="mark3" type="text" class="validate" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no4">4.</label>
                            </div>
                            <div class="input-field col s8">

                                <textarea id="desc4" class="materialize-textarea"></textarea>
                                <label for="desc4">Membership in past pupils association and other details</label>
                            </div>

                            <div class="input-field col s3">

                                <input id="mark4" type="text" class="validate" required>
                            </div>
                        </div>


                    </div>
                </div>

            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">stars</i>Siblings Studying in the same School</div>
                <div class="collapsible-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no">No.</label>
                            </div>
                            <div class="input-field col s8">

                                <label for="des">Description</label>
                            </div>

                            <div class="input-field col s3">

                                <label for="marks">Marks (For Office Use Only)</label>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no1">1.</label>
                            </div>
                            <div class="input-field col s9">
                                <label for="no1">Details of siblings</label>
                                <br><br>
                                <div class="row">
                                    <div class="input-field col s1">

                                        <label for="no">No.</label>
                                    </div>
                                    <div class="input-field col s5">

                                        <label for="name">Name of the child</label>
                                    </div>
                                    <div class="input-field col s3">

                                        <label for="grade">Grade and Admission No.</label>
                                    </div>
                                    <div class="input-field col s3">

                                        <label for="toG">Admission grade and grades spent</label>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="input-field col s1">

                                        <label for="no1">1.</label>
                                    </div>
                                    <div class="input-field col s5">
                                        <input id="name1" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="grade1" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="admission1" type="text" class="validate">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s1">

                                        <label for="no2">2.</label>
                                    </div>
                                    <div class="input-field col s5">
                                        <input id="name2" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="grade2" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="admission2" type="text" class="validate">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s1">

                                        <label for="no3">3.</label>
                                    </div>
                                    <div class="input-field col s5">
                                        <input id="name3" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="grade3" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="admission3" type="text" class="validate">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s1">

                                        <label for="no4">4.</label>
                                    </div>
                                    <div class="input-field col s5">
                                        <input id="name4" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="grade4" type="text" class="validate">

                                    </div>
                                    <div class="input-field col s3">
                                        <input id="admission4" type="text" class="validate">

                                    </div>
                                </div>
                            </div>

                            <div class="input-field col s2">

                                <input id="mark1" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no2">2.</label>
                            </div>
                            <div class="input-field col s9">
                                <textarea id="desc2" class="materialize-textarea"></textarea>
                                <label for="desc2">Achievements gained for school by brothers and sisters</label>
                            </div>
                            <div class="input-field col s2">

                                <input id="mark2" type="text" class="validate" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s1">

                                <label for="no3">3.</label>
                            </div>
                            <div class="input-field col s9">

                                <textarea id="desc3" class="materialize-textarea"></textarea>
                                <label for="desc3">Other details</label>
                            </div>

                            <div class="input-field col s2">

                                <input id="mark3" type="text" class="validate" required>
                            </div>
                        </div>


                    </div>
                </div>

            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">spellcheck</i>Declaration</div>
                <div class="collapsible-body">
                    <div class="container">
                        <p >
                            I hereby declare that my child is not attending any government school; government approved private school or any other school at present for his/her studies.
                            I also declare that the details furnished above are true and correct and I agree further to submit satisfactory evidence relating to my permanent resident and other information indicated here
                            I am also aware that my application rejected if any information furnished by me is found to be false/forged.
                            If it is revealed after the admission of my child that the information furnished is false/forged
                            I agree to remove my child from the school and admit him/her to another school in the area nominated by the Department of Education.
                        </p>

                        <input class="with-gap" name="agree" type="checkbox" id="agree" required />
                        <label for="agree">I Agree with the declaration</label>
                        <br><br>
                    </div>
                </div>

            </li>
        </ul>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
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