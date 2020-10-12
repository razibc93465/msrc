<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;  //Elequent ORM
//use DB;            //Querry Builder

class DepartmentController extends Controller
{
     public function createDepartment() {
        return view('admin.department.createDepartment');
    }
    
     public function storeDepartment(Request $request) {
        // return $request->all();
        $this->validate($request, [
            'deptName' => 'required',          
        ]);

//        $category= new Category();
//        $category->categoryName = $request->categoryName;
//        $category->categoryDescription = $request->categoryDescription;
//        $category->publicationStatus = $request->publicationStatus;
//        $category->save();
//        return 'Category info saved successfully';

        
//        ELEQUENT ORM
        Department::create($request->all());
        // return 'Department info saved successfully';
        
        //QUERRY BUILDER
//        DB::table('categories')->insert([
//            'categoryName' => $request->categoryName,
//            'categoryDescription' => $request->categoryDescription,
//            'publicationStatus' => $request->publicationStatus
//        ]);
        //return 'Category info saved successfully';
        // return redirect()->back();
        
        return redirect('/department/add')->with('message', 'Department info saved successfully');
    }

    public function manageDepartment() {
        $departments = Department::all();
        return view('admin.department.manageDepartment', ['departments' => $departments]);
    }

    public function editDepartment($id) {
        // return $id;
        $departmentById = Department::where('id', $id)->first();
        return view('admin.department.editDepartment', ['departmentById' => $departmentById]);
    }

    public function updateDepartment(Request $request) {
        // dd( $request->all() );
        $department = Department::find($request->id);
        $department->deptName = $request->deptName;      
        $department->publicationStatus = $request->publicationStatus;
        $department->save();
        return redirect('/department/manage')->with('message', 'Deepartment info updated successfully');
    }

    public function deleteDepartment($id) {
        $department = Department::find($id);
        $department->delete();
        return redirect('/department/manage')->with('message', 'Department info deleted successfully');
    }
    
       
}
