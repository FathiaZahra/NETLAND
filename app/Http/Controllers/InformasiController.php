<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function index(Informasi $info, Log $log)
    {
        $totalInformasi = DB::select('SELECT CountTotalInformasi() AS totalInformasi')[0]->totalInformasi;

        $data = [
            'informasi' => DB::table('view_informasi')->get(),
            'log' => $log->all(),
            'jumlahInformasi' => $totalInformasi
        ];
        
        return view('Pengelola.informasi', $data);
    }


    public function unduhPdf(Informasi $info)
    {
        $data = Informasi::all();
        $imageDataArray = [];
        foreach($data as $info){
            if($info->file){
                $imageData = base64_encode(file_get_contents(public_path('foto_informasi'). '/' . $info->file));
                $imageSrc = 'data:image/' . pathinfo($info->file, PATHINFO_EXTENSION) . ';base64,' . $imageData;

                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'foto'];
            }
        }
    	$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('Pengelola.unduh',['informasi'=>$data, 'imageDataArray'=>$imageDataArray]);
    	return $pdf->stream('laporan-informasi.pdf');
    }

    public function create()
    {
        return view('Pengelola.tambah');
    }

    public function store(Request $request, Informasi $info)
    {
        $data = $request->validate([
            'nama_informasi' => 'required',
            'isi_informasi' => 'required',
            'file' => 'required|file',
        ]);

        // $data['id_pengelola'] = 1;

        if ($request->hasFile('file')) {
            $foto_file = $request->file('file');
            $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto_informasi'), $foto_nama);
            $data['file'] = $foto_nama;
        }
        $createData = $info->create($data);

        if ($createData) {
            return redirect('/dashboard/informasi')->with('success', 'Data Informasi baru berhasil ditambah');
        }

        return back()->with('error', 'Data Informasi gagal ditambahkan');
    }

    public function edit(Informasi $info, string $id)
    {
        $data = Informasi::where('id_informasi', $id)->first();
        return view('Pengelola.edit', ['informasi' => $data]);
    }

    public function detail(Informasi $info, string $id)
    {
        $data = Informasi::where('id_informasi', $id)->get();
        return view('Pengelola.detail', ['informasi' => $data]);
    }

    public function update(Request $request, Informasi $info)
    {
        $id_informasi = $request->input('id_informasi');

        $data = $request->validate([
            'nama_informasi' => 'required',
            'isi_informasi' => 'required',
            'file' => 'required|file',
        ]);

        if ($id_informasi !== null) {
            if ($request->hasFile('file')) {
                $foto_file = $request->file('file');
                $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto_informasi'), $foto_nama);

                $update_data = $info->where('id_informasi', $id_informasi)->first();
                File::delete(public_path('foto_informasi') . '/' . $update_data->file);

                $data['file'] = $foto_nama;
            }

            $dataUpdate = $info->where('id_informasi', $id_informasi)->update($data);

            if ($dataUpdate) {
                return redirect('/dashboard/informasi')->with('success', 'Data Informasi berhasil diupdate');
            }

            return back()->with('error', 'Data Informasi gagal diupdate');
        }
    }

    public function destroy(Informasi $info, Request $request)
    {
        $id_informasi = $request->input('id_informasi');
        $data = Informasi::find($id_informasi);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        $filePath = public_path('foto_informasi') . '/' . $data->file;

        if (file_exists($filePath) && unlink($filePath)) {
            $data->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
    }
}
