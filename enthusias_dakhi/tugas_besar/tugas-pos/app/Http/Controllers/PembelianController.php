<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\Produk;
use App\Models\PembelianDetail;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();     
        $produks = Produk::all();     
        $pembelian_details = PembelianDetail::all();     

        return view('admin.pembelian', compact('suppliers', 'produks', 'pembelian_details')); 
    }

    public function api()
    {
        $pembelians = Pembelian::selectRaw('pembelians.*, suppliers.nama')
        ->join('suppliers','suppliers.id','pembelians.id_supplier')->get();

        $datatables = datatables()->of($pembelians)->addIndexColumn();

        return $datatables->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembelian.create');
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
            'id_supplier' => ['required'],
            'total_item' => ['required'],
            'total_harga'  => ['required'],
            'diskon' => ['required'],
            'bayar' => ['required'],
            'multiple_produk' => 'array',
            'multiple_harga' => 'array'

        ]);
        
        $pembelian= Pembelian::create($request->all());

        foreach($request->multiple_produk as $multi){
            $details = new PembelianDetail();
            $details->id_produk = $multi;
            $details->harga_beli = $multi;
            $details->subtotal = $request->total_harga*$request->total_item;
            $details->jumlah = $request->total_item;
            $pembelian->pembelianDetails()->save($details);
        }

        return redirect('pembelians'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
        $pembelians = Pembelian::all();
        $suppliers = Supplier::all();     
        $produks = Produk::all();    
        $pembelian= Pembelian::findOrFail($id);
 
        */
        $pembelian = Pembelian::findOrFail($id);

        return view('admin.pembelian.detail', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        return view('admin.pembelian.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $this->validate($request,[
            'id_supplier' => ['required'],
            'total_item' => ['required'],
            'total_harga'  => ['required'],
            'diskon' => ['required'],
            'bayar' => ['required'],

        ]);
        
        $pembelian->update($request->all());

        return redirect('pembelians'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
    }
}
