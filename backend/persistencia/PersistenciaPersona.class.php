<?php
class PersistenciaPersona
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function agregar($obj, $conex)
    {
        //Obtiene los datos del objeto $obj
       
        $ci_per= $obj->getCi();
        $nick_per = $obj->getNick();
        $password_per=$obj->getPassword();
        $nom1_per=$obj->getNombre1();
        $nom2_per = $obj->getNombre2();
        $ape1_per = $obj->getApellido1();
        $ape2_per = $obj->getApellido2();
        $correo_per = $obj->getCorreo();
        $tel_per = $obj->getTelefono();
		$dir_per = $obj->getDireccion();

		//$activo_usu = $obj->getActivo();
        
		//Encripto la password antes de guardarla
        //$pass_usu=sha1($pass_usu);
      
        
        //Genera la sentencia a ejecutar
		//La sql que vale es la primera, pero hay que completar los parametros en el execute
		
		$sql = "insert into persona (ci_per, nick_per, password_per, nom1_per, nom2_per, ape1_per, ape2_per, email_per, tel_per, dir_per) 
		values (:ci_usu,:nick_usu,:password_usu,:nom1_usu,:nom2_usu,:ape1_usu,:ape2_usu,:email_usu,:tel_usu,:dir_usu)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":ci_usu" => $ci_per, ":nick_usu" => $nick_per,
								":password_usu" => $password_per,":nom1_usu" => $nom1_per,
								":nom2_usu" => $nom2_per,":ape1_usu" => $ape1_per,
								":ape2_usu" => $ape2_per,":email_usu" => $correo_per,
								":tel_usu" => $tel_per,":dir_usu" => $dir_per));
        
        
        //Para saber si ocurrió un error
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

     

   //Devuelve true si el login coincide con la password
   public function verificarLoginPassword($obj, $conex)
   {
        //Obtiene los datos del objeto $obj
        $login= trim($obj->getNick());
        //$pass= sha1(trim($obj->getPassword()));
		$pass=trim($obj->getPassword());

        $sql = "select * from persona where nick_per=:nick_usu and password_per=:password_usu";
		
        $consulta = $conex->prepare($sql);
		
		$consulta->execute(array(":nick_usu" => $login, ":password_usu" => $pass));
		
		
		$result = $consulta->fetchAll();
		return $result;
    }

   public function consTodos( $conex)
   {
       
        $sql = "select * from persona";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
	
	
	
    
    public function consUno($obj, $conex)
   {
        $id_usu= trim($obj->getId());   
        $sql = "select * from persona where id_persona=:id_persona";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_persona" => $id_usu));
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
	
	public function modificar($obj, $conex)
   {
        $id_per= $obj->getId(); 
        $ci_per= $obj->getCi();
        $nick_per = $obj->getNick();
        $password_per=$obj->getPassword();
        $nom1_per=$obj->getNombre1();
        $nom2_per = $obj->getNombre2();
        $ape1_per = $obj->getApellido1();
        $ape2_per = $obj->getApellido2();
		$correo_per = $obj->getCorreo();
		$tel_per = $obj->getTelefono();
		$dir_per = $obj->getDireccion();
		
		
		
		
        $sql = "update persona set ci_per=:ci_usu,nick_per=:nick_usu,password_per=:password_usu, nom1_per=:nom1_usu, 
		nom2_per=:nom2_usu, ape1_per=:ape1_usu,ape2_per=:ape2_usu,email_per=:email_usu,tel_per=:tel_usu,dir_per=:dir_usu where id_persona=:id_persona";
	   
		
        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id_persona" => $id_per,":ci_usu" => $ci_per, ":nick_usu" => $nick_per,
								":password_usu" => $password_per,":nom1_usu" => $nom1_per,
								":nom2_usu" => $nom2_per,":ape1_usu" => $ape1_per,
								":ape2_usu" => $ape2_per,":email_usu" => $correo_per
								,":tel_usu" => $tel_per,":dir_usu" => $dir_per));
        
       return $result;
    }
	
	public function eliminar($obj, $conex)
    {
        $id= trim($obj->getId());      		
        $sql = "update usuario set activo_usu='no' where id_usu=:id";

        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id"=>$id));
        		
       return $result;
    }
	
   public function consTipo($obj, $conex)
   {
        //Obtiene los datos del objeto $obj
        $login= trim($obj->setNick());
        //$pass= sha1(trim($obj->getPassword()));
		$pass=trim($obj->getPassword());

        $sql = "select tipo_usu from persona where nick_per=:nick_per and password_per=:password_per";
		
        $consulta = $conex->prepare($sql);
		
		$consulta->execute(array(":nick_per" => $login, ":password_per" => $pass));
		
		
		$result = $consulta->fetchAll();
		return $result;
    }

	
	
	public function consPremium($obj, $conex)
   {
         
        $sql = "select nom1_per, ape1_per, nick_per from persona, usuario where id_per=id_personau and premium=1; ";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	
	
 }

?>