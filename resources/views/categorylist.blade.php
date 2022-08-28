@extends('layouts.app')

@section('content')

<div class="  mb-5 pb-5">
    <h3 class="change" style="color: rgb(95, 197, 197)" > <strong> Category List</strong></h3>


<style>
      .change {
        font-family: "Audiowide", sans-serif;
    }
</style>


<table class="table table-striped my-4 ">
    <thead>
      <tr class="table-success">
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Modify</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>

        @foreach($showdata as $key=>$data)

      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->name}}</td>

        <td>@if($data->status==1)
            {{'Active'}}      
       
        @else($data->status==0)
        {{'Inactive'}}
        @endif
       </td>

       <td><a href="{{url('editcategory/'.$data->id)}}" class="btn btn-warning">Edit </a></td>
       <td> <a href="{{url('deletecategory/'.$data->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td>
      </tr>
 
      @endforeach

    </tbody>
  </table>
  {{ $showdata->links() }}

</div>

@stop