<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PeopleController;

use App\Models\Income;
use App\Models\People;
use App\Models\Expenses;

use App\Models\Realestate;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    //

    public function display(Request $rq)
    {
        $people = People::where('id',$rq->id)->get();
        return view('cash' , ['data' => $people]);
    }

    public function store()
    {
        $income = new Income;
        $income->salary = request('salary');
        $income->interest_dividends = request('interest_dividends');
        $income->id_people = request('id_people');
        $income->save();

        $expenses = new Expenses;
        $expenses->taxes = request('taxes');
        $expenses->home_mortgage_payment = request('home_mortgage_payment');
        $expenses->School_loan_payment = request('School_loan_payment');
        $expenses->car_loan_payment = request('car_loan_payment');

        $expenses->credit_card_payment = request('credit_card_payment');
        $expenses->other_expenses = request('other_expenses');
        $expenses->bank_loan_payment = request('bank_loan_payment');
        $expenses->per_child_expense = request('per_child_expense');
        $expenses->children = request('children');

        $total_expenses= $expenses->taxes + $expenses->home_mortgage_payment +
                          $expenses->School_loan_payment + $expenses->car_loan_payment +
                          $expenses->credit_card_payment + $expenses->other_expenses +
                          $expenses->bank_loan_payment + ($expenses->per_child_expense * $expenses->children);

        $expenses->id_incomes = $income->id;
        $expenses->save();

        $realestate = new Realestate;
        $realestate->real_estate_business = request('real_estate_business');
        // $realestate->monthly_cash_flow = request('monthly_cash_flow');
        $total_income = $income->salary + $realestate->real_estate_business;
        $realestate->monthly_cash_flow = $total_income - $total_expenses;
        $realestate->id_expenses = $expenses->id;
        // dd($income, $expenses, $total_expenses, $total_income, $realestate);
        $realestate->save();

        return redirect()->route('asset.display' , [$realestate->id]);
    }
}
