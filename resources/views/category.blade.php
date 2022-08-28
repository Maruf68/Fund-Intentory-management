@extends('layouts.app')

@section('content')


   <h3 class="header" style="color: rgb(95, 197, 197)" ><strong>{{'Add Category'}}</strong></h3>


   <style>
    .header{
      font-family: "Audiowide", sans-serif;
    }
  </style>
   
   <form  action="{{url('/submitcategory')}}" method="post" class="my-3">
    @csrf

    @if (session('cat'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('cat') }}
         </div>
         @endif

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputPassword1">
      </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Category Status </label>
      <select  name="status" class="form-control"> 
        <option value="1">Active</option>
        <option value="0">Inactive</option> 
      </select>
    </div>



      <button  type="submit" class="btn btn-primary">Add</button>
  
   
 
  </form>


@stop
  