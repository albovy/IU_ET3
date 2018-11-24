<?php

    class AddLot{

        function __construct(){
            $this->render();
        }

        function render(){

            include '../View/Header.php';
?> 
            <div class="formAñadir">
			<form method='POST' action='../Controller/Loteria_Controller.php?action=add' enctype="multipart/form-data">
			
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
				<label><span class="req">*</span><?= $strings['Cantidad de participación'] ?>:</label>
				<input type="number" id="participacionAdd" name="participación"  value="" maxlength="3" 
				 onblur="comprobarEntero(this.id,0,999)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Resguardo'] ?>:</label>
				<input type="file" id="resguardo" name="resguardo" onblur="validateFileNotEmpty(this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Ingresado'] ?>:</label>
				<select id="ingresadoAdd" name="ingresado" required>
					<option value="SI"><?= $strings['SI'] ?></option>
					<option value="NO"><?= $strings['NO'] ?></option>
					
				</select>
			</div>
            <div class="login">
				<label><span class="req">*</span><?= $strings['Premio'] ?>:</label>
				<input type="number" id="premioAdd" name="premio"  value="" maxlength="6" 
				 onblur="comprobarEntero(this.id,0,999999)">
			</div>
            <div class="login">
				<label><span class="req">*</span><?= $strings['Pagado'] ?>:</label>
				<select id="pagadoAdd" name="pagado" required>
					<option value="SI"><?= $strings['SI'] ?></option>
					<option value="NO"><?= $strings['NO'] ?></option>
					
				</select>
			</div>
			<a href='../index.php' class="registro"><?= $strings['Volver'] ?></a>
			<button  class="buttonGuardar" onclick="return addLot()"><i class="material-icons" o>check_circle</i></button>
		</form>
		</div>
<?php

	include '../View/Footer.php';
        }
    }
?>