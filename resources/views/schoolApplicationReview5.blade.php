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
            <div class="row">
                <input value="{{$applicant_id}}" name="applicant_id" id="applicant_id" type="number" class="validate" readonly>
                <label for="applicant_id">Applicant ID</label>
            </div>
            <div class="header">Applicant has siblings in same school</div>
            <div class="row">
                <div class="input-field col s1">

                    <label for="no">No.</label>
                </div>
                <div class="input-field col s8">

                    <label for="des">Admission no.</label>
                </div>

            </div>
            <br><br>
            @for($i=1;$i<=3;$i++)
                <div class="row">
                    <div class="input-field col s1">

                        <label for="no{{$i}}">{{$i}}</label>
                    </div>
                    <div class="input-field col s5">
                        <input name="admission_no{{$i}}" id="admission_no{{$i}}" type="text" class="validate">

                    </div>

                </div>
            @endfor

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