<?php

namespace App\Http\Controllers;

use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadors = Trabajador::get();
        return view('trabajadors.index', compact('trabajadors'));
    }

    public function show($id)
    {
        //
    }
}
