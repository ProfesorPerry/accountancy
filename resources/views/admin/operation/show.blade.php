@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800 mb-4">{{ $operation->name }}</h1>

    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Start</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.operation.index') }}">Operacje księgowe</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $operation->name }}</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ $operation->name }}
            </h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Tytuł operacji:</span> {{ $operation->name }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Kwota operacji:</span> {{ $operation->amount }} PLN
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Zaksięgowano dnia:</span> {{ $operation->creation_day }}
            </p>

            <hr>

            <h3 class="m-0 font-weight-bold text-primary mb-3">
                Zaksięgowano na kontach:
            </h3>

            @if($operation->accounts->isEmpty())
                <div class="alert alert-danger" role="alert">
                    Operacja jest przestarzała. <br>
                    Możesz ją usunąć lub zachować do późniejszego podglądu.
                </div>
            @endif

            @foreach($operation->accounts as $account)
                <p class="text-secondary">
                    <span class="font-weight-bold text-primary">Nazwa konta:</span> {{ $account->name }}
                    <span class="font-weight-bold">({{ $operation->amount }} PLN)</span>
                </p>
                <p class="text-secondary">
                    <span class="font-weight-bold text-primary">Strona:</span>
                    @if($account->pivot->side == 'debit')
                        Debet
                    @else
                        Kredyt
                    @endif
                </p>

                <hr>
            @endforeach

            @if(!$operation->accounts->isEmpty())
                <a class="btn btn-primary" href="{{ url('/admin/operation/' . $operation->id . '/edit') }}">
                    Edytuj dane operacji
                </a>
            @else
                <a class="btn btn-primary" href="{{ url('/admin/operation/' . $operation->id . '/destroy') }}">
                    Usuń operację
                </a>
            @endif
    </div>
@endsection
