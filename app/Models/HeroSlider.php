<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroSlider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hero_id',
        'photo_slide',
        'photo_title'
    ];

    /**
     * Get the hero that owns the HeroSlider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class, 'hero_id');
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($heroSlider) {
            $heroSlider->hero_id = 1;
        });
    }
}
