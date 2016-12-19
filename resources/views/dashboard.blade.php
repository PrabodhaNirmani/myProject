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
                    <div class="col"><a  href="{{route('logout')}}" >Sign in</a></div>
                </li>
            </ul>

        </div>

    </nav>
@endsection

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
                                <a href="{{ route('registerSchool') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">assignment</i></a></h2>
                            <h5 class="center">
                                <a href="{{ route('registerSchool') }}" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    Register</a></h5>

                            <p class="light" align="center">
                                Register Schools in the System
                            </p>
                        </div>
                    </div>

                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center brown-text">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                                    <i class="material-icons">system_update_alt</i></a></h2>
                            <h5 class="center">
                                <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">Update</a></h5>

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

    <script>
        $(document).ready(function () {
            $(".button-collapse").sideNav();
            $('.collapsible').collapsible();
        });
    </script>

@endsection
