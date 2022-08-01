<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Income;
use App\Models\Realestate;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ExpensesController extends Controller
{
       //

       public function display(Request $rq)
       {
        
        $income = Income::where('id',$rq->id)->get();
           return view('expenses' , ["data" => $income]);
       }
   
       public function store()
       {
           //
           $ex = DB::table('expenses')
           ->select('id')
           ->orderBy('id', 'DESC')
           ->LIMIT(1)
           ->get();

            $expenses = new Expenses;
            $expenses->taxes = request('taxes');
            $expenses->home_mortgage_payment = request('home_mortgage_payment');
            $expenses->School_loan_payment = request('School_loan_payment');
            $expenses->car_loan_payment = request('car_loan_payment');

            $expenses->credit_card_payment = request('credit_card_payment');
            $expenses->other_expenses = request('other_expenses');
            $expenses->bank_loan_payment = request('bank_loan_payment');
            $expenses->per_child_expense = request('per_child_expense');
            $expenses->id_incomes = request('id_incomes');
            $expenses->save();

            $realestate = new Realestate;
            $realestate->real_estate_business = request('real_estate_business');
            $realestate->id_expenses = $expenses->id;
            // $realestate->id_expenses = request('id_');        
            $realestate->save();

            return redirect()->route('realestate.display' , [$expenses->id]);

       }

}

