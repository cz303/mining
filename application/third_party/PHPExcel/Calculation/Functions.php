<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



define('MAX_VALUE', 1.2e308);


define('M_2DIVPI', 0.63661977236758134307553505349006);


define('MAX_ITERATIONS', 256);


define('PRECISION', 8.88E-016);



class PHPExcel_Calculation_Functions {

	
	const COMPATIBILITY_EXCEL		= 'Excel';
	const COMPATIBILITY_GNUMERIC	= 'Gnumeric';
	const COMPATIBILITY_OPENOFFICE	= 'OpenOfficeCalc';

	const RETURNDATE_PHP_NUMERIC	= 'P';
	const RETURNDATE_PHP_OBJECT		= 'O';
	const RETURNDATE_EXCEL			= 'E';


	
	protected static $Vwq0h1155srb	= self::COMPATIBILITY_EXCEL;

	
	protected static $Vecjhzvzlkdl	= self::RETURNDATE_EXCEL;

	
	protected static $Vd34mmo023r0	= array( 'null'				=> '#NULL!',
											 'divisionbyzero'	=> '#DIV/0!',
											 'value'			=> '#VALUE!',
											 'reference'		=> '#REF!',
											 'name'				=> '#NAME?',
											 'num'				=> '#NUM!',
											 'na'				=> '#N/A',
											 'gettingdata'		=> '#GETTING_DATA'
										   );


	
	public static function setCompatibilityMode($Vwq0h1155srb) {
		if (($Vwq0h1155srb == self::COMPATIBILITY_EXCEL) ||
			($Vwq0h1155srb == self::COMPATIBILITY_GNUMERIC) ||
			($Vwq0h1155srb == self::COMPATIBILITY_OPENOFFICE)) {
			self::$Vwq0h1155srb = $Vwq0h1155srb;
			return True;
		}
		return False;
	}	


	
	public static function getCompatibilityMode() {
		return self::$Vwq0h1155srb;
	}	


	
	public static function setReturnDateType($V4lkxztjisue) {
		if (($V4lkxztjisue == self::RETURNDATE_PHP_NUMERIC) ||
			($V4lkxztjisue == self::RETURNDATE_PHP_OBJECT) ||
			($V4lkxztjisue == self::RETURNDATE_EXCEL)) {
			self::$Vecjhzvzlkdl = $V4lkxztjisue;
			return True;
		}
		return False;
	}	


	
	public static function getReturnDateType() {
		return self::$Vecjhzvzlkdl;
	}	


	
	public static function DUMMY() {
		return '#Not Yet Implemented';
	}	


	
	public static function DIV0() {
		return self::$Vd34mmo023r0['divisionbyzero'];
	}	


	
	public static function NA() {
		return self::$Vd34mmo023r0['na'];
	}	


	
	public static function NaN() {
		return self::$Vd34mmo023r0['num'];
	}	


	
	public static function NAME() {
		return self::$Vd34mmo023r0['name'];
	}	


	
	public static function REF() {
		return self::$Vd34mmo023r0['reference'];
	}	


	
	public static function NULL() {
		return self::$Vd34mmo023r0['null'];
	}	


	
	public static function VALUE() {
		return self::$Vd34mmo023r0['value'];
	}	


	public static function isMatrixValue($Ver3jeg4fjir) {
		return ((substr_count($Ver3jeg4fjir,'.') <= 1) || (preg_match('/\.[A-Z]/',$Ver3jeg4fjir) > 0));
	}


	public static function isValue($Ver3jeg4fjir) {
		return (substr_count($Ver3jeg4fjir,'.') == 0);
	}


	public static function isCellValue($Ver3jeg4fjir) {
		return (substr_count($Ver3jeg4fjir,'.') > 1);
	}


