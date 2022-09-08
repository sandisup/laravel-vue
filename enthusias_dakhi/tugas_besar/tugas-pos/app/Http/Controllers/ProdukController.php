<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();     
        return view('admin.produk', compact('kategoris'));
    }

    public function api()
    {
        $produks = Produk::join('kategoris','kategoris.id','produks.id_kategori')->get();

        $datatables = datatables()->of($produks)->addIndexColumn();

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
            'nama_produk' => ['required'],
            'merk' => ['required'],
            'harga_beli'  => ['required'],
            'diskon' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],

        ]);
        
        produk::create($request->all());

        return redirect('produks'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request,[
            'nama_produk' => ['required'],
            'merk' => ['required'],
            'harga_beli'  => ['required'],
            'diskon' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],

        ]);
        
        $produk->update($request->all());

        return redirect('produks'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
    }
}
