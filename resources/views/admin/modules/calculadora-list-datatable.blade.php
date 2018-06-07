<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{$total_variables}}
			@if ($total_variables > 2)
				Variables
			@else
				Variable
			@endif
        </h3>

        <div class="box-tools pull-right">
            {!! Form::button('<i class="fa fa-minus"></i>', array('class' => 'btn btn-box-tool','title' => 'Collapse', 'data-widget' => 'collapse', 'data-toggle' => 'tooltip')) !!}
            {!! Form::button('<i class="fa fa-times"></i>', array('class' => 'btn btn-box-tool','title' => 'close', 'data-widget' => 'remove', 'data-toggle' => 'tooltip')) !!}
        </div>
    </div>
	<div class="box-body table-responsive">

		<table id="calculadora_table" class="table table-striped table-hover table-condensed">
			<thead>
				<tr class="success">
					<th>Tipo de Variable</th>
					<th>Tipo de Bono</th>
					<th>Valor</th>
					<th>Descripcion</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		        @foreach ($variables as $a_variable)
					<tr>
						<td>{{$a_variable->tipo['tipo']}} </td>
						<td>{{$a_variable->tipo_bono['tipo']}} </td>
						<td>{{$a_variable->valor}} </td>
						<td>{{$a_variable->descripcion}} </td>
						<td width="10%"><a class="btn btn-info btn-block btn-flat" href="{{ URL::to('calculadoras/' . $a_variable->id . '/edit') }}">Edit this Variable</a></td>
						<td width="10%">
						{!! Form::open(array('url' => 'calculadoras/' . $a_variable->id, 'class' => 'pull-right')) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
							{!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete this Variable', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Variable', 'data-message' => 'Are you sure you want to delete this Variable ?')) !!}
						{!! Form::close() !!}
						</td>
					</tr>
		        @endforeach
			</tbody>
		</table>

	</div>
</div>