<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InicialController extends Controller
{
    public function index()
    {
        return inertia('Inicial/Home');
    }
}
