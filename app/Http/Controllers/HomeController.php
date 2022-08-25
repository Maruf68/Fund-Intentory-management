<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Fundlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
   public function index(){
    $role=Auth::user()->role;

    if($role=='1'){

        return redirect('admin');
    }
    if($role=='2'){
        return redirect('dashboard');
    }
   
   }

   public function adduser(Request $request){
    $rules = [
        'password'=> 'required|min:6',
       
    ];

    $cm = [
   
        'password.min' => 'Password should be atleast 6 characters',
              
    ];

    $this->validate($request,$rules,$cm);

    $data = new User;
    $data->name=$request->name;

    $data->email=$request->email;

    $data->password=bcrypt($request->password);

    $data->role='2';
    $data->save();

            session()->flash('msg', 'User Added');

            return redirect()->back();

   }

    public function admin(){
        return view('admin');
    }
  

    public function user(){
        return view('user');
    }
  
    public function addfund(){
        $category= Category::where('status' ,'=', 1)->get();
      
        return view('addfund')->with('category',$category);
    }

    public function  submitfund(Request $request){
      

        $data = new Fundlist;

        $data->name=$request->name;

        $data->amount=$request->amount;

        $data->method=$request->method;

        $data->date=$request->date;

        $data->d_name=$request->d_name;

        $data->d_email=$request->d_email;

        $data->d_phone=$request->d_phone;


        // $data->category_id=$request->category_id;
        
        // var_dump($data->category_id);
        // exit();


        $data->status=$request->status;

        $data->save();


        session()->flash('leo', 'Fund Added');

        return redirect()->back();

    }


    public function showuser(){

        $showData = User::Simplepaginate(4);
        return view('userlist',compact('showData'));
    }

    public function deleteData($id=null){
        $deleteData=User::find($id);
        $deleteData->delete();

        Session::flash('dlt','Data sucessfully Deleted');
        return redirect()->back();
    }
  

    public function updateData(Request $request,$id){
        $rules = [
            'name'=> 'required',
            'password'=> 'required|min:6',
           
        ];
    
        $cm = [
             'name.required' => 'Enter name',
            'password.min' => 'Password should be atleast 6 characters',
            'password.required'=> 'Enter password'
                  
        ];


        $this->validate($request,$rules,$cm);

        $data = User::find($id);
        $data->name=$request->name;
    
        $data->email=$request->email;
    
        $data->password=bcrypt($request->password);
    
        $data->role='2';
        $data->save();
        return redirect(route('userlist'));


    }


    public function editData($id=null){

        $editData = User::find($id);
        return view('editdata')->with('editData',$editData);
    }




    public function category(){
    return view('category');
    }


    public function SubmitCategory(Request $request){

        $data = new Category;
        $data->name=$request->name;
        $data->status=$request->status;


        $data->save();

        session()->flash('cat', 'Category Added');

        return redirect()->back();
    
    

    }


    public function fundlist(){
        $showdata = Fundlist::Simplepaginate(5);
        return view('fundlist')->with('showdata',$showdata);
    }

    public function deletefund($id=null){

        $deleteData=Fundlist::find($id);
        $deleteData->delete();

        return redirect()->back();


    }

    public function editfund($id=null){
        $showData = Fundlist::find($id);
        return view('editpage')->with('showData',$showData);

    }

    public function updatefund(Request $request,$id){

        $data = Fundlist::find($id);

        $data->name=$request->name;

        $data->amount=$request->amount;

        $data->method=$request->method;

        $data->date=$request->date;

        $data->d_name=$request->d_name;

        $data->d_email=$request->d_email;

        $data->d_phone=$request->d_phone;

        $data->status=$request->status;

        $data->save();

        session()->flash('fundupdate', 'Fund Updated');

        return redirect(url('fundlist'));

    }

    public function categorylist(){
        $showdata= Category::simplepaginate(5);
        return view('categorylist')->with('showdata',$showdata);
    }

    public function editcategory($id=null){

        $editdata = Category::find($id);
        return view('editcategory')->with('editdata',$editdata);
    }

    public function updatecategory(Request $request,$id){

        $data = Category::find($id);

        $data->name =$request->name;
        $data->status=$request->status; 
        $data->save();

        return redirect(url('categorylist'));

    }


}
