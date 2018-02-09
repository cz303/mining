<?php




class PHPExcel_Style_Border extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const BORDER_NONE				= 'none';
	const BORDER_DASHDOT			= 'dashDot';
	const BORDER_DASHDOTDOT			= 'dashDotDot';
	const BORDER_DASHED				= 'dashed';
	const BORDER_DOTTED				= 'dotted';
	const BORDER_DOUBLE				= 'double';
	const BORDER_HAIR				= 'hair';
	const BORDER_MEDIUM				= 'medium';
	const BORDER_MEDIUMDASHDOT		= 'mediumDashDot';
	const BORDER_MEDIUMDASHDOTDOT	= 'mediumDashDotDot';
	const BORDER_MEDIUMDASHED		= 'mediumDashed';
	const BORDER_SLANTDASHDOT		= 'slantDashDot';
	const BORDER_THICK				= 'thick';
	const BORDER_THIN				= 'thin';

	
	protected $Vp5mf4hfrv0x	= PHPExcel_Style_Border::BORDER_NONE;

	
	protected $V0nr4meefg1f;

	
	protected $Vvvticaehq2h;

	
	public function __construct($Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		
		$this->_color	= new PHPExcel_Style_Color(PHPExcel_Style_Color::COLOR_BLACK, $Vk1afaiczap4);

		
		if ($Vk1afaiczap4) {
			$this->_color->bindParent($this, '_color');
		}
	}

	
	public function bindParent($V3jkqexf4nr0, $V3jkqexf4nr0PropertyName=NULL)
	{
		$this->_parent = $V3jkqexf4nr0;
		$this->_parentPropertyName = $V3jkqexf4nr0PropertyName;
		return $this;
	}

	
	public function getSharedComponent()
	{
		switch ($this->_parentPropertyName) {
			case '_allBorders':
			case '_horizontal':
			case '_inside':
			case '_outline':
			case '_vertical':
				throw new PHPExcel_Exception('Cannot get shared component for a pseudo-border.');
				break;
			case '_bottom':
				return $this->_parent->getSharedComponent()->getBottom();		break;
			case '_diagonal':
				return $this->_parent->getSharedComponent()->getDiagonal();		break;
			case '_left':
				return $this->_parent->getSharedComponent()->getLeft();			break;
			case '_right':
				return $this->_parent->getSharedComponent()->getRight();		break;
			case '_top':
				return $this->_parent->getSharedComponent()->getTop();			break;

		}
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		switch ($this->_parentPropertyName) {
		case '_allBorders':
				$Vseq1edikdvg = 'allborders';	break;
		case '_bottom':
				$Vseq1edikdvg = 'bottom';		break;
		case '_diagonal':
				$Vseq1edikdvg = 'diagonal';		break;
		case '_horizontal':
				$Vseq1edikdvg = 'horizontal';	break;
		case '_inside':
				$Vseq1edikdvg = 'inside';		break;
		case '_left':
				$Vseq1edikdvg = 'left';			break;
		case '_outline':
				$Vseq1edikdvg = 'outline';		break;
		case '_right':
				$Vseq1edikdvg = 'right';			break;
		case '_top':
				$Vseq1edikdvg = 'top';			break;
		case '_vertical':
				$Vseq1edikdvg = 'vertical';		break;
		}
		return $this->_parent->getStyleArray(array($Vseq1edikdvg => $Vi2ourgzeiw5));
	}

	
	public function applyFromArray($Vkaawzjkapbw = null) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (isset($Vkaawzjkapbw['style'])) {
					$this->setBorderStyle($Vkaawzjkapbw['style']);
				}
				if (isset($Vkaawzjkapbw['color'])) {
					$this->getColor()->applyFromArray($Vkaawzjkapbw['color']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getBorderStyle() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getBorderStyle();
		}
		return $this->_borderStyle;
	}

	
	public function setBorderStyle($Vqujkwol1zut = PHPExcel_Style_Border::BORDER_NONE) {

		if (empty($Vqujkwol1zut)) {
			$Vqujkwol1zut = PHPExcel_Style_Border::BORDER_NONE;
		} elseif(is_bool($Vqujkwol1zut) && $Vqujkwol1zut) {
			$Vqujkwol1zut = PHPExcel_Style_Border::BORDER_MEDIUM;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('style' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_borderStyle = $Vqujkwol1zut;
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
			  $this->_borderStyle
			. $this->_color->getHashCode()
			. __CLASS__
		);
	}

}
