<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
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
        //$members = Member::with('user', 'transaction')->get();
        //$books = Book::with('publisher', 'author', 'catalog')->get();
        //$publishers = Publisher::with('books')->get();
        //$authors = Author::with('books')->get();
        //$catalogs = Catalog::with('books')->get();
        //$transactions = Transaction::with('transaction_details')->get();

        //return $transactions;
        return view('home');
    }
}
