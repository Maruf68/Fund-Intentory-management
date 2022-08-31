@extends('layouts.app')

@section('content')

<h3 class="change" style="color: rgb(95, 197, 197)" > <strong> Project List</strong></h3>

<style>
  .change {
    font-family: "Audiowide", sans-serif;
}
</style>


<table style="width:10px; background-color:#F3F6F9 " class="table table-bordered my-5">
    <thead>
     
      <tr class="table-info">
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">description</th>
        <th scope="col">User</th>
        <th scope="col">Status</th>
        <th scope="col">Modify</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach($showdata as $key=>$data)
      <tr >
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->description}}</td>



        {{-- <td> @if($data->status==1)
          {{'Payment pending'}}
          @elseif($data->status==2)
          {{'Payment completed'}}

          @else
          {{'Refunded' }}
          @endif
          </td> --}}
        

          <td>
     
                 @if($data->User)  
                {{$data->User->name}} 

                @endif 
      
          </td>

   
          <td>@if($data->status==0)
            {{'Pending'}}      
          
          @elseif($data->status==1)
          {{'Processing'}}

          @elseif($data->status==2)
          {{'Completed'}}

          @elseif($data->status==3)
          {{'Cancelled'}}

          @endif
          </td>
    

        <td><a href="{{url('editproject/'.$data->id)}}" class="btn btn-warning">Edit </a></td>
        <td> <a href="{{url('deleteproject/'.$data->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td>
    

 
      </tr>
   @endforeach
    </tbody>
  </table>

  {{ $showdata->links() }}




@stop




