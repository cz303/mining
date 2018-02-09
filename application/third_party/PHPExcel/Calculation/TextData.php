<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_TextData {

	private static $Vofvdvwnlfmh = Null;

	private static function _uniord($V4y0urwpnd3j) {
		if (ord($V4y0urwpnd3j{0}) >=0 && ord($V4y0urwpnd3j{0}) <= 127)
			return ord($V4y0urwpnd3j{0});
		if (ord($V4y0urwpnd3j{0}) >= 192 && ord($V4y0urwpnd3j{0}) <= 223)
			return (ord($V4y0urwpnd3j{0})-192)*64 + (ord($V4y0urwpnd3j{1})-128);
		if (ord($V4y0urwpnd3j{0}) >= 224 && ord($V4y0urwpnd3j{0}) <= 239)
			return (ord($V4y0urwpnd3j{0})-224)*4096 + (ord($V4y0urwpnd3j{1})-128)*64 + (ord($V4y0urwpnd3j{2})-128);
		if (ord($V4y0urwpnd3j{0}) >= 240 && ord($V4y0urwpnd3j{0}) <= 247)
			return (ord($V4y0urwpnd3j{0})-240)*262144 + (ord($V4y0urwpnd3j{1})-128)*4096 + (ord($V4y0urwpnd3j{2})-128)*64 + (ord($V4y0urwpnd3j{3})-128);
		if (ord($V4y0urwpnd3j{0}) >= 248 && ord($V4y0urwpnd3j{0}) <= 251)
			return (ord($V4y0urwpnd3j{0})-248)*16777216 + (ord($V4y0urwpnd3j{1})-128)*262144 + (ord($V4y0urwpnd3j{2})-128)*4096 + (ord($V4y0urwpnd3j{3})-128)*64 + (ord($V4y0urwpnd3j{4})-128);
		if (ord($V4y0urwpnd3j{0}) >= 252 && ord($V4y0urwpnd3j{0}) <= 253)
			return (ord($V4y0urwpnd3j{0})-252)*1073741824 + (ord($V4y0urwpnd3j{1})-128)*16777216 + (ord($V4y0urwpnd3j{2})-128)*262144 + (ord($V4y0urwpnd3j{3})-128)*4096 + (ord($V4y0urwpnd3j{4})-128)*64 + (ord($V4y0urwpnd3j{5})-128);
		if (ord($V4y0urwpnd3j{0}) >= 254 && ord($V4y0urwpnd3j{0}) <= 255) 
			return PHPExcel_Calculation_Functions::VALUE();
		return 0;
	}	

	
	public static function CHARACTER($V4y0urwpnd3jharacter) {
		$V4y0urwpnd3jharacter	= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jharacter);

		if ((!is_numeric($V4y0urwpnd3jharacter)) || ($V4y0urwpnd3jharacter < 0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (function_exists('mb_convert_encoding')) {
			return mb_convert_encoding('&#'.intval($V4y0urwpnd3jharacter).';', 'UTF-8', 'HTML-ENTITIES');
		} else {
			return chr(intval($V4y0urwpnd3jharacter));
		}
	}


	
	public static function TRIMNONPRINTABLE($Vhdm5nohendr = '') {
		$Vhdm5nohendr	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhdm5nohendr);

		if (is_bool($Vhdm5nohendr)) {
			return ($Vhdm5nohendr) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if (self::$Vofvdvwnlfmh == Null) {
			self::$Vofvdvwnlfmh = range(chr(0),chr(31));
		}

		if (is_string($Vhdm5nohendr) || is_numeric($Vhdm5nohendr)) {
			return str_replace(self::$Vofvdvwnlfmh, '', trim($Vhdm5nohendr, "\x00..\x1F"));
		}
		return NULL;
	}	


	
	public static function TRIMSPACES($Vhdm5nohendr = '') {
		$Vhdm5nohendr	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhdm5nohendr);

		if (is_bool($Vhdm5nohendr)) {
			return ($Vhdm5nohendr) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if (is_string($Vhdm5nohendr) || is_numeric($Vhdm5nohendr)) {
			return trim(preg_replace('/ +/',' ',trim($Vhdm5nohendr,' ')));
		}
		return NULL;
	}	


	
	public static function ASCIICODE($V4y0urwpnd3jharacters) {
		if (($V4y0urwpnd3jharacters === NULL) || ($V4y0urwpnd3jharacters === ''))
			return PHPExcel_Calculation_Functions::VALUE();
		$V4y0urwpnd3jharacters	= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jharacters);
		if (is_bool($V4y0urwpnd3jharacters)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$V4y0urwpnd3jharacters = (int) $V4y0urwpnd3jharacters;
			} else {
				$V4y0urwpnd3jharacters = ($V4y0urwpnd3jharacters) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
			}
		}

		$V4y0urwpnd3jharacter = $V4y0urwpnd3jharacters;
		if ((function_exists('mb_strlen')) && (function_exists('mb_substr'))) {
			if (mb_strlen($V4y0urwpnd3jharacters, 'UTF-8') > 1) { $V4y0urwpnd3jharacter = mb_substr($V4y0urwpnd3jharacters, 0, 1, 'UTF-8'); }
			return self::_uniord($V4y0urwpnd3jharacter);
		} else {
			if (strlen($V4y0urwpnd3jharacters) > 0) { $V4y0urwpnd3jharacter = substr($V4y0urwpnd3jharacters, 0, 1); }
			return ord($V4y0urwpnd3jharacter);
		}
	}	


	
	public static function CONCATENATE() {
		
		$Vbco3t3kne3m = '';

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Voojdymxtgs1 as $Vnpssjjicvbx) {
			if (is_bool($Vnpssjjicvbx)) {
				if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
					$Vnpssjjicvbx = (int) $Vnpssjjicvbx;
				} else {
					$Vnpssjjicvbx = ($Vnpssjjicvbx) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
				}
			}
			$Vbco3t3kne3m .= $Vnpssjjicvbx;
		}

		
		return $Vbco3t3kne3m;
	}	


	
	public static function DOLLAR($Vp4xjtpabm0l = 0, $Va3zigp1a5ea = 2) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Va3zigp1a5ea	= is_null($Va3zigp1a5ea) ? 0 : PHPExcel_Calculation_Functions::flattenSingleValue($Va3zigp1a5ea);

		
		if (!is_numeric($Vp4xjtpabm0l) || !is_numeric($Va3zigp1a5ea)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Va3zigp1a5ea = floor($Va3zigp1a5ea);

		$Vokcwpnwb5zx = '$#,##0';
		if ($Va3zigp1a5ea > 0) {
			$Vokcwpnwb5zx .= '.' . str_repeat('0',$Va3zigp1a5ea);
		} else {
			$Vphc4qaxibgc = pow(10,abs($Va3zigp1a5ea));
			if ($Vp4xjtpabm0l < 0) { $Vphc4qaxibgc = 0-$Vphc4qaxibgc; }
			$Vp4xjtpabm0l = PHPExcel_Calculation_MathTrig::MROUND($Vp4xjtpabm0l, $Vphc4qaxibgc);
		}

		return PHPExcel_Style_NumberFormat::toFormattedString($Vp4xjtpabm0l, $Vokcwpnwb5zx);

	}	


	
	public static function SEARCHSENSITIVE($Vfui3jz0cdhv,$V0mmc53yh4jc,$Vortqlloirgz=1) {
		$Vfui3jz0cdhv		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfui3jz0cdhv);
		$V0mmc53yh4jc	= PHPExcel_Calculation_Functions::flattenSingleValue($V0mmc53yh4jc);
		$Vortqlloirgz		= PHPExcel_Calculation_Functions::flattenSingleValue($Vortqlloirgz);

		if (!is_bool($Vfui3jz0cdhv)) {
			if (is_bool($V0mmc53yh4jc)) {
				$V0mmc53yh4jc = ($V0mmc53yh4jc) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
			}

			if (($Vortqlloirgz > 0) && (PHPExcel_Shared_String::CountCharacters($V0mmc53yh4jc) > $Vortqlloirgz)) {
				if (PHPExcel_Shared_String::CountCharacters($Vfui3jz0cdhv) == 0) {
					return $Vortqlloirgz;
				}
				if (function_exists('mb_strpos')) {
					$Vv3hdohvn1hh = mb_strpos($V0mmc53yh4jc, $Vfui3jz0cdhv, --$Vortqlloirgz, 'UTF-8');
				} else {
					$Vv3hdohvn1hh = strpos($V0mmc53yh4jc, $Vfui3jz0cdhv, --$Vortqlloirgz);
				}
				if ($Vv3hdohvn1hh !== false) {
					return ++$Vv3hdohvn1hh;
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SEARCHINSENSITIVE($Vfui3jz0cdhv,$V0mmc53yh4jc,$Vortqlloirgz=1) {
		$Vfui3jz0cdhv		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfui3jz0cdhv);
		$V0mmc53yh4jc	= PHPExcel_Calculation_Functions::flattenSingleValue($V0mmc53yh4jc);
		$Vortqlloirgz		= PHPExcel_Calculation_Functions::flattenSingleValue($Vortqlloirgz);

		if (!is_bool($Vfui3jz0cdhv)) {
			if (is_bool($V0mmc53yh4jc)) {
				$V0mmc53yh4jc = ($V0mmc53yh4jc) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
			}

			if (($Vortqlloirgz > 0) && (PHPExcel_Shared_String::CountCharacters($V0mmc53yh4jc) > $Vortqlloirgz)) {
				if (PHPExcel_Shared_String::CountCharacters($Vfui3jz0cdhv) == 0) {
					return $Vortqlloirgz;
				}
				if (function_exists('mb_stripos')) {
					$Vv3hdohvn1hh = mb_stripos($V0mmc53yh4jc, $Vfui3jz0cdhv, --$Vortqlloirgz,'UTF-8');
				} else {
					$Vv3hdohvn1hh = stripos($V0mmc53yh4jc, $Vfui3jz0cdhv, --$Vortqlloirgz);
				}
				if ($Vv3hdohvn1hh !== false) {
					return ++$Vv3hdohvn1hh;
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FIXEDFORMAT($Vp4xjtpabm0l, $Va3zigp1a5ea = 2, $V4ujga2usx11 = FALSE) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Va3zigp1a5ea	= PHPExcel_Calculation_Functions::flattenSingleValue($Va3zigp1a5ea);
		$V4ujga2usx11	= PHPExcel_Calculation_Functions::flattenSingleValue($V4ujga2usx11);

		
		if (!is_numeric($Vp4xjtpabm0l) || !is_numeric($Va3zigp1a5ea)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Va3zigp1a5ea = floor($Va3zigp1a5ea);

		$Vp4xjtpabm0lResult = round($Vp4xjtpabm0l,$Va3zigp1a5ea);
		if ($Va3zigp1a5ea < 0) { $Va3zigp1a5ea = 0; }
		if (!$V4ujga2usx11) {
			$Vp4xjtpabm0lResult = number_format($Vp4xjtpabm0lResult,$Va3zigp1a5ea);
		}

		return (string) $Vp4xjtpabm0lResult;
	}	


	
	public static function LEFT($Vp4xjtpabm0l = '', $V4y0urwpnd3jhars = 1) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$V4y0urwpnd3jhars		= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jhars);

		if ($V4y0urwpnd3jhars < 0) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (is_bool($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = ($Vp4xjtpabm0l) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if (function_exists('mb_substr')) {
			return mb_substr($Vp4xjtpabm0l, 0, $V4y0urwpnd3jhars, 'UTF-8');
		} else {
			return substr($Vp4xjtpabm0l, 0, $V4y0urwpnd3jhars);
		}
	}	


	
	public static function MID($Vp4xjtpabm0l = '', $Vvzcx2qx0r4o = 1, $V4y0urwpnd3jhars = null) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vvzcx2qx0r4o		= PHPExcel_Calculation_Functions::flattenSingleValue($Vvzcx2qx0r4o);
		$V4y0urwpnd3jhars		= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jhars);

		if (($Vvzcx2qx0r4o < 1) || ($V4y0urwpnd3jhars < 0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (is_bool($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = ($Vp4xjtpabm0l) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if (function_exists('mb_substr')) {
			return mb_substr($Vp4xjtpabm0l, --$Vvzcx2qx0r4o, $V4y0urwpnd3jhars, 'UTF-8');
		} else {
			return substr($Vp4xjtpabm0l, --$Vvzcx2qx0r4o, $V4y0urwpnd3jhars);
		}
	}	


	
	public static function RIGHT($Vp4xjtpabm0l = '', $V4y0urwpnd3jhars = 1) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$V4y0urwpnd3jhars		= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jhars);

		if ($V4y0urwpnd3jhars < 0) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (is_bool($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = ($Vp4xjtpabm0l) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if ((function_exists('mb_substr')) && (function_exists('mb_strlen'))) {
			return mb_substr($Vp4xjtpabm0l, mb_strlen($Vp4xjtpabm0l, 'UTF-8') - $V4y0urwpnd3jhars, $V4y0urwpnd3jhars, 'UTF-8');
		} else {
			return substr($Vp4xjtpabm0l, strlen($Vp4xjtpabm0l) - $V4y0urwpnd3jhars);
		}
	}	


	
	public static function STRINGLENGTH($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		if (is_bool($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = ($Vp4xjtpabm0l) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		if (function_exists('mb_strlen')) {
			return mb_strlen($Vp4xjtpabm0l, 'UTF-8');
		} else {
			return strlen($Vp4xjtpabm0l);
		}
	}	


	
	public static function LOWERCASE($Vgqrvmnrcq3a) {
		$Vgqrvmnrcq3a	= PHPExcel_Calculation_Functions::flattenSingleValue($Vgqrvmnrcq3a);

		if (is_bool($Vgqrvmnrcq3a)) {
			$Vgqrvmnrcq3a = ($Vgqrvmnrcq3a) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		return PHPExcel_Shared_String::StrToLower($Vgqrvmnrcq3a);
	}	


	
	public static function UPPERCASE($Vgqrvmnrcq3a) {
		$Vgqrvmnrcq3a	= PHPExcel_Calculation_Functions::flattenSingleValue($Vgqrvmnrcq3a);

		if (is_bool($Vgqrvmnrcq3a)) {
			$Vgqrvmnrcq3a = ($Vgqrvmnrcq3a) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		return PHPExcel_Shared_String::StrToUpper($Vgqrvmnrcq3a);
	}	


	
	public static function PROPERCASE($Vgqrvmnrcq3a) {
		$Vgqrvmnrcq3a	= PHPExcel_Calculation_Functions::flattenSingleValue($Vgqrvmnrcq3a);

		if (is_bool($Vgqrvmnrcq3a)) {
			$Vgqrvmnrcq3a = ($Vgqrvmnrcq3a) ? PHPExcel_Calculation::getTRUE() : PHPExcel_Calculation::getFALSE();
		}

		return PHPExcel_Shared_String::StrToTitle($Vgqrvmnrcq3a);
	}	


	
	public static function REPLACE($Vbyxwgi1hkl3 = '', $Vvzcx2qx0r4o = 1, $V4y0urwpnd3jhars = null, $Vzrmwr53h34g) {
		$Vbyxwgi1hkl3	= PHPExcel_Calculation_Functions::flattenSingleValue($Vbyxwgi1hkl3);
		$Vvzcx2qx0r4o		= PHPExcel_Calculation_Functions::flattenSingleValue($Vvzcx2qx0r4o);
		$V4y0urwpnd3jhars		= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jhars);
		$Vzrmwr53h34g	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzrmwr53h34g);

		$Vrce0gsxjgkc = self::LEFT($Vbyxwgi1hkl3,$Vvzcx2qx0r4o-1);
		$Vqyn43hpxtm0 = self::RIGHT($Vbyxwgi1hkl3,self::STRINGLENGTH($Vbyxwgi1hkl3)-($Vvzcx2qx0r4o+$V4y0urwpnd3jhars)+1);

		return $Vrce0gsxjgkc.$Vzrmwr53h34g.$Vqyn43hpxtm0;
	}	


	
	public static function SUBSTITUTE($Vkjdq1foihhi = '', $Vlxcgklp4go4 = '', $Ve3jslhzfiei = '', $Vz1qvyizgpuq = 0) {
		$Vkjdq1foihhi		= PHPExcel_Calculation_Functions::flattenSingleValue($Vkjdq1foihhi);
		$Vlxcgklp4go4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vlxcgklp4go4);
		$Ve3jslhzfiei		= PHPExcel_Calculation_Functions::flattenSingleValue($Ve3jslhzfiei);
		$Vz1qvyizgpuq	= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vz1qvyizgpuq));

		if ($Vz1qvyizgpuq == 0) {
			if(function_exists('mb_str_replace')) {
				return mb_str_replace($Vlxcgklp4go4,$Ve3jslhzfiei,$Vkjdq1foihhi);
			} else {
				return str_replace($Vlxcgklp4go4,$Ve3jslhzfiei,$Vkjdq1foihhi);
			}
		} else {
			$Vv3hdohvn1hh = -1;
			while($Vz1qvyizgpuq > 0) {
				if (function_exists('mb_strpos')) {
					$Vv3hdohvn1hh = mb_strpos($Vkjdq1foihhi, $Vlxcgklp4go4, $Vv3hdohvn1hh+1, 'UTF-8');
				} else {
					$Vv3hdohvn1hh = strpos($Vkjdq1foihhi, $Vlxcgklp4go4, $Vv3hdohvn1hh+1);
				}
				if ($Vv3hdohvn1hh === false) {
					break;
				}
				--$Vz1qvyizgpuq;
			}
			if ($Vv3hdohvn1hh !== false) {
				if (function_exists('mb_strlen')) {
					return self::REPLACE($Vkjdq1foihhi,++$Vv3hdohvn1hh,mb_strlen($Vlxcgklp4go4, 'UTF-8'),$Ve3jslhzfiei);
				} else {
					return self::REPLACE($Vkjdq1foihhi,++$Vv3hdohvn1hh,strlen($Vlxcgklp4go4),$Ve3jslhzfiei);
				}
			}
		}

		return $Vkjdq1foihhi;
	}	


	
	public static function RETURNSTRING($V41nfkbsz42i = '') {
		$V41nfkbsz42i	= PHPExcel_Calculation_Functions::flattenSingleValue($V41nfkbsz42i);

		if (is_string($V41nfkbsz42i)) {
			return $V41nfkbsz42i;
		}
		return Null;
	}	


	
	public static function TEXTFORMAT($Vp4xjtpabm0l,$Vrcanlvxmlmp) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vrcanlvxmlmp	= PHPExcel_Calculation_Functions::flattenSingleValue($Vrcanlvxmlmp);

		if ((is_string($Vp4xjtpabm0l)) && (!is_numeric($Vp4xjtpabm0l)) && PHPExcel_Shared_Date::isDateTimeFormatCode($Vrcanlvxmlmp)) {
			$Vp4xjtpabm0l = PHPExcel_Calculation_DateTime::DATEVALUE($Vp4xjtpabm0l);
		}

		return (string) PHPExcel_Style_NumberFormat::toFormattedString($Vp4xjtpabm0l,$Vrcanlvxmlmp);
	}	

	
	public static function VALUE($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		if (!is_numeric($Vp4xjtpabm0l)) {
            $V2kap33zepyg = str_replace(
                PHPExcel_Shared_String::getThousandsSeparator(), 
                '', 
                trim($Vp4xjtpabm0l, " \t\n\r\0\x0B" . PHPExcel_Shared_String::getCurrencyCode())
            );
            if (is_numeric($V2kap33zepyg)) {
                return (float) $V2kap33zepyg;
            }

            $Veafpxzf0zyk = PHPExcel_Calculation_Functions::getReturnDateType();
            PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);

            if (strpos($Vp4xjtpabm0l, ':') !== false) {
                $Veovj3illlra = PHPExcel_Calculation_DateTime::TIMEVALUE($Vp4xjtpabm0l);
                if ($Veovj3illlra !== PHPExcel_Calculation_Functions::VALUE()) {
                    PHPExcel_Calculation_Functions::setReturnDateType($Veafpxzf0zyk);
                    return $Veovj3illlra;
                }
            }
			$Vtpwoe0nuvf4 = PHPExcel_Calculation_DateTime::DATEVALUE($Vp4xjtpabm0l);
            if ($Vtpwoe0nuvf4 !== PHPExcel_Calculation_Functions::VALUE()) {
                PHPExcel_Calculation_Functions::setReturnDateType($Veafpxzf0zyk);
                return $Vtpwoe0nuvf4;
            }
            PHPExcel_Calculation_Functions::setReturnDateType($Veafpxzf0zyk);

			return PHPExcel_Calculation_Functions::VALUE();
		}
		return (float) $Vp4xjtpabm0l;
	}

}
