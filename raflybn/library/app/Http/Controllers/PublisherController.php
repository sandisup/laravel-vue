<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\publisher as ModelsPublisher;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class PublisherController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$publishers = Publisher::with('books')->get();

        //return $publishers;
        return view('admin.publisher');
    }
    public function api()
    {
        $publishers = Publisher::all();

        // foreach ($publishers as $key => $publisher) {
        //     $publisher->date = convert_date($publisher->created_at);
        // }

        $datatables = datatables()->of($publishers)
                                  ->addColumn('date', function($publisher) {
                                       return convert_date($publisher->created_at);
                                  }) ->addIndexColumn();
        
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.publisher.create');
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
            'name'     => ['required'],
            'email'     => ['required'],
            'phone_number'     => ['required'],
            'address'     => ['required'],
        ]);
        //$publisher = new publisher;
        //$publisher->name = $request->name;
        //$publisher->email = $request->email;
        //$publisher->phone_number = $request->phone_number;
        //$publisher->address = $request->address;
        //$publisher->save();

        publisher::create($request->all());

        return redirect('publishers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
       // return view('admin.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $this->validate($request,[
            'name'     => ['required'],
            'email'     => ['required'],
            'phone_number'     => ['required'],
            'address'     => ['required'],
        ]);

        $publisher->update($request->all());

        return redirect('publishers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect('publishers');
    }
}
