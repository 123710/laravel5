<?php
namespace App\Search\Filters;

use App\Search\FilterInterface as Filter;
use Illuminate\Database\Eloquent\Builder;

class Name implements Filter
{

	/**
	 * Apply a given search value to the builder instance.
	 * @param  Builder  $builder
	 * @param  Mixed    $value   
	 * @return Builder  $builder
	 */	
	public static function apply (Builder $builder, $value)
	{
		return $builder->orWhere('name', 'LIKE', '%' . $value . '%');	
	}

}
