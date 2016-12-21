<?php
/**
 * Created by PhpStorm.
 * User: Surani Hiranyada
 * Date: 12/18/2016
 * Time: 1:25 AM
 */

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\School;
use App\Models\Error;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\ApplicantGuardian;
use App\Models\ApplicantPriority;
use App\Models\ApplicantSibling;

class StudentController extends Controller
{
    public function getApplicant()
        
    {

        $applicant_id = Auth::user()->id;
        $error = null;
        return view('applicationSection1', compact('error', 'applicant_id'));
    }

    public function postApplicant(Request $request)
    {
        $applicant = new Applicant();
        $applicant_id = $request['applicant_id'];
        $result = $applicant->createApplicant($request);
        if (mysqli_errno($result) != 0) {
            $err = new Error(mysqli_error($result), mysqli_errno($result));
            if ($err->error_no == 1062) {
                $error = 'Applicant already exist';
                return view('applicationSection1', compact('error', 'applicant_id'));
            } elseif ($err->error_no == 1644) {
                $error = 'Invalid Birthday Entry';
                return view('applicationSection1', compact('error', 'applicant_id'));
            } else {
                $error = $err->error_description;
                return view('applicationSection1', compact('error', 'applicant_id'));
            }
        }
        $error = null;
        $districts = District::getDistrict();
        return view('applicationSection2', compact('error', 'districts', 'applicant_id'));

    }

    public function getApplicantGuardian()
    {
        $error = null;
        $applicant_id = Auth::user()->id;
        $districts = District::getDistrict();
        return view('applicationSection2', compact('error', 'districts', 'applicant_id'));
    }

    public function postApplicantGuardian(Request $request)
    {
        $applicant_guardian = new ApplicantGuardian();
        $result = $applicant_guardian->createApplicantGuardian($request);
        $applicant_id = $request['applicant_id'];
        if (mysqli_errno($result) != 0) {
            $err = new Error(mysqli_error($result), mysqli_errno($result));
            $districts = District::getDistrict();
            if ($err->error_no == 1062) {
                $error = 'Applicant Guardian already exist';
                return view('applicationSection2', compact('error', 'districts', 'applicant_id'));
            } else {
                $error = $err->error_description;

                return view('applicationSection2', compact('error', 'districts', 'applicant_id'));
            }
        }
        $error = null;
        $district = $request['district'];
        echo $district;
        $schools = District::getSchool($district);
        return view('applicationSection3', compact('error', 'applicant_id', 'schools'));
    }

    public function getApplicantPriority()
    {
        $error = null;
        $applicant_id = Auth::user()->id;
        $connection = DatabaseController::db_connect();

        $sql = "SELECT district from applicant_guardian where ( applicant_id =(?) )";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $data = $stmt->get_result();

        $district = mysqli_fetch_row($data);
        $schools = District::getSchool($district[0]);
        return view('applicationSection3', compact('error', 'applicant_id', 'schools'));
    }
//    public function postApplicantPriority(Request $request)
//    {   $connection = DatabaseController::db_connect();
//        //$applicant_priority = new ApplicantPriority();
//        $applicant_id = $request['applicant_id'];
//        $val = [];
//        $temp = ['1','2','3','4','5'];
//        foreach ($temp as $i) {
//            if ($request['distance'.$i] != null) {
//                $rest=[];
//                $id=(explode("-",$request['school'.$i]));
//                $id=$id[0];
//                array_push($rest,$id);
//                array_push($rest, $request['no'.$i]);
//                array_push($rest, $request['distance'.$i]);
//                array_push($rest, $request['no_schools'.$i]);
//                array_push($val, $rest);
//            }
//        }
//        foreach ($val as $i) {
//            //$values = implode("','", $i);
//            //$values="'".$values."'";
//            $stmt = $connection->prepare("INSERT  INTO applicant_priority (applicant_id,school_id,priority,distance,num_between_school) VALUES (?,?,?,?,?)");
//            echo $i[0],111,$i[2];
//            $stmt->bind_param("iiiii", $i[0],$i[1],$i[2],$i[3],$i[4]);
//            $stmt->execute();
//            $result = $stmt->get_result();
//            if (mysqli_errno($connection) != 0) {
//                $applicant_id = $request['applicant_id'];
//                $sql = "SELECT district from applicant_guardian where ( applicant_id = $applicant_id)";
//                $data = mysqli_query($connection, $sql);
//                $district = mysqli_fetch_row($data);
//                echo $district[0];
//                $schools = District::getSchool($district[0]);
//                $err = new Error(mysqli_error($connection), mysqli_errno($connection));
//                if ($err->error_no == 1062) {
//                    $error = 'Duplicate Data Entry';
//                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
//                } elseif ($err->error_no == 1644) {
//                    $error = 'Invalid School type';
//                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
//                } else {
//                    $error = "Invalid Entry";
//                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
//                }
//            }
//        }
//        $error = null;
//        return view('applicationSection4', compact('error', 'applicant_id'));
//
//    }

