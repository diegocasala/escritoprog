<?php
require '../framework/autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">


<?php generarHtml('header' , 'DetalleConsulta');?>


<body>
    
        
    <h1>Baja de souvenirs</h1>
       
        <?php Informes::EspacioInformes($parametros); ?>
        <form method="POST">
            <p>

                <label for="IdSouvenirs" >id</label>
                <input type="number"  name="IdSouvenirs" id="IdSouvenirs" value="3" disabled >
            </p>
            <p> 
                <label for="NombreSouvenirs" >nombre</label>
                <input type="text"  name="NombreSouvenirs" id="NombreSouvenirs" value="3" disabled >
            </p>
            <p>
                <label for="DescripcionSouvenirs" >Descripcion</label>
                <input type="text"  name="DescripcionSouvenirs" id="DescripcionSouvenirs"value="3" disabled >
            </p>
            <p>
                <label for="StockSouvenirs" >Stock</label>
                <input type="number"  name="StockSouvenirs" id="StockSouvenirs" value="3" disabled >
            </p>
            <p>  
                <label for="PrecioSouvenirs" >Precio</label>
                <input type="number"  name="PrecioSouvenirs" id="PrecioSouvenirs" value="3" disabled >
            </p>
            <p>
                <label for="FechaDeAltaSouvenirs" >Fecha De Alta</label>
                <input type="text"  name="FechaDeAltaSouvenirs" id="FechaDeAltaSouvenirs" value="3" disabled >
            </p>
            <p>  
               
                <button type="submit" >borrar</button>
            </p>
             
            </form>
    
    <?php generarHtml('importarjs' , null);?>
</body>


</html>