@extends('mine.master2')

@section('title')
    Results Page
@endsection

@section('hesder')
    @include('includes.header')
@endsection

@section('body')

    <div class="container">
        <h1 class="header center teal-text text-darken-2 ">View Results</h1>
        <br><br><br>
    </div>
    <div class="container">
        {{--route--}}
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
    </div>

@endsection