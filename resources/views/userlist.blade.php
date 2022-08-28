@extends('layouts.app')

@section('content')

 <div class="  mb-5 pb-5">
<h3 style="color: rgb(95, 197, 197)">Users List</h3>
 
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created_at</th>
        <th scope="col">Modify</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($showData as $key=>$data)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->created_at}}</td>
        <td><a href="{{url('edit/'.$data->id)}}" class="btn btn-warning">Edit </a></td>
        <td> <a href="{{url('delete/'.$data->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td>
    
      </tr>
    
      @endforeach
   
    </tbody>
  </table>
  {{ $showData->links() }}

</div>






@stop
  