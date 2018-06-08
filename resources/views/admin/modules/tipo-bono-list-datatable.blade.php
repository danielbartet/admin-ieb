<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{$total_tipos}}
			@if ($total_tipos > 2)
				Tipos de Bonos
			@else
				Tipo de Bonos
			@endif
        </h3>

        <div class="box-tools pull-right">
            {!! Form::button('<i class="fa fa-minus"></i>', array('class' => 'btn btn-box-tool','title' => 'Collapse', 'data-widget' => 'collapse', 'data-toggle' => 'tooltip')) !!}
            {!! Form::button('<i class="fa fa-times"></i>', array('class' => 'btn btn-box-tool','title' => 'close', 'data-widget' => 'remove', 'data-toggle' => 'tooltip')) !!}
        </div>
    </div>
	<div class="box-body table-responsive">

		<table id="tipo_bono_table" class="table table-striped table-hover table-condensed">
			<thead>
				<tr class="success">
					<th>Tipo</th>
					<th>Descripcion</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		        @foreach ($tipos as $tipo)
					@if ($tipo->id <> 2)
						<tr>
							<td>{{$tipo->tipo}} </td>
							<td>{{$tipo->descripcion}} </td>
							<td width="10%"><a class="btn btn-info btn-block btn-flat" href="{{ URL::to('calculadoras/' . $tipo->id . '/edit') }}">Edit this Tipo Bono</a></td>
							<td width="10%">
							{!! Form::open(array('url' => 'tipo_bono/' . $tipo->id, 'class' => 'pull-right')) !!}
								{!! Form::hidden('_method', 'DELETE') !!}
								{!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete this Tipo Bono', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Tipo Bono', 'data-message' => 'Are you sure you want to delete this Tipo Bono ?')) !!}
							{!! Form::close() !!}
							</td>
						</tr>
					@endif
		        @endforeach
			</tbody>
		</table>

	</div>
</div>