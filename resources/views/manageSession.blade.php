@extends('mine.master2')

@section('title')
    Manage Session Page
@endsection

@section('header')
    @include('includes.header')


@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2">Grade One Registration</h1>
        <h1 class="header center teal-text text-darken-2">Manage Session</h1>
        <div class="row">
            <form class="col s12" name="action" method="post" id="action" action="#">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="date" class="datepicker">
                        <label for="session_date">Session Date</label>
                    </div>
                </div>
                 <button class="btn waves-effect waves-light" type="Activate" name="action">Activate
                    <i class="material-icons right">send</i>
                </button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <a href ="#" class="waves-effect waves-light btn"><i class="material-icons right">verified_user</i>Deactivate</a>
            </form>

        </div>
        <br><br><br>
    </div>

@endsection
<script>
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

</script>