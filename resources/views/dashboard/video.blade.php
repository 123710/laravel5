
@extends('layouts.master')

@section('content2')


    <div class="uk-position-z-index uk-height-1-1 uk-position-relative uk-container">

        <div class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1">

            <h1 class="pr-header-title pr-text-white uk-margin-top">B A N D S L I S T</h1>

        </div>

    </div>
    <div class="uk-section">
            <div class="uk-container uk-card-body uk-text-center">
                <h2>Duizenden muzikanten hebben op EPK websites gebouwd.</h2>
                <p>Hier zijn enkele live voorbeelden.</p>
            </div>
        </div>


        @foreach($bands as $band)

        <div class="uk-section">
            <div class="uk-container uk-card-body uk-text-center">
                <iframe class="uk-responsive-width" width="956" height="538" src="{{ $band->url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        @endforeach
        <br> <br>
        <div class="uk-container">
            <ul class="uk-pagination">
                <li><a href="#"><span class="uk-margin-small-right" uk-pagination-previous></span> Vorige</a></li>
                <li class="uk-margin-auto-left"><a href="#">Volgende <span class="uk-margin-small-left" uk-pagination-next></span></a></li>
            </ul>
        </div>
        <br> <br>


@endsection
