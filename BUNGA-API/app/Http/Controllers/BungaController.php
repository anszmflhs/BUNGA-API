<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use Illuminate\Http\Request;

class BungaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bunga::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'success get all data',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = validator($data, [
            'name' => 'required',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => null
            ], 400);
        }

        $bunga = Bunga::create($data);
        return response()->json([
            'status' => true,
            'message' => 'Success create data',
            'data' => $bunga,
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bunga = Bunga::find($id);
        if (!$bunga) {
            return response()->json([
                'status' => false,
                'message' => 'Data product not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Success get detail data',
            'data' => $bunga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $validator = validator($data, [
            'name' => 'required',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
                'data' => null
            ], 400);
        }

        $bunga = Bunga::find($id);
        if (!$bunga) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }
        $bunga->update($data);
        return response()->json([
            'status' => true,
            'message' => 'Success update data',
            'data' => $bunga,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bunga = Bunga::find($id);
        if (!$bunga) {
            return response()->json([
                'status' => false,
                'message' => 'Data product not found',
                'data' => null
            ], 404);
        }
        $bunga->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success deleted data',
            'data' => null
        ]);
    }
}
