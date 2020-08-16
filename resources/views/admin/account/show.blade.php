@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ $account->name }}
            </h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                    <a class="dropdown-item" href="#">Więcej o kontach</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Nazwa konta:</span> {{ $account->name }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Symbol konta:</span> {{ $account->symbol }}
            </p>

            <p class="text-secondary">
                <span class="font-weight-bold text-primary">Bieżące saldo:</span> {{ $account->currentState }} PLN
            </p>

            <a class="btn btn-primary" href="{{ url('/admin/account/' . $account->id . '/edit') }}">
                Edytuj dane konta
            </a>
        </div>
    </div>
@endsection
