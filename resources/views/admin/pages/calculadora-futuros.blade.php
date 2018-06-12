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
                                            <label>Precio del spot </label>
                                            <input name="precioSpot" value="" id="precioSpot" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>IVA(%) </label>
                                            <input name="iva" value="21" id="iva" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Precio del futuro </label>
                                            <input name="precioContrato" value="" id="precioContrato" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Arancel(%) </label>
                                            <input name="arancel" value="" id="arancel" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Fecha de compra del futuro </label>
                                            <input name="fechaCompra" style="padding-left:30px" type="customdate" value="06/06/2018" id="fechaCompra" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Fecha de vencimiento </label>
                                            <input name="fechaExpiracion" style="padding-left:30px" type="customdate" value="" id="fechaExpiracion" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Comisión de mercado(USD c/1000) </label>
                                            <input name="comision" value="0,19" id="comision" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <aside class="col-xs-12 col-sm-6" style="margin-top:24px">
                                            
                                            <button class="btn-sm btn btn-primary btn-block" style="float: right" id="lanzamientoCubierto" onclick="calcularFuturos();return false;">Calcular</button>
                                        </aside>

                                        <script type="text/javascript">
                                            function calcularFuturos() {
                                                if ($('#formulario').validate()) {
                                                    var url = "/puente/calculadorasAction!calcularFuturos.action?"
                                                            + $('#formulario').serialize();
                                                    $("#divResultado").load(url);
                                                }
                                            }
                                        </script>
                                    </form>
                                    <div id="divResultado" style="display: none">
                                        <div class="col-xs-12">	
                                            <h3>
                                                Resultados
                                            </h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">	
                                            <p>Días al vencimiento
                                            <strong id="vencimiento"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa anual simple sin comisiones
                                            <strong id="tasaAnualSin"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa anual compuesta final
                                            <strong id="tasaAnualFinal"></strong>
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
        var changing = false;
        $(document).ready( function() {
            
            var today = new Date();
            var fechaLiq = new Date(today.setDate(today.getDate() + 2));
            $("#fechaCompra").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);
            $("#fechaExpiracion").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);

            $('#fechaExpiracion').data('customValidate',function() {
                    if (!mayorAOtroDate(
                            $("#fechaExpiracion").val(), $(
                                    "#fechaCompra").val())) {
                        return 'Fecha de vencimiento debe ser mayor a la fecha de compra.';
                    } else {
                        if (!changing) {
                            changing = true;
                            $("#fechaCompra").trigger("change");
                            changing = false;
                        }
                        return '';
                    }
            });

            $('#fechaCompra').data('customValidate',function() {
                if (!mayorAOtroDate(
                        $("#fechaExpiracion").val(), $(
                                "#fechaCompra").val())) {
                    return 'Fecha de vencimiento debe ser mayor a la fecha de compra.';
                } else {
                    if (!changing) {
                        changing = true;
                        $("#fechaExpiracion").trigger("change");
                        changing = false;
                    }
                    return '';
                }
            });
        });
    </script>

@endsection


