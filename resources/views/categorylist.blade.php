@include('product_js')
@extends('layouts.app')


@section('content')


<input class="form-control border-1 below" id="search" type="search" placeholder="Search">



<div class="  mb-5 pb-5 my-3">
    <h3 class="change" style="color: rgb(95, 197, 197)" > <strong> Category List</strong></h3>


<style>
      .change {
        font-family: "Audiowide", sans-serif;
    }
</style>


<div class="table-data">
<table class="table table-striped my-4 ">
    <thead>
      <tr class="table-success">
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th id="status" scope="col">Status</th>
        <th scope="col">Modify</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>

        @foreach($showdata as $key=>$data)

      <tr>
        {{-- <th scope="row">{{$key+1}}</th> --}}

        <td>{{ $key + $showdata->firstItem() }}</td>

        <td>{{$data->name}}</td>

        {{-- <td>{{ $key + $data->firstItem() }}</td> --}}

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
  {!! $showdata->links() !!}

</div>

</div>


<style>

  .below{
    margin-top: 20px;
  }
</style>












@stop
