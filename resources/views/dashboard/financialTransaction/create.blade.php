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
                        <h3 class="panel-title">Cadastrar conta</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {{ Form::open(['route' => 'financial_transaction.store', 'class' => 'form-horizontal', 'name' => 'financial_transaction', 'id' => 'financial_transaction', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                            @include('dashboard.financialTransaction.partial.form')
                        {{ Form::close() }}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
