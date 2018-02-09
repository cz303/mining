<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



define('FINANCIAL_MAX_ITERATIONS', 128);


define('FINANCIAL_PRECISION', 1.0e-08);



class PHPExcel_Calculation_Financial {

	
	private static function _lastDayOfMonth($Vnxapoy1hmzf)
	{
		return ($Vnxapoy1hmzf->format('d') == $Vnxapoy1hmzf->format('t'));
	}	


	
	private static function _firstDayOfMonth($Vnxapoy1hmzf)
	{
		return ($Vnxapoy1hmzf->format('d') == 1);
	}	


	private static function _coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vjg5z2pedl1b)
	{
		$V3dvnj2xhstc = 12 / $Vj33ezminife;

		$Vwbpa3giaw5f = PHPExcel_Shared_Date::ExcelToPHPObject($Vhyq4w4fl55j);
		$Vdurb3jyxtxl = self::_lastDayOfMonth($Vwbpa3giaw5f);

		while ($Vyrikbuemxz1 < PHPExcel_Shared_Date::PHPToExcel($Vwbpa3giaw5f)) {
			$Vwbpa3giaw5f->modify('-'.$V3dvnj2xhstc.' months');
		}
		if ($Vjg5z2pedl1b) {
			$Vwbpa3giaw5f->modify('+'.$V3dvnj2xhstc.' months');
		}

		if ($Vdurb3jyxtxl) {
			$Vwbpa3giaw5f->modify('-1 day');
		}

		return PHPExcel_Shared_Date::PHPToExcel($Vwbpa3giaw5f);
	}	


	private static function _validFrequency($Vj33ezminife)
	{
		if (($Vj33ezminife == 1) || ($Vj33ezminife == 2) || ($Vj33ezminife == 4)) {
			return true;
		}
		if ((PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) &&
			(($Vj33ezminife == 6) || ($Vj33ezminife == 12))) {
			return true;
		}
		return false;
	}	


	
	private static function _daysPerYear($Vz2lhrjd1jk2, $Vqoj04lmuxow=0)
	{
		switch ($Vqoj04lmuxow) {
			case 0 :
			case 2 :
			case 4 :
				$Vt0hwcxdxejp = 360;
				break;
			case 3 :
				$Vt0hwcxdxejp = 365;
				break;
			case 1 :
				$Vt0hwcxdxejp = (PHPExcel_Calculation_DateTime::_isLeapYear($Vz2lhrjd1jk2)) ? 366 : 365;
				break;
			default	:
				return PHPExcel_Calculation_Functions::NaN();
		}
		return $Vt0hwcxdxejp;
	}	


	private static function _interestAndPrincipal($Vr1ojavkhcvo=0, $V1zk3a4wt2dk=0, $V05jjsvwnaix=0, $Viqao32pj4nj=0, $Vwsub2gqa12p=0, $V4pigtpor0ln=0)
	{
		$Vj5lhr03uape = self::PMT($Vr1ojavkhcvo, $V05jjsvwnaix, $Viqao32pj4nj, $Vwsub2gqa12p, $V4pigtpor0ln);
		$Vbgupzw3w4gk = $Viqao32pj4nj;
		for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja<= $V1zk3a4wt2dk; ++$Vfhiq1lhsoja) {
			$Vfhiq1lhsojanterest = ($V4pigtpor0ln && $Vfhiq1lhsoja == 1) ? 0 : -$Vbgupzw3w4gk * $Vr1ojavkhcvo;
			$Vnr1mkcme3eu = $Vj5lhr03uape - $Vfhiq1lhsojanterest;
			$Vbgupzw3w4gk += $Vnr1mkcme3eu;
		}
		return array($Vfhiq1lhsojanterest, $Vnr1mkcme3eu);
	}	


	
	public static function ACCRINT($Vfhiq1lhsojassue, $Vjhzkedgab05, $Vyrikbuemxz1, $Vr1ojavkhcvo, $Vy1s3lmhfba1=1000, $Vj33ezminife=1, $Vqoj04lmuxow=0)
	{
		$Vfhiq1lhsojassue		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojassue);
		$Vjhzkedgab05	= PHPExcel_Calculation_Functions::flattenSingleValue($Vjhzkedgab05);
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vr1ojavkhcvo		= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vy1s3lmhfba1		= (is_null($Vy1s3lmhfba1))		? 1000 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vy1s3lmhfba1);
		$Vj33ezminife	= (is_null($Vj33ezminife))	? 1	: 		PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))		? 0	:		PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vr1ojavkhcvo)) && (is_numeric($Vy1s3lmhfba1))) {
			$Vr1ojavkhcvo	= (float) $Vr1ojavkhcvo;
			$Vy1s3lmhfba1	= (float) $Vy1s3lmhfba1;
			if (($Vr1ojavkhcvo <= 0) || ($Vy1s3lmhfba1 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vqo1tvxdfarx = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vyrikbuemxz1, $Vqoj04lmuxow);
			if (!is_numeric($Vqo1tvxdfarx)) {
				
				return $Vqo1tvxdfarx;
			}

			return $Vy1s3lmhfba1 * $Vr1ojavkhcvo * $Vqo1tvxdfarx;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function ACCRINTM($Vfhiq1lhsojassue, $Vyrikbuemxz1, $Vr1ojavkhcvo, $Vy1s3lmhfba1=1000, $Vqoj04lmuxow=0) {
		$Vfhiq1lhsojassue		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojassue);
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vr1ojavkhcvo		= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vy1s3lmhfba1		= (is_null($Vy1s3lmhfba1))	? 1000 :	PHPExcel_Calculation_Functions::flattenSingleValue($Vy1s3lmhfba1);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :		PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vr1ojavkhcvo)) && (is_numeric($Vy1s3lmhfba1))) {
			$Vr1ojavkhcvo	= (float) $Vr1ojavkhcvo;
			$Vy1s3lmhfba1	= (float) $Vy1s3lmhfba1;
			if (($Vr1ojavkhcvo <= 0) || ($Vy1s3lmhfba1 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vqo1tvxdfarx = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vyrikbuemxz1, $Vqoj04lmuxow);
			if (!is_numeric($Vqo1tvxdfarx)) {
				
				return $Vqo1tvxdfarx;
			}
			return $Vy1s3lmhfba1 * $Vr1ojavkhcvo * $Vqo1tvxdfarx;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function AMORDEGRC($Viinxuzv3kjq, $Vcfkc5ypwilp, $Vrcd1bflfwjh, $Vn4sb1zqzxxu, $V1zk3a4wt2dkiod, $Vr1ojavkhcvo, $Vqoj04lmuxow=0) {
		$Viinxuzv3kjq			= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vcfkc5ypwilp		= PHPExcel_Calculation_Functions::flattenSingleValue($Vcfkc5ypwilp);
		$Vrcd1bflfwjh	= PHPExcel_Calculation_Functions::flattenSingleValue($Vrcd1bflfwjh);
		$Vn4sb1zqzxxu		= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$V1zk3a4wt2dkiod			= floor(PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dkiod));
		$Vr1ojavkhcvo			= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vqoj04lmuxow			= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		
		
		
		
		
		$Vg1nrqdknose = 1.0 / $Vr1ojavkhcvo;
		if ($Vg1nrqdknose < 3.0) {
			$Vq1l2thfcxhw = 1.0;
		} elseif ($Vg1nrqdknose < 5.0) {
			$Vq1l2thfcxhw = 1.5;
		} elseif ($Vg1nrqdknose <= 6.0) {
			$Vq1l2thfcxhw = 2.0;
		} else {
			$Vq1l2thfcxhw = 2.5;
		}

		$Vr1ojavkhcvo *= $Vq1l2thfcxhw;
		$Vdbursmfyzce = round(PHPExcel_Calculation_DateTime::YEARFRAC($Vcfkc5ypwilp, $Vrcd1bflfwjh, $Vqoj04lmuxow) * $Vr1ojavkhcvo * $Viinxuzv3kjq,0);
		$Viinxuzv3kjq -= $Vdbursmfyzce;
		$Vhhswbkvxcpw = $Viinxuzv3kjq - $Vn4sb1zqzxxu;

		for ($Vmwwo1qnmepz = 0; $Vmwwo1qnmepz < $V1zk3a4wt2dkiod; ++$Vmwwo1qnmepz) {
			$Vdbursmfyzce = round($Vr1ojavkhcvo * $Viinxuzv3kjq,0);
			$Vhhswbkvxcpw -= $Vdbursmfyzce;

			if ($Vhhswbkvxcpw < 0.0) {
				switch ($V1zk3a4wt2dkiod - $Vmwwo1qnmepz) {
					case 0	:
					case 1	: return round($Viinxuzv3kjq * 0.5, 0);
							  break;
					default	: return 0.0;
							  break;
				}
			}
			$Viinxuzv3kjq -= $Vdbursmfyzce;
		}
		return $Vdbursmfyzce;
	}	


	
	public static function AMORLINC($Viinxuzv3kjq, $Vcfkc5ypwilp, $Vrcd1bflfwjh, $Vn4sb1zqzxxu, $V1zk3a4wt2dkiod, $Vr1ojavkhcvo, $Vqoj04lmuxow=0) {
		$Viinxuzv3kjq			= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vcfkc5ypwilp		= PHPExcel_Calculation_Functions::flattenSingleValue($Vcfkc5ypwilp);
		$Vrcd1bflfwjh	= PHPExcel_Calculation_Functions::flattenSingleValue($Vrcd1bflfwjh);
		$Vn4sb1zqzxxu		= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$V1zk3a4wt2dkiod			= PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dkiod);
		$Vr1ojavkhcvo			= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vqoj04lmuxow			= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		$V22y1z0qgay1 = $Viinxuzv3kjq * $Vr1ojavkhcvo;
		$Vojnrvula5vn = $Viinxuzv3kjq - $Vn4sb1zqzxxu;
		
		$Vcfkc5ypwilpYear = PHPExcel_Calculation_DateTime::YEAR($Vcfkc5ypwilp);
		$Vz2lhrjd1jk2Frac = PHPExcel_Calculation_DateTime::YEARFRAC($Vcfkc5ypwilp, $Vrcd1bflfwjh, $Vqoj04lmuxow);

		if (($Vqoj04lmuxow == 1) && ($Vz2lhrjd1jk2Frac < 1) && (PHPExcel_Calculation_DateTime::_isLeapYear($Vcfkc5ypwilpYear))) {
			$Vz2lhrjd1jk2Frac *= 365 / 366;
		}

		$Vwjfu4f2diev = $Vz2lhrjd1jk2Frac * $Vr1ojavkhcvo * $Viinxuzv3kjq;
		$Vmwwo1qnmepzNumOfFullPeriods = intval(($Viinxuzv3kjq - $Vn4sb1zqzxxu - $Vwjfu4f2diev) / $V22y1z0qgay1);

		if ($V1zk3a4wt2dkiod == 0) {
			return $Vwjfu4f2diev;
		} elseif ($V1zk3a4wt2dkiod <= $Vmwwo1qnmepzNumOfFullPeriods) {
			return $V22y1z0qgay1;
		} elseif ($V1zk3a4wt2dkiod == ($Vmwwo1qnmepzNumOfFullPeriods + 1)) {
            return ($Vojnrvula5vn - $V22y1z0qgay1 * $Vmwwo1qnmepzNumOfFullPeriods - $Vwjfu4f2diev);
		} else {
			return 0.0;
		}
	}	


	
	public static function COUPDAYBS($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vyrikbuemxz1),$Vqoj04lmuxow);
		$Vukiv2jodcur = self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, False);

		return PHPExcel_Calculation_DateTime::YEARFRAC($Vukiv2jodcur, $Vyrikbuemxz1, $Vqoj04lmuxow) * $Vt0hwcxdxejp;
	}	


	
	public static function COUPDAYS($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		switch ($Vqoj04lmuxow) {
			case 3: 
					return 365 / $Vj33ezminife;
			case 1: 
					if ($Vj33ezminife == 1) {
						$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vhyq4w4fl55j),$Vqoj04lmuxow);
						return ($Vt0hwcxdxejp / $Vj33ezminife);
					} else {
						$Vukiv2jodcur = self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, False);
						$Vjg5z2pedl1b = self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, True);
						return ($Vjg5z2pedl1b - $Vukiv2jodcur);
					}
			default: 
					return 360 / $Vj33ezminife;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function COUPDAYSNC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vyrikbuemxz1),$Vqoj04lmuxow);
		$Vjg5z2pedl1b = self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, True);

		return PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vjg5z2pedl1b, $Vqoj04lmuxow) * $Vt0hwcxdxejp;
	}	


	
	public static function COUPNCD($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, True);
	}	


	
	public static function COUPNUM($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Vyrikbuemxz1 = self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, True);
		$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow) * 365;

		switch ($Vj33ezminife) {
			case 1: 
					return ceil($V41eospqzwgr / 360);
			case 2: 
					return ceil($V41eospqzwgr / 180);
			case 4: 
					return ceil($V41eospqzwgr / 90);
			case 6: 
					return ceil($V41eospqzwgr / 60);
			case 12: 
					return ceil($V41eospqzwgr / 30);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function COUPPCD($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return self::_coupFirstPeriodDate($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, False);
	}	


	
	public static function CUMIPMT($Vr1ojavkhcvo, $V05jjsvwnaix, $Viqao32pj4nj, $Vvzcx2qx0r4o, $Vidi1l5xe3bf, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V05jjsvwnaix	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vvzcx2qx0r4o	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vvzcx2qx0r4o);
		$Vidi1l5xe3bf	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vidi1l5xe3bf);
		$V4pigtpor0ln	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($Vvzcx2qx0r4o < 1 || $Vvzcx2qx0r4o > $Vidi1l5xe3bf) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vfhiq1lhsojanterest = 0;
		for ($V1zk3a4wt2dk = $Vvzcx2qx0r4o; $V1zk3a4wt2dk <= $Vidi1l5xe3bf; ++$V1zk3a4wt2dk) {
			$Vfhiq1lhsojanterest += self::IPMT($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, 0, $V4pigtpor0ln);
		}

		return $Vfhiq1lhsojanterest;
	}	


	
	public static function CUMPRINC($Vr1ojavkhcvo, $V05jjsvwnaix, $Viqao32pj4nj, $Vvzcx2qx0r4o, $Vidi1l5xe3bf, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V05jjsvwnaix	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vvzcx2qx0r4o	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vvzcx2qx0r4o);
		$Vidi1l5xe3bf	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vidi1l5xe3bf);
		$V4pigtpor0ln	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($Vvzcx2qx0r4o < 1 || $Vvzcx2qx0r4o > $Vidi1l5xe3bf) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vnr1mkcme3eu = 0;
		for ($V1zk3a4wt2dk = $Vvzcx2qx0r4o; $V1zk3a4wt2dk <= $Vidi1l5xe3bf; ++$V1zk3a4wt2dk) {
			$Vnr1mkcme3eu += self::PPMT($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, 0, $V4pigtpor0ln);
		}

		return $Vnr1mkcme3eu;
	}	


	
	public static function DB($Viinxuzv3kjq, $Vn4sb1zqzxxu, $Vgazb1jhnsvm, $V1zk3a4wt2dkiod, $Vbylkx0shw01=12) {
		$Viinxuzv3kjq		= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vn4sb1zqzxxu	= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$Vgazb1jhnsvm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vgazb1jhnsvm);
		$V1zk3a4wt2dkiod		= PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dkiod);
		$Vbylkx0shw01		= PHPExcel_Calculation_Functions::flattenSingleValue($Vbylkx0shw01);

		
		if ((is_numeric($Viinxuzv3kjq)) && (is_numeric($Vn4sb1zqzxxu)) && (is_numeric($Vgazb1jhnsvm)) && (is_numeric($V1zk3a4wt2dkiod)) && (is_numeric($Vbylkx0shw01))) {
			$Viinxuzv3kjq		= (float) $Viinxuzv3kjq;
			$Vn4sb1zqzxxu	= (float) $Vn4sb1zqzxxu;
			$Vgazb1jhnsvm		= (int) $Vgazb1jhnsvm;
			$V1zk3a4wt2dkiod		= (int) $V1zk3a4wt2dkiod;
			$Vbylkx0shw01		= (int) $Vbylkx0shw01;
			if ($Viinxuzv3kjq == 0) {
				return 0.0;
			} elseif (($Viinxuzv3kjq < 0) || (($Vn4sb1zqzxxu / $Viinxuzv3kjq) < 0) || ($Vgazb1jhnsvm <= 0) || ($V1zk3a4wt2dkiod < 1) || ($Vbylkx0shw01 < 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			
			$Vse0syhdxctk = 1 - pow(($Vn4sb1zqzxxu / $Viinxuzv3kjq), (1 / $Vgazb1jhnsvm));
			$Vse0syhdxctk = round($Vse0syhdxctk, 3);

			
			$Vukiv2jodcuriousDepreciation = 0;
			for ($V1zk3a4wt2dk = 1; $V1zk3a4wt2dk <= $V1zk3a4wt2dkiod; ++$V1zk3a4wt2dk) {
				if ($V1zk3a4wt2dk == 1) {
					$Vkono2aez5ko = $Viinxuzv3kjq * $Vse0syhdxctk * $Vbylkx0shw01 / 12;
				} elseif ($V1zk3a4wt2dk == ($Vgazb1jhnsvm + 1)) {
					$Vkono2aez5ko = ($Viinxuzv3kjq - $Vukiv2jodcuriousDepreciation) * $Vse0syhdxctk * (12 - $Vbylkx0shw01) / 12;
				} else {
					$Vkono2aez5ko = ($Viinxuzv3kjq - $Vukiv2jodcuriousDepreciation) * $Vse0syhdxctk;
				}
				$Vukiv2jodcuriousDepreciation += $Vkono2aez5ko;
			}
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				$Vkono2aez5ko = round($Vkono2aez5ko,2);
			}
			return $Vkono2aez5ko;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function DDB($Viinxuzv3kjq, $Vn4sb1zqzxxu, $Vgazb1jhnsvm, $V1zk3a4wt2dkiod, $Vikhldhkl2jt=2.0) {
		$Viinxuzv3kjq		= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vn4sb1zqzxxu	= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$Vgazb1jhnsvm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vgazb1jhnsvm);
		$V1zk3a4wt2dkiod		= PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dkiod);
		$Vikhldhkl2jt		= PHPExcel_Calculation_Functions::flattenSingleValue($Vikhldhkl2jt);

		
		if ((is_numeric($Viinxuzv3kjq)) && (is_numeric($Vn4sb1zqzxxu)) && (is_numeric($Vgazb1jhnsvm)) && (is_numeric($V1zk3a4wt2dkiod)) && (is_numeric($Vikhldhkl2jt))) {
			$Viinxuzv3kjq		= (float) $Viinxuzv3kjq;
			$Vn4sb1zqzxxu	= (float) $Vn4sb1zqzxxu;
			$Vgazb1jhnsvm		= (int) $Vgazb1jhnsvm;
			$V1zk3a4wt2dkiod		= (int) $V1zk3a4wt2dkiod;
			$Vikhldhkl2jt		= (float) $Vikhldhkl2jt;
			if (($Viinxuzv3kjq <= 0) || (($Vn4sb1zqzxxu / $Viinxuzv3kjq) < 0) || ($Vgazb1jhnsvm <= 0) || ($V1zk3a4wt2dkiod < 1) || ($Vikhldhkl2jt <= 0.0) || ($V1zk3a4wt2dkiod > $Vgazb1jhnsvm)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			
			$Vse0syhdxctk = 1 - pow(($Vn4sb1zqzxxu / $Viinxuzv3kjq), (1 / $Vgazb1jhnsvm));
			$Vse0syhdxctk = round($Vse0syhdxctk, 3);

			
			$Vukiv2jodcuriousDepreciation = 0;
			for ($V1zk3a4wt2dk = 1; $V1zk3a4wt2dk <= $V1zk3a4wt2dkiod; ++$V1zk3a4wt2dk) {
				$Vkono2aez5ko = min( ($Viinxuzv3kjq - $Vukiv2jodcuriousDepreciation) * ($Vikhldhkl2jt / $Vgazb1jhnsvm), ($Viinxuzv3kjq - $Vn4sb1zqzxxu - $Vukiv2jodcuriousDepreciation) );
				$Vukiv2jodcuriousDepreciation += $Vkono2aez5ko;
			}
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				$Vkono2aez5ko = round($Vkono2aez5ko,2);
			}
			return $Vkono2aez5ko;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function DISC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vf5ay5d1jwfm, $V5pdffvdplb0, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vf5ay5d1jwfm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vf5ay5d1jwfm);
		$V5pdffvdplb0	= PHPExcel_Calculation_Functions::flattenSingleValue($V5pdffvdplb0);
		$Vqoj04lmuxow		= PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vf5ay5d1jwfm)) && (is_numeric($V5pdffvdplb0)) && (is_numeric($Vqoj04lmuxow))) {
			$Vf5ay5d1jwfm		= (float) $Vf5ay5d1jwfm;
			$V5pdffvdplb0	= (float) $V5pdffvdplb0;
			$Vqoj04lmuxow		= (int) $Vqoj04lmuxow;
			if (($Vf5ay5d1jwfm <= 0) || ($V5pdffvdplb0 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}

			return ((1 - $Vf5ay5d1jwfm / $V5pdffvdplb0) / $V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function DOLLARDE($Vcgsyech3iik = Null, $Vjmx2nzk5wmz = 0) {
		$Vcgsyech3iik	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgsyech3iik);
		$Vjmx2nzk5wmz			= (int)PHPExcel_Calculation_Functions::flattenSingleValue($Vjmx2nzk5wmz);

		
		if (is_null($Vcgsyech3iik) || $Vjmx2nzk5wmz < 0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($Vjmx2nzk5wmz == 0) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4zxmeoszz2m = floor($Vcgsyech3iik);
		$Vu2h4zcmibpz = fmod($Vcgsyech3iik,1);
		$Vu2h4zcmibpz /= $Vjmx2nzk5wmz;
		$Vu2h4zcmibpz *= pow(10,ceil(log10($Vjmx2nzk5wmz)));
		return $V4zxmeoszz2m + $Vu2h4zcmibpz;
	}	


	
	public static function DOLLARFR($Vjyrnnwdhun1 = Null, $Vjmx2nzk5wmz = 0) {
		$Vjyrnnwdhun1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vjyrnnwdhun1);
		$Vjmx2nzk5wmz		= (int)PHPExcel_Calculation_Functions::flattenSingleValue($Vjmx2nzk5wmz);

		
		if (is_null($Vjyrnnwdhun1) || $Vjmx2nzk5wmz < 0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($Vjmx2nzk5wmz == 0) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4zxmeoszz2m = floor($Vjyrnnwdhun1);
		$Vu2h4zcmibpz = fmod($Vjyrnnwdhun1,1);
		$Vu2h4zcmibpz *= $Vjmx2nzk5wmz;
		$Vu2h4zcmibpz *= pow(10,-ceil(log10($Vjmx2nzk5wmz)));
		return $V4zxmeoszz2m + $Vu2h4zcmibpz;
	}	


	
	public static function EFFECT($Vmwwo1qnmepzominal_rate = 0, $V05jjsvwnaixy = 0) {
		$Vmwwo1qnmepzominal_rate	= PHPExcel_Calculation_Functions::flattenSingleValue($Vmwwo1qnmepzominal_rate);
		$V05jjsvwnaixy			= (int)PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaixy);

		
		if ($Vmwwo1qnmepzominal_rate <= 0 || $V05jjsvwnaixy < 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		return pow((1 + $Vmwwo1qnmepzominal_rate / $V05jjsvwnaixy), $V05jjsvwnaixy) - 1;
	}	


	
	public static function FV($Vr1ojavkhcvo = 0, $V05jjsvwnaix = 0, $Vj5lhr03uape = 0, $Viqao32pj4nj = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V05jjsvwnaix	= PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Vj5lhr03uape	= PHPExcel_Calculation_Functions::flattenSingleValue($Vj5lhr03uape);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$V4pigtpor0ln	= PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		if (!is_null($Vr1ojavkhcvo) && $Vr1ojavkhcvo != 0) {
			return -$Viqao32pj4nj * pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix) - $Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) * (pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix) - 1) / $Vr1ojavkhcvo;
		} else {
			return -$Viqao32pj4nj - $Vj5lhr03uape * $V05jjsvwnaix;
		}
	}	


	
	public static function FVSCHEDULE($Vnr1mkcme3eu, $V2lklgyiu1vu) {
		$Vnr1mkcme3eu	= PHPExcel_Calculation_Functions::flattenSingleValue($Vnr1mkcme3eu);
		$V2lklgyiu1vu	= PHPExcel_Calculation_Functions::flattenArray($V2lklgyiu1vu);

		foreach($V2lklgyiu1vu as $Vr1ojavkhcvo) {
			$Vnr1mkcme3eu *= 1 + $Vr1ojavkhcvo;
		}

		return $Vnr1mkcme3eu;
	}	


	
	public static function INTRATE($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vfhiq1lhsojanvestment, $V5pdffvdplb0, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vfhiq1lhsojanvestment	= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojanvestment);
		$V5pdffvdplb0	= PHPExcel_Calculation_Functions::flattenSingleValue($V5pdffvdplb0);
		$Vqoj04lmuxow		= PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vfhiq1lhsojanvestment)) && (is_numeric($V5pdffvdplb0)) && (is_numeric($Vqoj04lmuxow))) {
			$Vfhiq1lhsojanvestment	= (float) $Vfhiq1lhsojanvestment;
			$V5pdffvdplb0	= (float) $V5pdffvdplb0;
			$Vqoj04lmuxow		= (int) $Vqoj04lmuxow;
			if (($Vfhiq1lhsojanvestment <= 0) || ($V5pdffvdplb0 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}

			return (($V5pdffvdplb0 / $Vfhiq1lhsojanvestment) - 1) / ($V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function IPMT($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, $Vwsub2gqa12p = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V1zk3a4wt2dk	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dk);
		$V05jjsvwnaix	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vwsub2gqa12p		= PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($V1zk3a4wt2dk <= 0 || $V1zk3a4wt2dk > $V05jjsvwnaix) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vfhiq1lhsojanterestAndPrincipal = self::_interestAndPrincipal($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, $Vwsub2gqa12p, $V4pigtpor0ln);
		return $Vfhiq1lhsojanterestAndPrincipal[0];
	}	

	
	public static function IRR($Vmbklynu3i2z, $Vdnkef1ydi0l = 0.1) {
		if (!is_array($Vmbklynu3i2z)) return PHPExcel_Calculation_Functions::VALUE();
		$Vmbklynu3i2z = PHPExcel_Calculation_Functions::flattenArray($Vmbklynu3i2z);
		$Vdnkef1ydi0l = PHPExcel_Calculation_Functions::flattenSingleValue($Vdnkef1ydi0l);

		
		$Vkiv1idvekdh = 0.0;
		$Vbbuqfp0xqjj = $Vdnkef1ydi0l;
		$Vghf0bdjit22 = self::NPV($Vkiv1idvekdh, $Vmbklynu3i2z);
		$Vorb41dfrszd = self::NPV($Vbbuqfp0xqjj, $Vmbklynu3i2z);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < FINANCIAL_MAX_ITERATIONS; ++$Vfhiq1lhsoja) {
			if (($Vghf0bdjit22 * $Vorb41dfrszd) < 0.0) break;
			if (abs($Vghf0bdjit22) < abs($Vorb41dfrszd)) {
				$Vghf0bdjit22 = self::NPV($Vkiv1idvekdh += 1.6 * ($Vkiv1idvekdh - $Vbbuqfp0xqjj), $Vmbklynu3i2z);
			} else {
				$Vorb41dfrszd = self::NPV($Vbbuqfp0xqjj += 1.6 * ($Vbbuqfp0xqjj - $Vkiv1idvekdh), $Vmbklynu3i2z);
			}
		}
		if (($Vghf0bdjit22 * $Vorb41dfrszd) > 0.0) return PHPExcel_Calculation_Functions::VALUE();

		$Vtbbah5lqvpo = self::NPV($Vkiv1idvekdh, $Vmbklynu3i2z);
		if ($Vtbbah5lqvpo < 0.0) {
			$V5xpy2umw3e2 = $Vkiv1idvekdh;
			$Vcxaujbeexic = $Vbbuqfp0xqjj - $Vkiv1idvekdh;
		} else {
			$V5xpy2umw3e2 = $Vbbuqfp0xqjj;
			$Vcxaujbeexic = $Vkiv1idvekdh - $Vbbuqfp0xqjj;
		}

		for ($Vfhiq1lhsoja = 0;  $Vfhiq1lhsoja < FINANCIAL_MAX_ITERATIONS; ++$Vfhiq1lhsoja) {
			$Vcxaujbeexic *= 0.5;
			$Vrbihy32cnrc = $V5xpy2umw3e2 + $Vcxaujbeexic;
			$Vtbbah5lqvpo_mid = self::NPV($Vrbihy32cnrc, $Vmbklynu3i2z);
			if ($Vtbbah5lqvpo_mid <= 0.0) 
				$V5xpy2umw3e2 = $Vrbihy32cnrc;
			if ((abs($Vtbbah5lqvpo_mid) < FINANCIAL_PRECISION) || (abs($Vcxaujbeexic) < FINANCIAL_PRECISION)) 
				return $Vrbihy32cnrc;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function ISPMT() {
		
		$Vbco3t3kne3m = 0;

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		$Vfhiq1lhsojanterestRate = array_shift($Voojdymxtgs1);
		$V1zk3a4wt2dkiod = array_shift($Voojdymxtgs1);
		$Vmwwo1qnmepzumberPeriods = array_shift($Voojdymxtgs1);
		$V40pciai3ylo = array_shift($Voojdymxtgs1);

		
		$Vhqssm4l2gv4 = ($V40pciai3ylo * 1.0) / ($Vmwwo1qnmepzumberPeriods * 1.0);
		for($Vfhiq1lhsoja=0; $Vfhiq1lhsoja <= $V1zk3a4wt2dkiod; ++$Vfhiq1lhsoja) {
			$Vbco3t3kne3m = $Vfhiq1lhsojanterestRate * $V40pciai3ylo * -1;
			$V40pciai3ylo -= $Vhqssm4l2gv4;
			
			if($Vfhiq1lhsoja == $Vmwwo1qnmepzumberPeriods) {
				$Vbco3t3kne3m = 0;
			}
		}
		return($Vbco3t3kne3m);
	}	


	
	public static function MIRR($Vmbklynu3i2z, $Vtbbah5lqvpoinance_rate, $Vg0p1snhbp21) {
		if (!is_array($Vmbklynu3i2z)) return PHPExcel_Calculation_Functions::VALUE();
		$Vmbklynu3i2z				= PHPExcel_Calculation_Functions::flattenArray($Vmbklynu3i2z);
		$Vtbbah5lqvpoinance_rate		= PHPExcel_Calculation_Functions::flattenSingleValue($Vtbbah5lqvpoinance_rate);
		$Vg0p1snhbp21	= PHPExcel_Calculation_Functions::flattenSingleValue($Vg0p1snhbp21);
		$Vmwwo1qnmepz = count($Vmbklynu3i2z);

		$Vf4kyidc54zg = 1.0 + $Vg0p1snhbp21;
		$Vtbbah5lqvpor = 1.0 + $Vtbbah5lqvpoinance_rate;

		$Vmwwo1qnmepzpv_pos = $Vmwwo1qnmepzpv_neg = 0.0;
		foreach($Vmbklynu3i2z as $Vfhiq1lhsoja => $Vf1kwqxxhqpz) {
			if ($Vf1kwqxxhqpz >= 0) {
				$Vmwwo1qnmepzpv_pos += $Vf1kwqxxhqpz / pow($Vf4kyidc54zg, $Vfhiq1lhsoja);
			} else {
				$Vmwwo1qnmepzpv_neg += $Vf1kwqxxhqpz / pow($Vtbbah5lqvpor, $Vfhiq1lhsoja);
			}
		}

		if (($Vmwwo1qnmepzpv_neg == 0) || ($Vmwwo1qnmepzpv_pos == 0) || ($Vg0p1snhbp21 <= -1)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		$Vbvnmww4kudk = pow((-$Vmwwo1qnmepzpv_pos * pow($Vf4kyidc54zg, $Vmwwo1qnmepz))
				/ ($Vmwwo1qnmepzpv_neg * ($Vf4kyidc54zg)), (1.0 / ($Vmwwo1qnmepz - 1))) - 1.0;

		return (is_finite($Vbvnmww4kudk) ? $Vbvnmww4kudk : PHPExcel_Calculation_Functions::VALUE());
	}	


	
	public static function NOMINAL($Vksamn4rsm5w = 0, $V05jjsvwnaixy = 0) {
		$Vksamn4rsm5w	= PHPExcel_Calculation_Functions::flattenSingleValue($Vksamn4rsm5w);
		$V05jjsvwnaixy			= (int)PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaixy);

		
		if ($Vksamn4rsm5w <= 0 || $V05jjsvwnaixy < 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		return $V05jjsvwnaixy * (pow($Vksamn4rsm5w + 1, 1 / $V05jjsvwnaixy) - 1);
	}	


	
	public static function NPER($Vr1ojavkhcvo = 0, $Vj5lhr03uape = 0, $Viqao32pj4nj = 0, $Vwsub2gqa12p = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vj5lhr03uape	= PHPExcel_Calculation_Functions::flattenSingleValue($Vj5lhr03uape);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vwsub2gqa12p		= PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		if (!is_null($Vr1ojavkhcvo) && $Vr1ojavkhcvo != 0) {
			if ($Vj5lhr03uape == 0 && $Viqao32pj4nj == 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return log(($Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) / $Vr1ojavkhcvo - $Vwsub2gqa12p) / ($Viqao32pj4nj + $Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) / $Vr1ojavkhcvo)) / log(1 + $Vr1ojavkhcvo);
		} else {
			if ($Vj5lhr03uape == 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return (-$Viqao32pj4nj -$Vwsub2gqa12p) / $Vj5lhr03uape;
		}
	}	

	
	public static function NPV() {
		
		$Vbco3t3kne3m = 0;

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$Vr1ojavkhcvo = array_shift($Voojdymxtgs1);
		for ($Vfhiq1lhsoja = 1; $Vfhiq1lhsoja <= count($Voojdymxtgs1); ++$Vfhiq1lhsoja) {
			
			if (is_numeric($Voojdymxtgs1[$Vfhiq1lhsoja - 1])) {
				$Vbco3t3kne3m += $Voojdymxtgs1[$Vfhiq1lhsoja - 1] / pow(1 + $Vr1ojavkhcvo, $Vfhiq1lhsoja);
			}
		}

		
		return $Vbco3t3kne3m;
	}	

	
	public static function PMT($Vr1ojavkhcvo = 0, $V05jjsvwnaix = 0, $Viqao32pj4nj = 0, $Vwsub2gqa12p = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V05jjsvwnaix	= PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vwsub2gqa12p		= PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		if (!is_null($Vr1ojavkhcvo) && $Vr1ojavkhcvo != 0) {
			return (-$Vwsub2gqa12p - $Viqao32pj4nj * pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix)) / (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) / ((pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix) - 1) / $Vr1ojavkhcvo);
		} else {
			return (-$Viqao32pj4nj - $Vwsub2gqa12p) / $V05jjsvwnaix;
		}
	}	


	
	public static function PPMT($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, $Vwsub2gqa12p = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V1zk3a4wt2dk	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dk);
		$V05jjsvwnaix	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vwsub2gqa12p		= PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ($V1zk3a4wt2dk <= 0 || $V1zk3a4wt2dk > $V05jjsvwnaix) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vfhiq1lhsojanterestAndPrincipal = self::_interestAndPrincipal($Vr1ojavkhcvo, $V1zk3a4wt2dk, $V05jjsvwnaix, $Viqao32pj4nj, $Vwsub2gqa12p, $V4pigtpor0ln);
		return $Vfhiq1lhsojanterestAndPrincipal[1];
	}	


	public static function PRICE($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vr1ojavkhcvo, $Vjlho1iklawb, $V5pdffvdplb0, $Vj33ezminife, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vr1ojavkhcvo		= (float) PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vjlho1iklawb		= (float) PHPExcel_Calculation_Functions::flattenSingleValue($Vjlho1iklawb);
		$V5pdffvdplb0	= (float) PHPExcel_Calculation_Functions::flattenSingleValue($V5pdffvdplb0);
		$Vj33ezminife	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vj33ezminife);
		$Vqoj04lmuxow		= (is_null($Vqoj04lmuxow))	? 0 :	(int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		if (is_string($Vyrikbuemxz1 = PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (($Vyrikbuemxz1 > $Vhyq4w4fl55j) ||
			(!self::_validFrequency($Vj33ezminife)) ||
			(($Vqoj04lmuxow < 0) || ($Vqoj04lmuxow > 4))) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Vkdr2hctn0r5 = self::COUPDAYSNC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow);
		$Vnhm0uuykimv = self::COUPDAYS($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow);
		$Vmwwo1qnmepz = self::COUPNUM($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow);
		$Vi3y3l1uvwp3 = self::COUPDAYBS($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vj33ezminife, $Vqoj04lmuxow);

		$Vl2bw2f4qj22	= 1.0 + ($Vjlho1iklawb / $Vj33ezminife);
		$Vpcc1rn3lgnk	= 100 * ($Vr1ojavkhcvo / $Vj33ezminife);
		$Vgcnkvo441yc	= $Vkdr2hctn0r5 / $Vnhm0uuykimv;

		$Vwbpa3giaw5f = $V5pdffvdplb0 / pow($Vl2bw2f4qj22, (--$Vmwwo1qnmepz + $Vgcnkvo441yc));
		for($V51lf1kcbto4 = 0; $V51lf1kcbto4 <= $Vmwwo1qnmepz; ++$V51lf1kcbto4) {
			$Vwbpa3giaw5f += $Vpcc1rn3lgnk / (pow($Vl2bw2f4qj22, ($V51lf1kcbto4 + $Vgcnkvo441yc)));
		}
		$Vwbpa3giaw5f -= $Vpcc1rn3lgnk * ($Vi3y3l1uvwp3 / $Vnhm0uuykimv);

		return $Vwbpa3giaw5f;
	}	


	
	public static function PRICEDISC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vzvupdw4uu3e, $V5pdffvdplb0, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vzvupdw4uu3e	= (float) PHPExcel_Calculation_Functions::flattenSingleValue($Vzvupdw4uu3e);
		$V5pdffvdplb0	= (float) PHPExcel_Calculation_Functions::flattenSingleValue($V5pdffvdplb0);
		$Vqoj04lmuxow		= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vzvupdw4uu3e)) && (is_numeric($V5pdffvdplb0)) && (is_numeric($Vqoj04lmuxow))) {
			if (($Vzvupdw4uu3e <= 0) || ($V5pdffvdplb0 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}

			return $V5pdffvdplb0 * (1 - $Vzvupdw4uu3e * $V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function PRICEMAT($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vfhiq1lhsojassue, $Vr1ojavkhcvo, $Vjlho1iklawb, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vfhiq1lhsojassue		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojassue);
		$Vr1ojavkhcvo		= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vjlho1iklawb		= PHPExcel_Calculation_Functions::flattenSingleValue($Vjlho1iklawb);
		$Vqoj04lmuxow		= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if (is_numeric($Vr1ojavkhcvo) && is_numeric($Vjlho1iklawb)) {
			if (($Vr1ojavkhcvo <= 0) || ($Vjlho1iklawb <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vyrikbuemxz1),$Vqoj04lmuxow);
			if (!is_numeric($Vt0hwcxdxejp)) {
				return $Vt0hwcxdxejp;
			}
			$Vqo1tvxdfarx = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vyrikbuemxz1, $Vqoj04lmuxow);
			if (!is_numeric($Vqo1tvxdfarx)) {
				
				return $Vqo1tvxdfarx;
			}
			$Vqo1tvxdfarx *= $Vt0hwcxdxejp;
			$Vox0lblf5p4r = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($Vox0lblf5p4r)) {
				
				return $Vox0lblf5p4r;
			}
			$Vox0lblf5p4r *= $Vt0hwcxdxejp;
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}
			$V41eospqzwgr *= $Vt0hwcxdxejp;

			return ((100 + (($Vox0lblf5p4r / $Vt0hwcxdxejp) * $Vr1ojavkhcvo * 100)) /
				   (1 + (($V41eospqzwgr / $Vt0hwcxdxejp) * $Vjlho1iklawb)) -
				   (($Vqo1tvxdfarx / $Vt0hwcxdxejp) * $Vr1ojavkhcvo * 100));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function PV($Vr1ojavkhcvo = 0, $V05jjsvwnaix = 0, $Vj5lhr03uape = 0, $Vwsub2gqa12p = 0, $V4pigtpor0ln = 0) {
		$Vr1ojavkhcvo	= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$V05jjsvwnaix	= PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Vj5lhr03uape	= PHPExcel_Calculation_Functions::flattenSingleValue($Vj5lhr03uape);
		$Vwsub2gqa12p		= PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);

		
		if ($V4pigtpor0ln != 0 && $V4pigtpor0ln != 1) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		if (!is_null($Vr1ojavkhcvo) && $Vr1ojavkhcvo != 0) {
			return (-$Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) * ((pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix) - 1) / $Vr1ojavkhcvo) - $Vwsub2gqa12p) / pow(1 + $Vr1ojavkhcvo, $V05jjsvwnaix);
		} else {
			return -$Vwsub2gqa12p - $Vj5lhr03uape * $V05jjsvwnaix;
		}
	}	


	
	public static function RATE($V05jjsvwnaix, $Vj5lhr03uape, $Viqao32pj4nj, $Vwsub2gqa12p = 0.0, $V4pigtpor0ln = 0, $Vdnkef1ydi0l = 0.1) {
		$V05jjsvwnaix	= (int) PHPExcel_Calculation_Functions::flattenSingleValue($V05jjsvwnaix);
		$Vj5lhr03uape	= PHPExcel_Calculation_Functions::flattenSingleValue($Vj5lhr03uape);
		$Viqao32pj4nj		= PHPExcel_Calculation_Functions::flattenSingleValue($Viqao32pj4nj);
		$Vwsub2gqa12p		= (is_null($Vwsub2gqa12p))	? 0.0	:	PHPExcel_Calculation_Functions::flattenSingleValue($Vwsub2gqa12p);
		$V4pigtpor0ln	= (is_null($V4pigtpor0ln))	? 0		:	(int) PHPExcel_Calculation_Functions::flattenSingleValue($V4pigtpor0ln);
		$Vdnkef1ydi0l	= (is_null($Vdnkef1ydi0l))	? 0.1	:	PHPExcel_Calculation_Functions::flattenSingleValue($Vdnkef1ydi0l);

		$Vr1ojavkhcvo = $Vdnkef1ydi0l;
		if (abs($Vr1ojavkhcvo) < FINANCIAL_PRECISION) {
			$Vqwmp2bx0ii2 = $Viqao32pj4nj * (1 + $V05jjsvwnaix * $Vr1ojavkhcvo) + $Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) * $V05jjsvwnaix + $Vwsub2gqa12p;
		} else {
			$Vtbbah5lqvpo = exp($V05jjsvwnaix * log(1 + $Vr1ojavkhcvo));
			$Vqwmp2bx0ii2 = $Viqao32pj4nj * $Vtbbah5lqvpo + $Vj5lhr03uape * (1 / $Vr1ojavkhcvo + $V4pigtpor0ln) * ($Vtbbah5lqvpo - 1) + $Vwsub2gqa12p;
		}
		$Vqwmp2bx0ii20 = $Viqao32pj4nj + $Vj5lhr03uape * $V05jjsvwnaix + $Vwsub2gqa12p;
		$Vqwmp2bx0ii21 = $Viqao32pj4nj * $Vtbbah5lqvpo + $Vj5lhr03uape * (1 / $Vr1ojavkhcvo + $V4pigtpor0ln) * ($Vtbbah5lqvpo - 1) + $Vwsub2gqa12p;

		
		$Vfhiq1lhsoja  = $Vgakxvf4uk1n = 0.0;
		$Vkiv1idvekdh = $Vr1ojavkhcvo;
		while ((abs($Vqwmp2bx0ii20 - $Vqwmp2bx0ii21) > FINANCIAL_PRECISION) && ($Vfhiq1lhsoja < FINANCIAL_MAX_ITERATIONS)) {
			$Vr1ojavkhcvo = ($Vqwmp2bx0ii21 * $Vgakxvf4uk1n - $Vqwmp2bx0ii20 * $Vkiv1idvekdh) / ($Vqwmp2bx0ii21 - $Vqwmp2bx0ii20);
			$Vgakxvf4uk1n = $Vkiv1idvekdh;
			$Vkiv1idvekdh = $Vr1ojavkhcvo;
			if (($V05jjsvwnaix * abs($Vj5lhr03uape)) > ($Viqao32pj4nj - $Vwsub2gqa12p))
				$Vkiv1idvekdh = abs($Vkiv1idvekdh);

			if (abs($Vr1ojavkhcvo) < FINANCIAL_PRECISION) {
				$Vqwmp2bx0ii2 = $Viqao32pj4nj * (1 + $V05jjsvwnaix * $Vr1ojavkhcvo) + $Vj5lhr03uape * (1 + $Vr1ojavkhcvo * $V4pigtpor0ln) * $V05jjsvwnaix + $Vwsub2gqa12p;
			} else {
				$Vtbbah5lqvpo = exp($V05jjsvwnaix * log(1 + $Vr1ojavkhcvo));
				$Vqwmp2bx0ii2 = $Viqao32pj4nj * $Vtbbah5lqvpo + $Vj5lhr03uape * (1 / $Vr1ojavkhcvo + $V4pigtpor0ln) * ($Vtbbah5lqvpo - 1) + $Vwsub2gqa12p;
			}

			$Vqwmp2bx0ii20 = $Vqwmp2bx0ii21;
			$Vqwmp2bx0ii21 = $Vqwmp2bx0ii2;
			++$Vfhiq1lhsoja;
		}
		return $Vr1ojavkhcvo;
	}	


	
	public static function RECEIVED($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vfhiq1lhsojanvestment, $Vzvupdw4uu3e, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vfhiq1lhsojanvestment	= (float) PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojanvestment);
		$Vzvupdw4uu3e	= (float) PHPExcel_Calculation_Functions::flattenSingleValue($Vzvupdw4uu3e);
		$Vqoj04lmuxow		= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if ((is_numeric($Vfhiq1lhsojanvestment)) && (is_numeric($Vzvupdw4uu3e)) && (is_numeric($Vqoj04lmuxow))) {
			if (($Vfhiq1lhsojanvestment <= 0) || ($Vzvupdw4uu3e <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}

			return $Vfhiq1lhsojanvestment / ( 1 - ($Vzvupdw4uu3e * $V41eospqzwgr));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SLN($Viinxuzv3kjq, $Vn4sb1zqzxxu, $Vgazb1jhnsvm) {
		$Viinxuzv3kjq		= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vn4sb1zqzxxu	= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$Vgazb1jhnsvm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vgazb1jhnsvm);

		
		if ((is_numeric($Viinxuzv3kjq)) && (is_numeric($Vn4sb1zqzxxu)) && (is_numeric($Vgazb1jhnsvm))) {
			if ($Vgazb1jhnsvm < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return ($Viinxuzv3kjq - $Vn4sb1zqzxxu) / $Vgazb1jhnsvm;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SYD($Viinxuzv3kjq, $Vn4sb1zqzxxu, $Vgazb1jhnsvm, $V1zk3a4wt2dkiod) {
		$Viinxuzv3kjq		= PHPExcel_Calculation_Functions::flattenSingleValue($Viinxuzv3kjq);
		$Vn4sb1zqzxxu	= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4sb1zqzxxu);
		$Vgazb1jhnsvm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vgazb1jhnsvm);
		$V1zk3a4wt2dkiod		= PHPExcel_Calculation_Functions::flattenSingleValue($V1zk3a4wt2dkiod);

		
		if ((is_numeric($Viinxuzv3kjq)) && (is_numeric($Vn4sb1zqzxxu)) && (is_numeric($Vgazb1jhnsvm)) && (is_numeric($V1zk3a4wt2dkiod))) {
			if (($Vgazb1jhnsvm < 1) || ($V1zk3a4wt2dkiod > $Vgazb1jhnsvm)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return (($Viinxuzv3kjq - $Vn4sb1zqzxxu) * ($Vgazb1jhnsvm - $V1zk3a4wt2dkiod + 1) * 2) / ($Vgazb1jhnsvm * ($Vgazb1jhnsvm + 1));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function TBILLEQ($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vzvupdw4uu3e) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vzvupdw4uu3e	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzvupdw4uu3e);

		
		$V41nfkbsz42i = self::TBILLPRICE($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vzvupdw4uu3e);
		if (is_string($V41nfkbsz42i)) {
			return $V41nfkbsz42i;
		}

		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
			++$Vhyq4w4fl55j;
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j) * 360;
		} else {
			$V41eospqzwgr = (PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j) - PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1));
		}

		return (365 * $Vzvupdw4uu3e) / (360 - $Vzvupdw4uu3e * $V41eospqzwgr);
	}	


	
	public static function TBILLPRICE($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vzvupdw4uu3e) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vzvupdw4uu3e	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzvupdw4uu3e);

		if (is_string($Vhyq4w4fl55j = PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		if (is_numeric($Vzvupdw4uu3e)) {
			if ($Vzvupdw4uu3e <= 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				++$Vhyq4w4fl55j;
				$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j) * 360;
				if (!is_numeric($V41eospqzwgr)) {
					
					return $V41eospqzwgr;
				}
			} else {
				$V41eospqzwgr = (PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j) - PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1));
			}

			if ($V41eospqzwgr > 360) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			$Vf5ay5d1jwfm = 100 * (1 - (($Vzvupdw4uu3e * $V41eospqzwgr) / 360));
			if ($Vf5ay5d1jwfm <= 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return $Vf5ay5d1jwfm;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function TBILLYIELD($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vf5ay5d1jwfm) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vf5ay5d1jwfm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vf5ay5d1jwfm);

		
		if (is_numeric($Vf5ay5d1jwfm)) {
			if ($Vf5ay5d1jwfm <= 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				++$Vhyq4w4fl55j;
				$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j) * 360;
				if (!is_numeric($V41eospqzwgr)) {
					
					return $V41eospqzwgr;
				}
			} else {
				$V41eospqzwgr = (PHPExcel_Calculation_DateTime::_getDateValue($Vhyq4w4fl55j) - PHPExcel_Calculation_DateTime::_getDateValue($Vyrikbuemxz1));
			}

			if ($V41eospqzwgr > 360) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			return ((100 - $Vf5ay5d1jwfm) / $Vf5ay5d1jwfm) * (360 / $V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	public static function XIRR($Vmbklynu3i2z, $V0qwpcpsgt1r, $Vdnkef1ydi0l = 0.1) {
		if ((!is_array($Vmbklynu3i2z)) && (!is_array($V0qwpcpsgt1r))) return PHPExcel_Calculation_Functions::VALUE();
		$Vmbklynu3i2z	= PHPExcel_Calculation_Functions::flattenArray($Vmbklynu3i2z);
		$V0qwpcpsgt1r	= PHPExcel_Calculation_Functions::flattenArray($V0qwpcpsgt1r);
		$Vdnkef1ydi0l = PHPExcel_Calculation_Functions::flattenSingleValue($Vdnkef1ydi0l);
		if (count($Vmbklynu3i2z) != count($V0qwpcpsgt1r)) return PHPExcel_Calculation_Functions::NaN();

		
		$Vkiv1idvekdh = 0.0;
		$Vbbuqfp0xqjj = $Vdnkef1ydi0l;
		$Vghf0bdjit22 = self::XNPV($Vkiv1idvekdh, $Vmbklynu3i2z, $V0qwpcpsgt1r);
		$Vorb41dfrszd = self::XNPV($Vbbuqfp0xqjj, $Vmbklynu3i2z, $V0qwpcpsgt1r);
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < FINANCIAL_MAX_ITERATIONS; ++$Vfhiq1lhsoja) {
			if (($Vghf0bdjit22 * $Vorb41dfrszd) < 0.0) break;
			if (abs($Vghf0bdjit22) < abs($Vorb41dfrszd)) {
				$Vghf0bdjit22 = self::XNPV($Vkiv1idvekdh += 1.6 * ($Vkiv1idvekdh - $Vbbuqfp0xqjj), $Vmbklynu3i2z, $V0qwpcpsgt1r);
			} else {
				$Vorb41dfrszd = self::XNPV($Vbbuqfp0xqjj += 1.6 * ($Vbbuqfp0xqjj - $Vkiv1idvekdh), $Vmbklynu3i2z, $V0qwpcpsgt1r);
			}
		}
		if (($Vghf0bdjit22 * $Vorb41dfrszd) > 0.0) return PHPExcel_Calculation_Functions::VALUE();

		$Vtbbah5lqvpo = self::XNPV($Vkiv1idvekdh, $Vmbklynu3i2z, $V0qwpcpsgt1r);
		if ($Vtbbah5lqvpo < 0.0) {
			$V5xpy2umw3e2 = $Vkiv1idvekdh;
			$Vcxaujbeexic = $Vbbuqfp0xqjj - $Vkiv1idvekdh;
		} else {
			$V5xpy2umw3e2 = $Vbbuqfp0xqjj;
			$Vcxaujbeexic = $Vkiv1idvekdh - $Vbbuqfp0xqjj;
		}

		for ($Vfhiq1lhsoja = 0;  $Vfhiq1lhsoja < FINANCIAL_MAX_ITERATIONS; ++$Vfhiq1lhsoja) {
			$Vcxaujbeexic *= 0.5;
			$Vrbihy32cnrc = $V5xpy2umw3e2 + $Vcxaujbeexic;
			$Vtbbah5lqvpo_mid = self::XNPV($Vrbihy32cnrc, $Vmbklynu3i2z, $V0qwpcpsgt1r);
			if ($Vtbbah5lqvpo_mid <= 0.0) $V5xpy2umw3e2 = $Vrbihy32cnrc;
			if ((abs($Vtbbah5lqvpo_mid) < FINANCIAL_PRECISION) || (abs($Vcxaujbeexic) < FINANCIAL_PRECISION)) return $Vrbihy32cnrc;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}


	
	public static function XNPV($Vr1ojavkhcvo, $Vmbklynu3i2z, $V0qwpcpsgt1r) {
		$Vr1ojavkhcvo = PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		if (!is_numeric($Vr1ojavkhcvo)) return PHPExcel_Calculation_Functions::VALUE();
		if ((!is_array($Vmbklynu3i2z)) || (!is_array($V0qwpcpsgt1r))) return PHPExcel_Calculation_Functions::VALUE();
		$Vmbklynu3i2z	= PHPExcel_Calculation_Functions::flattenArray($Vmbklynu3i2z);
		$V0qwpcpsgt1r	= PHPExcel_Calculation_Functions::flattenArray($V0qwpcpsgt1r);
		$Vf1kwqxxhqpzalCount = count($Vmbklynu3i2z);
		if ($Vf1kwqxxhqpzalCount != count($V0qwpcpsgt1r)) return PHPExcel_Calculation_Functions::NaN();
		if ((min($Vmbklynu3i2z) > 0) || (max($Vmbklynu3i2z) < 0)) return PHPExcel_Calculation_Functions::VALUE();

		$V43itqr2pf4u = 0.0;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vf1kwqxxhqpzalCount; ++$Vfhiq1lhsoja) {
			if (!is_numeric($Vmbklynu3i2z[$Vfhiq1lhsoja])) return PHPExcel_Calculation_Functions::VALUE();
			$V43itqr2pf4u += $Vmbklynu3i2z[$Vfhiq1lhsoja] / pow(1 + $Vr1ojavkhcvo, PHPExcel_Calculation_DateTime::DATEDIF($V0qwpcpsgt1r[0],$V0qwpcpsgt1r[$Vfhiq1lhsoja],'d') / 365);
		}
		return (is_finite($V43itqr2pf4u)) ? $V43itqr2pf4u : PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function YIELDDISC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vf5ay5d1jwfm, $V5pdffvdplb0, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vf5ay5d1jwfm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vf5ay5d1jwfm);
		$V5pdffvdplb0	= PHPExcel_Calculation_Functions::flattenSingleValue($V5pdffvdplb0);
		$Vqoj04lmuxow		= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if (is_numeric($Vf5ay5d1jwfm) && is_numeric($V5pdffvdplb0)) {
			if (($Vf5ay5d1jwfm <= 0) || ($V5pdffvdplb0 <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vyrikbuemxz1),$Vqoj04lmuxow);
			if (!is_numeric($Vt0hwcxdxejp)) {
				return $Vt0hwcxdxejp;
			}
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j,$Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}
			$V41eospqzwgr *= $Vt0hwcxdxejp;

			return (($V5pdffvdplb0 - $Vf5ay5d1jwfm) / $Vf5ay5d1jwfm) * ($Vt0hwcxdxejp / $V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function YIELDMAT($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vfhiq1lhsojassue, $Vr1ojavkhcvo, $Vf5ay5d1jwfm, $Vqoj04lmuxow=0) {
		$Vyrikbuemxz1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vyrikbuemxz1);
		$Vhyq4w4fl55j	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhyq4w4fl55j);
		$Vfhiq1lhsojassue		= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojassue);
		$Vr1ojavkhcvo		= PHPExcel_Calculation_Functions::flattenSingleValue($Vr1ojavkhcvo);
		$Vf5ay5d1jwfm		= PHPExcel_Calculation_Functions::flattenSingleValue($Vf5ay5d1jwfm);
		$Vqoj04lmuxow		= (int) PHPExcel_Calculation_Functions::flattenSingleValue($Vqoj04lmuxow);

		
		if (is_numeric($Vr1ojavkhcvo) && is_numeric($Vf5ay5d1jwfm)) {
			if (($Vr1ojavkhcvo <= 0) || ($Vf5ay5d1jwfm <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt0hwcxdxejp = self::_daysPerYear(PHPExcel_Calculation_DateTime::YEAR($Vyrikbuemxz1),$Vqoj04lmuxow);
			if (!is_numeric($Vt0hwcxdxejp)) {
				return $Vt0hwcxdxejp;
			}
			$Vqo1tvxdfarx = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vyrikbuemxz1, $Vqoj04lmuxow);
			if (!is_numeric($Vqo1tvxdfarx)) {
				
				return $Vqo1tvxdfarx;
			}
			$Vqo1tvxdfarx *= $Vt0hwcxdxejp;
			$Vox0lblf5p4r = PHPExcel_Calculation_DateTime::YEARFRAC($Vfhiq1lhsojassue, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($Vox0lblf5p4r)) {
				
				return $Vox0lblf5p4r;
			}
			$Vox0lblf5p4r *= $Vt0hwcxdxejp;
			$V41eospqzwgr = PHPExcel_Calculation_DateTime::YEARFRAC($Vyrikbuemxz1, $Vhyq4w4fl55j, $Vqoj04lmuxow);
			if (!is_numeric($V41eospqzwgr)) {
				
				return $V41eospqzwgr;
			}
			$V41eospqzwgr *= $Vt0hwcxdxejp;

			return ((1 + (($Vox0lblf5p4r / $Vt0hwcxdxejp) * $Vr1ojavkhcvo) - (($Vf5ay5d1jwfm / 100) + (($Vqo1tvxdfarx / $Vt0hwcxdxejp) * $Vr1ojavkhcvo))) /
				   (($Vf5ay5d1jwfm / 100) + (($Vqo1tvxdfarx / $Vt0hwcxdxejp) * $Vr1ojavkhcvo))) *
				   ($Vt0hwcxdxejp / $V41eospqzwgr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	

}	
