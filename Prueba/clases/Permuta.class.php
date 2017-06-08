<?php
require_once('../persistencia/PersistenciaPermuta.class.php');

class Permuta
{
    private $id_permuta; //id de permuta
    private $id_pub1; // id publicacion 1
	private $id_pub2; // id publicacion 2
    private $fechap; // fecha
	private $solicita_permuta; // fecha
	private $permutar; // fecha
	private $permuta_concretada; // fecha
	private $id_ususolper; // fecha
	private $id_usurecper; // fecha

      
    function __construct($id='',$idp1='',$idp2='',$fec='',$solper='',$permu='',$permucon='',$idusp='',$idurp='')
    {
        $this->id_permuta= $id;
        $this->id_pub1= $idp1;
		$this->id_pub2= $idp2;
        $this->fechap= $fec;
		$this->solicita_permuta= $solper;
		$this->permutar= $permu;
		$this->permuta_concretada= $permucon;
		$this->id_ususolper= $idusp;
		$this->id_usurecper= $idurp;
       
    }
    
    //Métodos set
    
    public function setIdpermuta($id)
    {
      $this->id_permuta= $id;
    }
    
    public function setIdpub1($idp1)
    {
      $this->id_pub1= $idp1;
    }
    
	public function setIdpub2($idp2)
    {
      $this->id_pub2= $idp2;
    }
    
    public function setFecha($fec)
    {
      $this->fechap= $fec;
    }
	
    public function setSolper($solper)
    {
      $this->solicita_permuta= $solper;
    }
    
	public function setPermutar($permu)
    {
      $this->permutar= $permu;
    }
    
    public function setPermucon($permucon)
    {
      $this->permuta_concretada= $permucon;
    }
	
	public function setIdususolper($idusp)
    {
      $this->id_ususolper= $idusp;
    }
	
	
	public function setIdusurecper($idurp)
    {
      $this->id_usurecper= $idurp;
    }

    

    //Métodos get
    
    public function getIdpermuta()
    {
      return $this->id_permuta;
    }
    
    public function getIdpub1()
    {
      return $this->id_pub1;
    }
    
	public function getIdpub2()
    {
      return $this->id_pub2;
    }
    
    public function getFecha()
    {
      return $this->fechap;
    }
	
	public function getSolper()
    {
      return $this->solicita_permuta;
    }
    
	public function getPermutar()
    {
      return $this->permutar;
    }
    
    public function getPermucon()
    {
      return $this->permuta_concretada;
    }
	
    public function getIdususolper()
    {
      return $this->id_ususolper;
    }
	
    public function getIdusurecper()
    {
      return $this->id_usurecper;
    }
	
	

     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaPermuta;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaPermuta;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaPermuta;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaPermuta;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
	
	    public function Solicita($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->solic($this, $conex));
    }
	
	    public function ConsultaPermutaSolicitada($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->conpermsol($this, $conex));
    }

	    public function ConsultaPermutaRecibida($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->conpermrec($this, $conex));
    }
	
	
	 public function ConsultaPermutaConcretadas($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->conpermcon($this, $conex));
    }
	

	    public function Permutar($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->permuta($this, $conex));
    }

	    public function CancelaPermutar($conex)
    {
        $pu=new PersistenciaPermuta;
        return ($pu->canpermuta($this, $conex));
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