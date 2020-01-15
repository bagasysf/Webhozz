<?php

namespace App\Http\Controllers\TransactionDetail;

use App\TransactionDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $transactiondetail = TransactionDetail::when($keyword, function ($query) use ($keyword) {
            $query->where('transaction_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('sub_total', 'LIKE', "%$keyword%");
        })->paginate($perPage);

        return view('transaction-detail.index', compact('transactiondetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('transaction-detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        TransactionDetail::create($requestData);

        $notification = ['message' => 'Your data has been added successfully', 'alert-type' => 'success'];
        return redirect('transaction-detail')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $transactiondetail = TransactionDetail::findOrFail($id);
        return view('transaction-detail.show', compact('transactiondetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $transactiondetail = TransactionDetail::findOrFail($id);
        return view('transaction-detail.edit', compact('transactiondetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $requestData = $request->all();

        $transactiondetail = TransactionDetail::findOrFail($id);
        $transactiondetail->update($requestData);

        $notification = ['message' => 'Your data has been updated successfully', 'alert-type' => 'success'];
        return redirect('transaction-detail')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TransactionDetail::destroy($id);

        $notification = ['message' => 'Your data has been deleted successfully', 'alert-type' => 'error'];
        return redirect('transaction-detail')->with($notification);
    }
}
