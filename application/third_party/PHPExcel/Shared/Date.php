<?php





class PHPExcel_Shared_Date
{
	
	const CALENDAR_WINDOWS_1900 = 1900;		
	const CALENDAR_MAC_1904 = 1904;			

	
	public static $V0xekdv3ib5v = array(	'Jan' => 'January',
										'Feb' => 'February',
										'Mar' => 'March',
										'Apr' => 'April',
										'May' => 'May',
										'Jun' => 'June',
										'Jul' => 'July',
										'Aug' => 'August',
										'Sep' => 'September',
										'Oct' => 'October',
										'Nov' => 'November',
										'Dec' => 'December',
									  );

	
	public static $V5d2c4jawars = array(	'st',
											'nd',
											'rd',
											'th',
										  );

	
	protected static $Vlrbq0rszkpf	= self::CALENDAR_WINDOWS_1900;

	
	public static function setExcelCalendar($V0tuh55phnhp) {
		if (($V0tuh55phnhp == self::CALENDAR_WINDOWS_1900) ||
			($V0tuh55phnhp == self::CALENDAR_MAC_1904)) {
			self::$Vlrbq0rszkpf = $V0tuh55phnhp;
			return TRUE;
		}
		return FALSE;
	}	


	
	public static function getExcelCalendar() {
		return self::$Vlrbq0rszkpf;
	}	


	
	public static function ExcelToPHP($Vtpwoe0nuvf4 = 0, $Vfond3whcf3o = FALSE, $Vjfe4rdnwehn = NULL) {
		if (self::$Vlrbq0rszkpf == self::CALENDAR_WINDOWS_1900) {
			$V3dnmjxhl3k3 = 25569;
			
			if ($Vtpwoe0nuvf4 < 60) {
				--$V3dnmjxhl3k3;
			}
		} else {
			$V3dnmjxhl3k3 = 24107;
		}

		
		if ($Vtpwoe0nuvf4 >= 1) {
			$Vumhy0llqkun = $Vtpwoe0nuvf4 - $V3dnmjxhl3k3;
			$Vbco3t3kne3m = round($Vumhy0llqkun * 86400);
			if (($Vbco3t3kne3m <= PHP_INT_MAX) && ($Vbco3t3kne3m >= -PHP_INT_MAX)) {
				$Vbco3t3kne3m = (integer) $Vbco3t3kne3m;
			}
		} else {
			$Vew1oplapl1e = round($Vtpwoe0nuvf4 * 24);
			$Vo2to3ygcb32 = round($Vtpwoe0nuvf4 * 1440) - round($Vew1oplapl1e * 60);
			$Vucrpwtc0igx = round($Vtpwoe0nuvf4 * 86400) - round($Vew1oplapl1e * 3600) - round($Vo2to3ygcb32 * 60);
			$Vbco3t3kne3m = (integer) gmmktime($Vew1oplapl1e, $Vo2to3ygcb32, $Vucrpwtc0igx);
		}

		$Vjfe4rdnwehnAdjustment = ($Vfond3whcf3o) ?
		    PHPExcel_Shared_TimeZone::getTimezoneAdjustment($Vjfe4rdnwehn, $Vbco3t3kne3m) :
		    0;

		
		return $Vbco3t3kne3m + $Vjfe4rdnwehnAdjustment;
	}	


	
	public static function ExcelToPHPObject($Vtpwoe0nuvf4 = 0) {
		$V33m50wv1fps = self::ExcelToPHP($Vtpwoe0nuvf4);
		$Vloow0ofeahg = floor($V33m50wv1fps / 86400);
		$Vmfehxqto3f3 = round((($V33m50wv1fps / 86400) - $Vloow0ofeahg) * 86400);
		$Vew1oplapl1e = round($Vmfehxqto3f3 / 3600);
		$Vdpbakyqupim = round($Vmfehxqto3f3 / 60) - ($Vew1oplapl1e * 60);
		$Vjli1uijlnrn = round($Vmfehxqto3f3) - ($Vew1oplapl1e * 3600) - ($Vdpbakyqupim * 60);

		$V1flaqcxqdm1 = date_create('1-Jan-1970+'.$Vloow0ofeahg.' days');
		$V1flaqcxqdm1->setTime($Vew1oplapl1e,$Vdpbakyqupim,$Vjli1uijlnrn);

		return $V1flaqcxqdm1;
	}	


	
	public static function PHPToExcel($Vtpwoe0nuvf4 = 0, $Vfond3whcf3o = FALSE, $Vjfe4rdnwehn = NULL) {
		$Vkzkv5l2oau4 = date_default_timezone_get();
		date_default_timezone_set('UTC');
		$Vvungffnkeyj = FALSE;
		if ((is_object($Vtpwoe0nuvf4)) && ($Vtpwoe0nuvf4 instanceof DateTime)) {
			$Vvungffnkeyj = self::FormattedPHPToExcel( $Vtpwoe0nuvf4->format('Y'), $Vtpwoe0nuvf4->format('m'), $Vtpwoe0nuvf4->format('d'),
												   $Vtpwoe0nuvf4->format('H'), $Vtpwoe0nuvf4->format('i'), $Vtpwoe0nuvf4->format('s')
												 );
		} elseif (is_numeric($Vtpwoe0nuvf4)) {
			$Vvungffnkeyj = self::FormattedPHPToExcel( date('Y',$Vtpwoe0nuvf4), date('m',$Vtpwoe0nuvf4), date('d',$Vtpwoe0nuvf4),
												   date('H',$Vtpwoe0nuvf4), date('i',$Vtpwoe0nuvf4), date('s',$Vtpwoe0nuvf4)
												 );
		}
		date_default_timezone_set($Vkzkv5l2oau4);

		return $Vvungffnkeyj;
	}	


	
	public static function FormattedPHPToExcel($Vz2lhrjd1jk2, $Vbylkx0shw01, $Vdinjot5db2l, $Vew1oplapl1e=0, $Vdpbakyqupim=0, $Vjli1uijlnrn=0) {
		if (self::$Vlrbq0rszkpf == self::CALENDAR_WINDOWS_1900) {
			
			
			
			
			$V0olmrzhub2g = TRUE;
			if (($Vz2lhrjd1jk2 == 1900) && ($Vbylkx0shw01 <= 2)) { $V0olmrzhub2g = FALSE; }
			$V3dnmjxhl3k3 = 2415020;
		} else {
			$V3dnmjxhl3k3 = 2416481;
			$V0olmrzhub2g = FALSE;
		}

		
		if ($Vbylkx0shw01 > 2) {
			$Vbylkx0shw01 -= 3;
		} else {
			$Vbylkx0shw01 += 9;
			--$Vz2lhrjd1jk2;
		}

		
		$Vyl2gl3ihfix = substr($Vz2lhrjd1jk2,0,2);
		$Vz30lmzz2xql = substr($Vz2lhrjd1jk2,2,2);
		$Vsb3bv3h45jq = floor((146097 * $Vyl2gl3ihfix) / 4) + floor((1461 * $Vz30lmzz2xql) / 4) + floor((153 * $Vbylkx0shw01 + 2) / 5) + $Vdinjot5db2l + 1721119 - $V3dnmjxhl3k3 + $V0olmrzhub2g;

		$V4ajaijjznyq = (($Vew1oplapl1e * 3600) + ($Vdpbakyqupim * 60) + $Vjli1uijlnrn) / 86400;

		return (float) $Vsb3bv3h45jq + $V4ajaijjznyq;
	}	


	
	public static function isDateTime(PHPExcel_Cell $Vp0mtfiyrfm5) {
		return self::isDateTimeFormat(
			$Vp0mtfiyrfm5->getWorksheet()->getStyle(
				$Vp0mtfiyrfm5->getCoordinate()
			)->getNumberFormat()
		);
	}	


	
	public static function isDateTimeFormat(PHPExcel_Style_NumberFormat $Vzyifo54jqmf) {
		return self::isDateTimeFormatCode($Vzyifo54jqmf->getFormatCode());
	}	


