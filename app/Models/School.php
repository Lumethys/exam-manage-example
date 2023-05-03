<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function inviteCodes(): HasMany
    {
        return $this->hasMany(InviteCode::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, InviteCode::class);
        //return $this->through(InviteCode::class)->has(User::class);
    }
}
