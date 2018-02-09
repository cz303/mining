<?php




class PHPExcel_Worksheet_PageMargins
{
	
	private $V1ikywt2wffl		= 0.7;

	
	private $V2c2naai4a1h		= 0.7;

	
	private $Vstdkrkvmnhb		= 0.75;

	
	private $Vi31nen2maro	= 0.75;

	
	private $Vn2n3th4zzzx 	= 0.3;

	
	private $V1v3ewzr4dmi 	= 0.3;

    
    public function __construct()
    {
    }

    
    public function getLeft() {
    	return $this->_left;
    }

    
    public function setLeft($Vqujkwol1zut) {
    	$this->_left = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getRight() {
    	return $this->_right;
    }

    
    public function setRight($Vqujkwol1zut) {
    	$this->_right = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getTop() {
    	return $this->_top;
    }

    
    public function setTop($Vqujkwol1zut) {
    	$this->_top = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getBottom() {
    	return $this->_bottom;
    }

    
    public function setBottom($Vqujkwol1zut) {
    	$this->_bottom = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getHeader() {
    	return $this->_header;
    }

    
    public function setHeader($Vqujkwol1zut) {
    	$this->_header = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getFooter() {
    	return $this->_footer;
    }

    
    public function setFooter($Vqujkwol1zut) {
    	$this->_footer = $Vqujkwol1zut;
    	return $this;
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
