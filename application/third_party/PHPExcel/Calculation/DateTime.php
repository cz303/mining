<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_DateTime {

	
	public static function _isLeapYear($Vz2lhrjd1jk2) {
		return ((($Vz2lhrjd1jk2 % 4) == 0) && (($Vz2lhrjd1jk2 % 100) != 0) || (($Vz2lhrjd1jk2 % 400) == 0));
	}	


	
	private static function _dateDiff360($Vuk14rand3cm, $Vupptggtheo1, $Vjliv5i5ldjv, $Vq5thmkqixtr, $Vgpecmccnh0e, $Vnbqgm4uz1yb, $Vrhkrij1hu4c) {
		if ($Vuk14rand3cm == 31) {
			--$Vuk14rand3cm;
		} elseif ($Vrhkrij1hu4c && ($Vupptggtheo1 == 2 && ($Vuk14rand3cm == 29 || ($Vuk14rand3cm == 28 && !self::_isLeapYear($Vjliv5i5ldjv))))) {
			$Vuk14rand3cm = 30;
		}
		if ($Vq5thmkqixtr == 31) {
			if ($Vrhkrij1hu4c && $Vuk14rand3cm != 30) {
				$Vq5thmkqixtr = 1;
				if ($Vgpecmccnh0e == 12) {
					++$Vnbqgm4uz1yb;
					$Vgpecmccnh0e = 1;
				} else {
					++$Vgpecmccnh0e;
				}
			} else {
				$Vq5thmkqixtr = 30;
			}
		}

		return $Vq5thmkqixtr + $Vgpecmccnh0e * 30 + $Vnbqgm4uz1yb * 360 - $Vuk14rand3cm - $Vupptggtheo1 * 30 - $Vjliv5i5ldjv * 360;
	}	


	
	public static function _getDateValue($Vtpwoe0nuvf4) {
		if (!is_numeric($Vtpwoe0nuvf4)) {
			if ((is_string($Vtpwoe0nuvf4)) &&
				(PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
			if ((is_object($Vtpwoe0nuvf4)) && ($Vtpwoe0nuvf4 instanceof DateTime)) {
				$Vtpwoe0nuvf4 = PHPExcel_Shared_Date::PHPToExcel($Vtpwoe0nuvf4);
			} else {
				$Vg43we2dygxm = PHPExcel_Calculation_Functions::getReturnDateType();
				PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
				$Vtpwoe0nuvf4 = self::DATEVALUE($Vtpwoe0nuvf4);
				PHPExcel_Calculation_Functions::setReturnDateType($Vg43we2dygxm);
			}
		}
		return $Vtpwoe0nuvf4;
	}	


	
	private static function _getTimeValue($Veovj3illlra) {
		$Vg43we2dygxm = PHPExcel_Calculation_Functions::getReturnDateType();
		PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
		$Veovj3illlra = self::TIMEVALUE($Veovj3illlra);
		PHPExcel_Calculation_Functions::setReturnDateType($Vg43we2dygxm);
		return $Veovj3illlra;
	}	


	private static function _adjustDateByMonths($Vtpwoe0nuvf4 = 0, $Vqfk2p5e1wi0 = 0) {
		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);
		$Vk3yjuvucheu = (int) $Vwnpsdwc5eyw->format('m');
		$Vdatoipgwfrm = (int) $Vwnpsdwc5eyw->format('Y');

		$Vqfk2p5e1wi0String = (string) $Vqfk2p5e1wi0;
		if ($Vqfk2p5e1wi0 > 0) {
			$Vqfk2p5e1wi0String = '+'.$Vqfk2p5e1wi0;
		}
		if ($Vqfk2p5e1wi0 != 0) {
			$Vwnpsdwc5eyw->modify($Vqfk2p5e1wi0String.' months');
		}
		$Vs5mv4wanfon = (int) $Vwnpsdwc5eyw->format('m');
		$Vjjmku0u14uf = (int) $Vwnpsdwc5eyw->format('Y');

		$V1uoip3ymvwd = ($Vs5mv4wanfon - $Vk3yjuvucheu) + (($Vjjmku0u14uf - $Vdatoipgwfrm) * 12);
		if ($V1uoip3ymvwd != $Vqfk2p5e1wi0) {
			$Vhwjhym0xx0o = (int) $Vwnpsdwc5eyw->format('d');
			$Vhwjhym0xx0oString = '-'.$Vhwjhym0xx0o.' days';
			$Vwnpsdwc5eyw->modify($Vhwjhym0xx0oString);
		}
		return $Vwnpsdwc5eyw;
	}	


	
	public static function DATETIMENOW() {
		$Vkzkv5l2oau4 = date_default_timezone_get();
		date_default_timezone_set('UTC');
		$Vvungffnkeyj = False;
		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					$Vvungffnkeyj = (float) PHPExcel_Shared_Date::PHPToExcel(time());
					break;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					$Vvungffnkeyj = (integer) time();
					break;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					$Vvungffnkeyj = new DateTime();
					break;
		}
		date_default_timezone_set($Vkzkv5l2oau4);

		return $Vvungffnkeyj;
	}	


	
	public static function DATENOW() {
		$Vkzkv5l2oau4 = date_default_timezone_get();
		date_default_timezone_set('UTC');
		$Vvungffnkeyj = False;
		$V1rfsur0qs1z = floor(PHPExcel_Shared_Date::PHPToExcel(time()));
		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					$Vvungffnkeyj = (float) $V1rfsur0qs1z;
					break;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					$Vvungffnkeyj = (integer) PHPExcel_Shared_Date::ExcelToPHP($V1rfsur0qs1z);
					break;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					$Vvungffnkeyj = PHPExcel_Shared_Date::ExcelToPHPObject($V1rfsur0qs1z);
					break;
		}
		date_default_timezone_set($Vkzkv5l2oau4);

		return $Vvungffnkeyj;
	}	


	
	public static function DATE($Vz2lhrjd1jk2 = 0, $Vbylkx0shw01 = 1, $Vdinjot5db2l = 1) {
		$Vz2lhrjd1jk2	= PHPExcel_Calculation_Functions::flattenSingleValue($Vz2lhrjd1jk2);
		$Vbylkx0shw01	= PHPExcel_Calculation_Functions::flattenSingleValue($Vbylkx0shw01);
		$Vdinjot5db2l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vdinjot5db2l);

		if (($Vbylkx0shw01 !== NULL) && (!is_numeric($Vbylkx0shw01))) {
            $Vbylkx0shw01 = PHPExcel_Shared_Date::monthStringToNumber($Vbylkx0shw01);
		}

		if (($Vdinjot5db2l !== NULL) && (!is_numeric($Vdinjot5db2l))) {
            $Vdinjot5db2l = PHPExcel_Shared_Date::dayStringToNumber($Vdinjot5db2l);
		}

		$Vz2lhrjd1jk2	= ($Vz2lhrjd1jk2 !== NULL)	? PHPExcel_Shared_String::testStringAsNumeric($Vz2lhrjd1jk2) : 0;
		$Vbylkx0shw01	= ($Vbylkx0shw01 !== NULL)	? PHPExcel_Shared_String::testStringAsNumeric($Vbylkx0shw01) : 0;
		$Vdinjot5db2l	= ($Vdinjot5db2l !== NULL)	? PHPExcel_Shared_String::testStringAsNumeric($Vdinjot5db2l) : 0;
		if ((!is_numeric($Vz2lhrjd1jk2)) ||
			(!is_numeric($Vbylkx0shw01)) ||
			(!is_numeric($Vdinjot5db2l))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vz2lhrjd1jk2	= (integer) $Vz2lhrjd1jk2;
		$Vbylkx0shw01	= (integer) $Vbylkx0shw01;
		$Vdinjot5db2l	= (integer) $Vdinjot5db2l;

		$Vcrydawkztaw = PHPExcel_Shared_Date::getExcelCalendar();
		
		if ($Vz2lhrjd1jk2 < ($Vcrydawkztaw-1900)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		if ((($Vcrydawkztaw-1900) != 0) && ($Vz2lhrjd1jk2 < $Vcrydawkztaw) && ($Vz2lhrjd1jk2 >= 1900)) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		if (($Vz2lhrjd1jk2 < $Vcrydawkztaw) && ($Vz2lhrjd1jk2 >= ($Vcrydawkztaw-1900))) {
			$Vz2lhrjd1jk2 += 1900;
		}

		if ($Vbylkx0shw01 < 1) {
			
			--$Vbylkx0shw01;
			$Vz2lhrjd1jk2 += ceil($Vbylkx0shw01 / 12) - 1;
			$Vbylkx0shw01 = 13 - abs($Vbylkx0shw01 % 12);
		} elseif ($Vbylkx0shw01 > 12) {
			
			$Vz2lhrjd1jk2 += floor($Vbylkx0shw01 / 12);
			$Vbylkx0shw01 = ($Vbylkx0shw01 % 12);
		}

		
		if (($Vz2lhrjd1jk2 < $Vcrydawkztaw) || ($Vz2lhrjd1jk2 >= 10000)) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Ve3i2kaeqzvo = PHPExcel_Shared_Date::FormattedPHPToExcel($Vz2lhrjd1jk2, $Vbylkx0shw01, $Vdinjot5db2l);
		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					return (float) $Ve3i2kaeqzvo;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					return (integer) PHPExcel_Shared_Date::ExcelToPHP($Ve3i2kaeqzvo);
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					return PHPExcel_Shared_Date::ExcelToPHPObject($Ve3i2kaeqzvo);
		}
	}	


	
	public static function TIME($V1uwpilwqlrf = 0, $Vldquerppd43 = 0, $Vupadstox0qa = 0) {
		$V1uwpilwqlrf	= PHPExcel_Calculation_Functions::flattenSingleValue($V1uwpilwqlrf);
		$Vldquerppd43	= PHPExcel_Calculation_Functions::flattenSingleValue($Vldquerppd43);
		$Vupadstox0qa	= PHPExcel_Calculation_Functions::flattenSingleValue($Vupadstox0qa);

		if ($V1uwpilwqlrf == '') { $V1uwpilwqlrf = 0; }
		if ($Vldquerppd43 == '') { $Vldquerppd43 = 0; }
		if ($Vupadstox0qa == '') { $Vupadstox0qa = 0; }

		if ((!is_numeric($V1uwpilwqlrf)) || (!is_numeric($Vldquerppd43)) || (!is_numeric($Vupadstox0qa))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$V1uwpilwqlrf	= (integer) $V1uwpilwqlrf;
		$Vldquerppd43	= (integer) $Vldquerppd43;
		$Vupadstox0qa	= (integer) $Vupadstox0qa;

		if ($Vupadstox0qa < 0) {
			$Vldquerppd43 += floor($Vupadstox0qa / 60);
			$Vupadstox0qa = 60 - abs($Vupadstox0qa % 60);
			if ($Vupadstox0qa == 60) { $Vupadstox0qa = 0; }
		} elseif ($Vupadstox0qa >= 60) {
			$Vldquerppd43 += floor($Vupadstox0qa / 60);
			$Vupadstox0qa = $Vupadstox0qa % 60;
		}
		if ($Vldquerppd43 < 0) {
			$V1uwpilwqlrf += floor($Vldquerppd43 / 60);
			$Vldquerppd43 = 60 - abs($Vldquerppd43 % 60);
			if ($Vldquerppd43 == 60) { $Vldquerppd43 = 0; }
		} elseif ($Vldquerppd43 >= 60) {
			$V1uwpilwqlrf += floor($Vldquerppd43 / 60);
			$Vldquerppd43 = $Vldquerppd43 % 60;
		}

		if ($V1uwpilwqlrf > 23) {
			$V1uwpilwqlrf = $V1uwpilwqlrf % 24;
		} elseif ($V1uwpilwqlrf < 0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					$Vaxg5pf4dhts = 0;
					$V0vph43ksfrw = PHPExcel_Shared_Date::getExcelCalendar();
					if ($V0vph43ksfrw != PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900) {
						$Vaxg5pf4dhts = 1;
					}
					return (float) PHPExcel_Shared_Date::FormattedPHPToExcel($V0vph43ksfrw, 1, $Vaxg5pf4dhts, $V1uwpilwqlrf, $Vldquerppd43, $Vupadstox0qa);
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					return (integer) PHPExcel_Shared_Date::ExcelToPHP(PHPExcel_Shared_Date::FormattedPHPToExcel(1970, 1, 1, $V1uwpilwqlrf, $Vldquerppd43, $Vupadstox0qa));	
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					$Vdinjot5db2lAdjust = 0;
					if ($V1uwpilwqlrf < 0) {
						$Vdinjot5db2lAdjust = floor($V1uwpilwqlrf / 24);
						$V1uwpilwqlrf = 24 - abs($V1uwpilwqlrf % 24);
						if ($V1uwpilwqlrf == 24) { $V1uwpilwqlrf = 0; }
					} elseif ($V1uwpilwqlrf >= 24) {
						$Vdinjot5db2lAdjust = floor($V1uwpilwqlrf / 24);
						$V1uwpilwqlrf = $V1uwpilwqlrf % 24;
					}
					$Vt22hoogfrdk = new DateTime('1900-01-01 '.$V1uwpilwqlrf.':'.$Vldquerppd43.':'.$Vupadstox0qa);
					if ($Vdinjot5db2lAdjust != 0) {
						$Vt22hoogfrdk->modify($Vdinjot5db2lAdjust.' days');
					}
					return $Vt22hoogfrdk;
		}
	}	


	
	public static function DATEVALUE($Vtpwoe0nuvf4 = 1) {
		$Vtpwoe0nuvf4 = trim(PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4),'"');
		
		$Vtpwoe0nuvf4 = preg_replace('/(\d)(st|nd|rd|th)([ -\/])/Ui','$1$3',$Vtpwoe0nuvf4);
		
		$Vtpwoe0nuvf4	= str_replace(array('/','.','-','  '),array(' ',' ',' ',' '),$Vtpwoe0nuvf4);

		$Vz2lhrjd1jk2Found = false;
		$Vbat5dnfapxb = explode(' ',$Vtpwoe0nuvf4);
		foreach($Vbat5dnfapxb as &$Veca2om3awug) {
			if ((is_numeric($Veca2om3awug)) && ($Veca2om3awug > 31)) {
				if ($Vz2lhrjd1jk2Found) {
					return PHPExcel_Calculation_Functions::VALUE();
				} else {
					if ($Veca2om3awug < 100) { $Veca2om3awug += 1900; }
					$Vz2lhrjd1jk2Found = true;
				}
			}
		}
		if ((count($Vbat5dnfapxb) == 1) && (strpos($Veca2om3awug,':') != false)) {
			
			return 0.0;
		} elseif (count($Vbat5dnfapxb) == 2) {
			
			if ($Vz2lhrjd1jk2Found) {
				array_unshift($Vbat5dnfapxb,1);
			} else {
				array_push($Vbat5dnfapxb,date('Y'));
			}
		}
		unset($Veca2om3awug);
		$Vtpwoe0nuvf4 = implode(' ',$Vbat5dnfapxb);

		$Vx5fiulcfzsx = date_parse($Vtpwoe0nuvf4);
		if (($Vx5fiulcfzsx === False) || ($Vx5fiulcfzsx['error_count'] > 0)) {
			$Veca2om3awugestVal1 = strtok($Vtpwoe0nuvf4,'- ');
			if ($Veca2om3awugestVal1 !== False) {
				$Veca2om3awugestVal2 = strtok('- ');
				if ($Veca2om3awugestVal2 !== False) {
					$Veca2om3awugestVal3 = strtok('- ');
					if ($Veca2om3awugestVal3 === False) {
						$Veca2om3awugestVal3 = strftime('%Y');
					}
				} else {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
			$Vx5fiulcfzsx = date_parse($Veca2om3awugestVal1.'-'.$Veca2om3awugestVal2.'-'.$Veca2om3awugestVal3);
			if (($Vx5fiulcfzsx === False) || ($Vx5fiulcfzsx['error_count'] > 0)) {
				$Vx5fiulcfzsx = date_parse($Veca2om3awugestVal2.'-'.$Veca2om3awugestVal1.'-'.$Veca2om3awugestVal3);
				if (($Vx5fiulcfzsx === False) || ($Vx5fiulcfzsx['error_count'] > 0)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			}
		}

		if (($Vx5fiulcfzsx !== False) && ($Vx5fiulcfzsx['error_count'] == 0)) {
			
			if ($Vx5fiulcfzsx['year'] == '')	{ $Vx5fiulcfzsx['year'] = strftime('%Y'); }
			if ($Vx5fiulcfzsx['year'] < 1900)
				return PHPExcel_Calculation_Functions::VALUE();
			if ($Vx5fiulcfzsx['month'] == '')	{ $Vx5fiulcfzsx['month'] = strftime('%m'); }
			if ($Vx5fiulcfzsx['day'] == '')		{ $Vx5fiulcfzsx['day'] = strftime('%d'); }
			$Ve3i2kaeqzvo = floor(PHPExcel_Shared_Date::FormattedPHPToExcel($Vx5fiulcfzsx['year'],$Vx5fiulcfzsx['month'],$Vx5fiulcfzsx['day'],$Vx5fiulcfzsx['hour'],$Vx5fiulcfzsx['minute'],$Vx5fiulcfzsx['second']));

			switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
				case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
						return (float) $Ve3i2kaeqzvo;
				case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
						return (integer) PHPExcel_Shared_Date::ExcelToPHP($Ve3i2kaeqzvo);
				case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
						return new DateTime($Vx5fiulcfzsx['year'].'-'.$Vx5fiulcfzsx['month'].'-'.$Vx5fiulcfzsx['day'].' 00:00:00');
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function TIMEVALUE($Veovj3illlra) {
		$Veovj3illlra = trim(PHPExcel_Calculation_Functions::flattenSingleValue($Veovj3illlra),'"');
		$Veovj3illlra	= str_replace(array('/','.'),array('-','-'),$Veovj3illlra);

		$Vx5fiulcfzsx = date_parse($Veovj3illlra);
		if (($Vx5fiulcfzsx !== False) && ($Vx5fiulcfzsx['error_count'] == 0)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE) {
				$Ve3i2kaeqzvo = PHPExcel_Shared_Date::FormattedPHPToExcel($Vx5fiulcfzsx['year'],$Vx5fiulcfzsx['month'],$Vx5fiulcfzsx['day'],$Vx5fiulcfzsx['hour'],$Vx5fiulcfzsx['minute'],$Vx5fiulcfzsx['second']);
			} else {
				$Ve3i2kaeqzvo = PHPExcel_Shared_Date::FormattedPHPToExcel(1900,1,1,$Vx5fiulcfzsx['hour'],$Vx5fiulcfzsx['minute'],$Vx5fiulcfzsx['second']) - 1;
			}

			switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
				case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
						return (float) $Ve3i2kaeqzvo;
				case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
						return (integer) $Vpcuoytu2sn5 = PHPExcel_Shared_Date::ExcelToPHP($Ve3i2kaeqzvo+25569) - 3600;;
				case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
						return new DateTime('1900-01-01 '.$Vx5fiulcfzsx['hour'].':'.$Vx5fiulcfzsx['minute'].':'.$Vx5fiulcfzsx['second']);
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function DATEDIF($Vhzv5gcxnjvf = 0, $Vekuqpnaiczg = 0, $V2kadilktlqg = 'D') {
		$Vhzv5gcxnjvf	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhzv5gcxnjvf);
		$Vekuqpnaiczg	= PHPExcel_Calculation_Functions::flattenSingleValue($Vekuqpnaiczg);
		$V2kadilktlqg		= strtoupper(PHPExcel_Calculation_Functions::flattenSingleValue($V2kadilktlqg));

		if (is_string($Vhzv5gcxnjvf = self::_getDateValue($Vhzv5gcxnjvf))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vekuqpnaiczg = self::_getDateValue($Vekuqpnaiczg))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		if ($Vhzv5gcxnjvf >= $Vekuqpnaiczg) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vtwmma20ztmc = $Vekuqpnaiczg - $Vhzv5gcxnjvf;

		$V2qoms4p2iro = PHPExcel_Shared_Date::ExcelToPHPObject($Vhzv5gcxnjvf);
		$Vuk14rand3cms = $V2qoms4p2iro->format('j');
		$Vupptggtheo1s = $V2qoms4p2iro->format('n');
		$Vjliv5i5ldjvs = $V2qoms4p2iro->format('Y');

		$Vnxwkcdrf2dp = PHPExcel_Shared_Date::ExcelToPHPObject($Vekuqpnaiczg);
		$Vq5thmkqixtrs = $Vnxwkcdrf2dp->format('j');
		$Vgpecmccnh0es = $Vnxwkcdrf2dp->format('n');
		$Vnbqgm4uz1ybs = $Vnxwkcdrf2dp->format('Y');

		$Vrz0rq2pgagr = PHPExcel_Calculation_Functions::NaN();
		switch ($V2kadilktlqg) {
			case 'D':
				$Vrz0rq2pgagr = intval($Vtwmma20ztmc);
				break;
			case 'M':
				$Vrz0rq2pgagr = intval($Vgpecmccnh0es - $Vupptggtheo1s) + (intval($Vnbqgm4uz1ybs - $Vjliv5i5ldjvs) * 12);
				
				if ($Vq5thmkqixtrs < $Vuk14rand3cms) {
					--$Vrz0rq2pgagr;
				}
				break;
			case 'Y':
				$Vrz0rq2pgagr = intval($Vnbqgm4uz1ybs - $Vjliv5i5ldjvs);
				
				if ($Vgpecmccnh0es < $Vupptggtheo1s) {
					--$Vrz0rq2pgagr;
				} elseif (($Vgpecmccnh0es == $Vupptggtheo1s) && ($Vq5thmkqixtrs < $Vuk14rand3cms)) {
					--$Vrz0rq2pgagr;
				}
				break;
			case 'MD':
				if ($Vq5thmkqixtrs < $Vuk14rand3cms) {
					$Vrz0rq2pgagr = $Vq5thmkqixtrs;
					$Vnxwkcdrf2dp->modify('-'.$Vq5thmkqixtrs.' days');
					$Vhwjhym0xx0o = $Vnxwkcdrf2dp->format('j');
					if ($Vhwjhym0xx0o > $Vuk14rand3cms) {
						$Vrz0rq2pgagr += ($Vhwjhym0xx0o - $Vuk14rand3cms);
					}
				} else {
					$Vrz0rq2pgagr = $Vq5thmkqixtrs - $Vuk14rand3cms;
				}
				break;
			case 'YM':
				$Vrz0rq2pgagr = intval($Vgpecmccnh0es - $Vupptggtheo1s);
				if ($Vrz0rq2pgagr < 0) $Vrz0rq2pgagr = 12 + $Vrz0rq2pgagr;
				
				if ($Vq5thmkqixtrs < $Vuk14rand3cms) {
					--$Vrz0rq2pgagr;
				}
				break;
			case 'YD':
				$Vrz0rq2pgagr = intval($Vtwmma20ztmc);
				if ($Vnbqgm4uz1ybs > $Vjliv5i5ldjvs) {
					while ($Vnbqgm4uz1ybs > $Vjliv5i5ldjvs) {
						$Vnxwkcdrf2dp->modify('-1 year');
						$Vnbqgm4uz1ybs = $Vnxwkcdrf2dp->format('Y');
					}
					$Vrz0rq2pgagr = $Vnxwkcdrf2dp->format('z') - $V2qoms4p2iro->format('z');
					if ($Vrz0rq2pgagr < 0) { $Vrz0rq2pgagr += 365; }
				}
				break;
			default:
				$Vrz0rq2pgagr = PHPExcel_Calculation_Functions::NaN();
		}
		return $Vrz0rq2pgagr;
	}	


	
	public static function DAYS360($Vhzv5gcxnjvf = 0, $Vekuqpnaiczg = 0, $Vihjcs2gfuz0 = false) {
		$Vhzv5gcxnjvf	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhzv5gcxnjvf);
		$Vekuqpnaiczg	= PHPExcel_Calculation_Functions::flattenSingleValue($Vekuqpnaiczg);

		if (is_string($Vhzv5gcxnjvf = self::_getDateValue($Vhzv5gcxnjvf))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vekuqpnaiczg = self::_getDateValue($Vekuqpnaiczg))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (!is_bool($Vihjcs2gfuz0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$V2qoms4p2iro = PHPExcel_Shared_Date::ExcelToPHPObject($Vhzv5gcxnjvf);
		$Vuk14rand3cm = $V2qoms4p2iro->format('j');
		$Vupptggtheo1 = $V2qoms4p2iro->format('n');
		$Vjliv5i5ldjv = $V2qoms4p2iro->format('Y');

		$Vnxwkcdrf2dp = PHPExcel_Shared_Date::ExcelToPHPObject($Vekuqpnaiczg);
		$Vq5thmkqixtr = $Vnxwkcdrf2dp->format('j');
		$Vgpecmccnh0e = $Vnxwkcdrf2dp->format('n');
		$Vnbqgm4uz1yb = $Vnxwkcdrf2dp->format('Y');

		return self::_dateDiff360($Vuk14rand3cm, $Vupptggtheo1, $Vjliv5i5ldjv, $Vq5thmkqixtr, $Vgpecmccnh0e, $Vnbqgm4uz1yb, !$Vihjcs2gfuz0);
	}	


	
	public static function YEARFRAC($Vhzv5gcxnjvf = 0, $Vekuqpnaiczg = 0, $Vihjcs2gfuz0 = 0) {
		$Vhzv5gcxnjvf	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhzv5gcxnjvf);
		$Vekuqpnaiczg	= PHPExcel_Calculation_Functions::flattenSingleValue($Vekuqpnaiczg);
		$Vihjcs2gfuz0		= PHPExcel_Calculation_Functions::flattenSingleValue($Vihjcs2gfuz0);

		if (is_string($Vhzv5gcxnjvf = self::_getDateValue($Vhzv5gcxnjvf))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (is_string($Vekuqpnaiczg = self::_getDateValue($Vekuqpnaiczg))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (((is_numeric($Vihjcs2gfuz0)) && (!is_string($Vihjcs2gfuz0))) || ($Vihjcs2gfuz0 == '')) {
			switch($Vihjcs2gfuz0) {
				case 0	:
					return self::DAYS360($Vhzv5gcxnjvf,$Vekuqpnaiczg) / 360;
				case 1	:
					$Vdinjot5db2ls = self::DATEDIF($Vhzv5gcxnjvf,$Vekuqpnaiczg);
					$Vjliv5i5ldjv = self::YEAR($Vhzv5gcxnjvf);
					$Vnbqgm4uz1yb = self::YEAR($Vekuqpnaiczg);
					$Vz2lhrjd1jk2s = $Vnbqgm4uz1yb - $Vjliv5i5ldjv + 1;
					$Vpwmxf2gaauw = 0;
					if ($Vz2lhrjd1jk2s == 1) {
						if (self::_isLeapYear($Vnbqgm4uz1yb)) {
							$Vupptggtheo1 = self::MONTHOFYEAR($Vhzv5gcxnjvf);
							$Vgpecmccnh0e = self::MONTHOFYEAR($Vekuqpnaiczg);
							$Vq5thmkqixtr = self::DAYOFMONTH($Vekuqpnaiczg);
							if (($Vupptggtheo1 < 3) ||
								(($Vgpecmccnh0e * 100 + $Vq5thmkqixtr) >= (2 * 100 + 29))) {
				     			$Vpwmxf2gaauw += 1;
							}
						}
					} else {
						for($Vz2lhrjd1jk2 = $Vjliv5i5ldjv; $Vz2lhrjd1jk2 <= $Vnbqgm4uz1yb; ++$Vz2lhrjd1jk2) {
							if ($Vz2lhrjd1jk2 == $Vjliv5i5ldjv) {
								$Vupptggtheo1 = self::MONTHOFYEAR($Vhzv5gcxnjvf);
								$Vuk14rand3cm = self::DAYOFMONTH($Vhzv5gcxnjvf);
								if ($Vupptggtheo1 < 3) {
									$Vpwmxf2gaauw += (self::_isLeapYear($Vz2lhrjd1jk2)) ? 1 : 0;
								}
							} elseif($Vz2lhrjd1jk2 == $Vnbqgm4uz1yb) {
								$Vgpecmccnh0e = self::MONTHOFYEAR($Vekuqpnaiczg);
								$Vq5thmkqixtr = self::DAYOFMONTH($Vekuqpnaiczg);
								if (($Vgpecmccnh0e * 100 + $Vq5thmkqixtr) >= (2 * 100 + 29)) {
									$Vpwmxf2gaauw += (self::_isLeapYear($Vz2lhrjd1jk2)) ? 1 : 0;
								}
							} else {
								$Vpwmxf2gaauw += (self::_isLeapYear($Vz2lhrjd1jk2)) ? 1 : 0;
							}
						}
						if ($Vz2lhrjd1jk2s == 2) {
							if (($Vpwmxf2gaauw == 0) && (self::_isLeapYear($Vjliv5i5ldjv)) && ($Vdinjot5db2ls > 365)) {
								$Vpwmxf2gaauw = 1;
							} elseif ($Vdinjot5db2ls < 366) {
								$Vz2lhrjd1jk2s = 1;
							}
						}
						$Vpwmxf2gaauw /= $Vz2lhrjd1jk2s;
					}
					return $Vdinjot5db2ls / (365 + $Vpwmxf2gaauw);
				case 2	:
					return self::DATEDIF($Vhzv5gcxnjvf,$Vekuqpnaiczg) / 360;
				case 3	:
					return self::DATEDIF($Vhzv5gcxnjvf,$Vekuqpnaiczg) / 365;
				case 4	:
					return self::DAYS360($Vhzv5gcxnjvf,$Vekuqpnaiczg,True) / 360;
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function NETWORKDAYS($Vhzv5gcxnjvf,$Vekuqpnaiczg) {
		
		$Vhzv5gcxnjvf	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhzv5gcxnjvf);
		$Vekuqpnaiczg	= PHPExcel_Calculation_Functions::flattenSingleValue($Vekuqpnaiczg);
		
		$Vaxg5pf4dhtsArgs = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		array_shift($Vaxg5pf4dhtsArgs);
		array_shift($Vaxg5pf4dhtsArgs);

		
		if (is_string($Vhzv5gcxnjvf = $Vv5pu2hv0z0f = self::_getDateValue($Vhzv5gcxnjvf))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vhzv5gcxnjvf = (float) floor($Vhzv5gcxnjvf);
		if (is_string($Vekuqpnaiczg = $Vvivx51zcs4s = self::_getDateValue($Vekuqpnaiczg))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vekuqpnaiczg = (float) floor($Vekuqpnaiczg);

		if ($Vv5pu2hv0z0f > $Vvivx51zcs4s) {
			$Vhzv5gcxnjvf = $Vvivx51zcs4s;
			$Vekuqpnaiczg = $Vv5pu2hv0z0f;
		}

		
		$Vq5xlvrge144 = 6 - self::DAYOFWEEK($Vhzv5gcxnjvf,2);
		if ($Vq5xlvrge144 < 0) { $Vq5xlvrge144 = 0; }
		$Vo0o0wc2ctyv = self::DAYOFWEEK($Vekuqpnaiczg,2);
		if ($Vo0o0wc2ctyv >= 6) { $Vo0o0wc2ctyv = 0; }

		$Vnfjuhjb0k22 = floor(($Vekuqpnaiczg - $Vhzv5gcxnjvf) / 7) * 5;
		$Vtixpbij4s1d = $Vo0o0wc2ctyv + $Vq5xlvrge144;
		if ($Vtixpbij4s1d > 5) {
			$Vtixpbij4s1d -= 5;
		}

		
		$Vws3i3gjtbiz = array();
		foreach ($Vaxg5pf4dhtsArgs as $Vlwlvtnstkh1) {
			if (is_string($Vlwlvtnstkh1 = self::_getDateValue($Vlwlvtnstkh1))) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
			if (($Vlwlvtnstkh1 >= $Vhzv5gcxnjvf) && ($Vlwlvtnstkh1 <= $Vekuqpnaiczg)) {
				if ((self::DAYOFWEEK($Vlwlvtnstkh1,2) < 6) && (!in_array($Vlwlvtnstkh1,$Vws3i3gjtbiz))) {
					--$Vtixpbij4s1d;
					$Vws3i3gjtbiz[] = $Vlwlvtnstkh1;
				}
			}
		}

		if ($Vv5pu2hv0z0f > $Vvivx51zcs4s) {
			return 0 - ($Vnfjuhjb0k22 + $Vtixpbij4s1d);
		}
		return $Vnfjuhjb0k22 + $Vtixpbij4s1d;
	}	


	
	public static function WORKDAY($Vhzv5gcxnjvf,$Vq5thmkqixtrs) {
		
		$Vhzv5gcxnjvf	= PHPExcel_Calculation_Functions::flattenSingleValue($Vhzv5gcxnjvf);
		$Vq5thmkqixtrs	= PHPExcel_Calculation_Functions::flattenSingleValue($Vq5thmkqixtrs);
		
		$Vaxg5pf4dhtsArgs = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		array_shift($Vaxg5pf4dhtsArgs);
		array_shift($Vaxg5pf4dhtsArgs);

		if ((is_string($Vhzv5gcxnjvf = self::_getDateValue($Vhzv5gcxnjvf))) || (!is_numeric($Vq5thmkqixtrs))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vhzv5gcxnjvf = (float) floor($Vhzv5gcxnjvf);
		$Vq5thmkqixtrs = (int) floor($Vq5thmkqixtrs);
		
		if ($Vq5thmkqixtrs == 0) { return $Vhzv5gcxnjvf; }

		$Vaq14ktqaawl = ($Vq5thmkqixtrs < 0) ? True : False;

		

		$Vq5xlvrge144 = self::DAYOFWEEK($Vhzv5gcxnjvf,3);
		if (self::DAYOFWEEK($Vhzv5gcxnjvf,3) >= 5) {
			$Vhzv5gcxnjvf += ($Vaq14ktqaawl) ? -$Vq5xlvrge144 + 4: 7 - $Vq5xlvrge144;
			($Vaq14ktqaawl) ? $Vq5thmkqixtrs++ : $Vq5thmkqixtrs--;
		}

		
		$Vekuqpnaiczg = (float) $Vhzv5gcxnjvf + (intval($Vq5thmkqixtrs / 5) * 7) + ($Vq5thmkqixtrs % 5);

		
		$Vo0o0wc2ctyv = self::DAYOFWEEK($Vekuqpnaiczg,3);
		if ($Vo0o0wc2ctyv >= 5) {
			$Vekuqpnaiczg += ($Vaq14ktqaawl) ? -$Vo0o0wc2ctyv + 4: 7 - $Vo0o0wc2ctyv;
		}

		
		if (!empty($Vaxg5pf4dhtsArgs)) {
			$Vws3i3gjtbiz = $Vlwlvtnstkh1s = array();
			foreach ($Vaxg5pf4dhtsArgs as $Vlwlvtnstkh1) {
				if (($Vlwlvtnstkh1 !== NULL) && (trim($Vlwlvtnstkh1) > '')) {
					if (is_string($Vlwlvtnstkh1 = self::_getDateValue($Vlwlvtnstkh1))) {
						return PHPExcel_Calculation_Functions::VALUE();
					}
					if (self::DAYOFWEEK($Vlwlvtnstkh1,3) < 5) {
						$Vlwlvtnstkh1s[] = $Vlwlvtnstkh1;
					}
				}
			}
			if ($Vaq14ktqaawl) {
				rsort($Vlwlvtnstkh1s, SORT_NUMERIC);
			} else {
				sort($Vlwlvtnstkh1s, SORT_NUMERIC);
			}
			foreach ($Vlwlvtnstkh1s as $Vlwlvtnstkh1) {
				if ($Vaq14ktqaawl) {
					if (($Vlwlvtnstkh1 <= $Vhzv5gcxnjvf) && ($Vlwlvtnstkh1 >= $Vekuqpnaiczg)) {
						if (!in_array($Vlwlvtnstkh1,$Vws3i3gjtbiz)) {
							--$Vekuqpnaiczg;
							$Vws3i3gjtbiz[] = $Vlwlvtnstkh1;
						}
					}
				} else {
					if (($Vlwlvtnstkh1 >= $Vhzv5gcxnjvf) && ($Vlwlvtnstkh1 <= $Vekuqpnaiczg)) {
						if (!in_array($Vlwlvtnstkh1,$Vws3i3gjtbiz)) {
							++$Vekuqpnaiczg;
							$Vws3i3gjtbiz[] = $Vlwlvtnstkh1;
						}
					}
				}
				
				$Vo0o0wc2ctyv = self::DAYOFWEEK($Vekuqpnaiczg,3);
				if ($Vo0o0wc2ctyv >= 5) {
					$Vekuqpnaiczg += ($Vaq14ktqaawl) ? -$Vo0o0wc2ctyv + 4: 7 - $Vo0o0wc2ctyv;
				}

			}
		}

		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					return (float) $Vekuqpnaiczg;
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					return (integer) PHPExcel_Shared_Date::ExcelToPHP($Vekuqpnaiczg);
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					return PHPExcel_Shared_Date::ExcelToPHPObject($Vekuqpnaiczg);
		}
	}	


	
	public static function DAYOFMONTH($Vtpwoe0nuvf4 = 1) {
		$Vtpwoe0nuvf4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vtpwoe0nuvf4 == 0.0) {
			return 0;
		} elseif ($Vtpwoe0nuvf4 < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);

		return (int) $Vwnpsdwc5eyw->format('j');
	}	


	
	public static function DAYOFWEEK($Vtpwoe0nuvf4 = 1, $Vdtcpflt5bhp = 1) {
		$Vtpwoe0nuvf4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);
		$Vdtcpflt5bhp		= PHPExcel_Calculation_Functions::flattenSingleValue($Vdtcpflt5bhp);

		if (!is_numeric($Vdtcpflt5bhp)) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif (($Vdtcpflt5bhp < 1) || ($Vdtcpflt5bhp > 3)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vdtcpflt5bhp = floor($Vdtcpflt5bhp);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vtpwoe0nuvf4 < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);
		$Vqiiypv5q4zf = $Vwnpsdwc5eyw->format('w');

		$Vyzg5denclvj = 1;
		switch ($Vdtcpflt5bhp) {
			case 1: ++$Vqiiypv5q4zf;
					break;
			case 2: if ($Vqiiypv5q4zf == 0) { $Vqiiypv5q4zf = 7; }
					break;
			case 3: if ($Vqiiypv5q4zf == 0) { $Vqiiypv5q4zf = 7; }
					$Vyzg5denclvj = 0;
					--$Vqiiypv5q4zf;
					break;
		}
		if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL) {
			
			if (($Vwnpsdwc5eyw->format('Y') == 1900) && ($Vwnpsdwc5eyw->format('n') <= 2)) {
				--$Vqiiypv5q4zf;
				if ($Vqiiypv5q4zf < $Vyzg5denclvj) {
					$Vqiiypv5q4zf += 7;
				}
			}
		}

		return (int) $Vqiiypv5q4zf;
	}	


	
	public static function WEEKOFYEAR($Vtpwoe0nuvf4 = 1, $Vihjcs2gfuz0 = 1) {
		$Vtpwoe0nuvf4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);
		$Vihjcs2gfuz0		= PHPExcel_Calculation_Functions::flattenSingleValue($Vihjcs2gfuz0);

		if (!is_numeric($Vihjcs2gfuz0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif (($Vihjcs2gfuz0 < 1) || ($Vihjcs2gfuz0 > 2)) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vihjcs2gfuz0 = floor($Vihjcs2gfuz0);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vtpwoe0nuvf4 < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);
		$Vdinjot5db2lOfYear = $Vwnpsdwc5eyw->format('z');
		$Vcmbtu3cu5dp = $Vwnpsdwc5eyw->format('w');
		$Vwnpsdwc5eyw->modify('-'.$Vdinjot5db2lOfYear.' days');
		$Vcmbtu3cu5dp = $Vwnpsdwc5eyw->format('w');
		$Vdinjot5db2lsInFirstWeek = 7 - (($Vcmbtu3cu5dp + (2 - $Vihjcs2gfuz0)) % 7);
		$Vdinjot5db2lOfYear -= $Vdinjot5db2lsInFirstWeek;
		$Vszcgvrdcq1m = ceil($Vdinjot5db2lOfYear / 7) + 1;

		return (int) $Vszcgvrdcq1m;
	}	


	
	public static function MONTHOFYEAR($Vtpwoe0nuvf4 = 1) {
		$Vtpwoe0nuvf4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vtpwoe0nuvf4 < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);

		return (int) $Vwnpsdwc5eyw->format('n');
	}	


	
	public static function YEAR($Vtpwoe0nuvf4 = 1) {
		$Vtpwoe0nuvf4	= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vtpwoe0nuvf4 < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		
		$Vwnpsdwc5eyw = PHPExcel_Shared_Date::ExcelToPHPObject($Vtpwoe0nuvf4);

		return (int) $Vwnpsdwc5eyw->format('Y');
	}	


	
	public static function HOUROFDAY($Veovj3illlra = 0) {
		$Veovj3illlra	= PHPExcel_Calculation_Functions::flattenSingleValue($Veovj3illlra);

		if (!is_numeric($Veovj3illlra)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				$Veca2om3awugestVal = strtok($Veovj3illlra,'/-: ');
				if (strlen($Veca2om3awugestVal) < strlen($Veovj3illlra)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			}
			$Veovj3illlra = self::_getTimeValue($Veovj3illlra);
			if (is_string($Veovj3illlra)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		
		if ($Veovj3illlra >= 1) {
			$Veovj3illlra = fmod($Veovj3illlra,1);
		} elseif ($Veovj3illlra < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Veovj3illlra = PHPExcel_Shared_Date::ExcelToPHP($Veovj3illlra);

		return (int) gmdate('G',$Veovj3illlra);
	}	


	
	public static function MINUTEOFHOUR($Veovj3illlra = 0) {
		$Veovj3illlra = $Veca2om3awugimeTester	= PHPExcel_Calculation_Functions::flattenSingleValue($Veovj3illlra);

		if (!is_numeric($Veovj3illlra)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				$Veca2om3awugestVal = strtok($Veovj3illlra,'/-: ');
				if (strlen($Veca2om3awugestVal) < strlen($Veovj3illlra)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			}
			$Veovj3illlra = self::_getTimeValue($Veovj3illlra);
			if (is_string($Veovj3illlra)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		
		if ($Veovj3illlra >= 1) {
			$Veovj3illlra = fmod($Veovj3illlra,1);
		} elseif ($Veovj3illlra < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Veovj3illlra = PHPExcel_Shared_Date::ExcelToPHP($Veovj3illlra);

		return (int) gmdate('i',$Veovj3illlra);
	}	


	
	public static function SECONDOFMINUTE($Veovj3illlra = 0) {
		$Veovj3illlra	= PHPExcel_Calculation_Functions::flattenSingleValue($Veovj3illlra);

		if (!is_numeric($Veovj3illlra)) {
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				$Veca2om3awugestVal = strtok($Veovj3illlra,'/-: ');
				if (strlen($Veca2om3awugestVal) < strlen($Veovj3illlra)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			}
			$Veovj3illlra = self::_getTimeValue($Veovj3illlra);
			if (is_string($Veovj3illlra)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}
		
		if ($Veovj3illlra >= 1) {
			$Veovj3illlra = fmod($Veovj3illlra,1);
		} elseif ($Veovj3illlra < 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Veovj3illlra = PHPExcel_Shared_Date::ExcelToPHP($Veovj3illlra);

		return (int) gmdate('s',$Veovj3illlra);
	}	


	
	public static function EDATE($Vtpwoe0nuvf4 = 1, $Vqfk2p5e1wi0 = 0) {
		$Vtpwoe0nuvf4			= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);
		$Vqfk2p5e1wi0	= PHPExcel_Calculation_Functions::flattenSingleValue($Vqfk2p5e1wi0);

		if (!is_numeric($Vqfk2p5e1wi0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqfk2p5e1wi0 = floor($Vqfk2p5e1wi0);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vwnpsdwc5eyw = self::_adjustDateByMonths($Vtpwoe0nuvf4,$Vqfk2p5e1wi0);

		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					return (float) PHPExcel_Shared_Date::PHPToExcel($Vwnpsdwc5eyw);
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					return (integer) PHPExcel_Shared_Date::ExcelToPHP(PHPExcel_Shared_Date::PHPToExcel($Vwnpsdwc5eyw));
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					return $Vwnpsdwc5eyw;
		}
	}	


	
	public static function EOMONTH($Vtpwoe0nuvf4 = 1, $Vqfk2p5e1wi0 = 0) {
		$Vtpwoe0nuvf4			= PHPExcel_Calculation_Functions::flattenSingleValue($Vtpwoe0nuvf4);
		$Vqfk2p5e1wi0	= PHPExcel_Calculation_Functions::flattenSingleValue($Vqfk2p5e1wi0);

		if (!is_numeric($Vqfk2p5e1wi0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqfk2p5e1wi0 = floor($Vqfk2p5e1wi0);

		if (is_string($Vtpwoe0nuvf4 = self::_getDateValue($Vtpwoe0nuvf4))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		$Vwnpsdwc5eyw = self::_adjustDateByMonths($Vtpwoe0nuvf4,$Vqfk2p5e1wi0+1);
		$Vhwjhym0xx0o = (int) $Vwnpsdwc5eyw->format('d');
		$Vhwjhym0xx0oString = '-'.$Vhwjhym0xx0o.' days';
		$Vwnpsdwc5eyw->modify($Vhwjhym0xx0oString);

		switch (PHPExcel_Calculation_Functions::getReturnDateType()) {
			case PHPExcel_Calculation_Functions::RETURNDATE_EXCEL :
					return (float) PHPExcel_Shared_Date::PHPToExcel($Vwnpsdwc5eyw);
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC :
					return (integer) PHPExcel_Shared_Date::ExcelToPHP(PHPExcel_Shared_Date::PHPToExcel($Vwnpsdwc5eyw));
			case PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT :
					return $Vwnpsdwc5eyw;
		}
	}	

}	

