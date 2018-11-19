<?php
    
    class Search{

		var $loterias;

        function __construct($loterias = null){

			$this->loterias = $loterias;

            $this->render();

        }

        function render(){

            include '../View/Header.php'; 

?>
            <div class="formBuscar">
		    <form method='POST' action='../Controller/Loteria_Controller.php?action=search&results=yes'>
			<h2 class="textoForm"><?= $strings['Buscar']?></h2>
                <div class='buscar'>
					<input type="email" id="email" name="email" placeholder="<?= $strings['Email']?>..">
				</div>
				<div class='buscar'>
					<input type="text" id="nombre" name="nombre" placeholder="<?= $strings['Nombre']?>..">
				</div>
				<div class='buscar'>
					<input type="text" id="apellidos" name="apellidos" placeholder="<?= $strings['Apellidos']?>..">
				</div>
				<div class='buscar'>
					<input type="text" id="resguardo" name="resguardo" placeholder="<?= $strings['Resguardo']?>..">
                </div>
                <div class='buscar'>
					<input type="number" id="participacion" name="participación" placeholder="<?= $strings['Cantidad de participación']?>..">
                </div>
                <div>
				<div class='buscar'>
					<input type="text" id="ingresado" name="ingresado" placeholder="<?= $strings['Ingresado']?>..">
                </div>
				
				<div class='buscar'>
					<input type="number" name="premio"  value="" placeholder="<?= $strings['Premio']?>..">
				</div>
				<div class='buscar'>
					<input type="text" id="pagado" name="pagado" placeholder="<?= $strings['Pagado']?>..">
                </div>
                

				<button class="buttonBuscar"><i class="material-icons">search</i></button>

			</div>
			</div>
			



		</form>
		</div>
		
		
<?php
		if(isset($this->loterias)){
?>
			<div class="tabla">
				<h2 class="textoForm"><?= $strings['Resultados']?></h2>
				<table class="table">
					<thead>
				
				<th class="thShowAll"><?= $strings['Email'] ?></th>
				<th class="thShowAll"><?= $strings['Nombre'] ?></th>
				<th class="thShowAll"><?= $strings['Apellidos'] ?></th>
				<th class="thShowAll"><?= $strings['Resguardo'] ?></th>
				<th class="thShowAll"><?= $strings['Cantidad de participación'] ?></th>
				
				<th class="thShowAll"><?= $strings['Ingresado'] ?></th>
				<th class="thShowAll"><?= $strings['Premio'] ?></th>
				<th class="thShowAll"><?= $strings['Pagado'] ?></th>
					</thead>
					<tbody>
				<?php 
					foreach($this->loterias as $participacion){
						?>
						<tr>
						
						<td class="tdShowAll"><?= $participacion->getEmail() ?></td>
						<td class="tdShowAll"><?= $participacion->getNombre() ?></td>
						<td class="tdShowAll"><?= $participacion->getApellidos() ?></td>
						<td class="tdShowAll"><?= $participacion->getResguardo() ?></td>
						<td class="tdShowAll"><?= $participacion->getParticipacion() ?></td>
						
						<td class="tdShowAll"><?= $strings[$participacion->getIngresado()] ?></td>
						<td class="tdShowAll"><?= $participacion->getPremioPersonal() ?></td>
						<td class="tdShowAll"><?= $strings[$participacion->getPagado()] ?></td>
						<td class="tdShowAll"><a href="../Controller/Loteria_Controller.php?action=edit&email=<?=$participacion->getEmail()?>"><i class="material-icons tdShowIcons">create</i></a>
						<a href="../Controller/Loteria_Controller.php?action=showcurrent&email=<?=$participacion->getEmail()?>"><i class="material-icons tdShowIcons">visibility</i></a>
						<a href="../Controller/Loteria_Controller.php?action=delete&email=<?=$participacion->getEmail()?>"><i class="material-icons tdShowIcons">delete</i></a></td>
						<tr>
<?php
					}
?>
					</tbody>
				</table>
				<a href="../Controller/Loteria_Controller.php?action=search" class="buttonTablaDeleteAtras"><i class="material-icons">arrow_back</i></a>
				</div>
<?php

		}
        include '../View/Footer.php';
        }


    }
?>