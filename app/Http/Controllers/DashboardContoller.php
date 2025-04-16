<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Antrian;
use App\Models\Pensiunan;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function index()
    {
        $total_user = User::where('role', '=', 'pelanggan')->count();
        $total_antrian = Antrian::count();
        $total_pensiunan = Pensiunan::count();
        $antrian_terakhir = Antrian::orderBy('no_antrian', 'desc')->first();

        return view('home.dashboard', compact('total_user', 'total_antrian', 'total_pensiunan', 'antrian_terakhir'));
    }
}
