{!! Form::open(array('action' => 'TipoBonoManagementController@store', 'method' => 'POST', 'role' => 'form')) !!}
	{!! csrf_field() !!}

	<div class="form-group has-feedback">
		{!! Form::label('tipo', 'Tipo' , array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
		<div class="input-group">
        	{!! Form::text('tipo', NULL, array('id' => 'tipo', 'class' => 'form-control', 'placeholder' => 'Tipo')) !!}
			<label class="input-group-addon" for="tipo"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
		</div>
	</div>

	<div class="form-group has-feedback">
		{!! Form::label('descripcion', 'Descripcion', array('class' => 'col-md-3 control-label margin-bottom-half')); !!}
      	<div class="input-group">
        	{!! Form::text('descripcion', NULL, array('id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Descripcion')) !!}
        	<label class="input-group-addon" for="descripcion"><i class="fa fa-fw {{ Lang::get('forms.create_user_icon_lastname') }}" aria-hidden="true"></i></label>
      	</div>
	</div>


	{!! Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . ' Create new tipo bono', array('class' => 'btn btn-primary btn-flat btn-lg margin-bottom-1 col-md-offset-3','type' => 'submit')) !!}
</div>

{!! Form::close() !!}