<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Constant variables for status tracking
     */
    public const APPROVED = 'approved';
    public const PENDING = 'pending';
    public const UPDATED = 'updated';
    public const DECLINED = 'declined';
    public const CHANGE_REQUEST = 'change-request';
    public const FINAL = 'finalized';

    /**
     * Constant variables for type of timesheets
     */
    public const WORK_DAY = 'normal';
    public const NORMAL_TYPE = 'normal';
    public const HOLIDAY = 'holiday';
    public const NIGHT = 'night-shift';
    public const WEEKEND = 'weekend';
    public const OT_TYPE = 'weekend';

    /**
     * Returns a user record that owns the timesheet.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // TODO: Determine if timesheet is an OT, has OT approved, Night Differential, approval

    /**
     * Filter all the timesheet where it is approved
     * @param mixed $query
     * @return Builder
     */
    public function scopeApproved($query): Builder
    {
        return $query->where('approved_at', '!=', null);
    }
}
