<?php
require_once('../persistencia/PersistenciaTransaccion.class.php');

class Transaccion
{
    private $id_trans; 
    private $id_usut; 
	private $id_pubt; 
	private $precio_finalt; 
	private $fechat;
	private $cantidad; 
	private $calificaciont; 
	private $pago_comision;
	private $comision_monto;
      
    function __construct($idt='',$idu='',$idp='',$pref='',$fec='',$cant='',$cal='',$pag='',$com='')
    {
        $this->id_trans= $idt;
        $this->id_usut= $idu;
		$this->id_pubt= $idp;
		$this->precio_finalt= $pref;
		$this->fechat= $fec;
		$this->cantidad= $cant;
		$this->calificaciont= $cal;
		$this->pago_comision= $pag;
		$this->comision_monto= $com;
	}
    
    //Métodos set
    
    public function setIdtransaccion($idt)
    {
      $this->id_trans= $idt;
    }
    
    public function setIdusuario($idu)
    {
      $this->id_usut= $idu;
	}
	
	public function setIdpublicacion($idp)
    {
      $this->id_pubt= $idp;
    }
	
	public function setPreciofinal($pref)
    {
      $this->precio_finalt= $pref;
    }
	
		public function setFecha($fec)
    {
      $this->fechat= $fec;
    }
		
		public function setCantidad($cant)
    {
      $this->cantidad= $cant;
    }
		
		public function setCalificacion($cal)
    {
      $this->calificaciont= $cal;
    }
		
		public function setPago($pag)
    {
      $this->pago_comision= $pag;
    }
	
		public function setComision($com)
    {
      $this->comision_monto= $com;
    }
	
	
    //Métodos get
    
    public function getIdtransaccion()
    {
      return $this->id_trans;
    }
    
    public function getIdusuario()
    {
      return $this->id_usut;
    }
	
	public function getIdpublicacion()
    {
      return $this->id_pubt;
    }
    
    public function getPreciofinal()
    {
      return $this->precio_finalt;
    }
	
	    public function getFecha()
    {
      return $this->fechat;
    }
     	
	    public function getCantidad()
    {
      return $this->cantidad;
    }
     	
	    public function getCalificacion()
    {
      return $this->calificaciont;
    }
     	
	    public function getPago()
    {
      return $this->pago_comision;
    }
	
		public function getComision()
    {
      return $this->comision_monto;
    }
     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaTransaccion;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaTransaccion;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaTransaccion;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaTransaccion;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaTransaccion;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
	
	public function consultaMaximoVenta($conex)
    {
      $pu=new PersistenciaTransaccion;
      $datos= $pu->consMax($this,$conex);
      return $datos;
    }
	
	public function consultaPubMasVendida($conex)
    {
      $pu=new PersistenciaTransaccion;
      $datos= $pu->consPubMasVen($this,$conex);
      return $datos;
    }
	
	

	
	//public function compraEntrada($conex,$IdEsp,$IdSec,$IdUsu,$IdLug,$cant,$preciofinal)
  //  {
  //    $pu=new PersistenciaTransaccion;
  //    $datos= $pu->compra($this,$conex,$IdEsp,$IdSec,$IdUsu,$IdLug,$cant,$preciofinal);
  //    return $datos;
  //  }
    //Devuelve true si el Login y el Password coinciden
  //  public function coincideLoginPassword($conex)
 //   {
 //       $pu= new PersistenciaCategoria;
 //       return $pu->verificarLoginPassword($this, $conex);
 //       
 //   }
}

?>