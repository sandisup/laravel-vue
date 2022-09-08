<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Supplier;
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
        return view('admin.pembelian', compact('suppliers')); 
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
            'id_supplier' => ['required'],
            'total_item' => ['required'],
            'total_harga'  => ['required'],
            'diskon' => ['required'],
            'bayar' => ['required'],

        ]);
        
        pembelian::create($request->all());

        return redirect('pembelians'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
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
