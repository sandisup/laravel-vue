<?php

namespace App\Http\Controllers;

use DB;
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

        $label_bar = ['Penjualan', 'Pembelian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
                $data_bar[$key]['label'] = $label_bar[$key];
                $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
                $data_month = [];

                foreach (range(1,12) as $month) {
                        if ($key == 0){
                                $data_month[] = Penjualan::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
                        } else{
                                $data_month[] = Pembelian::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
                        }
                }
                $data_bar[$key]['data'] = $data_month;
        }

        

        return view('home', compact('total_kategoris', 'total_members','total_pembelians', 'total_penjualans', 'total_produks','total_suppliers', 'data_bar'));

            }
}
