<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstanteriasController extends Controller
{
    public function index() {

        return view ('mis-estanterias');
    }
}
