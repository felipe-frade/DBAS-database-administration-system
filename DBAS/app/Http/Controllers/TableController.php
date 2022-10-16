<?php

namespace App\Http\Controllers;

use App\Models\TableModel;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function show($database, $table, $tipo = '')
    {
        $model = new TableModel();
        $columns = [];
        $qtd_desc = 0;

        try {
            $columns = $model->getColumns($database, $table);
            $n_description_columns = $model->getIndescribableColumns($database, $table);

            if($tipo === ''){
                $qtd_desc = count($n_description_columns);
            } else if ($tipo === 'dbas_semdescricao') {
                $columns = $n_description_columns;
            }

            return view('table', [
                'database' => $database, 
                'table' => $table, 
                'columns' => $columns,
                'tipo' => $tipo,
                'qtd_desc' => $qtd_desc,
            ]);
        } catch (\Exception $e) {
            $columns = [];
            return view('table', [
                'erro' => $e->getMessage(), 
                'database' => $database, 
                'table' => $table, 
                'columns' => $columns,
                'tipo' => $tipo,
                'qtd_desc' => $qtd_desc,
            ]);
        }
    }
}
