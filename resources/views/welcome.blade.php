@extends ('mine.master1')
@section('title')

Home Page
@endsection
@section('header')


@include ('includes.header')
@endsection

@section('body')

<div class="container">

    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text">
                        <a href="#" data-activates="nav-mobile" class="wave-button-input teal-text">
                            <i class="material-icons">search</i></a></h2>
                    <h5 class="center">
                        <a href="#" data-activates="nav-mobile" class="wave-button-input teal-text">Search</a></h5>

                    <p class="light" align="center">
                        Searching schools which are located in a particular district
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text">
                        <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                            <i class="material-icons">assignment</i></a></h2>
                    <h5 class="center">
                        <a href="#" data-activates="nav-mobile" class="waves-button-input teal-text">
                            Register</a></h5>

                    <p class="light" align="center">
                        Register students
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
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
        </div>

    </div>
</div>


@endsection
@section('javascript')

<script>

    $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.collapsible').collapsible();
    });
</script>
@endsection
