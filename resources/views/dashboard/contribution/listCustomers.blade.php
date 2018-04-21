@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Praticantes com contribuições</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Buscar</h3>
                    </div>

                    <div class="panel-body">

                        <form action="{{ route('contribution.searchCustomersWithContribution') }}" method="get">

                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="keywordCode">Registro do praticante</label>
                                    <input type="text" class="form-control" placeholder="Código" name="keywordCode" value="{{ Request::get('keywordCode') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="keywordName">Nome do praticante</label>
                                    <input type="text" class="form-control" placeholder="Nome completo ou parcial" name="keywordName" value="{{ Request::get('keywordName') }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="keywordDateFrom">Data (de):</label>
                                    <input type="date" class="form-control" name="keywordDateFrom" value="{{ Request::get('keywordDateFrom') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="keywordDateTo">Data (até):</label>
                                    <input type="date" class="form-control" name="keywordDateTo" value="{{ Request::get('keywordDateTo') }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <input class="btn btn-success" type="submit" value="Localizar">

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Praticantes cadastrados</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        <table class="table table-bordered table-striped nomargin_botton">

                            <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Registro</th>
                                <th>Cliente</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th style="width: 130px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($customers->count() > 0)
                                @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->code }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ (!empty($customer->phone) ? $customer->phone : $customer->main_mobile) }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" title="Pagamentos" href="{{ route('contribution.create', $customer->id) }}"><span class="glyphicon glyphicon-usd"></span> Pagamentos</a>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="text-center">

                    <ul class="pagination">
                        @if($customers->count() > 0)
                        {{ $customers->links() }}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
