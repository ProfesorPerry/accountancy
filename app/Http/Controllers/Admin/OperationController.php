<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Http\Controllers\Controller;
use App\Operation;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $operations = Operation::all();
        $viewData = ['operations' => $operations];

        return view('admin.operation.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accounts = Account::all();
        $viewData = ['accounts' => $accounts];

        return view('admin.operation.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        $operationTitle = $request->input('title');
        $operationAmount = $request->input('amount');
        $account1Id = $request->input('account1');
        $account2Id = $request->input('account2');
        $account1Side = $request->input('side1');
        $account2Side = $request->input('side2');
        $account1Sign = $request->input('sign1');
        $account2Sign = $request->input('sign2');

        $operation = new Operation();
        $operation->name = $operationTitle;
        $operation->amount = $operationAmount;
        $operation->created_at = date("Y-m-d H:i:s");
        $operation->save();

        $operation->accounts()->attach($account1Id, [
            'side' => $account1Side,
            'sign' => $account1Sign,
        ]);

        $operation->accounts()->attach($account2Id, [
            'side' => $account2Side,
            'sign' => $account2Sign,
        ]);

        return redirect('/admin/account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id)
    {
        $operation = Operation::with(['accounts'])->find($id);
        $viewData = ['operation' => $operation];

        return view('admin.operation.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
