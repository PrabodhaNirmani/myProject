@extends('mine.master2')

@section('title')
    Application Page
@endsection
@section('header')
    @include('includes.header')
@endsection

@section('body')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <h3 class="header center teal-text text-darken-2">Student Application Form</h3>
        <form method="post" action="{{route('submitGuardianPastPupil')}}">
            <div class="header">Children of Past Pupils</div>
            <div class="row">
                <input value="{{$applicant_id}}"  name="applicant_id" id="applicant_id" type="number" class="validate" readonly>
                <label for="applicant_id">Applicant ID</label>
            </div>
            <div class="row">
                <input name="membership_id" id="membership_id" type="number" class="validate" >
                <label for="membership_id">Membership ID of past pupil association</label>
            </div>


            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
            <input  type="hidden" name="_token" value="{{Session::token()}}">
        </form>


    </div>

    <br><br><br>



@endsection
@section('javascript')

    <script>
        $('.pushpin-demo-nav').each(function () {
            var $this = $(this);
            var $target = $('#' + $(this).attr('data-target'));
            $this.pushpin({
                top: $target.offset().top,
                bottom: $target.offset().top + $target.outerHeight() - $this.height()
            });
        });

        $(document).ready(function () {
            $('.target').pushpin({
                top: 0,
                bottom: 1000,
                offset: 0
            });
        });


    </script>
@endsection