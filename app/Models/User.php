<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    public function contentPillars()
    {
        return $this->hasMany(ContentPillar::class, 'user_id');
    }

    public function contentCalendars()
    {
        return $this->hasMany(ContentCalendar::class, 'user_id');
    }
}