<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
        $Members = Member::with('user')->get();
        //$Books = Book::with('publisher')->get();
        //$Authors = Author::with('Books')->get();
        //$Catalogs = Catalog::with('Books')->get();
        //$Publishers = Publisher::with('Books')->get();
        //$Transactions = Transaction::with('member')->get();
 
        return $Members;
        return view('home');
    }
}
