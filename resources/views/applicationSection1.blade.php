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
        <form action="{{route('submitApplicant')}}" method="post">
            <div class="row">
                <div class="input-field col s4">
                    <input name="applicant_id" id="applicant_id" type="text" class="validate" readonly>
                    <label for="applicant_id">Applicant ID</label>
                </div>
                <div class="input-field col s4">
                    <input name="category" id="category" type="text" class="validate" required>
                    <label for="category">Category applied for</label>
                </div>
            </div>
                    <div class="header">Details of the Child</div>

                        <div class="row">
                            <div class="input-field col s7">
                                <input name="full_name" id="full_name" type="text" class="validate" required>
                                <label for="full_name">Name in full</label>
                            </div>
                            <div class="input-field col s5">
                                <input name="initial" id="initials" type="text" class="validate" required>
                                <label for="initials">Name with initials</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field col s5">
                                    <label for="religion">Religion</label>
                                </div>
                                <div class="input-field col s7">
                                    <select name="religion" id="religion" class="browser-default">
                                        <option>Buddhism</option>
                                        <option>Hindu</option>
                                        <option>Islam</option>
                                        <option>Christian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field col s6">
                                    <label for="medium">Medium of learning</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="medium" id="medium" class="browser-default">
                                        <option>Sinhala</option>
                                        <option>Tamil</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <div class="input-field col s5">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="input-field col s7">
                                    <select name="gender" id="medium" class="browser-default">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <div class="input-field col s6">
                                    <label for="birth_day">Date of Birth :</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="birth_day" name="birth_day" type="date" class="picker-date" required>

                                </div>

                            </div>


                        </div>


            <button class="btn waves-effect waves-light" type="submit" name="action">Next
                <i class="material-icons right">send</i>
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
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