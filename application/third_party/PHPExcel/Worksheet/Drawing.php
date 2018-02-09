<?php




class PHPExcel_Worksheet_Drawing extends PHPExcel_Worksheet_BaseDrawing implements PHPExcel_IComparable
{
	
	private $Vlf11scadlqd;

    
    public function __construct()
    {
    	
    	$this->_path				= '';

    	
    	parent::__construct();
    }

    
    public function getFilename() {
    	return basename($this->_path);
    }

    
    public function getIndexedFilename() {
    	$V40kppmutioo = $this->getFilename();
    	$V40kppmutioo = str_replace(' ', '_', $V40kppmutioo);
    	return str_replace('.' . $this->getExtension(), '', $V40kppmutioo) . $this->getImageIndex() . '.' . $this->getExtension();
    }

    
    public function getExtension() {
    	$Vvw3vfqn0e2a = explode(".", basename($this->_path));
    	return $Vvw3vfqn0e2a[count($Vvw3vfqn0e2a) - 1];
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
