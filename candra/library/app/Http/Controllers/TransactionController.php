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
        if(auth()->user()->can('index transaction')){
            $transactions = Transaction::all();
            $books = Book::all();
            $members = Member::all();
            $transaction_details = TransactionDetail::all();
            return view('admin.transaction', compact('books', 'members', 'transaction_details'));
        } else {
            return abort('403');
        }
        
    }

    public function api(Request $request)
    {
        if($request->status){
            $transactions = Transaction::where('status',$request->status)->get();
        }else {
            $transactions = Transaction::all();
        }

        $transactions = Transaction::with('transactionDetails')
        ->selectRaw('datediff(date_end, date_start) as lama_pinjam, transactions.*, members.*')
        
        ->join('members', 'members.id', 'transactions.member_id')->get();
        
        $datatables = datatables()->of($transactions)
        ->addColumn('status_name', function ($row){
            return $row->status? 'Sudah Dikembalikan': 'Belum Dikembalikan';
        })
        // Detail data buku
        // ->addColumn('details', function ($row){
        //     return $row->transactionDetails;
        // })
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
            'multiple_book' => 'array'
        ]);

        $transaction = Transaction::create($request->only('member_id', 'date_start', 'date_end', 'status'));

        foreach($request->multiple_book as $multi){
            $details = new TransactionDetail();
            $details->book_id = $multi;
            $details->qty = 1;
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
