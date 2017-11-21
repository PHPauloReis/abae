@if(Session::has('success'))
    <div class="alert alert-success">
        <strong>Sucesso!</strong><br>
        {!! Session::get('success') !!}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert"></button>
        <strong>Erros!</strong><br>
        {!! Session::get('error') !!}
    </div>
@endif

@if(Session::has('errors'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert"></button>
        <strong>Erros!</strong><br>
        <ul>
            @foreach(Session::get('errors')->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif