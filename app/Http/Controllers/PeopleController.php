<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function display()
    {
        //
        return view('home');
    }

    public function store()
    {
        //
        $people = new People;
        $people->profession = request('profession');
        $people->dream = request('dream');
        $people->auditor = request('auditor');
        $people->save();
        // $people->id;
        
        // dd($people->id);
        // return view('income');
        // ["data" => $people ]

        return redirect()->route('income.display', [$people->id]);
    }
}
