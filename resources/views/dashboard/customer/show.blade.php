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
                        <h3 class="panel-title">Dados do praticante</h3>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="250">Registro</td>
                                    <td>{{ $customer->code }}</td>
                                </tr>
                                <tr>
                                    <td>Baixado</td>
                                    <td>{{ ($customer->active) ? '<code>Não</code>' : '<code>Sim</code>' }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Idade</td>
                                    <td>{{ $customer->age }} anos</td>
                                </tr>
                                <tr>
                                    <td>Sexo</td>
                                    <td>{{ ($customer->gender == 'M') ? 'Masculino' : 'Feminino' }}</td>
                                </tr>
                                <tr>
                                    <td>Nome da mãe</td>
                                    <td>{{ $customer->mothers_name }}</td>
                                </tr>
                                <tr>
                                    <td>Nome do pai</td>
                                    <td>{{ $customer->fathers_name }}</td>
                                </tr>
                                <tr>
                                    <td>Endereço</td>
                                    <td>{{ $customer->address }}</td>
                                </tr>
                                <tr>
                                    <td>Bairro</td>
                                    <td>{{ $customer->district }}</td>
                                </tr>
                                <tr>
                                    <td>CEP</td>
                                    <td>{{ $customer->zipcode }}</td>
                                </tr>
                                <tr>
                                    <td>Telefone</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Celular</td>
                                    <td>{{ $customer->main_mobile }}</td>
                                </tr>
                                <tr>
                                    <td>Celular secundário</td>
                                    <td>{{ $customer->secondary_mobile }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnóstico</td>
                                    <td>{{ $customer->diagnosis }}</td>
                                </tr>
                                <tr>
                                    <td>Dia da prática</td>
                                    <td><code>{{ $weekdays[$customer->practice_day] }}</code></td>
                                </tr>
                                <tr>
                                    <td>Local da atividade</td>
                                    <td><code>{{ $activityLocations[$customer->activity_location] }}</code></td>
                                </tr>
                                <tr>
                                    <td>Valor da contribuição</td>
                                    <td><code>R$ {{ number_format($customer->contribution_value, 2, ',', '.') }}</code></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
