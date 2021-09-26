@extends('layouts.master')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Start</a></li>
            <li class="breadcrumb-item"><a href="{{ route('account.index') }}">Konta księgowe</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konto {{ $account->name }}</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Konto: {{ $account->name }}
            </h6>
        </div>

        <div class="card-body">
            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Nazwa konta:</span> {{ $account->name }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Typ: </span> {{ $account->type }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Numer konta:</span> {{ $account->number }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Konto bilansowe:</span> {{ $account->is_balance_account ? 'TAK' : 'NIE' }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Konto wynikowe:</span> {{ $account->is_result_account ? 'TAK' : 'NIE' }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Konto pozabilansowe:</span> {{ $account->is_beyond_balance_account ? 'TAK' : 'NIE' }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Konto rozrachunkowe:</span> {{ $account->is_clearing_account ? 'TAK' : 'NIE' }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Konto kartotekowe:</span> {{ $account->is_file_account ? 'TAK' : 'NIE' }}
            </p>

            <a class="btn btn-primary" href="{{ url('/admin/account/' . $account->id . '/edit') }}">
                Edytuj konto
            </a>
        </div>
    </div>
@endsection
