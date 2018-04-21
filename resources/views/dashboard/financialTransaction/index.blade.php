@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Fluxo de caixa</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Contas cadastradas</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        <table class="table table-bordered table-striped nomargin_botton">

                            <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Movimentação</th>
                                <th style="width: 160px;">Valor</th>
                                <th style="width: 170px;">Data de pagamento</th>
                                <th style="width: 160px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($financialTransactions->count() > 0)
                                @foreach($financialTransactions as $financialTransaction)
                            <tr>
                                <td>{{ $financialTransaction->id }}</td>
                                <td>{{ $financialTransaction->chartOfAccount->title }}</td>
                                <td>R$ {{ number_format($financialTransaction->value, 2, ',', '.') }}</td>
                                <td>{{ $financialTransaction->transaction_date_formated }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" title="Editar" href="{{ route('financial_transaction.edit', $financialTransaction->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <a class="btn btn-danger btn-xs" title="Apagar" data-toggle="modal" data-target="#myModal_{{ $financialTransaction->id }}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>

                                    <div id="myModal_{{ $financialTransaction->id }}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{{ $financialTransaction->id }}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{{ $financialTransaction->id }}">Confirmação de exclusão</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja remover esse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['financial_transaction.destroy', $financialTransaction->id]]) }}
                                                    {{ Form::hidden('id', $financialTransaction->id) }}
                                                    {{ Form::submit('Sim, desejo prosseguir', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::submit('Cancelar', ['class' => 'btn btn-primary', 'data-dismiss' => 'modal']) }}
                                                    {{ Form::close() }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                        @if($financialTransactions->count() > 0)
                            {{ $financialTransactions->appends(request()->all())->links() }}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
