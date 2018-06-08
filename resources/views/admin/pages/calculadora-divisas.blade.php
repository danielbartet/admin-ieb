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
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label>De Divisa
                                            </label>
                                            <select name="idDivisaOrigen" id="divisaOrigen" required="required" class="form-control">
                                                <option value="">Seleccione una divisa o metal precioso</option>
                                                <option value="DIVISA_MGA">Ariary malgache</option>
                                                <option value="DIVISA_THB">Baht tailandés</option>
                                                <option value="DIVISA_PAB">Balboa panameño</option>
                                                <option value="DIVISA_ETB">Birr de Etiopía</option>
                                                <option value="DIVISA_VEF">Bolivar Venezolano</option>
                                                <option value="DIVISA_BOB">Boliviano</option>
                                                <option value="DIVISA_GHS">Cedi ghanés</option>
                                                <option value="DIVISA_KES">Chelín keniano</option>
                                                <option value="DIVISA_SOS">Chelín somalí</option>
                                                <option value="DIVISA_TZS">Chelín tanzano</option>
                                                <option value="DIVISA_UGX">Chelín ugandés</option>
                                                <option value="DIVISA_CRC">Colón costarricense</option>
                                                <option value="DIVISA_SVC">Colón de El Salvador</option>
                                                <option value="DIVISA_NIO">Córdoba de Nicaragua</option>
                                                <option value="DIVISA_CZK">Corona checa</option>
                                                <option value="DIVISA_DKK">Corona Danesa</option>
                                                <option value="DIVISA_EEK">Corona de Estonia</option>
                                                <option value="DIVISA_ISK">Corona islandesa</option>
                                                <option value="DIVISA_NOK">Corona noruega</option>
                                                <option value="DIVISA_SEK">Corona sueca</option>
                                                <option value="DIVISA_GMD">Dalisi de Gambia</option>
                                                <option value="DIVISA_MKD">Denar de Macedonia</option>
                                                <option value="DIVISA_DZD">Dinar de Argelia</option>
                                                <option value="DIVISA_BHD">Dinar de Bahrein</option>
                                                <option value="DIVISA_IQD">Dinar de Irak</option>
                                                <option value="DIVISA_JOD">Dinar de Jordania</option>
                                                <option value="DIVISA_KWD">Dinar de Kuwait</option>
                                                <option value="DIVISA_LYD">Dinar de Libia</option>
                                                <option value="DIVISA_RSD">Dinar de Serbia</option>
                                                <option value="DIVISA_TND">Dinar de Tunez</option>
                                                <option value="DIVISA_AED">Dirham</option>
                                                <option value="DIVISA_STD">Dobra de Santo Tomé</option>
                                                <option value="DIVISA_AUD">Dólar australiano</option>
                                                <option value="DIVISA_CAD">Dólar Canadiense</option>
                                                <option value="DIVISA_BSD">Dólar de Bahamas</option>
                                                <option value="DIVISA_BBD">Dólar de Barbados</option>
                                                <option value="DIVISA_BZD">Dólar de Belice</option>
                                                <option value="DIVISA_BND">Dólar de Brunei</option>
                                                <option value="DIVISA_FJD">Dólar de Fiji</option>
                                                <option value="DIVISA_GYD">Dólar de Guyana</option>
                                                <option value="DIVISA_HKD">Dólar de Hong Kong</option>
                                                <option value="DIVISA_BMD">Dólar de las Bermudas</option>
                                                <option value="DIVISA_KYD">Dólar de las Islas Caimán</option>
                                                <option value="DIVISA_SBD">Dólar de las Islas Salomón</option>
                                                <option value="DIVISA_XCD">Dólar del este Caribeño</option>
                                                <option value="DIVISA_NAD">Dólar de Namibia</option>
                                                <option value="DIVISA_NZD">Dólar de Nueva Zelanda</option>
                                                <option value="DIVISA_SGD">Dólar de Singapur</option>
                                                <option value="DIVISA_TWD">Dólar de Taiwán</option>
                                                <option value="DIVISA_TTD">Dólar de Trinidad y Tobago</option>
                                                <option value="DIVISA_ZWD">Dólar de Zimbabwe</option>
                                                <option value="DIVISA_DOLAR_CABLE">Dolares Cable</option>
                                                <option value="DIVISA_DOLAR">Dolar Estadounidense</option>
                                                <option value="DIVISA_JMD">Dólar jamaiquino</option>
                                                <option value="DIVISA_LRD">Dólar liberiano</option>
                                                <option value="DIVISA_DOLAR_LINKED">Dolar Linked</option>
                                                <option value="DIVISA_SRD">Dólar surinamés</option>
                                                <option value="DIVISA_VND">Dong de Vietnam</option>
                                                <option value="DIVISA_CVE">Escudo caboverdiano</option>
                                                <option value="DIVISA_EUR">Euro</option>
                                                <option value="DIVISA_EURO_CABLE">Euro Cable</option>
                                                <option value="DIVISA_ANG">Florín antillano neerlandés</option>
                                                <option value="DIVISA_AWG">Florín de Aruba</option>
                                                <option value="DIVISA_HUF">Forint húngaro</option>
                                                <option value="DIVISA_XAF">Franco CFA de África central</option>
                                                <option value="DIVISA_XOF">Franco CFA de África oeste</option>
                                                <option value="DIVISA_XPF">Franco CFP</option>
                                                <option value="DIVISA_CDF">Franco congoleño</option>
                                                <option value="DIVISA_BIF">Franco de Burundi</option>
                                                <option value="DIVISA_KMF">Franco de Comoras</option>
                                                <option value="DIVISA_DJF">Franco de Djibouti</option>
                                                <option value="DIVISA_GNF">Franco de Guinea</option>
                                                <option value="DIVISA_RWF">Franco de Ruanda</option>
                                                <option value="DIVISA_CHF">Franco Suizo</option>
                                                <option value="DIVISA_HTG">Gourde haitiano</option>
                                                <option value="DIVISA_PYG">Guaraní </option>
                                                <option value="DIVISA_UAH">Hryvnia de Ucrania</option>
                                                <option value="DIVISA_PGK">Kina de Papua Nueva Guinea</option>
                                                <option value="DIVISA_LAK">Kip de Laos</option>
                                                <option value="DIVISA_HRK">Kuna croata</option>
                                                <option value="DIVISA_MWK">Kwacha de Malawi</option>
                                                <option value="DIVISA_ZMK">Kwacha  de Zambia</option>
                                                <option value="DIVISA_ZMW">Kwacha  de Zambia</option>
                                                <option value="DIVISA_MMK">Kyats de Birmania</option>
                                                <option value="DIVISA_GEL">Lari georgiano</option>
                                                <option value="DIVISA_HNL">Lempira de Honduras</option>
                                                <option value="DIVISA_SLL">Leone de Sierra Leona</option>
                                                <option value="DIVISA_MDL">Leu de Moldavia</option>
                                                <option value="DIVISA_RON">Leu rumano</option>
                                                <option value="DIVISA_BGN">Lev búlgaro</option>
                                                <option value="DIVISA_GBP">Libra Británica</option>
                                                <option value="DIVISA_GIP">Libra de Gibraltar</option>
                                                <option value="DIVISA_FKP">Libra de las Islas Malvinas</option>
                                                <option value="DIVISA_SHP">Libra de Santa Helena</option>
                                                <option value="DIVISA_EGP">Libra egipcia</option>
                                                <option value="DIVISA_LBP">Libra libanesa</option>
                                                <option value="DIVISA_SYP">Libra siria</option>
                                                <option value="DIVISA_SDP">Libra sudanesa</option>
                                                <option value="DIVISA_SZL">Lilangeni de Swazilandia</option>
                                                <option value="DIVISA_AZN">MANAT AZERÍ</option>
                                                <option value="DIVISA_BAM">Marco de Bosnia-Herzegovina</option>
                                                <option value="DIVISA_MZN">Metical mozambiqueño</option>
                                                <option value="DIVISA_NGN">Naira de Nigeria</option>
                                                <option value="DIVISA_ERN">Nakfa de Eritrea</option>
                                                <option value="DIVISA_BTN">Ngultrum de Bhután</option>
                                                <option value="DIVISA_TRY">Nueva Lira de Turquía</option>
                                                <option value="DIVISA_ILS">Nuevo shekel israelí</option>
                                                <option value="DIVISA_PEN">Nuevo Sol Peruano</option>
                                                <option value="DIVISA_XPD">Onza de Paladio</option>
                                                <option value="DIVISA_XPT">Onza de Platino</option>
                                                <option value="DIVISA_XAU">Onzas de Oro</option>
                                                <option value="DIVISA_XAG">Onzas de Plata</option>
                                                <option value="DIVISA_MRO">Ougulya de Mauritania</option>
                                                <option value="DIVISA_TOP">Paanga de Tonga</option>
                                                <option value="DIVISA_MOP">Pataca de Macau</option>
                                                <option value="DIVISA_ARS">Peso Argentino</option>
                                                <option value="DIVISA_CLP">Peso Chileno</option>
                                                <option value="DIVISA_COP">Peso Colombiano</option>
                                                <option value="DIVISA_CUP">Peso cubano</option>
                                                <option value="DIVISA_DOP">Peso dominicano</option>
                                                <option value="DIVISA_PHP">Peso filipino</option>
                                                <option value="DIVISA_MXN">Peso Mexicano</option>
                                                <option value="DIVISA_UYU">Peso uruguayo</option>
                                                <option value="DIVISA_BWP">Pula de Botswana</option>
                                                <option value="DIVISA_GTQ">Quetzal</option>
                                                <option value="DIVISA_ZAR">Rand sudafricano</option>
                                                <option value="DIVISA_BRL">Real</option>
                                                <option value="DIVISA_QAR">Rial de Qatar</option>
                                                <option value="DIVISA_YER">Rial de Yemen</option>
                                                <option value="DIVISA_IRR">Rial iraní</option>
                                                <option value="DIVISA_OMR">Rial omaní</option>
                                                <option value="DIVISA_KHR">Riel de Camboya</option>
                                                <option value="DIVISA_MYR">Ringgit de Malasia</option>
                                                <option value="DIVISA_SAR">Riyal de Arabia Saudita</option>
                                                <option value="DIVISA_BYR">Rublo bielorruso</option>
                                                <option value="DIVISA_RUB">Rublo ruso</option>
                                                <option value="DIVISA_IDR">Rupia de Indonesia</option>
                                                <option value="DIVISA_MVR">Rupia de Maldivas</option>
                                                <option value="DIVISA_MUR">Rupia de Mauricio</option>
                                                <option value="DIVISA_NPR">Rupia de Nepal</option>
                                                <option value="DIVISA_PKR">Rupia de Pakistán</option>
                                                <option value="DIVISA_SCR">Rupia de Seychelles</option>
                                                <option value="DIVISA_LKR">Rupia de Sri Lanka</option>
                                                <option value="DIVISA_INR">Rupia India</option>
                                                <option value="DIVISA_SDD">SDD</option>
                                                <option value="DIVISA_KGS">Som kirgistaní</option>
                                                <option value="DIVISA_TJS">Somoni tayiko</option>
                                                <option value="DIVISA_UZS">Som uzbeko</option>
                                                <option value="DIVISA_ECS">Sucre de Ecuador</option>
                                                <option value="DIVISA_BDT">Taka de Bangladesh</option>
                                                <option value="DIVISA_WST">Tala de Samoa</option>
                                                <option value="DIVISA_KZT">Tenge de Kazajstán</option>
                                                <option value="DIVISA_MNT">Togrog/Tugrik Mongolia</option>
                                                <option value="DIVISA_VUV">Vatu de Vanuatu</option>
                                                <option value="DIVISA_KPW">Won de Corea del Norte</option>
                                                <option value="DIVISA_KRW">Won de Corea del Sur</option>
                                                <option value="DIVISA_YEN">Yen japonés</option>
                                                <option value="DIVISA_JPY">Yen japonés</option>
                                                <option value="DIVISA_CNY">Yuan Chino</option>
                                                <option value="DIVISA_PLN">Zloty polaco</option>
                                            
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
                                                <option value="DIVISA_ETB">Birr de Etiopía</option>
                                                <option value="DIVISA_VEF">Bolivar Venezolano</option>
                                                <option value="DIVISA_BOB">Boliviano</option>
                                                <option value="DIVISA_GHS">Cedi ghanés</option>
                                                <option value="DIVISA_KES">Chelín keniano</option>
                                                <option value="DIVISA_SOS">Chelín somalí</option>
                                                <option value="DIVISA_TZS">Chelín tanzano</option>
                                                <option value="DIVISA_UGX">Chelín ugandés</option>
                                                <option value="DIVISA_CRC">Colón costarricense</option>
                                                <option value="DIVISA_SVC">Colón de El Salvador</option>
                                                <option value="DIVISA_NIO">Córdoba de Nicaragua</option>
                                                <option value="DIVISA_CZK">Corona checa</option>
                                                <option value="DIVISA_DKK">Corona Danesa</option>
                                                <option value="DIVISA_EEK">Corona de Estonia</option>
                                                <option value="DIVISA_ISK">Corona islandesa</option>
                                                <option value="DIVISA_NOK">Corona noruega</option>
                                                <option value="DIVISA_SEK">Corona sueca</option>
                                                <option value="DIVISA_GMD">Dalisi de Gambia</option>
                                                <option value="DIVISA_MKD">Denar de Macedonia</option>
                                                <option value="DIVISA_DZD">Dinar de Argelia</option>
                                                <option value="DIVISA_BHD">Dinar de Bahrein</option>
                                                <option value="DIVISA_IQD">Dinar de Irak</option>
                                                <option value="DIVISA_JOD">Dinar de Jordania</option>
                                                <option value="DIVISA_KWD">Dinar de Kuwait</option>
                                                <option value="DIVISA_LYD">Dinar de Libia</option>
                                                <option value="DIVISA_RSD">Dinar de Serbia</option>
                                                <option value="DIVISA_TND">Dinar de Tunez</option>
                                                <option value="DIVISA_AED">Dirham</option>
                                                <option value="DIVISA_STD">Dobra de Santo Tomé</option>
                                                <option value="DIVISA_AUD">Dólar australiano</option>
                                                <option value="DIVISA_CAD">Dólar Canadiense</option>
                                                <option value="DIVISA_BSD">Dólar de Bahamas</option>
                                                <option value="DIVISA_BBD">Dólar de Barbados</option>
                                                <option value="DIVISA_BZD">Dólar de Belice</option>
                                                <option value="DIVISA_BND">Dólar de Brunei</option>
                                                <option value="DIVISA_FJD">Dólar de Fiji</option>
                                                <option value="DIVISA_GYD">Dólar de Guyana</option>
                                                <option value="DIVISA_HKD">Dólar de Hong Kong</option>
                                                <option value="DIVISA_BMD">Dólar de las Bermudas</option>
                                                <option value="DIVISA_KYD">Dólar de las Islas Caimán</option>
                                                <option value="DIVISA_SBD">Dólar de las Islas Salomón</option>
                                                <option value="DIVISA_XCD">Dólar del este Caribeño</option>
                                                <option value="DIVISA_NAD">Dólar de Namibia</option>
                                                <option value="DIVISA_NZD">Dólar de Nueva Zelanda</option>
                                                <option value="DIVISA_SGD">Dólar de Singapur</option>
                                                <option value="DIVISA_TWD">Dólar de Taiwán</option>
                                                <option value="DIVISA_TTD">Dólar de Trinidad y Tobago</option>
                                                <option value="DIVISA_ZWD">Dólar de Zimbabwe</option>
                                                <option value="DIVISA_DOLAR_CABLE">Dolares Cable</option>
                                                <option value="DIVISA_DOLAR">Dolar Estadounidense</option>
                                                <option value="DIVISA_JMD">Dólar jamaiquino</option>
                                                <option value="DIVISA_LRD">Dólar liberiano</option>
                                                <option value="DIVISA_DOLAR_LINKED">Dolar Linked</option>
                                                <option value="DIVISA_SRD">Dólar surinamés</option>
                                                <option value="DIVISA_VND">Dong de Vietnam</option>
                                                <option value="DIVISA_CVE">Escudo caboverdiano</option>
                                                <option value="DIVISA_EUR">Euro</option>
                                                <option value="DIVISA_EURO_CABLE">Euro Cable</option>
                                                <option value="DIVISA_ANG">Florín antillano neerlandés</option>
                                                <option value="DIVISA_AWG">Florín de Aruba</option>
                                                <option value="DIVISA_HUF">Forint húngaro</option>
                                                <option value="DIVISA_XAF">Franco CFA de África central</option>
                                                <option value="DIVISA_XOF">Franco CFA de África oeste</option>
                                                <option value="DIVISA_XPF">Franco CFP</option>
                                                <option value="DIVISA_CDF">Franco congoleño</option>
                                                <option value="DIVISA_BIF">Franco de Burundi</option>
                                                <option value="DIVISA_KMF">Franco de Comoras</option>
                                                <option value="DIVISA_DJF">Franco de Djibouti</option>
                                                <option value="DIVISA_GNF">Franco de Guinea</option>
                                                <option value="DIVISA_RWF">Franco de Ruanda</option>
                                                <option value="DIVISA_CHF">Franco Suizo</option>
                                                <option value="DIVISA_HTG">Gourde haitiano</option>
                                                <option value="DIVISA_PYG">Guaraní </option>
                                                <option value="DIVISA_UAH">Hryvnia de Ucrania</option>
                                                <option value="DIVISA_PGK">Kina de Papua Nueva Guinea</option>
                                                <option value="DIVISA_LAK">Kip de Laos</option>
                                                <option value="DIVISA_HRK">Kuna croata</option>
                                                <option value="DIVISA_MWK">Kwacha de Malawi</option>
                                                <option value="DIVISA_ZMK">Kwacha  de Zambia</option>
                                                <option value="DIVISA_ZMW">Kwacha  de Zambia</option>
                                                <option value="DIVISA_MMK">Kyats de Birmania</option>
                                                <option value="DIVISA_GEL">Lari georgiano</option>
                                                <option value="DIVISA_HNL">Lempira de Honduras</option>
                                                <option value="DIVISA_SLL">Leone de Sierra Leona</option>
                                                <option value="DIVISA_MDL">Leu de Moldavia</option>
                                                <option value="DIVISA_RON">Leu rumano</option>
                                                <option value="DIVISA_BGN">Lev búlgaro</option>
                                                <option value="DIVISA_GBP">Libra Británica</option>
                                                <option value="DIVISA_GIP">Libra de Gibraltar</option>
                                                <option value="DIVISA_FKP">Libra de las Islas Malvinas</option>
                                                <option value="DIVISA_SHP">Libra de Santa Helena</option>
                                                <option value="DIVISA_EGP">Libra egipcia</option>
                                                <option value="DIVISA_LBP">Libra libanesa</option>
                                                <option value="DIVISA_SYP">Libra siria</option>
                                                <option value="DIVISA_SDP">Libra sudanesa</option>
                                                <option value="DIVISA_SZL">Lilangeni de Swazilandia</option>
                                                <option value="DIVISA_AZN">MANAT AZERÍ</option>
                                                <option value="DIVISA_BAM">Marco de Bosnia-Herzegovina</option>
                                                <option value="DIVISA_MZN">Metical mozambiqueño</option>
                                                <option value="DIVISA_NGN">Naira de Nigeria</option>
                                                <option value="DIVISA_ERN">Nakfa de Eritrea</option>
                                                <option value="DIVISA_BTN">Ngultrum de Bhután</option>
                                                <option value="DIVISA_TRY">Nueva Lira de Turquía</option>
                                                <option value="DIVISA_ILS">Nuevo shekel israelí</option>
                                                <option value="DIVISA_PEN">Nuevo Sol Peruano</option>
                                                <option value="DIVISA_XPD">Onza de Paladio</option>
                                                <option value="DIVISA_XPT">Onza de Platino</option>
                                                <option value="DIVISA_XAU">Onzas de Oro</option>
                                                <option value="DIVISA_XAG">Onzas de Plata</option>
                                                <option value="DIVISA_MRO">Ougulya de Mauritania</option>
                                                <option value="DIVISA_TOP">Paanga de Tonga</option>
                                                <option value="DIVISA_MOP">Pataca de Macau</option>
                                                <option value="DIVISA_ARS">Peso Argentino</option>
                                                <option value="DIVISA_CLP">Peso Chileno</option>
                                                <option value="DIVISA_COP">Peso Colombiano</option>
                                                <option value="DIVISA_CUP">Peso cubano</option>
                                                <option value="DIVISA_DOP">Peso dominicano</option>
                                                <option value="DIVISA_PHP">Peso filipino</option>
                                                <option value="DIVISA_MXN">Peso Mexicano</option>
                                                <option value="DIVISA_UYU">Peso uruguayo</option>
                                                <option value="DIVISA_BWP">Pula de Botswana</option>
                                                <option value="DIVISA_GTQ">Quetzal</option>
                                                <option value="DIVISA_ZAR">Rand sudafricano</option>
                                                <option value="DIVISA_BRL">Real</option>
                                                <option value="DIVISA_QAR">Rial de Qatar</option>
                                                <option value="DIVISA_YER">Rial de Yemen</option>
                                                <option value="DIVISA_IRR">Rial iraní</option>
                                                <option value="DIVISA_OMR">Rial omaní</option>
                                                <option value="DIVISA_KHR">Riel de Camboya</option>
                                                <option value="DIVISA_MYR">Ringgit de Malasia</option>
                                                <option value="DIVISA_SAR">Riyal de Arabia Saudita</option>
                                                <option value="DIVISA_BYR">Rublo bielorruso</option>
                                                <option value="DIVISA_RUB">Rublo ruso</option>
                                                <option value="DIVISA_IDR">Rupia de Indonesia</option>
                                                <option value="DIVISA_MVR">Rupia de Maldivas</option>
                                                <option value="DIVISA_MUR">Rupia de Mauricio</option>
                                                <option value="DIVISA_NPR">Rupia de Nepal</option>
                                                <option value="DIVISA_PKR">Rupia de Pakistán</option>
                                                <option value="DIVISA_SCR">Rupia de Seychelles</option>
                                                <option value="DIVISA_LKR">Rupia de Sri Lanka</option>
                                                <option value="DIVISA_INR">Rupia India</option>
                                                <option value="DIVISA_SDD">SDD</option>
                                                <option value="DIVISA_KGS">Som kirgistaní</option>
                                                <option value="DIVISA_TJS">Somoni tayiko</option>
                                                <option value="DIVISA_UZS">Som uzbeko</option>
                                                <option value="DIVISA_ECS">Sucre de Ecuador</option>
                                                <option value="DIVISA_BDT">Taka de Bangladesh</option>
                                                <option value="DIVISA_WST">Tala de Samoa</option>
                                                <option value="DIVISA_KZT">Tenge de Kazajstán</option>
                                                <option value="DIVISA_MNT">Togrog/Tugrik Mongolia</option>
                                                <option value="DIVISA_VUV">Vatu de Vanuatu</option>
                                                <option value="DIVISA_KPW">Won de Corea del Norte</option>
                                                <option value="DIVISA_KRW">Won de Corea del Sur</option>
                                                <option value="DIVISA_YEN">Yen japonés</option>
                                                <option value="DIVISA_JPY">Yen japonés</option>
                                                <option value="DIVISA_CNY">Yuan Chino</option>
                                                <option value="DIVISA_PLN">Zloty polaco</option>
                                            
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
                                <div id="divResultado"></div>
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


