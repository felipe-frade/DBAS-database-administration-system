<?php

namespace App\Http\Controllers;

class DatabaseController extends Controller
{
    public function index($request)
    {
    }
    
    public function show($nome)
    {
        
        return view('tables', ['database' => $nome]);
    }

    public function store($request)
    {
    }

    public function update($request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
