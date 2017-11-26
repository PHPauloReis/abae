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
                        <h3 class="panel-title">Atualizar conta</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {!! Form::model($financialTransaction, ['route' => ['financial_transaction.update', $financialTransaction->id], 'class' => 'form-horizontal', 'name' => 'financialTransaction', 'id' => 'financialTransaction', 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                        @include('dashboard.financialTransaction.partial.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
