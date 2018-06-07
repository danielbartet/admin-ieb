@extends('admin.layouts.dashboard')

@section('template_title')
	Create New Tipo Bono
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

			<h1>
				Create a New Tipo Bono
			</h1>

	    </section>
	    <section class="content">

			@include('admin.partials.return-messages')
			@include('admin.forms.create-tipo-bono-form')

	    </section>
	</div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

@endsection