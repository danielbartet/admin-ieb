{{-- Load Layout Body Classes --}}
<?php
	$layoutBodybodyClasses = 'hold-transition skin-blue sidebar-mini fixed ';  // Can also add class 'fixed'
?>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
@extends('admin.structure.master')

{{-- Load Auth Layout Head --}}
@section('layout-head')
    {{-- Load Common Admin Head --}}
	@include('admin.structure.head')
@stop

{{-- Load Layout HEADER --}}
@section('layout-header')
	@include('admin.partials.header')
	@include('admin.partials.dashboard-sidebar')
@stop

{{-- Load Layout CONTENT --}}
@section('layout-content')
	@yield('content')
@stop

{{-- Load Layout SIDEBAR --}}
@section('layout-sidebar')
	@include('admin.modules.control-sidebar')
@stop

{{-- Load Dashobard FOOTER --}}
@section('layout-footer')
	@include('admin.partials.footer')
@stop

{{-- Load Layout SCRIPTS --}}
@section('layout-scripts')

	@include('admin.partials.scripts')



	@yield('template_scripts')

@stop