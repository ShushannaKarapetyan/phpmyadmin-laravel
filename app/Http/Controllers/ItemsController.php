<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ItemsController extends Controller
{
    public function create()
    {

    }

    public function store(CreateItemRequest $request)
    {

    }

    /**
     * @param $connection
     * @param $db
     * @param $table
     * @param $id
     * @return JsonResponse
     */
    public function edit($connection, $db, $table, $id): JsonResponse
    {
        Config::set("database.connections.$connection", [
            "driver" => "mysql",
            "host" => "localhost",
            "database" => $db,
            "username" => "root",
            "password" => "password",
        ]);

        $item = DB::connection("$connection")->table("$table")->where('id', $id)->first();

        return response()->json($item);
    }

    public function update(Request $request)
    {
        Config::set("database.connections.$request->connection", [
            "driver" => "mysql",
            "host" => "localhost",
            "database" => $request->database,
            "username" => "root",
            "password" => "password",
        ]);


        DB::connection("$request->connection")
            ->table("$request->table")
            ->where('id', $request->id)
            ->update($request->data);
    }

    /**
     * @param $connection
     * @param $db
     * @param $table
     * @param $id
     * @return JsonResponse
     */
    public function destroy($connection, $db, $table, $id): JsonResponse
    {
        Config::set("database.connections.$connection", [
            "driver" => "mysql",
            "host" => "localhost",
            "database" => $db,
            "username" => "root",
            "password" => "password",
        ]);

        DB::connection("$connection")->table("$table")->delete($id);

        $result = DB::connection("$connection")->table("$table")->get();

        if (!count($result)) {
            $result['columns'] = Schema::Connection("$connection")->getColumnListing("$table");
        }

        return response()->json($result);
    }
}
