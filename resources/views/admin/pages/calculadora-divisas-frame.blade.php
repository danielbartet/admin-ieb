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
                    <div class="col-xs-12 col-md-9 col-sm-9 col-lg-9">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="formulario">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>De Divisa
                                            </label>
                                            <select name="idDivisaOrigen" id="divisaOrigen" required="required" class="form-control">
                                                <option value="">Seleccione una divisa o metal precioso</option>
                                                <option value="DIVISA_MGA">Ariary malgache</option>
                                                <option value="DIVISA_THB">Baht tailandés</option>
                                                <option value="DIVISA_PAB">Balboa panameño</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>Cantidad
                                            </label>
                                            <input name="cantidad" value="" id="cantidad" class="autoNumericCon4Decimales form-control" required="required">
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>A Divisa
                                            </label>
                                            <select name="idDivisaDestino" id="divisaDestino" required="required" class="form-control">
                                                <option value="">Seleccione una divisa o metal precioso</option>
                                                <option value="DIVISA_MGA">Ariary malgache</option>
                                                <option value="DIVISA_THB">Baht tailandés</option>
                                                <option value="DIVISA_PAB">Balboa panameño</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 form-group" style="margin-top: 25px">                                            
                                            <button class="btn-sm btn btn-primary btn-block" id="lanzamientoCubierto" onclick="calcularConversorMonedas();return false;">CALCULAR</button>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function calcularConversorMonedas() {
                                            if ($('#formulario').validate()) {
                                                var url = "/puente/conversorMonedasAction!calcularConversorMonedas.action?"
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
            
                !! HTML::script('/assets/js/admin/admin.js', array('type' => 'text/javascript')) !!}
{!! HTML::script('/assets/js/admin/finance.js', array('type' => 'text/javascript')) !!}


@section('template_scripts')

    @include('admin.structure.dashboard-scripts')

@endsection


