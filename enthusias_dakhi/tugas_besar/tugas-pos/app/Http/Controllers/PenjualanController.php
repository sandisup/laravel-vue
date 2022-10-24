<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Member;
use App\Models\User;
use App\Models\Produk;
use App\Models\PenjualanDetail;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualans = Penjualan::all();
        $members = Member::all();     
        $users = User::all();     
        $produks = Produk::all();     
        $penjualan_details = PenjualanDetail::all();     

        return view('admin.penjualan', compact('members', 'users', 'produks', 'penjualan_details')); 
    }

    public function api()
    {
        $penjualans = Penjualan::selectRaw('penjualans.*, members.nama, users.name')
        ->join('members','members.id','penjualans.id_member')
        ->join('users','users.id','penjualans.id_user')->get();
        $datatables = datatables()->of($penjualans)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_member' => ['required'],
            'total_item' => ['required'],
            'total_harga'  => ['required'],
            'diskon' => ['required'],
            'bayar' => ['required'],
            'diterima' => ['required'],
            'id_user' => ['required'],
            'multiple_produk' => 'array'

        ]);
        
        $penjualan= Penjualan::create($request->all());

        foreach($request->multiple_produk as $multi){
            $details = new PenjualanDetail();
            $details->id_produk = $multi;
            $details->harga_jual = $request->total_harga;
            $details->diskon = $request->diskon;
            $details->subtotal = $request->total_harga*$request->total_item;
            $details->jumlah = $request->total_item;
            $penjualan->penjualanDetails()->save($details);
        }

        return redirect('penjualans'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        $penjualans = PenjualanDetail::all();

        return view('admin.penjualan.detail', compact('penjualans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $this->validate($request,[
            'id_member' => ['required'],
            'total_item' => ['required'],
            'total_harga'  => ['required'],
            'diskon' => ['required'],
            'bayar' => ['required'],
            'diterima' => ['required'],
            'id_user' => ['required'],


        ]);
        
        $penjualan->update($request->all());

        return redirect('penjualans'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
    }
}
