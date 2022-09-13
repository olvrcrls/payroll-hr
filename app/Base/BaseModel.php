<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    
    /**
     * Protect fields from  mass assignment
     */
    protected $guarded = ['id'];
}