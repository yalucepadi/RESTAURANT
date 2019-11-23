
 <div class="container"><br>
 

 <?php  
 if (isset($_GET['action'])) {
   if($_GET['action'] == 'okReservas'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La reserva fue agregada satifactoriamente al sistema! </strong>
          </div>
        </center>';
   }

   if($_GET['action'] == 'borrarReservas'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La reserva fue borrada del sistema!</strong>
          </div>
        </center>';
   }
 }

  if($_GET['action'] == 'cambioReservas'){
        echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La reserva ha sido editada!</strong>
          </div>
        </center>';
   }
 

 ?>
<div class="card">
<div class="row">
  <div class="col-md-8">  
    <ol class="breadcrumb">
       <li class="breadcrumb-item active"><i class="fa fa-list"> </i> LISTADO DE RESERVAS </li>
    </ol>
  </div>
    <div class="col-md-4">  
     <div class="alert alert-warning" role="alert">

         <strong>Reservas Activas : </strong>
          <?php $vistaReservas = new MvcController();
                 $vistaReservas->totalReservasController();
           ?>                                     
    </div>
  </div>
    <br><br><br>
    <div class="col-md-7">
    <form method="post" class="form-control" action="index.php?action=buscarReservas">  
      <input type="text" class="form-control" id="datepicker" name="buscar" placeholder="Buscar reservas por fechas" required=""><br>
       <input type="submit" name="submit" class="btn btn-warning " value="Buscar">
    </form>
  </div>
  <div class="col-md-2">
<?php require 'Views/modal/modal_reserva.php'; ?>
  <div class="alert alert-warning" role="alert">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reserva" data-whatever="@mdo">
  Generar nueva reserva
  </button>
</div>
</div>
  <div class="card-block">
    <p class="card-text">
       <table class="table table-bordered">
    <thead class="thead">
       <tr>
            <td style="text-align:center;">Cliente</td>
            <td style="text-align:center;">Comensales</td>
            <td style="text-align:center;">Teléfono</td>
            <td style="text-align:center;">Dia</td>
            <td style="text-align:center;">Hora</td>
            <td style="text-align:center;">Observaciones</td>
            <td style="text-align:center;">Acciones</td>
      </tr>
          </thead>

    <tbody>
      <?php 
        $vistaUsuario = new MvcController();
        $vistaUsuario->getReservasController();
        $vistaUsuario->deleteReservasController();
       ?>
    </tbody>
  </table>
</div>
    </p>
</div>
  
  </div>
</div>
 </div>

</div>


