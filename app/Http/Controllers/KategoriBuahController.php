<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuah;
use App\Http\Requests\StoreKategoriBuahRequest;
use Illuminate\Http\Request;

class KategoriBuahController extends Controller
{
    // GET: /api/kategori-buah
    public function index()
    {
        return response()->json(KategoriBuah::all(), 200);
    }

    // POST: /api/kategori-buah
    public function store(StoreKategoriBuahRequest $request)
    {
        $kategori = KategoriBuah::create($request->validated());
        return response()->json($kategori, 201);
    }

    // GET: /api/kategori-buah/{id}
    public function show($id)
    {
        $kategori = KategoriBuah::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }
        return response()->json($kategori, 200);
    }

    // PUT: /api/kategori-buah/{id}
    public function update(StoreKategoriBuahRequest $request, $id)
    {
        $kategori = KategoriBuah::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }
        $kategori->update($request->validated());
        return response()->json($kategori, 200);
    }

    // DELETE: /api/kategori-buah/{id}
    public function destroy($id)
    {
        $kategori = KategoriBuah::find($id);
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }
        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    }
}
