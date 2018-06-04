@extends('admin.layouts.dashboard')

@section('template_title')
	Showing Variable
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

	    	<h1>
	    		Edit Variable
	    	</h1>

	    </section>
	    <section class="content">

			@include('admin.forms.edit-variable-admin')

	    </section>
	</div>

	@include('admin.modals.confirm-save')

@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
	@include('scripts.modals')

@endsection