<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Teacher;
use DB;

class TeacherController extends Controller
{
    public function createTeacher(){
        $departments = Department::where('publicationStatus', 1)->get();
        return view('admin.teacher.createTeacher',['departments'=>$departments]);
    }
    
    public function storeTeacher(Request $request) {
        $this->validate($request, [
            'tName' => 'required',
            'tAddress' => 'required',
            'tImage' => 'required',
            'tEmail' => 'required',
            'tPassword' => 'required',           
        ]);
        $teacherImage = $request->file('tImage');
        $imageName = $teacherImage->getClientOriginalName();
        $uploadPath = 'public/teacherImage/';
        $teacherImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveTeacherInfo($request, $imageUrl);
        return redirect('/teacher/add')->with('message', 'Teacher info saved successfully');
    }

    protected function saveTeacherInfo(Request $request, $imageUrl) {
        $teacher = new Teacher();
        $teacher->deptId = $request->deptId;
        $teacher->tName = $request->tName;
        $teacher->tAddress = $request->tAddress; 
        $teacher->tImage = $imageUrl; 
        $teacher->tEmail = $request->tEmail;
        $teacher->tPassword = $request->tPassword;       
        $teacher->publicationStatus = $request->publicationStatus;       
        $teacher->save();
    }

    public function manageTeacher() {
        $teachers = DB::table('teachers')
                ->join('departments', 'teachers.deptId', '=', 'departments.id')
                ->select('teachers.*', 'departments.deptName')
                ->get();
        return view('admin.teacher.manageTeacher', ['teachers' => $teachers]);
    }

    public function editTeacher($id) {
        $departments = Department::where('publicationStatus', 1)->get();
        $teacherById = Teacher::where('id', $id)->first();
        return view('admin.teacher.editTeacher', ['teacherById' => $teacherById, 'departments' => $departments]);
    }

    public function updateTeacher(Request $request) {
        $imageUrl = $this->imageExistStatus($request);
        $teacher= Teacher::find($request->id);        
        $teacher->deptId = $request->deptId;
        $teacher->tName = $request->tName;
        $teacher->tAddress = $request->tAddress; 
        $teacher->tImage = $imageUrl; 
        $teacher->tEmail = $request->tEmail;
        $teacher->tPassword = $request->tPassword;       
        $teacher->publicationStatus = $request->publicationStatus;       
        $teacher->save();
        return redirect('/teacher/manage')->with('message', 'Teacher info updated successfully');
    }

    private function imageExistStatus($request) {
        $teacherById = Teacher::where('id', $request->id)->first();
        $teacherImage = $request->file('tImage');
        if ($teacherImage) {
            unlink($teacherById->tImage);
            $imageName = $teacherImage->getClientOriginalName();
            $uploadPath = 'public/teacherImage/';
            $teacherImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $teacherById->tImage;
        }
        return $imageUrl;
    }
    
     public function deleteTeacher($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teacher/manage')->with('message', 'Teacher info deleted successfully');     
    }
    
        
}
