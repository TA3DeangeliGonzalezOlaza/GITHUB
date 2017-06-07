<?php
require_once('../persistencia/PersistenciaPersona.class.php');

class Persona
{
    private $id_per; //id usuario
    private $ci_per; // cedula
    private $nick_per; //nick name
    private $password_per; //contraseña
    private $nom1_per; //primer nombre
    private $nom2_per; //segundo nombre
    private $ape1_per; //primer apellido
    private $ape2_per; //segundo apellido
    private $correo_per; //correo
    private $tel_per; //telefono
	private $dir_per; //direccion

  

    
    function __construct($id='',$ci='', $nick='', $pass='', $nom1='', 
	$nom2='', $ape1='',$ape2='',$cor='',$tel='',$dir='')
    {
        $this->id= $id;
        $this->ci= $ci;
        $this->nick= $nick;
        $this->password= $pass;
        $this->nombre1= $nom1;
        $this->nombre2= $nom2;
        $this->apellido1= $ape1;
        $this->apellido2= $ape2;
        $this->correo= $cor;
        $this->telefono=$tel;
		$this->direccion=$dir;
    }
    
    //Métodos set
    
    public function setId($id)
    {
      $this->id= $id;
    }
    
    public function setCi($ci)
    {
      $this->ci= $ci;
    }
    
    public function setNick($nick)
    {
      $this->nick= $nick;
    }
    
	public function setPassword($pass)
    {
      $this->password= $pass;
    }
    
     public function setNombre1($nom1)
    {
      $this->nombre1= $nom1;
    }

    public function setNombre2($nom2)
    {
      $this->nombre2= $nom2;
    }
    
     
    public function setApellido1($ape1)
    {
      $this->apellido1= $ape1;
    }
    
 	public function setApellido2($ape2)
    {
      $this->apellido2= $ape2;
    }
    
	public function setCorreo($cor)
    {
      $this->correo= $cor;
    }
    
	public function setTelefono($tel)
    {
      $this->telefono=$tel;
    }
	
	public function setDireccion($dir)
    {
      $this->direccion=$dir;
    }
    
    //Métodos get
    
    public function getId()
    {
      return $this->id;
    }
    
    public function getCi()
    {
      return $this->ci;
    }
    
    public function getNick()
    {
      return $this->nick;
    }
    
  	public function getPassword()
    {
      return $this->password;
    }
    
    public function getNombre1()
    {
      return $this->nombre1;
    }
    
    public function getNombre2()
    {
      return $this->nombre2;
    }
    
    public function getApellido1()
    {
      return $this->apellido1;
    }
    
  
    public function getApellido2()
    {
      return $this->apellido2;
    }
    
	public function getCorreo()
    {
      return $this->correo;
    }
    
	public function getTelefono()
    {
      return $this->telefono;
    }
	
	public function getDireccion()
    {
      return $this->direccion;
    }

    
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaPersona;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaPersona;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaPersona;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaPersona;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaPersona;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
    //Devuelve true si el Login y el Password coinciden
    public function coincideLoginPassword($conex)
    {
        $pu= new PersistenciaPersona;
        return $pu->verificarLoginPassword($this, $conex);
        
    }
		public function consultaTipo($conex)
    {
      $pu=new PersistenciaPersona;
      $datos= $pu->consTipo($this,$conex);
      return $datos;
    }
	
	public function CambiaPass($conex)
    {
      $pu=new PersistenciaPersona;
      $datos= $pu->campass($this,$conex);
      return $datos;
    }
	
	public function CambiaDatos($conex)
    {
      $pu=new PersistenciaPersona;
      $datos= $pu->camdat($this,$conex);
      return $datos;
    }
}

?>
