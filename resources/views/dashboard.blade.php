@extends ('mine.master1')

@section('title')
    Home Page
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

<style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        top: 30px;
        font-size: 17px;
    }

    .show {
        visibility: visible !important;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;}
        to {to: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
    }
</style>
@section('body')

    <div class="container">
        <div class="section">
            <!--   Icon Section   -->
            @if($user[1]=='student')
                <div class="row">
                    <div class="col s12 m3">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="{{ route('searchSchool') }}" data-activates="nav-mobile" class="wave-button-input teal-text">
                                    <i class="material-icons">search</i></a></h2>
                            <h5 class="center">
                                <a href="{{ route('searchSchool') }}" data-activates="nav-mobile" class="wave-button-input teal-text">Search</a></h5>

                            <p class="light" align="center">
                                Searching schools which are located in a particular district
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="{{ route('getApplicant') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">assignment</i></a></h2>
                            <h5 class="center">
                                <a href="{{ route('getApplicant') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    Apply</a></h5>

                            <p class="light" align="center">
                                Filling new application form
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m3">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">grade</i></a></h2>
                            <h5 class="center">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">Results</a></h5>

                            <p class="light" align="center">
                                Checking results of grade one entries
                            </p>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">mode_edit</i></a></h2>
                            <h5 class="center">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    Edit</a></h5>

                            <p class="light" align="center">
                                Editing submitted application form
                            </p>
                        </div>
                    </div>
                </div>
            @elseif($user[1]=='admin')
                <div class="row">

                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="{{ route('registerSchoolView') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">assignment</i></a></h2>
                            <h5 class="center">
                                <a href="{{ route('registerSchoolView') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    Register</a></h5>

                            <p class="light" align="center">
                                Register Schools in the System
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="{{route('manageSession')}}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">system_update_alt</i></a></h2>
                            <h5 class="center">
                                <a href="{{route('manageSession')}}" data-activates="nav-mobile" class="waves-button-input teal-text">Update</a></h5>

                            <p class="light" align="center">
                                Updating Sessions
                            </p>
                        </div>
                    </div>
                </div>

            @elseif($user[1]=='school')
                <div class="row">

                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="{{ route('viewApplicants')}}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">assignment</i></a></h2>
                            <h5 class="center">
                                <a href="{{ route('viewApplicants') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    Applicants</a></h5>

                            <p class="light" align="center">
                                Viewing applicants who choose the school in his preference list
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="# " data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">system_update_alt</i></a></h2>
                            <h5 class="center">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">Update</a></h5>

                            <p class="light" align="center">
                                Updating the number of vacancies left for the school in this year
                            </p>
                        </div>
                    </div>
                </div>

        </div>
        @endif
    </div>
    </div>

@endsection

@section('javascript')
    <div id="snackbar">Application was submitted successfully..</div>
    @if($done=="done")
        <script>
            window.onload =function myFunction() {
                var x = document.getElementById("snackbar")
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        </script>
    @endif

@endsection
