<?php




class PHPExcel_Style_Alignment extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const HORIZONTAL_GENERAL			= 'general';
	const HORIZONTAL_LEFT				= 'left';
	const HORIZONTAL_RIGHT				= 'right';
	const HORIZONTAL_CENTER				= 'center';
	const HORIZONTAL_CENTER_CONTINUOUS	= 'centerContinuous';
	const HORIZONTAL_JUSTIFY			= 'justify';
	const HORIZONTAL_FILL				= 'fill';
	const HORIZONTAL_DISTRIBUTED		= 'distributed';        

	
	const VERTICAL_BOTTOM				= 'bottom';
	const VERTICAL_TOP					= 'top';
	const VERTICAL_CENTER				= 'center';
	const VERTICAL_JUSTIFY				= 'justify';
	const VERTICAL_DISTRIBUTED		    = 'distributed';        

	
	const READORDER_CONTEXT				= 0;
	const READORDER_LTR	    			= 1;
	const READORDER_RTL  				= 2;

	
	protected $Vhkizoer5ayp = PHPExcel_Style_Alignment::HORIZONTAL_GENERAL;

	
	protected $Vmju4rjb1tn2 = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;

	
	protected $V2omtxfjpq5f = 0;

	
	protected $Vwgm5pngpzk5 = FALSE;

	
	protected $Vw1kq3djme2h	= FALSE;

	
	protected $Vr3tn0c1na4v = 0;

	
	protected $Vi1z1wr0jmnn = 0;

	
	public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		if ($Vm5dy1e2hvny) {
			$this->_horizontal		= NULL;
			$this->_vertical		= NULL;
			$this->_textRotation	= NULL;
		}
	}

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getAlignment();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('alignment' => $Vi2ourgzeiw5);
	}

	
	public function applyFromArray($Vkaawzjkapbw = NULL) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())
				    ->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (isset($Vkaawzjkapbw['horizontal'])) {
					$this->setHorizontal($Vkaawzjkapbw['horizontal']);
				}
				if (isset($Vkaawzjkapbw['vertical'])) {
					$this->setVertical($Vkaawzjkapbw['vertical']);
				}
				if (isset($Vkaawzjkapbw['rotation'])) {
					$this->setTextRotation($Vkaawzjkapbw['rotation']);
				}
				if (isset($Vkaawzjkapbw['wrap'])) {
					$this->setWrapText($Vkaawzjkapbw['wrap']);
				}
				if (isset($Vkaawzjkapbw['shrinkToFit'])) {
					$this->setShrinkToFit($Vkaawzjkapbw['shrinkToFit']);
				}
				if (isset($Vkaawzjkapbw['indent'])) {
					$this->setIndent($Vkaawzjkapbw['indent']);
				}
				if (isset($Vkaawzjkapbw['readorder'])) {
					$this->setReadorder($Vkaawzjkapbw['readorder']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getHorizontal() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHorizontal();
		}
		return $this->_horizontal;
	}

	
	public function setHorizontal($Vqujkwol1zut = PHPExcel_Style_Alignment::HORIZONTAL_GENERAL) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = PHPExcel_Style_Alignment::HORIZONTAL_GENERAL;
		}

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('horizontal' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		}
		else {
			$this->_horizontal = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getVertical() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getVertical();
		}
		return $this->_vertical;
	}

	
	public function setVertical($Vqujkwol1zut = PHPExcel_Style_Alignment::VERTICAL_BOTTOM) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
		}

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('vertical' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_vertical = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getTextRotation() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getTextRotation();
		}
		return $this->_textRotation;
	}

	
	public function setTextRotation($Vqujkwol1zut = 0) {
		
		if ($Vqujkwol1zut == 255) {
			$Vqujkwol1zut = -165;
		}

		
		if ( ($Vqujkwol1zut >= -90 && $Vqujkwol1zut <= 90) || $Vqujkwol1zut == -165 ) {
			if ($this->_isSupervisor) {
				$Vldnaod3wmnp = $this->getStyleArray(array('rotation' => $Vqujkwol1zut));
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
			} else {
				$this->_textRotation = $Vqujkwol1zut;
			}
		} else {
			throw new PHPExcel_Exception("Text rotation should be a value between -90 and 90.");
		}

		return $this;
	}

	
	public function getWrapText() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getWrapText();
		}
		return $this->_wrapText;
	}

	
	public function setWrapText($Vqujkwol1zut = FALSE) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = FALSE;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('wrap' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_wrapText = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getShrinkToFit() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getShrinkToFit();
		}
		return $this->_shrinkToFit;
	}

	
	public function setShrinkToFit($Vqujkwol1zut = FALSE) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = FALSE;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('shrinkToFit' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_shrinkToFit = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getIndent() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getIndent();
		}
		return $this->_indent;
	}

	
	public function setIndent($Vqujkwol1zut = 0) {
		if ($Vqujkwol1zut > 0) {
			if ($this->getHorizontal() != self::HORIZONTAL_GENERAL &&
				$this->getHorizontal() != self::HORIZONTAL_LEFT &&
				$this->getHorizontal() != self::HORIZONTAL_RIGHT) {
				$Vqujkwol1zut = 0; 
			}
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('indent' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_indent = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getReadorder() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getReadorder();
		}
		return $this->_readorder;
	}

	
	public function setReadorder($Vqujkwol1zut = 0) {
		if ($Vqujkwol1zut < 0 || $Vqujkwol1zut > 2) {
            $Vqujkwol1zut = 0;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('readorder' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_readorder = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
		return md5(
			  $this->_horizontal
			. $this->_vertical
			. $this->_textRotation
			. ($this->_wrapText ? 't' : 'f')
			. ($this->_shrinkToFit ? 't' : 'f')
			. $this->_indent
			. $this->_readorder
			. __CLASS__
		);
	}

}
