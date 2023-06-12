<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function omikuji()
    {
        $fortune = ['大凶', '凶', '小吉', '中吉', '大吉'];
        $index = random_int(0, count($fortune)-1);
        $todayFortune = $fortune[$index];
        return view('index', ['todayFortune' => $todayFortune]);
    }
}
