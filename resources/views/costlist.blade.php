

  @extends('layouts.app')

  @section('content')

  
  <h3 class="change mx-3" style="color: rgb(95, 197, 197)" > <strong> Project List</strong></h3>
  
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
          <th scope="col">Amount</th>
          <th scope="col">Project Name</th>
          <th scope="col">File</th>
          <th scope="col">Cost Category Name</th>
          <th scope="col">Modify</th>
          <th scope="col">Remove</th>
        </tr>
      </thead>
      <tbody>


       @foreach ($showdata as $key=>$item)
           
      
        <tr >
          <th scope="row">{{$key+1}}</th>
          <td>{{$item->name}}</td>
          <td>{{$item->amount}}</td>


            <td> 
              @if($item->Project)  
              {{$item->Project->name}} 

              @endif 
            </td>
                    
  


  
          <td>
            {{-- <iframe height="100"  width="100" src="/assets/{{$item->file}}"></iframe> --}}
               {{$item->upload}}
            <a href="{{url('/download',$item->upload)}}">Download</a>
          </td>
 
          <td>
          @if($item->CostCategory)

         {{$item->CostCategory->name}}

            @endif

          </td>


        
  
  
  
          {{-- <td> @if($data->status==1)
            {{'Payment pending'}}
            @elseif($data->status==2)
            {{'Payment completed'}}
  
            @else
            {{'Refunded' }}
            @endif
            </td> --}}
          
  
      
      
  
           <td><a href="{{url('editcostlist/'.$item->id)}}" class="btn btn-warning">Edit </a></td>
          <td> <a href="{{url('deletecostlist/'.$item->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td> 
      
  
   
        </tr>
        @endforeach
   
      </tbody>
    </table>
  
    {{ $showdata->links() }}
  
  
  
  


  @stop