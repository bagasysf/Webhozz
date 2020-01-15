<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\Model\Product;

class CartController extends Controller
{
    public function __invoke($id)
    {
        // insert ke table transaction
        $exist = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        $product = Product::find($id);
        // if not exist create transaction baru
        // else pake yg udah ada
        if ($exist) {
            $transaction = $exist;
            $transaction->total = $exist->total + $product->price;
            $transaction->save();
        } else {
            // insert ke table transaction
            $transaction = Transaction::create([
                'total' => $product->price,
                'user_id' => auth()->user()->id,
                'status' => 'waiting'
            ]);
        }
        // check if transactiond detail with same transaction id and product id exist
        // if exist add quantity
        // else create new transaction detail
        $checkDetailExist = TransactionDetail::where('transaction_id', $transaction->id)->where('product_id', $product->id)->first();
        if ($checkDetailExist) {
            $detail = $checkDetailExist;
            $detail->quantity = $checkDetailExist->quantity + 1;
            $detail->sub_total = $checkDetailExist->sub_total + $product->price;
            $detail->save();
        } else {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'sub_total' => $product->price
            ]);
        }
        return redirect()->back();
    }
}
