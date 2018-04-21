@extends('layouts.dashboard')
@section('main')

    <div class="container">

        <h2>Administradores</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Administradores cadastrados</h3>
                    </div>

                    <div class="panel-body">

                        <form action="{{ route('administrator.search') }}" method="get">

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
                                <th>Nome</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th style="width: 160px;">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($administrators->count() > 0)
                                @foreach($administrators as $administrator)
                            <tr>
                                <td>{{ $administrator->id }}</td>
                                <td>{{ $administrator->name }}</td>
                                <td>{{ $administrator->username }}</td>
                                <td>{{ $administrator->email }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" title="Editar" href="{{ route('administrator.edit', $administrator->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <a class="btn btn-danger btn-xs" title="Apagar" data-toggle="modal" data-target="#myModal_{{ $administrator->id }}"><span class="glyphicon glyphicon-trash"></span> Excluir</a>

                                    <div id="myModal_{{ $administrator->id }}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_{{ $administrator->id }}" aria-hidden="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel_{{ $administrator->id }}">Confirmação de exclusão</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que deseja remover esse registro? Essa operação não poderá ser desfeita. Proceda com cautela</p>
                                                </div>
                                                <div class="modal-footer">

                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['administrator.destroy', $administrator->id]]) }}
                                                    {{ Form::hidden('id', $administrator->id) }}
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
                        @if($administrators->count() > 0)
                        {{ $administrators->links() }}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
