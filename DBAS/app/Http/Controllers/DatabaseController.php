<?php

namespace App\Http\Controllers;
use App\Models\DatabaseModel;

class DatabaseController extends Controller
{
    public function index($request)
    {
    }

    public function show($nome, $tipo = '')
    {
        $model = new DatabaseModel();
        $tables = [];
        $qtd_empty = 0;
        $qtd_desc = 0;
        try {
            $tables = $model->getTables($nome);
            $empty_tables = $model->getEmptyTables($nome);
            $n_description_tables = $model->getIndescribableTables($nome);

            if($tipo === ''){
                $qtd_empty = count($empty_tables);
                $qtd_desc = count($n_description_tables);
            } else if ($tipo === 'dbas_vazias') {
                $tables = $empty_tables;
            } else if ($tipo === 'dbas_semdescricao') {
                $tables = $n_description_tables;
            }

            return view('tables', [
                'database' => $nome, 
                'tables' => $tables,
                'tipo' => $tipo,
                'qtd_empty' => $qtd_empty,
                'qtd_desc' => $qtd_desc,
            ]);
        } catch (\Exception $e) {
            $tables = [];
            return view('tables', [
                'erro' => $e->getMessage(), 
                'database' => $nome, 
                'tables' => $tables,
                'tipo' => $tipo,
                'qtd_empty' => $qtd_empty,
                'qtd_desc' => $qtd_desc,
            ]);
        }
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
