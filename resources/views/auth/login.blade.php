{{-- Set Template Body Classes --}}
<?php
	$templateBodybodyClasses = 'login-page';
?>

@extends('admin.layouts.auth')

@section('template_title')
	Login
@endsection

@section('template_fastload_css')
@endsection

@section('content')
    <div class="login-box">
		<div class="login-logo">
			<a href="/"><strong>IEB</strong> Admin</a>
		</div>
		<div class="login-box-body">

			<h4 class="login-box-msg">
			  	{{ Lang::get('auth.login') }}
			</h4>

			@include('admin.forms.login-form')
      	</div>
    </div>
@endsection

@section('template_scripts')

	{!! HTML::script('/assets/js/login.js', array('type' => 'text/javascript')) !!}
	@include('scripts.checkbox');
	@include('scripts.show-hide-passwords');

@endsection