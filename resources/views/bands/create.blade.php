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
            font-size: 30px;
            text-align: left;
        }
        #position{
          margin-left: 30%;
          margin-right: 30%;
        }
        input{
          height: 25px;
          margin-bottom: 5px;
        }
        .inputCSS{
           border: none;
           padding: 15px 32px;
           text-align: center;
           text-decoration: none;
           display: inline-block;
           font-size: 16px;
        }
    </style>
</head>
<body  style=" background-color:#fdc4b6" >
<!-- if validation in the controller fails, show the errors -->
@if ($errors->any())
   <div  class="alert alert-danger">
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



    <div  style=" background-color:	#ea7070" class="form-group">
      <div id="position">
        <label for="name">band Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
      </div>

    <div   style=" background-color:#e59572" class="uk-margin">
      <div id="position">
        <label class="uk-form-label" for="describe">Beschrijven</label>
        <div class="uk-margin">
            <textarea class="uk-textarea" name="describe" rows="7" style="width:300px; margin-left: 4%;" placeholder="Beschrijven">{{ old('describe', isset($band->describe) ? $band->describe : null) }}</textarea>
        </div>
    </div>

    <div style=" background-color:#2694ab" class="form-group">
      <div id="position">
        <label for="url">video URL</label>
        <input type="text" class="form-control" name="url" required>
    </div>
    </div>


    <div   style=" background-color:#4dbedf" class="form-group">
      <div id="position">
        <input class="inputCSS"  type="file" name="file" required>
    </div>
    </div>
    <button class="inputCSS" id="position" type="submit">Submit</button>
</form>

</div>
</body>
</html>
