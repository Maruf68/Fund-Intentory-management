@extends('layouts.app')

@section('content')


<h3 class="header font-effect-neon" style="color: rgb(95, 197, 197)" ><strong>{{'Balance sheet'}}</strong></h3>

   <style>
    .header{
      font-family: "Audiowide", sans-serif;
      font-size: 35px;
    }
  </style>


<table style="border: 0.8px solid rgb(96, 96, 114)" class="table table-bordered my-5">
    <thead>
      <tr class="table-dark">
        <th scope="col">No.</th>

        <th colspan="2">Cost lists</th>


        <th scope="col">Amount</th>

  
      
      </tr>
    </thead>
    <tbody>

           {{-- @foreach ($showdata as $item) --}}
               
  
      
      <tr>
        <th scope="row">1</th>
        <td colspan="2">Total Funds</td>
        <td>{{$showdata}}</td>        
    
      </tr>
  

      <tr>
        <th scope="row">2</th>
        <td colspan="2">Totall Project costing</td>
        <td>{{$showcost}}</td>
        
      </tr>

      @php
          $result= $showdata - $showcost;
      @endphp

      <tr>
        <th ></th>
        <td colspan="2"><strong>Balance</strong> </td>    
        <td><strong>{{$result}}</strong> </td>
     
      </tr>
    </tbody>
  </table>







@stop