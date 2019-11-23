<?php 

require_once 'Views/modules/ventas/conexion.php';


	date_default_timezone_set('America/Argentina/Buenos_Aires');
	if (isset($_POST['submit'])) {
		$buscar = $_POST['buscar'];
		$buscar= date("Y-m-d", strtotime($buscar));
       // echo "$buscar";
		$sql = $conexion->prepare("SELECT * FROM reservas WHERE diallegada LIKE :diallegada OR nombrecliente LIKE :nombrecliente");
		$resultado = $sql->execute(array(':diallegada'=> "%$buscar%",
			                              ':nombrecliente'=>"%$buscar%"));
		$resultado = $sql->fetchAll(PDO::FETCH_OBJ);
	if (empty($resultado)) {
		$titulo = 'No se encontraron reservas para el día  : '  .date("d-m-Y", strtotime($buscar));
		echo "<br><br><br><br>";
	} else {
		$titulo = 'La(s) reserva(s) encontradas del día : '  .date("d-m-Y", strtotime($buscar));
	}
	
}

 ?>

<div class="container">
<br>
<ol class="breadcrumb">
	<h1><li class="breadcrumb-item active"> <?php echo $titulo ;?></li></h1><a href="reservas"><i class="fa fa-undo" aria-hidden="true"> Volver Reservas</a></i>
</ol>	

<table class="table table-bordered">
<thead class="thead">
	<th>Nombre Cliente</th>
	<th>Cantidad de personas</th>
	<th>Teléfono</th>
	<th>Dia Reserva</th>
	<th>Hora Deseada</th>
	<th>Observaciones</th>
	<th>Editar o Eliminar</th>
</thead>
<?php foreach($resultado as $resultados): ?>
	
<tbody>
	<td  class=" alert-danger"><?php echo $resultados->nombrecliente; ?></td>
	<td  class=" alert-danger" align="center"><?php echo $resultados->cantidadpersonas; ?></td>
	<td  class=" alert-danger"><?php echo $resultados->telefono; ?></td>
	<td  class=" alert-danger"><?php echo date("d-m-Y", strtotime($resultados->diallegada)) ; ?></td>
	<td  class=" alert-danger" align="center"><?php echo $resultados->horallegada; ?></td>
	<td class=" alert-danger"><?php echo $resultados->observaciones; ?></td>
   <td  class=" alert-danger">&nbsp; &nbsp;
   <a href="index.php?action=editarReservas&idreserva=<?php echo $resultados->idreserva;?>"><i class="fa fa-edit btn btn-primary btn-sm "></i></a>
		<a href="index.php?action=reservas&idBorrar=<?php echo $resultados->idreserva;?>"<i class="fa fa-trash-o btn btn-danger btn-sm"></i></a></td>
</tbody>
<?php endforeach; ?>
</table>
<br>
<br>
<br>
</div>

