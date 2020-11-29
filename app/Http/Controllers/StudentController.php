<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Student;
use DB;

class StudentController extends Controller {

    public function createStudent() {
        $departments = Department::where('publicationStatus', 1)->get();
        return view('admin.student.createStudent', ['departments' => $departments]);
    }

    public function storeStudent(Request $request) {
        $this->validate($request, [
            'sExamRoll' => 'required',
            'sRegNo' => 'required',
            'sName' => 'required',
            'sAddress' => 'required',
            'sImage' => 'required',
            'sEmail' => 'required',
        ]);
        $studentImage = $request->file('sImage');
        $imageName = $studentImage->getClientOriginalName();
        $uploadPath = 'public/studentImage/';
        $studentImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveStudentInfo($request, $imageUrl);
        return redirect('/student/add')->with('message', 'Student info saved successfully');
    }

    protected function saveStudentInfo(Request $request, $imageUrl) {
        $student = new Student();
        $student->deptId = $request->deptId;
        $student->sExamRoll = $request->sExamRoll;
        $student->sRegNo = $request->sRegNo;
        $student->sName = $request->sName;
        $student->sAddress = $request->sAddress;
        $student->sImage = $imageUrl;
        $student->sEmail = $request->sEmail;
        $student->publicationStatus = $request->publicationStatus;
        $student->save();
    }

    public function manageStudent() {
        $students = DB::table('students')
                ->join('departments', 'students.deptId', '=', 'departments.id')
                ->select('students.*', 'departments.deptName')
                ->get();
        return view('admin.student.manageStudent', ['students' => $students]);
    }

    public function editStudent($id) {
        $departments = Department::where('publicationStatus', 1)->get();
        $studentById = Student::where('id', $id)->first();
        return view('admin.student.editStudent', ['studentById' => $studentById, 'departments' => $departments]);
    }

    public function updateStudent(Request $request) {
        $imageUrl = $this->imageExistStatus($request);
        $student = Student::find($request->id);

        $student->deptId = $request->deptId;
        $student->sExamRoll = $request->sExamRoll;
        $student->sRegNo = $request->sRegNo;
        $student->sName = $request->sName;
        $student->sAddress = $request->sAddress;
        $student->sImage = $imageUrl;
        $student->sEmail = $request->sEmail;
        $student->publicationStatus = $request->publicationStatus;
        $student->save();
        return redirect('/student/manage')->with('message', 'Student info updated successfully');
    }

    private function imageExistStatus($request) {
        $studentById = Student::where('id', $request->id)->first();
        $studentImage = $request->file('sImage');
        if ($studentImage) {
            unlink($studentById->sImage);
            $imageName = $studentImage->getClientOriginalName();
            $uploadPath = 'public/studentImage/';
            $studentImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $studentById->sImage;
        }
        return $imageUrl;
    }

    public function deleteStudent($id) {
        $student = Student::find($id);
        $student->delete();
        return redirect('/student/manage')->with('message', 'Student info deleted successfully');
    }

}
