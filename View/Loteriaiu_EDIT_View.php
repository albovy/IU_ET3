<?php
    class EditLot{


        var $loteria;

        function __construct($loteria=null){

            $this->loteria = $loteria;
            $this->render();



        }

        function render(){


            include '../View/Header.php'; 
?>
            <div class="formAñadir">
			<form method='POST' action='../Controller/Loteria_Controller.php?action=edit&email=<?=$this->loteria->getEmail()?>'>
			
			<div class="login">
				<label><span class="req">*</span><?= $strings['Email'] ?>:</label>
				<input type="email" id="emailAdd" name="email"  disabled value="<?=$this->loteria->getEmail()?>" maxlength="50" size=50 onblur="comprobarEmail(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Nombre'] ?>:</label>
				<input type="text" id="nombreAdd" name="nombre"  value="<?=$this->loteria->getNombre()?>" maxlength="25" size=25 onblur="comprobarAlfabetico(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Apellidos'] ?>:</label>
				<input type="text" id="apellidosAdd" name="apellidos"  value="<?=$this->loteria->getApellidos()?>" maxlength="50" size=50
				 onblur="comprobarAlfabetico(this.id,this.size)">
				<p id="oculto" hidden>debe ser</p>
			</div>
            <div class="login">
				<label><span class="req">*</span><?= $strings['Cantidad de participación'] ?>:</label>
				<input type="number" id="participacionAdd" name="participación"  value="<?=$this->loteria->getParticipacion()?>" maxlength="3" 
				 onblur="comprobarEntero(this.id,0,999)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Resguardo'] ?>:</label>
				<input type="text" id="resguardoAdd" name="resguardo" disabled value="<?=$this->loteria->getResguardo()?>" maxlength="50" size=50
				 onblur="comprobarAlfabetico(this.id,this.size)">
			</div>
			<div class="login">
				<label><span class="req">*</span><?= $strings['Ingresado'] ?>:</label>
				<select id="ingresadoAdd" name="ingresado" required>
 <?php              if($this->loteria->getIngresado() == $strings['SI']){
    ?>
                    <option value="SI" selected><?= $strings['SI']?></option>
					<option value="NO"><?= $strings['NO'] ?></option>
                    </select>
<?php
                }else{

?>
                    <option value="SI"><?= $strings['SI'] ?></option>
					<option value="NO" selected><?= $strings['NO'] ?></option>
					
				</select>
<?php
                }
?>
				
			</div>
            <div class="login">
				<label><span class="req">*</span><?= $strings['Premio'] ?>:</label>
				<input type="number" id="premioAdd" name="premio"  value="<?=$this->loteria->getPremioPersonal()?>" maxlength="6" 
				 onblur="comprobarEntero(this.id,0,999999)">
			</div>
            <div class="login">
				<label><span class="req">*</span><?= $strings['Pagado'] ?>:</label>
				<select id="pagadoAdd" name="pagado" required>
                
<?php            if($this->loteria->getPagado() == $strings['SI']){
    ?>
                    <option value="SI" selected><?= $strings['SI']?></option>
					<option value="NO"><?= $strings['NO'] ?></option>
                    </select>
<?php
                }else{
?>
                    <option value="SI"><?= $strings['SI'] ?></option>
					<option value="NO" selected><?= $strings['NO'] ?></option>
					
				</select>
<?php
                }
?>

					
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