<?php 
	$url = "https://www.facebook.com/reiatsutest/app_308715275920663";
	$ref = "";
?>
<script type="text/javascript"> cargaFuncionesEvPas(<?php echo $_GET['id']; ?>); </script>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=308715275920663";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<div class="floatLeft barraNaranja positionRelative" style="z-index:10;" >
	<!-- <div class="floatLeft">FREZZ&Eacute; FIESTA</div> -->
	<img src="template/frizze_fiesta/frizze_fiesta.png" class="floatLeft frizzeFiestaMargen" />		<!-- ver si se cambia por texto -->	
	<div class="volverEventos floatRight cursorPointer" >VOLVER</div>	
</div>
<div class="floatLeft sombraFondo float: left;"></div>
<div class="floatLeft contieneElCUerpoDelSitio">
<!-- box izquierdo -->
<div id="cuerpoIzquierdoFF" class="floatLeft">
	<div class="floatLeft contImgFF">
		<img src="template/frizze_fiesta/img/img.jpg" class="floatLeft imgFF" id="imgBol" />
	</div>
	<div class="floatLeft contTituloFechaFF">
		<div class="floatLeft fechaTextoFF">
			<h2 class="floatLeft futura"  id="tituBol">WANNA</h2>
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
				Cargando...
			</p>
		</div>

	</div>
</div> <!-- termina box izquirdo  -->
<div id="cuerpoDerechoFF" class="floatLeft">
	<div class="futura blanco w100 tituloUbicacion" style="background: #000000; z-index: 3; position: relative; margin-left: -33px; width: 270px; border-radius: 12px 12px 0 0; padding: 5px; margin-bottom: -3px; font-size: 21px;text-align:center;"> Cover photo en facebook: </div>
	<div class="floatLeft w100" id="cargaFotelis" style="margin-left: -33px;">
		
	</div>

	<div class="textAlignCenter floatLeft w100 muestraDireccion menos51px futura"> <a href="" target="_blank" class="blanco eve">Ver galer&iacute;a en facebook </a></div>
</div> <!-- termina Box derecho -->
</div>