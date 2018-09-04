{{-- Load FONTS --}}
{!! HTML::style('//fonts.googleapis.com/css?family=Roboto:400,300', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

{{-- Load Admin CSS --}}
{!! HTML::style(asset('/assets/css/admin/admin.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

{{-- Load Template Specific CSS --}}
@yield('style-sheets')

{{-- Load Layout Specific INLINE CSS --}}
<style type="text/css">
	@yield('template_fastload_css')
</style>

@section('template_fastload_css')
@endsection

<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="formularioFuturo" style="float: left">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Precio del spot </label>
                                            <input name="precioSpot" value="" id="precioSpot" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Precio del futuro </label>
                                            <input name="precioContrato" value="" id="precioContrato" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Fecha de compra del futuro </label>
                                            <input name="fechaCompra" style="padding-left:30px" type="customdate" id="fechaCompra" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Fecha de vencimiento </label>
                                            <input name="fechaExpiracion" style="padding-left:30px" type="customdate" value="" id="fechaExpiracion" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Comisión de mercado(USD c/1000) </label>
                                            <input name="comision" value="0.0019" id="comision" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <aside class="col-xs-12 col-sm-6" style="margin-top:24px">
                                            <button class="btn-sm btn btn-primary btn-block" style="float: right" id="calcFuturo">Calcular</button>
                                        </aside>
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
                                            <p>Tasa directa con comisiones
                                            <strong id="tasaAnualSin"></strong>
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Tasa nominal anual
                                            <strong id="tasaAnualFinal"></strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                {!! HTML::script('/assets/js/admin/admin.js', array('type' => 'text/javascript')) !!}
{!! HTML::script('/assets/js/admin/finance.js', array('type' => 'text/javascript')) !!}
{!! HTML::script('/assets/js/admin/iframeResizer.contentWindow.min.js', array('type' => 'text/javascript')) !!}


    <script type="text/javascript">
        
        $(document).ready( function() {
            var current = new Date();
            
            $("#fechaCompra").datepicker({format:'dd/mm/yyyy'}).datepicker("setDate", current);
            $("#fechaExpiracion").datepicker({format:'dd/mm/yyyy', startDate: current}).datepicker("setDate", current);
            
            $("#formularioFuturo").on('submit', function (e) {
                var myDate = $('#fechaExpiracion').datepicker('getDate');
                var difference = Math.ceil((myDate - current) / (1000 * 60 * 60 * 24))
                var fechaVencimiento = difference;
                
                var precioSpot = $("#precioSpot").val();
                var precioFuturo = $("#precioContrato").val();
                var comision = parseFloat($("#comision").val()).toFixed(5);
                var arancel = parseFloat(0.00005).toFixed(5);
                var iva = parseFloat(0.21).toFixed(5);

                comision = (comision*100)/100;
                arancel = (arancel*100)/100;
                iva = (iva*100)/100;

                var sumaUno = arancel + comision;
                var sumaDos = 1 + iva;
                var multSumas = (sumaUno * sumaDos).toFixed(5);
                var sumaUno = parseFloat(multSumas) + 1;

                var precioFinal = (precioSpot * sumaUno).toFixed(5);
                var tasaDirecta = (precioFuturo/precioFinal)-1;
                var tasaAnual = tasaDirecta * (360 / difference);

                console.log(precioFinal);
                console.log(tasaDirecta);
                console.log(tasaAnual);

                $("#vencimiento").html(fechaVencimiento);
                $("#tasaAnualSin").html((tasaDirecta*100).toFixed(2));
                $("#tasaAnualFinal").html((tasaAnual*100).toFixed(2));

                $("#divResultado").show();
                //stop form submission
                e.preventDefault();
            });
        });
    </script>



