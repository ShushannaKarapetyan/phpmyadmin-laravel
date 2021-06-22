<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TablesController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        Config::set("database.connections.$request->connection", [
            "driver" => "mysql",
            "host" => "localhost",
            "database" => $request->database,
            "username" => "root",
            "password" => "password",
        ]);

        $result = DB::connection("$request->connection")->table("$request->table")->get();

        if (!count($result)) {
            $result['columns'] = Schema::Connection("$request->connection")->getColumnListing("$request->table");
        }

        return response()->json($result);
    }
}
