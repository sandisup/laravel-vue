<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class AuthorController extends Controller
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
        //$authors = author::with('books')->get();

        //return $authors;

        return view('admin.author');
    }
    
    public function api()
    {
        $authors = Author::all();
        
        // foreach ($authors as $key => $author) {
        //     $author->date = convert_date($author->created_at);
        // }

        $datatables = datatables()->of($authors)
                                  ->addColumn('date', function($author) {
                                       return convert_date($author->created_at);
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
            'name'     => ['required'],
            'email'     => ['required'],
            'phone_number'     => ['required'],
            'address'     => ['required'],
        ]);

        Author::create($request->all());

        return redirect('authors');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name'     => ['required'],
            'email'     => ['required'],
            'phone_number'     => ['required'],
            'address'     => ['required'],
        ]);

       $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
