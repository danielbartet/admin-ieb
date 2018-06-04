@extends('admin.layouts.dashboard')

@section('template_title')
	Create New Variable
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

			<h1>
				Create a New Variable
			</h1>

	    </section>
	    <section class="content">

			@include('admin.partials.return-messages')
			@include('admin.forms.create-variable-form')

	    </section>
	</div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

@endsection