{!! Form::model($tipo, array('action' => array('TipoVariablesManagementController@update', $tipo->id), 'method' => 'PUT')) !!}

	{!! csrf_field() !!}
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Edit Tipo Variable Information</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body">

			@include('admin.partials.return-messages')

			<div class="form-group has-feedback">
				{!! Form::label('tipo', 'tipo' , array('class' => 'col-lg-3 control-label margin-bottom-half')); !!}
				<div class="col-lg-9">
	              	<div class="input-group">
	                	{!! Form::text('tipo', old('tipo'), array('id' => 'tipo', 'class' => 'form-control', 'placeholder' => 'Tipo')) !!}
	                	<label class="input-group-addon" for="tipo"><i class="fa fa-fw {{ Lang::get('forms.username-icon') }}" aria-hidden="true"></i></label>
	              	</div>
				</div>
			</div>
			<div class="form-group has-feedback">
				{!! Form::label('descripcion', Lang::get('forms.label-descripcion') , array('class' => 'col-lg-3 control-label margin-bottom-half')); !!}
				<div class="col-lg-9">
	              	<div class="input-group">
	                	{!! Form::text('descripcion', old('descripcion'), array('id' => 'descripcion', 'class' => 'form-control', 'placeholder' => Lang::get('forms.ph-descripcion'))) !!}
	                	<label class="input-group-addon" for="descripcion"><i class="fa fa-fw {{ Lang::get('forms.username-icon') }} " aria-hidden="true"></i></label>
	              	</div>
				</div>
			</div>

		</div>

		<div class="box-footer">
			{!! Form::button('<i class="fa fa-fw '.Lang::get('forms.submit-btn-icon').'" aria-hidden="true"></i> '.Lang::get('forms.submit-btn-text-variable'), array('class' => 'btn btn-primary btn-lg btn-block margin-bottom-1','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => Lang::get('profile.edit_user__modal_text_confirm_btn'), 'data-message' => Lang::get('profile.edit_user__modal_text_confirm_message'))) !!}
		</div>

	</div>

{!! Form::close() !!}