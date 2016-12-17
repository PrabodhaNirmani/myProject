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
                        <input id="school_id" id="school_id" type="number" class="validate" value="{{ $vacancies }}" readonly>
                        <label for="school_id">School ID.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="school_name" id="school_name" type="text" class="validate" value="{{ $vacancies }}" readonly>
                        <label for="school_name">School Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="current_value" id="current_value" type="number" class="validate" value="{{ $vacancies }}" readonly>
                        <label for="current_value">Current Value</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s16">
                        <input name="new_value" id="new_value" type="text" class="validate" required>
                        <label for="new_value">New Value</label>
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