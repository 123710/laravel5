@extends('layouts.app')

@section('content')
<div class="container">


  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Bands</h1>
<table>
  @foreach($bands as $band)
   <tr>
   <td>{{$band->name}}</td>
   <td>{{$band->describe}}</td>
   <td>  <a href="{{ route('bands.show', $band->id)}}"class="btn btn-primary">Beheren</a>
  </tr>
   @endforeach
 </table>
  </div>
  </div>
</div>

@endsection
