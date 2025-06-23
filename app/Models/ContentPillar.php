<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPillar extends Model
{
  protected $fillable = [
        'name',
        'description',
        'percentage',
        'color',
    ];
}
