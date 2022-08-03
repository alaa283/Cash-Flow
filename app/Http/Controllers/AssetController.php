<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Realestate;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function display(Request $rq)
    {
        //
        $realestate = Realestate::where('id',$rq->id)->get();
        return view('assets' , ["data" => $realestate]);
    }

    public function store(Request $request)
    {
        $asset = new Asset;
        $asset->savings = request('savings');
        $asset->id_realestates = request('id_realestates');
        $asset->save();

        return redirect()->route('people.display');
    }
}