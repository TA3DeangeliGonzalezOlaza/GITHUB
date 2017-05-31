<?php
require_once('../persistencia/PersistenciaComenta.class.php');

class Comenta
{
    private $id_comen; //id comentario
    private $id_usucom; // id usuario que comenta
	private $id_pubcom; // publicacion comentada
	private $comentario; // comentario
	private $denunciado_com; // denuncia
	private $responde_com; // denuncia
	
      
    function __construct($idc='',$idu='',$idp='',$com='',$den='',$resp='')
    {
        $this->id_comen= $idc;
        $this->id_usucom= $idu;
		$this->id_pubcom= $idp;
		$this->comentario= $com;
		$this->denunciado_com= $den;
		$this->responde_com= $resp;
	}
    
    //Métodos set
    
    public function setIdcomen($idc)
    {
      $this->id_comen= $idc;
    }
    
    public function setIdusucom($idu)
    {
      $this->id_usucom= $idu;
	}
	
	public function setIdpubcom($idp)
    {
      $this->id_pubcom= $idp;
    }
	
	public function setComentario($com)
    {
      $this->comentario= $com;
    }
	
	public function setDenunciacom($den)
    {
      $this->denunciado_com= $den;
    }
	
	public function setResponde($resp)
    {
      $this->responde_com= $resp;
    }
	
    //Métodos get
    
    public function getIdcomen()
    {
      return $this->id_comen;
    }
    
    public function getIdusucom()
    {
      return $this->id_usucom;
    }
	
	public function getIdpubcom()
    {
      return $this->id_pubcom;
    }
    
    public function getComentario()
    {
      return $this->comentario;
    }
	    
    public function getDenunciacom()
    {
      return $this->denunciado_com;
    }
	
	public function getRespondecom()
    {
      return $this->responde_com;
    }
     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaComenta;
        return ($pu->comenta($this, $conex));
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