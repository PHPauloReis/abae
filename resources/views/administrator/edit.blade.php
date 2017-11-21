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
                        <h3 class="panel-title">Atualizar administrador</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {!! Form::model($administrator, ['route' => ['administrator.update', $administrator->id], 'class' => 'form-horizontal', 'name' => 'administrator', 'id' => 'administrator', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

                        <div class="col-md-12">

                            <div class="row">

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nome <span class="red-text">*</span></label>
                                    <div class="col-sm-6">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nome do administrador']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">E-mail <span class="red-text">*</span></label>
                                    <div class="col-sm-6">
                                        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'E-mail principal']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label">Username <span class="red-text">*</span></label>
                                    <div class="col-sm-4">
                                        {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Ex.: mariarita']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="access_level" class="col-sm-3 control-label">Nível de acesso <span class="red-text">*</span></label>
                                    <div class="col-sm-4">
                                        {!! Form::select('access_level', $userRoles, null, ['class' => 'form-control', 'id' => 'access_level']) !!}
                                    </div>
                                </div>

                                <div class="alert">
                                    <strong>Aviso:</strong> Informe uma senha apenas se você quiser atualizar a senha do usuário.
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">Senha <span class="red-text">*</span></label>
                                    <div class="col-sm-4">
                                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => '******']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="col-sm-3 control-label">Confirme sua senha <span class="red-text">*</span></label>
                                    <div class="col-sm-4">
                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => '******']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="gravar_cliente" name="gravar_cliente">
                                            <span class="glyphicon glyphicon-floppy-disk"></span> Gravar dados
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
