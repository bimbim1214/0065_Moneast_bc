<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBuahRequest;

class BuahController extends Controller
{
    // GET /api/buah
    public function index()
    {
        return response()->json(Buah::all(), 200);
    }

    // POST /api/buah
    public function store(StoreBuahRequest $request)
    {
        $buah = Buah::create($request->validated());
        return response()->json($buah, 201);
    }

    // GET /api/buah/{id}
    public function show($id)
    {
        $buah = Buah::find($id);
        if (!$buah) {
            return response()->json(['message' => 'Buah tidak ditemukan'], 404);
        }
        return response()->json($buah, 200);
    }

    // PUT /api/buah/{id}
    public function update(StoreBuahRequest $request, $id)
    {
        $buah = Buah::find($id);
        if (!$buah) {
            return response()->json(['message' => 'Buah tidak ditemukan'], 404);
        }
        $buah->update($request->validated());
        return response()->json($buah, 200);
    }

    // DELETE /api/buah/{id}
    public function destroy($id)
    {
        $buah = Buah::find($id);
        if (!$buah) {
            return response()->json(['message' => 'Buah tidak ditemukan'], 404);
        }
        $buah->delete();
        return response()->json(['message' => 'Buah berhasil dihapus'], 200);
    }
}
