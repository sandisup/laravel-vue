<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        //return view('home');

        $total_books = Book::count();
        $total_members = Member::count();
        $total_catalogs = Catalog::count();
        $total_transactions = Transaction::whereMonth('date_start', date('m'))->count();

        $data_donut = Book::select(DB::raw("COUNT(catalog_id) as total"))->groupBy('catalog_id')->orderBy('catalog_id', 'asc')->pluck('total');
        $label_donut = Catalog::orderBy('catalogs.id', 'asc')->join('books', 'books.catalog_id', '=', 'catalogs.id')->groupBy('catalogs.name')->pluck('catalogs.name');

        $label_bar = ['Date_start', 'Date_end'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
                $data_bar[$key]['label'] = $label_bar[$key];
                $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210,214,222,1)';
                $data_month = [];

                foreach (range(1,12) as $month) {
                    if ($key == 0){
                        $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else{
                        $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
             }
                $data_bar[$key]['data'] = $data_month;
        }
        //return $data_bar;

        return view('home', compact('total_books', 'total_members','total_catalogs','total_transactions','data_donut','label_donut','data_bar'));
    }
}
