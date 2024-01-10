<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(Ticket $ticket, Log $log)
    {
        // $data = []Ticket::all();
        $totalTicket = DB::select('SELECT CountTotalTicket() AS totalTicket')[0]->totalTicket;

        $data = [
            'ticket' => $ticket->all(),
            'log' => $log->all(),
            'jumlahTicket' => $totalTicket
        ];
        return view('ticketingstaff.ticket', $data);
    }

    public function unduhPdf(Ticket $ticket)
    {
        $data = Ticket::all();
    	$pdf = PDF::loadview('ticketingstaff.unduh',['ticket'=>$data]);
    	return $pdf->download('laporan-ticket.pdf');
    }

    public function create()
    {
        return view('ticketingstaff.tambah');
    }

    public function store(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'tanggal_pemesanan' => 'required',
            'jumlah_ticket' => 'required',
            'harga_ticket' => 'required',
            'pembayaran_ticket' => 'required',
            'file' => 'required'
        ]);

        // $data['id_ticketingstaff'] = 1;
        // $data['id_pengunjung'] = 1; 

        if ($request->hasFile('file')) {
            $foto_file = $request->file('file');
            $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['file'] = $foto_nama;
        }

        if ($ticket->create($data)) {
            return redirect('/dashboard/ticket')->with('success', 'Data ticket baru berhasil ditambah');
        }

        return back()->with('error', 'Data  gagal ditambahkan');
    }

    public function edit(Ticket $ticket, string $id)
    {
        $data = Ticket::where('id_ticket', $id)->first();
        return view('ticketingstaff.edit', ['ticket' => $data]);
    }

    public function detail(Ticket $ticket, string $id)
    {
        $data = Ticket::where('id_ticket', $id)->get();
        return view('ticketingstaff.detail', ['ticket' => $data]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $id_ticket = $request->input('id_ticket');

        $data = $request->validate([
            'tanggal_pemesanan' => 'required',
            'jumlah_ticket' => 'required',
            'harga_ticket' => 'required',
            'pembayaran_ticket' => 'required',
            'file' => 'required'
        ]);

        if ($id_ticket !== null) {
            if ($request->hasFile('file')) {
                $foto_file = $request->file('file');
                $foto_nama = Str::uuid() . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $ticket->where('id_ticket', $id_ticket)->first();
                File::delete(public_path('foto'), $update_data->file);

                $data['file'] = $foto_nama;

                $dataUpdate = $ticket->where('id_ticket', $id_ticket)->update($data);

                if ($dataUpdate) {
                    return redirect('/dashboard/ticket')->with('success', 'Data ticket berhasil diupdate');
                }

                return back()->with('error', 'Data ticket gagal diupdate');
            }
        } 
    }

    public function destroy(Ticket $ticket, Request $request)
    {
        $id_ticket = $request->input('id_ticket');
        $data = Ticket::find($id_ticket);

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
