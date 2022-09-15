<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        // 4 Card
        $total_book = Book::count();
        $total_member = Member::count();
        $total_publisher = Publisher::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();

        // DONUT CHART //

        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id', 'asc')->pluck('total');
        $label_donut = Publisher::orderBy('publisher_id', 'asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');

        // BAR CHART //

        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value){
                $data_bar[$key]['label'] = $label_bar[$key];
                $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0,9)' : 'rgba(210, 214, 222,1)';
                $data_month = [];

                foreach(range(1,12) as $month){
                        if($key == 0){
                                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                        } else {
                                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                        }
                        
                }
                $data_bar[$key]['data'] = $data_month;
        }

        
        // return $data_bar;

        // $data5 =Transaction::selectRaw('count(members.id) as total_book, transactions.member_id, members.name, members.phone_number')
        //         ->leftJoin('members','members.id', '=', 'transactions.member_id')
        //         ->where('members.id', 1)
        //         ->take(1)
        //         ->groupBy('transactions.member_id','members.name', 'members.phone_number')
        //         ->orderBy('members.id', 'asc')
        //         ->get();
        
        // $data6 = Transaction::select('members.name', 'members.phone_number', 'transactions.date_start','transactions.date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->orderBy('members.name')
        //         ->get();

        // $data7 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->whereMonth('date_end', '=', '7')
        //         ->get();

        // $data8 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'date_start', 'date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->whereMonth('date_start', '=', '5')
        //         ->get();

        // $data9 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'date_start', 'date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->whereMonth('date_start', '=', '6')
        //         ->whereMonth('date_end', '=', '7')
        //         ->get();

        // $data10 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->where('members.address', 'like', '%East%')
        //         ->orderBy('members.name')
        //         ->get();

        // $data11 = Transaction::select('members.name','members.phone_number', 'transactions.date_start', 'transactions.date_end')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->where('members.address', 'like', '%East%')
        //         ->where('members.gender', 'like', '%L%')
        //         ->orderBy('members.name', 'asc')
        //         ->get();

        // $data12 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //         ->where('transaction_details.qty', '>' ,1)
        //         ->get();

        // $data13 = Transaction::selectRaw(
        //         'members.name, members.phone_number, members.address, transactions.date_start, transactions.date_end,
        //         transaction_details.book_id, transaction_details.qty, books.title, books.price,
        //         transaction_details.qty * books.price as Total')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //         ->join('books', 'books.id', '=', 'transaction_details.book_id')
        //         ->orderBy('members.name', 'asc')
        //         ->get();

        // $data14 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty',
        //             'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
        //         ->join('members', 'members.id', '=', 'transactions.member_id')
        //         ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        //         ->join('books', 'books.id', '=', 'transaction_details.book_id')
        //         ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        //         ->join('authors', 'authors.id', '=', 'books.author_id')
        //         ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
        //         ->get();

        // $data15 = Book::select('catalogs.id', 'catalogs.name', 'books.title')
        //         ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
        //         ->get();

        // $data16 = Book::select('isbn', 'title', 'publisher_id', 'author_id','catalog_id', 'qty', 'price', 'publishers.name')
        //         ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        //         ->get();

        // $data17 = Author::selectRaw('id, count(id) as total_author')
        //         ->groupBy('id')
        //         ->where('id', '=', 3)
        //         ->get();

        // $data18 = Book::select('*')
        //         ->where('price', '>', '50000')
        //         ->get();

        // $data19 = Book::select('*')
        //         ->where('publisher_id', '=', '9')
        //         ->where('qty', '>', '13')
        //         ->get();

        // $data20 = Member::select('*')
        //         ->whereMonth('created_at', '=', '7')
        //         ->get();

        // return $data13;

        // User to Member
        // $members = Member::all(); //Memanggil semua data di model Member
        // $members = Member::with('user')->get(); //memanggil beserta data pada foreing key / user
        // return $members;

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

        return view('home', compact('total_book', 'total_member', 'total_publisher', 'total_transaction', 'data_donut', 'label_donut', 'data_bar'));
    }

    public function test_spatie()
    {
        // Membuat roles dan permission
        // $role = Role::create(['name' => 'kasir']);
        // $permission = Permission::create(['name' => 'index transaction']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // membuat user terhubung ke roles
        // $user = auth()->user();                      //memanggil user yang saat ini sedang login
        // $user = User::where('id', 2)->first();       //meanggil user dengan id 
        // $user->assignRole('kasir');
        // return $user;

        // menampilkan semua user dengan roles
        // $user = User::with('roles')->get();
        // return $user;

        // menghapus roles
        // $user = auth()->user();
        // $user->removeRole('kasir');
    }
}
