<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property int|null $restored_by
 * @property string|null $restored_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRestoredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereRestoredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutTrashed()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Timesheet
 *
 * @property int $id
 * @property string $start
 * @property string|null $end
 * @property string|null $original_start
 * @property string|null $original_end
 * @property int $break_minutes
 * @property string|null $annotation
 * @property string $type
 * @property string $status
 * @property int $user_id
 * @property int $approved_by
 * @property string|null $approver_note
 * @property string|null $approved_at
 * @property string|null $finalized_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property int|null $restored_by
 * @property string|null $restored_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet approved()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereAnnotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereApproverNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereBreakMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereFinalizedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereOriginalEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereOriginalStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereRestoredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereRestoredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Timesheet withoutTrashed()
 */
	class Timesheet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $last_login_at
 * @property string|null $last_logout_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property int|null $restored_by
 * @property \Illuminate\Support\Carbon|null $restored_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Timesheet> $timesheets
 * @property-read int|null $timesheets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRestoredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRestoredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

