<?php




class PHPExcel_Worksheet_Drawing_Shadow implements PHPExcel_IComparable
{
	
	const SHADOW_BOTTOM							= 'b';
	const SHADOW_BOTTOM_LEFT					= 'bl';
	const SHADOW_BOTTOM_RIGHT					= 'br';
	const SHADOW_CENTER							= 'ctr';
	const SHADOW_LEFT							= 'l';
	const SHADOW_TOP							= 't';
	const SHADOW_TOP_LEFT						= 'tl';
	const SHADOW_TOP_RIGHT						= 'tr';

	
	private $Vwey1yy2ahfw;

	
	private $V0i0iaazz0kb;

	
	private $Vaif3z22z0ws;

	
	private $Vdhdv1zu4fh5;

	
	private $Vvqnyg21iqb4;

	
	private $V0nr4meefg1f;

	
	private $Veraedbcwugl;

    
    public function __construct()
    {
    	
    	$this->_visible				= false;
    	$this->_blurRadius			= 6;
    	$this->_distance			= 2;
    	$this->_direction			= 0;
    	$this->_alignment			= PHPExcel_Worksheet_Drawing_Shadow::SHADOW_BOTTOM_RIGHT;
    	$this->_color				= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK);
    	$this->_alpha				= 50;
    }

    
    public function getVisible() {
    	return $this->_visible;
    }

    
    public function setVisible($Vqujkwol1zut = false) {
    	$this->_visible = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getBlurRadius() {
    	return $this->_blurRadius;
    }

    
    public function setBlurRadius($Vqujkwol1zut = 6) {
    	$this->_blurRadius = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getDistance() {
    	return $this->_distance;
    }

    
    public function setDistance($Vqujkwol1zut = 2) {
    	$this->_distance = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getDirection() {
    	return $this->_direction;
    }

    
    public function setDirection($Vqujkwol1zut = 0) {
    	$this->_direction = $Vqujkwol1zut;
    	return $this;
    }

   
    public function getAlignment() {
    	return $this->_alignment;
    }

    
    public function setAlignment($Vqujkwol1zut = 0) {
    	$this->_alignment = $Vqujkwol1zut;
    	return $this;
    }

   
    public function getColor() {
    	return $this->_color;
    }

    
    public function setColor(PHPExcel_Style_Color $Vqujkwol1zut = null) {
   		$this->_color = $Vqujkwol1zut;
   		return $this;
    }

   
    public function getAlpha() {
    	return $this->_alpha;
    }

    
    public function setAlpha($Vqujkwol1zut = 0) {
    	$this->_alpha = $Vqujkwol1zut;
    	return $this;
    }

	
	public function getHashCode() {
    	return md5(
    		  ($this->_visible ? 't' : 'f')
    		. $this->_blurRadius
    		. $this->_distance
    		. $this->_direction
    		. $this->_alignment
    		. $this->_color->getHashCode()
    		. $this->_alpha
    		. __CLASS__
    	);
    }

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}
}
