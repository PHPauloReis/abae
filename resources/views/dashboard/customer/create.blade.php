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
                        <h3 class="panel-title">Cadastrar praticante</h3>
                    </div>

                    <div class="panel-body">

                        @include('partial.alerts')

                        {!! Form::open(['route' => 'customer.store', 'class' => 'form-horizontal', 'name' => 'customer', 'id' => 'customer', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @include('dashboard.customer.partial.form')
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
