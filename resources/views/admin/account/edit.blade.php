@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-4">
        Edytuj konto
        <span class="text-primary">{{ $account->name }}</span>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodawanie konta księgowego</h6>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/account/' . $account->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="inputName" class="col-form-label col-sm-2 font-weight-bold">
                        Nazwa konta:
                    </label>
                    <input id="inputName" class="form-control col-sm-8" type="text" name="name" value="{{ $account->name }}">
                </div>

                <div class="form-group row">
                    <label for="inputSymbol" class="col-form-label col-sm-2 font-weight-bold">
                        Symbol konta:
                    </label>
                    <input id="inputSymbol" class="form-control col-sm-8" type="text" name="symbol" value="{{ $account->symbol }}">
                </div>

                <div class="form-group row">
                    <label for="inputState" class="col-form-label col-sm-2 font-weight-bold">
                        Bilans otwarcia:
                    </label>
                    <input id="inputState" class="form-control col-sm-8" type="text" name="state" value="{{ $account->currentState }}">
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <button class="btn btn-primary" type="submit">
                        Zatwierdź
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
