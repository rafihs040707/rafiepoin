<?php

namespace App\Http\Controllers;


use App\Models\Pelanggaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\http\Request;
use Illuminate\Http\Response;

class PelanggaranController extends Controller
{
    public function index(): View
    {
        //get Data db
        $pelanggarans = Pelanggaran::latest()->paginate(10);

        return view('admin.pelanggaran.index', compact('pelanggarans'));
    }
}
