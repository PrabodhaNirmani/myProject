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
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form method="post" action="{{route('submitApplicantSibling')}}">
            <div class="header">Children of Past Pupils</div>
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
            <div class="row">
                <p >
                    I here by declare that my child is not attending any government school; government approved private school or any other school at present for his/her studies.
                    I also declare that the details furnished above are true and correct and I agree further to submit satisfactory evidence relating to my permanent resident and other information indicated here
                    I am also aware that my application rejected if any information furnished by me is found to be false/forged.
                    If it is revealed after the admission of my child that the information furnished is false/forged
                    I agree to remove my child from the school and admit him/her to another school in the area nominated by the Department of Education.
                </p>

                <input class="with-gap" name="agree" type="checkbox" id="agree" required />
                <label for="agree">I Agree with the declaration</label>
                <br><br>
            </div>


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