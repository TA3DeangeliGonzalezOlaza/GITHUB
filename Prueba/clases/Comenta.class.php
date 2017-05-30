<?php
require_once('../persistencia/PersistenciaComenta.class.php');

class Comenta
{
    private $id_comen; //id comentario
    private $id_usucom; // id usuario que comenta
	private $id_pubcom; // publicacion comentada
	private $comentario; // comentario
	private $denunciado_com; // denuncia
	
      
    function __construct($idc='',$idu='',$idp='',$com='',$den='')
    {
        $this->id_comen= $idc;
        $this->id_usucom= $idu;
		$this->id_pubcom= $idp;
		$this->comentario= $com;
		$this->denunciado_com= $den;
	}
    
    //Métodos set
    
    public function setIdcomen($idc)
    {
      $this->id_comen= $idc;
    }
    
    public function setIdusu($idu)
    {
      $this->id_usucom= $idu;
	}
	
	public function setIdpub($idp)
    {
      $this->id_pubcom= $idp;
    }
	
	public function setComentario($com)
    {
      $this->comentario= $com;
    }
	
	public function setDenuncia($den)
    {
      $this->denunciado_com= $den;
    }
	
    //Métodos get
    
    public function getIdcomen()
    {
      return $this->id_comen;
    }
    
    public function getIdusu()
    {
      return $this->id_usucom;
    }
	
	public function getIdpub()
    {
      return $this->id_pubcom;
    }
    
    public function getComentario()
    {
      return $this->comentario;
    }
	    
    public function getDenuncia()
    {
      return $this->denunciado_com;
    }
	
     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaComenta;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaComenta;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaComenta;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaComenta;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex,$IdLug)
    {
      $pu=new PersistenciaComenta;
      $datos= $pu->consUno($this,$conex,$IdLug);
      return $datos;
    }
	
	    
    public function consultaTodosPub($conex)
    {
      $pu=new PersistenciaComenta;
      $datos= $pu->consTodosPub($this,$conex);
      return $datos;
    }
    
	
    //Devuelve true si el Login y el Password coinciden
  //  public function coincideLoginPassword($conex)
 //   {
 //       $pu= new PersistenciaCategoria;
 //       return $pu->verificarLoginPassword($this, $conex);
 //       
 //   }
}

?>