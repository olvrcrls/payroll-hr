<?php

namespace App\Models;

use App\Traits\HasTimezone;
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
    use SoftDeletes {
        restore as public softDeleteRestore;
    }
    use HasTimezone;

    /**
     * The attributes that are not mass assignable
     */
    protected $guarded = ['id'];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = [];

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
        // 'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
        'restored_at' => 'datetime',
    ];

    /**
     * Automatically set the first name attribute to lowercase
     * and display the data capitalized.
     * @return Attribute
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Automatically set the first name attribute to lowercase
     * and display the data capitalized.
     * @return Attribute
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Automatically set the first name attribute to lowercase
     * and display the data capitalized.
     * @return Attribute
     */
    protected function middleName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => strtolower($value),
        );
    }

    /**
     * Fetch related roles to the user
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
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

    /**
     * Override the restore function for SoftDeletes
     * @return void
     */
    public function restore(): void
    {
        $this->softDeleteRestore();
        $this->update([
            'restored_at' => now()
        ]);
    }

    public function test()
    {
    }
}
