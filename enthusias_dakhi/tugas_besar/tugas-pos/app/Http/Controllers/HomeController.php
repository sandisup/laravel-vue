<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\PenjualanDetail;
use App\Models\PembelianDetail;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplier;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$penjualandetails = Pembelian::with('supplier')->get();

        //return $penjualandetails;
        $total_kategoris = Kategori::count();
        $total_members = Member::count();
        $total_pembelians = Pembelian::count();
        $total_penjualans = Penjualan::count();
        $total_produks = Produk::count();
        $total_suppliers = Supplier::count();
        

        return view('home', compact('total_kategoris', 'total_members','total_pembelians', 'total_penjualans', 'total_produks','total_suppliers'));

            }
}
