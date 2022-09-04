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
        $transactions = Transaction::all();
        $books = Book::all();
        $members = Member::all();
        $transaction_details = TransactionDetail::all();
        return view('admin.transaction', compact('books', 'members', 'transaction_details'));
    }

    public function api(){
        $transactions = Transaction::
        selectRaw('datediff(date_end, date_start) as lama_pinjam, transactions.*, members.name')
        ->join('members', 'members.id', 'transactions.member_id')->get();
        
        $datatables = datatables()->of($transactions)
        ->addColumn('status_name', function ($row){
            return $row->status? 'Sudah Dikembalikan': 'Belum Dikembalikan';
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
            
        ]);

        $transaction = Transaction::create($request->only('member_id', 'date_start', 'date_end', 'status'));
        $details = new TransactionDetail();
        $details->book_id = $request->book_id;
        $details->qty = 1;
        $transaction->transactionDetails()->save($details);
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
        $this->validate($request, [
            'member_id'  => 'required',
            'date_start'  => 'required',
            'date_end'  => 'required',
            'status' => 'required',
        ]);

        $transaction->update($request->all());
        return redirect('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
