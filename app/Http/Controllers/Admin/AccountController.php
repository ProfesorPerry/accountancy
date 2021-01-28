<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accountList = Account::with(['operations'])->get();
        $viewData = ['accountList' => $accountList];

        return view('admin.account.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        $account = new Account();

        $account->name = $request->input('name');
        $account->symbol = $request->input('symbol');
        $account->currentState = (double) $request->input('state') ?? 0;

        // Set flash message for next request
        if($account->save()) {
            $request->session()->flash('success', 'Pomyślnie dodano konto do systemu');
        } else {
            $request->session()->flash('error', 'Nie udało się dodać konta, prosimy spróbować ponownie');
        }

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
        $account = Account::with(['operations'])->find($id);
        $viewData = ['account' => $account];

        return view('admin.account.show', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id)
    {
        $account = Account::find($id);
        $viewData = ['account' => $account];

        return view('admin.account.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Redirector
     */
    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->name = $request->input('name');
        $account->symbol = $request->input('symbol');
        $account->currentState = $request->input('state');

        // Set flash message for next request
        if($account->save()) {
            $request->session()->flash('success', 'Pomyślnie zmieniono dane konta');
        } else {
            $request->session()->flash('error', 'Nie zmienić danych konta, prosimy spróbować ponownie');
        }

        return redirect('/admin/account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Redirector
     */
    public function destroy(int $id)
    {
        $account = Account::find($id);

        // Set flash message for next request
        if($account->delete()) {
            session()->flash('success', 'Pomyślnie usunięto konto');
        } else {
            session()->flash('error', 'Nie udało się usunąć konta, prosimy spróbować ponownie');
        }

        return redirect('/admin/account');
    }

    /**
     * @param Request $request
     */
    public function validateSymbol(Request $request)
    {
        $symbol = $request->symbol;
        $duplicate = Account::where('symbol', '=', $symbol)->get();

        if (!$duplicate->isEmpty()) {
            echo "Symbol jest juz używany";
        }
    }
}
