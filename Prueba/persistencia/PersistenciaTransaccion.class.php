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
		
        $sql = "insert into transaccion (id_usut,id_pubt,precio_finalt,fechat,cantidad,calificaciont,comision_monto) values (:id_usut,:id_pubt,:precio_finalt,:fechat,:cantidad,0,:comision_monto)";
		$sql2 = "UPDATE `publicacion` SET stock_pub= stock_pub-:cantidad WHERE id_pub=:id_pubt";
		
        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id_usut" => $id_usut,":id_pubt" => $id_pubt,":precio_finalt" => $precio_finalt,":fechat"=>$fechat,
		":cantidad"=>$cantidad,":comision_monto"=>$comision_monto));
		
		$result2 = $conex->prepare($sql2);		
		$result2->execute(array(":cantidad" => $cantidad,":id_pubt" => $id_pubt));

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
	
	
	    public function consComp($obj, $conex)
   {
        $id_usut= trim($obj->getIdusuario());   
        $sql = "select * from transaccion , publicacion where id_usut=:id_usut and id_pubt = id_pub order by califico ASC";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usut" => $id_usut));
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    
    }	
	
	   public function califi($obj, $conex)
   {
        $id_trans =($obj->getIdtransaccion());
        $id_usut =($obj->getIdusuario());
		$id_pubt =($obj->getIdpublicacion());
		$calificaciont =($obj->getCalificacion());
		$comentariot =($obj->getComentariot());
 		
        $sql = "UPDATE `transaccion` SET `calificaciont` = :calificaciont, `comentariot` = :comentariot, `califico` = '1' WHERE `transaccion`.`id_trans` = :id_trans AND `transaccion`.`id_usut` = :id_usut AND `transaccion`.`id_pubt` = :id_pubt;";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_trans" => $id_trans,":id_usut" => $id_usut,":id_pubt" => $id_pubt,":calificaciont" => $calificaciont,":comentariot" => $comentariot));

    }		
	
	
	
		
 }

?>
