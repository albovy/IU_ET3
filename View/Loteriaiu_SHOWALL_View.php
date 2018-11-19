<?php
    class ShowAll{
		var $participaciones;

            function __construct($participaciones){
				$this->participaciones = $participaciones;
				
                $this->render();
            }

            function render(){
				
                include '../View/Header.php'; 


	if(count($this->participaciones) == 0) {
		?>
					<h1 class="textoForm"><?=$strings['No hay participaciones']?></h1>
					<a href="../Controller/Loteria_Controller.php?action=add" class="buttonTablaShowNo"><i class="material-icons">person_add</i></a>
		<?php
					
				}
				else{

			?>
        		<div class="tabla">
				<h2 class="textoForm">ShowAll-admin</h2>
				<table class="table">
					<thead>
				<th>
					<a href="../Controller/Loteria_Controller.php?action=add" class="buttonTablaShow"><i class="material-icons">person_add</i></a>
					<a href="../Controller/Loteria_Controller.php?action=search"class="buttonTablaShow"><i><i class="material-icons">search</i></i></a>
				</th>
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
					foreach($this->participaciones as $participacion){
						?>
						<tr>
						<td class="tdShowAll"></td>
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
				</div>
<?php
				}

			include '../View/Footer.php';
            }






    }


?>