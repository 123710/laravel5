@extends('layouts.app')

@section('content')
<div class="container">


  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Bands</h1>
<table>
   <tr>
     <td>Naam: </td>
   <td>{{$band->name}}</td>
 </tr>
 <tr>
   <td>Omschrijving: </td>
   <td>{{$band->describe}}</td>
</tr>
 </table>
  </div>
  </div>
</div>

@endsection
