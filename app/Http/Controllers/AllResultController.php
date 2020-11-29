<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Demo;

class AllResultController extends Controller
{

    public function index()
    {
        $results = DB::table('results')
            ->join('departments', 'results.deptId', '=', 'departments.id')
            ->join('semesters', 'results.semId', '=', 'semesters.id')
            ->join('students', 'results.studentId', '=', 'students.id')
            ->join('courses', 'results.courseId', '=', 'courses.id')
            ->select('results.*', 'departments.deptName', 'semesters.semTitle', 'students.sExamRoll', 'students.sName', 'courses.courseTitle')
            ->get();
      //  return view('admin.result.manageResult', ['results' => $results]);
        return view('admin.allResult.resultSheet',['results'=>$results]);
    }
    public function formshow()
    {
//        $data= new Demo();
//        $data->name = $request->name;
//        $data->save();
//        return redirect()->back();
        return view('admin.allResult.demo');
    }

//    public function saveData(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required'
//          //  'image' => 'required'
//        ]);
//           $data= new Demo();
//           $data->name = $request->name;
//           $data->save();
//          // session::flash('success', 'stored');
//           return redirect('/form')->with('message', 'saved successfully');
//        //   return view('admin.allResult.demo');

//       Demo::create($request->all());
//       return redirect('/form')->with('message', 'saved successfully');

//        DB::table('demos')->insert([
//            'name' => $request->name
//        ]);
//        return redirect('/form')->with('message', 'saved successfully');
 //   }
    public function basicvalidate( $request)
    {
        $this->validate($request, [
            'name' => 'required'
            //  'image' => 'required'
        ]);
    }
    protected function saveImage($request){
        $image = $request->file('image');
        $filetype = $image->getClientOriginalExtension();
        $imageName = 'IMG'.time().$request->name.'.'.$filetype;
        $directory = 'public/myimage/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
       // Image::make($image)->resize(200,200)->save($imageUrl);
        return $imageUrl;
     //   return redirect('/form')->with('message', 'saved successfully');

    }
    protected function saveBasicInfo($request, $imageUrl){
        $data=new Demo();
        $data->name=$request->name;
        $data->image=$imageUrl;
      //  $imageUrl= $this->saveImage();
        $data->save();
    }
    public function saveData(Request $request){
        $this->basicvalidate($request);
        $imageUrl = $this->saveImage($request);
        $this->saveBasicInfo($request, $imageUrl);
        return redirect()->back();
    }

    public function show()
    {
        $datam = Demo::all();
        return view('admin.allResult.ex',['datam'=>$datam]);
    }


    public function edit($id)
    {
        $data = Demo::find($id);
        return view('admin.allResult.edit',['data'=>$data]);
    }


    public function update(Request $request)
    {
        $data = Demo::find($request->id);
        $data->name = $request->name;
        $data->save();
//        session::flash('success','Data updated successfully');
        return redirect()->route('/dataShow')->with('message', 'Updated successfully');
//        return redirect('/data')->with('message', 'Updated successfully');
//        return redirect()->route('/dataShow')->with('message','Updated successfully');

    }


    public function destroy($id)
    {
    $datam=Demo::find($id);
    $datam->delete();
    return redirect()->back()->with('message', 'Deleted successfully');
    }

}
