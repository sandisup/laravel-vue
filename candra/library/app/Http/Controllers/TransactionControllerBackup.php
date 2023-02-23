<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Member;
use App\Models\Book;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $books = Book::all();
        $members = Member::all();
        $transaction_details = TransactionDetail::all();

        return view('admin.transaction', compact('books', 'members', 'transaction_details'));
    }

    public function api(Request $request)
    {
        if($request->status){
            $transactions = Transaction::where('status',$request->status);
        }else {
            $transactions = Transaction::query();
        }

        $transactions->with(['transactionDetails.books'])
        ->join('members', 'members.id', 'transactions.member_id')
        ->selectRaw('datediff(date_end, date_start) as lama_pinjam, transactions.*, members.name')
        ->get();

        $datatables = datatables()->of($transactions)
        ->addColumn('total_buku', function ($row) {
            return $row->transactionDetails->count();
        })
        ->addColumn('total_bayar', function ($row) {
            $total_bayar = 0;
            foreach($row->transactionDetails as $detail){
                $qty = $detail->qty;
                $harga = $detail->books->price;
                $total = $qty * $harga;
                $total_bayar += $total;
            }
                return $total_bayar;
        })
        ->addColumn('status_name', function($row){
            if($row->status == 1){
                    return 'Belum Dikembalikan';
            } else{
                    return 'Sudah Dikembalikan';
            }
        })
        ->addIndexColumn();

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
        $this->validate($request, [
            'member_id'  => 'required',
            'date_start'  => 'required',
            'date_end'  => 'required',
            'multiple_book' => 'array',
            // 'status' => 'required'
        ]);

        $request->input('status', 1);
        $transaction = Transaction::create($request->only('member_id', 'date_start', 'date_end', 'status'));

        foreach($request->multiple_book as $multi){
            $details = new TransactionDetail();
            $details->book_id = $multi;
            $details->qty = 1;
            $books = Book::find($multi);
            $books->qty = $books->qty - 1;
            $books->save();
            $transaction->transactionDetails()->save($details);
        }
        
        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        
    }
}
