<?php
class PersistenciaComenta
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
  

   public function consTodos( $conex)
   {
       
        $sql = "select * from comenta";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
    
   public function consUno($obj, $conex)
   {
        $id_usucom= trim($obj->getIdusu());   
        $sql = "select * from comenta where id_usucom=:id_usucom";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usucom" => $id_usucom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

//HAY QUE TERMINARLA
   public function comenta($obj,$conex,$IdEsp,$IdSec,$IdUsu,$IdLug,$cant,$preciofinal)
   {
        $id_comen=trim($IdUsu);
		$id_usucom=trim($IdSec);
		$id_pubcom=trim($IdEsp);
		$comentario=trim($preciofinal);
		$denunciado_com=trim($cambiar);

		
        $sql = "insert into comenta (id_comen,id_usucom,id_pubcom,comentario,denunciado_com) values (:id_comen,:id_usucom,:id_pubcom,:comentario,:denunciado_com)";
		
		$sql2="update publicacion set stock_pub= stock_pub-:cantidad where id_pub=:id_pub";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_comen" => $id_comen,":id_usucom" => $id_usucom,":id_pubcom" => $id_pubcom,":comentario"=>$comentario,":denunciado_com"=>$denunciado_com));
		$result2 = $conex->prepare($sql2);
	    $result2->execute(array(":id_pub" => $id_pubt,":cantidad"=>$cantidad));
		//$resultados=$result->fetchAll();
       

       //return $resultados;
    }	
	
 }

?>
