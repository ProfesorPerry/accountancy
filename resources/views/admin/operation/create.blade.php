@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800 mb-4">Dodaj operację finansową</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodawanie operacji księgowej</h6>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/operation') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputTitle" class="col-form-label col-sm-3 font-weight-bold">
                        Tytuł operacji:
                    </label>
                    <input id="inputTitle" class="form-control col-sm-8" type="text" name="title">
                </div>

                <div class="form-group row">
                    <label for="inputAmount" class="col-form-label col-sm-3 font-weight-bold">
                        Kwota:
                    </label>
                    <input id="inputAmount" class="form-control col-sm-8" type="text" name="amount">
                </div>

                <hr>

                <div class="form-group row">
                    <label for="selectAccount1" class="col-form-label col-sm-3 font-weight-bold">
                        Strona pierwsza (konto):
                    </label>
                    <select name="account1" id="selectAccount1" class="form-control col-sm-8">
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ $account->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 font-weight-bold">
                        Konto pierwsze - strona księgowania:
                    </div>
                    <div class="col-sm-8">
                        <input id="radioAccount1SideDebit" class="form-check-input" type="radio" name="side1" value="debit" checked>
                        <label class="form-check-label" for="radioAccount1SideDebit">
                            Winien (Debet)
                        </label>

                        <br>

                        <input id="radioAccount1SideCredit" class="form-check-input" type="radio" name="side1" value="credit">
                        <label class="form-check-label" for="radioAccount1SideCredit">
                            Ma (Kredyt)
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="selectAccount1Sign" class="col-form-label col-sm-3 font-weight-bold">
                        Konto pierwsze - typ operacji:
                    </label>
                    <select name="sign1" id="selectAccount1Sign" class="form-control col-sm-8">
                        <option value="plus">
                            Zwiększająca
                        </option>
                        <option value="minus">
                            Zmniejszająca
                        </option>
                    </select>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="selectAccount2" class="col-form-label col-sm-3 font-weight-bold">
                        Strona druga (konto):
                    </label>
                    <select name="account2" id="selectAccount2" class="form-control col-sm-8">
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ $account->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 font-weight-bold">
                        Konto drugie - strona księgowania:
                    </div>
                    <div class="col-sm-8">
                        <input id="radioAccount2SideDebit" class="form-check-input" type="radio" name="side2" value="debit" checked>
                        <label class="form-check-label" for="radioAccount2SideDebit">
                            Winien (Debet)
                        </label>

                        <br>

                        <input id="radioAccount2SideCredit" class="form-check-input" type="radio" name="side2" value="credit">
                        <label class="form-check-label" for="radioAccount2SideCredit">
                            Ma (Kredyt)
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="selectAccount2Sign" class="col-form-label col-sm-3 font-weight-bold">
                        Konto drugie - typ operacji:
                    </label>
                    <select name="sign2" id="selectAccount2Sign" class="form-control col-sm-8">
                        <option value="plus">
                            Zwiększająca
                        </option>
                        <option value="minus">
                            Zmniejszająca
                        </option>
                    </select>
                </div>

                <hr>

                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <button class="btn btn-primary" type="submit">
                        Zatwierdź
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

