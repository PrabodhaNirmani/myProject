@extends('mine.master2')

@section('title')
    Search Page
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">Search School</h1>
        <br><br><br>
    </div>
    <div class="container">
        {{--routes--}}
        <form action="#" method="post">
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
        @if($schools!=null)
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