<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PeopleController;

use App\Models\Income;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    //

    public function display()
    {
        // $people = new PeopleController;

        // $people->store();

        $people = DB::table('people')
        ->select('id' , 'profession' )
        ->orderBy('id', 'DESC')
        ->LIMIT(1)
        ->get();
        return view('income' , ['data' => $people]);
    }

    public function store()
    {
        //
        $income = new Income;
        $income->salary = request('salary');
        $income->interest_dividends = request('interest_dividends');
        // $income->real_estate_business = request('real_estate_business');
        $income->id_people = request('id_people');
        $income->save();

        return redirect()->route('expenses.display' , [$income->id]);
    }
}
