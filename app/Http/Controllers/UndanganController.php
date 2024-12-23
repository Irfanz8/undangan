<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UndanganController extends Controller
{
    public function index(string $userid)
    {
        $undangan = Undangan::where('userid', $userid)->get();
        $hadir = Undangan::where('userid', $userid)->where('kehadiran', 'hadir')->count();
        $tidakHadir = Undangan::where('userid', $userid)->where('kehadiran', 'tidak hadir')->count();

        return response()->json([
            'success' => true,
            'data' => $undangan,
            'hadir' => $hadir,
            'tidak_hadir' => $tidakHadir
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'alamat' => 'required',
            'ucapan' => 'required',
            'kehadiran' => 'required',
            'userid' => 'required',
            'ket' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $undangan = Undangan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $undangan
        ], 201);
    }

    public function show(string $userid)
    {
        $undangan = Undangan::where('userid', $userid)->get();
        $hadir = Undangan::where('userid', $userid)->where('kehadiran', 'hadir')->count();
        $tidakHadir = Undangan::where('userid', $userid)->where('kehadiran', 'tidak hadir')->count();

        return response()->json([
            'success' => true,
            'data' => $undangan,
            'hadir' => $hadir,
            'tidak_hadir' => $tidakHadir
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $undangan = Undangan::find($id);

        if (!$undangan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $undangan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $undangan
        ]);
    }

    public function destroy($id)
    {
        $undangan = Undangan::find($id);

        if (!$undangan) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $undangan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
