<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Expenses;


class Realestate extends Model
{
    use HasFactory;

    protected $fillable = [
        'real_estate_business',
        'id_expenses',
    ];

    public function realestates() {
        return $this->hasMany(Expenses::class);
    }


}
