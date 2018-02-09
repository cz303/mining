<?php




class PHPExcel_Writer_Excel5_Font
{
	
	private $Vlspcznzos55;

	
	private $Vjilv0hwv0xf;

	
	public function __construct(PHPExcel_Style_Font $Vj0kojsfk0h3 = null)
	{
		$this->_colorIndex = 0x7FFF;
		$this->_font = $Vj0kojsfk0h3;
	}

	
	public function setColorIndex($Veuvjt5uyz02)
	{
		$this->_colorIndex = $Veuvjt5uyz02;
	}

	
	public function writeFont()
	{
		$Vj0kojsfk0h3_outline = 0;
		$Vj0kojsfk0h3_shadow = 0;

		$Votsvelbv1ju = $this->_colorIndex; 
		if ($this->_font->getSuperScript()) {
			$V53iw541vhws = 1;
		} else if ($this->_font->getSubScript()) {
			$V53iw541vhws = 2;
		} else {
			$V53iw541vhws = 0;
		}
		$Vnfnth4vbdtb = 0; 
		$Vow1zddjydeq = PHPExcel_Shared_Font::getCharsetFromFontName($this->_font->getName()); 

		$Vkry1ureuzsj = 0x31;		
		$Vierxt2vjb5a = 0x00;	
		$V4so2o2kxsqi = 0x00;		
		if ($this->_font->getItalic()) {
			$V4so2o2kxsqi |= 0x02;
		}
		if ($this->_font->getStrikethrough()) {
			$V4so2o2kxsqi |= 0x08;
		}
		if ($Vj0kojsfk0h3_outline) {
			$V4so2o2kxsqi |= 0x10;
		}
		if ($Vj0kojsfk0h3_shadow) {
			$V4so2o2kxsqi |= 0x20;
		}

		$Vou4vxorrdoe = pack("vvvvvCCCC",
			$this->_font->getSize() * 20,						
			$V4so2o2kxsqi,
			$Votsvelbv1ju,												
			self::_mapBold($this->_font->getBold()),			
			$V53iw541vhws,												
			self::_mapUnderline($this->_font->getUnderline()),
			$Vnfnth4vbdtb,
			$Vow1zddjydeq,
			$Vierxt2vjb5a
		);
		$Vou4vxorrdoe .= PHPExcel_Shared_String::UTF8toBIFF8UnicodeShort($this->_font->getName());

		$Volq3gdvkuqp = strlen($Vou4vxorrdoe);
		$Vl5rjgb1nsf3 = pack("vv", $Vkry1ureuzsj, $Volq3gdvkuqp);

		return($Vl5rjgb1nsf3 . $Vou4vxorrdoe);
	}

	
	private static function _mapBold($Vqgmpyzmahgw) {
		if ($Vqgmpyzmahgw) {
			return 0x2BC;	
		}
		return 0x190;		
	}

	
	private static $Vm4wmqsa5hrb = array(	PHPExcel_Style_Font::UNDERLINE_NONE					=> 0x00,
											PHPExcel_Style_Font::UNDERLINE_SINGLE				=> 0x01,
											PHPExcel_Style_Font::UNDERLINE_DOUBLE				=> 0x02,
											PHPExcel_Style_Font::UNDERLINE_SINGLEACCOUNTING		=> 0x21,
											PHPExcel_Style_Font::UNDERLINE_DOUBLEACCOUNTING		=> 0x22,
										 );
	
	private static function _mapUnderline($Voluajrsrb50) {
		if (isset(self::$Vm4wmqsa5hrb[$Voluajrsrb50]))
			return self::$Vm4wmqsa5hrb[$Voluajrsrb50];
		return 0x00;
	}

}
