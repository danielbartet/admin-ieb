{!! Form::open(array('action' => 'CalculadorasManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}
	{!! csrf_field() !!}

	<div class="form-group has-feedback">
		{!! Form::label('tipo', 'Tipo' , array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
		<div class="input-group">
        	{!! Form::select('tipo', $tipos, NULL, array('class' => 'form-control')) !!}
			<label class="input-group-addon" for="tipo"><i class="fa fa-fw fa-exclamation-circle" aria-hidden="true"></i></label>
		</div>
	</div>

	<div class="form-group has-feedback" id="tipo_bono_wrapper" style="display: none">
		{!! Form::label('tipo_bono', 'Tipo Bono' , array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
		<div class="input-group">
        	{!! Form::select('tipo_bono', $tipos_bonos, NULL, array('class' => 'form-control')) !!}
			<label class="input-group-addon" for="tipo"><i class="fa fa-fw fa-exclamation-circle" aria-hidden="true"></i></label>
		</div>
	</div>

	<div class="form-group has-feedback">
		{!! Form::label('valor', 'Ingrese Valor', array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
      	<div class="input-group">
        	{!! Form::text('valor', NULL, array('id' => 'valor', 'class' => 'form-control', 'placeholder' => 'valor')) !!}
        	<label class="input-group-addon" for="valor"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_firstname') }}" aria-hidden="true"></i></label>
      	</div>
	</div>

	<div class="form-group has-feedback">
		{!! Form::label('descripcion', 'Descripcion', array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
      	<div class="input-group">
        	{!! Form::text('descripcion', NULL, array('id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'descripcion')) !!}
        	<label class="input-group-addon" for="descripcion"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
      	</div>
	</div>


	{!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . ' Create new variable', array('class' => 'btn btn-primary btn-flat btn-lg margin-bottom-1 col-md-offset-3','type' => 'submit')) !!}
</div>

{!! Form::close() !!}