@extends('mine.master2')

@section('title')
    Register Page
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2">Update Vacancies</h1>
        <div class="row">
            <form class="col s12" name="action">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="currentvalue" type="number" class="validate" value="{{ vacancies }}" readonly>
                        <label for="currentvalue">Current Value</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="newvalue" type="text" class="validate" required>
                        <label for="newvalue">New Value</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Save
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <br><br><br>
    </div>

@endsection