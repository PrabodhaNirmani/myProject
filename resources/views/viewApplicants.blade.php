
@extends('mine.master2')
@section('title')
    Applicant List
@endsection
@section('header')

    <nav class="teal" role="navigation">
        <div class="nav-wrapper ">
            <a id="logo-container" href="#" class="brand-logo left">
                <i class="material-icons">visibility</i>iSolve
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <div class="col">
                        <i class="material-icons">perm_identity</i>
                    </div>
                </li>
                <li>
                    <div class="col">
                        <?php


                        $user_name=Auth::user()->user_name;

                        ?>

                        {{$user_name}}
                    </div>

                </li>
                <li>
                    <div class="col"><a  href="{{route('getDashboard')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Back to home" >
                            <i id="my" class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i id="my" class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>

        </div>

    </nav>
    <style>
        #my {
            color: white;
        }
    </style>
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">Applicant List</h1>
        <br><br><br>
    </div>
    <div class="container">
        <div class="container">
        <form action="{{route('submitViewApplicants')}}" method="post">
            <div class="row">
                <div class="input-field col s11">
                    <input id="appno" name="applicant_id" type="search" class="validate" required>
                    <label for="appno">Application number</label>
                </div>
                <button class="btn-floating btn-large" type="submit" name="action">
                    <i class="material-icons">search</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </div>
        </form>
            </div>
        <br><br><br><br>

        @if($applicants != null)

            <table>
                <thead>
                <tr>
                    <th data-field="applicant_id">Applicant ID</th>
                    <th data-field="first_name">First Name</th>
                    <th data-field="last_name">Last Name</th>
                    <th data-field="view_application">View Application</th>
                </tr>
                </thead>
                <tbody>

                @foreach($applicants as $applicant)

                    <tr>
                        <td>{{$applicant['applicant_id']}}</td>
                        <td>{{$applicant['first_name']}}</td>
                        <td>{{$applicant['last_name']}}</td>
                        <td>
                            <a href ="reviewApplication/{{$applicant['applicant_id']}}" class="waves-effect waves-light btn"><i class="material-icons right">send</i>View Application</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        @else
            <div class="container col s10 offset-l1">
                <div class="card-panel #ef9a9a red lighten-3" align="center"><h5>{{$error}}</h5></div>
            </div>
            <br><br><br><br>
        @endif

        <br><br>
        <br><br>
    </div>

@endsection