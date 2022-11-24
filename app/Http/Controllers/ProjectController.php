<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Project;
use App\Models\CostList;
use App\Models\Fundlist;
use App\Models\CostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)

class ProjectController extends Controller
{


   public function __construct(){
      $this->middleware('auth');
  }

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

      $data->status=$request->status;

      $data->save();

      return redirect(url('projectlist'));

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

      $data->status=$request->status;

      $data-> save();

      return redirect(url('projectlist'));

     }

     public function addcostlist(){

      $projectdata = Project::all();

      $CostCategorydata = CostCategory::where('status', '=','1')->get();
      return view('addcostlist')->with('projectdata',$projectdata)->with('CostCategorydata',$CostCategorydata);
     }

     public function postcostlist(Request $request){

      $data = new CostList;

      $data->name=$request->name;
      $data->amount=$request->amount;
      $data->project_id=$request->project_id;

 
<<<<<<< HEAD
      $file = $request->upload;
      
      $filename=time().'.'.$file->getClientOriginalExtension();

      $request->upload->move('assets',$filename);

      $data->upload=$filename;
=======

      if($request->hasfile('image'))
      {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('assets/',$filename);
        $data->image = $filename;
      }
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)





      $data->cost_category_id=$request->cost_category_id;


      $data->save();

      session()->flash('Costlist', 'Cost List Added');
      
      return redirect()->back();


     }

     public function costlist(){
      $showdata = CostList::Simplepaginate(4);
      return view('costlist')->with('showdata',$showdata);
     }


<<<<<<< HEAD
     public function download(Request $request,$upload)

     {
  
       return response()->download(public_path('assets/'.$upload));
  
     }
=======

>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)


     public function deletecostlist($id=null){
      $deletedata=CostList::find($id);
      $deletedata->delete();

      return redirect()->back();

     }

     public function editcostlist($id=null){
      $showData = CostList::find($id);
      $project = Project::all();
      $cost_category = CostCategory::where('status', '=' , '1')->get();
      return view('editcostlist')->with('showData',$showData)->with('project',$project)->with('cost_category',$cost_category);
     }


     public function updatecostlist(Request $request,$id){

   

       
      $data = CostList::find($id);
     

      $data->name=$request->name;

      $data->amount=$request->amount;

      $data->project_id=$request->project_id;

<<<<<<< HEAD
      $data->status=$request->status;
=======
      // $data->status=$request->status;
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)


      // $data->upload=$request->upload;


<<<<<<< HEAD
      $upload=$request->upload;
  

      if($upload){

         $filename=time().'.'.$upload->getClientOriginalExtension();

         $request->upload->move('assets',$filename);
   
         $data->upload=$filename;
      }
      else{
     $data->upload=$request->old_img;
=======
      if($request->hasfile('image'))
      {
        $destination = 'assets/'.$data->image;
        if(File::exists($destination))
        {
          File::delete($destination);
        }

        $file= $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('assets/',$filename);
        $data->image = $filename;

>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)
      }

      
      $data->cost_category_id=$request->cost_category_id;

      $data-> save();

      return redirect(url('costlist'));
     }


     public function balance(){

      $showdata = DB::table("fundlists")->sum('amount');

      $showcost = DB::table("cost_lists")->sum('amount');

      return view('balancesheet')->with('showdata',$showdata)->with('showcost',$showcost);
     }
}
