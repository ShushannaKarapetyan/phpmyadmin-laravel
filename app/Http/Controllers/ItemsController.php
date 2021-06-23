<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Services\Connection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ItemsController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        Connection::connect($request->connection, 'localhost', 'root', 'password', $request->database);

        $columns = Schema::Connection("$request->connection")->getColumnListing("$request->table");

        return response()->json($columns);
    }

    /**
     * @param CreateItemRequest $request
     */
    public function store(CreateItemRequest $request)
    {
        Connection::connect($request->connection, 'localhost', 'root', 'password', $request->database);

        DB::connection("$request->connection")
            ->table("$request->table")
            ->insert($request->data);
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
        Connection::connect($connection, 'localhost', 'root', 'password', $db);

        $item = DB::connection("$connection")->table("$table")->where('id', $id)->first();

        return response()->json($item);
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        Connection::connect($request->connection, 'localhost', 'root', 'password', $request->database);

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
        Connection::connect($connection, 'localhost', 'root', 'password', $db);

        DB::connection("$connection")->table("$table")->delete($id);

        $result = DB::connection("$connection")->table("$table")->get();

        if (!count($result)) {
            $result['columns'] = Schema::Connection("$connection")->getColumnListing("$table");
        }

        return response()->json($result);
    }
}
