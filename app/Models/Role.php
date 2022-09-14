<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use HasFactory, SoftDeletes;

    /** Constant Variables for Role definition. */
    const SUPER_ADMIN = 'super_admin';
    const ADMIN = 'admin';
    const SYSTEM = 'system';

    const EMPLOYEE = 'employee';
    const SUPERVISOR = 'employee-supervisor';
    const DIRECTOR = 'director';


    /** Fetch related users to the role
     * 
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user', 'id', 'user_id');
    }
}