	private static	$Vjg3w1fssqtu = 'eymdHs';

	
	public static function isDateTimeFormatCode($Vzyifo54jqmfCode = '') {
		if (strtolower($Vzyifo54jqmfCode) === strtolower(PHPExcel_Style_NumberFormat::FORMAT_GENERAL))
            
			return FALSE;
        if (preg_match('/[0#]E[+-]0/i', $Vzyifo54jqmfCode))
			
			return FALSE;
		
		switch ($Vzyifo54jqmfCode) {
			
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_DMYSLASH:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_DMYMINUS:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_DMMINUS:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_MYMINUS:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_DATETIME:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME1:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME2:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME3:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME4:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME5:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME6:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME7:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_TIME8:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX14:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX16:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX17:
			case PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX22:
				return TRUE;
		}

		
		if ((substr($Vzyifo54jqmfCode,0,1) == '_') || (substr($Vzyifo54jqmfCode,0,2) == '0 ')) {
			return FALSE;
		}
		
		if (preg_match('/(^|\])[^\[]*['.self::$Vjg3w1fssqtu.']/i',$Vzyifo54jqmfCode)) {
			
			
			if (strpos($Vzyifo54jqmfCode,'"') !== FALSE) {
				$Vh4qnpuhwnqs = FALSE;
				foreach(explode('"',$Vzyifo54jqmfCode) as $Vyoz3su2yjw1) {
					
					if (($Vh4qnpuhwnqs = !$Vh4qnpuhwnqs) &&
						(preg_match('/(^|\])[^\[]*['.self::$Vjg3w1fssqtu.']/i',$Vyoz3su2yjw1))) {
						return TRUE;
					}
				}
				return FALSE;
			}
			return TRUE;
		}

		
		return FALSE;
	}	


	
	public static function stringToExcel($Vtpwoe0nuvf4 = '') {
		if (strlen($Vtpwoe0nuvf4) < 2)
			return FALSE;
		if (!preg_match('/^(\d{1,4}[ \.\/\-][A-Z]{3,9}([ \.\/\-]\d{1,4})?|[A-Z]{3,9}[ \.\/\-]\d{1,4}([ \.\/\-]\d{1,4})?|\d{1,4}[ \.\/\-]\d{1,4}([ \.\/\-]\d{1,4})?)( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/iu', $Vtpwoe0nuvf4))
			return FALSE;

		$Vtpwoe0nuvf4New = PHPExcel_Calculation_DateTime::DATEVALUE($Vtpwoe0nuvf4);

		if ($Vtpwoe0nuvf4New === PHPExcel_Calculation_Functions::VALUE()) {
			return FALSE;
		} else {
			if (strpos($Vtpwoe0nuvf4, ':') !== FALSE) {
				$Vmfehxqto3f3Value = PHPExcel_Calculation_DateTime::TIMEVALUE($Vtpwoe0nuvf4);
				if ($Vmfehxqto3f3Value === PHPExcel_Calculation_Functions::VALUE()) {
					return FALSE;
				}
				$Vtpwoe0nuvf4New += $Vmfehxqto3f3Value;
			}
			return $Vtpwoe0nuvf4New;
		}


	}

    public static function monthStringToNumber($Vbylkx0shw01) {
        $Vbylkx0shw01Index = 1;
        foreach(self::$V0xekdv3ib5v as $Vomn12tm0z5n => $V5hfulf25r4l) {
            if (($Vbylkx0shw01 === $V5hfulf25r4l) || ($Vbylkx0shw01 === $Vomn12tm0z5n)) {
                return $Vbylkx0shw01Index;
            }
            ++$Vbylkx0shw01Index;
        }
        return $Vbylkx0shw01;
    }

    public static function dayStringToNumber($Vdinjot5db2l) {
		$Vl5o0sqfpik1 = (str_replace(self::$V5d2c4jawars,'',$Vdinjot5db2l));
		if (is_numeric($Vl5o0sqfpik1)) {
		    return $Vl5o0sqfpik1;
		}
		return $Vdinjot5db2l;
    }

}
