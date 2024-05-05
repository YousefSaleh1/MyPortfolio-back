<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'training_name',
        'company_name',
        'description',
        'company_logo',
        'company_link',
        'certificate_link',
        'recomendation_letter_link',
    ];
}
