<?php 

$aCarrito = array();
$sHTML = '';
$fPrecioTotal = 0;
$existe = 0;
$total = 0;

//Vaciamos el carrito
if(isset($_GET['vaciar'])) {
	unset($_COOKIE['carrito']);
	$sHTML .= 'El carrito está vacio';
}

//Obtenemos los productos anteriores
if(isset($_COOKIE['carrito'])) {
	$aCarrito = unserialize($_COOKIE['carrito']);
}

//añadir un nuevo producto al carrito
if(isset($_GET['nombre']) && isset($_GET['precio'])) {


	for($i = 0; $i< sizeof($aCarrito); $i++) {
	    if($aCarrito[$i]['nombre'] == $_GET['nombre']) {
		$aCarrito[$i]['cantidad'] = $aCarrito[$i]['cantidad'] + 1;
		$existe = 1;
		
	    }
	}

	$total +=  $_POST['cantidad']*$_GET['precio'];//La variable total nos permite calcular el coste total de los libros comprados

	



	if($existe == 0) {
		$iUltimaPos = count($aCarrito);
		$aCarrito[$iUltimaPos]['nombre'] = $_GET['nombre'];
		$aCarrito[$iUltimaPos]['precio'] = $_GET['precio'];
		$aCarrito[$iUltimaPos]['cantidad'] = $_POST['cantidad'];
		
		
        }
	
		



	
}

//Creamos la cookie
$iTemCad = time() + ((60 * 60)*24); //así nos aseguramos de que dure un día, en el ejemplo resuelto era una hora.
setcookie('carrito', serialize($aCarrito), $iTemCad);



//Imprimimos el contenido del array
$sHTML .= '<table style="width:500px;">';
$sHTML .= '<tr><td><b>Nombre</b></td><td><b>Precio</b></td><td><b>Cantidad</b></td></tr>';
foreach ($aCarrito as $key => $value) {
	$sHTML .= '<tr>';
	$sHTML .= '<td>' . $value['nombre'] . '</td><td>' . $value['precio']*$value['cantidad'] . '</t><td>' . $value['cantidad']  . '</td>';
	$sHTML .= '</tr>';
	$fPrecioTotal += $value['precio']*$value['cantidad'];//
}
$sHTML .= '</table>';


//Imprimimos el precio total


?>
<!DOCTYPE html>
<html lang="es-ES">
<link rel="stylesheet" href="./css/carritostyle.css">
<head>
	<meta charset="UTF-8">
	<title>carrito</title>
</head>
<body>
	<div>
		<?php echo $sHTML; 
		echo '<table style="width:500px;"><td>TOTAL: </td>' .'<td>' . $fPrecioTotal .' €</td></table> '; ?>
	</div>
<br>
<div class="botones">
	<button><a href="carrito.php?vaciar=1">vaciar carrito</a></button>
     <br>
    <button><a href="index.html">Volver al Menu</a></button></div>

</body>
</html>