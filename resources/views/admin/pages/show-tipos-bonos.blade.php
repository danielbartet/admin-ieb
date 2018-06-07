@extends('admin.layouts.dashboard')

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

			<h1>
				Show Tipos de Bonos </small>
			</h1>

	    </section>
	    <section class="content">
				@include('admin.modules.tipo-list-datatable')
				@include('admin.modals.confirm-delete')
				<div class="row margin-top-1">
					<div class="col-md-3">
						{!! HTML::icon_link( "/tipo_bono/create", 'fa-fw fa '.Lang::get('sidebar-nav.link_icon_user_create'), Lang::get('sidebar-nav.link_title_calculadora_create'), array('class' =>'btn btn-primary btn-flat btn-block')) !!}
					</div>
				</div>
	    </section>
	</div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

	<script type="text/javascript">
		$(function () {
			$('#tipo_bono_table').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
    </script>

	@include('scripts.modals')

@endsection