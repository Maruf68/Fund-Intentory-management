@extends('layouts.redirect')

@section('content')



<table style="width:10px; background-color:#F3F6F9 " class="table table-bordered">
    <thead>
     
      <tr class="table-info">
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Method</th>
        <th scope="col">Date</th>
        <th scope="col">Donor_Name</th>
        <th scope="col">Donor_Email</th>
        <th scope="col">Donor_Phone</th>
        <th scope="col">Status</th>
        <th scope="col">Category</th>
        <th scope="col">Modify</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach($showdata as $key=>$data)
      <tr >
        <th scope="row">{{$key + $showdata->firstItem()}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->amount}}</td>
        <td>{{$data->method}}</td>
        <td>{{$data->date}}</td>
        <td>{{$data->d_name}}</td>
        <td>{{$data->d_email}}</td>
        <td>{{$data->d_phone}}</td>
        <td> @if($data->status==1)
          {{'Payment pending'}}
          @elseif($data->status==2)
          {{'Payment completed'}}

          @else
          {{'Refunded' }}
          @endif
          </td>
        

          <td>
     
                 @if($data->Category)  
                {{$data->Category->name}} 

                @endif 
      
          </td>
    

        <td><a href="{{url('editfund/'.$data->id)}}" class="btn btn-warning">Edit </a></td>
        <td> <a href="{{url('deletefund/'.$data->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td>
    

 
      </tr>
   @endforeach
    </tbody>
  </table>

  {{ $showdata->links() }}
  



@stop