<?php




class PHPExcel_NamedRange
{
	
	private $Vp2zlcj4wcuv;

	
	private $Vcsepalfuv1z;

	
	private $Vwxmny2ejrmc;

	
	private $Vvcwxvh1nmyn;

	
	private $V53n0e0tpo0y;

    
    public function __construct($Vsyidwvjoowz = null, PHPExcel_Worksheet $Vnrv4ypspcxk, $Vem4atrpzxcs = 'A1', $Vsqlcs4el1w5 = false, $Vubqsjzwmoxy = null)
    {
    	
    	if (($Vsyidwvjoowz === NULL) || ($Vnrv4ypspcxk === NULL) || ($Vem4atrpzxcs === NULL)) {
    		throw new PHPExcel_Exception('Parameters can not be null.');
    	}

    	
    	$this->_name 		= $Vsyidwvjoowz;
    	$this->_worksheet 	= $Vnrv4ypspcxk;
    	$this->_range 		= $Vem4atrpzxcs;
    	$this->_localOnly 	= $Vsqlcs4el1w5;
    	$this->_scope 		= ($Vsqlcs4el1w5 == true) ?
								(($Vubqsjzwmoxy == null) ? $Vnrv4ypspcxk : $Vubqsjzwmoxy) : null;
    }

    
    public function getName() {
    	return $this->_name;
    }

    
    public function setName($Vp4xjtpabm0l = null) {
    	if ($Vp4xjtpabm0l !== NULL) {
    		
    		$V2ph2cdbyezi = $this->_name;

    		
    		if ($this->_worksheet !== NULL) {
    			$this->_worksheet->getParent()->removeNamedRange($this->_name,$this->_worksheet);
    		}
    		$this->_name = $Vp4xjtpabm0l;

    		if ($this->_worksheet !== NULL) {
    			$this->_worksheet->getParent()->addNamedRange($this);
    		}

	    	
	    	$Vavale4ro4xo = $this->_name;
	    	PHPExcel_ReferenceHelper::getInstance()->updateNamedFormulas($this->_worksheet->getParent(), $V2ph2cdbyezi, $Vavale4ro4xo);
    	}
    	return $this;
    }

    
    public function getWorksheet() {
    	return $this->_worksheet;
    }

    
    public function setWorksheet(PHPExcel_Worksheet $Vp4xjtpabm0l = null) {
    	if ($Vp4xjtpabm0l !== NULL) {
    		$this->_worksheet = $Vp4xjtpabm0l;
    	}
    	return $this;
    }

    
    public function getRange() {
    	return $this->_range;
    }

    
    public function setRange($Vp4xjtpabm0l = null) {
    	if ($Vp4xjtpabm0l !== NULL) {
    		$this->_range = $Vp4xjtpabm0l;
    	}
    	return $this;
    }

    
    public function getLocalOnly() {
    	return $this->_localOnly;
    }

    
    public function setLocalOnly($Vp4xjtpabm0l = false) {
    	$this->_localOnly = $Vp4xjtpabm0l;
    	$this->_scope = $Vp4xjtpabm0l ? $this->_worksheet : null;
    	return $this;
    }

    
    public function getScope() {
    	return $this->_scope;
    }

    
    public function setScope(PHPExcel_Worksheet $Vp4xjtpabm0l = null) {
    	$this->_scope = $Vp4xjtpabm0l;
    	$this->_localOnly = ($Vp4xjtpabm0l == null) ? false : true;
    	return $this;
    }

    
    public static function resolveRange($VsyidwvjoowzdRange = '', PHPExcel_Worksheet $Vci1dgyyzjho) {
		return $Vci1dgyyzjho->getParent()->getNamedRange($VsyidwvjoowzdRange, $Vci1dgyyzjho);
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
