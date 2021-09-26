@extends('layouts.master')

@section('content')
    <!-- Alert with flash message -->
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista kont księgowych</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Start</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konta księgowe</li>
        </ol>
    </nav>

    <a href="{{ url('/admin/account/create') }}" class="btn btn-success btn-icon-split mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Dodaj konto</span>
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Plan kont</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Typ</th>
                        <th>Numer</th>
                        <th>Bilansowe</th>
                        <th>Wynikowe</th>
                        <th>Pozabilansowe</th>
                        <th>Rozrachunkowe</th>
                        <th>Kartotekowe</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accountList as $account)
                        <tr>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->type }}</td>
                            <td>{{ $account->number }}</td>
                            <td>{!! $account->is_balance_account ? '<i class="fas fa-check"></i>' : '' !!}</td>
                            <td>{!! $account->is_result_account ? '<i class="fas fa-check"></i>' : '' !!}</td>
                            <td>{!! $account->is_beyond_balance_account ? '<i class="fas fa-check"></i>' : '' !!}</td>
                            <td>{!! $account->is_clearing_account ? '<i class="fas fa-check"></i>' : '' !!}</td>
                            <td>{!! $account->is_file_account ? '<i class="fas fa-check"></i>' : '' !!}</td>
                            <td>
                                <a class="btn btn-info btn-circle" href="{{ url('/admin/account/' . $account->id) }}">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                                <form class="d-inline" action="{{ url('/admin/account/' . $account->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-circle" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
