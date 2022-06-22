<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Transaction;
use App\Models\Catalog;
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
        //no 1
        $data = Member::select('*')
                ->join('users', 'users.member_id', '=', 'member_id')
                ->get();
        //no 2
        $data2 = Member::select('*')
                ->leftJoin('users', 'users.member_id', '=', 'member_id')
                ->where('users.member_id', NULL)
                ->get();
        //no 3
        $data3 = Transaction::select('members.id', 'members.name')
                ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                ->where('transactions.member_id', NULL)
                ->get();
        //no 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->orderBy('members.id', 'asc')
                ->get();
        //no 5
        $data5 = Member::select('members.id', 'members.name')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('members.id',5)
                ->orWhere('members.id',3)
                ->orWhere('members.id',4)
                ->get();
        //no 6
        $data6 = Member::select('members.id', 'members.name', 'transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->get();
        //no 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('date_end','LIKE','%'.'-06-'.'%')
                ->get();
        //no 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('date_start','LIKE','%'.'-05-'.'%')
                ->get();
        //no 9 still error
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('date_start','LIKE','%'.'-06-'.'%','AND','date_end','LIKE','%'.'-06-'.'%')
                ->get();
        //no 10
        $data10 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('address','LIKE','%'.'lake'.'%')
                ->get();
        //no 11 still error
        $data11 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('address','LIKE','%'.'lake'.'%','AND','gender','LIKE','%'.'2'.'%')
                ->get();
        //no 12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end', 'transaction_details.book_id', 'transaction_details.qty')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->where('qty','>',1)
                ->get();
        //no 13 still error
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end', 'transaction_details.book_id', 'transaction_details.qty', 'books.title', 'books.price', /*'transaction_details.qty', 'books.price'*/)
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->join('books', 'books.id', '=', 'transaction_details.book_id')
                ->get();
        //no 14 still error
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end', 'transaction_details.book_id', 'transaction_details.qty', 'books.title', 'authors.name', 'publishers.name', 'catalogs.name')
                ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                ->join('books', 'books.id', '=', 'transaction_details.book_id')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                ->get();
        //no 15
        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')
                ->join('books', 'books.catalog_id', '=', 'catalogs.id')
                ->get();
        //no 16
        $data16 = Publisher::select('books.id', 'books.title', 'books.publisher_id', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price', 'publishers.name')
                ->rightJoin('books', 'publishers.id', '=', 'books.publisher_id')
                ->get();
        //no 17
        $data17 = Book::select('*')
                ->where('books.author_id',16)
                ->get();
        //no 18
        $data18 = Book::select('*')
                ->where('books.price', '>', 15000)
                ->get();
        //no 19 still error
        $data19 = Book::select('*')
                ->where('books.publisher_id',1,/*'books.qty','>',10*/)
                ->get();
        //no 20
        $data20 = Member::select('*')
               // ->where('members.cretaed_at','LIKE','%'.'-06-'.'%')
                ->get();

        //return $data20;
        return view('home');
    }
}