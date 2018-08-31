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

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

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
                                            <button class="btn-sm btn btn-primary btn-block" id="lanzamientoCubierto" style="float: right;">CALCULAR</button>
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
          

    {!! HTML::script('/assets/js/admin/admin.js', array('type' => 'text/javascript')) !!}
{!! HTML::script('/assets/js/admin/finance.js', array('type' => 'text/javascript')) !!}

    <script type="text/javascript">

        var today = new Date();
        var fechaLiq = new Date(today.setDate(today.getDate() + 11));
        $("#fechaVencimiento").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);

        function calcularLanzamientoCubierto() {
            
        };

        $(document).ready( function() {

            $("#formulario").on('submit', function (e) {
                //EN EL MAIL, CUAL SERIA EL ARANCEL
                var myDate = $('#fechaVencimiento').datepicker('getDate');
                
                var current = new Date();
                var difference = Math.ceil((myDate - current) / (1000 * 60 * 60 * 24))
                var fechaVencimiento = difference;
                var precioCompra = $("#precioCompra").val();
                var primaCall = $("#primaCall").val();
                var strikeCall = $("#strikeCall").val();
                var derechoMercadoAcciones = parseFloat(0.0008).toFixed(5);
                var derechoMercadoOpciones = parseFloat(0.00002).toFixed(5);
                var derechoBolsaAcciones = parseFloat(0.0351).toFixed(5);
                var derechoBolsaOpciones = parseFloat(0.05).toFixed(5);
                var arancel = parseFloat(0.005).toFixed(5);
                var iva = parseFloat(0.21).toFixed(5);
                
                
                
                var a = ((derechoMercadoAcciones*100)/100)+((arancel*100)/100);
                var b = ( a * (1+(iva*100)/100) +1);
                var c = ((derechoMercadoOpciones*100)/100)+((arancel*100)/100);
                var d = primaCall / ((c * (1+ ((iva*100)/100)))+1);
                
                console.log(a.toFixed(5));
                console.log(b.toFixed(5));
                console.log(c.toFixed(5));
                console.log(d.toFixed(5));
                console.log(precioCompra * b);
                console.log(primaCall / d);
                
                var precioFinal = ((precioCompra * b) - d).toFixed(5);
                console.log("tasaAnual: "+precioFinal);

                var tasaDirecta = (strikeCall - precioFinal)/precioFinal;
                var cobertura = ((precioFinal - precioCompra)/precioCompra) * -1;
                var tasaAnual = tasaDirecta * (360 / difference);
                var tasaMensual = tasaDirecta * (30 / difference);
                var tasaEfectiva = Math.pow(tasaDirecta, 360)/difference;
                var cotizacion = precioCompra * (1-cobertura)

                $("#vencimiento").html(fechaVencimiento);
                $("#tasaMensual").html((tasaMensual*100).toFixed(2));
                $("#cobertura").html((cobertura*100).toFixed(2));
                $("#tasaAnual").html((tasaAnual*100).toFixed(2));
                $("#cotizacion").html((cotizacion).toFixed(2));

                $("#divResultado").show();
                //stop form submission
                e.preventDefault(); 
            });

            $('#fechaVencimiento').data('customValidate', function() {
                if (!mayorAHoy($("#fechaVencimiento").val())) {
                    return 'Ingrese una fecha mayor a la fecha actual.';
                } else {
                    return '';
                }
            });
        }); 
    </script>


