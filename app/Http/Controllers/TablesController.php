<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{

    public function show(Request $request)
    {
        $database = $request->database;
        $table = $request->table;
        //$connection = $request->connection;

        return $table;
        // $tables = DB::connection($database)->select('SHOW TABLES');

        //return $tables;

    }
}
