<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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
        // User to Member
        // $members = Member::all(); //Memanggil semua data di model Member
        $members = Member::with('user')->get(); //memanggil beserta data pada foreing key / user
        return $members;

        // $transactions = Transaction::with('member')->get();
        // return $transactions;

        // Transaction to Transaction Detail
        // $transactions = Transaction::with('transactionDetail')->get();
        // return $transactions;

        // Transaction Detail to Transaction
        // $transactionDetails = TransactionDetail::with('transactions')->get();
        // return $transactionDetails;

        // Transaction Detail to Book
        // $transactionDetails = TransactionDetail::with('books')->get();
        // return $transactionDetails;

        // Book to Transaction Detail
        // $books = Book::with('transactionDetail')->get();
        // return $books;

        // Book to Publisher
        // $books = Book::with('publisher')->get();
        // return $books;

        // Book to Author
        // $books = Book::with('author')->get();
        // return $books;

        // Book to Catalog
        // $books = Book::with('catalog')->get();
        // return $books;

        // Publisher to Book
        // $publishers = Publisher::with('books')->get();
        // return $publishers;

        // Author to Book
        // $authors = Author::with('books')->get();
        // return $authors;

        // Catalog to Book
        // $catalogs = Catalog::with('books')->get();
        // return $catalogs;




        // $books = Book::with('transactionDetail')->get();
        // return $books;

        // return view('home');
    }
}
