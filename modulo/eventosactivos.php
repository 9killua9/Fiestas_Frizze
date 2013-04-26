<?php 
	$url = "https://www.facebook.com/reiatsutest/app_308715275920663";
	$ref = "";
?>
<script type="text/javascript"> cargaFuncionesEvAc(<?php echo $_GET['id']; ?>); </script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=308715275920663";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<div class="floatLeft barraAzul positionRelative" style="z-index:10;" >
	<!-- <div class="floatLeft">FREZZ&Eacute; FIESTA</div> -->
	<img src="template/frizze_fiesta/frizze_fiesta.png" class="floatLeft frizzeFiestaMargen" />		<!-- ver si se cambia por texto -->
	<div class="volverEventos floatRight cursorPointer" >VOLVER</div>	
</div>
<div class="floatLeft sombraFondo float: left;"></div>
<div class="floatLeft contieneElCUerpoDelSitio">
<div id="cuerpoIzquierdoFF" class="floatLeft">
	<div class="floatLeft contImgFF">
		<img src="template/frizze_fiesta/img/img.jpg" class="floatLeft imgFF" id="imgBol"/>
	</div>
	<div class="floatLeft contTituloFechaFF">
		<div class="floatLeft fechaTextoFF">
			<h2 class="floatLeft futura" id="tituBol">WANNA</h2>
			<div class="floatLeft conDiaFechFF">
				<div class="floatLeft diaFF futura"></div>
				<div class="floatLeft fechaFF futura" id="fechaBol">18.03.13</div>
			</div>
			<div class="floatRight conMegEnvFF futura">
				<div class="floatLeft conMeGustaFF"><div class="fb-send" data-href="<?php echo $url; ?>" ref="unique-to-each-user" fb-source="2323223"></div></div>		<!-- ENVIAR DE FACEBOOK -->
			</div>
		</div>
		<div class="floarLeft conParrafoFF">
			<p class="floatLeft futura" id="textoBol">
				Cargando ...
 			</p>
		</div>

	</div>
</div> <!-- termina box izquirdo  -->
<div id="cuerpoDerechoFF" class="floatLeft">
	<div class="futura blanco w100 tituloUbicacion"> UBICACI&Oacute;N: </div>
	<div class="floatLeft w100">
		<input type="hidden" id="address" name="address" value=""/>
		<div id="mapaDeGoogle" style="width:239px;height:289px;"><div id="mapaMod"  style="width:239px;height:289px;" class="positionAbsolute"></div></div>
	</div>
	<div class="floatLeft w100 muestraDireccion futura" id="dirBol"> Juan B justo </div>
	<hr class="divisor">
	<div class="floatLeft w100 asociateAlEvento">
		<form name="guardaAsociado">
			<input type="hidden" name="id" value="" />
			<div class="futura floatLeft avisoEmail">Ingres&aacute; tu email para tener un recordatorio del evento.</div>
			<input type="text" name="email" class="aviso button1" placeholder="example@example.com" value="" />
			<div class="clearBoth"></div>
			<input type="submit" class="floatRight submitEnviar button1" value=" ENVIAR " />
		</form>
	</div>
</div> <!-- termina Box derecho -->
</div>