<?php

	class Register{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?> 
			<div class="formAñadir">
			<form method='POST' action='../Controller/Usuario_Controller.php?action=register'>
			
			<div class="login">
				<label><span class="req">*</span><?= $strings['Dni'] ?>:</label>
				<input type="text" id="dniAdd" name="dni"  maxlength=9 size=9 onblur="comprobarDni(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Teléfono'] ?>:</label>
				<input type="text" id="telefonoAdd" name="telefono"  maxlength=25 onblur="comprobarTelf(this.id)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Usuario'] ?>:</label>
				<input type="text" id="usuarioAdd" name="login"  maxlength=25 size=25 onblur="comprobarTexto(this.id,this.size)">
			</div>
			<div class="login"> 
				<label><span class="req">*</span><?= $strings['Contraseña'] ?>:</label>
				<input type="password" id="contraseñaAdd" name="password"  maxlength="20" size=20
				 onblur="comprobarTexto(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Fecha de nacimiento'] ?>:</label>
				<input type="text" id="dateAdd" name="fechaNac" class="tcal" value=""  readonly>
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Grupo de prácticas'] ?>:</label>
				<select id="grupoPracticoAdd" name="grupoPractico">
					<option value="IU1">IU1</option>
					<option value="IU2">IU2</option>
					<option value="IU3">IU3</option>
					<option value="IU4">IU4</option>
					<option value="IU5">IU5</option>
					<option value="IU6">IU6</option>
				</select>
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Email'] ?>:</label>
				<input type="email" id="emailAdd" name="email"  value="" maxlength="50" size=50 onblur="comprobarEmail(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Nombre'] ?>:</label>
				<input type="text" id="nombreAdd" name="nombre"  value="" maxlength="25" size=25 onblur="comprobarAlfabetico(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Apellidos'] ?>:</label>
				<input type="text" id="apellidosAdd" name="apellidos"  value="" maxlength="50" size=50
				 onblur="comprobarAlfabetico(this.id,this.size)">
				<p id="oculto" hidden>debe ser</p>
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Titulación'] ?>:</label>
				<input type="text" id="titulacionAdd" name="titulacion"  value="" maxlength="60" size=60
				 onblur="comprobarAlfabetico(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Curso académico'] ?>:</label>
				<select id="cursoAcademico" name="curso" required>
					<option value="1">1º</option>
					<option value="2">2º</option>
					<option value="3">3º</option>
					<option value="4">4º</option>
				</select>
			</div>
			<a href='../index.php' class="registro"><?= $strings['Volver'] ?></a>
			<button  class="buttonGuardar" onclick="return registrar()"><i class="material-icons" o>check_circle</i></button>
		</form>
		</div>
<?php
			
		include '../View/Footer.php';
		}
	}
?>