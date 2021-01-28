<?php

namespace App\Http\Controllers;

use App\Search\BandSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
	/**
	 * Return the search results view.
	 * @param  Request  $request  Search form input.
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showSearchResults (Request $request)
	{
		// Apply filter
        $bands = BandSearch::apply($request);

		return view('dashboard.show')
			->with('bands', $bands);
	}
}
