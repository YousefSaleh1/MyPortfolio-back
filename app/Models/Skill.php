<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_name'
    ];

    /**
     * Get all of the skill_items for the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skill_items(): HasMany
    {
        return $this->hasMany(SkillItem::class, 'skill_id', 'id');
    }
}
