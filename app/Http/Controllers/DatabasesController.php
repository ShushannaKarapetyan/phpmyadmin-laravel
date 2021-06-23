<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDBRequest;
use App\Services\Connection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DatabasesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $databases = DB::select('SHOW DATABASES');
        $db_tables = [];
        $tables = [];

        foreach ($databases as $key => $database) {
            Connection::connect("mysql-$key", 'localhost', 'root', 'password', $database->Database);

            $db_tables[$key]['name'] = $database->Database;
            $db_tables[$key]['connection'] = "mysql-$key";

            $tables = DB::connection("mysql-$key")->select('SHOW TABLES');

            foreach ($tables as $table) {
                $tableName = "Tables_in_" . $database->Database;
                $db_tables[$key]['tables'][] = $table->$tableName;
            }
        }

        return response()->json($db_tables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDBRequest $request
     * @return string
     */
    public function store(CreateDBRequest $request): string
    {
        DB::statement("CREATE DATABASE $request->dbName");

        return "DB created successfully.";
    }
}
