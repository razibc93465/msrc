<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Department;
use App\Semester;
use DB;

class SemesterController extends Controller
{
     public function createSemester() {
//        $departments = Department::where('publicationStatus', 1)->get();
//        return view('admin.semester.createSemester', ['departments' => $departments]);
        return view('admin.semester.createSemester');
    }

    public function storeSemester(Request $request) {
        $this->validate($request, [           
            'semTitle' => 'required',          
        ]);
        
//        $studentImage = $request->file('sImage');
//        $imageName = $studentImage->getClientOriginalName();
//        $uploadPath = 'public/studentImage/';
//        $studentImage->move($uploadPath, $imageName);
//        $imageUrl = $uploadPath . $imageName;
        
        $this->saveSemesterInfo($request);
        return redirect('/semester/add')->with('message', 'Semester info saved successfully');
    }

    protected function saveSemesterInfo(Request $request) {
        $semester = new Semester();
//        $semester->deptId = $request->deptId;
        $semester->semTitle = $request->semTitle;
        $semester->publicationStatus = $request->publicationStatus;
        $semester->save();
    }

    public function manageSemester() {
        $semesters = DB::table('semesters')
//                ->join('departments', 'semesters.deptId', '=', 'departments.id')
//                ->select('semesters.*', 'departments.deptName')
                ->select('semesters.*')
                ->get();
        return view('admin.semester.manageSemester', ['semesters' => $semesters]);
    }

    public function editSemester($id) {
//        $departments = Department::where('publicationStatus', 1)->get();
       
        $semesterById = Semester::where('id', $id)->first();
        return view('admin.semester.editSemester', ['semesterById' => $semesterById]);
    }

    public function updateSemester(Request $request) {       
        $semester = Semester::find($request->id);
//        $semester->deptId = $request->deptId;
        $semester->semTitle = $request->semTitle;
        $semester->publicationStatus = $request->publicationStatus;
        $semester->save();
        return redirect('/semester/manage')->with('message', 'Semester info updated successfully');
    }

    
    public function deleteSemester($id) {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('/semester/manage')->with('message', 'Semester info deleted successfully');
    }

}
