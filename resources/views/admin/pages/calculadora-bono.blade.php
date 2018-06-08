@extends('admin.layouts.dashboard')

@section('template_fastload_css')
@endsection

@section('content')
	<div class="content-wrapper">
	    <section class="content-header">
			<h1>
				Calculadora Bonos
			</h1>
	    </section>
	    <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-12 col-md-9 col-sm-9 col-lg-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="calculadoraBonosForm" name="calculadoraBonosForm">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="calculadoraPublica" value="true" id="calculadoraPublica" class="form-control">
                                        <div class="col-xs-12  form-group">
                                            <label class="col-xs-12 col-sm-12 col-md-5 col-lg-5"> 
                                                Seleccione la categoría del bono </label>
                                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                                <select name="idCategoria" tabindex="1" id="idCategoria" class="form-control" onchange="completaListadoBonos()">
                                                @foreach ($tipoBonos as $tipoBono)
                                                    @if ($tipoBono->id <> 2)
                                                        <option value="{{$tipoBono->id}}">{{$tipoBono->tipo}}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12  form-group">
                                            <label class="col-xs-12 col-sm-12 col-md-5 col-lg-5">Seleccione el bono</label>
                                            <div id="listadoBonosPorCategoria" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <select name="idBono" tabindex="2" id="idBono" onchange="completaDatosBono()" required="required" class="form-control">
                                                @foreach ($cotizaciones as $cot)
                                                    <option value="{{$cot->simbolo}}">{{$cot->simbolo}}</option>
                                                @endforeach
                                                </select>
                                                <input type="hidden" name="descripcionCategoria" value="Bonos emitidos por empresas en Argentina" id="descripcionCategoria" class="form-control">
                                                <script type="text/javascript">	
                                                /*window.onload=function() {
                                                    completaDatosBono();
                                                    if(document.getElementById('descripcionCategoriaSpan')){
                                                        document.getElementById('descripcionCategoriaSpan').innerHTML='Bonos emitidos por empresas en Argentina';
                                                    }
                                                    if($('#carteraBonosForm').refresh) $('#carteraBonosForm').refresh();
                                                };*/
                                                </script> 
                                            </div>                                            
                                            <div id="datosBono">
                                                <div id="valoresTasas" style="display:none">
                                                    USD
                                                </div>
                                                <input type="hidden" name="tipoCambioFormateado" value="24,96" id="tipoCambioFormateado" class="form-control">
                                                <input type="hidden" name="precioFormateado" value="0" id="precioFormateado" class="form-control">
                                                <input type="hidden" name="tirFromBono" value="0,05919" id="tirFromBono" class="form-control">
                                                <input type="hidden" name="paridadFormateada" value="1,07127" id="paridadFormateada" class="form-control">
                                                <input type="hidden" name="monedaEmision" value="USD" id="monedaEmision" class="form-control">
                                                <input type="hidden" name="valorResidual" value="0,35" id="valorResidual" class="form-control">
                                                
                                                <script type="text/javascript">	
                                                    /*setEnabledFields();
                                                
                                                    function verCotizacionBono(){
                                                        var bonoId = $("#idBono").val();
                                                        
                                                        window.open('/mercado/bonosCotizaciones!getBonoById.action?id=' + bonoId,'_blank');
                                                    }*/
                                                </script>
                                            </div> 
                                        </div>
                                        <div class="col-xs-12  form-group">
                                            <label class="col-xs-12">  
                                                Ingrese el precio, la TIR o la paridad
                                            </label>
                                            <div class="col-xs-12 col-sm-3 col-md-5 col-lg-5 form-group">
                                                <div id="wwgrp_tipoCalculoSelection" class="wwgrp">
                                                    <div id="wwctrl_tipoCalculoSelection" class="wwctrl">
                                                        <select name="tipoCalculoSelection" id="tipoCalculoSelection" onchange="setEnabledFields()" class="form-control">
                                                        @foreach ($tipoCalculos as $tipo)
                                                            <option value="{{$tipo->id}}">{{$tipo->valor}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 form-group">
                                                <div id="wwgrp_monedaPrecio" class="wwgrp">
                                                    <div id="wwctrl_monedaPrecio" class="wwctrl">
                                                        <select name="monedaPrecio" id="monedaPrecio" onchange="setEnabledTipoCambioText()" style="font-size:12px" class="form-control">
                                                        @foreach ($monedas as $moneda)
                                                            <option value="{{$moneda->id}}">{{$moneda->valor}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 form-group"> 
                                                <input name="precioVR" value="0" id="precioVR" class="autoNumericCon4Decimales form-control" required="required" style="display: block;">
                                                <input name="precioVN" value="0" id="precioVN" class="autoNumericCon4Decimales form-control" style="display: none;" required="required" disabled="">
                                                <input name="tir" value="0" id="tir" class="autoNumericCon4Decimales form-control" style="display: none;" required="required" disabled="">
                                                <input name="paridad" value="0" id="paridad" class="autoNumericCon4Decimales form-control" style="display: none;" required="required" disabled="">
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"> 
                                                <span class="help-block" style="margin-top: -3px; display: block;" id="precioVRText">Precio valor residual dirty del bono</span> 
                                                <span class="help-block" style="margin-top: -3px; display: none;" id="precioVNText">Precio valor nominal dirty del bono</span> 
                                                <span class="help-block" style="margin-top: -3px; display: none;" id="tirText">Rendimiento del bono</span> 
                                                <span class="help-block" style="margin-top: -3px; display: none;" id="paridadText">Indicador que compara el precio del bono con su valor</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 form-group">
                                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5"> Ingrese la cantidad </label>
                                            <div style="overflow:hidden;width:1px;height:1px;float:left;position:absolute"><div id="wwgrp_tipoCantidadSelection" class="wwgrp">
                                                <div id="wwctrl_tipoCantidadSelection" class="wwctrl">
                                                    <select name="tipoCantidadSelection" id="tipoCantidadSelection" onchange="setEnabledCantidadFields()" class="form-control">
                                                        <option value="cantidadVN">Cartera VN</option>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4"> 
                                            <div id="wwgrp_cantidadVN" class="wwgrp">
                                                <div id="wwctrl_cantidadVN" class="wwctrl">
                                                    <input name="cantidadVN" value="100" id="cantidadVN" class="autoNumericCon4Decimales form-control" required="required" style="display: block;">
                                                </div> 
                                            </div>
                                            <div id="wwgrp_cantidadVR" class="wwgrp">
                                                <div id="wwctrl_cantidadVR" class="wwctrl">
                                                    <input name="cantidadVR" value="100" id="cantidadVR" class="autoNumericCon4Decimales form-control" required="required" disabled="" style="display: none;">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
                                            <span class="help-block" id="cantidadVNText" style="margin-top: -3px; display: block;">Cantidad de bonos Nominales</span>
                                            <span class="help-block" id="cantidadVRText" style="margin-top: -3px; display: none;">Cantidad de bonos Residuales</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5">Fecha de Liquidación</label>
                                        <div style="overflow: hidden;" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <input name="fechaLiquidacion" type="customdate" id="fechaLiquidacion" style="padding-left:30px" required="required" class="hasDatepicker form-control">
                                            <img style="float: right;margin-left: 5px;margin-top: -26px;position: absolute;" src="/img/calendar_icon.gif">
                                        </div>	
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <div id="tipoDeCambioContainer" style="">
                                            <label class="col-xs-12 col-sm-5 col-md-5 col-lg-5">Tipo de cambio</label>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                <input required="required" id="tipoDeCambio" name="tipoDeCambio" class="autoNumericCon4Decimales form-control">
                                            </div>
                                            <input type="hidden" name="labelTipoCambio" value="ARS/USD" id="labelTipoCambio" class="form-control">
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                <span class="help-block" id="textoTipoCambio">ARS/USD</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 form-group">
                                        <button id="calculadoraBonos" onclick="calcular(); return false;" class="btn btn-primary btn-block"> Calcular </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--div class="col-xs-12 col-md-3 col-sm-3 col-lg-3">
                        <div class="alert alert-info">
                            <ul class="list-unstyled">
                                <li style="margin-bottom: 12px"><i class="glyphicon glyphicon-ok" style="color: #43ac6d"></i> 
                                Calcula el rendimiento (TIR), el período de recupero de la inversión, las fechas y los montos de cada pago de amortización e interés, de bonos soberanos, provinciales y corporativos.
                                </li>
                                <li style="margin-bottom: 12px"><i class="glyphicon glyphicon-ok" style="color: #43ac6d"></i>
                                Permite exportar a PDF los cálculos y los flujo de fondos.
                                </li>
                                <li style="margin-bottom: 12px"><i class="glyphicon glyphicon-ok" style="color: #43ac6d"></i>
                                Permite conocer la sensibilidad de la TIR y de la paridad del bono seleccionado, ante cambios en su precio.
                                </li>
                            </ul>
                        </div>
                    </div -->
                    <div id="resultadoCalculadoraBonos" class="col-xs-12"></div>
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
    $("#fechaLiquidacion").datepicker({format:'dd/mm/yyyy'}).datepicker('update', fechaLiq);

    var formularioSerializado = '';

    /*if ( $.browser.mozilla == true ) { 
        $('.containerInputs').each(function(i, obj) {
            $(obj).css("width","62px"); 
        });  
    }*/ 

    function setVisible(input,visible){
        if(visible){
            input.show();
        }else{
            input.hide();
        }
        input[0].disabled=!visible; 
    } 
    function setEnabledFields() {
        setVisible($('#precioVR'),false);
        setVisible($('#precioVN'),false);
        setVisible($('#tir'),false);
        setVisible($('#paridad'),false);

        $('#precioVR').val($('#precioFormateado').val());
        $('#precioVN').val(parseFloat($('#precioFormateado').val().split(",").join(".")) * parseFloat($('#valorResidual').val().split(",").join(".")));
        $('#precioVN').val($('#precioVN').val().split(".").join(","));
        $('#paridad').val(parseFloat($('#paridadFormateada').val().split(",").join(".")) * 100);
        $('#paridad').val($('#paridad').val().split(".").join(","));
        $('#tir').val($('#tirFromBono').val());
        setEnabledCantidadFields();

        var selectedValue = $('#tipoCalculoSelection').val();
        $('#' + selectedValue).val('');
        setVisible($('#' + selectedValue),true);

        $('#precioVRText').hide();
        $('#precioVNText').hide();
        $('#tirText').hide();
        $('#paridadText').hide();
        $('#' + selectedValue + 'Text').show();

        
        if (selectedValue == 'precioVR' || selectedValue == 'precioVN') {
            $('#monedaPrecio').removeAttr('disabled');
        } else {
            $('#monedaPrecio').attr('disabled', 'disabled');
        }
        setEnabledTipoCambioText();
    } 

    function setEnabledTipoCambioText() {
        var codigoSwiftMonedaPrecio = '';
        var idMonedaPrecio = $('#monedaPrecio').val();
        var codigoSwiftEmision = $('#monedaEmision').val();
        
        if (codigoSwiftEmision == 'USD-L')
            codigoSwiftEmision = 'USD';		
        if (idMonedaPrecio == 'DIVISA_DOLAR_LINKED')
            idMonedaPrecio = 'DIVISA_DOLAR';		
        
        if (idMonedaPrecio == 'DIVISA_ARS') 
            codigoSwiftMonedaPrecio = 'ARS';
        if (idMonedaPrecio == 'DIVISA_DOLAR')
            codigoSwiftMonedaPrecio = 'USD';
        if (idMonedaPrecio == 'DIVISA_EUR') 
            codigoSwiftMonedaPrecio = 'EUR';

        if (codigoSwiftEmision == 'ARS'&& (idMonedaPrecio == 'DIVISA_ARS'|| $('#tipoCalculoSelection').val() == 'tir' || $('#tipoCalculoSelection').val() == 'paridad')) {
            $('#tipoDeCambioContainer').hide();
            $('#labelTipoCambio').val('N/A');
            $('#tipoDeCambio').val('1');
        } else if (codigoSwiftEmision != 'ARS'&& ($('#tipoCalculoSelection').val() == 'tir' || $('#tipoCalculoSelection').val() == 'paridad')) {
            $('#tipoDeCambioContainer').show();
            $('#textoTipoCambio').html('ARS/' + codigoSwiftEmision);
            $('#labelTipoCambio').val('ARS/' + codigoSwiftEmision);
        } else {
            if (codigoSwiftEmision == codigoSwiftMonedaPrecio) {
                $('#tipoDeCambioContainer').hide();
                $('#tipoDeCambio').val('1');
                $('#labelTipoCambio').val('N/A');
            } else {
                $('#tipoDeCambio').val('');
                if (codigoSwiftEmision != 'ARS'&& idMonedaPrecio != 'DIVISA_ARS') {
                    $('#labelTipoCambio').val('USD/EUR');
                    $('#textoTipoCambio').html('USD/EUR');
                } else if (codigoSwiftEmision != 'ARS') {
                    $('#textoTipoCambio').html('ARS/' + codigoSwiftEmision);
                    $('#labelTipoCambio').val('ARS/' + codigoSwiftEmision);
                } else {
                    $('#textoTipoCambio').html('ARS/' + codigoSwiftMonedaPrecio);
                    $('#labelTipoCambio').val('ARS/' + codigoSwiftMonedaPrecio);
                }
                $('#tipoDeCambioContainer').show();
            }

        }
    }
    function setEnabledCantidadFields() {
        var selectedValue = $('#tipoCantidadSelection').val();
        $('#cantidadVR').val('');
        $('#cantidadVN').val('');
        setVisible($('#cantidadVR'),false);
        setVisible($('#cantidadVN'),false);
        $('#cantidadVRText').hide();
        $('#cantidadVNText').hide();
        setVisible($('#' + selectedValue),true);
        $('#' + selectedValue + 'Text').show();
    }

    function completaDatosBono() {
        var idBono = $('#idBono').val();
        /*$('#datosBono').load('/puente/actionCalculadoraBonosPublica!getDatosBono.action' + '?idBono=' + idBono,function (){
            $('#calculadoraBonosForm').refresh();
        });*/
    }
    function completaListadoBonos() {
        var idCategoria = $('#idCategoria').val();
        var idBono = '';

        if (idBono == null || idBono == '') {
            idBono = $('#idBono').val();
        }

        /*$('#listadoBonosPorCategoria').load('/puente/actionCalculadoraBonosPublica!getListadoBonosPorCategoria.action'+ '?idCategoria=' + idCategoria + '&idBono=' + idBono,
            function (){
                completaDatosBono();
            }		
        );*/
    }
    function calcular() { 
        formularioSerializado = $('#calculadoraBonosForm').serialize();
        if ($('#calculadoraBonosForm').validate()) {
            document.getElementById('resultadoCalculadoraBonos').innerHTML = "<div class=\"general-box\" style=\"color:gray;padding-bottom:25px;text-align:center\"><img height=\"5\" width=\"100%\" src=\"/images/linea_formulario_calculadora.gif\"><br><img src=\"/images/ajax-loading.gif\" /><br><img height=\"5\" width=\"100%\" src=\"/images/linea_formulario_calculadora.gif\"></div>";
            //$('#resultadoCalculadoraBonos').load('/puente/actionCalculadoraBonosPublica!calcular.action?'+ formularioSerializado);
        }
    }

    $(document).ready(function() {
        completaListadoBonos();
        setEnabledCantidadFields();
        
        $("#calculadoraBonosForm").on("keypress", function(e){
            if(e.keyCode == 13){
                calcular();
                return false;
            }
        });
    });
    </script>

@endsection


