@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Praticantes</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Praticantes cadastrados</h3>
                    </div>

                    <div class="panel-body">

                        <form action="{{ route('customer.search') }}" method="get">
                            
                            <div class="input-group container_busca">
                                <input type="text" class="form-control" placeholder="O que você procura?" name="keywords" value="{{ Request::get('keywords') }}">
                                <span class="input-group-btn">
							        <input class="btn btn-success" type="submit" value="Localizar">
						        </span>
                            </div>

                        </form>

                        @include('partial.alerts')

                        <table class="table table-bordered table-striped nomargin_botton">

                            <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Registro</th>
                                <th>Cliente</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th style="width: 275px;">&nbsp;</th>
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
                                    <a class="btn btn-info btn-xs" title="Ver" href="{{ route('customer.show', $customer->id) }}"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                    <a class="btn btn-default btn-xs" title="Editar" href="{{ route('customer.edit', $customer->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <a class="btn btn-warning btn-xs" title="Baixar" data-toggle="modal" data-target="#myModalBaixa_{{ $customer->id }}"><span class="glyphicon glyphicon-download-alt"></span> Baixar</a>
                                    <a class="btn btn-danger btn-xs" title="Apagar" data-toggle="modal" data-target="#myModal_{{ $customer->id }}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>

                                    <div id="myModal_{{ $customer->id }}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{{ $customer->id }}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{{ $customer->id }}">Confirmação de exclusão</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja remover esse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $customer->id]]) }}
                                                    {{ Form::hidden('id', $customer->id) }}
                                                    {{ Form::submit('Sim, desejo prosseguir', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::submit('Cancelar', ['class' => 'btn btn-primary', 'data-dismiss' => 'modal']) }}
                                                    {{ Form::close() }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="myModalBaixa_{{ $customer->id }}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalBaixaLabel_{{ $customer->id }}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{{ $customer->id }}">Confirmação de baixa</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja realizar a baixa desse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'PATCH', 'route' => ['customer.down', $customer->id]]) }}
                                                    {{ Form::hidden('id', $customer->id) }}
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
                        @if($customers->count() > 0)
                        {{ $customers->appends(request()->all())->links() }}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
