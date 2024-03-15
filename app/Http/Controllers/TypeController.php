<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public  function index()
    {
        $types = Type::all();

        return $this->successResponse($types , 'all types has been retrieved successfully');
    }
}
