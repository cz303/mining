<?php




class PHPExcel_Style_Font extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const UNDERLINE_NONE					= 'none';
	const UNDERLINE_DOUBLE					= 'double';
	const UNDERLINE_DOUBLEACCOUNTING		= 'doubleAccounting';
	const UNDERLINE_SINGLE					= 'single';
	const UNDERLINE_SINGLEACCOUNTING		= 'singleAccounting';

	
	protected $Vp2zlcj4wcuv			= 'Calibri';

	
	protected $V3ktvrhzvzgf			= 11;

	
	protected $Ve5cqq5w3w3f			= FALSE;

	
	protected $Vzvaq1nlxdcc		= FALSE;

	
	protected $Vbhejhlwak2o	= FALSE;

	
	protected $Vpprqfarjmxi		= FALSE;

	
	protected $Vwk5nudxo4z4		= self::UNDERLINE_NONE;

	
	protected $V5n45ufs2ogt	= FALSE;

	
	protected $V0nr4meefg1f;

	
	public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		
		if ($Vm5dy1e2hvny) {
			$this->_name			= NULL;
			$this->_size			= NULL;
			$this->_bold			= NULL;
			$this->_italic			= NULL;
			$this->_superScript		= NULL;
			$this->_subScript		= NULL;
			$this->_underline		= NULL;
			$this->_strikethrough	= NULL;
			$this->_color			= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK, $Vk1afaiczap4, $Vm5dy1e2hvny);
		} else {
			$this->_color	= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK, $Vk1afaiczap4);
		}
		
		if ($Vk1afaiczap4) {
			$this->_color->bindParent($this, '_color');
		}
	}

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getFont();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('font' => $Vi2ourgzeiw5);
	}

	
	public function applyFromArray($Vkaawzjkapbw = null) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (array_key_exists('name', $Vkaawzjkapbw)) {
					$this->setName($Vkaawzjkapbw['name']);
				}
				if (array_key_exists('bold', $Vkaawzjkapbw)) {
					$this->setBold($Vkaawzjkapbw['bold']);
				}
				if (array_key_exists('italic', $Vkaawzjkapbw)) {
					$this->setItalic($Vkaawzjkapbw['italic']);
				}
				if (array_key_exists('superScript', $Vkaawzjkapbw)) {
					$this->setSuperScript($Vkaawzjkapbw['superScript']);
				}
				if (array_key_exists('subScript', $Vkaawzjkapbw)) {
					$this->setSubScript($Vkaawzjkapbw['subScript']);
				}
				if (array_key_exists('underline', $Vkaawzjkapbw)) {
					$this->setUnderline($Vkaawzjkapbw['underline']);
				}
				if (array_key_exists('strike', $Vkaawzjkapbw)) {
					$this->setStrikethrough($Vkaawzjkapbw['strike']);
				}
				if (array_key_exists('color', $Vkaawzjkapbw)) {
					$this->getColor()->applyFromArray($Vkaawzjkapbw['color']);
				}
				if (array_key_exists('size', $Vkaawzjkapbw)) {
					$this->setSize($Vkaawzjkapbw['size']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getName() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getName();
		}
		return $this->_name;
	}

	
	public function setName($Vqujkwol1zut = 'Calibri') {
  		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = 'Calibri';
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('name' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_name = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getSize() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getSize();
		}
		return $this->_size;
	}

	
	public function setSize($Vqujkwol1zut = 10) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = 10;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('size' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_size = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getBold() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getBold();
		}
		return $this->_bold;
	}

	
	public function setBold($Vqujkwol1zut = false) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = false;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('bold' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_bold = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getItalic() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getItalic();
		}
		return $this->_italic;
	}

	
	public function setItalic($Vqujkwol1zut = false) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = false;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('italic' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_italic = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getSuperScript() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getSuperScript();
		}
		return $this->_superScript;
	}

	
	public function setSuperScript($Vqujkwol1zut = false) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = false;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('superScript' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_superScript = $Vqujkwol1zut;
			$this->_subScript = !$Vqujkwol1zut;
		}
		return $this;
	}

		
	public function getSubScript() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getSubScript();
		}
		return $this->_subScript;
	}

	
	public function setSubScript($Vqujkwol1zut = false) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = false;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('subScript' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_subScript = $Vqujkwol1zut;
			$this->_superScript = !$Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getUnderline() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getUnderline();
		}
		return $this->_underline;
	}

	
	public function setUnderline($Vqujkwol1zut = self::UNDERLINE_NONE) {
		if (is_bool($Vqujkwol1zut)) {
			$Vqujkwol1zut = ($Vqujkwol1zut) ? self::UNDERLINE_SINGLE : self::UNDERLINE_NONE;
		} elseif ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = self::UNDERLINE_NONE;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('underline' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_underline = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getStrikethrough() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getStrikethrough();
		}
		return $this->_strikethrough;
	}

	
	public function setStrikethrough($Vqujkwol1zut = false) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = false;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('strike' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_strikethrough = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getColor() {
		return $this->_color;
	}

	
	public function setColor(PHPExcel_Style_Color $Vqujkwol1zut = null) {
		
		$Vl5jzlxo3j3n = $Vqujkwol1zut->getIsSupervisor() ? $Vqujkwol1zut->getSharedComponent() : $Vqujkwol1zut;

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getColor()->getStyleArray(array('argb' => $Vl5jzlxo3j3n->getARGB()));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_color = $Vl5jzlxo3j3n;
		}
		return $this;
	}

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
		return md5(
			  $this->_name
			. $this->_size
			. ($this->_bold ? 't' : 'f')
			. ($this->_italic ? 't' : 'f')
			. ($this->_superScript ? 't' : 'f')
			. ($this->_subScript ? 't' : 'f')
			. $this->_underline
			. ($this->_strikethrough ? 't' : 'f')
			. $this->_color->getHashCode()
			. __CLASS__
		);
	}

}
