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
                        <h3 class="panel-title">Filtro de resultados</h3>
                    </div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'report.customer.search', 'method' => 'get']) !!}

                            <div class="col-md- 12">

                                <div class="row">

                                    <div class="col-md-2 form-group">
                                        <label for="idade">Idade</label>
                                        {!! Form::number('idade', request()->get('idade'), ['class' => 'form-control', 'id' => 'idade']) !!}
                                    </div>

                                    <div class="col-md-2 form-group">
                                        <label for="sexo">Sexo</label>
                                        {!! Form::select('sexo', $gender, request()->get('sexo'), ['class' => 'form-control', 'id' => 'sexo']) !!}
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="dia_pratica">Dia da prática</label>
                                        {!! Form::select('dia_pratica', $weekdays, request()->get('dia_pratica'), ['class' => 'form-control', 'id' => 'dia_pratica']) !!}
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="local_atividade">Local da atividade</label>
                                        {!! Form::select('local_atividade', $activityLocation, request()->get('local_atividade'), ['class' => 'form-control', 'id' => 'local_atividade']) !!}
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <button type="submit" class="btn btn-primary" id="filtrar" name="filtrar">
                                            <span class="glyphicon glyphicon-floppy-disk"></span> Filtrar
                                        </button>

                                    </div>

                                </div>

                            </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">

                @if(isset($customersCollection) && $customersCollection->count() > 0)
                    <table class="table table-bordered table-striped nomargin_botton">

                        <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th>Registro</th>
                            <th>Cliente</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($customersCollection as $customer)
                            <tr>
                                <td>{!! $customer->id !!}</td>
                                <td>{!! $customer->code !!}</td>
                                <td>{!! $customer->name !!}</td>
                                <td>{!! $customer->email !!}</td>
                                <td>{!! (!empty($customer->phone) ? $customer->phone : $customer->main_mobile) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                @endif

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="text-center">

                    <ul class="pagination">
                        @if(isset($customersCollection) && $customersCollection->count() > 0)
                        {!! $customersCollection->appends(request()->all())->links() !!}
                        @endif
                    </ul>

                </div>

            </div>
        </div>


    </div>

@endsection