    public function postApplicantPriority(Request $request)
    {   $connection = DatabaseController::db_connect();
        //$applicant_priority = new ApplicantPriority();
        $applicant_id = $request['applicant_id'];
        $val = [];
        $temp = ['1','2','3','4','5'];
        foreach ($temp as $i) {
            if ($request['distance'.$i] != null) {
                $rest=[];
                $id=(explode("-",$request['school'.$i]));
                $id=$id[0];
                array_push($rest,$id);
                array_push($rest, $request['no'.$i]);
                array_push($rest, $request['distance'.$i]);
                array_push($rest, $request['no_schools'.$i]);
                array_push($val, $rest);
            }
        }
        foreach ($val as $i) {
            $values = implode("','", $i);
            $sql = "INSERT  INTO applicant_priority (applicant_id,school_id,priority,distance,num_between_school) VALUES "."('".$applicant_id." ','".$values."')";
            echo $sql;
            mysqli_query($connection, $sql);
            if (mysqli_errno($connection) != 0) {
                $applicant_id = $request['applicant_id'];

                $sql = "SELECT district from applicant_guardian where ( applicant_id =(?) )";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("i",$applicant_id);
                $stmt->execute();
                $data = $stmt->get_result();
                $district = mysqli_fetch_row($data);
                $schools = District::getSchool($district[0]);
                $err = new Error(mysqli_error($connection), mysqli_errno($connection));
                if ($err->error_no == 1062) {
                    $error = 'Duplicate Data Entry';
                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
                } elseif ($err->error_no == 1644) {
                    $error = 'Invalid School type';
                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
                } else {
                    $error = 'Invalid Entry';
                    return view('applicationSection3', compact('error', 'applicant_id','schools'));
                }
            }
        }
        $error = null;
        return view('applicationSection4', compact('error', 'applicant_id'));

    }

    public function getGuardianPastPupil()
    {
        $applicant_id = Auth::user()->id;
        $error = null;
        return view('applicationSection4', compact('error', 'applicant_id'));
    }

    public function postGuardianPastPupil(Request $request)
    {
        $connection = DatabaseController::db_connect();
        $applicant_id = $request['applicant_id'];
        $mem=$request['membership_id'];
        $sql = "SELECT past_stu_id from past_student where ( membership_id =(?))";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i",$mem);
        $stmt->execute();
        $data = $stmt->get_result();
        if (mysqli_num_rows($data)) {
            $past_student_id = mysqli_fetch_row($data);
            $past_student_id =$past_student_id [0];

            $sql = "SELECT guardian_id from applicant_guardian where ( applicant_id =(?))";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("i",$applicant_id);
            $stmt->execute();
            $data = $stmt->get_result();

            $guardian_id = mysqli_fetch_row($data);
            $error = null;
            $guardian_id= $guardian_id[0];
            $sql = "INSERT  INTO guardian_past_pupil(guardian_id,past_stu_id) VALUES"."('".$guardian_id." ','".$past_student_id."')";
            mysqli_query($connection, $sql);
            if (mysqli_errno($connection) != 0) {
                $err = new Error(mysqli_error($connection), mysqli_errno($connection));
                if ($err->error_no == 1062) {
                    $error = 'Invalid Duplicate Entry';
                    return view('applicationSection4', compact('error','applicant_id'));
                } else {
                    $error = $err->error_description;
                    return view('applicationSection4', compact('error', 'applicant_id'));
                }
            }
            return view('applicationSection5', compact('error', 'applicant_id'));
        }
        $error = 'Invalid membership id';
        return view('applicationSection4', compact('error', 'applicant_id'));
    }


    public function getApplicantSibling()
    {
        $error = null;
        $applicant_id = Auth::user()->id;
        return view('applicationSection5', compact('error', 'applicant_id'));
    }

    public function postApplicantSibling(Request $request)
    {
        $connection = DatabaseController::db_connect();
        $applicant_id = $request['applicant_id'];
        $val = [];
        $temp = ['1', '2', '3'];
        foreach ($temp as $i) {
            $sibling_id=$request['admission_no' . $i];
//            echo $sibling_id;
            if ($sibling_id != null) {

                $sql = "SELECT present_stu_id from present_student where (present_stu_id = (?))";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("i",$sibling_id);
                $stmt->execute();
                $data = $stmt->get_result();

                if (mysqli_num_rows($data)==null) {
                    $error = 'Invalid present student id';
                    return view('applicationSection5', compact('error', 'applicant_id'));
                }
                array_push($val,$sibling_id);
            }
        }
        foreach ($val as $i) {
            $temp=$request['admission_no'.$i];
            $sql = "INSERT  INTO applicant_sibling (applicant_id,present_stu_id) VALUES ("."$applicant_id".","."$temp".")";
            mysqli_query($connection, $sql);
            if (mysqli_errno($connection) != 0) {
                $err = new Error(mysqli_error($connection), mysqli_errno($connection));
                if ($err->error_no == 1062) {
                    $error = 'Invalid Duplicate Entry';
                    return view('applicationSection5', compact('error','applicant_id'));
                } else {
                    $error = 'Invalid Entry';
                    return view('applicationSection5', compact('error', 'applicant_id'));
                }
            }
        }
        $user = [];
        array_push($user,Auth::user()->user_name);
        array_push($user,Auth::user()->user_type);
        array_push($user,Auth::user()->id);
        $done='done';
        return view('dashboard', compact('error', 'applicant_id','done','user'));

    }



    public function getUpdateVacancies(){
        $school=School::getVacanciesAvailable();
        $done=null;
        return view('updateVacancies',compact('school','done'));
    }
    public function saveUpdateVacancies(Request $request){
        $num_students=$request['new_value'];
        School::saveVacanciesAvailable($num_students);
        $school=School::getVacanciesAvailable();
        $done="Changes were saved successfully";
        return view('updateVacancies',compact('school','done'));
    }
}