<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class searchResultController extends Controller {

    function index(Request $request) {
        if (request()->ajax()) {
            if (!empty($request->filter_department)) {
                $data = DB::table('results')
                        ->join('departments', 'results.deptId', '=', 'departments.id')                       
                        ->join('semesters', 'results.semId', '=', 'semesters.id')
                        ->join('courses', 'results.courseId', '=', 'courses.id')
                        ->join('students', 'results.studentId', '=', 'students.id')
                        ->select('results.*', 'departments.deptName', 'semesters.semTitle', 'courses.courseTitle', 'students.sExamRoll', 'students.sName')
                        ->where('sExamRoll', $request->filter_department)
                        ->where('semTitle', $request->filter_semester)
                        ->get();
            } else {
                $data = DB::table('results')
                        ->join('departments', 'results.deptId', '=', 'departments.id')                      
                        ->join('semesters', 'results.semId', '=', 'semesters.id')
                        ->join('courses', 'results.courseId', '=', 'courses.id')
                         ->join('students', 'results.studentId', '=', 'students.id')
                        ->select('results.*', 'departments.deptName', 'semesters.semTitle', 'courses.courseTitle', 'students.sExamRoll', 'students.sName')
                        ->get();
            }
            return datatables()->of($data)->make(true);
        }
        $department_name = DB::table('results')
                ->join('departments', 'results.deptId', '=', 'departments.id')                      
                ->join('semesters', 'results.semId', '=', 'semesters.id')
                ->join('courses', 'results.courseId', '=', 'courses.id')
                ->join('students', 'results.studentId', '=', 'students.id')
                ->select('students.id', 'students.sExamRoll')
                ->groupBy('students.id', 'students.sExamRoll')
                ->orderBy('students.id', 'ASC')
                ->get();
        return view('frontEnd.searchResult.searchResult', compact('department_name'));
    }

}
?>

