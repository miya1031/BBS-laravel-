<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function queryString(Request $request)
    {
        $keyword = $request->keyword;
        return view('queryString', ['keyword' => $keyword]);
    }

    public function profile($id)
    {
        return view('queryString', ['keyword' => $id]);
    }
}
