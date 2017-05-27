<?php
require_once('../persistencia/PersistenciaUsuario.class.php');

class Usuario
{
    private $id_usu; //id del usuario
    private $reputacion_usu; // reputacion del usuario
	private $suspendido; // cantidad de dias suspendido 
	private $rol; // si es usuario comun o administrador
	private $premium; // Si es usuario premium
	private $id_personau; // id de persona
      
    function __construct($id='',$repu='',$susp='',$rol='',$prem='',$id_per='')
    {
        $this->idusu= $id;
        $this->reputacion= $repu;
		$this->suspendido= $susp;
		$this->rol= $rol;
		$this->premium= $prem;
		$this->id_persona= $id_per;
	}
    
    //Métodos set
    
    public function setIdusuario($id)
    {
      $this->idusu= $id;
    }
    
    public function setReputacion($repu)
    {
      $this->reputacion= $repu;
	}
	
	public function setSuspendido($susp)
    {
      $this->suspendido= $susp;
    }
	
	public function setRol($rol)
    {
      $this->rol= $rol;
    }
	
		public function setPremium($prem)
    {
      $this->premium= $prem;
    }
	
		public function setIdpersona($id_per)
    {
      $this->id_persona= $id_per;
    }
	
	
    //Métodos get
    
    public function getIdusuario()
    {
      return $this->idusu;
    }
    
    public function getReputacion()
    {
      return $this->reputacion;
    }
	
	public function getSuspendido()
    {
      return $this->suspendido;
    }
    
    public function getRol()
    {
      return $this->rol;
    }
	
	    public function getPremium()
    {
      return $this->premium;
    }
	
	    public function getIdpersona()
    {
      return $this->id_persona;
    }
	
     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaUsuario;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaUsuario;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaUsuario;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaUsuario;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaUsuario;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
	
	public function SancionUsuario($conex)
    {
      $pu=new PersistenciaUsuario;
      return ($pu->SancionUsu($this, $conex));
	    
    }
	
		public function RevocaSancionUsuario($conex)
    {
      $pu=new PersistenciaUsuario;
      return ($pu->RevocaSancionUsu($this, $conex));
	    
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