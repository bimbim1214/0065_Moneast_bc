<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePembelianRequest;
use App\Models\PembelianBuah;
use App\Models\Buah;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianBuahController extends Controller
{
    public function index()
    {
        $pembelians = PembelianBuah::with(['buah', 'supplier'])->get();

        $formatted = $pembelians->map(function ($item) {
            return [
                'id' => $item->id,
                'buah_id' => $item->buah_id,
                'supplier_id' => $item->supplier_id,
                'jumlah' => $item->jumlah,
                'harga' => $item->harga,
                'tanggal' => $item->tanggal,
                'nama_buah' => $item->buah->nama ?? null,
                'nama_supplier' => $item->supplier->nama ?? null,
            ];
        });

        return response()->json($formatted, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'buah_id' => 'required|exists:buah,id',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'tanggal' => 'required|date',
        ]);

        // Tambahkan jumlah ke stok buah
        $buah = Buah::find($validated['buah_id']);
        $buah->stok += $validated['jumlah'];
        $buah->save();

        $pembelian = PembelianBuah::create($validated);

        return response()->json([
            'id' => $pembelian->id,
            'buah_id' => $pembelian->buah_id,
            'supplier_id' => $pembelian->supplier_id,
            'jumlah' => $pembelian->jumlah,
            'harga' => $pembelian->harga,
            'tanggal' => $pembelian->tanggal,
            'nama_buah' => $buah->nama,
            'nama_supplier' => Supplier::find($validated['supplier_id'])->nama,
        ], 201);
    }

    public function show($id)
    {
        $pembelian = PembelianBuah::with(['buah', 'supplier'])->find($id);

        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $pembelian->id,
            'buah_id' => $pembelian->buah_id,
            'supplier_id' => $pembelian->supplier_id,
            'jumlah' => $pembelian->jumlah,
            'harga' => $pembelian->harga,
            'tanggal' => $pembelian->tanggal,
            'nama_buah' => $pembelian->buah->nama ?? null,
            'nama_supplier' => $pembelian->supplier->nama ?? null,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pembelian = PembelianBuah::find($id);
        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'buah_id' => 'required|exists:buah,id',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'tanggal' => 'required|date',
        ]);

        $pembelian->update($validated);

        return response()->json([
            'id' => $pembelian->id,
            'buah_id' => $pembelian->buah_id,
            'supplier_id' => $pembelian->supplier_id,
            'jumlah' => $pembelian->jumlah,
            'harga' => $pembelian->harga,
            'tanggal' => $pembelian->tanggal,
            'nama_buah' => $pembelian->buah->nama ?? null,
            'nama_supplier' => $pembelian->supplier->nama ?? null,
        ]);
    }

    public function destroy($id)
    {
        $pembelian = PembelianBuah::find($id);

        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pembelian->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
