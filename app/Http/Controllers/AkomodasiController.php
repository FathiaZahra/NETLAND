<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkomodasiController extends Controller
{
    public function index(Akomodasi $info, Log $log)
    {
        $totalAkomodasi = DB::select('SELECT CountTotalAkomodasi() AS totalAkomodasi')[0]->totalAkomodasi;

        $data = [
            'akomodasi' => DB::table('view_akomodasi')->get(),
            'log' => $log->all(),
            'jumlahAkomodasi' => $totalAkomodasi
        ];
        return view('Pengelola.akomodasi', $data);
    }

    public function unduhPdf(Akomodasi $info)
    {
        $data = Akomodasi::all();
        $imageDataArray = [];
        foreach($data as $info){
            if($info->file){
                $imageData = base64_encode(file_get_contents(public_path('foto_akomodasi'). '/' . $info->file));
                $imageSrc = 'data:image/' . pathinfo($info->file, PATHINFO_EXTENSION) . ';base64,' . $imageData;

                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'foto'];
            }
        }
    	$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('Pengelola.unduhAkomodasi',['akomodasi'=>$data,'imageDataArray'=>$imageDataArray]);
    	return $pdf->stream('laporan-akomodasi.pdf');
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
            return redirect('/dashboard/akomodasi')->with('success', 'Data akomodasi baru berhasil ditambah');
        }

        return back()->with('error', 'Data akomodasi gagal ditambahkan');
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
                return redirect('/dashboard/akomodasi')->with('success', 'Data akomodasi berhasil diupdate');
            }

            return back()->with('error', 'Data akomodasi gagal diupdate');
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
