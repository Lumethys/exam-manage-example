<?php

namespace App\Models;

use App\Enums\MemberPosition;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'exam_id',
        'school_id',
        'managing_user_id',
        'upload_assignment_url'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'managing_user_id', 'id');
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'group_member');
    }

    public function teacher()
    {
        // return $this->hasOne(Member::class)->ofMany('id', function (Builder $query) {
        //     $query->wherePivot('position', MemberPosition::Teacher);
        // });

        //return $this->belongsToMany(Member::class, 'group_member')->wherePivot('position', MemberPosition::Teacher)->first();
        return $this->belongsToMany(Member::class, 'group_member')->wherePivot('position', 2)->first();
    }

    public function leader()
    {
        // return $this->hasOne(Member::class)->ofMany('id', function (Builder $query) {
        //     $query->wherePivot('position', MemberPosition::GroupLeader);
        // });

        //return $this->belongsToMany(Member::class, 'group_member')->wherePivot('position', MemberPosition::GroupLeader)->first();
        return $this->belongsToMany(Member::class, 'group_member')->wherePivot('position', 1)->first();

    }
}
