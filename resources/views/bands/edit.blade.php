  @extends('layouts.app')
  @section('content')
  <body style=" background-color:#fdc4b6">

    <div style=" background-color:#2694ab" class="row">
    <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">band aanpassen</h1>
  @if ($errors->any())
  <div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  </div>
  <br />
  @endif
  <form method="post" action="{{ route('bands.update', $band->id) }} ">
    @method('PUT')
    @csrf
  <div class="form-group">
  <label for="name">Naam:</label>
  <input type="text" class="form-control" name="name" value="{{ $band->name }}" >

  <label for="describe">Omschrijving:</label>
  <input type="text" class="form-control" name="describe"
  value="{{ $band->describe }}" >

  <label for="url">Url:</label>
  <input type="text" class="form-control" name="url"
  value="{{ $band->url }}" >

  </div>

  <button type="submit" class="btn btn-primary">Aanpassen</button>
  </form>
  </div>
  </div>
</body>
@endsection
