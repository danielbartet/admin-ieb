{{-- Load FONTS --}}
{!! HTML::style('//fonts.googleapis.com/css?family=Roboto:400,300', array('type' => 'text/css', 'rel' => 'stylesheet')) !!}

{{-- Load Admin CSS --}}
{!! HTML::style(asset('/assets/css/admin/admin.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
{!! HTML::style(asset('/assets/css/admin/style.css'), array('type' => 'text/css', 'rel' => 'stylesheet')) !!}
{{-- Load Template Specific CSS --}}
@yield('style-sheets')

{{-- Load Layout Specific INLINE CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<style type="text/css">
	@yield('template_fastload_css')
</style>

@section('template_fastload_css')
@endsection

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>


                <div class="box-header with-border">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="formulario">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>De Divisa
                                            </label>
                                            <input list="divisaOrigen" id="origenVal" class="form-control" placeholder="Seleccione Divisa...">
                                            <datalist id="divisaOrigen">
                                                @foreach($monedas as $moneda)
                                                    <option id="{{$moneda->simbolo}}" value="{{$moneda->nombre}}" data-cotizacion="{{$moneda->cotizacion}}"></option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Cantidad
                                            </label>
                                            <input name="cantidad" value="" id="cantidad" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>A Divisa
                                            </label>
                                            <input list="divisaDestino" id="destinoVal" class="form-control" placeholder="Seleccione Divisa...">
                                            <datalist id="divisaDestino">
                                                @foreach($monedas as $moneda)
                                                    <option id="{{$moneda->simbolo}}" value="{{$moneda->nombre}}" data-cotizacion="{{$moneda->cotizacion}}"></option>
                                                @endforeach
                                            </datalist>                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group" style="margin-top: 25px">                                            
                                            <button class="btn-sm btn btn-primary btn-block" id="lanzamientoCubierto" onclick="calcularConversorMonedas();return false;">CALCULAR</button>
                                        </div>
                                    </div>
                                    
                                </form>
                                <div id="divResultado" style="display: none">
                                    <div class="col-xs-12">	
                                        <h3>
                                            Resultados
                                        </h3>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">	
                                        <p>
                                            <strong id="valorOrigen"></strong>
                                            <spam id="paisOrigen"></spam>
                                            son equivalentes a 
                                            <strong id="valorDestino"></strong>
                                            <span id="paisDestino"></span>
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

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
    
@endsection

<script type="text/javascript">

    var divisas = {!! $monedas !!};
    $(document).ready(function() {
        
        $("#divisaOrigen").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
        $("#divisaDestino").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });
    })


    function calcularConversorMonedas() {
                                            
        var origenVal = $('#origenVal').val();
        var destinoVal = $('#destinoVal').val();
        var cantidad = $('#cantidad').val();

        var origen = divisas.filter(function(div) {            
            return div.nombre.trim() == origenVal.trim();
        });

        var destino = divisas.filter(function(div) {            
            return div.nombre.trim() == destinoVal.trim();
        });
        
        

        
        $.ajax({
            type: 'GET',
            url: 'getDivisa',
            data: {'divisaIn':origenVal, 'divisaOut':destinoVal},
            success: function(data) {
                console.log(JSON.parse(data));
                dataJson = JSON.parse(data);
                var total = ((dataJson.in.cotizacion/dataJson.out.cotizacion)*cantidad).toFixed(2);
                $("#valorOrigen").html(cantidad);
                $("#paisOrigen").html(dataJson.in.nombre);
                $("#valorDestino").html(total);
                $("#paisDestino").html(dataJson.out.nombre);
                $("#divResultado").show();
            },
            error: function(xhr) { // if error occured
                
            }
        });

    }

</script>


