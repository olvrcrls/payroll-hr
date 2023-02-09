<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Traits\HasTimezone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use HasFactory;
    use HasTimezone;
    use SoftDeletes;

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['users'];

    /** Constant Variables for Role definition. */
    public const SUPER_ADMIN = 'super_admin';
    public const ADMIN = 'admin';
    public const SYSTEM = 'system';
    public const DEVELOPER = 'developer';

    public const EMPLOYEE = 'employee';
    public const EMPLOYER = 'employer';
    public const SUPERVISOR = 'employee-supervisor';
    public const DIRECTOR = 'director';


    /** Fetch related users to the role
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
