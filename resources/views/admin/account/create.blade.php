@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mb-4">Dodaj konto księgowe</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dodawanie konta księgowego</h6>
        </div>

        <div class="card-body">
            <form id="account-create-form" action="{{ url('/admin/account') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-form-label col-sm-3 font-weight-bold">
                        Nazwa konta:
                    </label>
                    <input id="inputName" class="form-control col-sm-8" type="text" name="name" required="required">
                </div>

                <div class="form-group row">
                    <label for="inputSymbol" class="col-form-label col-sm-3 font-weight-bold">
                        Symbol konta:
                    </label>
                    <input
                        id="inputSymbol"
                        class="form-control col-sm-8"
                        type="number"
                        min="1"
                        name="symbol"
                        placeholder="Unikalny symbol konta"
                        required="required">
                </div>

                <div class="form-group row">
                    <label for="inputState" class="col-form-label col-sm-3 font-weight-bold">
                        Bilans otwarcia: (PLN)
                    </label>
                    <input
                        id="inputState"
                        class="form-control col-sm-8"
                        type="number"
                        step="0.01"
                        name="state"
                        min="0"
                        placeholder="Stan wyniesie 0 PLN jeżeli pole zostanie puste">
                </div>

                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <button class="btn btn-primary col-sm-3" type="submit">
                        Zatwierdź
                    </button>
                    <div id="info-box" class="col-sm-3 alert alert-warning d-none"></div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('#inputSymbol').on('input', function (e) {
            $.ajax({
                url: "{{ route('account.validateSymbol') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    symbol: $('#inputSymbol').val()
                },
                success: function (data) {
                    $('#info-box').removeClass('d-none');
                    $('#info-box').html(data);
                }
            });
        });
    </script>
@endsection
