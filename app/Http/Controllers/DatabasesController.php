<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDBRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
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
            Config::set("database.connections.mysql-$key", [
                "driver" => "mysql",
                "host" => "localhost",
                "database" => "$database->Database",
                "username" => "root",
                "password" => "password",
            ]);

            $db_tables[$key]['name'] = $database->Database;
            $db_tables[$key]['connection'] = "mysql-$key";

            $tables = DB::connection("mysql-$key")->select('SHOW TABLES');

            foreach ($tables as $table) {
                $tableName = "Tables_in_" . $database->Database;
                $db_tables[$key]['tables'][] = $table->$tableName;
            }
        }
        //return Config::get('database');

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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
