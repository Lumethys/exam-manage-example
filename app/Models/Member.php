<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fulllname',
        'age',
        'gender',
        'school_id',
        'tel',
        'address',
    ];


    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
