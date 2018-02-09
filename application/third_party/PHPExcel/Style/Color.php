<?php




class PHPExcel_Style_Color extends PHPExcel_Style_Supervisor implements PHPExcel_IComparable
{
	
	const COLOR_BLACK						= 'FF000000';
	const COLOR_WHITE						= 'FFFFFFFF';
	const COLOR_RED							= 'FFFF0000';
	const COLOR_DARKRED						= 'FF800000';
	const COLOR_BLUE						= 'FF0000FF';
	const COLOR_DARKBLUE					= 'FF000080';
	const COLOR_GREEN						= 'FF00FF00';
	const COLOR_DARKGREEN					= 'FF008000';
	const COLOR_YELLOW						= 'FFFFFF00';
	const COLOR_DARKYELLOW					= 'FF808000';

	
	protected static $Vdcls0g1lp5w;

	
	protected $Vgbvv530a4hc	= NULL;

	
	protected $Vvvticaehq2h;


	
	public function __construct($Vpfdx2myjdir = PHPExcel_Style_Color::COLOR_BLACK, $Vk1afaiczap4 = FALSE, $Vm5dy1e2hvny = FALSE)
	{
		
		parent::__construct($Vk1afaiczap4);

		
		if (!$Vm5dy1e2hvny) {
			$this->_argb = $Vpfdx2myjdir;
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
			case '_endColor':
				return $this->_parent->getSharedComponent()->getEndColor();		break;
			case '_color':
				return $this->_parent->getSharedComponent()->getColor();		break;
			case '_startColor':
				return $this->_parent->getSharedComponent()->getStartColor();	break;
		}
	}

	
	public function getStyleArray($Vi2ourgzeiw5)
	{
		switch ($this->_parentPropertyName) {
			case '_endColor':
				$Vseq1edikdvg = 'endcolor';
				break;
			case '_color':
				$Vseq1edikdvg = 'color';
				break;
			case '_startColor':
				$Vseq1edikdvg = 'startcolor';
				break;

		}
		return $this->_parent->getStyleArray(array($Vseq1edikdvg => $Vi2ourgzeiw5));
	}

	
	public function applyFromArray($Vkaawzjkapbw = NULL) {
		if (is_array($Vkaawzjkapbw)) {
			if ($this->_isSupervisor) {
				$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($this->getStyleArray($Vkaawzjkapbw));
			} else {
				if (array_key_exists('rgb', $Vkaawzjkapbw)) {
					$this->setRGB($Vkaawzjkapbw['rgb']);
				}
				if (array_key_exists('argb', $Vkaawzjkapbw)) {
					$this->setARGB($Vkaawzjkapbw['argb']);
				}
			}
		} else {
			throw new PHPExcel_Exception("Invalid style array passed.");
		}
		return $this;
	}

	
	public function getARGB() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getARGB();
		}
		return $this->_argb;
	}

	
	public function setARGB($Vqujkwol1zut = PHPExcel_Style_Color::COLOR_BLACK) {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = PHPExcel_Style_Color::COLOR_BLACK;
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('argb' => $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_argb = $Vqujkwol1zut;
		}
		return $this;
	}

	
	public function getRGB() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getRGB();
		}
		return substr($this->_argb, 2);
	}

	
	public function setRGB($Vqujkwol1zut = '000000') {
		if ($Vqujkwol1zut == '') {
			$Vqujkwol1zut = '000000';
		}
		if ($this->_isSupervisor) {
			$Vldnaod3wmnp = $this->getStyleArray(array('argb' => 'FF' . $Vqujkwol1zut));
			$this->getActiveSheet()->getStyle($this->getSelectedCells())->applyFromArray($Vldnaod3wmnp);
		} else {
			$this->_argb = 'FF' . $Vqujkwol1zut;
		}
		return $this;
	}

	
	private static function _getColourComponent($Vqqfb3nx2wif,$Vortqlloirgz,$V0o3f1vps5ku=TRUE) {
		$Vgorqf1lwixk = substr($Vqqfb3nx2wif, $Vortqlloirgz, 2);
		if (!$V0o3f1vps5ku)
			$Vgorqf1lwixk = hexdec($Vgorqf1lwixk);
		return $Vgorqf1lwixk;
	}

	
	public static function getRed($Vqqfb3nx2wif,$V0o3f1vps5ku=TRUE) {
		return self::_getColourComponent($Vqqfb3nx2wif, strlen($Vqqfb3nx2wif) - 6, $V0o3f1vps5ku);
	}

	
	public static function getGreen($Vqqfb3nx2wif,$V0o3f1vps5ku=TRUE) {
		return self::_getColourComponent($Vqqfb3nx2wif, strlen($Vqqfb3nx2wif) - 4, $V0o3f1vps5ku);
	}

	
	public static function getBlue($Vqqfb3nx2wif,$V0o3f1vps5ku=TRUE) {
		return self::_getColourComponent($Vqqfb3nx2wif, strlen($Vqqfb3nx2wif) - 2, $V0o3f1vps5ku);
	}

	
	public static function changeBrightness($V0o3f1vps5ku, $Vdpmzo0xancl) {
		$Vr04pduy42lh = (strlen($V0o3f1vps5ku) == 8);

		$Vkrbplraybhw	= self::getRed($V0o3f1vps5ku, FALSE);
		$Vnd0l00jwibe	= self::getGreen($V0o3f1vps5ku, FALSE);
		$Vn5e0b22qgwp	= self::getBlue($V0o3f1vps5ku, FALSE);
		if ($Vdpmzo0xancl > 0) {
			$Vkrbplraybhw	+= (255 - $Vkrbplraybhw) * $Vdpmzo0xancl;
			$Vnd0l00jwibe	+= (255 - $Vnd0l00jwibe) * $Vdpmzo0xancl;
			$Vn5e0b22qgwp	+= (255 - $Vn5e0b22qgwp) * $Vdpmzo0xancl;
		} else {
			$Vkrbplraybhw	+= $Vkrbplraybhw * $Vdpmzo0xancl;
			$Vnd0l00jwibe	+= $Vnd0l00jwibe * $Vdpmzo0xancl;
			$Vn5e0b22qgwp	+= $Vn5e0b22qgwp * $Vdpmzo0xancl;
		}

		if ($Vkrbplraybhw < 0) $Vkrbplraybhw = 0;
		elseif ($Vkrbplraybhw > 255) $Vkrbplraybhw = 255;
		if ($Vnd0l00jwibe < 0) $Vnd0l00jwibe = 0;
		elseif ($Vnd0l00jwibe > 255) $Vnd0l00jwibe = 255;
		if ($Vn5e0b22qgwp < 0) $Vn5e0b22qgwp = 0;
		elseif ($Vn5e0b22qgwp > 255) $Vn5e0b22qgwp = 255;

		$Vvw25icbq1yg = strtoupper(	str_pad(dechex($Vkrbplraybhw), 2, '0', 0) .
							str_pad(dechex($Vnd0l00jwibe), 2, '0', 0) .
							str_pad(dechex($Vn5e0b22qgwp), 2, '0', 0)
						 );
		return (($Vr04pduy42lh) ? 'FF' : '') . $Vvw25icbq1yg;
	}

	
	public static function indexedColor($V4z43kvcbihn, $Vwgo50mn55xx=FALSE) {
		
		$V4z43kvcbihn = intval($V4z43kvcbihn);

		
		if (is_null(self::$Vdcls0g1lp5w)) {
			self::$Vdcls0g1lp5w = array(
					1	=> 'FF000000',	
					2	=> 'FFFFFFFF',	
					3	=> 'FFFF0000',	
					4	=> 'FF00FF00',	
					5	=> 'FF0000FF',	
					6	=> 'FFFFFF00',	
					7	=> 'FFFF00FF',	
					8	=> 'FF00FFFF',	
					9	=> 'FF800000',	
					10	=> 'FF008000',	
					11	=> 'FF000080',	
					12	=> 'FF808000',	
					13	=> 'FF800080',	
					14	=> 'FF008080',	
					15	=> 'FFC0C0C0',	
					16	=> 'FF808080',	
					17	=> 'FF9999FF',	
					18	=> 'FF993366',	
					19	=> 'FFFFFFCC',	
					20	=> 'FFCCFFFF',	
					21	=> 'FF660066',	
					22	=> 'FFFF8080',	
					23	=> 'FF0066CC',	
					24	=> 'FFCCCCFF',	
					25	=> 'FF000080',	
					26	=> 'FFFF00FF',	
					27	=> 'FFFFFF00',	
					28	=> 'FF00FFFF',	
					29	=> 'FF800080',	
					30	=> 'FF800000',	
					31	=> 'FF008080',	
					32	=> 'FF0000FF',	
					33	=> 'FF00CCFF',	
					34	=> 'FFCCFFFF',	
					35	=> 'FFCCFFCC',	
					36	=> 'FFFFFF99',	
					37	=> 'FF99CCFF',	
					38	=> 'FFFF99CC',	
					39	=> 'FFCC99FF',	
					40	=> 'FFFFCC99',	
					41	=> 'FF3366FF',	
					42	=> 'FF33CCCC',	
					43	=> 'FF99CC00',	
					44	=> 'FFFFCC00',	
					45	=> 'FFFF9900',	
					46	=> 'FFFF6600',	
					47	=> 'FF666699',	
					48	=> 'FF969696',	
					49	=> 'FF003366',	
					50	=> 'FF339966',	
					51	=> 'FF003300',	
					52	=> 'FF333300',	
					53	=> 'FF993300',	
					54	=> 'FF993366',	
					55	=> 'FF333399',	
					56	=> 'FF333333'	
				);
		}

		if (array_key_exists($V4z43kvcbihn, self::$Vdcls0g1lp5w)) {
			return new PHPExcel_Style_Color(self::$Vdcls0g1lp5w[$V4z43kvcbihn]);
		}

		if ($Vwgo50mn55xx) {
			return new PHPExcel_Style_Color('FFFFFFFF');
		}
		return new PHPExcel_Style_Color('FF000000');
	}

	
	public function getHashCode() {
		if ($this->_isSupervisor) {
			return $this->getSharedComponent()->getHashCode();
		}
		return md5(
			  $this->_argb
			. __CLASS__
		);
	}

}
