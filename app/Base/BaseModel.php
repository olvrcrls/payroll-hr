<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use SoftDeletes;

    /**
     * Protect fields from  mass assignment
     * 
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;
}