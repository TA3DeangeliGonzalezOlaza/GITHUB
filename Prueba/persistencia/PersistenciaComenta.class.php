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

	
   public function consTodosPub($obj, $conex)
   {
		$id_pub= trim($obj->getIdpubcom());
        $sql = "select * from comenta where id_pubcom=:id_pub";
		
        $result = $conex->prepare($sql);
		$result->execute(array(":id_pub" => $id_pub));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
    
   public function comenta($obj, $conex)
   {
       $id_usucom = $obj->getIdusucom();
	   $id_pubcom = $obj->getIdpubcom();
	   $comentario = $obj->getComentario();
        $sql = "insert into comenta (id_usucom,id_pubcom,comentario) values (:id_usucom,:id_pubcom,:comentario)";
		
        $result = $conex->prepare($sql);
		$result->execute(array(":id_usucom" => $id_usucom,":id_pubcom" => $id_pubcom,":comentario" => $comentario));

    }


   public function denuncom($obj, $conex)
   {
       $id_comen = $obj->getIdcomen();
	   $id_pubcom = $obj->getIdpubcom();
        $sql = "Update `comenta` Set denunciado_com=1 where id_comen=:id_comen and id_pubcom=:id_pubcom";
				
        $result = $conex->prepare($sql);
		$result->execute(array(":id_comen" => $id_comen,":id_pubcom" => $id_pubcom));

    }		
	
	   public function consComUsu($obj, $conex)
   {
        $id_usucom =($obj->getIdusucom());   
        $sql = "select * from comenta where id_usucom=:id_usucom order by denunciado_com desc";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usucom" => $id_usucom));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	
	
 }

?>
