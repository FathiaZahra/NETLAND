<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PeminjamanController extends Controller
{
    public function index(Barang $barang, Log $log)
    {
        $totalBarang = DB::select('SELECT CountTotalBarang() AS totalBarang')[0]->totalBarang;

        $data = [
            'barang' => DB::table('view_barang')->get(),
            'log' => $log->all(),
            'jumlahBarang' => $totalBarang
        ];
        // dd($data);
        return view('peminjaman.index', $data);
    }

    public function unduhPdf(Barang $barang)
    {
        // $barang = Barang::all();
    	// $pdf = PDF::loadview('peminjaman.unduh',['barang'=>$barang]);
    	// return $pdf->stream('laporan-unduh.pdf');
        $barang = Barang::findOrFail($barang);
        
        // Mengambil path gambar dari direktori storage atau direktori publik, sesuaikan dengan kebutuhan Anda
        $imagePath = public_path('foto/logo.png');            
        $signImage = public_path('foto/logo.png');
    
        // Membaca file gambar dan mengonversi ke base64
        $base64Image = base64_encode(File::get($imagePath));
        $base64SignImage = base64_encode(File::get($signImage));


        // Load view dengan data SK Belum Menikah dan base64 gambar
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                    ->loadView('peminjaman.unduh', [
                        'barang' => $barang,
                        'base64Image' => $base64Image,
                        'signImage' => $base64SignImage,
                    ]);
    
        // Jika Anda ingin menampilkan PDF di browser tanpa mengunduhnya, gunakan method 'stream' 
        // return $pdf->stream('unduh-laporan.pdf');
    
        // Jika Anda ingin mengunduh PDF, gunakan method 'download'
        return $pdf->download('laporan-barang.pdf' . $barang . '.pdf');
        
        
    }

    public function create()
    {
        return view('peminjaman.tambah');
    }

    public function store(Request $request, Barang $barang)
    {
        //
        $data = $request->validate([
            'nama_barang' => ['required'],
            'harga_barang' => ['required'],
            'stok_barang' => ['required'],
            'pembayaran_sewabarang' => ['required'],
            'file' => 'required|file',
        ]);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $foto_file = $request->file('file');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['file'] = $foto_nama;
        }
        //Proses Insert
        if (DB::statement("CALL CreateBarang(?,?,?,?,?)", [$data['nama_barang'], $data['harga_barang'], $data['stok_barang'], $data['pembayaran_sewabarang'], $data['file']])) {
            return redirect('/dashboard/peminjaman')->with('success', 'Data Barang Baru Berhasil Ditambah');
        }
        return back()->with('error','Barang Gagal Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(barang $barang)
    {
        //
    }

    public function edit(Barang $barang, Request $request)
    {
        $barang = barang::where('id_barang', $request->id)->first();

        if ($barang) {
            return view('peminjaman.edit')->with(['barang' => $barang]);
        }
    }

    public function detail(Barang $barang, string $id)
    {
        $data = Barang::where('id_barang', $id)->get();
        return view('peminjaman.detail', ['barang' => $data]);
    }

    public function update(Request $request, Barang $barang)
    {
        $id_barang = $request->input('id_barang');
        $data = $request->validate([
            'nama_barang' => 'sometimes',
            'harga_barang' => 'sometimes',
            'stok_barang' => 'sometimes',
            'pembayaran_sewabarang' => 'sometimes',
            'file' => 'sometimes|file',
        ]);

        if ($barang !== null) {
            if ($request->hasFile('file')) {
                $foto_file = $request->file('file');
                $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $barang->where('id_barang', $id_barang)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['file'] = $foto_nama;
            }
        }

        // //Proses Insert
        $dataUpdate = $barang->where('id_barang', $id_barang)->update($data);

        if ($dataUpdate) {
            return redirect('/dashboard/peminjaman')->with('success', 'Data Barang Berhasil Diupdate');
        } else {
            return back()->with('error', 'Data Barang Gagal Diupdate');
        }
    }

    public function destroy(Barang $barang, Request $request)
    {
        //
        $id_barang = $request->input('id_barang');
        $data = Barang::find($id_barang);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        $filePath = public_path('foto') . '/' . $data->file;

        if (file_exists($filePath) && unlink($filePath)) {
            $data->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
    }
}
