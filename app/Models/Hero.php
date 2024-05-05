<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'my_cv'
    ];

    /**
     * Get all of the hero_sliders for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hero_sliders(): HasMany
    {
        return $this->hasMany(HeroSlider::class, 'hero_id', 'id');
    }
}
