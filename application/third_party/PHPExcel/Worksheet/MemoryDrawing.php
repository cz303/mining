<?php




class PHPExcel_Worksheet_MemoryDrawing extends PHPExcel_Worksheet_BaseDrawing implements PHPExcel_IComparable
{
	
	const RENDERING_DEFAULT					= 'imagepng';
	const RENDERING_PNG						= 'imagepng';
	const RENDERING_GIF						= 'imagegif';
	const RENDERING_JPEG					= 'imagejpeg';

	
	const MIMETYPE_DEFAULT					= 'image/png';
	const MIMETYPE_PNG						= 'image/png';
	const MIMETYPE_GIF						= 'image/gif';
	const MIMETYPE_JPEG						= 'image/jpeg';

	
	private $Vnimpobtgetw;

	
	private $Vtixejezgz1u;

	
	private $Vjo4wnkbhdgc;

	
	private $Vf33qjwnoz2k;

    
    public function __construct()
    {
    	
    	$this->_imageResource		= null;
    	$this->_renderingFunction 	= self::RENDERING_DEFAULT;
    	$this->_mimeType			= self::MIMETYPE_DEFAULT;
    	$this->_uniqueName			= md5(rand(0, 9999). time() . rand(0, 9999));

    	
    	parent::__construct();
    }

    
    public function getImageResource() {
    	return $this->_imageResource;
    }

    
    public function setImageResource($Vp4xjtpabm0l = null) {
    	$this->_imageResource = $Vp4xjtpabm0l;

    	if (!is_null($this->_imageResource)) {
	    	
	    	$this->_width	= imagesx($this->_imageResource);
	    	$this->_height	= imagesy($this->_imageResource);
    	}
    	return $this;
    }

    
    public function getRenderingFunction() {
    	return $this->_renderingFunction;
    }

    
    public function setRenderingFunction($Vp4xjtpabm0l = PHPExcel_Worksheet_MemoryDrawing::RENDERING_DEFAULT) {
    	$this->_renderingFunction = $Vp4xjtpabm0l;
    	return $this;
    }

    
    public function getMimeType() {
    	return $this->_mimeType;
    }

    
    public function setMimeType($Vp4xjtpabm0l = PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT) {
    	$this->_mimeType = $Vp4xjtpabm0l;
    	return $this;
    }

    
    public function getIndexedFilename() {
		$Vj5bpwm1tfyp 	= strtolower($this->getMimeType());
		$Vj5bpwm1tfyp 	= explode('/', $Vj5bpwm1tfyp);
		$Vj5bpwm1tfyp 	= $Vj5bpwm1tfyp[1];

    	return $this->_uniqueName . $this->getImageIndex() . '.' . $Vj5bpwm1tfyp;
    }

	
	public function getHashCode() {
    	return md5(
    		  $this->_renderingFunction
    		. $this->_mimeType
    		. $this->_uniqueName
    		. parent::getHashCode()
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
