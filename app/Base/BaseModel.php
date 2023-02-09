<?php

namespace App\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use SoftDeletes {
        restore as public softDeleteRestore;
    }

    /**
     * Protect fields from  mass assignment
     *
     * @var array<string>
     */
    protected $guarded = ['id'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Display the datetime format from UTC to specified timezone
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromTimestamp(strtotime($value))->timezone(config('app.timezone_display')),
        );
    }

    /**
     * Display the datetime format from UTC to specified timezone
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::createFromTimestamp(strtotime($value))->timezone(config('app.timezone_display')),
        );
    }

    /**
     * Override the restore function for SoftDeletes
     * @return void
     */
    public function restore()
    {
        $this->softDeleteRestore();
        $this->update([
            'restored_at' => now()
        ]);
    }
}
