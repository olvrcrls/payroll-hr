<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasTimezone
{
    /**
     * Display the datetime format from UTC to specified timezone
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Carbon::parse($value),
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
            set: fn ($value) => Carbon::parse($value),
            get: fn ($value) => Carbon::createFromTimestamp(strtotime($value))->timezone(config('app.timezone_display')),
        );
    }
}