	public static function _ifCondition($V20znxhrljlq) {
		$V20znxhrljlq	= PHPExcel_Calculation_Functions::flattenSingleValue($V20znxhrljlq);
		if (!isset($V20znxhrljlq{0}))
			$V20znxhrljlq = '=""';
		if (!in_array($V20znxhrljlq{0},array('>', '<', '='))) {
			if (!is_numeric($V20znxhrljlq)) { $V20znxhrljlq = PHPExcel_Calculation::_wrapResult(strtoupper($V20znxhrljlq)); }
			return '='.$V20znxhrljlq;
		} else {
			preg_match('/([<>=]+)(.*)/',$V20znxhrljlq,$Vt3xexsia3ta);
			list(,$Vxxvi5lwwffp,$Vwxqq2rdrzpz) = $Vt3xexsia3ta;

			if (!is_numeric($Vwxqq2rdrzpz)) {
				$Vwxqq2rdrzpz = str_replace('"', '""', $Vwxqq2rdrzpz);
				$Vwxqq2rdrzpz = PHPExcel_Calculation::_wrapResult(strtoupper($Vwxqq2rdrzpz));
			}

			return $Vxxvi5lwwffp.$Vwxqq2rdrzpz;
		}
	}	


	
	public static function ERROR_TYPE($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l	= self::flattenSingleValue($Vp4xjtpabm0l);

		$Vfhiq1lhsoja = 1;
		foreach(self::$Vd34mmo023r0 as $V0xzcfdwtbud) {
			if ($Vp4xjtpabm0l === $V0xzcfdwtbud) {
				return $Vfhiq1lhsoja;
			}
			++$Vfhiq1lhsoja;
		}
		return self::NA();
	}	


	
	public static function IS_BLANK($Vp4xjtpabm0l = NULL) {
		if (!is_null($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l	= self::flattenSingleValue($Vp4xjtpabm0l);
		}

		return is_null($Vp4xjtpabm0l);
	}	


	
	public static function IS_ERR($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		return self::IS_ERROR($Vp4xjtpabm0l) && (!self::IS_NA($Vp4xjtpabm0l));
	}	


	
	public static function IS_ERROR($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		if (!is_string($Vp4xjtpabm0l))
			return false;
		return in_array($Vp4xjtpabm0l, array_values(self::$Vd34mmo023r0));
	}	


	
	public static function IS_NA($Vp4xjtpabm0l = '') {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		return ($Vp4xjtpabm0l === self::NA());
	}	


	
	public static function IS_EVEN($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l = self::flattenSingleValue($Vp4xjtpabm0l);

		if ($Vp4xjtpabm0l === NULL)
			return self::NAME();
		if ((is_bool($Vp4xjtpabm0l)) || ((is_string($Vp4xjtpabm0l)) && (!is_numeric($Vp4xjtpabm0l))))
			return self::VALUE();
		return ($Vp4xjtpabm0l % 2 == 0);
	}	


	
	public static function IS_ODD($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l = self::flattenSingleValue($Vp4xjtpabm0l);

		if ($Vp4xjtpabm0l === NULL)
			return self::NAME();
		if ((is_bool($Vp4xjtpabm0l)) || ((is_string($Vp4xjtpabm0l)) && (!is_numeric($Vp4xjtpabm0l))))
			return self::VALUE();
		return (abs($Vp4xjtpabm0l) % 2 == 1);
	}	


	
	public static function IS_NUMBER($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		if (is_string($Vp4xjtpabm0l)) {
			return False;
		}
		return is_numeric($Vp4xjtpabm0l);
	}	


	
	public static function IS_LOGICAL($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		return is_bool($Vp4xjtpabm0l);
	}	


	
	public static function IS_TEXT($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l		= self::flattenSingleValue($Vp4xjtpabm0l);

		return (is_string($Vp4xjtpabm0l) && !self::IS_ERROR($Vp4xjtpabm0l));
	}	


	
	public static function IS_NONTEXT($Vp4xjtpabm0l = NULL) {
		return !self::IS_TEXT($Vp4xjtpabm0l);
	}	


	
	public static function VERSION() {
		return 'PHPExcel ##VERSION##, ##DATE##';
	}	


	
	public static function N($Vp4xjtpabm0l = NULL) {
		while (is_array($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = array_shift($Vp4xjtpabm0l);
		}

		switch (gettype($Vp4xjtpabm0l)) {
			case 'double'	:
			case 'float'	:
			case 'integer'	:
				return $Vp4xjtpabm0l;
				break;
			case 'boolean'	:
				return (integer) $Vp4xjtpabm0l;
				break;
			case 'string'	:
				
				if ((strlen($Vp4xjtpabm0l) > 0) && ($Vp4xjtpabm0l{0} == '#')) {
					return $Vp4xjtpabm0l;
				}
				break;
		}
		return 0;
	}	


	
	public static function TYPE($Vp4xjtpabm0l = NULL) {
		$Vp4xjtpabm0l	= self::flattenArrayIndexed($Vp4xjtpabm0l);
		if (is_array($Vp4xjtpabm0l) && (count($Vp4xjtpabm0l) > 1)) {
			$Vi3y3l1uvwp3 = array_keys($Vp4xjtpabm0l);
			$Vi3y3l1uvwp3 = array_pop($Vi3y3l1uvwp3);
			
			if (self::isCellValue($Vi3y3l1uvwp3)) {
				return 16;
			
			} elseif (self::isMatrixValue($Vi3y3l1uvwp3)) {
				return 64;
			}
		} elseif(empty($Vp4xjtpabm0l)) {
			
			return 1;
		}
		$Vp4xjtpabm0l	= self::flattenSingleValue($Vp4xjtpabm0l);

		if (($Vp4xjtpabm0l === NULL) || (is_float($Vp4xjtpabm0l)) || (is_int($Vp4xjtpabm0l))) {
				return 1;
		} elseif(is_bool($Vp4xjtpabm0l)) {
				return 4;
		} elseif(is_array($Vp4xjtpabm0l)) {
				return 64;
		} elseif(is_string($Vp4xjtpabm0l)) {
			
			if ((strlen($Vp4xjtpabm0l) > 0) && ($Vp4xjtpabm0l{0} == '#')) {
				return 16;
			}
			return 2;
		}
		return 0;
	}	


	
	public static function flattenArray($Vi3y3l1uvwp3rray) {
		if (!is_array($Vi3y3l1uvwp3rray)) {
			return (array) $Vi3y3l1uvwp3rray;
		}

		$Vi3y3l1uvwp3rrayValues = array();
		foreach ($Vi3y3l1uvwp3rray as $Vp4xjtpabm0l) {
			if (is_array($Vp4xjtpabm0l)) {
				foreach ($Vp4xjtpabm0l as $Vwk2nao2d33x) {
					if (is_array($Vwk2nao2d33x)) {
						foreach ($Vwk2nao2d33x as $Vf1kwqxxhqpz) {
							$Vi3y3l1uvwp3rrayValues[] = $Vf1kwqxxhqpz;
						}
					} else {
						$Vi3y3l1uvwp3rrayValues[] = $Vwk2nao2d33x;
					}
				}
			} else {
				$Vi3y3l1uvwp3rrayValues[] = $Vp4xjtpabm0l;
			}
		}

		return $Vi3y3l1uvwp3rrayValues;
	}	


	
	public static function flattenArrayIndexed($Vi3y3l1uvwp3rray) {
		if (!is_array($Vi3y3l1uvwp3rray)) {
			return (array) $Vi3y3l1uvwp3rray;
		}

		$Vi3y3l1uvwp3rrayValues = array();
		foreach ($Vi3y3l1uvwp3rray as $Vdh1gdw1qebz => $Vp4xjtpabm0l) {
			if (is_array($Vp4xjtpabm0l)) {
				foreach ($Vp4xjtpabm0l as $Vcgx4lhubjdl => $Vwk2nao2d33x) {
					if (is_array($Vwk2nao2d33x)) {
						foreach ($Vwk2nao2d33x as $Vsu1unwtyoh4 => $Vf1kwqxxhqpz) {
							$Vi3y3l1uvwp3rrayValues[$Vdh1gdw1qebz.'.'.$Vcgx4lhubjdl.'.'.$Vsu1unwtyoh4] = $Vf1kwqxxhqpz;
						}
					} else {
						$Vi3y3l1uvwp3rrayValues[$Vdh1gdw1qebz.'.'.$Vcgx4lhubjdl] = $Vwk2nao2d33x;
					}
				}
			} else {
				$Vi3y3l1uvwp3rrayValues[$Vdh1gdw1qebz] = $Vp4xjtpabm0l;
			}
		}

		return $Vi3y3l1uvwp3rrayValues;
	}	


	
	public static function flattenSingleValue($Vp4xjtpabm0l = '') {
		while (is_array($Vp4xjtpabm0l)) {
			$Vp4xjtpabm0l = array_pop($Vp4xjtpabm0l);
		}

		return $Vp4xjtpabm0l;
	}	

}	







if (!function_exists('acosh')) {
	function acosh($V1e1eaicqarh) {
		return 2 * log(sqrt(($V1e1eaicqarh + 1) / 2) + sqrt(($V1e1eaicqarh - 1) / 2));
	}	
}

if (!function_exists('asinh')) {
	function asinh($V1e1eaicqarh) {
		return log($V1e1eaicqarh + sqrt(1 + $V1e1eaicqarh * $V1e1eaicqarh));
	}	
}

if (!function_exists('atanh')) {
	function atanh($V1e1eaicqarh) {
		return (log(1 + $V1e1eaicqarh) - log(1 - $V1e1eaicqarh)) / 2;
	}	
}






if ((!function_exists('mb_str_replace')) &&
	(function_exists('mb_substr')) && (function_exists('mb_strlen')) && (function_exists('mb_strpos'))) {
	function mb_str_replace($Vfnpw3huvzpq, $Vf3wg4bphtjh, $Vld5fbk2n1id) {
		if(is_array($Vld5fbk2n1id)) {
			$Vc0brddnw0vm = array();
			foreach($Vld5fbk2n1id as $Vseq1edikdvg => $Vwk2nao2d33x) {
				$Vc0brddnw0vm[$Vseq1edikdvg] = mb_str_replace($Vfnpw3huvzpq, $Vf3wg4bphtjh, $Vwk2nao2d33x);
			}
			return $Vc0brddnw0vm;
		}

		foreach((array) $Vfnpw3huvzpq as $Vseq1edikdvg => $V2n430jknk35) {
			if($V2n430jknk35 == '' && $V2n430jknk35 !== 0) {
				continue;
			}
			$Vws44nszhvgo = !is_array($Vf3wg4bphtjh) ? $Vf3wg4bphtjh : (array_key_exists($Vseq1edikdvg, $Vf3wg4bphtjh) ? $Vf3wg4bphtjh[$Vseq1edikdvg] : '');
			$Vv3hdohvn1hh = mb_strpos($Vld5fbk2n1id, $V2n430jknk35, 0, 'UTF-8');
			while($Vv3hdohvn1hh !== false) {
				$Vld5fbk2n1id = mb_substr($Vld5fbk2n1id, 0, $Vv3hdohvn1hh, 'UTF-8') . $Vws44nszhvgo . mb_substr($Vld5fbk2n1id, $Vv3hdohvn1hh + mb_strlen($V2n430jknk35, 'UTF-8'), 65535, 'UTF-8');
				$Vv3hdohvn1hh = mb_strpos($Vld5fbk2n1id, $V2n430jknk35, $Vv3hdohvn1hh + mb_strlen($Vws44nszhvgo, 'UTF-8'), 'UTF-8');
			}
		}
		return $Vld5fbk2n1id;
	}
}
