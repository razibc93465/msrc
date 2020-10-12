<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Teacher;
use App\Semester;
use App\Course;
use DB;

class CourseController extends Controller {

//    public function index() {
//        $publishedDepartments = Department::where('publicationStatus', 1)->get();
//        return view('admin.home.homeContent', ['publishedDepartments' => $publishedDepartments]);
//       //    return view('frontEnd.home.homeContent');
//    }

    public function department($id) {
        $publishedDepartmentCourse = Department::where('id', $id)
                ->where('publicationStatus', 1)
                ->get();
        $teachers = Teacher::where('deptId', $id)->where('publicationStatus', 1)->get();
        $semesters = Semester::where('publicationStatus', 1)->get();
        return view('admin.course.createcourse', ['publishedDepartmentCourse' => $publishedDepartmentCourse, 'teachers' => $teachers, 'semesters' => $semesters]);
    }

    public function createCourse() {
        $publishedDepartmentCourse = Department::where('publicationStatus', 1)->get();
        $teachers = Teacher::where('publicationStatus', 1)->get();
        $semesters = Semester::where('publicationStatus', 1)->get();
        return view('admin.course.createcourse', ['publishedDepartmentCourse' => $publishedDepartmentCourse, 'teachers' => $teachers, 'semesters' => $semesters]);
    
    }

    public function storeCourse(Request $request) {
        $this->validate($request, [
            'courseCode' => 'required',
            'courseTitle' => 'required',
            'courseCredit' => 'required',
        ]);
        $this->saveCourseInfo($request);
        return redirect('/course/add')->with('message', 'Course info saved successfully');
    }

    protected function saveCourseInfo(Request $request) {
        $course = new Course();
        $course->deptId = $request->deptId;
        $course->tId = $request->tId;
        $course->semId = $request->semId;
        $course->courseCode = $request->courseCode;
        $course->courseTitle = $request->courseTitle;
        $course->courseCredit = $request->courseCredit;
        $course->publicationStatus = $request->publicationStatus;
        $course->save();
    }

    public function manageCourse() {
        $courses = DB::table('courses')
                ->join('departments', 'courses.deptId', '=', 'departments.id')
                ->join('teachers', 'courses.tId', '=', 'teachers.id')
                ->join('semesters', 'courses.semId', '=', 'semesters.id')
                ->select('courses.*', 'departments.deptName', 'teachers.tName', 'semesters.semTitle')
                ->get();
        return view('admin.course.manageCourse', ['courses' => $courses]);
    }

    public function editCourse($id) {
        $departments = Department::where('publicationStatus', 1)->get();
        $teachers = Teacher::where('publicationStatus', 1)->get();
        $semesters = Semester::where('publicationStatus', 1)->get();
        $courseById = Course::where('id', $id)->first();
        return view('admin.course.editCourse', ['courseById' => $courseById, 'departments' => $departments, 'teachers' => $teachers, 'semesters' => $semesters]);
    }

    public function updateCourse(Request $request) {
        $course = Course::find($request->id);
        $course->deptId = $request->deptId;
        $course->tId = $request->tId;
        $course->semId = $request->semId;
        $course->courseCode = $request->courseCode;
        $course->courseTitle = $request->courseTitle;
        $course->courseCredit = $request->courseCredit;
        $course->publicationStatus = $request->publicationStatus;
        $course->save();
        return redirect('/course/manage')->with('message', 'Course info updated successfully');
    }

    public function deleteCourse($id) {
        $courses = Course::find($id);
        $courses->delete();
        return redirect('/course/manage')->with('message', 'Courses info deleted successfully');
    }

}
