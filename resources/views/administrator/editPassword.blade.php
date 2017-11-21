@extends($template)
@section('main')
    <div class="container">

        <h2>Administrador</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Atualizar senha de acesso</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {!! Form::model($administrator, ['route' => [$route], 'class' => 'form-horizontal', 'name' => 'cadastro_texto', 'id' => 'cadastro_texto', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <label for="old_password">Senha antiga</label>
                                    {!! Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password', 'placeholder' => '******']) !!}
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <label for="password">Nova senha</label>
                                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => '******']) !!}
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="password_confirmation">Confirme sua nova senha</label>
                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => '******']) !!}
                                </div>

                            </div>

                            <div class="row">

                                <button type="submit" class="btn btn-primary" id="gravar_cliente" name="gravar_cliente">
                                    <span class="glyphicon glyphicon-floppy-disk"></span> Gravar dados
                                </button>

                            </div>

                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
