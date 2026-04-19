<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $revenue = Pesanan::where('status', 'selesai')->sum('total_harga');
        $orders = Pesanan::count();
        return view('admin.dashboard', compact('revenue', 'orders'));
    }
}
