@extends('mine.master2')

@section('title')
    Results Page
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

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">View Results</h1>
        <br><br><br>
    </div>
    <div class="container">
        {{--route--}}
        <form action="{{route('submitApplicant')}}" method="post">
            <div class="row">
                <div class="col s10">
                    <div class="input-field col s6">
                        <input id="district" type="search" class="validate" required>
                        <label for="district">District</label>
                    </div>
                </div>
                <div class="col s1">#}
                    <button class="btn-floating btn-large" type="submit" name="action">
                        <i class="material-icons">search</i>
                    </button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </div>
        </form>
        <br><br>
        <br><br>
    </div>

@endsection