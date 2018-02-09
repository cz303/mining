<?php




class PHPExcel_Worksheet_RowDimension
{
	
	private $Vqayxv2gpsn0;

	
	private $Vdgghkcfhs45		= -1;

 	
	private $V1cocqyupk1a	= false;

	
	private $Vwey1yy2ahfw		= true;

	
	private $Vlfepkfw1k4k	= 0;

	
	private $Vczdvt1tarye		= false;

	
	private $V440jo03t3dc;

    
    public function __construct($V4z43kvcbihn = 0)
    {
    	
    	$this->_rowIndex		= $V4z43kvcbihn;

		
		$this->_xfIndex = null;
    }

    
    public function getRowIndex() {
    	return $this->_rowIndex;
    }

    
    public function setRowIndex($Vqujkwol1zut) {
    	$this->_rowIndex = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getRowHeight() {
    	return $this->_rowHeight;
    }

    
    public function setRowHeight($Vqujkwol1zut = -1) {
    	$this->_rowHeight = $Vqujkwol1zut;
    	return $this;
    }

	
	public function getZeroHeight() {
		return $this->_zeroHeight;
	}

	
	public function setZeroHeight($Vqujkwol1zut = false) {
		$this->_zeroHeight = $Vqujkwol1zut;
		return $this;
	}

    
    public function getVisible() {
    	return $this->_visible;
    }

    
    public function setVisible($Vqujkwol1zut = true) {
    	$this->_visible = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOutlineLevel() {
    	return $this->_outlineLevel;
    }

    
    public function setOutlineLevel($Vqujkwol1zut) {
    	if ($Vqujkwol1zut < 0 || $Vqujkwol1zut > 7) {
    		throw new PHPExcel_Exception("Outline level must range between 0 and 7.");
    	}

    	$this->_outlineLevel = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getCollapsed() {
    	return $this->_collapsed;
    }

    
    public function setCollapsed($Vqujkwol1zut = true) {
    	$this->_collapsed = $Vqujkwol1zut;
    	return $this;
    }

	
	public function getXfIndex()
	{
		return $this->_xfIndex;
	}

	
	public function setXfIndex($Vqujkwol1zut = 0)
	{
		$this->_xfIndex = $Vqujkwol1zut;
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
