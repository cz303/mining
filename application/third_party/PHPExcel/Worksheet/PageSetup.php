<?php




class PHPExcel_Worksheet_PageSetup
{
	
	const PAPERSIZE_LETTER							= 1;
	const PAPERSIZE_LETTER_SMALL					= 2;
	const PAPERSIZE_TABLOID							= 3;
	const PAPERSIZE_LEDGER							= 4;
	const PAPERSIZE_LEGAL							= 5;
	const PAPERSIZE_STATEMENT						= 6;
	const PAPERSIZE_EXECUTIVE						= 7;
	const PAPERSIZE_A3								= 8;
	const PAPERSIZE_A4								= 9;
	const PAPERSIZE_A4_SMALL						= 10;
	const PAPERSIZE_A5								= 11;
	const PAPERSIZE_B4								= 12;
	const PAPERSIZE_B5								= 13;
	const PAPERSIZE_FOLIO							= 14;
	const PAPERSIZE_QUARTO							= 15;
	const PAPERSIZE_STANDARD_1						= 16;
	const PAPERSIZE_STANDARD_2						= 17;
	const PAPERSIZE_NOTE							= 18;
	const PAPERSIZE_NO9_ENVELOPE					= 19;
	const PAPERSIZE_NO10_ENVELOPE					= 20;
	const PAPERSIZE_NO11_ENVELOPE					= 21;
	const PAPERSIZE_NO12_ENVELOPE					= 22;
	const PAPERSIZE_NO14_ENVELOPE					= 23;
	const PAPERSIZE_C								= 24;
	const PAPERSIZE_D								= 25;
	const PAPERSIZE_E								= 26;
	const PAPERSIZE_DL_ENVELOPE						= 27;
	const PAPERSIZE_C5_ENVELOPE						= 28;
	const PAPERSIZE_C3_ENVELOPE						= 29;
	const PAPERSIZE_C4_ENVELOPE						= 30;
	const PAPERSIZE_C6_ENVELOPE						= 31;
	const PAPERSIZE_C65_ENVELOPE					= 32;
	const PAPERSIZE_B4_ENVELOPE						= 33;
	const PAPERSIZE_B5_ENVELOPE						= 34;
	const PAPERSIZE_B6_ENVELOPE						= 35;
	const PAPERSIZE_ITALY_ENVELOPE					= 36;
	const PAPERSIZE_MONARCH_ENVELOPE				= 37;
	const PAPERSIZE_6_3_4_ENVELOPE					= 38;
	const PAPERSIZE_US_STANDARD_FANFOLD				= 39;
	const PAPERSIZE_GERMAN_STANDARD_FANFOLD			= 40;
	const PAPERSIZE_GERMAN_LEGAL_FANFOLD			= 41;
	const PAPERSIZE_ISO_B4							= 42;
	const PAPERSIZE_JAPANESE_DOUBLE_POSTCARD		= 43;
	const PAPERSIZE_STANDARD_PAPER_1				= 44;
	const PAPERSIZE_STANDARD_PAPER_2				= 45;
	const PAPERSIZE_STANDARD_PAPER_3				= 46;
	const PAPERSIZE_INVITE_ENVELOPE					= 47;
	const PAPERSIZE_LETTER_EXTRA_PAPER				= 48;
	const PAPERSIZE_LEGAL_EXTRA_PAPER				= 49;
	const PAPERSIZE_TABLOID_EXTRA_PAPER				= 50;
	const PAPERSIZE_A4_EXTRA_PAPER					= 51;
	const PAPERSIZE_LETTER_TRANSVERSE_PAPER			= 52;
	const PAPERSIZE_A4_TRANSVERSE_PAPER				= 53;
	const PAPERSIZE_LETTER_EXTRA_TRANSVERSE_PAPER	= 54;
	const PAPERSIZE_SUPERA_SUPERA_A4_PAPER			= 55;
	const PAPERSIZE_SUPERB_SUPERB_A3_PAPER			= 56;
	const PAPERSIZE_LETTER_PLUS_PAPER				= 57;
	const PAPERSIZE_A4_PLUS_PAPER					= 58;
	const PAPERSIZE_A5_TRANSVERSE_PAPER				= 59;
	const PAPERSIZE_JIS_B5_TRANSVERSE_PAPER			= 60;
	const PAPERSIZE_A3_EXTRA_PAPER					= 61;
	const PAPERSIZE_A5_EXTRA_PAPER					= 62;
	const PAPERSIZE_ISO_B5_EXTRA_PAPER				= 63;
	const PAPERSIZE_A2_PAPER						= 64;
	const PAPERSIZE_A3_TRANSVERSE_PAPER				= 65;
	const PAPERSIZE_A3_EXTRA_TRANSVERSE_PAPER		= 66;

	
	const ORIENTATION_DEFAULT	= 'default';
	const ORIENTATION_LANDSCAPE	= 'landscape';
	const ORIENTATION_PORTRAIT	= 'portrait';

	
	const SETPRINTRANGE_OVERWRITE	= 'O';
	const SETPRINTRANGE_INSERT		= 'I';


	
	private $Vmqhdgsbwlmh		= PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER;

	
	private $Vqfc3f2mhizv	= PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT;

	
	private $Vieegzfsgmuk			= 100;

	
	private $Vtiswibc5emf		= FALSE;

	
	private $Vhthf2kvkytm	= 1;

	
	private $Vkw12oyottl4	= 1;

	
	private $Vvwnauqjn51t = array('', '');

	
	private $Vxqg1hnk3tp0 = array(0, 0);

	
	private $Vnipzikbpscd = FALSE;

	
	private $Var5s54forqo = FALSE;

	
	private $V40sb1i1vio2 = NULL;

	
	private $Vwthde3noglf = NULL;

    
    public function __construct()
    {
    }

    
    public function getPaperSize() {
    	return $this->_paperSize;
    }

    
    public function setPaperSize($Vqujkwol1zut = PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER) {
    	$this->_paperSize = $Vqujkwol1zut;
    	return $this;
    }

    
    public function getOrientation() {
    	return $this->_orientation;
    }

    
    public function setOrientation($Vqujkwol1zut = PHPExcel_Worksheet_PageSetup::ORIENTATION_DEFAULT) {
    	$this->_orientation = $Vqujkwol1zut;
    	return $this;
    }

	
	public function getScale() {
		return $this->_scale;
	}

	
	public function setScale($Vqujkwol1zut = 100, $Vdvwg5ec1lli = true) {
		
		
		if (($Vqujkwol1zut >= 0) || is_null($Vqujkwol1zut)) {
			$this->_scale = $Vqujkwol1zut;
			if ($Vdvwg5ec1lli) {
				$this->_fitToPage = false;
			}
		} else {
			throw new PHPExcel_Exception("Scale must not be negative");
		}
		return $this;
	}

	
	public function getFitToPage() {
		return $this->_fitToPage;
	}

	
	public function setFitToPage($Vqujkwol1zut = TRUE) {
		$this->_fitToPage = $Vqujkwol1zut;
		return $this;
	}

	
	public function getFitToHeight() {
		return $this->_fitToHeight;
	}

	
	public function setFitToHeight($Vqujkwol1zut = 1, $Vdvwg5ec1lli = TRUE) {
		$this->_fitToHeight = $Vqujkwol1zut;
		if ($Vdvwg5ec1lli) {
			$this->_fitToPage = TRUE;
		}
		return $this;
	}

	
	public function getFitToWidth() {
		return $this->_fitToWidth;
	}

	
	public function setFitToWidth($Vqujkwol1zut = 1, $Vdvwg5ec1lli = TRUE) {
		$this->_fitToWidth = $Vqujkwol1zut;
		if ($Vdvwg5ec1lli) {
			$this->_fitToPage = TRUE;
		}
		return $this;
	}

	
	public function isColumnsToRepeatAtLeftSet() {
		if (is_array($this->_columnsToRepeatAtLeft)) {
			if ($this->_columnsToRepeatAtLeft[0] != '' && $this->_columnsToRepeatAtLeft[1] != '') {
				return true;
			}
		}

		return false;
	}

	
	public function getColumnsToRepeatAtLeft() {
		return $this->_columnsToRepeatAtLeft;
	}

	
	public function setColumnsToRepeatAtLeft($Vqujkwol1zut = null) {
		if (is_array($Vqujkwol1zut)) {
			$this->_columnsToRepeatAtLeft = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function setColumnsToRepeatAtLeftByStartAndEnd($Vb2xlopy3ca4 = 'A', $Vsd0n1i2cokt = 'A') {
		$this->_columnsToRepeatAtLeft = array($Vb2xlopy3ca4, $Vsd0n1i2cokt);
		return $this;
	}

	
	public function isRowsToRepeatAtTopSet() {
		if (is_array($this->_rowsToRepeatAtTop)) {
			if ($this->_rowsToRepeatAtTop[0] != 0 && $this->_rowsToRepeatAtTop[1] != 0) {
				return true;
			}
		}

		return false;
	}

	
	public function getRowsToRepeatAtTop() {
		return $this->_rowsToRepeatAtTop;
	}

	
	public function setRowsToRepeatAtTop($Vqujkwol1zut = null) {
		if (is_array($Vqujkwol1zut)) {
			$this->_rowsToRepeatAtTop = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function setRowsToRepeatAtTopByStartAndEnd($Vb2xlopy3ca4 = 1, $Vsd0n1i2cokt = 1) {
		$this->_rowsToRepeatAtTop = array($Vb2xlopy3ca4, $Vsd0n1i2cokt);
		return $this;
	}

	
	public function getHorizontalCentered() {
		return $this->_horizontalCentered;
	}

	
	public function setHorizontalCentered($Vp4xjtpabm0l = false) {
		$this->_horizontalCentered = $Vp4xjtpabm0l;
		return $this;
	}

	
	public function getVerticalCentered() {
		return $this->_verticalCentered;
	}

	
	public function setVerticalCentered($Vp4xjtpabm0l = false) {
		$this->_verticalCentered = $Vp4xjtpabm0l;
		return $this;
	}

	
	public function getPrintArea($Vx5qfylfb01c = 0) {
		if ($Vx5qfylfb01c == 0) {
			return $this->_printArea;
		}
		$Vudwzx44tsrb = explode(',',$this->_printArea);
		if (isset($Vudwzx44tsrb[$Vx5qfylfb01c-1])) {
			return $Vudwzx44tsrb[$Vx5qfylfb01c-1];
		}
		throw new PHPExcel_Exception("Requested Print Area does not exist");
	}

	
	public function isPrintAreaSet($Vx5qfylfb01c = 0) {
		if ($Vx5qfylfb01c == 0) {
			return !is_null($this->_printArea);
		}
		$Vudwzx44tsrb = explode(',',$this->_printArea);
		return isset($Vudwzx44tsrb[$Vx5qfylfb01c-1]);
	}

	
	public function clearPrintArea($Vx5qfylfb01c = 0) {
		if ($Vx5qfylfb01c == 0) {
			$this->_printArea = NULL;
		} else {
			$Vudwzx44tsrb = explode(',',$this->_printArea);
			if (isset($Vudwzx44tsrb[$Vx5qfylfb01c-1])) {
				unset($Vudwzx44tsrb[$Vx5qfylfb01c-1]);
				$this->_printArea = implode(',',$Vudwzx44tsrb);
			}
		}

    	return $this;
	}

	
	public function setPrintArea($Vp4xjtpabm0l, $Vx5qfylfb01c = 0, $Vihjcs2gfuz0 = self::SETPRINTRANGE_OVERWRITE) {
		if (strpos($Vp4xjtpabm0l,'!') !== false) {
			throw new PHPExcel_Exception('Cell coordinate must not specify a worksheet.');
		} elseif (strpos($Vp4xjtpabm0l,':') === false) {
			throw new PHPExcel_Exception('Cell coordinate must be a range of cells.');
		} elseif (strpos($Vp4xjtpabm0l,'$') !== false) {
			throw new PHPExcel_Exception('Cell coordinate must not be absolute.');
		}
		$Vp4xjtpabm0l = strtoupper($Vp4xjtpabm0l);

		if ($Vihjcs2gfuz0 == self::SETPRINTRANGE_OVERWRITE) {
			if ($Vx5qfylfb01c == 0) {
				$this->_printArea = $Vp4xjtpabm0l;
			} else {
				$Vudwzx44tsrb = explode(',',$this->_printArea);
				if($Vx5qfylfb01c < 0) {
					$Vx5qfylfb01c = count($Vudwzx44tsrb) - abs($Vx5qfylfb01c) + 1;
				}
				if (($Vx5qfylfb01c <= 0) || ($Vx5qfylfb01c > count($Vudwzx44tsrb))) {
		    		throw new PHPExcel_Exception('Invalid index for setting print range.');
				}
				$Vudwzx44tsrb[$Vx5qfylfb01c-1] = $Vp4xjtpabm0l;
				$this->_printArea = implode(',',$Vudwzx44tsrb);
			}
		} elseif($Vihjcs2gfuz0 == self::SETPRINTRANGE_INSERT) {
			if ($Vx5qfylfb01c == 0) {
				$this->_printArea .= ($this->_printArea == '') ? $Vp4xjtpabm0l : ','.$Vp4xjtpabm0l;
			} else {
				$Vudwzx44tsrb = explode(',',$this->_printArea);
				if($Vx5qfylfb01c < 0) {
					$Vx5qfylfb01c = abs($Vx5qfylfb01c) - 1;
				}
				if ($Vx5qfylfb01c > count($Vudwzx44tsrb)) {
		    		throw new PHPExcel_Exception('Invalid index for setting print range.');
				}
				$Vudwzx44tsrb = array_merge(array_slice($Vudwzx44tsrb,0,$Vx5qfylfb01c),array($Vp4xjtpabm0l),array_slice($Vudwzx44tsrb,$Vx5qfylfb01c));
				$this->_printArea = implode(',',$Vudwzx44tsrb);
			}
		} else {
    		throw new PHPExcel_Exception('Invalid method for setting print range.');
		}

    	return $this;
	}

	
	public function addPrintArea($Vp4xjtpabm0l, $Vx5qfylfb01c = -1) {
		return $this->setPrintArea($Vp4xjtpabm0l, $Vx5qfylfb01c, self::SETPRINTRANGE_INSERT);
	}

	
    public function setPrintAreaByColumnAndRow($Vvlwvee5lubn, $V4tod2oevpau, $V5ppw1ruxel0, $Vtv3cquiddyx, $Vx5qfylfb01c = 0, $Vihjcs2gfuz0 = self::SETPRINTRANGE_OVERWRITE)
    {
    	return $this->setPrintArea(PHPExcel_Cell::stringFromColumnIndex($Vvlwvee5lubn) . $V4tod2oevpau . ':' . PHPExcel_Cell::stringFromColumnIndex($V5ppw1ruxel0) . $Vtv3cquiddyx, $Vx5qfylfb01c, $Vihjcs2gfuz0);
    }

	
    public function addPrintAreaByColumnAndRow($Vvlwvee5lubn, $V4tod2oevpau, $V5ppw1ruxel0, $Vtv3cquiddyx, $Vx5qfylfb01c = -1)
    {
    	return $this->setPrintArea(PHPExcel_Cell::stringFromColumnIndex($Vvlwvee5lubn) . $V4tod2oevpau . ':' . PHPExcel_Cell::stringFromColumnIndex($V5ppw1ruxel0) . $Vtv3cquiddyx, $Vx5qfylfb01c, self::SETPRINTRANGE_INSERT);
	}

	
    public function getFirstPageNumber() {
		return $this->_firstPageNumber;
    }

    
    public function setFirstPageNumber($Vp4xjtpabm0l = null) {
		$this->_firstPageNumber = $Vp4xjtpabm0l;
		return $this;
    }

    
    public function resetFirstPageNumber() {
		return $this->setFirstPageNumber(null);
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
