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
                        <h3 class="panel-title">Cadastrar plano de conta</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {!! Form::open(['route' => 'chart_of_account.store', 'class' => 'form-horizontal', 'name' => 'chart_of_account', 'id' => 'chart_of_account', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @include('dashboard.chartOfAccount.partial.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
