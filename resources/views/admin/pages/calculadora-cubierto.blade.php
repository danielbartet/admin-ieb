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
                                    <form id="formulario" style="float: left">

                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Fecha de vencimiento del call</label>
                                            <input name="fechaVencimiento" style="padding-left:30px" type="customdate" value="" id="fechaVencimiento" class="datePicker  hasDatepicker form-control" required="required">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Precio de compra de la acción o bono</label>
                                            <input name="precioCompra" value="" id="precioCompra" class="autoNumericCon4Decimales form-control" required="required" style="padding:5px 20px ">
                                            <span class="simboloLabel">&nbsp;$&nbsp;</span>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Prima del Call</label>
                                            <input name="primaCall" value="" id="primaCall" class="autoNumericCon4Decimales form-control" required="required" style="padding:5px 20px ">
                                            <span class="simboloLabel">&nbsp;$&nbsp;</span>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Precio de ejercicio del call</label>
                                            <input name="strikeCall" value="" id="strikeCall" class="autoNumericCon4Decimales form-control" required="required" style="padding:5px 20px ">
                                            <span class="simboloLabel">&nbsp;$&nbsp;</span>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-6 form-group"></div>
                                        <aside class="col-xs-12 col-sm-6" style="float: right; margin-top: 10px">
                                            
                                            <button class="btn-sm btn btn-primary btn-block" id="lanzamientoCubierto" style="float: right;" onclick="calcularLanzamientoCubierto();return false;">CALCULAR</button>
                                        </aside>
                                    </form>
                                    <div id="divResultado" style="display: none">
                                        <div class="col-xs-12">	
                                            <h3>
                                                Resultados
                                            </h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">	
                                            <p>Días hasta el vencimiento de la estrategia
                                            <strong id="vencimiento"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa Mensual (%)
                                            <strong id="tasaMensual"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Cobertura(%)
                                            <strong id="cobertura"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa Efectiva (%)
                                            <strong id="tasaEfectiva"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa Anual (%)
                                            <strong id="tasaAnual"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Cotización de Cobertura ($)
                                            <strong id="cotizacion"></strong>
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
        $("#fechaVencimiento").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);

        function calcularLanzamientoCubierto() {
            if ($('#formulario').validate()) {
                var url = "/puente/calculadorasAction!calcularLanzamientoCubierto.action?"+ $('#formulario').serialize();
                $("#divResultado").load(url);
            }
        };
        $(document).ready( function() {
            
            $('#fechaVencimiento').data('customValidate', function() {
                if (!mayorAHoy($("#fechaVencimiento").val())) {
                    return 'Ingrese una fecha mayor a la fecha actual.';
                } else {
                    return '';
                }
            });
        }); 
    </script>

@endsection


