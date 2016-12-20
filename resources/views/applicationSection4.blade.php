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
            @if($error!=null)<br>
            <div class="container">
                <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
            </div>
            <br>
            @endif
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form method="post" action="{{route('submitGuardianPastPupil')}}">
            <div class="header">Children of Past Pupils</div>
            <div class="row">
                <input value="{{$applicant_id}}"  name="applicant_id" id="applicant_id" type="number" class="validate" readonly>
                <label for="applicant_id">Applicant ID</label>
            </div>
            <div class="row">
                <input name="membership_id" id="membership_id" type="number" class="validate" >
                <label for="membership_id">Membership ID of past pupil association</label>
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