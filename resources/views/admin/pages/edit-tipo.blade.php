@extends('admin.layouts.dashboard')

@section('template_title')
	Showing Tipo Variable
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

	    	<h1>
	    		Edit Tipo Variable
	    	</h1>

	    </section>
	    <section class="content">

			@include('admin.forms.edit-tipo-admin')

	    </section>
	</div>

	@include('admin.modals.confirm-save')

@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
	@include('scripts.modals')

@endsection