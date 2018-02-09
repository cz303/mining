<?php




class PHPExcel_Style_Protection extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const PROTECTION_INHERIT		= 'inherit';
	const PROTECTION_PROTECTED		= 'protected';
	const PROTECTION_UNPROTECTED	= 'unprotected';

	
	protected $Vktc5koqdqi3;

	
	protected $Vbsngybclk5y;

	
    public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
    {
    	
		parent::__construct($Vk1afaiczap4);

    	
		if (!$Vm5dy1e2hvny) {
	    	$this->_locked			= self::PROTECTION_INHERIT;
	    	$this->_hidden			= self::PROTECTION_INHERIT;
		}
    }

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getProtection();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('protection' => $Vi2ourgzeiw5);
	}

    
	public function applyFromArray($Vkaawzjkapbw = NULL) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (isset($Vkaawzjkapbw['locked'])) {
					$this->setLocked($Vkaawzjkapbw['locked']);
				}
				if (isset($Vkaawzjkapbw['hidden'])) {
					$this->setHidden($Vkaawzjkapbw['hidden']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

    
    public function getLocked() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getLocked();
		}
    	return $this->_locked;
    }

    
    public function setLocked($Vqujkwol1zut = self::PROTECTION_INHERIT) {
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('locked' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_locked = $Vqujkwol1zut;
		}
		return $this;
    }

    
    public function getHidden() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHidden();
		}
    	return $this->_hidden;
    }

    
    public function setHidden($Vqujkwol1zut = self::PROTECTION_INHERIT) {
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('hidden' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_hidden = $Vqujkwol1zut;
		}
		return $this;
    }

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
    	return md5(
    		  $this->_locked
    		. $this->_hidden
    		. __CLASS__
    	);
    }

}
