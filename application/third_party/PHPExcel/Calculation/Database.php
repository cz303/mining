<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_Database {


	
	private static function __fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd) {
		$Vrnrburfh0bd = strtoupper(PHPExcel_Calculation_Functions::flattenSingleValue($Vrnrburfh0bd));
		$Vrnrburfh0bdNames = array_map('strtoupper',array_shift($Vzj5ibgin201));

		if (is_numeric($Vrnrburfh0bd)) {
			$Vqvryofqinbe = array_keys($Vrnrburfh0bdNames);
			return $Vqvryofqinbe[$Vrnrburfh0bd-1];
		}
		$Vseq1edikdvg = array_search($Vrnrburfh0bd,$Vrnrburfh0bdNames);
		return ($Vseq1edikdvg) ? $Vseq1edikdvg : NULL;
	}

	
	private static function __filter($Vzj5ibgin201,$V5vzn5jgcfq5) {
		$Vrnrburfh0bdNames = array_shift($Vzj5ibgin201);
		$V5vzn5jgcfq5Names = array_shift($V5vzn5jgcfq5);

		
		$Vfcwl5kjoxv1 = $V5li4gkl23kp = array();
		$Vfcwl5kjoxv1Count = 0;
		foreach($V5vzn5jgcfq5Names as $Vseq1edikdvg => $V5vzn5jgcfq5Name) {
			$Vyiqw305bhrl = array();
			$Vyiqw305bhrlCount = 0;
			foreach($V5vzn5jgcfq5 as $Vexbtekafkvl => $Vecigyhyny5u) {
				if ($Vecigyhyny5u[$Vseq1edikdvg] > '') {
					$Vyiqw305bhrl[] = '[:'.$V5vzn5jgcfq5Name.']'.PHPExcel_Calculation_Functions::_ifCondition($Vecigyhyny5u[$Vseq1edikdvg]);
					$Vyiqw305bhrlCount++;
				}
			}
			if ($Vyiqw305bhrlCount > 1) {
				$Vfcwl5kjoxv1[] = 'OR('.implode(',',$Vyiqw305bhrl).')';
				$Vfcwl5kjoxv1Count++;
			} elseif($Vyiqw305bhrlCount == 1) {
				$Vfcwl5kjoxv1[] = $Vyiqw305bhrl[0];
				$Vfcwl5kjoxv1Count++;
			}
		}

		if ($Vfcwl5kjoxv1Count > 1) {
			$Vyiqw305bhrlSet = 'AND('.implode(',',$Vfcwl5kjoxv1).')';
		} elseif($Vfcwl5kjoxv1Count == 1) {
			$Vyiqw305bhrlSet = $Vfcwl5kjoxv1[0];
		}

		
		foreach($Vzj5ibgin201 as $Vhd3kcd0myn5 => $Vqdzdfrfodv0) {
			
			$Vyiqw305bhrlList = $Vyiqw305bhrlSet;
			foreach($V5vzn5jgcfq5Names as $Vseq1edikdvg => $V5vzn5jgcfq5Name) {
				$V51lf1kcbto4 = array_search($V5vzn5jgcfq5Name,$Vrnrburfh0bdNames);
				if (isset($Vqdzdfrfodv0[$V51lf1kcbto4])) {
					$Vxgkre3bdsqf = $Vqdzdfrfodv0[$V51lf1kcbto4];
					$Vxgkre3bdsqf = (is_string($Vxgkre3bdsqf)) ? PHPExcel_Calculation::_wrapResult(strtoupper($Vxgkre3bdsqf)) : $Vxgkre3bdsqf;
					$Vyiqw305bhrlList = str_replace('[:'.$V5vzn5jgcfq5Name.']',$Vxgkre3bdsqf,$Vyiqw305bhrlList);
				}
			}
			
			$Vwbpa3giaw5f = PHPExcel_Calculation::getInstance()->_calculateFormulaValue('='.$Vyiqw305bhrlList);
			
			if (!$Vwbpa3giaw5f) {
				unset($Vzj5ibgin201[$Vhd3kcd0myn5]);
			}
		}

		return $Vzj5ibgin201;
	}


	
	public static function DAVERAGE($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}
		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::AVERAGE($Vjpw11v4u1kd);
	}	


	
	public static function DCOUNT($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::COUNT($Vjpw11v4u1kd);
	}	


	
	public static function DCOUNTA($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::COUNTA($Vjpw11v4u1kd);
	}	


	
	public static function DGET($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		if (count($Vjpw11v4u1kd) > 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return $Vjpw11v4u1kd[0];
	}	


	
	public static function DMAX($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::MAX($Vjpw11v4u1kd);
	}	


	
	public static function DMIN($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::MIN($Vjpw11v4u1kd);
	}	


	
	public static function DPRODUCT($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_MathTrig::PRODUCT($Vjpw11v4u1kd);
	}	


	
	public static function DSTDEV($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::STDEV($Vjpw11v4u1kd);
	}	


	
	public static function DSTDEVP($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::STDEVP($Vjpw11v4u1kd);
	}	


	
	public static function DSUM($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_MathTrig::SUM($Vjpw11v4u1kd);
	}	


	
	public static function DVAR($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::VARFunc($Vjpw11v4u1kd);
	}	


	
	public static function DVARP($Vzj5ibgin201,$Vrnrburfh0bd,$V5vzn5jgcfq5) {
		$Vrnrburfh0bd = self::__fieldExtract($Vzj5ibgin201,$Vrnrburfh0bd);
		if (is_null($Vrnrburfh0bd)) {
			return NULL;
		}

		
		$Vzj5ibgin201 = self::__filter($Vzj5ibgin201,$V5vzn5jgcfq5);
		
		$Vjpw11v4u1kd = array();
		foreach($Vzj5ibgin201 as $Vexbtekafkvl) {
			$Vjpw11v4u1kd[] = $Vexbtekafkvl[$Vrnrburfh0bd];
		}

		
		return PHPExcel_Calculation_Statistical::VARP($Vjpw11v4u1kd);
	}	


}	
