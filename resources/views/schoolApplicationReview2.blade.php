@extends('mine.master2')
@section('title')
    Application Review
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
        <h3 class="header center teal-text text-darken-2">Application Review</h3>
        <div class="container" align="center">
            <ul class="pagination">
                <li class="disabled"><a href="reviewApplication/{{$applicant['applicant_id']}}"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="reviewApplication/{{$applicant['applicant_id']}}">1</a></li>
                <li class="waves-effect"><a href="2/{{$applicant['applicant_id']}}">2</a></li>
                <li class="waves-effect"><a href="3/{{$applicant['applicant_id']}}">3</a></li>
                <li class="waves-effect"><a href="4/{{$applicant['applicant_id']}}">4</a></li>
                <li class="waves-effect"><a href="5/{{$applicant['applicant_id']}}">5</a></li>
                <li class="waves-effect"><a href="3/{{$applicant['applicant_id']}}"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
        <br>
        <form action="#" method="post" >
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="applicant_id">Applicant ID</label>
                </div>
                <div class="col s3">
                    <input name="applicant_id" id="applicant_id" type="text" class="validate" value="{{$applicant['applicant_id']}}"  readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="category">Category applied for</label>
                </div>
                <div class="col s3">
                    <input name="category" id="category" type="text">
                </div>
            </div>


            <div class="divider container" ></div>
            <br>
            <div class="container col s3 offset-s3">
                <div class="header">Details of the Child</div>
            </div>

            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="first_name">First Name</label>
                </div>
                <div class="col s3">
                    <input name="first_name" id="first_name" type="text" class="validate" required value="{{$applicant['first_name']}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="col s3">
                    <input name="last_name" id="last_name" type="text" class="validate" required value="{{$applicant['last_name']}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="religion">Religion</label>
                </div>
                <div class="col s3">
                    <input name="religion" id="religion" type="text" class="validate" required value="{{$applicant['religion']}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="medium">Medium of learning</label>
                </div>
                <div class="col s3">
                    <input name="medium" id="medium" type="text" class="validate" required value="{{$applicant['medium']}}" readonly>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="gender">Gender</label>
                </div>
                <div class="col s3">
                    <input name="sex" id="sex" type="text" class="validate" required value="{{$applicant['sex']}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 offset-s2">
                    <label for="birth_day">Date of Birth :</label>
                </div>
                <div class="col s3">
                    <input id="birth_day" name="birth_day" type="date" class="validate" required value="{{$applicant['birth_day']}}" readonly>
                </div>
            </div>

            {{--<button class="btn waves-effect waves-light" type="submit" name="action">Next--}}
            {{--<i class="material-icons right">send</i>--}}
            {{--</button>--}}
            {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}
            <div align="center">
                <a href ="3/{{$applicant['applicant_id']}}" class="waves-effect waves-light btn"><i class="material-icons right">send</i>Next</a>
            </div>
        </form>
    </div>




    <br><br><br>



@endsection
@section('javascript')

    <script>

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

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