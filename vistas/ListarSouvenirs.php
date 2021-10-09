<?php
require '../framework/autoloader.php';
$usuario = $_SESSION['USER'];
?>
<!DOCTYPE html>
<html lang="en">
<?php generarHtml('header', 'DetalleConsulta'); ?>
<body>
  <?php generarHtml("NavBar", null); ?>
 
    <?php Informes::EspacioInformes($parametros); ?>
    <form method="POST">
      <h1>Listado de souvenirs</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>3</td>
            <td>buzo</td>
            <td>azul</td>
            <td>2</td>
            <td>50</td>
            <td>01/02/2021</td>
          </tr>
          <?php echo $parametros['TablaDeConsultas'];?>
        </tbody>
      </table>
</body>
<?php generarHtml('importarjs', null); ?>

</html>