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

        if (request('cari')) {
            $pelanggarans = $this->search(request('cari'));
        }

        return view('admin.pelanggaran.index', compact('pelanggarans'));
    }

    public function search(string $cari)
    {
        $pelanggarans = DB::table('pelanggarans')->where(DB::raw('lower(jenis)'), 'like', '%' . strtolower($cari) . '%')->paginate(10);

        return $pelanggarans;
    }

    public function create()
    {
        return view('admin.pelanggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis'         => 'required|string|max:250',
            'konsekuensi'   => 'required|string|max:250',
            'poin'          => 'required'
        ]);

        Pelanggaran::create([
            'jenis'         => $request->jenis,
            'konsekuensi'   => $request->konsekuensi,
            'poin'          => $request->poin
        ]);

        return redirect()->route('pelanggaran.index')->with(['success' => 'Data Berhasil Disimpan']);
    }
}
