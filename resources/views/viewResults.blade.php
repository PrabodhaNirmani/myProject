@extends ('mine.master2')


@section('title')
    Results Page
@endsection

@section('header')
    <nav class="teal" role="navigation">
        <div class="nav-wrapper ">
            <a id="logo-container" href="#" class="brand-logo left">
                <i class="material-icons">visibility</i>iSolve
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <div class="col">
                        <i class="material-icons">perm_identity</i>
                    </div>
                </li>
                <li>
                    <div class="col">
                        <?php


                        $user_name=Auth::user()->user_name;
                        $user_type=Auth::user()->id;

                        ?>

                        {{$user_name}}
                    </div>

                </li>
                <li>
                    <div class="col"><a  href="{{route('getDashboard')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Back to home" >
                            <i id="my" class="material-icons">present_to_all</i></a></div>
                </li>

                <li>
                    <div class="col"><a  href="{{route('logout')}}" class="tooltipped" data-position="bottom" data-delay="10" data-tooltip="Logout" >
                            <i id="my" class="material-icons">power_settings_new</i></a></div>
                </li>
            </ul>

        </div>

    </nav>
    <style>
        #my {
            color: white;
        }
    </style>
@endsection

@section('body')

    <div class="container">

        <br><br><br>
    </div>
    @if($user[0]=='admin')

        <h1 class="header center teal-text text-darken-2 ">Evaluation Results</h1>
        <div class="container">
            {{--route--}}
            <form action="{{route('adminViewResults')}}" method="post">
                <div class="col s10">
                    <div class="row">
                        <div class="input-field col s4">
                            <label for="school">School</label>
                        </div>
                        <div class="input-field col s4">
                            <select name="school" id="school" class="browser-default">

                                @foreach($school_name as $school)
                                    <option>{{$school[0]}}-{{$school[1]}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col s1">
                            <button class="btn-floating btn-large" type="submit" name="action">
                                <i class="material-icons">search</i>
                            </button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
            @if($error!=null)
                <div class="container">
                    <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
                </div>
                <br>
            @elseif($applicant!=null)
                <h1 class="header center teal-text text-darken-2 ">Selected Students- {{$school_name}}</h1>


                <div class="container">
                    <table>
                        <thead>
                        <tr>
                            <th data-field="applicant_id">Applicant ID</th>
                            <th data-field="first_name">First Name</th>
                            <th data-field="last_name">Last Name</th>
                            <th data-field="marks">Marks</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($applicants as $applicant)

                            <tr>
                                <td>{{$applicant[0]}}</td>
                                <td>{{$applicant[1]}}</td>
                                <td>{{$applicant[2]}}</td>
                                <td>{{$applicant[3]}}</td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>


                </div>
            @endif
            <br><br>
        </div>


    @elseif($user[0]=='student')

        @if($error!=null)

            <div class="container">
                <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
            </div>
            <br>
        @else
            <h1 class="header center teal-text text-darken-2 ">Selected School- {{$school_name}}</h1>

            <div class="container">

                <table>
                    <thead>
                    <tr>
                        <th data-field="applicant_id">Applicant ID</th>
                        <th data-field="first_name">First Name</th>
                        <th data-field="last_name">Last Name</th>
                        <th data-field="marks">Marks</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($applicants as $applicant)

                        <tr>
                            <td>{{$applicant[0]}}</td>
                            <td>{{$applicant[1]}}</td>
                            <td>{{$applicant[2]}}</td>
                            <td>{{$applicant[3]}}</td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
</div>


            @endif

    @else

        @if($error!=null )

            <div class="container">
                <div class="card-panel #ef9a9a red lighten-3" align="center"><h6>{{$error}}</h6></div>
            </div>
            <br>
        @else
            <h1 class="header center teal-text text-darken-2 ">Selected Students- {{$school_name}}</h1>


            <div class="container">
            <table>
                <thead>
                <tr>
                    <th data-field="applicant_id">Applicant ID</th>
                    <th data-field="first_name">First Name</th>
                    <th data-field="last_name">Last Name</th>
                    <th data-field="marks">Marks</th>
                </tr>
                </thead>
                <tbody>

                @foreach($applicants as $applicant)

                    <tr>
                        <td>{{$applicant[0]}}</td>
                        <td>{{$applicant[1]}}</td>
                        <td>{{$applicant[2]}}</td>
                        <td>{{$applicant[3]}}</td>

                    </tr>
                @endforeach

                </tbody>

            </table>


        </div>
        @endif



    @endif

<br><br><br>
@endsection