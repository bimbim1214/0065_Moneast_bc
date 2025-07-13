<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Buah;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;

class SupplierController extends Controller
{
    // GET /api/suppliers
    public function index()
    {
        $suppliers = Supplier::with('buah')->get();
        return response()->json($suppliers);
    }

    // POST /api/suppliers
    public function store(StoreSupplierRequest $request)
    {
        $data = $request->validated();

        // Ambil data buah
        $buah = Buah::find($data['buah_id']);
        if ($buah) {
            // Tambahkan jumlah ke stok buah
            $buah->stok += $data['jumlah'];
            $buah->save();

            // Set nama buah sebagai keterangan
            $data['keterangan'] = $buah->nama;
        }

        $supplier = Supplier::create($data);
        return response()->json($supplier, 201);
    }

    // GET /api/suppliers/{id}
    public function show($id)
    {
        $supplier = Supplier::with('buah')->find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        return response()->json($supplier);
    }

    // PUT /api/suppliers/{id}
    public function update(StoreSupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $data = $request->validated();

        if ($data['buah_id']) {
            $buah = Buah::find($data['buah_id']);
            $data['keterangan'] = $buah?->nama ?? null;
        }

        $supplier->update($data);
        return response()->json($supplier);
    }

    // DELETE /api/suppliers/{id}
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan'], 404);
        }

        $supplier->delete();
        return response()->json(['message' => 'Supplier berhasil dihapus']);
    }
}
