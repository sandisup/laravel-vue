<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

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
        //$Members = Member::with('user')->get();
        //$Books = Book::with('publisher')->get();
        //$Authors = Author::with('Books')->get();
        //$Catalogs = Catalog::with('Books')->get();
        //$Publishers = Publisher::with('Books')->get();
        //$Transactions = Transaction::with('member')->get();
        
        //no1
        $data1 = Member::select('*')
                ->join('users','users.member_id','=','members.id')
                ->get();

        //no2
        $data2 = User::select('*')
                 ->leftJoin('members','members.id','=','users.member_id')
                 ->get();

        //no3
        $data3 = Member::select('*')
                 ->join('Transactions','Transactions.member_id','=','members.id')
                 ->where('gender','mr.')
                 ->get();

        //no4
        $data4 = Book::select('title','year','qty','price',)
                ->Join('Publishers','Publishers.id','=','Books.publisher_id')
                ->where('year','2012')
                ->get();

        //no5
        $data5 =Author::select('*')
                ->rightJoin('Books','Books.author_id','=','Authors.id')
                ->where('qty','12')
                ->get();

        return $data5;
        return view('home');
    }
}
