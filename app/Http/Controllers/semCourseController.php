<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class semCourseController extends Controller {

    function index(Request $request) {
        if (request()->ajax()) {
            if (!empty($request->filter_department)) {
                $data = DB::table('courses')
                        ->join('departments', 'courses.deptId', '=', 'departments.id')
                        ->join('teachers', 'courses.tId', '=', 'teachers.id')
                        ->join('semesters', 'courses.semId', '=', 'semesters.id')
                        ->select('courses.*', 'departments.deptName', 'teachers.tName', 'semesters.semTitle')
                        ->where('deptName', $request->filter_department)
                        ->where('semTitle', $request->filter_semester)
                        ->get();
            } else {
                $data = DB::table('courses')
                        ->join('departments', 'courses.deptId', '=', 'departments.id')
                        ->join('teachers', 'courses.tId', '=', 'teachers.id')
                        ->join('semesters', 'courses.semId', '=', 'semesters.id')
                        ->select('courses.*', 'departments.deptName', 'teachers.tName', 'semesters.semTitle')
                        ->get();
            }
            return datatables()->of($data)->make(true);
        }
        $department_name = DB::table('courses')
                ->join('departments', 'courses.deptId', '=', 'departments.id')
                ->select('departments.id', 'departments.deptName')
                ->groupBy('departments.id', 'departments.deptName')
                ->orderBy('departments.id', 'ASC')
                ->get();
        return view('frontEnd.searchCourse.searchSemCourse', compact('department_name'));
    }

}
?>

