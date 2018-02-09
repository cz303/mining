<?php





class PHPExcel_Shared_TimeZone
{
	
	protected static $Vpkuywvzjo0h	= 'UTC';

	
	public static function _validateTimeZone($Vjfe4rdnwehn) {
		if (in_array($Vjfe4rdnwehn, DateTimeZone::listIdentifiers())) {
			return TRUE;
		}
		return FALSE;
	}

	
	public static function setTimeZone($Vjfe4rdnwehn) {
		if (self::_validateTimezone($Vjfe4rdnwehn)) {
			self::$Vpkuywvzjo0h = $Vjfe4rdnwehn;
			return TRUE;
		}
		return FALSE;
	}	


	
	public static function getTimeZone() {
		return self::$Vpkuywvzjo0h;
	}	


	
	private static function _getTimezoneTransitions($Vih5ew43id0x, $V2csn3idfvqt) {
		$Vtkczkfg3mtn = $Vih5ew43id0x->getTransitions();
		$Vfkp3zfdyzrl = array();
		foreach($Vtkczkfg3mtn as $Vseq1edikdvg => $Vinacgizj1mt) {
			if ($Vinacgizj1mt['ts'] > $V2csn3idfvqt) {
				$Vfkp3zfdyzrl[] = ($Vseq1edikdvg > 0) ? $Vtkczkfg3mtn[$Vseq1edikdvg - 1] : $Vinacgizj1mt;
				break;
			}
			if (empty($Vfkp3zfdyzrl)) {
				$Vfkp3zfdyzrl[] = end($Vtkczkfg3mtn);
			}
		}

		return $Vfkp3zfdyzrl;
	}

	
	public static function getTimeZoneAdjustment($Vjfe4rdnwehn, $V2csn3idfvqt) {
		if ($Vjfe4rdnwehn !== NULL) {
			if (!self::_validateTimezone($Vjfe4rdnwehn)) {
				throw new PHPExcel_Exception("Invalid timezone " . $Vjfe4rdnwehn);
			}
		} else {
			$Vjfe4rdnwehn = self::$Vpkuywvzjo0h;
		}

		if ($Vjfe4rdnwehn == 'UST') {
			return 0;
		}

		$Vih5ew43id0x = new DateTimeZone($Vjfe4rdnwehn);
		if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
			$Vfkp3zfdyzrl = $Vih5ew43id0x->getTransitions($V2csn3idfvqt,$V2csn3idfvqt);
		} else {
			$Vfkp3zfdyzrl = self::_getTimezoneTransitions($Vih5ew43id0x, $V2csn3idfvqt);
		}

		return (count($Vfkp3zfdyzrl) > 0) ? $Vfkp3zfdyzrl[0]['offset'] : 0;
	}

}
