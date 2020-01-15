<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\TransactionDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        return view('checkout', [
            'transaction' => $transaction,
            'detail' => $transaction ? TransactionDetail::where('transaction_id', $transaction->id)->get() : []
        ]);
    }
    public function pay($id)
    {
        // Update status
        Transaction::where('id', $id)->update(['status' => 'lunas']);
        return redirect()->back();
    }
}
