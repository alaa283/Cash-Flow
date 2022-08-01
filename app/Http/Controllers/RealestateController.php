<?php

namespace App\Http\Controllers;

use App\Models\Realestate;
use Illuminate\Http\Request;

use App\Models\Expenses;

class RealestateController extends Controller
{
    //
    public function display(Request $rq)
    {
        $expenses = Expenses::where('id',$rq->id)->get();
        return view('assets' , ["data" => $expenses]);
    }

    public function store()
    {
        return redirect()->route('expenses.display');
    }
}
