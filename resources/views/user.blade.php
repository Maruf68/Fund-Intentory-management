{{-- <x-app-layout> --}}

    @extends('layouts.app')

    @section('content')
  
  
    
  {{-- 
       <div class="mx-5" style="background-color: azure"> <h1>  <strong> Admin Dashboard</strong></h1>
      </div>  --}}
      
  
  
  <div class="card" style="width:28em " class="my-3 mx-5 py-3">
      <div class="card-body">
  
  <div style="width: 80%" class="my-3 mx-5">
      <h2 style="font-size:20px; color:DodgerBlue "><strong>Add User:</strong></h2>
  
      <form action="{{url('/adduser')}}" method="post" class="my-3">
          @csrf
  
          @if (session('msg'))
          <div class="alert alert-success" role="alert">
              {{ Session::get('msg') }}
               </div>
               @endif


          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputPassword1">
            </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" placeholder="Password must be atleast 6 characters" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit"  style="color: rgb(238, 220, 220); background-color:rgb(76, 76, 183)" class="btn btn-primary">Submit</button>
        </form>
  
  </div>
  
  </div>
  </div>
  
  
  @stop
  
  
      
      {{-- </x-app-layout> --}}
      
      
      
  