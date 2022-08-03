<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Realestate;


class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'taxes',
        'home_mortgage_payment',
        'School_loan_payment',
        'car_loan_payment',
        
        'credit_card_payment',
        'other_expenses',
        'bank_loan_payment',
        'per_child_expense',
        'id_incomes',
        'children'
    ];

    public function realestates() {
    }
}
