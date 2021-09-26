<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Operations\OperationRequest;
use App\Models\Account;
use App\Http\Controllers\Controller;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::all();

        return view('admin.operation.index', compact('operations'));
    }

    public function create()
    {
        $accounts = Account::all();

        return view('admin.operation.create', compact('accounts'));
    }

    public function store(OperationRequest $request)
    {
        $operation = new Operation();
        $operation->fill($request->input());
        $operation->save();

        $account1Id = $request->input('account1');
        $account2Id = $request->input('account2');
        $account1Side = $request->input('side1');
        $account2Side = $request->input('side2');
        $account1Sign = $request->input('sign1');
        $account2Sign = $request->input('sign2');


        $operation->accounts()->attach($account1Id, [
            'side' => $account1Side,
            'sign' => $account1Sign,
        ]);

        $operation->accounts()->attach($account2Id, [
            'side' => $account2Side,
            'sign' => $account2Sign,
        ]);

        return redirect()
            ->route('admin.operation.show', ['operation' => $operation->id])
            ->with('message', 'Pomyślnie dodano operację księgową.');
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
