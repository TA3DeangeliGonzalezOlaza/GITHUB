<?php
class PersistenciaTransaccion
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
  

   public function consTodos( $conex)
   {
       
        $sql = "select * from transaccion";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
    
   public function consUno($obj, $conex)
   {
        $id_usut= trim($obj->getIdusuario());   
        $sql = "select * from transaccion where id_usut=:id_usut";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usut" => $id_usut));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }


   public function agregar($obj,$conex)
   {
		$id_usut= trim($obj->getIdusuario());
		$id_pubt= trim($obj->getIdpublicacion());
		$precio_finalt= trim($obj->getPreciofinal());
		$fechat= trim($obj->getFecha());
		$cantidad= trim($obj->getCantidad());
		$comision_monto= trim($obj->getComision());
		
        $sql = "insert into transaccion (id_usut,id_pubt,precio_finalt,fechat,cantidad,comision_monto) values (:id_usut,:id_pubt,:precio_finalt,:fechat,:cantidad,:comision_monto)";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usut" => $id_usut,":id_pubt" => $id_pubt,":precio_finalt" => $precio_finalt,":fechat"=>$fechat,
		":cantidad"=>$cantidad,":comision_monto"=>$comision_monto));

    }	
	
	
	   public function consMax($obj, $conex)
   {
        $id_usut= trim($obj->getIdusuario());   
        $sql = "select nom1_per, count(id_pubt) from persona, usuario, publicacion, transaccion where id_per=id_personau and id_usu=id_usup and id_pub=id_pubt GROUP BY (nom1_per); ";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function consPubMasVen($obj, $conex)
   {
         
        $sql = "select id_pub, nom_pub, count(id_pubt) as cantidad from publicacion, transaccion where id_pub=id_pubt group by id_pubt  
ORDER BY `cantidad`  DESC LIMIT 10; ";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
		
 }

?>
