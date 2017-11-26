<div class="col-md-12">

    <div class="row">

        <div class="form-group">
            <label for="type" class="col-sm-3 control-label">Tipo de movimentação <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::select('type', $type, null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="chart_of_account_id" class="col-sm-3 control-label">Plano de contas <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::select('chart_of_account_id', $chartOfAccount, null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="value" class="col-sm-3 control-label">Valor <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::number('value', null, ['class' => 'form-control', 'min' => 0, 'step' => '0.01']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="transaction_date" class="col-sm-3 control-label">Data da movimentação <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::date('transaction_date', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Descrição</label>
            <div class="col-sm-6">
                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
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
