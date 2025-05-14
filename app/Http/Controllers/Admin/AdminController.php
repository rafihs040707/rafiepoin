<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggar;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $pelanggars = $this->top10Pelanggar();
        $hitung = $this->top10Pelanggaran();
        list($jmlSiswa, $jmlPelanggars) = $this->countDash();
        return view('admin.dashboard', compact('pelanggars', 'hitung', 'jmlSiswa', 'jmlPelanggars'));
    }
}
