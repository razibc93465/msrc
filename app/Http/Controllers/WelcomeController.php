<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Semester;
use App\Course;
use DB;

class WelcomeController extends Controller {

    public function index() {
        return view('frontEnd.home.homeContent');
    }

    public function courseView($id) {
        $publishedDepartmentCourse = Department::where('id', $id)
                ->where('publicationStatus', 1)
                ->get();
        $publishedSemCourse = Semester::where('publicationStatus', 1)->get();
        $courses = Course::where('deptId', $id)->where('publicationStatus', 1)->get();
        return view('frontEnd.deptCourse.deptCourseView', ['publishedDepartmentCourse' => $publishedDepartmentCourse, 'publishedSemCourse' => $publishedSemCourse, 'courses' => $courses]);
    }

//    public function SemcourseView($id) {
//        $publishedDepartmentCourse = Department::where('id', $id)
//                ->where('publicationStatus', 1)
//                ->get();
//        $publishedSemCourse = Semester::where('publicationStatus', 1)->get();
//        $courses = Course::where('deptId', $id)->where('publicationStatus', 1)->get();
//        return view('frontEnd.semCourse.semCourseView', ['publishedDepartmentCourse' => $publishedDepartmentCourse, 'publishedSemCourse' => $publishedSemCourse, 'courses' => $courses]);
//            
//    }

    public function manageSemCourse() {
        $DepartmentCourse = Department::where('publicationStatus', 1)->get();
        $publishedSemCourse = Semester::where('publicationStatus', 1)->get();
     //   $courses = Course::where('deptId', $id AND 'semId', $sid)->where('publicationStatus', 1)->get();
        return view('frontEnd.deptCourse.deptCourseView2', ['DepartmentCourse' => $DepartmentCourse, 'publishedSemCourse' => $publishedSemCourse]);
    }

    public function manageSemCourse22($id) {
        $publishedSemCourse = Semester::where('id', $id)
                ->where('publicationStatus', 1)
                ->get();
        $courses = Course::where('semId', $id)->where('publicationStatus', 1)->get();        
        return view('frontEnd.semCourse.semCourseView', ['publishedSemCourse'=>$publishedSemCourse,'courses' => $courses]);
    
        
//        $courses = Department::where('id', $id)->where('publicationStatus', 1)->get();
//        $courses = Semester::where('id', $id )->where('publicationStatus', 1)->get();
//        $courses = Course::where('deptId', $id AND 'semId', $id)->where('publicationStatus', 1)->get();
//        $courses = DB::table('courses')
//                ->join('departments', 'courses.deptId', '=', 'departments.id')
//          //      ->join('semesters', 'courses.semId', '=', 'semesters.id')
//                ->select('courses.*')
//          //      ->where('semId', $id)
//                ->get();
//        //  ->first($id);

      //  return view('frontEnd.semCourse.semCourseView', ['courses' => $courses]);
        //    return view('frontEnd.semCourse.semCourseView');
    }
    
    public function semCourse($id) {
        $publishedSemCourse = Semester::where('id', $id)
                ->where('publicationStatus', 1)
                ->get();
        $courses = Course::where('semId', $id)->where('publicationStatus', 1)->get();        
        return view('frontEnd.semCourse.semCourseView', ['publishedSemCourse'=>$publishedSemCourse,'courses' => $courses]);
    
        
    }
    

}
