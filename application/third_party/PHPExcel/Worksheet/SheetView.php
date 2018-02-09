<?php




class PHPExcel_Worksheet_SheetView
{

	
	const SHEETVIEW_NORMAL				= 'normal';
	const SHEETVIEW_PAGE_LAYOUT			= 'pageLayout';
	const SHEETVIEW_PAGE_BREAK_PREVIEW	= 'pageBreakPreview';

	private static $V2yfyptcu0i3 = array(
		self::SHEETVIEW_NORMAL,
		self::SHEETVIEW_PAGE_LAYOUT,
		self::SHEETVIEW_PAGE_BREAK_PREVIEW,
	);

	
	private $V35aqbh1y0fm			= 100;

	
	private $V35aqbh1y0fmNormal	= 100;

	
	private $Vbdtbbfvux0q		= self::SHEETVIEW_NORMAL;

    
    public function __construct()
    {
    }

	
	public function getZoomScale() {
		return $this->_zoomScale;
	}

	
	public function setZoomScale($Vqujkwol1zut = 100) {
		
		
		if (($Vqujkwol1zut >= 1) || is_null($Vqujkwol1zut)) {
			$this->_zoomScale = $Vqujkwol1zut;
		} else {
			throw new PHPExcel_Exception("Scale must be greater than or equal to 1.");
		}
		return $this;
	}

	
	public function getZoomScaleNormal() {
		return $this->_zoomScaleNormal;
	}

	
	public function setZoomScaleNormal($Vqujkwol1zut = 100) {
		if (($Vqujkwol1zut >= 1) || is_null($Vqujkwol1zut)) {
			$this->_zoomScaleNormal = $Vqujkwol1zut;
		} else {
			throw new PHPExcel_Exception("Scale must be greater than or equal to 1.");
		}
		return $this;
	}

	
	public function getView() {
		return $this->_sheetviewType;
	}

	
	public function setView($Vqujkwol1zut = NULL) {
		
		
		if ($Vqujkwol1zut === NULL)
			$Vqujkwol1zut = self::SHEETVIEW_NORMAL;
		if (in_array($Vqujkwol1zut, self::$V2yfyptcu0i3)) {
			$this->_sheetviewType = $Vqujkwol1zut;
		} else {
			throw new PHPExcel_Exception("Invalid sheetview layout type.");
		}

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
