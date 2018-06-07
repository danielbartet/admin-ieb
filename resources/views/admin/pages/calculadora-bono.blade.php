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
                                                    <option value="18">Argentina - Corporativos</option>
                                                    <option value="17">Argentina - Provinciales</option>
                                                    <option value="16">Argentina - Soberanos</option>
                                                    <option value="12">EEUU - Soberanos</option>
                                                    <option value="54">Internacional - Corporativos</option>
                                                    <option value="46">Lebacs</option>
                                                    <option value="10">Panamá - Soberanos</option>
                                                    <option value="45">Paraguay - Soberanos</option>
                                                    <option value="11">Perú - Soberanos</option>
                                                    <option value="20">Uruguay - Soberanos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12  form-group">
                                            <label class="col-xs-12 col-sm-12 col-md-5 col-lg-5">Seleccione el bono</label>
                                            <div id="listadoBonosPorCategoria" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <select name="idBono" tabindex="2" id="idBono" onchange="completaDatosBono()" required="required" class="form-control">
                                                    <option value="BONO_AA2020">AA2020 - Aeropuertos Arg 2000 2020</option>
                                                    <option value="BONO_ADECO27">ADECO27 - Adecoagro 2027</option>
                                                    <option value="BONO_AGRC4">AGRC4 - Agrofina Clase 4</option>
                                                    <option value="BONO_ALBAAR23">ALBAAR23 - Albanesi SA 2023</option>
                                                    <option value="BONO_ALTOPARANA2017">ALTOPR2017 - Arauco Argentina 2017</option>
                                                    <option value="BONO_ARCOR2017">OAOX2 - Arcor 2017</option>
                                                    <option value="BONO_ARCOR23">RCC9O - Arcor 2023 USD</option>
                                                    <option value="BONO_ARCOS2023">ARCOS2023 - Arcos Dorados 2023</option>
                                                    <option value="BONO_ARCOS2027">ARCOS2027 - Arcos Dorados 2027</option>
                                                    <option value="BONO_BCIU9">BCIU9 - Banco Ciudad Clase 9</option>
                                                    <option value="BONO_BCIUA">BCIUA - Banco de la Ciudad de Buenos Aires C10 Vto. 06-12-2020</option>
                                                    <option value="BONO_BCIUE">BCIUE - Banco Ciudad C13 2019</option>
                                                    <option value="BONO_BDCDO">BDCDO - BANCO DE CREDITO Y SECURITIZACION 28/10/ 2018</option>
                                                    <option value="BONO_BH40O">BH40O - Banco Hipotecario C40</option>
                                                    <option value="BONO_BHCBV">PHCBV - VCP Puente C11</option>
                                                    <option value="BONO_BHCDO">BHCDO - Banco Hipotecario 2017</option>
                                                    <option value="BONO_BHCXO">BHCXO - BANCO HIPOTECARIO Clase 31</option>
                                                    <option value="BONO_BMA2017">OROY5 - Banco Macro 2017</option>
                                                    <option value="BONO_BMA2036">BMA2036 - Banco Macro 2036</option>
                                                    <option value="BONO_BNCNO">BNCNO - ON SANTANDER $ VTO 23/02/2019</option>
                                                    <option value="BONO_BYC3O">BYC3O - BANCO DE GALICIA Y BUENOS AIRES S.A. C3</option>
                                                    <option value="BONO_CAPEX2018">OCEX1 - Capex 2018</option>
                                                    <option value="BONO_CAPEX24">CAPEX24 - CAPEX 6,875% 2024</option>
                                                    <option value="BONO_CMC2O">CMC2O - Central Termica Roca C2</option>
                                                    <option value="BONO_CMC3O">CMC3O - Central Termica Roca C3</option>
                                                    <option value="BONO_CPC2O">CPC2O - Compañía General de Combustibles Clase 2</option>
                                                    <option value="BONO_CPC4O">CPC4O - COMPAÑIA GENERAL DE COMBUSTIBLES S.A. C4</option>
                                                    <option value="BONO_CPC6O ">CPC6O  - Compañía General de Combustibles Clase 6</option>
                                                    <option value="BONO_CPC7O">CPC7O - CGC Clase 7</option>
                                                    <option value="BONO_CPCAO">CPCAO - Compañía General de Combustibles SA Clase A 2021</option>
                                                    <option value="BONO_CRC10">CRC10 - Celulosa C10 9,5% Vto. 2019</option>
                                                    <option value="BONO_CRC9O">CRC9O - Celulosa Clase 9 </option>
                                                    <option value="BONO_CRCAO">CRCAO - CELULOSA ARGENTINA S.A. C10 Vto. 05/12/2019</option>
                                                    <option value="BONO_CRCBO">CRCBO - Celulosa C11 2019</option>
                                                    <option value="BONO_CS8HO">CS8HO - Cresud 2018 C16</option>
                                                    <option value="BONO_CS9JO">CS9JO - Cresud 2019 C18</option>
                                                    <option value="BONO_CSALO">CSALO - Cresud Serie 10 Clase XX</option>
                                                    <option value="BONO_CSBNO">CSBNO - Cresud Décima primera serie - CLASE XXII</option>
                                                    <option value="BONO_CSDOO">CSDOO - Cresud S12 C23 6,5% 2023</option>
                                                    <option value="BONO_CXC6V">CXC6V - VCP Crédito Directo C6</option>
                                                    <option value="BONO_DR2DO">DR2DO - Red Surcos S.A S2 27/08/2020</option>
                                                    <option value="BONO_EDENOR2022">OGLB1Ext - Banco Galicia 2018</option>
                                                    <option value="BONO_GMC4O">GMC4O - Generacion Mediterranea C4 </option>
                                                    <option value="BONO_GMC5O">GMC5O - Generacion Mediterranea C5</option>
                                                    <option value="BONO_GNCLO">GNCLO - Genneia 2022 C20</option>
                                                    <option value="BONO_HSC5O">HSC5O - HSBC Argentina 2020</option>
                                                    <option value="BONO_IRSA2020">OIRX7 - IRSA 2020</option>
                                                    <option value="BONO_JHC9O">JHC9O - John Deere Clase 9 22/12/2019 </option>
                                                    <option value="BONO_JHCEO">JHCEO - John Deere C13</option>
                                                    <option value="BONO_JHCFO">JHCFO - John Deere C14 2020</option>
                                                    <option value="BONO_L2DF8C">SNS1O - San Miguel 2018</option>
                                                    <option value="BONO_MASHER2021">MASHER2021 - Mastellone 2021</option>
                                                    <option value="BONO_MD10O">MD10O - Medanito Clase 10</option>
                                                    <option value="BONO_METROG18">OMAXL - Metrogas 2018</option>
                                                    <option value="BONO_MPC7O">MPC7O - Molinos Rio de la Plata 2017</option>
                                                    <option value="BONO_MS51O">MS51O - MSU Serie 5 Clase 1</option>
                                                    <option value="BONO_NSC2O">NSC2O - Generación Frias C2 Vto 08/03/2018</option>
                                                    <option value="BONO_NSC3O">NSC3O - Generación Frías Clase 3</option>
                                                    <option value="BONO_NWC7O">NWC7O - Newsan C7</option>
                                                    <option value="BONO_OCR14">OCR14 - Cresud 2018 C14</option>
                                                    <option value="BONO_OYP19">OYP19 - YPF 2017 C19</option>
                                                    <option value="BONO_PAE2021">OPNS1 - Pan American Energy 2021</option>
                                                    <option value="BONO_PETROBRASE2017">OPX23 - Petrobras Argentina 2017</option>
                                                    <option value="BONO_PSSPO">PSSPO - PSA Finance Argentina S24</option>
                                                    <option value="BONO_PTSTO">PTSTO - Pampa Energía USD 21/07/2023</option>
                                                    <option value="BONO_RA31D">RA31D - RAGHSA S. A. Clase 3 Serie 1 D</option>
                                                    <option value="BONO_RA31O">RA31O - RAGHSA S. A. Clase 3 Serie 1</option>
                                                    <option value="BONO_RDS2O">RDS2O - Credinea S2 12/06/2018</option>
                                                    <option value="BONO_RF12O">RF12O - Agrofina CLASE I SERIE II</option>
                                                    <option value="BONO_RFC4O">RFC4O - Agrofina Clase 4</option>
                                                    <option value="BONO_RFC5O">RFC5O - Agrofina Clase V 2019</option>
                                                    <option value="BONO_RFC6O">RFC6O - Agrofina C6</option>
                                                    <option value="BONO_RFC7O">RFC7O - Agrofina 6,9% 2019</option>
                                                    <option value="BONO_RGC4O">RGC4O - Benito Roggio e Hijos S.A. C4 Vto. 05-06-2018</option>
                                                    <option value="BONO_RHC2O">RHC2O - Roch C2</option>
                                                    <option value="BONO_RHC3O">RHC3O - Roch Clase 3</option>
                                                    <option value="BONO_RPC2O">RPC2O - Irsa Clase 2 2023</option>
                                                    <option value="BONO_RPC4O">RPC4O - IRCP 5% 2020</option>
                                                    <option value="BONO_RSC8O">RSC8O - IRSA Clase 8</option>
                                                    <option value="BONO_TARJ2017">TARJ2017 - Tarjeta Naranja 2017</option>
                                                    <option value="BONO_TGS2017">OTX11 - TGS 2017</option>
                                                    <option value="BONO_TGS2020">TSC1O - TGS 2020</option>
                                                    <option value="BONO_THC4O">THC4O - Tarshop C4 Badlar + 4%</option>
                                                    <option value="BONO_TRANS2021">OTRX9 - Transener 2021</option>
                                                    <option value="BONO_YCA6O">YCA6O - YPF Clase XXXIX</option>
                                                    <option value="BONO_YCA8O">YCA8O - YPF Clase XLI</option>
                                                    <option value="BONO_YCAMO">YCAMO - YPF C53 2027</option>
                                                    <option value="BONO_YPCNO">YPCNO - YPF 2020</option>
                                                    <option value="BONO_YPCUO">YPCUO - YPF 2024 Clase 28</option>
                                                    <option value="BONO_YPCZO">YPCZO - YPF 2017 C33</option>
                                                    <option value="BONO_YPF2018">YPF2018C24 - YPF 2018 C24</option>
                                                    <option value="BONO_YPF2018C26">YPCRO - YPF 2018 C26</option>
                                                    <option value="BONO_YPF2025">YCA6O - YCA6O</option>
                                                    <option value="BONO_YPF47">YPF47 - YPF 7% 2047</option>
                                                    <option value="BONO_YPFDAR21">YPFDAR21 - YPF C47 2021</option>
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
                                                            <option value="precioVR">Precio VR</option>
                                                            <option value="precioVN">Precio VN</option>
                                                            <option value="tir">TIR</option>
                                                            <option value="paridad">Paridad</option>
                                                        </select>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 form-group">
                                                <div id="wwgrp_monedaPrecio" class="wwgrp">
                                                    <div id="wwctrl_monedaPrecio" class="wwctrl">
                                                        <select name="monedaPrecio" id="monedaPrecio" onchange="setEnabledTipoCambioText()" style="font-size:12px" class="form-control">
                                                            <option value="DIVISA_ARS">ARS</option>
                                                            <option value="DIVISA_DOLAR">USD</option>
                                                            <option value="DIVISA_EUR">EUR</option>
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


