<?php

namespace App\Http\Controllers;

use Session;
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
}
