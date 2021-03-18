<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandMember extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'band_id'
    ];

    public function band()
    {
      return $this->belongsTo('App\Models\Band');
    }

}
