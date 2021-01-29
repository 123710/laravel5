@extends('layouts.app')

@section('content')
<body  	style=" background-color:#2694ab;">

<div  	style=" background-color:coral;" class="container">


  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Bands</h1>
<table>
   <tr>
     <td>Naam: </td>
   <td>{{$band->name}}</td>
   <td>
 <button type="submit"><a href="{{ route('bands.edit',$band->id)}}"
class="btn btn-primary">Aanpassen</a> </button>
 </td>
 <td>
<form action="{{ route('bands.destroy', $band->id)}}"
method="post">
@method('DELETE')
@csrf
&nbsp;
<button class="btn btn-danger" type="submit">Verwijderen</button>
</form>
</td>
 </tr>
 <tr>
   <td>Omschrijving: </td>
   <td>{{$band->describe}}</td>
</tr>
 </table>
  </div>
  </div>
</div>
</body>

@endsection
