



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
        {{-- <th scope="row">{{$key+1}}</th> --}}

        <td>{{ $key + $showdata->firstItem() }}</td>

        <td>{{$data->name}}</td>

        {{-- <td>{{ $key + $data->firstItem() }}</td> --}}

        <td>@if($data->status==1)
            {{'Active'}}      
       
        @else
        {{'Inactive'}}
        @endif
       </td>

       <td><a href="{{url('editcategory/'.$data->id)}}" class="btn btn-warning">Edit </a></td>
       <td> <a href="{{url('deletecategory/'.$data->id)}}" onclick= "return confirm(' Are you sure you want to Delete')"  class="btn btn-danger">Delete </a></td>
      </tr>
 
      @endforeach

    </tbody>
  </table>

  {!! $showdata->render() !!}







