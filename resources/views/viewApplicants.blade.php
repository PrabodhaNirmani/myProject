
@extends('mine.master2')
@section('title')
    Applicant List
@endsection
@section('header')

    @include('includes.header')
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">Applicant List</h1>
        <br><br><br>
    </div>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="appno" type="search" class="validate" required>
                    <label for="appno">Application number</label>
                </div>
                <button class="btn-floating btn-large" type="submit" name="action">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>
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
                        <td>{{$applicant[0]}}</td>
                        <td>{{$applicant[1]}}</td>
                        <td>{{$applicant[2]}}</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="view_appplication">View
                                Application
                                <i class="material-icons right">send</i>
                            </button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">

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