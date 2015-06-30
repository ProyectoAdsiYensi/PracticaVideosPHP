<?php
class dimealgo{
	var $atributo;
	
	function dimealgo($algo){
	//creacion de un primer objeto  
     //echo "lo que te voy a decir es ".$algo. " como estas ";
     //metodos que usan atributos
     $this-> atributo = $algo;
     echo $this -> atributo;



	}
}

$decir = new dimealgo("hola");


//llamado a un metodo concreto
//herencia de clases 

class saluda{
	function saludo() {echo "yo te saludo ";}

	function adios() {echo "yote digo adios";}

}



class subsaluda extends saluda{
    var $atributo;
    function holados(){}

}
$instancia = new subsaluda();
$ins=$instancia-> adios();


?>
