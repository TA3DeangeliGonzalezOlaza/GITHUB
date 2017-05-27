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


   public function compra($obj,$conex,$IdEsp,$IdSec,$IdUsu,$IdLug,$cant,$preciofinal)
   {
        $id_usut=trim($IdUsu);
		$id_pubt=trim($IdSec);
		$precio_finalt=trim($IdEsp);
		$fechat=trim($preciofinal);
		$cantidad=trim($cambiar);
		$calificaciont=trim($cambiar);
		$pago_comision=trim($cambiar);
		
        $sql = "insert into transaccion (id_usut,id_pubt,precio_finalt,fechat,cantidad,calificaciont,pago_comision) values (:id_usut,:id_pubt,:precio_finalt,:fechat,:cantidad,:calificaciont,:pago_comision)";
		
		$sql2="update publicacion set stock_pub= stock_pub-:cantidad where id_pub=:id_pub";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usut" => $id_usut,":id_pubt" => $id_pubt,":precio_finalt" => $precio_finalt,":fechat"=>$fechat,":cantidad"=>$cantidad,":calificaciont"=>$calificaciont,":pago_comision"=>$pago_comision));
		$result2 = $conex->prepare($sql2);
	    $result2->execute(array(":id_pub" => $id_pubt,":cantidad"=>$cantidad));
		//$resultados=$result->fetchAll();
       

       //return $resultados;
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
