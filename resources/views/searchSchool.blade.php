@extends('mine.master2')

@section('title')
    Search Page
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
                            <i class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}"  class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>

        </div>

    </nav>
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">Search School</h1>
        <br>
    </div>
    <div class="container">
        {{--routes--}}
        <form action="{{route('searchSchoolResults')}}" method="post">
            <div class="row">
                <div class="col s10">
                    <div class="row">
                        <div class="input-field col s4">
                            <label for="district">District</label>
                        </div>
                        <div class="input-field col s4">
                            <select name="district" id="district" class="browser-default">
                                {{--<option disabled selected>District</option>--}}

                                @foreach($districts as $district)
                                    <option>{{$district[0]}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col s1">
                    <button class="btn-floating btn-large" type="submit" name="action">
                        <i class="material-icons">search</i>
                    </button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </div>
            </div>
        </form>


        @if($error!=null)
            <div class="container col s10 offset-l1">
                <div class="card-panel #ef9a9a red lighten-3" align="center"><h5>{{$error}}</h5></div>
            </div>
            <br><br>

        @elseif($schools!=null)
            <div class="container col s6 offset-l1">
                <div class="card-panel teal lighten-2" align="center"><h5>{{$city}}</h5></div>
            </div>
            <br><br>
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">School ID.</th>
                    <th data-field="name">School Name</th>
                    <th data-field="type">Type</th>
                    <th data-field="street">Street</th>
                    <th data-field="vacancies">No. of Vacancies</th>
                </tr>
                </thead>
                <tbody>

                @foreach($schools as $school)
                    <tr>
                        <td>{{$school[0]}}</td>
                        <td>{{$school[1]}}</td>
                        <td>{{$school[5]}}</td>
                        <td>{{$school[3]}}</td>
                        <td>{{$school[2]}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <br><br><br>
        @endif

    </div>

@endsection

