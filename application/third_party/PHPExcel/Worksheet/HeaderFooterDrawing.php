<?php




class PHPExcel_Worksheet_HeaderFooterDrawing extends PHPExcel_Worksheet_Drawing implements PHPExcel_IComparable
{
	
	private $Vlf11scadlqd;

	
	protected $Vp2zlcj4wcuv;

	
	protected $Vwcdlkodaypb;

	
	protected $Vzyxxx0v1mnj;

	
	protected $V1hgtvz3lirj;

	
	protected $Vcbzw3tnapla;

	
	protected $Vnhvrgc2wjel;

    
    public function __construct()
    {
    	
    	$this->_path				= '';
    	$this->_name				= '';
    	$this->_offsetX				= 0;
    	$this->_offsetY				= 0;
    	$this->_width				= 0;
    	$this->_height				= 0;
    	$this->_resizeProportional	= true;
    }

    
    public function getName() {
    	return $this->_name;
    }

    
    public function setName($Vqujkwol1zut = '') {
    	$this->_name = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOffsetX() {
    	return $this->_offsetX;
    }

    
    public function setOffsetX($Vqujkwol1zut = 0) {
    	$this->_offsetX = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOffsetY() {
    	return $this->_offsetY;
    }

    
    public function setOffsetY($Vqujkwol1zut = 0) {
    	$this->_offsetY = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getWidth() {
    	return $this->_width;
    }

    
    public function setWidth($Vqujkwol1zut = 0) {
    	
    	if ($this->_resizeProportional && $Vqujkwol1zut != 0) {
    		$Vfdhu5dkz1oe = $this->_width / $this->_height;
    		$this->_height = round($Vfdhu5dkz1oe * $Vqujkwol1zut);
    	}

    	
    	$this->_width = $Vqujkwol1zut;

    	return $this;
    }

    
    public function getHeight() {
    	return $this->_height;
    }

    
    public function setHeight($Vqujkwol1zut = 0) {
    	
    	if ($this->_resizeProportional && $Vqujkwol1zut != 0) {
    		$Vfdhu5dkz1oe = $this->_width / $this->_height;
    		$this->_width = round($Vfdhu5dkz1oe * $Vqujkwol1zut);
    	}

    	
    	$this->_height = $Vqujkwol1zut;

    	return $this;
    }

    
	public function setWidthAndHeight($Vojs2qdgagwv = 0, $Vzo4g5xb4yip = 0) {
		$Vlqnddcgmdcl = $Vojs2qdgagwv / $this->_width;
		$Vfvzcp4ysi5a = $Vzo4g5xb4yip / $this->_height;
		if ($this->_resizeProportional && !($Vojs2qdgagwv == 0 || $Vzo4g5xb4yip == 0)) {
			if (($Vlqnddcgmdcl * $this->_height) < $Vzo4g5xb4yip) {
				$this->_height = ceil($Vlqnddcgmdcl * $this->_height);
				$this->_width  = $Vojs2qdgagwv;
			} else {
				$this->_width	= ceil($Vfvzcp4ysi5a * $this->_width);
				$this->_height	= $Vzo4g5xb4yip;
			}
		}
		return $this;
	}

    
    public function getResizeProportional() {
    	return $this->_resizeProportional;
    }

    
    public function setResizeProportional($Vqujkwol1zut = true) {
    	$this->_resizeProportional = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getFilename() {
    	return basename($this->_path);
    }

    
    public function getExtension() {
        $Vd01eedayprh = explode(".", basename($this->_path));
        return end($Vd01eedayprh);
    }

    
    public function getPath() {
    	return $this->_path;
    }

    
    public function setPath($Vqujkwol1zut = '', $Vbna4vj4dr5h = true) {
    	if ($Vbna4vj4dr5h) {
	    	if (file_exists($Vqujkwol1zut)) {
	    		$this->_path = $Vqujkwol1zut;

	    		if ($this->_width == 0 && $this->_height == 0) {
	    			
	    			list($this->_width, $this->_height) = getimagesize($Vqujkwol1zut);
	    		}
	    	} else {
	    		throw new PHPExcel_Exception("File $Vqujkwol1zut not found!");
	    	}
    	} else {
    		$this->_path = $Vqujkwol1zut;
    	}
    	return $this;
    }

	
	public function getHashCode() {
    	return md5(
    		  $this->_path
    		. $this->_name
    		. $this->_offsetX
    		. $this->_offsetY
    		. $this->_width
    		. $this->_height
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
