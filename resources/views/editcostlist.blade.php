@extends('layouts.app')

@section('content')

    
   <h3 class="heart" style="color: rgb(95, 197, 197)" ><strong>{{'Update Cost list'}}</strong> </h3>


   <style>
    .heart{
      font-family: "Audiowide", sans-serif;
    }
  </style>
   
   <form  action="{{url('/updatecostlist/'.$showData->id)}}" method="post" class="my-3" enctype="multipart/form-data">
    @csrf


<<<<<<< HEAD
       

=======
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Name</label>
        <input type="text" value="{{$showData->name}}" name="name" class="form-control" id="exampleInputPassword1">
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Amount</label>
        <input type="text" value="{{$showData->amount}}" name="amount" class="form-control" id="exampleInputPassword1">
      </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Project </label>
        <select  name="project_id" class="form-control"> 
            
            @foreach ($project as $item)
                
         

          <option value="{{$item->id}}" @if($item->id==$showData->project_id) selected @endif>{{$item->name}}</option>

          @endforeach

        </select>
      </div>

   
      <div class="mb-3">
        <label for="exampleInputPassword1"  class="form-label"> Upload</label>
<<<<<<< HEAD
        <input type="file" name="upload" class="form-control" id="exampleInputPassword1">
=======
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <img src="{{asset('assets/'.$showData->image)}}" width="70px" height="70px" alt="Image">
>>>>>>> f5b6fc2 (Category list is showing by ajax call and image is now showing)
      </div>
 
      <input type="hidden" name="old_img" value="{{$showData->upload}}">

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cost Category</label>
        <select  name="cost_category_id" class="form-control"> 

            

            @foreach ($cost_category as $data)
                
           
          <option value="{{$data->id}}" @if($data->id==$showData->cost_category_id) selected @endif >{{$data->name}}</option>
          @endforeach
        </select>
      </div>



      <button  type="submit" class="btn btn-primary">Update</button>
  
   
 
  </form>
@stop