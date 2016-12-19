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
        <form method="post" action="{{route('submitApplicantSibling')}}">
                <div class="header">Children of Past Pupils</div>
                <div class="row">
                    <div class="input-field col s1">
                        <label for="no">No.</label>
                    </div>
                    <div class="input-field col s8">
                        <label for="des">Description</label>
                    </div>
                    <div class="input-field col s3">
                        <label for="marks">Marks (For Office Use Only)</label>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="input-field col s1">
                        <label for="no1">1.</label>
                    </div>
                    <div class="input-field col s8">
                        <div class="row">
                            <label for="desc1">Period spent in the school as a pupil</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s3">
                                <input id="fromD" type="text" class="validate">
                                <label for="fromD">From</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="toD" type="text" class="validate">
                                <label for="toD">To</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="fromG" type="text" class="validate">
                                <label for="fromG">From Grade</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="toG" type="text" class="validate">
                                <label for="toG">To Grade</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-field col s3">

                        <input id="mark1" type="text" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s1">

                        <label for="no2">2.</label>
                    </div>
                    <div class="input-field col s8">
                        <textarea id="desc2" class="materialize-textarea"></textarea>
                        <label for="desc2">Educational Achievements during school Time</label>
                    </div>
                    <div class="input-field col s3">

                        <input id="mark2" type="text" class="validate">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s1">

                        <label for="no3">3.</label>
                    </div>
                    <div class="input-field col s8">

                        <textarea id="desc3" class="materialize-textarea"></textarea>
                        <label for="desc3">Extra curriculum activities during school Time</label>
                    </div>

                    <div class="input-field col s3">

                        <input id="mark3" type="text" class="validate" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s1">

                        <label for="no4">4.</label>
                    </div>
                    <div class="input-field col s8">

                        <textarea id="desc4" class="materialize-textarea"></textarea>
                        <label for="desc4">Membership in past pupils association and other details</label>
                    </div>

                    <div class="input-field col s3">

                        <input id="mark4" type="text" class="validate" required>
                    </div>
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