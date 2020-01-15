<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
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

        $transaction = Transaction::when($keyword, function($query) use($keyword) {
            $query->where('user_id', 'LIKE', "%$keyword%")
				->orWhere('total', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%");
        })->paginate($perPage);

        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('transaction.create');
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
        
        Transaction::create($requestData);

        $notification = ['message' => 'Your data has been added successfully', 'alert-type' => 'success'];
        return redirect('transaction')->with($notification);
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
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction'));
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
        $transaction = Transaction::findOrFail($id);
        return view('transaction.edit', compact('transaction'));
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
        
        $transaction = Transaction::findOrFail($id);
        $transaction->update($requestData);

        $notification = ['message' => 'Your data has been updated successfully', 'alert-type' => 'success'];
        return redirect('transaction')->with($notification);
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
        Transaction::destroy($id);

        $notification = ['message' => 'Your data has been deleted successfully', 'alert-type' => 'error'];
        return redirect('transaction')->with($notification);
    }
}
