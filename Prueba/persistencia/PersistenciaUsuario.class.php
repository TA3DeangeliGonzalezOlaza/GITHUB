<?php
class PersistenciaUsuario
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
      public function agregar($obj, $conex)
    {
   
       
        $reputacion_usu= $obj->getReputacion();
        $suspendido = $obj->getSuspendido();
        $rol=$obj->getRol();
        $premium=$obj->getPremium();

		$sql = "insert into usuario (reputacion_usu, suspendido, rol, premium) 
		values (:reputacion_usu,:suspendido,:rol,:premium)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":reputacion_usu" => $reputacion_usu, ":suspendido" => $suspendido,
								":rol" => $=$,":premium" => $premium));
        

        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }
   public function verificarLoginPassword($obj, $conex)
   {
   
        $login= trim($obj->getNick());
		$pass=trim($obj->getPassword());
        $sql = "select * from persona where nick_usu=:nick_usu and password_usu=:password_usu";
        $consulta = $conex->prepare($sql);
		$consulta->execute(array(":nick_usu" => $login, ":password_usu" => $pass));
		$result = $consulta->fetchAll();
		return $result;
    }

   public function consTodos( $conex)
   {
         $sql = "select * from usuario";
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
    
    public function consUno($obj, $conex)
   {
        $id_usu= trim($obj->getIdusuario());   
        $sql = "select * from usuario where id_usu=:id_usu";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_usu" => $id_usu));
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
	public function modificar($obj, $conex)
   {
       
        $reputacion_usu= $obj->getReputacion();
        $suspendido = $obj->getSuspendido();
        $rol=$obj->getRol();
        $premium=$obj->getPremium();
        $id_usu= $obj->getIdusuario();
        $id_personau = $obj->getIdpersona();		
		
        $sql = "update persona set reputacion_usu=:reputacion_usu,suspendido=:suspendido,rol=:rol, premium=:premium, 
		id_usu=:id_usu, id_personau=:id_personau";
	   
		$result = $conex->prepare($sql);
		$result->execute(array(":reputacion_usu" => $reputacion_usu, ":suspendido" => $suspendido,
								":rol" => $=$,":premium" => $premium, ":id_usu" => $id_usu, ":id_personau" => $id_personau));
        		
		
		
       return $result;
    }
	
	public function eliminar($obj, $conex)
    {
        $id= trim($obj->getIdusuario());      		
        $sql = "update usuario set suspendido='si' where id_usu=:id_usu";

        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id_usu"=>$id));
        		
       return $result;
    }
	
   public function consTipo($obj, $conex)
   {

        $login= trim($obj->setNick());
		$pass=trim($obj->getPassword());
        $sql = "select premium from persona where nick_per=:nick_per and password_per=:password_per";
        $consulta = $conex->prepare($sql);
		$consulta->execute(array(":nick_per" => $login, ":password_per" => $pass));
		
		
		$result = $consulta->fetchAll();
		return $result;
    }

 }

?>