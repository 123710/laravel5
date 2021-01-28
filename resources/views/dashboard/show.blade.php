
@extends('layouts.master')

@section('content2')
<section>
<h2>WWF History</h2>
<p>The World Wide Fund for Nature (WWF) is an international organization working on issues regarding the conservation, research and restoration of the environment, formerly named the World Wildlife Fund. WWF was founded in 1961.</p>
</section>

<h3 class="uk-text-lead uk-margin-remove">Zoek naar een band</h3>

<div class="uk-alert-danger uk-padding-small uk-text-danger">
    <p class="uk-margin-remove uk-text-center"><b>Let op:</b>je kunt hier allen op band naam zoeken.</p>
</div>

<form class="uk-form uk-margin-small-top uk-margin-large-bottom" method="GET" action="{{ route('search.results') }}">

	<div class="uk-grid-collapse" uk-grid>

		<div class="uk-width-2-3@m">


			<input type="text"
				class="uk-width-1-1 uk-form-large uk-input"
				name="search"
				placeholder="Zoek hier naar de naam of plaats..."
				value="{{ isset($search) ? $search['query'] : null }}">

		</div>

		<div class="uk-width-1-3@m">

			<button type="submit" class="uk-button uk-button-large uk-button-primary">Zoeken</button>

		</div>

	</div>

</form>

@foreach($bands as $band)

 <br><br>
 <div class="uk-container">

     <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-scrollspy="cls: uk-animation-slide-left; repeat: true" uk-grid>
         <div class="uk-card-media-left uk-cover-container">
             <img src="{{ url('storage/images/'.$band->file_path) }}" alt="" uk-cover>
             <canvas width="600" height="400"></canvas>
         </div>
         <div>
             <div class="uk-card-body">
                 <h3 class="uk-card-title">{{ $band->name }}</h3>
                 <p class="uk-text-meta uk-margin-remove-top"><time datetime="1">222</time></p>
                 <p>{{ $band->describe }}</p>
             </div>
             <div class="uk-card-footer">
                 <a href="{{route('video')}}" class="uk-button uk-button-text uk-align-right">bekijken</a>
             </div>
         </div>
     </div>
 </div>
@endforeach

@endsection
