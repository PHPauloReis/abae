<div class="col-md-12">

    <div class="row">

        {!! Form::hidden('code', str_random(6), ['id' => 'code', 'name' => 'code']) !!}

        <!--
        <div class="form-group">
            <label for="code" class="col-sm-3 control-label">Cliente <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::text('code', str_random(6), ['class' => 'form-control', 'id' => 'code', 'name' => 'code']) !!}
            </div>
        </div>
        -->

        <div class="form-group">
            <label for="date_of_birth" class="col-sm-3 control-label">Data de nascimento <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::date('date_of_birth', null, ['class' => 'form-control', 'id' => 'date_of_birth', 'name' => 'date_of_birth']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Cliente <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'placeholder' => 'Nome do praticante']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">Sexo <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::select('gender', ['' => '---', 'm' => 'Masculino', 'f' => 'Feminino'], null, ['class' => 'form-control', 'id' => 'gender', 'name' => 'gender']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="mothers_name" class="col-sm-3 control-label">Nome da mãe <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::text('mothers_name', null, ['class' => 'form-control', 'id' => 'mothers_name', 'name' => 'mothers_name', 'placeholder' => 'Nome da mãe do participante']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="fathers_name" class="col-sm-3 control-label">Nome do pai <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::text('fathers_name', null, ['class' => 'form-control', 'id' => 'fathers_name', 'name' => 'fathers_name', 'placeholder' => 'Nome do pai do participante']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Endereço <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editor', 'placeholder' => 'Nome da rua, número, quadra, etc...']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="district" class="col-sm-3 control-label">Bairro <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::text('district', null, ['class' => 'form-control', 'id' => 'district', 'name' => 'district', 'placeholder' => 'E-mail principal']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="zipcode" class="col-sm-3 control-label">CEP <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::text('zipcode', null, ['class' => 'form-control cep', 'id' => 'zipcode', 'name' => 'zipcode', 'placeholder' => 'XXXXX-XXX']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Telefone</label>
            <div class="col-sm-3">
                {!! Form::text('phone', null, ['class' => 'form-control tel', 'id' => 'phone', 'name' => 'phone', 'placeholder' => 'Telefone principal da empresa']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="main_mobile" class="col-sm-3 control-label">Celular <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::text('main_mobile', null, ['class' => 'form-control tel', 'id' => 'main_mobile', 'name' => 'main_mobile', 'placeholder' => 'Telefone principal da empresa']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="secondary_mobile" class="col-sm-3 control-label">Celular secundário</label>
            <div class="col-sm-3">
                {!! Form::text('secondary_mobile', null, ['class' => 'form-control tel', 'id' => 'secondary_mobile', 'name' => 'secondary_mobile', 'placeholder' => 'Telefone secundário da empresa']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">E-mail</label>
            <div class="col-sm-6">
                {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'E-mail']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="diagnosis" class="col-sm-3 control-label">Diagnóstico clínico funcional <span class="red-text">*</span></label>
            <div class="col-sm-6">
                {!! Form::textarea('diagnosis', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'editor', 'placeholder' => 'Veredito do acompanhente clínico']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="practice_day" class="col-sm-3 control-label">Dia da prática <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::select('practice_day', $weekdays, null, ['class' => 'form-control', 'id' => 'practice_day']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="activity_location" class="col-sm-3 control-label">Local da atividade <span class="red-text">*</span></label>
            <div class="col-sm-3">
                {!! Form::select('activity_location', $activityLocation, null, ['class' => 'form-control', 'id' => 'activity_location']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="contribution_value" class="col-sm-3 control-label">Valor da contribuição</label>
            <div class="col-sm-3">
                {!! Form::number('contribution_value', null, ['class' => 'form-control', 'min' => 0, 'step' => '0.01', 'placeholder' => 'Valor da contribuição']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="indicated_by" class="col-sm-3 control-label">Indicação de</label>
            <div class="col-sm-6">
                {!! Form::text('indicated_by', null, ['class' => 'form-control', 'id' => 'indicated_by', 'name' => 'indicated_by', 'placeholder' => 'Nome do responsável pela indicação']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="social_worker" class="col-sm-3 control-label">Assistente social</label>
            <div class="col-sm-6">
                {!! Form::text('social_worker', null, ['class' => 'form-control', 'id' => 'social_worker', 'name' => 'social_worker', 'placeholder' => 'Nome do(a) Assistente social']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="discharge_date" class="col-sm-3 control-label">Data da alta</label>
            <div class="col-sm-3">
                {!! Form::date('discharge_date', null, ['class' => 'form-control', 'id' => 'discharge_date', 'name' => 'discharge_date']) !!}
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
