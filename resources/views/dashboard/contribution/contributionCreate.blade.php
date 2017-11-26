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

                        @include('partial.alerts')

                        {!! Form::open(['route' => ['contribution.store', $customer->id], 'name' => 'contribution', 'id' => 'contribution', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="paymentDate">Data do pagamento:</label>
                                    {!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="value">Valor pago:</label>
                                    {!! Form::number('value', null, ['class' => 'form-control', 'min' => 0, 'step' => '0.01']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="month">Mês (Referência):</label>
                                    {!! Form::select('month', $months, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="year">Ano (Referência):</label>
                                    {!! Form::number('year', null, ['class' => 'form-control', 'min' => '2017']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="receivedBy">Recebido por</label>
                                    {!! Form::text('received_by', null, ['class' => 'form-control']) !!}
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <input class="btn btn-success" type="submit" value="Cadastrar">
                                </div>

                            </div>

                        {!! Form::close() !!}

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

                        <table class="table table-bordered table-striped nomargin_botton">

                            <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Referente ao mês</th>
                                <th>Recebido por</th>
                                <th style="width: 90px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($contributions->count() > 0)
                                @foreach($contributions as $contribution)
                            <tr>
                                <td>{!! $contribution->id !!}</td>
                                <td>{!! $contribution->payment_date->format('d/m/Y') !!}</td>
                                <td>R$ {!! number_format($contribution->value, 2, ',', '.') !!}</td>
                                <td>{!! $months[$contribution->month] !!} / {!! $contribution->year !!}</td>
                                <td>{!! $contribution->received_by !!}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" title="Apagar" data-toggle="modal" data-target="#myModal_{!! $customer->id !!}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>

                                    <div id="myModal_{!! $customer->id !!}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{!! $customer->id !!}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{!! $customer->id !!}">Confirmação de exclusão</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja remover esse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['contribution.destroy', $contribution->id]]) }}
                                                    {{ Form::hidden('id', $contribution->id) }}
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
                            @else
                            <tr>
                                <td colspan="5">
                                    <span style="color: red;">Ainda não há registros de contribuições para esse praticante!</span>
                                </td>
                            </tr>
                            @endif
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
