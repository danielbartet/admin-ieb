@extends('admin.layouts.dashboard')

@section('template_fastload_css')
@endsection

@section('content')
	<div class="content-wrapper">
	    <section class="content-header">
			<h1>
				Calculadora Opciones
			</h1>
	    </section>
	    <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-12 col-md-9 col-sm-9 col-lg-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="formulario">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Fecha de vencimiento de la opción </label>
                                            <input name="fechaEjercicio" style="padding-left:30px" type="customdate" value="" id="fechaEjercicio" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Precio de ejercicio de la opción </label>
                                            $&nbsp;
                                            <input name="precioEjercicio" value="" id="precioEjercicio" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Tasa de interés (anual) </label>
                                            <input name="tasaInteres" value="" id="tasaInteres" class="autoNumericCon4Decimales form-control" style="padding-left:25px" required="required">
                                            <span style="position: absolute; margin-top: -25px;"> &nbsp;% </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Prima de mercado </label>
                                            $&nbsp;
                                            <input name="primaMercado" value="" id="primaMercado" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Precio de la acción o bono </label>
                                            $&nbsp;
                                            <input name="precioPapel" value="" id="precioPapel" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label> Volatilidad histórica </label>
                                            <input name="volatilidadHist" value="" id="volatilidadHist" class="autoNumericCon4Decimales form-control" style="padding-left:25px" required="required">
                                            <span style="position: absolute; margin-top: -25px;">&nbsp;% </span>
                                        </div>
                                        <aside class="col-xs-12 col-sm-3 col-sm-offset-9  ">
                                            
                                            <button id="lanzamientoCubierto" class="btn-sm btn btn-primary btn-block" style="float: right;" onclick="calcularLanzamientoCubierto();return false;">Calcular</button>
                                        </aside>
                                    </form>
                                    <div id="divResultado" style="display: none">
                                        <div class="col-xs-12">	
                                            <h3>
                                                Resultados
                                            </h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">	
                                            <p>Prima Call
                                            <strong id="primaCall"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Gamma Call
                                            <strong id="gammaCall"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Prima Put
                                            <strong id="primaPut"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Gamma Put
                                            <strong id="gammaPut"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Dias al Vencimiento
                                            <strong id="vencimiento"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Delta Call
                                            <strong id="deltaCall"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">	
                                            <p>Elasticidad Call
                                            <strong id="elastCall"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Delta Put
                                            <strong id="deltaPut"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Elasticidad Put
                                            <strong id="elastPut"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Volatilidad implícita(%) 
                                            <strong id="volImplicita"></strong>
                                            </p>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

    <script type="text/javascript">

        var today = new Date();
        var fechaLiq = new Date(today.setDate(today.getDate() + 2));
        $("#fechaEjercicio").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);


        function calcularLanzamientoCubierto() {
            if ($('#formulario').validate()) { 
                var url = "/puente/calculadorasAction!calcularCallAndPut.action?"	+ $('#formulario').serialize();
                $("#divResultado").load(url);
            }
        }

        $(document).ready( function() {
            
            $('#fechaEjercicio').data('customValidate', function() {

                if (!mayorAHoy($("#fechaEjercicio").val())) { 
                    return 'Ingrese una fecha mayor a la fecha actual.';
                } else {
                    return '';
                }
            }); 
        }); 
    </script>

@endsection


