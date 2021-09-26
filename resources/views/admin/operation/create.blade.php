@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800 mb-4">Dodaj operację finansową</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Start</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.operation.index') }}">Operacje księgowe</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dodaj operację księgową</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodawanie operacji księgowej</h6>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/operation') }}" method="POST">
                @csrf

                @if($accounts->isEmpty())
                    <div class="alert alert-danger">Brak kont do zaksięgowania operacji!</div>
                @endif

                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <button class="btn btn-primary col-sm-8" type="submit" {{ $accounts->isEmpty() ? 'disabled' : '' }}>
                        Zatwierdź
                    </button>
                </div>

                <div class="form-group row">
                    <label for="inputTitle" class="col-form-label col-sm-3 font-weight-bold">
                        Tytuł operacji:
                    </label>
                    <input
                        id="inputTitle"
                        class="form-control col-sm-8"
                        type="text"
                        name="name"
                        maxlength="255"
                        required
                        autofocus>
                </div>

                <div class="form-group row">
                    <label for="inputAmount" class="col-form-label col-sm-3 font-weight-bold">
                        Kwota (PLN):
                    </label>
                    <input
                        id="inputAmount"
                        class="form-control col-sm-8"
                        type="number"
                        name="amount"
                        min="0"
                        step="0.01"
                        required>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="selectAccount1" class="col-form-label col-sm-3 font-weight-bold">
                        Strona pierwsza (konto):
                    </label>
                    <select name="account1" id="selectAccount1" class="form-control col-sm-8" required>
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
                    <select name="sign1" id="selectAccount1Sign" class="form-control col-sm-8" required>
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
                    <select name="account2" id="selectAccount2" class="form-control col-sm-8" required>
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
                    <select name="sign2" id="selectAccount2Sign" class="form-control col-sm-8" required>
                        <option value="plus">
                            Zwiększająca
                        </option>
                        <option value="minus">
                            Zmniejszająca
                        </option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="inputCreationDay" class="col-form-label col-sm-3 font-weight-bold">
                        Zaksięgowano dnia:
                    </label>

                    <input
                        id="inputCreationDay"
                        class="form-control col-sm-8"
                        type="date"
                        name="creation_day"
                        value="{{ now()->format('Y-m-d') }}"
                        required>
                </div>
            </form>
        </div>
    </div>
@endsection

