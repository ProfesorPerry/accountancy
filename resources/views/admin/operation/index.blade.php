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
    <h1 class="h3 mb-2 text-gray-800">Lista operacji księgowych</h1>
    <p class="mb-4">
        Jeżeli chcesz dowiedzieć się więcej na temat operacji księgowych, zobacz
        <a target="_blank" href="#">dokumentację</a>.
    </p>

    <a href="{{ url('/admin/operation/create') }}" class="btn btn-success btn-icon-split mb-4">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Dodaj operację</span>
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Operacje księgowe</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nazwa</th>
                        <th>Kwota</th>
                        <th>Zaksięgowano</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operations as $operation)
                        <tr>
                            <td>{{ $operation->name }}</td>
                            <td>{{ $operation->amount }} PLN</td>
                            <td>{{ $operation->created_at }}</td>
                            <td>
                                <a class="btn btn-info btn-circle" href="{{ url('/admin/operation/' . $operation->id) }}">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
                                <form class="d-inline" action="{{ url('/admin/operation/' . $operation->id)}}" method="post">
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
