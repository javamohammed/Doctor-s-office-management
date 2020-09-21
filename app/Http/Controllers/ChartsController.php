<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function index()
    {
        return \view('test');
    }

    public function getData()
    {
        $data = ["name"=>["mido", "karim", "ali"], "marks" => [25, 45, 89]];

        return response()->json($data);
    }
}
