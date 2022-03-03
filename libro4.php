<?php

?>



</script>

<DOCTYPE! html>
<head>
<title>Walden</title> <meta charset="utf-8">
<link rel="stylesheet" href="./css/styleproducto.css">

</head>
<body>

<div id="product-grid">
    <div class="txt-heading">Productos disponibles</div>
	<div class="product-item">
	    <form method="post" action="carrito.php?nombre=walden&precio=17">
		<div class="product-image"><img src="./imagenes/walden.jpg"></div>
		<div><strong>Walden</strong></div>
		<div class="product-price">17 €</div>
		<div><input type="text" name="cantidad" value="1" size="2" /><input type="submit" value="Añadir al carro" class="btnAddAction" /></div>
	    </form>
	</div>

    </div>
</div>
</body>
</html>