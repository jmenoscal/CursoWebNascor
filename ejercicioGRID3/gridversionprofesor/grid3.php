<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="grid3.css">
</head>
<body>
	<?php 
	$datos = array(
		array("Título en h2", "Descripcion en el <p>", "imagenes/llegar.png"),
		array("Título en h2 bis", "Descripcion en el <p> bis", "imagenes/que_se_nos_da_bien.png"),
		array("Título en h2 bis", "Descripcion en el <p> bis", "imagenes/quienes_somos.png"),
		array("Título en h2 bis", "Descripcion en el <p> bis", "imagenes/que_se_nos_da_bien.png"),
	
	);
	$clase="";
	foreach($datos as $dato){ 
		if ($clase == "ordenInverso"){
			$clase = "";
		}else{
			$clase="ordenInverso";
		}
		
		?>
	<div class="caja">
	    <img src="<?php echo $dato[2]; ?>" class="<?php echo $clase ?>">
		<div class="texto">
			<h2><?php echo $dato[0]; ?></h2>
			<p><?php echo $dato[1]; ?></p>
		</div>
	</div>
	<?php }?>
	


</body>
</html>