<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCalender extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'category',
        'attachments',
        'upload_for',
        'reference',
        'format',
        'assignee',
    ];
}
