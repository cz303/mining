<?php



class PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer
{
	
	private $Vq20emrsdn3q;

	
	private $Vkfeiq5a1khq = false;

	
	private $Vgobnqh5azeu;

	
	private $Vyclc2l5h4yy;

	
	private $Vonhmc0uzum0;

	
	private $Vqqptltwkllr;

	
	private $Vcsf3jk2qrvo;

	
	private $Vitgkbvb2atc;

	
	private $Vf31aox3ofcx;

	
	private $Vvdnn24sqncd;

	
	private $V2u0bf3z5l24;

	
	private $Vts52eaetd5z;

	
	public function setParent($V3jkqexf4nr0)
	{
		$this->_parent = $V3jkqexf4nr0;
	}

	
	public function getParent()
	{
		return $this->_parent;
	}

	
	public function setSpgr($Vp4xjtpabm0l = false)
	{
		$this->_spgr = $Vp4xjtpabm0l;
	}

	
	public function getSpgr()
	{
		return $this->_spgr;
	}

	
	public function setSpType($Vp4xjtpabm0l)
	{
		$this->_spType = $Vp4xjtpabm0l;
	}

	
	public function getSpType()
	{
		return $this->_spType;
	}

	
	public function setSpFlag($Vp4xjtpabm0l)
	{
		$this->_spFlag = $Vp4xjtpabm0l;
	}

	
	public function getSpFlag()
	{
		return $this->_spFlag;
	}

	
	public function setSpId($Vp4xjtpabm0l)
	{
		$this->_spId = $Vp4xjtpabm0l;
	}

	
	public function getSpId()
	{
		return $this->_spId;
	}

	
	public function setOPT($Vp05lpnwyave, $Vp4xjtpabm0l)
	{
		$this->_OPT[$Vp05lpnwyave] = $Vp4xjtpabm0l;
	}

	
	public function getOPT($Vp05lpnwyave)
	{
		if (isset($this->_OPT[$Vp05lpnwyave])) {
			return $this->_OPT[$Vp05lpnwyave];
		}
		return null;
	}

	
	public function getOPTCollection()
	{
		return $this->_OPT;
	}

	
	public function setStartCoordinates($Vp4xjtpabm0l = 'A1')
	{
		$this->_startCoordinates = $Vp4xjtpabm0l;
	}

	
	public function getStartCoordinates()
	{
		return $this->_startCoordinates;
	}

	
	public function setStartOffsetX($V3mz1f4hpcjp = 0)
	{
		$this->_startOffsetX = $V3mz1f4hpcjp;
	}

	
	public function getStartOffsetX()
	{
		return $this->_startOffsetX;
	}

	
	public function setStartOffsetY($Vzlq0iwdgyx5 = 0)
	{
		$this->_startOffsetY = $Vzlq0iwdgyx5;
	}

	
	public function getStartOffsetY()
	{
		return $this->_startOffsetY;
	}

	
	public function setEndCoordinates($Vp4xjtpabm0l = 'A1')
	{
		$this->_endCoordinates = $Vp4xjtpabm0l;
	}

	
	public function getEndCoordinates()
	{
		return $this->_endCoordinates;
	}

	
	public function setEndOffsetX($Vtwxzxnreiyz = 0)
	{
		$this->_endOffsetX = $Vtwxzxnreiyz;
	}

	
	public function getEndOffsetX()
	{
		return $this->_endOffsetX;
	}

	
	public function setEndOffsetY($Vbodx1gz2f51 = 0)
	{
		$this->_endOffsetY = $Vbodx1gz2f51;
	}

	
	public function getEndOffsetY()
	{
		return $this->_endOffsetY;
	}

	
	public function getNestingLevel()
	{
		$Vhj0o2b1ypmg = 0;

		$V3jkqexf4nr0 = $this->getParent();
		while ($V3jkqexf4nr0 instanceof PHPExcel_Shared_Escher_DgContainer_SpgrContainer) {
			++$Vhj0o2b1ypmg;
			$V3jkqexf4nr0 = $V3jkqexf4nr0->getParent();
		}

		return $Vhj0o2b1ypmg;
	}
}
