@extends('layouts.app')

@section('content')

    
   <h3 style="color: rgb(95, 197, 197)" >{{'Edit Cost Category'}}</h3>

   
   
   <form  action="{{url('/updatecostcategory/'.$showData->id)}}" method="post" class="my-3">
    @csrf

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Name</label>
        <input value="{{$showData->name}}" type="text" name="name" class="form-control" id="exampleInputPassword1">
      </div>


    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label"> Status </label>
      <select  name="status" class="form-control"> 


        <option value="0" @if($showData->status==0) selected @endif >{{'Inactive'}}
        
        </option>

        <option value="1" @if($showData->status==1) selected @endif>{{'Active'}}
        
        </option>

        {{-- <option value="1">Active</option>
        <option value="0">Inactive</option>  --}}





      </select>
    </div>

      <button  type="submit" class="btn btn-primary">Add</button>
  
 
  </form>
@stop