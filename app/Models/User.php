<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany};
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
        'deleted_at' => 'datetime'
    ];

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
     * Fetch related roles to the user
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'id', 'role_id');
    }

    /**
     * Timesheets related to the user arranged from latest
     *
     * @return HasMany
     */
    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class)->latest('start');
    }

    /**
     * Display full name of the user conditional with middle name
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->middle_name ?
        $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name
        : $this->first_name . ' ' . $this->last_name;
    }
}
