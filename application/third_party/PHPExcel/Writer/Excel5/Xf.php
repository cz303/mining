<?php







































class PHPExcel_Writer_Excel5_Xf
{
    
	private $Vehxkdug0omk;

	
	private $Vgdel0gkuzo5;

	
	public $Vnd4yalfahdp;

	
	public $Vd4lpr5rkdd5;

	
	public $Vboege4ope4y;

	
	public $Vue1vqqkijzo;

	
	public $Vhw4xebfmbxj;

	
	public $Vfeu224zb1sf;

	
	public $V4g3hr2ljhvf;

	
	public $V1modxcav2qb;

	
	public function __construct(PHPExcel_Style $Vdtcpflt5bhp = null)
	{
		$this->_isStyleXf =     false;
		$this->_fontIndex      = 0;

		$this->_numberFormatIndex     = 0;

		$this->_text_justlast  = 0;

		$this->_fg_color       = 0x40;
		$this->_bg_color       = 0x41;

		$this->_diag           = 0;

		$this->_bottom_color   = 0x40;
		$this->_top_color      = 0x40;
		$this->_left_color     = 0x40;
		$this->_right_color    = 0x40;
		$this->_diag_color     = 0x40;
		$this->_style = $Vdtcpflt5bhp;

	}


	
	function writeXf()
	{
		
		if ($this->_isStyleXf) {
			$Vdtcpflt5bhp = 0xFFF5;
		} else {
			$Vdtcpflt5bhp   = self::_mapLocked($this->_style->getProtection()->getLocked());
			$Vdtcpflt5bhp  |= self::_mapHidden($this->_style->getProtection()->getHidden()) << 1;
		}

		
		$Vrukyged0o4b     = ($this->_numberFormatIndex != 0)?1:0;
		$Vbrzvr4kzrfp     = ($this->_fontIndex != 0)?1:0;
		$Vz3saay514vn     = ((int) $this->_style->getAlignment()->getWrapText()) ? 1 : 0;
		$Vurazedq0p3l     = (self::_mapBorderStyle($this->_style->getBorders()->getBottom()->getBorderStyle())   ||
						self::_mapBorderStyle($this->_style->getBorders()->getTop()->getBorderStyle())      ||
						self::_mapBorderStyle($this->_style->getBorders()->getLeft()->getBorderStyle())     ||
						self::_mapBorderStyle($this->_style->getBorders()->getRight()->getBorderStyle()))?1:0;
		$Vhgk4qtpfpye     = (($this->_fg_color != 0x40) ||
						($this->_bg_color != 0x41) ||
						self::_mapFillType($this->_style->getFill()->getFillType()))?1:0;
		$Vopd4eqjtvh1    = self::_mapLocked($this->_style->getProtection()->getLocked())
						| self::_mapHidden($this->_style->getProtection()->getHidden());

		
		if (self::_mapBorderStyle($this->_style->getBorders()->getBottom()->getBorderStyle()) == 0) {
			$this->_bottom_color = 0;
		}
		if (self::_mapBorderStyle($this->_style->getBorders()->getTop()->getBorderStyle())  == 0) {
			$this->_top_color = 0;
		}
		if (self::_mapBorderStyle($this->_style->getBorders()->getRight()->getBorderStyle()) == 0) {
			$this->_right_color = 0;
		}
		if (self::_mapBorderStyle($this->_style->getBorders()->getLeft()->getBorderStyle()) == 0) {
			$this->_left_color = 0;
		}
		if (self::_mapBorderStyle($this->_style->getBorders()->getDiagonal()->getBorderStyle()) == 0) {
			$this->_diag_color = 0;
		}

		$Vkry1ureuzsj         = 0x00E0;              
		$Volq3gdvkuqp         = 0x0014;              

		$Vnqropyqkily           = $this->_fontIndex;   
		$V0dyqjt5h42w           = $this->_numberFormatIndex;  

		$Vllykjmigfhv          = $this->_mapHAlign($this->_style->getAlignment()->getHorizontal());       
		$Vllykjmigfhv         |= (int) $this->_style->getAlignment()->getWrapText()     << 3;
		$Vllykjmigfhv         |= self::_mapVAlign($this->_style->getAlignment()->getVertical())  << 4;
		$Vllykjmigfhv         |= $this->_text_justlast << 7;

		$Vurartiwsohe    = $Vrukyged0o4b              << 2;
		$Vurartiwsohe   |= $Vbrzvr4kzrfp              << 3;
		$Vurartiwsohe   |= $Vz3saay514vn              << 4;
		$Vurartiwsohe   |= $Vurazedq0p3l              << 5;
		$Vurartiwsohe   |= $Vhgk4qtpfpye              << 6;
		$Vurartiwsohe   |= $Vopd4eqjtvh1             << 7;

		$Votsvelbv1ju            = $this->_fg_color;      
		$Votsvelbv1ju           |= $this->_bg_color      << 7;

		$Vf4zuufyde0b        = self::_mapBorderStyle($this->_style->getBorders()->getLeft()->getBorderStyle());          
		$Vf4zuufyde0b       |= self::_mapBorderStyle($this->_style->getBorders()->getRight()->getBorderStyle())         << 4;
		$Vf4zuufyde0b       |= self::_mapBorderStyle($this->_style->getBorders()->getTop()->getBorderStyle())           << 8;
		$Vf4zuufyde0b       |= self::_mapBorderStyle($this->_style->getBorders()->getBottom()->getBorderStyle())        << 12;
		$Vf4zuufyde0b       |= $this->_left_color    << 16;
		$Vf4zuufyde0b       |= $this->_right_color   << 23;

		$V4pf2y2wnukh = $this->_style->getBorders()->getDiagonalDirection();
		$Vraxgslh0rxk = $V4pf2y2wnukh == PHPExcel_Style_Borders::DIAGONAL_BOTH
							|| $V4pf2y2wnukh == PHPExcel_Style_Borders::DIAGONAL_DOWN;
		$Vlpl51ideasw = $V4pf2y2wnukh == PHPExcel_Style_Borders::DIAGONAL_BOTH
							|| $V4pf2y2wnukh == PHPExcel_Style_Borders::DIAGONAL_UP;
		$Vf4zuufyde0b       |= $Vraxgslh0rxk        << 30;
		$Vf4zuufyde0b       |= $Vlpl51ideasw        << 31;

		$V1vf11k3mvcv        = $this->_top_color;    
		$V1vf11k3mvcv       |= $this->_bottom_color   << 7;
		$V1vf11k3mvcv       |= $this->_diag_color     << 14;
		$V1vf11k3mvcv       |= self::_mapBorderStyle($this->_style->getBorders()->getDiagonal()->getBorderStyle())           << 21;
		$V1vf11k3mvcv       |= self::_mapFillType($this->_style->getFill()->getFillType())        << 26;

		$Vl5rjgb1nsf3      = pack("vv",       $Vkry1ureuzsj, $Volq3gdvkuqp);

		
		$Vh1cxhzoyoy3  = $this->_style->getAlignment()->getIndent();
		$Vh1cxhzoyoy3 |= (int) $this->_style->getAlignment()->getShrinkToFit() << 4;

		$Vou4vxorrdoe  = pack("vvvC", $Vnqropyqkily, $V0dyqjt5h42w, $Vdtcpflt5bhp, $Vllykjmigfhv);
		$Vou4vxorrdoe .= pack("CCC"
			, self::_mapTextRotation($this->_style->getAlignment()->getTextRotation())
			, $Vh1cxhzoyoy3
			, $Vurartiwsohe
			);
		$Vou4vxorrdoe .= pack("VVv", $Vf4zuufyde0b, $V1vf11k3mvcv, $Votsvelbv1ju);

		return($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	public function setIsStyleXf($Vp4xjtpabm0l)
	{
		$this->_isStyleXf = $Vp4xjtpabm0l;
	}

	
	function setBottomColor($Veuvjt5uyz02)
	{
		$this->_bottom_color = $Veuvjt5uyz02;
	}

	
	function setTopColor($Veuvjt5uyz02)
	{
		$this->_top_color = $Veuvjt5uyz02;
	}

	
	function setLeftColor($Veuvjt5uyz02)
	{
		$this->_left_color = $Veuvjt5uyz02;
	}

	
	function setRightColor($Veuvjt5uyz02)
	{
		$this->_right_color = $Veuvjt5uyz02;
	}

	
	function setDiagColor($Veuvjt5uyz02)
	{
		$this->_diag_color = $Veuvjt5uyz02;
	}


	
	function setFgColor($Veuvjt5uyz02)
	{
		$this->_fg_color = $Veuvjt5uyz02;
	}

	
	function setBgColor($Veuvjt5uyz02)
	{
		$this->_bg_color = $Veuvjt5uyz02;
	}

	
	function setNumberFormatIndex($Vjfqttfynnbq)
	{
		$this->_numberFormatIndex = $Vjfqttfynnbq;
	}

	
	public function setFontIndex($Vp4xjtpabm0l)
	{
		$this->_fontIndex = $Vp4xjtpabm0l;
	}

	
	private static $Vddghh25xe3m = array	( PHPExcel_Style_Border::BORDER_NONE				=> 0x00,
											  PHPExcel_Style_Border::BORDER_THIN				=> 0x01,
											  PHPExcel_Style_Border::BORDER_MEDIUM				=> 0x02,
											  PHPExcel_Style_Border::BORDER_DASHED				=> 0x03,
											  PHPExcel_Style_Border::BORDER_DOTTED				=> 0x04,
											  PHPExcel_Style_Border::BORDER_THICK				=> 0x05,
											  PHPExcel_Style_Border::BORDER_DOUBLE				=> 0x06,
											  PHPExcel_Style_Border::BORDER_HAIR				=> 0x07,
											  PHPExcel_Style_Border::BORDER_MEDIUMDASHED		=> 0x08,
											  PHPExcel_Style_Border::BORDER_DASHDOT				=> 0x09,
											  PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT		=> 0x0A,
											  PHPExcel_Style_Border::BORDER_DASHDOTDOT			=> 0x0B,
											  PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT	=> 0x0C,
											  PHPExcel_Style_Border::BORDER_SLANTDASHDOT		=> 0x0D,
											);

	
	private static function _mapBorderStyle($V3w3s2v4rm1p) {
		if (isset(self::$Vddghh25xe3m[$V3w3s2v4rm1p]))
			return self::$Vddghh25xe3m[$V3w3s2v4rm1p];
		return 0x00;
	}

	
	private static $Voytl5fqgx2a = array( PHPExcel_Style_Fill::FILL_NONE					=> 0x00,
										  PHPExcel_Style_Fill::FILL_SOLID					=> 0x01,
										  PHPExcel_Style_Fill::FILL_PATTERN_MEDIUMGRAY		=> 0x02,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY		=> 0x03,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRAY		=> 0x04,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKHORIZONTAL	=> 0x05,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKVERTICAL	=> 0x06,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN		=> 0x07,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKUP			=> 0x08,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKGRID		=> 0x09,
										  PHPExcel_Style_Fill::FILL_PATTERN_DARKTRELLIS		=> 0x0A,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTHORIZONTAL	=> 0x0B,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTVERTICAL	=> 0x0C,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN		=> 0x0D,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTUP			=> 0x0E,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTGRID		=> 0x0F,
										  PHPExcel_Style_Fill::FILL_PATTERN_LIGHTTRELLIS	=> 0x10,
										  PHPExcel_Style_Fill::FILL_PATTERN_GRAY125			=> 0x11,
										  PHPExcel_Style_Fill::FILL_PATTERN_GRAY0625		=> 0x12,
										  PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR			=> 0x00,	
										  PHPExcel_Style_Fill::FILL_GRADIENT_PATH			=> 0x00,	
										);
	
	private static function _mapFillType($Vd1axomj3pki) {
		if (isset(self::$Voytl5fqgx2a[$Vd1axomj3pki]))
			return self::$Voytl5fqgx2a[$Vd1axomj3pki];
		return 0x00;
	}

	
	private static $Vowignuazv0f = array( PHPExcel_Style_Alignment::HORIZONTAL_GENERAL			=> 0,
										PHPExcel_Style_Alignment::HORIZONTAL_LEFT				=> 1,
										PHPExcel_Style_Alignment::HORIZONTAL_CENTER				=> 2,
										PHPExcel_Style_Alignment::HORIZONTAL_RIGHT				=> 3,
										PHPExcel_Style_Alignment::HORIZONTAL_FILL				=> 4,
										PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY			=> 5,
										PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS	=> 6,
									  );
	
	private function _mapHAlign($V3wqolxpnebq)
	{
		if (isset(self::$Vowignuazv0f[$V3wqolxpnebq]))
			return self::$Vowignuazv0f[$V3wqolxpnebq];
		return 0;
	}

	
	private static $Voapamqtsc2f = array( PHPExcel_Style_Alignment::VERTICAL_TOP		=> 0,
										PHPExcel_Style_Alignment::VERTICAL_CENTER	=> 1,
										PHPExcel_Style_Alignment::VERTICAL_BOTTOM	=> 2,
										PHPExcel_Style_Alignment::VERTICAL_JUSTIFY	=> 3,
									  );
	
	private static function _mapVAlign($Vwdx1jlkaxdj) {
		if (isset(self::$Voapamqtsc2f[$Vwdx1jlkaxdj]))
			return self::$Voapamqtsc2f[$Vwdx1jlkaxdj];
		return 2;
	}

	
	private static function _mapTextRotation($Vkbd3edaufbx) {
		if ($Vkbd3edaufbx >= 0) {
			return $Vkbd3edaufbx;
		}
		if ($Vkbd3edaufbx == -165) {
			return 255;
		}
		if ($Vkbd3edaufbx < 0) {
			return 90 - $Vkbd3edaufbx;
		}
	}

	
	private static function _mapLocked($V1czzgn2ntzk) {
		switch ($V1czzgn2ntzk) {
			case PHPExcel_Style_Protection::PROTECTION_INHERIT:		return 1;
			case PHPExcel_Style_Protection::PROTECTION_PROTECTED:	return 1;
			case PHPExcel_Style_Protection::PROTECTION_UNPROTECTED:	return 0;
			default:												return 1;
		}
	}

	
	private static function _mapHidden($Vlksmoyzk4it) {
		switch ($Vlksmoyzk4it) {
			case PHPExcel_Style_Protection::PROTECTION_INHERIT:		return 0;
			case PHPExcel_Style_Protection::PROTECTION_PROTECTED:	return 1;
			case PHPExcel_Style_Protection::PROTECTION_UNPROTECTED:	return 0;
			default:												return 0;
		}
	}

}
