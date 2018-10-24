@extends('admin.layouts.dashboard')

@section('template_fastload_css')
@endsection

@section('content')
	<div class="content-wrapper">
	    <section class="content-header">
			<h1>
				Calculadora Divisas
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
            </div>
        </section>
    </div>
@endsection

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

    $("#valorOrigen").html(cantidad);
    $("#paisOrigen").html(origen[0].nombre);
    $("#valorDestino").html(total);
    $("#paisDestino").html(destino[0].nombre);
    $("#divResultado").show();

}

</script>


