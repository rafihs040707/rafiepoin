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
    return view('admin.dashboard');
    }
}
