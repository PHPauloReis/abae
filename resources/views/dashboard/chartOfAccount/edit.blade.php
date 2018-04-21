@extends('layouts.dashboard')
@section('main')
    <div class="container">

        <h2>PLano de contas</h2>
        <hr>

        <!-- Conteudo central -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Atualizar plano de conta</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {{ Form::model($chartOfAccount, ['route' => ['chart_of_account.update', $chartOfAccount->id], 'class' => 'form-horizontal', 'name' => 'chart_of_account', 'id' => 'chart_of_account', 'method' => 'put', 'enctype' => 'multipart/form-data']) }}
                        @include('dashboard.chartOfAccount.partial.form')
                        {{ Form::close() }}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
