<?php




class PHPExcel_Style_Borders extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const DIAGONAL_NONE		= 0;
	const DIAGONAL_UP		= 1;
	const DIAGONAL_DOWN		= 2;
	const DIAGONAL_BOTH		= 3;

	
	protected $V1ikywt2wffl;

	
	protected $V2c2naai4a1h;

	
	protected $Vstdkrkvmnhb;

	
	protected $Vi31nen2maro;

	
	protected $Vbosakckby0l;

	
	protected $Vbosakckby0lDirection;

	
	protected $Vnwkytyazuor;

	
	protected $V5djyv15ikcn;

	
	protected $Vx3bpjms2mnn;

	
	protected $Vmju4rjb1tn2;

	
	protected $Vhkizoer5ayp;

	
    public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
    {
    	
		parent::__construct($Vk1afaiczap4);

    	
    	$this->_left				= new PHPExcel_Style_Border($Vk1afaiczap4, $Vm5dy1e2hvny);
    	$this->_right				= new PHPExcel_Style_Border($Vk1afaiczap4, $Vm5dy1e2hvny);
    	$this->_top					= new PHPExcel_Style_Border($Vk1afaiczap4, $Vm5dy1e2hvny);
    	$this->_bottom				= new PHPExcel_Style_Border($Vk1afaiczap4, $Vm5dy1e2hvny);
    	$this->_diagonal			= new PHPExcel_Style_Border($Vk1afaiczap4, $Vm5dy1e2hvny);
		$this->_diagonalDirection	= PHPExcel_Style_Borders::DIAGONAL_NONE;

		
		if ($Vk1afaiczap4) {
			
			$this->_allBorders			= new PHPExcel_Style_Border(TRUE);
			$this->_outline				= new PHPExcel_Style_Border(TRUE);
			$this->_inside				= new PHPExcel_Style_Border(TRUE);
			$this->_vertical			= new PHPExcel_Style_Border(TRUE);
			$this->_horizontal			= new PHPExcel_Style_Border(TRUE);

			
			$this->_left->bindParent($this, '_left');
			$this->_right->bindParent($this, '_right');
			$this->_top->bindParent($this, '_top');
			$this->_bottom->bindParent($this, '_bottom');
			$this->_diagonal->bindParent($this, '_diagonal');
			$this->_allBorders->bindParent($this, '_allBorders');
			$this->_outline->bindParent($this, '_outline');
			$this->_inside->bindParent($this, '_inside');
			$this->_vertical->bindParent($this, '_vertical');
			$this->_horizontal->bindParent($this, '_horizontal');
		}
    }

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getBorders();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('borders' => $Vi2ourgzeiw5);
	}

	
	public function applyFromArray($Vkaawzjkapbw = null) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (array_key_exists('left', $Vkaawzjkapbw)) {
					$this->getLeft()->applyFromArray($Vkaawzjkapbw['left']);
				}
				if (array_key_exists('right', $Vkaawzjkapbw)) {
					$this->getRight()->applyFromArray($Vkaawzjkapbw['right']);
				}
				if (array_key_exists('top', $Vkaawzjkapbw)) {
					$this->getTop()->applyFromArray($Vkaawzjkapbw['top']);
				}
				if (array_key_exists('bottom', $Vkaawzjkapbw)) {
					$this->getBottom()->applyFromArray($Vkaawzjkapbw['bottom']);
				}
				if (array_key_exists('diagonal', $Vkaawzjkapbw)) {
					$this->getDiagonal()->applyFromArray($Vkaawzjkapbw['diagonal']);
				}
				if (array_key_exists('diagonaldirection', $Vkaawzjkapbw)) {
					$this->setDiagonalDirection($Vkaawzjkapbw['diagonaldirection']);
				}
				if (array_key_exists('allborders', $Vkaawzjkapbw)) {
					$this->getLeft()->applyFromArray($Vkaawzjkapbw['allborders']);
					$this->getRight()->applyFromArray($Vkaawzjkapbw['allborders']);
					$this->getTop()->applyFromArray($Vkaawzjkapbw['allborders']);
					$this->getBottom()->applyFromArray($Vkaawzjkapbw['allborders']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

    
    public function getLeft() {
		return $this->_left;
    }

    
    public function getRight() {
		return $this->_right;
    }

    
    public function getTop() {
		return $this->_top;
    }

    
    public function getBottom() {
		return $this->_bottom;
    }

    
    public function getDiagonal() {
		return $this->_diagonal;
    }

    
    public function getAllBorders() {
		if (!$this->_isSupervisor) {
			throw new PHPExcel_Exception('Can only get pseudo-border for supervisor.');
		}
		return $this->_allBorders;
    }

    
    public function getOutline() {
		if (!$this->_isSupervisor) {
			throw new PHPExcel_Exception('Can only get pseudo-border for supervisor.');
		}
    	return $this->_outline;
    }

    
    public function getInside() {
		if (!$this->_isSupervisor) {
			throw new PHPExcel_Exception('Can only get pseudo-border for supervisor.');
		}
    	return $this->_inside;
    }

    
    public function getVertical() {
		if (!$this->_isSupervisor) {
			throw new PHPExcel_Exception('Can only get pseudo-border for supervisor.');
		}
		return $this->_vertical;
    }

    
    public function getHorizontal() {
		if (!$this->_isSupervisor) {
			throw new PHPExcel_Exception('Can only get pseudo-border for supervisor.');
		}
		return $this->_horizontal;
    }

    
    public function getDiagonalDirection() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getDiagonalDirection();
		}
    	return $this->_diagonalDirection;
    }

    
    public function setDiagonalDirection($Vqujkwol1zut = PHPExcel_Style_Borders::DIAGONAL_NONE) {
        if ($Vqujkwol1zut == '') {
    		$Vqujkwol1zut = PHPExcel_Style_Borders::DIAGONAL_NONE;
    	}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('diagonaldirection' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_diagonalDirection = $Vqujkwol1zut;
		}
		return $this;
    }

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashcode();
		}
    	return md5(
    		  $this->getLeft()->getHashCode()
    		. $this->getRight()->getHashCode()
    		. $this->getTop()->getHashCode()
    		. $this->getBottom()->getHashCode()
    		. $this->getDiagonal()->getHashCode()
    		. $this->getDiagonalDirection()
    		. __CLASS__
    	);
    }

}
