<?php

    class ShowCurrent{
        

        var $loteria;


        function __construct($loteria){
            $this->loteria = $loteria;
            $this->render();
        }

        function render(){


            include '../View/Header.php';
?>
            <div class="tabla">
		<h2 class="textoForm">ShowCurrent</h2>
		<table class="table">
			<thead>
				<th> </th>
				<th class="thDeleteOrTupla"><?= $strings['Datos seleccionados'] ?></th>
			</thead>
			<tbody>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Email'] ?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getEmail()   ?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Nombre'] ?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getNombre()?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Apellidos']?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getApellidos()?></td>
				</tr>

				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Resguardo']?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getResguardo()?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Cantidad de participación'] ?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getParticipacion()?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Ingresado']?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getIngresado()?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Premio']?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getPremioPersonal()?></td>
				</tr>
				<tr>
					<td class="tdColDeleteOrTupla"><?= $strings['Pagado']?>:</td>
					<td class="tdDeleteOrTupla"><?= $this->loteria->getPagado()?></td>
				</tr>
				

			</tbody>
		</table>
		

		<a href="../index.php" class="buttonTablaDeleteAtras"><i class="material-icons">arrow_back</i></a>
		</div>


<?php
		include '../View/Footer.php';
		}

		






	}
?>