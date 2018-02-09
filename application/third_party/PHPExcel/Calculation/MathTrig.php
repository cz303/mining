<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_MathTrig {

	
	
	
	private static function _factors($Vp4xjtpabm0l) {
		$Vfyfvtb2xr4b = floor(sqrt($Vp4xjtpabm0l));

		$Vcuw4tixjn5z = array();
		for ($Vfhiq1lhsoja = $Vfyfvtb2xr4b; $Vfhiq1lhsoja > 1; --$Vfhiq1lhsoja) {
			if (($Vp4xjtpabm0l % $Vfhiq1lhsoja) == 0) {
				$Vcuw4tixjn5z = array_merge($Vcuw4tixjn5z,self::_factors($Vp4xjtpabm0l / $Vfhiq1lhsoja));
				$Vcuw4tixjn5z = array_merge($Vcuw4tixjn5z,self::_factors($Vfhiq1lhsoja));
				if ($Vfhiq1lhsoja <= sqrt($Vp4xjtpabm0l)) {
					break;
				}
			}
		}
		if (!empty($Vcuw4tixjn5z)) {
			rsort($Vcuw4tixjn5z);
			return $Vcuw4tixjn5z;
		} else {
			return array((integer) $Vp4xjtpabm0l);
		}
	}	


	private static function _romanCut($Vcgbfu1dtv3l, $Vmwwo1qnmepz) {
		return ($Vcgbfu1dtv3l - ($Vcgbfu1dtv3l % $Vmwwo1qnmepz ) ) / $Vmwwo1qnmepz;
	}	


	
	public static function ATAN2($Vh3nu5anxvkr = NULL, $Vumy34ouzptx = NULL) {
		$Vh3nu5anxvkr	= PHPExcel_Calculation_Functions::flattenSingleValue($Vh3nu5anxvkr);
		$Vumy34ouzptx	= PHPExcel_Calculation_Functions::flattenSingleValue($Vumy34ouzptx);

		$Vh3nu5anxvkr	= ($Vh3nu5anxvkr !== NULL)	? $Vh3nu5anxvkr : 0.0;
		$Vumy34ouzptx	= ($Vumy34ouzptx !== NULL)	? $Vumy34ouzptx : 0.0;

		if (((is_numeric($Vh3nu5anxvkr)) || (is_bool($Vh3nu5anxvkr))) &&
			((is_numeric($Vumy34ouzptx)))  || (is_bool($Vumy34ouzptx))) {
			$Vh3nu5anxvkr	= (float) $Vh3nu5anxvkr;
			$Vumy34ouzptx	= (float) $Vumy34ouzptx;

			if (($Vh3nu5anxvkr == 0) && ($Vumy34ouzptx == 0)) {
				return PHPExcel_Calculation_Functions::DIV0();
			}

			return atan2($Vumy34ouzptx, $Vh3nu5anxvkr);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function CEILING($Vcgbfu1dtv3lber, $V3strauzuqqj = NULL) {
		$Vcgbfu1dtv3lber			= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$V3strauzuqqj	= PHPExcel_Calculation_Functions::flattenSingleValue($V3strauzuqqj);

		if ((is_null($V3strauzuqqj)) &&
			(PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC)) {
			$V3strauzuqqj = $Vcgbfu1dtv3lber/abs($Vcgbfu1dtv3lber);
		}

        if ((is_numeric($Vcgbfu1dtv3lber)) && (is_numeric($V3strauzuqqj))) {
            if (($Vcgbfu1dtv3lber == 0.0 ) || ($V3strauzuqqj == 0.0)) {
				return 0.0;
			} elseif (self::SIGN($Vcgbfu1dtv3lber) == self::SIGN($V3strauzuqqj)) {
				return ceil($Vcgbfu1dtv3lber / $V3strauzuqqj) * $V3strauzuqqj;
			} else {
				return PHPExcel_Calculation_Functions::NaN();
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function COMBIN($Vcgbfu1dtv3lObjs, $Vcgbfu1dtv3lInSet) {
		$Vcgbfu1dtv3lObjs	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lObjs);
		$Vcgbfu1dtv3lInSet	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lInSet);

		if ((is_numeric($Vcgbfu1dtv3lObjs)) && (is_numeric($Vcgbfu1dtv3lInSet))) {
			if ($Vcgbfu1dtv3lObjs < $Vcgbfu1dtv3lInSet) {
				return PHPExcel_Calculation_Functions::NaN();
			} elseif ($Vcgbfu1dtv3lInSet < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return round(self::FACT($Vcgbfu1dtv3lObjs) / self::FACT($Vcgbfu1dtv3lObjs - $Vcgbfu1dtv3lInSet)) / self::FACT($Vcgbfu1dtv3lInSet);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function EVEN($Vcgbfu1dtv3lber) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);

		if (is_null($Vcgbfu1dtv3lber)) {
			return 0;
		} elseif (is_bool($Vcgbfu1dtv3lber)) {
			$Vcgbfu1dtv3lber = (int) $Vcgbfu1dtv3lber;
		}

		if (is_numeric($Vcgbfu1dtv3lber)) {
			$V3strauzuqqj = 2 * self::SIGN($Vcgbfu1dtv3lber);
			return (int) self::CEILING($Vcgbfu1dtv3lber,$V3strauzuqqj);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FACT($V3jsjjtskuxj) {
		$V3jsjjtskuxj	= PHPExcel_Calculation_Functions::flattenSingleValue($V3jsjjtskuxj);

		if (is_numeric($V3jsjjtskuxj)) {
			if ($V3jsjjtskuxj < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt0aziiaykgm = floor($V3jsjjtskuxj);
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				if ($V3jsjjtskuxj > $Vt0aziiaykgm) {
					return PHPExcel_Calculation_Functions::NaN();
				}
			}

			$Vchg4fog5h5b = 1;
			while ($Vt0aziiaykgm > 1) {
				$Vchg4fog5h5b *= $Vt0aziiaykgm--;
			}
			return $Vchg4fog5h5b ;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FACTDOUBLE($V3jsjjtskuxj) {
		$Vt0aziiaykgm	= PHPExcel_Calculation_Functions::flattenSingleValue($V3jsjjtskuxj);

		if (is_numeric($Vt0aziiaykgm)) {
			$Vt0aziiaykgm	= floor($Vt0aziiaykgm);
			if ($V3jsjjtskuxj < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vchg4fog5h5b = 1;
			while ($Vt0aziiaykgm > 1) {
				$Vchg4fog5h5b *= $Vt0aziiaykgm--;
				--$Vt0aziiaykgm;
			}
			return $Vchg4fog5h5b ;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FLOOR($Vcgbfu1dtv3lber, $V3strauzuqqj = NULL) {
		$Vcgbfu1dtv3lber			= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$V3strauzuqqj	= PHPExcel_Calculation_Functions::flattenSingleValue($V3strauzuqqj);

		if ((is_null($V3strauzuqqj)) && (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC)) {
			$V3strauzuqqj = $Vcgbfu1dtv3lber/abs($Vcgbfu1dtv3lber);
		}

		if ((is_numeric($Vcgbfu1dtv3lber)) && (is_numeric($V3strauzuqqj))) {
            if (($Vcgbfu1dtv3lber == 0.0 ) || ($V3strauzuqqj == 0.0)) {
				return 0.0;
			} elseif (self::SIGN($Vcgbfu1dtv3lber) == self::SIGN($V3strauzuqqj)) {
				return floor($Vcgbfu1dtv3lber / $V3strauzuqqj) * $V3strauzuqqj;
			} else {
				return PHPExcel_Calculation_Functions::NaN();
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function GCD() {
		$Vbco3t3kne3m = 1;
		$Vvikeymjuoou = array();
		
		foreach(PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vp4xjtpabm0l) {
			if (!is_numeric($Vp4xjtpabm0l)) {
				return PHPExcel_Calculation_Functions::VALUE();
			} elseif ($Vp4xjtpabm0l == 0) {
				continue;
			} elseif($Vp4xjtpabm0l < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vv0ngmol30qj = self::_factors($Vp4xjtpabm0l);
			$Vfcigznk2svt = array_count_values($Vv0ngmol30qj);
			$Vvikeymjuoou[] = $Vfcigznk2svt;
		}
		$Vgay05ctfbjz = count($Vvikeymjuoou);
		if ($Vgay05ctfbjz == 0) {
			return 0;
		}

		$V41baga1bptt = $Vvikeymjuoou[0];
		for ($Vfhiq1lhsoja=1;$Vfhiq1lhsoja < $Vgay05ctfbjz; ++$Vfhiq1lhsoja) {
			$V41baga1bptt = array_intersect_key($V41baga1bptt,$Vvikeymjuoou[$Vfhiq1lhsoja]);
		}
		$V41baga1bpttValues = count($V41baga1bptt);
		if ($V41baga1bpttValues == 0) {
			return $Vbco3t3kne3m;
		} elseif ($V41baga1bpttValues > 1) {
			foreach($V41baga1bptt as $V0kxawtzdsjh => $Vjljja4vt0j5) {
				foreach($Vvikeymjuoou as $Vwuae5pspmch) {
					foreach($Vwuae5pspmch as $V0khrclkwp4u => $V41nfkbsz42i) {
						if (($V0khrclkwp4u == $V0kxawtzdsjh) && ($V41nfkbsz42i < $Vjljja4vt0j5)) {
							$V41baga1bptt[$V0kxawtzdsjh] = $V41nfkbsz42i;
							$Vjljja4vt0j5 = $V41nfkbsz42i;
						}
					}
				}
			}

			$Vbco3t3kne3m = 1;
			foreach($V41baga1bptt as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				$Vbco3t3kne3m *= pow($Vseq1edikdvg,$Vp4xjtpabm0l);
			}
			return $Vbco3t3kne3m;
		} else {
			$Vseq1edikdvgs = array_keys($V41baga1bptt);
			$Vseq1edikdvg = $Vseq1edikdvgs[0];
			$Vp4xjtpabm0l = $V41baga1bptt[$Vseq1edikdvg];
			foreach($Vvikeymjuoou as $V41nfkbsz42i) {
				foreach($V41nfkbsz42i as $V0kxawtzdsjh => $Vjljja4vt0j5) {
					if (($V0kxawtzdsjh == $Vseq1edikdvg) && ($Vjljja4vt0j5 < $Vp4xjtpabm0l)) {
						$Vp4xjtpabm0l = $Vjljja4vt0j5;
					}
				}
			}
			return pow($Vseq1edikdvg,$Vp4xjtpabm0l);
		}
	}	


	
	public static function INT($Vcgbfu1dtv3lber) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);

		if (is_null($Vcgbfu1dtv3lber)) {
			return 0;
		} elseif (is_bool($Vcgbfu1dtv3lber)) {
			return (int) $Vcgbfu1dtv3lber;
		}
		if (is_numeric($Vcgbfu1dtv3lber)) {
			return (int) floor($Vcgbfu1dtv3lber);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function LCM() {
		$Vbco3t3kne3m = 1;
		$Vx1b10uuzqir = array();
		
		foreach(PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vp4xjtpabm0l) {
			if (!is_numeric($Vp4xjtpabm0l)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}
			if ($Vp4xjtpabm0l == 0) {
				return 0;
			} elseif ($Vp4xjtpabm0l < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vv0ngmol30qj = self::_factors(floor($Vp4xjtpabm0l));
			$Vfcigznk2svt = array_count_values($Vv0ngmol30qj);
			$V05fdbmdy5wk = array();
			foreach($Vfcigznk2svt as $V0xafveuifu2 => $Vswcptvudppi) {
				$V05fdbmdy5wk[$V0xafveuifu2] = pow($V0xafveuifu2,$Vswcptvudppi);
			}
			foreach($V05fdbmdy5wk as $Vi5addxugope => $Vgx2px4qhtdo) {
				if (array_key_exists($Vi5addxugope,$Vx1b10uuzqir)) {
					if ($Vx1b10uuzqir[$Vi5addxugope] < $Vgx2px4qhtdo) {
						$Vx1b10uuzqir[$Vi5addxugope] = $Vgx2px4qhtdo;
					}
				} else {
					$Vx1b10uuzqir[$Vi5addxugope] = $Vgx2px4qhtdo;
				}
			}
		}
		foreach($Vx1b10uuzqir as $Vrojpgtrk01t) {
			$Vbco3t3kne3m *= (integer) $Vrojpgtrk01t;
		}
		return $Vbco3t3kne3m;
	}	


	
	public static function LOG_BASE($Vcgbfu1dtv3lber = NULL, $V4j05uvad05v = 10) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$V4j05uvad05v	= (is_null($V4j05uvad05v)) ? 10 : (float) PHPExcel_Calculation_Functions::flattenSingleValue($V4j05uvad05v);

		if ((!is_numeric($V4j05uvad05v)) || (!is_numeric($Vcgbfu1dtv3lber)))
			return PHPExcel_Calculation_Functions::VALUE();
		if (($V4j05uvad05v <= 0) || ($Vcgbfu1dtv3lber <= 0))
			return PHPExcel_Calculation_Functions::NaN();
		return log($Vcgbfu1dtv3lber, $V4j05uvad05v);
	}	


	
	public static function MDETERM($Vgzh0gh1yjdk) {
		$Vv1t0l03554r = array();
		if (!is_array($Vgzh0gh1yjdk)) { $Vgzh0gh1yjdk = array(array($Vgzh0gh1yjdk)); }

		$Vexbtekafkvl = $Vezuwhshpw1j = 0;
		foreach($Vgzh0gh1yjdk as $Vuazyvrryre5) {
			if (!is_array($Vuazyvrryre5)) { $Vuazyvrryre5 = array($Vuazyvrryre5); }
			$Vn4q2p4mkwa0 = 0;
			foreach($Vuazyvrryre5 as $Vjfepifgo21k) {
				if ((is_string($Vjfepifgo21k)) || ($Vjfepifgo21k === null)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
				$Vv1t0l03554r[$Vn4q2p4mkwa0][$Vexbtekafkvl] = $Vjfepifgo21k;
				++$Vn4q2p4mkwa0;
			}
			if ($Vn4q2p4mkwa0 > $Vezuwhshpw1j) { $Vezuwhshpw1j = $Vn4q2p4mkwa0; }
			++$Vexbtekafkvl;
		}
		if ($Vexbtekafkvl != $Vezuwhshpw1j) { return PHPExcel_Calculation_Functions::VALUE(); }

		try {
			$Vl5loifjeez4 = new PHPExcel_Shared_JAMA_Matrix($Vv1t0l03554r);
			return $Vl5loifjeez4->det();
		} catch (PHPExcel_Exception $Vwyiawxj3bhs) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
	}	


	
	public static function MINVERSE($Vgzh0gh1yjdk) {
		$Vv1t0l03554r = array();
		if (!is_array($Vgzh0gh1yjdk)) { $Vgzh0gh1yjdk = array(array($Vgzh0gh1yjdk)); }

		$Vexbtekafkvl = $Vezuwhshpw1j = 0;
		foreach($Vgzh0gh1yjdk as $Vuazyvrryre5) {
			if (!is_array($Vuazyvrryre5)) { $Vuazyvrryre5 = array($Vuazyvrryre5); }
			$Vn4q2p4mkwa0 = 0;
			foreach($Vuazyvrryre5 as $Vjfepifgo21k) {
				if ((is_string($Vjfepifgo21k)) || ($Vjfepifgo21k === null)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
				$Vv1t0l03554r[$Vn4q2p4mkwa0][$Vexbtekafkvl] = $Vjfepifgo21k;
				++$Vn4q2p4mkwa0;
			}
			if ($Vn4q2p4mkwa0 > $Vezuwhshpw1j) { $Vezuwhshpw1j = $Vn4q2p4mkwa0; }
			++$Vexbtekafkvl;
		}
		if ($Vexbtekafkvl != $Vezuwhshpw1j) { return PHPExcel_Calculation_Functions::VALUE(); }

		try {
			$Vl5loifjeez4 = new PHPExcel_Shared_JAMA_Matrix($Vv1t0l03554r);
			return $Vl5loifjeez4->inverse()->getArray();
		} catch (PHPExcel_Exception $Vwyiawxj3bhs) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
	}	


	
	public static function MMULT($Vv1t0l03554r1,$Vv1t0l03554r2) {
		$Vl5loifjeez4AData = $Vl5loifjeez4BData = array();
		if (!is_array($Vv1t0l03554r1)) { $Vv1t0l03554r1 = array(array($Vv1t0l03554r1)); }
		if (!is_array($Vv1t0l03554r2)) { $Vv1t0l03554r2 = array(array($Vv1t0l03554r2)); }

		$VexbtekafkvlA = 0;
		foreach($Vv1t0l03554r1 as $Vuazyvrryre5) {
			if (!is_array($Vuazyvrryre5)) { $Vuazyvrryre5 = array($Vuazyvrryre5); }
			$Vn4q2p4mkwa0A = 0;
			foreach($Vuazyvrryre5 as $Vjfepifgo21k) {
				if ((is_string($Vjfepifgo21k)) || ($Vjfepifgo21k === null)) {
					return PHPExcel_Calculation_Functions::VALUE();
				}
				$Vl5loifjeez4AData[$VexbtekafkvlA][$Vn4q2p4mkwa0A] = $Vjfepifgo21k;
				++$Vn4q2p4mkwa0A;
			}
			++$VexbtekafkvlA;
		}
		try {
			$Vl5loifjeez4A = new PHPExcel_Shared_JAMA_Matrix($Vl5loifjeez4AData);
			$VexbtekafkvlB = 0;
			foreach($Vv1t0l03554r2 as $Vuazyvrryre5) {
				if (!is_array($Vuazyvrryre5)) { $Vuazyvrryre5 = array($Vuazyvrryre5); }
				$Vn4q2p4mkwa0B = 0;
				foreach($Vuazyvrryre5 as $Vjfepifgo21k) {
					if ((is_string($Vjfepifgo21k)) || ($Vjfepifgo21k === null)) {
						return PHPExcel_Calculation_Functions::VALUE();
					}
					$Vl5loifjeez4BData[$VexbtekafkvlB][$Vn4q2p4mkwa0B] = $Vjfepifgo21k;
					++$Vn4q2p4mkwa0B;
				}
				++$VexbtekafkvlB;
			}
			$Vl5loifjeez4B = new PHPExcel_Shared_JAMA_Matrix($Vl5loifjeez4BData);

			if (($VexbtekafkvlA != $Vn4q2p4mkwa0B) || ($VexbtekafkvlB != $Vn4q2p4mkwa0A)) {
				return PHPExcel_Calculation_Functions::VALUE();
			}

			return $Vl5loifjeez4A->times($Vl5loifjeez4B)->getArray();
		} catch (PHPExcel_Exception $Vwyiawxj3bhs) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
	}	


	
	public static function MOD($Vi3y3l1uvwp3 = 1, $V4t3fwdd3eev = 1) {
		$Vi3y3l1uvwp3		= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3);
		$V4t3fwdd3eev		= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eev);

		if ($V4t3fwdd3eev == 0.0) {
			return PHPExcel_Calculation_Functions::DIV0();
		} elseif (($Vi3y3l1uvwp3 < 0.0) && ($V4t3fwdd3eev > 0.0)) {
			return $V4t3fwdd3eev - fmod(abs($Vi3y3l1uvwp3),$V4t3fwdd3eev);
		} elseif (($Vi3y3l1uvwp3 > 0.0) && ($V4t3fwdd3eev < 0.0)) {
			return $V4t3fwdd3eev + fmod($Vi3y3l1uvwp3,abs($V4t3fwdd3eev));
		}

		return fmod($Vi3y3l1uvwp3,$V4t3fwdd3eev);
	}	


	
	public static function MROUND($Vcgbfu1dtv3lber,$V3lhcmvqvb22) {
		$Vcgbfu1dtv3lber		= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$V3lhcmvqvb22	= PHPExcel_Calculation_Functions::flattenSingleValue($V3lhcmvqvb22);

		if ((is_numeric($Vcgbfu1dtv3lber)) && (is_numeric($V3lhcmvqvb22))) {
			if ($V3lhcmvqvb22 == 0) {
				return 0;
			}
			if ((self::SIGN($Vcgbfu1dtv3lber)) == (self::SIGN($V3lhcmvqvb22))) {
				$Vc54m1cruqby = 1 / $V3lhcmvqvb22;
				return round($Vcgbfu1dtv3lber * $Vc54m1cruqby) / $Vc54m1cruqby;
			}
			return PHPExcel_Calculation_Functions::NaN();
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function MULTINOMIAL() {
		$Vn3xllbkvjad = 0;
		$Vmfmukxaejye = 1;
		
		foreach (PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vi3y3l1uvwp3rg) {
			
			if (is_numeric($Vi3y3l1uvwp3rg)) {
				if ($Vi3y3l1uvwp3rg < 1) {
					return PHPExcel_Calculation_Functions::NaN();
				}
				$Vn3xllbkvjad += floor($Vi3y3l1uvwp3rg);
				$Vmfmukxaejye *= self::FACT($Vi3y3l1uvwp3rg);
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}

		
		if ($Vn3xllbkvjad > 0) {
			$Vn3xllbkvjad = self::FACT($Vn3xllbkvjad);
			return $Vn3xllbkvjad / $Vmfmukxaejye;
		}
		return 0;
	}	


	
	public static function ODD($Vcgbfu1dtv3lber) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);

		if (is_null($Vcgbfu1dtv3lber)) {
			return 1;
		} elseif (is_bool($Vcgbfu1dtv3lber)) {
			$Vcgbfu1dtv3lber = (int) $Vcgbfu1dtv3lber;
		}

		if (is_numeric($Vcgbfu1dtv3lber)) {
			$V3strauzuqqj = self::SIGN($Vcgbfu1dtv3lber);
			if ($V3strauzuqqj == 0) {
				return 1;
			}

			$Vwbpa3giaw5f = self::CEILING($Vcgbfu1dtv3lber,$V3strauzuqqj);
			if ($Vwbpa3giaw5f == self::EVEN($Vwbpa3giaw5f)) {
				$Vwbpa3giaw5f += $V3strauzuqqj;
			}

			return (int) $Vwbpa3giaw5f;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function POWER($V1e1eaicqarh = 0, $Vqwmp2bx0ii2 = 2) {
		$V1e1eaicqarh	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarh);
		$Vqwmp2bx0ii2	= PHPExcel_Calculation_Functions::flattenSingleValue($Vqwmp2bx0ii2);

		
		if ($V1e1eaicqarh == 0.0 && $Vqwmp2bx0ii2 == 0.0) {
			return PHPExcel_Calculation_Functions::NaN();
		} elseif ($V1e1eaicqarh == 0.0 && $Vqwmp2bx0ii2 < 0.0) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		
		$Vwbpa3giaw5f = pow($V1e1eaicqarh, $Vqwmp2bx0ii2);
		return (!is_nan($Vwbpa3giaw5f) && !is_infinite($Vwbpa3giaw5f)) ? $Vwbpa3giaw5f : PHPExcel_Calculation_Functions::NaN();
	}	


	
	public static function PRODUCT() {
		
		$Vbco3t3kne3m = null;

		
		foreach (PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if (is_null($Vbco3t3kne3m)) {
					$Vbco3t3kne3m = $Vi3y3l1uvwp3rg;
				} else {
					$Vbco3t3kne3m *= $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		if (is_null($Vbco3t3kne3m)) {
			return 0;
		}
		return $Vbco3t3kne3m;
	}	


	
	public static function QUOTIENT() {
		
		$Vbco3t3kne3m = null;

		
		foreach (PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if (is_null($Vbco3t3kne3m)) {
					$Vbco3t3kne3m = ($Vi3y3l1uvwp3rg == 0) ? 0 : $Vi3y3l1uvwp3rg;
				} else {
					if (($Vbco3t3kne3m == 0) || ($Vi3y3l1uvwp3rg == 0)) {
						$Vbco3t3kne3m = 0;
					} else {
						$Vbco3t3kne3m /= $Vi3y3l1uvwp3rg;
					}
				}
			}
		}

		
		return intval($Vbco3t3kne3m);
	}	


	
	public static function RAND($Va110n5xyul0 = 0, $Vpu53dziligd = 0) {
		$Va110n5xyul0		= PHPExcel_Calculation_Functions::flattenSingleValue($Va110n5xyul0);
		$Vpu53dziligd		= PHPExcel_Calculation_Functions::flattenSingleValue($Vpu53dziligd);

		if ($Va110n5xyul0 == 0 && $Vpu53dziligd == 0) {
			return (mt_rand(0,10000000)) / 10000000;
		} else {
			return mt_rand($Va110n5xyul0, $Vpu53dziligd);
		}
	}	


	public static function ROMAN($Vi3y3l1uvwp3Value, $Vdtcpflt5bhp=0) {
		$Vi3y3l1uvwp3Value	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3Value);
		$Vdtcpflt5bhp	= (is_null($Vdtcpflt5bhp))	? 0 :	(integer) PHPExcel_Calculation_Functions::flattenSingleValue($Vdtcpflt5bhp);
		if ((!is_numeric($Vi3y3l1uvwp3Value)) || ($Vi3y3l1uvwp3Value < 0) || ($Vi3y3l1uvwp3Value >= 4000)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vi3y3l1uvwp3Value = (integer) $Vi3y3l1uvwp3Value;
		if ($Vi3y3l1uvwp3Value == 0) {
			return '';
		}

		$V1kdiuhb0gqt = Array('', 'M', 'MM', 'MMM', 'MMMM', 'MMMMM');
		$Vp05o104t1uz = Array('', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM');
		$Vai2yu3mzwql = Array('', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC');
		$Vupfmth4rjnx = Array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX');

		$Vgv4mmry0hbn = '';
		while ($Vi3y3l1uvwp3Value > 5999) {
			$Vgv4mmry0hbn .= 'M';
			$Vi3y3l1uvwp3Value -= 1000;
		}
		$Vt54vmttyjzc = self::_romanCut($Vi3y3l1uvwp3Value, 1000);	$Vi3y3l1uvwp3Value %= 1000;
		$V4y0urwpnd3j = self::_romanCut($Vi3y3l1uvwp3Value, 100);		$Vi3y3l1uvwp3Value %= 100;
		$Veca2om3awug = self::_romanCut($Vi3y3l1uvwp3Value, 10);		$Vi3y3l1uvwp3Value %= 10;

		return $Vgv4mmry0hbn.$V1kdiuhb0gqt[$Vt54vmttyjzc].$Vp05o104t1uz[$V4y0urwpnd3j].$Vai2yu3mzwql[$Veca2om3awug].$Vupfmth4rjnx[$Vi3y3l1uvwp3Value];
	}	


	
	public static function ROUNDUP($Vcgbfu1dtv3lber,$Vabcskcjoz0g) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$Vabcskcjoz0g	= PHPExcel_Calculation_Functions::flattenSingleValue($Vabcskcjoz0g);

		if ((is_numeric($Vcgbfu1dtv3lber)) && (is_numeric($Vabcskcjoz0g))) {
			$V3strauzuqqj = pow(10,(int) $Vabcskcjoz0g);
			if ($Vcgbfu1dtv3lber < 0.0) {
				return floor($Vcgbfu1dtv3lber * $V3strauzuqqj) / $V3strauzuqqj;
			} else {
				return ceil($Vcgbfu1dtv3lber * $V3strauzuqqj) / $V3strauzuqqj;
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function ROUNDDOWN($Vcgbfu1dtv3lber,$Vabcskcjoz0g) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);
		$Vabcskcjoz0g	= PHPExcel_Calculation_Functions::flattenSingleValue($Vabcskcjoz0g);

		if ((is_numeric($Vcgbfu1dtv3lber)) && (is_numeric($Vabcskcjoz0g))) {
			$V3strauzuqqj = pow(10,(int) $Vabcskcjoz0g);
			if ($Vcgbfu1dtv3lber < 0.0) {
				return ceil($Vcgbfu1dtv3lber * $V3strauzuqqj) / $V3strauzuqqj;
			} else {
				return floor($Vcgbfu1dtv3lber * $V3strauzuqqj) / $V3strauzuqqj;
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SERIESSUM() {
		
		$Vbco3t3kne3m = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		$V1e1eaicqarh = array_shift($Vi3y3l1uvwp3Args);
		$Vmwwo1qnmepz = array_shift($Vi3y3l1uvwp3Args);
		$Vt54vmttyjzc = array_shift($Vi3y3l1uvwp3Args);

		if ((is_numeric($V1e1eaicqarh)) && (is_numeric($Vmwwo1qnmepz)) && (is_numeric($Vt54vmttyjzc))) {
			
			$Vfhiq1lhsoja = 0;
			foreach($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vbco3t3kne3m += $Vi3y3l1uvwp3rg * pow($V1e1eaicqarh,$Vmwwo1qnmepz + ($Vt54vmttyjzc * $Vfhiq1lhsoja++));
				} else {
					return PHPExcel_Calculation_Functions::VALUE();
				}
			}
			
			return $Vbco3t3kne3m;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SIGN($Vcgbfu1dtv3lber) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);

		if (is_bool($Vcgbfu1dtv3lber))
			return (int) $Vcgbfu1dtv3lber;
		if (is_numeric($Vcgbfu1dtv3lber)) {
			if ($Vcgbfu1dtv3lber == 0.0) {
				return 0;
			}
			return $Vcgbfu1dtv3lber / abs($Vcgbfu1dtv3lber);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SQRTPI($Vcgbfu1dtv3lber) {
		$Vcgbfu1dtv3lber	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcgbfu1dtv3lber);

		if (is_numeric($Vcgbfu1dtv3lber)) {
			if ($Vcgbfu1dtv3lber < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return sqrt($Vcgbfu1dtv3lber * M_PI) ;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SUBTOTAL() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$Vr05z1hql1cj = array_shift($Vi3y3l1uvwp3Args);

		if ((is_numeric($Vr05z1hql1cj)) && (!is_string($Vr05z1hql1cj))) {
			switch($Vr05z1hql1cj) {
				case 1	:
					return PHPExcel_Calculation_Statistical::AVERAGE($Vi3y3l1uvwp3Args);
					break;
				case 2	:
					return PHPExcel_Calculation_Statistical::COUNT($Vi3y3l1uvwp3Args);
					break;
				case 3	:
					return PHPExcel_Calculation_Statistical::COUNTA($Vi3y3l1uvwp3Args);
					break;
				case 4	:
					return PHPExcel_Calculation_Statistical::MAX($Vi3y3l1uvwp3Args);
					break;
				case 5	:
					return PHPExcel_Calculation_Statistical::MIN($Vi3y3l1uvwp3Args);
					break;
				case 6	:
					return self::PRODUCT($Vi3y3l1uvwp3Args);
					break;
				case 7	:
					return PHPExcel_Calculation_Statistical::STDEV($Vi3y3l1uvwp3Args);
					break;
				case 8	:
					return PHPExcel_Calculation_Statistical::STDEVP($Vi3y3l1uvwp3Args);
					break;
				case 9	:
					return self::SUM($Vi3y3l1uvwp3Args);
					break;
				case 10	:
					return PHPExcel_Calculation_Statistical::VARFunc($Vi3y3l1uvwp3Args);
					break;
				case 11	:
					return PHPExcel_Calculation_Statistical::VARP($Vi3y3l1uvwp3Args);
					break;
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function SUM() {
		
		$Vbco3t3kne3m = 0;

		
		foreach (PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vbco3t3kne3m += $Vi3y3l1uvwp3rg;
			}
		}

		
		return $Vbco3t3kne3m;
	}	


	
	public static function SUMIF($Vi3y3l1uvwp3Args,$V4y0urwpnd3jondition,$Vrwwirajn0ks = array()) {
		
		$Vbco3t3kne3m = 0;

		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3Args);
		$Vrwwirajn0ks = PHPExcel_Calculation_Functions::flattenArray($Vrwwirajn0ks);
		if (empty($Vrwwirajn0ks)) {
			$Vrwwirajn0ks = $Vi3y3l1uvwp3Args;
		}
		$V4y0urwpnd3jondition = PHPExcel_Calculation_Functions::_ifCondition($V4y0urwpnd3jondition);
		
		foreach ($Vi3y3l1uvwp3Args as $Vseq1edikdvg => $Vi3y3l1uvwp3rg) {
			if (!is_numeric($Vi3y3l1uvwp3rg)) {
				$Vi3y3l1uvwp3rg = str_replace('"', '""', $Vi3y3l1uvwp3rg);
				$Vi3y3l1uvwp3rg = PHPExcel_Calculation::_wrapResult(strtoupper($Vi3y3l1uvwp3rg));
			}

			$Veca2om3awugestCondition = '='.$Vi3y3l1uvwp3rg.$V4y0urwpnd3jondition;
			if (PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Veca2om3awugestCondition)) {
				
				$Vbco3t3kne3m += $Vrwwirajn0ks[$Vseq1edikdvg];
			}
		}

		
		return $Vbco3t3kne3m;
	}	


	
	public static function SUMPRODUCT() {
		$Vi3y3l1uvwp3rrayList = func_get_args();

		$Vndshjnxp1uh = PHPExcel_Calculation_Functions::flattenArray(array_shift($Vi3y3l1uvwp3rrayList));
		$Vfinimagyvcw = count($Vndshjnxp1uh);

		for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja< $Vfinimagyvcw; ++$Vfhiq1lhsoja) {
			if ((!is_numeric($Vndshjnxp1uh[$Vfhiq1lhsoja])) || (is_string($Vndshjnxp1uh[$Vfhiq1lhsoja]))) {
				$Vndshjnxp1uh[$Vfhiq1lhsoja] = 0;
			}
		}

		foreach($Vi3y3l1uvwp3rrayList as $Vv1t0l03554r) {
			$Vi3y3l1uvwp3rray2 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r);
			$V4y0urwpnd3jount = count($Vi3y3l1uvwp3rray2);
			if ($Vfinimagyvcw != $V4y0urwpnd3jount) {
				return PHPExcel_Calculation_Functions::VALUE();
			}

			foreach ($Vi3y3l1uvwp3rray2 as $Vfhiq1lhsoja => $Vwk2nao2d33x) {
				if ((!is_numeric($Vwk2nao2d33x)) || (is_string($Vwk2nao2d33x))) {
					$Vwk2nao2d33x = 0;
				}
				$Vndshjnxp1uh[$Vfhiq1lhsoja] *= $Vwk2nao2d33x;
			}
		}

		return array_sum($Vndshjnxp1uh);
	}	


	
	public static function SUMSQ() {
		
		$Vbco3t3kne3m = 0;

		
		foreach (PHPExcel_Calculation_Functions::flattenArray(func_get_args()) as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vbco3t3kne3m += ($Vi3y3l1uvwp3rg * $Vi3y3l1uvwp3rg);
			}
		}

		
		return $Vbco3t3kne3m;
	}	


	
	public static function SUMX2MY2($Vv1t0l03554r1,$Vv1t0l03554r2) {
		$Vi3y3l1uvwp3rray1 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r1);
		$Vi3y3l1uvwp3rray2 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r2);
		$V4y0urwpnd3jount1 = count($Vi3y3l1uvwp3rray1);
		$V4y0urwpnd3jount2 = count($Vi3y3l1uvwp3rray2);
		if ($V4y0urwpnd3jount1 < $V4y0urwpnd3jount2) {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount1;
		} else {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount2;
		}

		$Vwbpa3giaw5f = 0;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4y0urwpnd3jount; ++$Vfhiq1lhsoja) {
			if (((is_numeric($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja]))) &&
				((is_numeric($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])))) {
				$Vwbpa3giaw5f += ($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja] * $Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja]) - ($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja] * $Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja]);
			}
		}

		return $Vwbpa3giaw5f;
	}	


	
	public static function SUMX2PY2($Vv1t0l03554r1,$Vv1t0l03554r2) {
		$Vi3y3l1uvwp3rray1 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r1);
		$Vi3y3l1uvwp3rray2 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r2);
		$V4y0urwpnd3jount1 = count($Vi3y3l1uvwp3rray1);
		$V4y0urwpnd3jount2 = count($Vi3y3l1uvwp3rray2);
		if ($V4y0urwpnd3jount1 < $V4y0urwpnd3jount2) {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount1;
		} else {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount2;
		}

		$Vwbpa3giaw5f = 0;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4y0urwpnd3jount; ++$Vfhiq1lhsoja) {
			if (((is_numeric($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja]))) &&
				((is_numeric($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])))) {
				$Vwbpa3giaw5f += ($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja] * $Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja]) + ($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja] * $Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja]);
			}
		}

		return $Vwbpa3giaw5f;
	}	


	
	public static function SUMXMY2($Vv1t0l03554r1,$Vv1t0l03554r2) {
		$Vi3y3l1uvwp3rray1 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r1);
		$Vi3y3l1uvwp3rray2 = PHPExcel_Calculation_Functions::flattenArray($Vv1t0l03554r2);
		$V4y0urwpnd3jount1 = count($Vi3y3l1uvwp3rray1);
		$V4y0urwpnd3jount2 = count($Vi3y3l1uvwp3rray2);
		if ($V4y0urwpnd3jount1 < $V4y0urwpnd3jount2) {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount1;
		} else {
			$V4y0urwpnd3jount = $V4y0urwpnd3jount2;
		}

		$Vwbpa3giaw5f = 0;
		for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $V4y0urwpnd3jount; ++$Vfhiq1lhsoja) {
			if (((is_numeric($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja]))) &&
				((is_numeric($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])) && (!is_string($Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja])))) {
				$Vwbpa3giaw5f += ($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja] - $Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja]) * ($Vi3y3l1uvwp3rray1[$Vfhiq1lhsoja] - $Vi3y3l1uvwp3rray2[$Vfhiq1lhsoja]);
			}
		}

		return $Vwbpa3giaw5f;
	}	


	
	public static function TRUNC($Vp4xjtpabm0l = 0, $Vabcskcjoz0g = 0) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vabcskcjoz0g	= PHPExcel_Calculation_Functions::flattenSingleValue($Vabcskcjoz0g);

		
		if ((!is_numeric($Vp4xjtpabm0l)) || (!is_numeric($Vabcskcjoz0g)))
			return PHPExcel_Calculation_Functions::VALUE();
		$Vabcskcjoz0g	= floor($Vabcskcjoz0g);

		
		$Vi3y3l1uvwp3djust = pow(10, $Vabcskcjoz0g);

		if (($Vabcskcjoz0g > 0) && (rtrim(intval((abs($Vp4xjtpabm0l) - abs(intval($Vp4xjtpabm0l))) * $Vi3y3l1uvwp3djust),'0') < $Vi3y3l1uvwp3djust/10))
			return $Vp4xjtpabm0l;

		return (intval($Vp4xjtpabm0l * $Vi3y3l1uvwp3djust)) / $Vi3y3l1uvwp3djust;
	}	

}	
