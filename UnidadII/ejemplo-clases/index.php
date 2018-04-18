<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include("class/class-usuario.php");
		include("class/class-post.php");
		include("class/class-meme.php");
		include("class/class-comentario.php");
		
		//__construct($codigoUsuario,$nombreUsuario,$genero,$edad,$correo)
		$u = new Usuario(5,"Juan","M",25,"jperez@gmail.com");
		$u2 = new Usuario(4,"Pedro","M",25,"pmartinez@gmail.com");

		//$u->setCodigoUsuario(5);
		//$u->codigoUsuario = 5; Sin encapsulación.
		//echo "El codigo del usuario es: " . $u; //Llama al metodo __toString
/*
		$m = new Meme(1,"Lorem Ipsum dolor","12/21/2012",$u,5,"http:///....","Lista comentarios");

		echo "<br>" . $m;
		//No se puede instanciar
		//$p = new Post(1,"Lorem ipsum","12/12/12",$u);

		$c = new Comentario(1,"Lorem ipsum","12/12/12",$u, null);
		
*/		
		//Los atributos estaticos pueden ser accedidos sin crear una instancia
		//Se coloca el nombre clase luego cuatro puntos y el nombre del atributo con el signo de dolar.
		Usuario::$atributoEstatico = "Este es el valor del atributo estatico";
		$u::$atributoEstatico = "Otro valor";
		$u2::$atributoEstatico = "Nuevo valor";
		//$u::CONSTANTE; //Fuera de la clase
		//self::CONSTANTE; //Dentro de la clase
		//$u->atributo; //Atributos normales

		echo "Resultado: ". Usuario::$atributoEstatico;
	?>
</body>
</html>