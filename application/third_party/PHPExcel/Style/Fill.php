<?php




class PHPExcel_Style_Fill extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const FILL_NONE							= 'none';
	const FILL_SOLID						= 'solid';
	const FILL_GRADIENT_LINEAR				= 'linear';
	const FILL_GRADIENT_PATH				= 'path';
	const FILL_PATTERN_DARKDOWN				= 'darkDown';
	const FILL_PATTERN_DARKGRAY				= 'darkGray';
	const FILL_PATTERN_DARKGRID				= 'darkGrid';
	const FILL_PATTERN_DARKHORIZONTAL		= 'darkHorizontal';
	const FILL_PATTERN_DARKTRELLIS			= 'darkTrellis';
	const FILL_PATTERN_DARKUP				= 'darkUp';
	const FILL_PATTERN_DARKVERTICAL			= 'darkVertical';
	const FILL_PATTERN_GRAY0625				= 'gray0625';
	const FILL_PATTERN_GRAY125				= 'gray125';
	const FILL_PATTERN_LIGHTDOWN			= 'lightDown';
	const FILL_PATTERN_LIGHTGRAY			= 'lightGray';
	const FILL_PATTERN_LIGHTGRID			= 'lightGrid';
	const FILL_PATTERN_LIGHTHORIZONTAL		= 'lightHorizontal';
	const FILL_PATTERN_LIGHTTRELLIS			= 'lightTrellis';
	const FILL_PATTERN_LIGHTUP				= 'lightUp';
	const FILL_PATTERN_LIGHTVERTICAL		= 'lightVertical';
	const FILL_PATTERN_MEDIUMGRAY			= 'mediumGray';

	
	protected $Viztzyxv5mj3	= PHPExcel_Style_Fill::FILL_NONE;

	
	protected $Vaibxkjxj4kg	= 0;

	
	protected $V2lfudonx2qn;

	
	protected $Vezxpcf3hgzi;

	
	public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		
		if ($Vm5dy1e2hvny) {
			$this->_fillType = NULL;
		}
		$this->_startColor			= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_WHITE, $Vk1afaiczap4, $Vm5dy1e2hvny);
		$this->_endColor			= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK, $Vk1afaiczap4, $Vm5dy1e2hvny);

		
		if ($Vk1afaiczap4) {
			$this->_startColor->bindParent($this, '_startColor');
			$this->_endColor->bindParent($this, '_endColor');
		}
	}

	
	public function getSharedComponent()
	{
		return $this->_parent->getSharedComponent()->getFill();
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		return array('fill' => $Vi2ourgzeiw5);
	}

	
	public function applyFromArray($Vkaawzjkapbw = null) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (array_key_exists('type', $Vkaawzjkapbw)) {
					$this->setFillType($Vkaawzjkapbw['type']);
				}
				if (array_key_exists('rotation', $Vkaawzjkapbw)) {
					$this->setRotation($Vkaawzjkapbw['rotation']);
				}
				if (array_key_exists('startcolor', $Vkaawzjkapbw)) {
					$this->getStartColor()->applyFromArray($Vkaawzjkapbw['startcolor']);
				}
				if (array_key_exists('endcolor', $Vkaawzjkapbw)) {
					$this->getEndColor()->applyFromArray($Vkaawzjkapbw['endcolor']);
				}
				if (array_key_exists('color', $Vkaawzjkapbw)) {
					$this->getStartColor()->applyFromArray($Vkaawzjkapbw['color']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getFillType() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getFillType();
		}
		return $this->_fillType;
	}

	
	public function setFillType($Vqujkwol1zut = PHPExcel_Style_Fill::FILL_NONE) {
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('type' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_fillType = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getRotation() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getRotation();
		}
		return $this->_rotation;
	}

	
	public function setRotation($Vqujkwol1zut = 0) {
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('rotation' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_rotation = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getStartColor() {
		return $this->_startColor;
	}

	
	public function setStartColor(PHPExcel_Style_Color $Vqujkwol1zut = null) {
		
		$Vl5jzlxo3j3n = $Vqujkwol1zut->getIsSupervisor() ? $Vqujkwol1zut->getSharedComponent() : $Vqujkwol1zut;

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStartColor()->getStyleArray(array('argb' => $Vl5jzlxo3j3n->getARGB()));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_startColor = $Vl5jzlxo3j3n;
		}
		return $this;
	}

	
	public function getEndColor() {
		return $this->_endColor;
	}

	
	public function setEndColor(PHPExcel_Style_Color $Vqujkwol1zut = null) {
		
		$Vl5jzlxo3j3n = $Vqujkwol1zut->getIsSupervisor() ? $Vqujkwol1zut->getSharedComponent() : $Vqujkwol1zut;

		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getEndColor()->getStyleArray(array('argb' => $Vl5jzlxo3j3n->getARGB()));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_endColor = $Vl5jzlxo3j3n;
		}
		return $this;
	}

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
		return md5(
			  $this->getFillType()
			. $this->getRotation()
			. $this->getStartColor()->getHashCode()
			. $this->getEndColor()->getHashCode()
			. __CLASS__
		);
	}

}
