@extends('layouts.app')

@section('content')

    
   <h3 class="heart" style="color: rgb(95, 197, 197)" ><strong>{{'Add Cost list'}}</strong> </h3>


   <style>
    .heart{
      font-family: "Audiowide", sans-serif;
    }
  </style>

  
@if (session('Costlist'))
<div class="alert alert-success" role="alert">
    {{ Session::get('Costlist') }}
     </div>
     @endif
   
   <form  action="{{url('/postcostlist')}}" method="post" class="my-3" enctype="multipart/form-data">
    @csrf



    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputPassword1">
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Amount</label>
        <input type="text" name="amount" class="form-control" id="exampleInputPassword1">
      </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Project </label>
        <select  name="project_id" class="form-control"> 
            
            @foreach ($projectdata as $item)
                
         

          <option value="{{$item->id}}">{{$item->name}}</option>

          @endforeach

        </select>
      </div>



      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Upload</label>
        <input type="file" name="upload" class="form-control" id="exampleInputPassword1">
      </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cost Category</label>
        <select  name="cost_category_id" class="form-control"> 

            

            @foreach ($CostCategorydata as $data)
                
           
          <option value="{{$data->id}}">{{$data->name}}</option>
          @endforeach
        </select>
      </div>



      <button  type="submit" class="btn btn-primary">Add</button>
  
   
 
  </form>
@stop