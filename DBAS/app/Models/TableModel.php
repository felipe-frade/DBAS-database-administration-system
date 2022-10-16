<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TableModel extends Model
{
    use HasFactory;

    public function getColumns($database, $nome){
        $sql = "SELECT
            c.COLUMN_NAME,
            c.COLUMN_DEFAULT,
            c.COLUMN_COMMENT,
            c.DATA_TYPE,
            c.COLUMN_TYPE
        FROM
        COLUMNS c WHERE c.TABLE_SCHEMA = '". $database ."' AND c.TABLE_NAME = '". $nome ."'";
        return DB::select($sql);
    }

    public function getIndescribableColumns($database, $nome)
    {
        $sql = "SELECT
            c.COLUMN_NAME,
            c.COLUMN_DEFAULT,
            c.COLUMN_COMMENT,
            c.DATA_TYPE,
            c.COLUMN_TYPE
        FROM
        COLUMNS c WHERE LENGTH(c.COLUMN_COMMENT) = 0 and c.TABLE_SCHEMA = '". $database ."' AND c.TABLE_NAME = '".$nome."'";
        return DB::select($sql);
    }
}
