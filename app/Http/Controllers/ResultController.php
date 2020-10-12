<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Semester;
use App\Student;
use App\Course;
use App\Result;
use DB;

class ResultController extends Controller {
          
    public function department2($id) {
        $publishedDepartmentCourse = Department::where('id', $id)
                ->where('publicationStatus', 1)
                ->get();
       
        $semesters = Semester::where('publicationStatus', 1)->get();
//        $students = Student::where('deptId', $id)->where('publicationStatus', 1)->get();
//        $courses = Course::where('deptId', $id)->where('publicationStatus', 1)->get();
        $students = Student::where('publicationStatus', 1)->get();
        $courses = Course::where('publicationStatus', 1)->get();
        return view('admin.result.createResult', ['publishedDepartmentCourse' => $publishedDepartmentCourse,'students'=>$students, 'semesters' => $semesters,'courses'=>$courses]);
    }
    
    public function createResult() {
        $publishedDepartmentCourse = Department::where('publicationStatus', 1)->get();   
        $semesters = Semester::where('publicationStatus', 1)->get();
        $students = Student::where('publicationStatus', 1)->get();
        $courses = Course::where('publicationStatus', 1)->get();
        return view('admin.result.createResult', ['publishedDepartmentCourse' => $publishedDepartmentCourse,'semesters' => $semesters,'students'=>$students,'courses'=>$courses]);
    }

//    public function createResult() {
//        $departments = Department::where('publicationStatus', 1)->get();
//        $semesters = Semester::where('publicationStatus', 1)->get();
//        $students = Student::where('publicationStatus', 1)->get();
//        $courses = Course::where('publicationStatus', 1)->get();
//        return view('admin.result.createResult', ['departments' => $departments, 'semesters' => $semesters, 'students' => $students, 'courses' => $courses]);
//    }

    public function storeResult(Request $request) {
        $this->validate($request, [
            'attendance' => 'required',
            'tutorial' => 'required',
            'midterm' => 'required',
            'final' => 'required',
        ]);
//        $studentImage = $request->file('sImage');
//        $imageName = $studentImage->getClientOriginalName();
//        $uploadPath = 'public/studentImage/';
//        $studentImage->move($uploadPath, $imageName);
//        $imageUrl = $uploadPath . $imageName;
//         $this->saveStudentInfo($request, $imageUrl);
        $this->saveResultInfo($request);
        return redirect('/result/add')->with('message', 'Result info saved successfully');
    }

    protected function saveResultInfo(Request $request) {
        $result = new Result();
        $result->deptId = $request->deptId;
        $result->semId = $request->semId;
        $result->studentId = $request->studentId;
        $result->courseId = $request->courseId;
        $result->attendance = $request->attendance;
        $result->tutorial = $request->tutorial;
        $result->midterm = $request->midterm;
        $result->final = $request->final;
        $result->publicationStatus = $request->publicationStatus;
        $result->save();
    }

    public function manageResult() {
        $results = DB::table('results') 
                ->join('departments', 'results.deptId', '=', 'departments.id')
                ->join('semesters', 'results.semId', '=', 'semesters.id')
                ->join('students', 'results.studentId', '=', 'students.id')
                ->join('courses', 'results.courseId', '=', 'courses.id')
                ->select('results.*', 'departments.deptName', 'semesters.semTitle', 'students.sExamRoll', 'students.sName', 'courses.courseTitle')                
                ->get();    
        return view('admin.result.manageResult', ['results' => $results]);
    }

    public function editResult($id) {
        $departments = Department::where('publicationStatus', 1)->get();
        $semesters = Semester::where('publicationStatus', 1)->get();
        $students = Student::where('publicationStatus', 1)->get();
        $courses = Course::where('publicationStatus', 1)->get();
        $resultById = Result::where('id', $id)->first();
        return view('admin.result.editResult', ['resultById' => $resultById, 'semesters' => $semesters, 'students' => $students, 'courses' => $courses, 'departments' => $departments]);
    }

    public function updateResult(Request $request) {
        $result = Result::find($request->id);
        $result->deptId = $request->deptId;
        $result->semId = $request->semId;
        $result->studentId = $request->studentId;
        $result->courseId = $request->courseId;
        $result->attendance = $request->attendance;
        $result->tutorial = $request->tutorial;
        $result->midterm = $request->midterm;
        $result->final = $request->final;
        $result->publicationStatus = $request->publicationStatus;
        $result->save();
        return redirect('/result/manage')->with('message', 'Result info updated successfully');
    }

    public function deleteResult($id) {
        $result = Result::find($id);
        $result->delete();
        return redirect('/result/manage')->with('message', 'Result info deleted successfully');
    }

}
