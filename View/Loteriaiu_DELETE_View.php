<?php

    class DeleteCurrent{

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
		

		<a href="../index.php" class="buttonTablaDeleteCancelar"><i class="material-icons">clear</i></a>
		<a class="buttonTablaDeleteBorrar" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">delete</i></a>



		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $strings['Borrar']?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<?=$strings['¿Seguro que quiere borrar los datos?']?>
					</div>
					<div class="modal-footer">
						<a  class="btn btn-secondary" data-dismiss="modal"><?=$strings['NO']?></a>
						<a href="../Controller/Loteria_Controller.php?action=delete&email=<?=$this->loteria->getEmail()?>&delete=SI" class="btn btn-primary"><?=$strings['SI']?></a>
					</div>
				</div>
			</div>
		</div>

	</div>
		</div>

<?php   
            include '../View/Footer.php';
        }



    }
?>