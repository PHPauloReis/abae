@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Plano de contas</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Contas cadastradas</h3>
                    </div>

                    <div class="panel-body">

                        <form action="{!! route('chart_of_account.search') !!}" method="get">

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
                                <th>Título</th>
                                <th>Descrição</th>
                                <th style="width: 160px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($chartOfAccount->count() > 0)
                                @foreach($chartOfAccount as $item)
                            <tr>
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->title !!}</td>
                                <td>{!! str_limit($item->description, 60) !!}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" title="Editar" href="{!! route('chart_of_account.edit', $item->id) !!}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <a class="btn btn-danger btn-xs" title="Apagar" data-toggle="modal" data-target="#myModal_{!! $item->id !!}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>

                                    <div id="myModal_{!! $item->id !!}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{!! $item->id !!}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{!! $item->id !!}">Confirmação de exclusão</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja remover esse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['chart_of_account.destroy', $item->id]]) }}
                                                    {{ Form::hidden('id', $item->id) }}
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
                        @if($chartOfAccount->count() > 0)
                            {!! $chartOfAccount->appends(request()->all())->links() !!}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
