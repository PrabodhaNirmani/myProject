@extends('mine.master2')
@section('title')
Applicant List
@endsection
@section('header')

    @include('includes.header')
@endsection

@section('body')

<div class="container">
    <h1 class="header center teal-text text-darken-2 ">Applicants' List</h1>
    <br><br><br>

</div>
<div class="container">


    <form action="#" method="post" >


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
    <?php
    if($applicants!=null){

    ?>


    <table>
        <thead>
        <tr>
            <th data-field="id">Application No</th>
            <th data-field="name">Name of the Applicant</th>

        </tr>
        </thead>

        <tbody>


        <tr>
            <td>Alvin</td>
            <td>Eclair</td>

        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>

        </tr>
        <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>

        </tr>
        </tbody>
    </table>
    <?php
    }
    ?>
    <br><br>
    <br><br>
</div>
@endsection