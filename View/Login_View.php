<?php

	class Login{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
            <div class="formAñadir">
            <form method='POST' action='../Controller/Usuario_Controller.php?action=login' >
            <div class="login">
				<label><span class="req">*</span><?= $strings['Usuario'] ?>:</label>
				<input type="text" id="usuarioAdd" name="login" placeholder="<?= $strings['Tu usuario']?>.." maxlength=25 size=25 onblur="comprobarTexto(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Contraseña'] ?>:</label>
				<input type="password" id="contraseñaAdd" name="password" placeholder="<?= $strings['Tu contraseña']?>.." maxlength="20" size=20
				 onblur="comprobarTexto(this.id,this.size)">
			</div>
			
			<a href='../Controller/Usuario_Controller.php?action=register' class="registro"><?= $strings['Registrate'] ?></a>
            <button  class="buttonGuardar" onclick="return registrar()"><i class="material-icons" o>check_circle</i></button>
            </form>
			</div>
        
<?php
			include '../View/Footer.php';
        }

    }
?>