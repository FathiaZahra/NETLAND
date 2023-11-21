<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
    public function index()
    {
        $data = Akomodasi::all();
        return view('Pengelola.akomodasi', ['akomodasi' => $data]);
    }

    public function create()
    {
        return view('Pengelola.tambahAkomodasi');
    }

    public function store(Request $request, Akomodasi $info)
    {
        $data = $request->validate([
            'nama_akomodasi' => 'required',
            'isi_akomodasi' => 'required',
            'file' => 'sometimes|file',
        ]);

        // $data['id_pengelola'] = 1;

        if ($request->hasFile('file')) {
            $foto_file = $request->file('file');
            $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto_akomodasi'), $foto_nama);
            $data['file'] = $foto_nama;
        }

        $createData = $info->create($data);

        if ($createData) {
            return redirect('/dashboard/akomodasi')->with('success', 'Data surat baru berhasil ditambah');
        }

        return back()->with('error', 'Data surat gagal ditambahkan');
    }

    public function edit(Akomodasi $info, string $id)
    {
        $data = Akomodasi::where('id_akomodasi', $id)->first();
        return view('Pengelola.editAkomodasi', ['akomodasi' => $data]);
    }

    public function detail(Akomodasi $info, string $id)
    {
        $data = Akomodasi::where('id_akomodasi', $id)->get();
        return view('Pengelola.detailAkomodasi', ['akomodasi' => $data]);
    }

    public function update(Request $request, Akomodasi $info)
    {
        $id_akomodasi = $request->input('id_akomodasi');

        $data = $request->validate([
            'nama_akomodasi' => 'required',
            'isi_akomodasi' => 'required',
            'file' => 'required|file',
        ]);

        if ($id_akomodasi !== null) {
            if ($request->hasFile('file')) {
                $foto_file = $request->file('file');
                $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto_akomodasi'), $foto_nama);

                $update_data = $info->where('id_akomodasi', $id_akomodasi)->first();
                File::delete(public_path('foto_akomodasi') . '/' . $update_data->file);

                $data['file'] = $foto_nama;
            }

            $dataUpdate = $info->where('id_akomodasi', $id_akomodasi)->update($data);

            if ($dataUpdate) {
                return redirect('/dashboard/akomodasi')->with('success', 'Data surat berhasil diupdate');
            }

            return back()->with('error', 'Data jenis surat gagal diupdate');
        }
    }

    public function destroy(Akomodasi $info, Request $request)
    {
        $id_akomodasi = $request->input('id_akomodasi');
        $data = Akomodasi::find($id_akomodasi);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        $filePath = public_path('foto_akomodasi') . '/' . $data->file;

        if (file_exists($filePath) && unlink($filePath)) {
            $data->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
    }
}
