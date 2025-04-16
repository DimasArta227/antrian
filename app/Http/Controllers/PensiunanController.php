<?php

namespace App\Http\Controllers;

use App\Models\Pensiunan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PensiunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pensiunans = Pensiunan::all();
        $pensiunan = Pensiunan::where('id_user', Auth::id())->first();
        return view('home.pensiunan.index', compact('pensiunan', 'pensiunans'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPelanggan()
    {
        $pensiunan = Pensiunan::where('id_user', Auth::id())->first();
        if($pensiunan){
            return redirect()->back()->with('error', 'Data Pensiunan Sudah Ditambahkan di Akun Anda');
        }
        return view('home.pensiunan.tambah-pelanggan');
    }

    public function createAdmin()
    {
        $userPensiun = Pensiunan::pluck('id_user')->toArray(); // Ambil semua user_id dari tabel Pensiunan
        $user = User::whereNotIn('id', $userPensiun)->get(); // Ambil user yang ID-nya tidak ada di Pensiunan
        
        return view('home.pensiunan.tambah-admin', compact('user'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->id_user != null){
            $pensiunan = Pensiunan::where('id_user', $request->id_user)->first();
            if($pensiunan){
                return redirect()->back()->with('error', 'Data Pensiunan Sudah Ditambahkan di Akun Anda');
            }

            Pensiunan::create([
                'id_user' => $request->id_user,
                'no_pensiunan' => $request->no_pensiunan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal_pensiun' => $request->tanggal_pensiun,
            ]);
            return redirect('/pensiunan')->with('success', 'Data Berhasil Ditambahkan');

        }else{
            $pensiunan = Pensiunan::where('id_user', Auth::id())->first();
            if($pensiunan){
                return redirect()->back()->with('error', 'Data Pensiunan Sudah Ditambahkan di Akun Anda');
            }

            Pensiunan::create([
                'id_user' => Auth::id(),
                'no_pensiunan' => $request->no_pensiunan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal_pensiun' => $request->tanggal_pensiun,
            ]);
            return redirect('/pensiunan')->with('success', 'Data Berhasil Ditambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pensiunan = Pensiunan::find($id);
        return view('home.pensiunan.edit', compact('pensiunan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pensiunan = Pensiunan::find($id);
        $pensiunan->update([
            'no_pensiunan' => $request->no_pensiunan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal_pensiun' => $request->tanggal_pensiun,
        ]);
        return redirect('/pensiunan')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pensiunan = Pensiunan::find($id);
        $pensiunan->delete();
        return redirect('/pensiunan')->with('success', 'Data Berhasil Dihapus');
    }
}