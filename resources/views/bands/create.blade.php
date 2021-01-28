<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
<!-- if validation in the controller fails, show the errors -->
@if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif

<div>

<form action="{{ route('band.store') }}" method="post" enctype="multipart/form-data">
        <!-- Add CSRF Token -->
        @csrf
    <div class="form-group">
        <label for="name">band Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="describe">Beschrijven</label>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="describe" rows="5" placeholder="Beschrijven">{{ old('describe', isset($band->describe) ? $band->describe : null) }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="url">video URL</label>
        <input type="text" class="form-control" name="url" required>
    </div>


    <div class="form-group">
        <input type="file" name="file" required>
    </div>
    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>
