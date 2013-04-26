<script type="text/javascript">cargaInicio();</script>

<div class="floatLeft contenedorInicio">
	<!-- encierra  titulo texto -->
	<div class="floatLeft contenedorTituloTextoParrafoInicio">
		<div class="floatLeft contTituloTexhoInicio w100">
			<h2 class="floatLeft futura clearBoth">CADA FIN DE SEMANA</h2>
			<p class="floatLeft futura clearBoth">FRIZZ&Eacute; LLENA DE FIESTAS EL PAIS.</p>
			<div class="floatLeft buscaLaQueTeQuedaMasCerca">
				<p class="floatLeft">&iexcl;BUSCA LA QUE TE QUEDE MAS CERCA!</p>
			</div>
		</div>
		<?php 
			echo $_GET['h'];
		?>
		<div class="floatLeft">
			<form name="cargaInicio">
				<select name="cambiaProvincia">
					<option value="-"> Elija su provincia</option>
					<option value="0"> Buenos Aires </option>
	        		<option value="3"> Cordoba </option>
	        		<option value="2"> Entre Rios </option>
	        		<option value="12"> Jujuy </option>
	        		<option value="16"> Mendoza </option>
	        		<option value="17"> Neuquen </option>
	        		<option value="10"> Salta </option>
	        		<option value="15"> San Juan </option>
	        		<option value="20"> Santa Cruz </option>
	        		<option value="4"> Santa Fe </option>
	        		<option value="9"> Santiago del Estero </option>
	        		<option value="11"> Tucuman </option>
	        		<option value="12"> Jujuy </option>
	        		<option value="8"> Catamarca </option>
	        		<option value="14"> Chaco </option>
	        		<option value="13"> Formosa </option>
	        		<option value="5"> Corrientes </option>
	        		<option value="6"> Misiones </option>
	        		<option value="7"> La Rioja </option>
	        		<option value="1"> San Luis </option>
	        		<option value="23"> La Pampa </option>
	        		<option value="18"> Rio Negro </option>
	        		<option value="21"> Tierra del Fuego </option>
	        		<option value="19"> Chubut </option>
				</select>
				<input type="submit" name=" Ir " />
			</form>
		</div>
	</div>
	<!-- resplandor del mapa y mapa en svg -->
</div>
