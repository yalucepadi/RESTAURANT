
<div class="container" style="overflow: auto; width: 1131px; height: 500px;"><br>

 <?php 
 if (isset($_GET['action'])) {
 	if ($_GET['action']== 'okCategorias') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La categoria fue agregada con éxito!</strong>
          </div>
        </center>';
 	}
 }

  if (isset($_GET['action'])) {
 	if ($_GET['action']== 'borrarCategorias') {
 	     echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La categoría fue borrada del sistema!.</strong>
          </div>
        </center>';
 	}
 }
if (isset($_GET['action'])) {
  if ($_GET['action']== 'okEdit') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>La categoría fue editada!</strong>
          </div>
        </center>';
  }
 }
  ?>
 <div class="row">
	<div class="col-lg-8">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> LISTADO DE CATEGORIAS DE LOS PRODUCTOS</li>
 </ol>
	</div>
		<div class="col-lg-4">
		  <div class="alert alert-warning" role="alert">
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categorias" data-whatever="@mdo">
		<i class="fa fa-plus"> </i> Registrar nuevas categorías
		  </button>
		</div>
   	  </div> 
   	<div class="col-md-8 text-center">
   	  	
	 <table class="table table-bordered table-hover dt-responsive" id="tablaProductos" >
	 	<thead class="bg-primary">
	 		<tr>
	 			<td class="td" style="text-align:center;">NOMBRE CATEGORIA</td>
	 			<td class="td" style="text-align:center;">ACCIONES</td>
	 		</tr>
	 	</thead>
     <?php 

     $categorias = new CategoriasController();
     $categorias->getCategoriasController();
     $categorias->deleteCategoriasController();
    ?>

	 </table>
   <br>
    </div>
    	<div class="col-md-3 text-center">
    	  <img src="assets/img/foto4.jpg" width="350" height="285">
    	</div>

  </div>
</div>
		   <?php require 'Views/modal/modal_categorias.php'; ?>

