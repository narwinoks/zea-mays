<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?? 15;
        $data = \Indonesia::paginateVillages($page);
        return response()->json(['message' => 'success', 'data' => $data], Response::HTTP_OK);
    }
    public function show(Request $request, $id)
    {
        $data = \Indonesia::findVillage($id, $with = null);
        if ($data) {
            return response()->json(['message' => 'success', 'data' => $data], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'data not found'], Response::HTTP_NOT_FOUND);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'district_code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'data not found'], Response::HTTP_BAD_REQUEST);
        }
        $data = DB::table('indonesia_villages')->insert([
            [
                'code' => DB::table('indonesia_villages')->orderBy('id', 'DESC')->limit(1)->first()->code + 1 ?? 0,
                'district_code' => $request->district_code,
                'name' => $request->name,
                "meta" => json_encode($request->meta, true),
                "created_at" => Carbon::now()->format('Y-m-d h:i:s'),
                "updated_at" => Carbon::now()->format('Y-m-d h:i:s'),
            ],
        ]);
        return response()->json(['message' => 'success', 'data' => $data], Response::HTTP_OK);
    }
}
