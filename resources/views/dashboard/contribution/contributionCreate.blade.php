@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Contribuições</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Cadatrar contribuição</h3>
                    </div>

                    <div class="panel-body">

                        <form action="{!! route('contribution.searchCustomersWithContribution') !!}" method="get">

                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="keywordCode">Registro do praticante</label>
                                    <input type="text" class="form-control" placeholder="Registro do praticante" name="keywordCode" value="{{ Request::get('keywordCode') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="keywordName">Nome do praticante</label>
                                    <input type="text" class="form-control" placeholder="Nome do praticante" name="keywordName" value="{{ Request::get('keywordName') }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="paymentDate">Data do pagamento:</label>
                                    <input type="date" class="form-control" name="paymentDate" value="{{ Request::get('paymentDate') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="value">Valor pago:</label>
                                    <input type="text" class="form-control valor" name="value" value="{{ Request::get('value') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="month">Mês (Referência):</label>
                                    <select class="form-control" name="month">
                                        <option>---</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="year">Ano (Referência):</label>
                                    <select class="form-control" name="month">
                                        <option>---</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="receivedBy">Recebido por</label>
                                    <input type="text" class="form-control" placeholder="Responsável pelo recebimento" name="receivedBy" value="{{ Request::get('receivedBy') }}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <input class="btn btn-success" type="submit" value="Cadastrar">
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
                        <h3 class="panel-title">Histórico de constribuições</h3>
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
                                <th style="width: 90px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($contributions->count() > 0)
                                @foreach($contributions as $contribution)
                            <tr>
                                <td>{!! $contribution->id !!}</td>
                                <td>{!! $contribution->code !!}</td>
                                <td>{!! $contribution->name !!}</td>
                                <td>{!! $contribution->email !!}</td>
                                <td>{!! (!empty($contribution->phone) ? $contribution->phone : $contribution->main_mobile) !!}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" title="Pagamentos" href="{!! route('contribution.destroy', $contribution->id) !!}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>
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

    </div>

@endsection
