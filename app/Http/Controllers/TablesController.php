<?php

namespace App\Http\Controllers;

use App\Services\Connection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
        Connection::connect($request->connection, 'localhost', 'root', 'password', $request->database);

        $result = DB::connection("$request->connection")->table("$request->table")->get();

        if (!count($result)) {
            $result['columns'] = Schema::Connection("$request->connection")->getColumnListing("$request->table");
        }

        return response()->json($result);
    }
}
