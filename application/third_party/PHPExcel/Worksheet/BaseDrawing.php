<?php




class PHPExcel_Worksheet_BaseDrawing implements PHPExcel_IComparable
{
	
	private static $Vwmhzoz4nmdo = 0;

	
	private $Vshaous1zobd = 0;

	
	protected $Vp2zlcj4wcuv;

	
	protected $Vzghx0kmfoxz;

	
	protected $Vcsepalfuv1z;

	
	protected $Vtwllxwobqtx;

	
	protected $Vwcdlkodaypb;

	
	protected $Vzyxxx0v1mnj;

	
	protected $V1hgtvz3lirj;

	
	protected $Vcbzw3tnapla;

	
	protected $Vnhvrgc2wjel;

	
	protected $Vaibxkjxj4kg;

	
	protected $Vs43yxnqqisi;

    
    public function __construct()
    {
    	
    	$this->_name				= '';
    	$this->_description			= '';
    	$this->_worksheet			= null;
    	$this->_coordinates			= 'A1';
    	$this->_offsetX				= 0;
    	$this->_offsetY				= 0;
    	$this->_width				= 0;
    	$this->_height				= 0;
    	$this->_resizeProportional	= true;
    	$this->_rotation			= 0;
    	$this->_shadow				= new PHPExcel_Worksheet_Drawing_Shadow();

		
		self::$Vwmhzoz4nmdo++;
		$this->_imageIndex 			= self::$Vwmhzoz4nmdo;
    }

    
    public function getImageIndex() {
    	return $this->_imageIndex;
    }

    
    public function getName() {
    	return $this->_name;
    }

    
    public function setName($Vqujkwol1zut = '') {
    	$this->_name = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getDescription() {
    	return $this->_description;
    }

    
    public function setDescription($Vqujkwol1zut = '') {
    	$this->_description = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getWorksheet() {
    	return $this->_worksheet;
    }

    
    public function setWorksheet(PHPExcel_Worksheet $Vqujkwol1zut = null, $Voyxanmdthxn = false) {
    	if (is_null($this->_worksheet)) {
    		
	    	$this->_worksheet = $Vqujkwol1zut;
	    	$this->_worksheet->getCell($this->_coordinates);
	    	$this->_worksheet->getDrawingCollection()->append($this);
    	} else {
    		if ($Voyxanmdthxn) {
    			
    			$V14jsjccazfp = $this->_worksheet->getDrawingCollection()->getIterator();

    			while ($V14jsjccazfp->valid()) {
    				if ($V14jsjccazfp->current()->getHashCode() == $this->getHashCode()) {
    					$this->_worksheet->getDrawingCollection()->offsetUnset( $V14jsjccazfp->key() );
    					$this->_worksheet = null;
    					break;
    				}
    			}

    			
    			$this->setWorksheet($Vqujkwol1zut);
    		} else {
    			throw new PHPExcel_Exception("A PHPExcel_Worksheet has already been assigned. Drawings can only exist on one PHPExcel_Worksheet.");
    		}
    	}
    	return $this;
    }

    
    public function getCoordinates() {
    	return $this->_coordinates;
    }

    
    public function setCoordinates($Vqujkwol1zut = 'A1') {
    	$this->_coordinates = $Vqujkwol1zut;
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
    		$Vfdhu5dkz1oe = $this->_height / ($this->_width != 0 ? $this->_width : 1);
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
    		$Vfdhu5dkz1oe = $this->_width / ($this->_height != 0 ? $this->_height : 1);
    		$this->_width = round($Vfdhu5dkz1oe * $Vqujkwol1zut);
    	}

    	
    	$this->_height = $Vqujkwol1zut;

    	return $this;
    }

    
	public function setWidthAndHeight($Vojs2qdgagwv = 0, $Vzo4g5xb4yip = 0) {
		$Vlqnddcgmdcl = $Vojs2qdgagwv / ($this->_width != 0 ? $this->_width : 1);
		$Vfvzcp4ysi5a = $Vzo4g5xb4yip / ($this->_height != 0 ? $this->_height : 1);
		if ($this->_resizeProportional && !($Vojs2qdgagwv == 0 || $Vzo4g5xb4yip == 0)) {
			if (($Vlqnddcgmdcl * $this->_height) < $Vzo4g5xb4yip) {
				$this->_height = ceil($Vlqnddcgmdcl * $this->_height);
				$this->_width  = $Vojs2qdgagwv;
			} else {
				$this->_width	= ceil($Vfvzcp4ysi5a * $this->_width);
				$this->_height	= $Vzo4g5xb4yip;
			}
		} else {
            $this->_width = $Vojs2qdgagwv;
            $this->_height = $Vzo4g5xb4yip;
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

    
    public function getRotation() {
    	return $this->_rotation;
    }

    
    public function setRotation($Vqujkwol1zut = 0) {
    	$this->_rotation = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getShadow() {
    	return $this->_shadow;
    }

    
    public function setShadow(PHPExcel_Worksheet_Drawing_Shadow $Vqujkwol1zut = null) {
   		$this->_shadow = $Vqujkwol1zut;
   		return $this;
    }

	
	public function getHashCode() {
    	return md5(
    		  $this->_name
    		. $this->_description
    		. $this->_worksheet->getHashCode()
    		. $this->_coordinates
    		. $this->_offsetX
    		. $this->_offsetY
    		. $this->_width
    		. $this->_height
    		. $this->_rotation
    		. $this->_shadow->getHashCode()
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
