<?php




class PHPExcel_Worksheet_ColumnDimension
{
	
	private $Vs5giznb4xra;

	
	private $V1hgtvz3lirj			= -1;

	
	private $V5umtstiztge		= false;

	
	private $Vwey1yy2ahfw		= true;

	
	private $Vlfepkfw1k4k	= 0;

	
	private $Vczdvt1tarye		= false;

	
	private $V440jo03t3dc;

    
    public function __construct($V4z43kvcbihn = 'A')
    {
    	
    	$this->_columnIndex		= $V4z43kvcbihn;

		
		$this->_xfIndex = 0;
    }

    
    public function getColumnIndex() {
    	return $this->_columnIndex;
    }

    
    public function setColumnIndex($Vqujkwol1zut) {
    	$this->_columnIndex = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getWidth() {
    	return $this->_width;
    }

    
    public function setWidth($Vqujkwol1zut = -1) {
    	$this->_width = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getAutoSize() {
    	return $this->_autoSize;
    }

    
    public function setAutoSize($Vqujkwol1zut = false) {
    	$this->_autoSize = $Vqujkwol1zut;
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
