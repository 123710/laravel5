<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'describe','file_path','url'
    ];

    public function members()
    {
      return $this->hasMany('App\Models\BandMember');
    }


}
