@extends('layouts.app')

@section('content')

<div class="  mb-5 pb-5">
    <h3 style="color: rgb(243, 228, 16)" > <strong>Update Category </strong></h3>


   <form action="{{url('/updatecategory/'.$editdata->id)}}" method="post" class="my-3">
    @csrf

 

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Category Name</label>
        <input type="text" value="{{$editdata->name}}" name="name" class="form-control" id="exampleInputPassword1">
      </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category Status </label>
      <select name="status" class="form-control"> 
        <option value="1">Active</option>
        <option value="0">Inactive</option> 
      </select>
    </div>



      <button  type="submit" class="btn btn-primary">Update</button>
  
   
 
  </form>



@stop
  