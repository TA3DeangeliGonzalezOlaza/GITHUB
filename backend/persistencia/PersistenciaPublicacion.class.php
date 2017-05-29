<?php
class PersistenciaPublicacion
{
    //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function agregar($obj, $conex)
    {
        //Obtiene los datos del objeto $obj
       
        $nom_pub = $obj->getNombre();
        $precio_pub=$obj->getPrecio();
        $stock_pub=$obj->getStock();
        $descripcion_pub = $obj->getDescripcion();
        $img01_pub = $obj->getImagen1();
        $img02_pub = $obj->getImagen2();
        $img03_pub = $obj->getImagen3();
        $nuevo_pub = $obj->getNuevo();
        $fecha_pub = $obj->getFecha();
        $acepta_permuta_pub = $obj->getPermuta();
        $categoria_pub = $obj->getCategoria();
        $denuncia_pub = $obj->getDenuncia();
	
        //Genera la sentencia a ejecutar
		//La sql que vale es la primera, pero hay que completar los parametros en el execute
		
		$sql = "insert into publicacion (nom_pub, precio_pub, stock_pub, descripcion_pub, img01_pub, img02_pub, img03_pub, nuevo_pub, fecha_pub, acepta_permuta_pub, categoria_pub, denuncia_pub) 
		values (:nom_pub,:precio_pub,:stock_pub,:descripcion_pub,:img01_pub,:img02_pub,:img03_pub,:nuevo_pub,:acepta_permuta_pub,:categoria_pub,:denuncia_pub)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nom_pub " => $nom_pub, ":precio_pub " => $precio_pub,
								":stock_pub " => $stock_pub,":descripcion_pub " => $descripcion_pub,
								":img01_pub " => $img01_pub,":img02_pub " => $img02_pub,
								":img03_pub " => $img03_pub,":nuevo_pub " => $nuevo_pub,":fecha_pub " => $fecha_pub
								,":acepta_permuta_pub " => $acepta_permuta_pub,":categoria_pub " => $categoria_pub,":denuncia_pub " => $denuncia_pub));
        
        
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
        $login= trim($obj->getLogin());
        $pass= sha1(trim($obj->getPassword()));

        $sql = "select * from persona where nick_usu=:nick_usu and password_usu=:password_usu";
		
        $consulta = $conex->prepare($sql);
		/* FORMA 1 de pasar los parametros es con el método bindParam
		/* con bindParam ligamos los parámetros de la consulta a las variables
		$consulta->bindParam(':login', $login, PDO::PARAM_STR);
		$consulta->bindParam(':pass', $pass, PDO::PARAM_STR);
		$consulta->execute();
		*/
		
		/* FORMA 2es pasar los parámetros como argumentos del método execute
		 utilizando un array asociativo */
		$consulta->execute(array(":nick_usu" => $login, ":password_usu" => $pass));
		
		/*Despues de ejecutar la consulta como es un SELECT debo utilizar el método
		fetchAll que devuelve un array que contiene todas las filas del conjunto de resultados
		*/
		$result = $consulta->fetchAll();
		//Devuelvo el array que puede tener un registro o estar vacio si el usuario y contraseña no coinciden
		return $result;
    }

   public function consTodos( $conex)
   {
       
        $sql = "select * from publicacion";
		
        $result = $conex->prepare($sql);
		$result->execute();
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
    
    public function consUno($obj, $conex)
   {
        $id_pub= trim($obj->getId());   
        $sql = "select * from publicacion where id_pub=:id_pub";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":id_pub " => $id_pub));
		$resultados=$result->fetchAll();
        //Obtiene el registro de la tabla Usuario 

       return $resultados;
    }
	
	public function modificar($obj, $conex)
   {
		
	    $nom_pub = $obj->getNombre();
        $precio_pub=$obj->getPrecio();
        $stock_pub=$obj->getStock();
        $descripcion_pub = $obj->getDescripcion();
        $img01_pub = $obj->getImagen1();
        $img02_pub = $obj->getImagen2();
        $img03_pub = $obj->getImagen3();
        $nuevo_pub = $obj->getNuevo();
        $fecha_pub = $obj->getFecha();
        $acepta_permuta_pub = $obj->getPermuta();
        $categoria_pub = $obj->getCategoria();
        $denuncia_pub = $obj->getDenuncia();
	
        //Genera la sentencia a ejecutar
		//La sql que vale es la primera, pero hay que completar los parametros en el execute
		
		$sql = "update publicacion set :nom_pub,:precio_pub,:stock_pub,:descripcion_pub,:img01_pub,:img02_pub,:img03_pub,:nuevo_pub,:acepta_permuta_pub,:categoria_pub,:denuncia_pub)";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":nom_pub " => $nom_pub, ":precio_pub " => $precio_pub,
								":stock_pub " => $stock_pub,":descripcion_pub " => $descripcion_pub,
								":img01_pub " => $img01_pub,":img02_pub " => $img02_pub,
								":img03_pub " => $img03_pub,":nuevo_pub " => $nuevo_pub,":fecha_pub " => $fecha_pub
								,":acepta_permuta_pub " => $acepta_permuta_pub,":categoria_pub " => $categoria_pub,":denuncia_pub " => $denuncia_pub));	
		
		
		
		
       return $result;
    }
	
	    public function consXCat($obj, $conex)
    {
    	$idCat= trim($obj->getCategoria());
    	//die(var_dump($idDepto));
    	$sql = "select * from publicacion where categoria_pub=:categoria_pub";
    
    	$result = $conex->prepare($sql);
    	$result->execute(array(":categoria_pub" => $idCat));
    	$resultados=$result->fetchAll();
    	 
    
    	return $resultados;
    }
	
	public function eliminar($obj, $conex)
    {
        $id_pub= trim($obj->getIdPublicacion());      		
        $sql = "delete from publicacion where id_pub=:id_pub";

        $result = $conex->prepare($sql);
		
	    $result->execute(array(":id_pub"=>$id_pub));
        		
       return $result;
    }
 }

?>