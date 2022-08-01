<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'salary',
        'interest_dividends',
        // 'real_estate_business',
        'id_people',
    ];
}
