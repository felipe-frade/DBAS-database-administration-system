<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseModel extends Model
{
    use HasFactory;

    public function getTables($nome)
    {
        $sql = "SELECT t.TABLE_SCHEMA, t.TABLE_NAME, t.TABLE_ROWS, t.TABLE_COMMENT FROM TABLES t WHERE t.TABLE_SCHEMA = '" . $nome . "'";
        return DB::select($sql);
    }
    
    public function getEmptyTables($nome)
    {
        $sql = "SELECT t.TABLE_SCHEMA, t.TABLE_NAME, t.TABLE_ROWS, t.TABLE_COMMENT FROM TABLES t WHERE t.TABLE_ROWS = 0 and t.TABLE_SCHEMA = '" . $nome . "'";
        return DB::select($sql);
    }
    
    public function getIndescribableTables($nome)
    {
        $sql = "SELECT t.TABLE_SCHEMA, t.TABLE_NAME, t.TABLE_ROWS, t.TABLE_COMMENT FROM TABLES t WHERE LENGTH(t.TABLE_COMMENT) = 0 and t.TABLE_SCHEMA = '" . $nome . "'";
        return DB::select($sql);
    }
}
