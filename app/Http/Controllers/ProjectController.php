<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Project;
use App\Models\CostCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function costcategory(){
        return view('addCostCategory');
    }

     public function submitcostcategory(Request $request){
        $data = new CostCategory;

        $data->name=$request->name;
        $data->status=$request->status;


        $data->save();

        session()->flash('costcategory', 'Cost Category Added');

        return redirect()->back();
     }


     public function costcategorylist(){
        $showdata = CostCategory::Simplepaginate(5);
        
        $category= CostCategory::where('status' ,'=', 1)->get();


        return view('costcategorylist')->with('showdata',$showdata)->with('category',$category);
     } 


     public function deletecostcategory($id=null){
        $deleteData=CostCategory::find($id);
        $deleteData->delete();

        return redirect()->back();
     }


     public function editcostcategory($id=null){

        $showData = CostCategory::find($id);
        $category= CostCategory::where('status' ,'=', 1)->get();
        return view('editcostcategory')->with('showData',$showData)->with('category',$category);
     }


     public function updatecostcategory(Request $request,$id){

        $data = CostCategory::find($id);
 
        $data->name=$request->name;
        $data->status=$request->status;


        $data->save();

        return redirect(url('costcategorylist'));
    
     }

     public function addproject(){
      $userdata= User::where('role' ,'=', 2)->get();
      return view('addproject')->with('userdata',$userdata);
     }


     public function postproject(Request $request){

      $data = new Project;

      $data->name=$request->name;

      $data->description=$request->description;

      $data->user_id=$request->user_id;

      $data->save();

      return redirect()->back();

     }


     public function projectlist(){

      $showdata = Project::Simplepaginate(5);
        
      $category= User::where('role' ,'=', 2)->get();


      return view('projectlist')->with('showdata',$showdata)->with('category',$category);
     }


     public function deleteproject($id=null){
          $deletedata=Project::find($id);
          $deletedata->delete();

          return redirect()->back();
          
     }


     public function editproject($id=null){

      $editData = Project::find($id);
      $userdata = User::where('role', '=', '2')->get();

      return view('editproject')->with('editData',$editData)->with('userdata',$userdata);
     }

     public function updateproject(Request $request,$id){

      $data = Project::find($id);

      $data->name=$request->name;

      $data->description=$request->description;

      $data->user_id=$request->user_id;

      $data-> save();

      return redirect(url('projectlist'));

     }

}
