<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custompackage extends Model
{
    use HasFactory;

    protected $table = 'custompackages';

    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
    ];
}


