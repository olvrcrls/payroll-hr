<?php

namespace App\Models;

use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheet extends BaseModel
{
    use HasFactory, SoftDeletes;

    /**
     * Constant variables for status tracking
     */
    const APPROVED = 'approved';
    const PENDING = 'pending';
    const UPDATED = 'updated';
    const DECLINED = 'declined';
    const CHANGE_REQUEST = 'change-request';
    const FINAL = 'finalized';

    /**
     * Constant variables for type of timesheets
     */
    const WORK_DAY = 'normal';
    const NORMAL_TYPE = 'normal';
    const HOLIDAY = 'holiday';
    const NIGHT = 'night-shift';
    const WEEKEND = 'weekend';
    const OT_TYPE = 'weekend';

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

}
