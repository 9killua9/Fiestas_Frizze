<?php
 echo '<script type="text/javascript">  
 			buscadorSeccion(); 
 			buscadorDeDatos("'.$_GET['buscar'].'");
		</script>';
?>
<div id="toques" class="oculto">4</div>
<div id="toquesHor" class="oculto">3</div>
<div class="floatLeft sombraFondo float: left;"></div>
<div class="floatLeft contieneElCUerpoDelSitio">
	<div class="floatLeft w100 ">
		<div class="floatLeft barraAzul" >
			<img src="template/frizze_fiesta/frizze_fiesta.png" class="floatLeft frizzeFiestaMargen" />		<!-- ver si se cambia por texto -->		
			<p class="floatLeft" style="color:#fff; font-weight:bold; font-size:14px;">Eventos presentes</p>
		</div>
		<div class="floatLeft w100" style="margin-top:0px;">
			<div class="floatRight w227" style="margin-left:23px;">
				<div class="floatLeft futura textoBuscarEventos">BUSCAR EVENTOS:</div>
				<!-- buscador -->
				<form  name="buscadorFrizze" class="floatLeft buscadorFrizze" >
					<input class="buscadorInput floatLeft" placeholder="Busca tu fiesta!" name="buscar" type="text" value="" border="0" />

					<img src="template/home/buscador_img.png"  class="cursorPointer buscadorImagen floatLeft" />
				</form>
				<div class="respuestaValidadorBusqueda floatLeft"></div>
		
			</div>	
					<!-- eventos presentes -->
					<div class="floatLeft muestraElResultadoQueTraeElBuscador w100" style="margin-top:22px;"></div>

					<div class="floatLeft barraAzul" >
						<!--<img src="template/frizze_fiesta/frizze_fiesta.png" class="floatLeft frizzeFiestaMargen" />	ver si se cambia por texto -->		
						<p class="floatLeft" style="color:#fff; font-weight:bold; font-size:19px; margin-top:8px; margin-left:19px;">Eventos pasados</p>
					</div>
					<!-- eventos pasados -->
					<div class="floatLeft muestraElResultadoQueTraeElBuscadorV w100" style="margin-top:22px;"></div>

			</div>	
			
		</div>
	</div>
</div>



