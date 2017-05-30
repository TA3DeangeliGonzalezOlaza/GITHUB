<?php
require_once('../persistencia/PersistenciaPublicacion.class.php');

class Publicacion
{
    private $id_pub; //id Publicacion
    private $id_usup; // id usuario vendedor
	private $nom_pub; // nombre de publicacion 
	private $precio_pub; // precio
	private $stock_pub; // cantidad en stock
	private $descripcion_pub; // descripcion
	private $img01_pub; // imagen 1
	private $img02_pub; //imagen 2
	private $img03_pub; // imagen 3
	private $nuevo_pub; // si es articulo nuevo
	private $fecha_pub; // fecha de publicacion
	private $acepta_permuta_pub; // si acepta permuta
	private $categoria_pub; // categoria
	private $denuncia_pub; // si esta denunciado

	
      
    function __construct($id='',$usu='',$nom='',$pre='',$sto='',$des='',$im1='',$im2='',$im3='',$nue=''
	,$fec='',$acp='',$cat='',$den='')
    {
        $this->id_pub= $id;
        $this->id_usu= $usu;
		$this->nom_pub= $nom;
		$this->precio_pub= $pre;
		$this->stock_pub= $sto;
		$this->descripcion_pub= $des;
		$this->img01_pub= $im1;
		$this->img02_pub= $im2;
		$this->img03_pub= $im3;
		$this->nuevo_pub= $nue;
		$this->fecha_pub= $fec;
		$this->acepta_permuta_pub= $acp;
		$this->categoria_pub= $cat;
		$this->denuncia_pub= $den;
	
		
       
    }
    
    //Métodos set
    
    public function setIdPublicacion($id)
    {
      $this->id_pub= $id;
    }
    
    public function setIdusuario($usu)
    {
      $this->id_usu= $usu;
	 }
	
	public function setNombre($nom)
    {
      $this->nom_pub= $nom;
    }
	
	public function setPrecio($pre)
    {
      $this->precio_pub= $pre;
    }
	
	public function setStock($sto)
    {
      $this->stock_pub= $sto;
    }
	
	public function setDescripcion($des)
    {
      $this->descripcion_pub= $des;
    }
	
	public function setImagen1($im1)
    {
      $this->img01_pub= $im1;
    }
	
	public function setImagen2($im2)
    {
      $this->img02_pub= $im2;
    }
	
	public function setImagen3($im3)
    {
      $this->img03_pub= $im3;
    }
 
	public function setNuevo($nue)
    {
      $this->nuevo_pub= $nue;
    }
	
	public function setFecha($fec)
    {
      $this->fecha_pub= $fec;
    }
	
	public function setPermuta($acp)
    {
      $this->acepta_permuta_pub= $acp;
    }
	
	public function setCategoria($cat)
    {
      $this->categoria_pub= $cat;
    }
	
	public function setDenuncia($den)
    {
      $this->denuncia_pub= $den;
    }	

    //Métodos get
    
    public function getIdPublicacion()
    {
      return $this->id_pub;
    }
    
    public function getIdusuario()
    {
      return $this->id_usu;
    }
	
	public function getNombre()
    {
      return $this->nom_pub;
    }

	public function getPrecio()
    {
      return $this->precio_pub;
    }
    
    public function getStock()
    {
      return $this->stock_pub;
    }
	
	public function getDescripcion()
    {
      return $this->descripcion_pub;
    }
    
    public function getImagen1()
    {
      return $this->img01_pub;
    }
	
	public function getImagen2()
    {
      return $this->img02_pub;
    }
    
    public function getImagen3()
    {
      return $this->img03_pub;
    }
	
	public function getNuevo()
    {
      return $this->nuevo_pub;
    }
	
	public function getFecha()
    {
      return $this->fecha_pub;
    }
	
	public function getPermuta()
    {
      return $this->acepta_permuta_pub;
    }
	
	public function getCategoria()
    {
      return $this->categoria_pub;
    }
	
	public function getDenuncia()
    {
      return $this->denuncia_pub;
    }
   
     
    //Otros Métodos
    public function alta($conex)
    {
        $pu=new PersistenciaPublicacion;
        return ($pu->agregar($this, $conex));
    }
    
   
    public function baja($conex)
    {
        $pu=new PersistenciaPublicacion;
        return($pu->eliminar($this, $conex));
    }
    
    
    public function modificacion($conex)
    {
      $pu=new PersistenciaPublicacion;
      return($pu->modificar($this, $conex));
    }
    
    public function consultaTodos($conex)
    {
      $pu=new PersistenciaPublicacion;
      $datos= $pu->consTodos($conex);
      return $datos;
    }
    
	public function consultaUno($conex)
    {
      $pu=new PersistenciaPublicacion;
      $datos= $pu->consUno($this,$conex);
      return $datos;
    }
	
	public function consultaXdepto($conex)
    {
    	$pp=new PersistenciaPublicacion;
    	$datos= $pp->consXCat($this,$conex);
    	return $datos;
    }
	
	public function consultaCategoria($conex)
    {
      $pu=new PersistenciaPublicacion;
      $datos= $pu->consCat($this,$conex);
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