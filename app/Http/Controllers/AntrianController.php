<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pensiunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_admin = Antrian::all();
        $riwayat_antrian = Antrian::where('user_id', Auth::id())->where('status', '=', 'Selesai')->get(); 
        $last = Antrian::orderBy('no_antrian', 'desc')->first();
        $antrian_sekarang = $last->no_antrian ?? 0;

        if(Auth::user()->role == 'pelanggan'){
            $pensiunan = Pensiunan::where('id_user', Auth::id())->first();
            if(!$pensiunan){
                return redirect('/pensiunan')->with('error', 'Pastikan Anda Sudah Menambahkan Data Pensiunan');
            }
        }

        $antrian = Antrian::where('user_id', Auth::id())->where('status', '=', 'Mengantri')->first(); 
        return view('home.antrian.index', compact('antrian', 'riwayat_antrian', 'antrian_sekarang', 'list_admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pensiunan = Pensiunan::all();
        return view('home.antrian.tambah', compact('pensiunan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePelanggan(Request $request)
    {
        // Menghitung jumlah antrian yang ada untuk menentukan nomor antrian berikutnya
        $lastAntrian = Antrian::orderBy('no_antrian', 'desc')->first();
        $nextNoAntrian = $lastAntrian ? $lastAntrian->no_antrian + 1 : 1;

            $antrian = Antrian::where('user_id', Auth::id())->where('status', '=', 'Mengantri')->first(); 
            if($antrian){
                return redirect()->back()->with('error', 'Anda Sudah Mengajukan Antrian!');
            }

            $pensiunan = Pensiunan::where('id_user', Auth::id())->first();


            Antrian::create([
                'user_id' => Auth::id(),
                'tgl' => now(),
                'no_antrian' => $nextNoAntrian ?? 1,
                'pensiunan_id' => $pensiunan->id,
                'status' => 'Mengantri',
            ]);

            return redirect('/antrian')->with('success', 'Antrian berhasil ditambahkan.');
        
    }

    public function storeAdmin(Request $request)
    {
        // Menghitung jumlah antrian yang ada untuk menentukan nomor antrian berikutnya
        $lastAntrian = Antrian::orderBy('no_antrian', 'desc')->first();
        $nextNoAntrian = $lastAntrian ? $lastAntrian->no_antrian + 1 : 1;
            $antrian = Antrian::where('pensiunan_id', '=', $request->pensiunan_id)->where('status', '=', 'Mengantri')->first();
            if($antrian){
                return redirect('/antrian')->with('error', 'Pelanggan Sudah Mengantri!');
            }

            Antrian::create([
                'user_id' => $request->pensiunan_id,
                'tgl' => now(),
                'no_antrian' => $nextNoAntrian ?? 1,
                'pensiunan_id' => $request->pensiunan_id,
                'status' => 'Mengantri',
            ]);
    
            return redirect('/antrian')->with('success', 'Antrian berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $antrian = Antrian::find($id);
        return view('home.antrian.edit', compact('antrian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $antrian = Antrian::find($id);
        $antrian->update([
            'status' => "Selesai",
            
        ]);
        return redirect('/antrian')->with('success', 'Pelanggan Sudah Menyelesaikan Antrian!');
    }

    public function cetak($id)
    {
        $antrian = Antrian::find($id);

        // Jika ingin menampilkan langsung di browser
        return view('home.antrian.cetak', compact('antrian'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $antrian = Antrian::find($id);
        $antrian->delete();
        return redirect('/antrian');
    }
}
