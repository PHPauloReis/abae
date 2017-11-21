<!doctype html>
<html lang="pt-br">
<head>
    <base href="{!! URL::to('/') !!}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABAE SYSTEM 1.0</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/datepicker/css/datepicker3.css">
    <link href="assets/bootstrap/css/bootstrap_edit.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/admin.css">

    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="assets/select2/select2.css">-->

    <link rel="stylesheet" href="assets/bootstrapvalidator/css/bootstrapValidator.min.css">

    <link rel="stylesheet" href="assets/fancybox-3.0/dist/jquery.fancybox.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/bootstrapvalidator/js/bootstrapValidator.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/datepicker/js/locales/bootstrap-datepicker.pt-BR.js"></script>

    <!-- Select2 -->
    <!-- <script type="text/javascript" src="assets/select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/select2/select2_locale_pt-BR.js"></script> -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

    <link rel="stylesheet" href="assets/select2-bootstrap.min.css">

    <script type="text/javascript" src="assets/js/jquery.price_format.2.0.min.js"></script>

    <script type="text/javascript" src="assets/tinymce/js/tinymce/tinymce.min.js"></script>

    <script type="text/javascript" src="assets/fancybox-3.0/dist/jquery.fancybox.min.js"></script>

    <script type="text/javascript">

        $.fn.select2.defaults.set( "theme", "bootstrap" );

        tinymce.init({
            selector: '.tinymce',
            language: "pt_BR",
            height: 250,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Roboto:400,700',
                '/assets/css/word.css'
            ]
        });

    </script>

    <!-- /TinyMCE -->

    <script type="text/javascript">

        $(document).ready(function() {

            $(".date").mask("99-99-9999");
            $(".hour").mask("99:99");
            $(".tel").mask("(99) 9999-9999?9");
            $(".cpf").mask("999.999.999-99");
            $(".cep").mask("99999-999");

            $(".select2").select2({

                allowClear: true,
                minimumInputLength: 2

            });

            $(".valor").priceFormat({
                prefix: '',
                thousandsSeparator: ''
            });

            $(".percentual").priceFormat({

                prefix: '',
                thousandsSeparator: '',
                centsLimit: 1
            });

            $('.datepicker').datepicker({
                format: "dd-mm-yyyy",
                language: "pt-BR",
                autoclose: true
            });

        });

    </script>

    <style media="screen">

        .products_select .select2-container, .select2-container--bootstrap {
            width: 100% !important;
        }

        .select2 .select2-selection {
            border: 2px solid #dce4ec;
            color: #2c3e50;
            height: 43px;
            width: 100% !important;
            font-size: 16px !important;
            font-family: "Roboto","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
            padding: 10px 15px;
        }

    </style>

</head>
<body>

<div class="navbar navbar-default">

    <div class="container">

        <div class="navbar-header">

            <a class="navbar-brand">ABAE System 1.0</a>

            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="navbar-collapse collapse" id="navbar-main">


            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">
                        <span class="glyphicon glyphicon-user"></span> Praticantes
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="{!! route('customer.create') !!}">Cadastrar praticante</a></li>
                        <li class="divider"></li>
                        <li><a href="{!! route('customer.index') !!}">Praticantes ativos</a></li>
                        <li><a href="{!! route('customer.downed') !!}">Praticantes baixados</a></li>


                    </ul>
                </li>
                <li><a href="{!! route('contribution.list.customers') !!}"><span class="glyphicon glyphicon-usd"></span> Constribuições</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">
                        <span class="glyphicon glyphicon-inbox"></span> Caixa
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="{!! route('customer.create') !!}">Cadastrar cliente</a></li>
                        <li><a href="{!! route('customer.index') !!}">Clientes cadastrados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">
                        <span class="glyphicon glyphicon-list-alt"></span> Relatórios
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="{!! route('customer.create') !!}">Cadastrar cliente</a></li>
                        <li><a href="{!! route('customer.index') !!}">Clientes cadastrados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">
                        <span class="glyphicon glyphicon-cog"></span> Configurações
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="{!! route('dashboard.administrator.editPassword') !!}">Atualizar minha senha</a></li>
                        @if(auth()->user()->access_level == 9)
                        <li><a href="{!! route('administrator.create') !!}">Novo administrador</a></li>
                        <li><a href="{!! route('administrator.index') !!}">Administradores cadastrados</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Sair (Logout)
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                    </ul>
                </li>

            </ul>

        </div>

    </div>

</div>

<!--
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="pull-right text-right">
                Seja bem-vindo: <strong>{!! Auth::user()->name !!}</strong><br>
                <span style="color: #CCCCCC;">{!! Auth::user()->email !!}</span>
            </p>
        </div>
    </div>
</div>
-->

@yield('main')

</body>
</html>
