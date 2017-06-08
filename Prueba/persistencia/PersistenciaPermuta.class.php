<?php
class PersistenciaPermuta
{

  

   public function consTodos( $conex)
   {
       
        $sql = "select * from permuta";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
    
   public function consUno($obj, $conex)
   {
        $id_permuta= trim($obj->getIdpermuta());   
        $sql = "select * from permuta where id_permuta=:id_permuta";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_permuta" => $id_permuta));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }


    public function solic($obj, $conex)
   {
       $id_pub1 = $obj->getIdpub1();
	   $id_pub2 = $obj->getIdpub2();
	   $fechap = $obj->getFecha();
	   $id_ususolper = $obj->getIdususolper();
	   $id_usurecper = $obj->getIdusurecper();
	   
        $sql = "insert into permuta (`id_pub1`, `id_pub2`, `fechap`, `solicita_permuta`, `permutar`, `id_ususolper`, `id_usurecper`) values (:id_pub1,:id_pub2,:fechap,1,1,:id_ususolper,:id_usurecper)";
		$sql2 = "UPDATE `publicacion` SET stock_pub= stock_pub-1 WHERE id_pub=:id_pub2";
		
        $result = $conex->prepare($sql);
		$result->execute(array(":id_pub1" => $id_pub1,":id_pub2" => $id_pub2,":fechap" => $fechap,":id_ususolper" => $id_ususolper,":id_usurecper" => $id_usurecper));

		$result2 = $conex->prepare($sql2);
		$result2->execute(array(":id_pub2" => $id_pub2));
    }
	
	public function conpermrec($obj, $conex)
   {
        $id_usurecper= trim($obj->getIdusurecper());   
        $sql = "select * from permuta, publicacion where id_usurecper=:id_usurecper and id_pub1=id_pub and permuta_concretada = 0 and permutar = 1";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usurecper" => $id_usurecper));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	   public function permuta($obj, $conex)
   {
       $id_permuta = $obj->getIdpermuta();
		   
        $sql = "UPDATE `permuta` SET `permuta_concretada` = '1' WHERE `permuta`.`id_permuta` = :id_permuta";
				
        $result = $conex->prepare($sql);
		$result->execute(array(":id_permuta" => $id_permuta));

    }	
	
	public function canpermuta($obj, $conex)
   {
       $id_permuta = $obj->getIdpermuta();
		   
        $sql = "UPDATE `permuta` SET `permutar` = '0' WHERE `permuta`.`id_permuta` = :id_permuta";
				
        $result = $conex->prepare($sql);
		$result->execute(array(":id_permuta" => $id_permuta));

    }	
	
		public function conpermsol($obj, $conex)
   {
        $id_ususolper= trim($obj->getIdususolper());   
        $sql = "select * from permuta, publicacion where id_ususolper=:id_ususolper and id_pub2=id_pub and permuta_concretada = 0 and permutar = 1";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_ususolper" => $id_ususolper));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	public function conpermcon($obj, $conex)
   {
        $id_ususolper= trim($obj->getIdususolper());   
        $sql = "select * from permuta, publicacion, persona where id_ususolper=:id_ususolper and id_pub2=id_pub and permuta_concretada = 1 and permutar = 1 and id_per=id_usup";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_ususolper" => $id_ususolper));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	
	
	
	
    }	
	
 

?>
