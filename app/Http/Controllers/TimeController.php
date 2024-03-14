<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function __invoke()
    {
        $age = auth()->user()->age;

        if ($age <= 10 && $age >= 5) return 30;
        if ($age <= 15 && $age > 11) return 22;
        if ($age <= 25 && $age >= 15) return 14;
        if ($age <= 36 && $age >= 24) return 7;
        if ($age <= 48 && $age >= 36) return 14;
        if ($age <= 60 && $age >= 48) return 22;
        if ($age <= 68 && $age >= 60) return 30;

        return 30;
    }
}
