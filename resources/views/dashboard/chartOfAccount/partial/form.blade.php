<div class="col-md-12">

    <div class="row">

        <div class="form-group">
            <label for="title" class="col-sm-3 control-label">Título <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'name' => 'title', 'placeholder' => 'Ex.: Conta de Telefone']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Descrição <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'name' => 'description', 'rows' => '4']) !!}
            </div>
        </div>

    </div>

    <div class="row">

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary" id="gravar_cliente" name="gravar_cliente">
                    <span class="glyphicon glyphicon-floppy-disk"></span> Gravar dados
                </button>
            </div>
        </div>

    </div>

</div>
