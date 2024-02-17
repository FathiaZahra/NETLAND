<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Log $log)
    {

        $data = [
            'transaksi' => $log::orderBy('id_log', 'desc')->get()
        ];
        return view('history.history', $data);
    }

    public function create()
    {
        return view('history.tambah');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_log = $request->input('id_log');
        //dd($id_Log);

        if ($id_log != null) {
            foreach ($id_log as $id) {
                Log::where('id_log', $id)->delete();
            }
        }
        return redirect()->to('/history')->with('success', 'Data berhasil dihapus');
    }
}
