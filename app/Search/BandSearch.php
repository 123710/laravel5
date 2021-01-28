<?php
namespace App\Search;

use App\Models\Band;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BandSearch
{

	/**
	 * Available filters.
	 * @var Array
	 */
	protected static $availableFilters = [
		'name',
	];

	/**
	 * Perform a new search and filter action.
	 * @param  Request  $filters  Filter form input.
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public static function apply (Request $request)
	{
		// Instantiate search.
		$query = static::applyAvailableFilters($request->search, (new Band)->newQuery());

		// Return search results.
		return static::getResults($query);
	}

	/**
	 * Apply filters.
	 * @param   Request  $request  Filter form input.
	 * @param   Builder  $query    Query builder
	 * @return  Builder  $query    Query builder
	 */
	private static function applyAvailableFilters($searchValue, Builder $query)
	{
		foreach (static::$availableFilters as $filterName)
		{
			// Get filter instance.
			$decorator = static::createFilterDecorator($filterName);

			// Apply all filters for this search.
			if (static::isValidDecorator($decorator))
			{
				$query = $decorator::apply($query, $searchValue);
			}
		}

		return $query;
	}

	/**
	 * Create filter class.
	 * @param  String  $filterName  Name of the filter class.
	 * @return String  Class name including namespace.
	 */
	private static function createFilterDecorator ($filterName)
	{
		return __NAMESPACE__ . '\\Filters\\' . 	Str::studly($filterName);
	}

	/**
	 * Check if decorator (filter class) is valid.
	 * 
	 * @param  String   $decorator  Full path (namespace) to class.
	 * @return boolean  True on success, false otherwise.
	 */
	private static function isValidDecorator($decorator)
	{
		return class_exists($decorator);
	}

	/**
	 * Return the search results.
	 * 
	 * @param  Builder  $query 
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	private static function getResults(Builder $query)
	{
		return $query->paginate();
	}

}
