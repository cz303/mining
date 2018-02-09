<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}


require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/trendClass.php';



define('LOG_GAMMA_X_MAX_VALUE', 2.55e305);


define('XMININ', 2.23e-308);


define('EPS', 2.22e-16);


define('SQRT2PI', 2.5066282746310005024157652848110452530069867406099);



class PHPExcel_Calculation_Statistical {


	private static function _checkTrendArrays(&$Vbbpocfqyyft,&$V14tj05kel2x) {
		if (!is_array($Vbbpocfqyyft)) { $Vbbpocfqyyft = array($Vbbpocfqyyft); }
		if (!is_array($V14tj05kel2x)) { $V14tj05kel2x = array($V14tj05kel2x); }

		$Vbbpocfqyyft = PHPExcel_Calculation_Functions::flattenArray($Vbbpocfqyyft);
		$V14tj05kel2x = PHPExcel_Calculation_Functions::flattenArray($V14tj05kel2x);
		foreach($Vbbpocfqyyft as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ((is_bool($Vp4xjtpabm0l)) || (is_string($Vp4xjtpabm0l)) || (is_null($Vp4xjtpabm0l))) {
				unset($Vbbpocfqyyft[$Vseq1edikdvg]);
				unset($V14tj05kel2x[$Vseq1edikdvg]);
			}
		}
		foreach($V14tj05kel2x as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if ((is_bool($Vp4xjtpabm0l)) || (is_string($Vp4xjtpabm0l)) || (is_null($Vp4xjtpabm0l))) {
				unset($Vbbpocfqyyft[$Vseq1edikdvg]);
				unset($V14tj05kel2x[$Vseq1edikdvg]);
			}
		}
		$Vbbpocfqyyft = array_merge($Vbbpocfqyyft);
		$V14tj05kel2x = array_merge($V14tj05kel2x);

		return True;
	}	


	
	private static function _beta($Vzqw0ieauwu4, $Vl2c3boclu2o) {
		if ($Vzqw0ieauwu4 <= 0.0 || $Vl2c3boclu2o <= 0.0 || ($Vzqw0ieauwu4 + $Vl2c3boclu2o) > LOG_GAMMA_X_MAX_VALUE) {
			return 0.0;
		} else {
			return exp(self::_logBeta($Vzqw0ieauwu4, $Vl2c3boclu2o));
		}
	}	


	
	private static function _incompleteBeta($V1e1eaicqarh, $Vzqw0ieauwu4, $Vl2c3boclu2o) {
		if ($V1e1eaicqarh <= 0.0) {
			return 0.0;
		} elseif ($V1e1eaicqarh >= 1.0) {
			return 1.0;
		} elseif (($Vzqw0ieauwu4 <= 0.0) || ($Vl2c3boclu2o <= 0.0) || (($Vzqw0ieauwu4 + $Vl2c3boclu2o) > LOG_GAMMA_X_MAX_VALUE)) {
			return 0.0;
		}
		$Vgye1hlnskah = exp((0 - self::_logBeta($Vzqw0ieauwu4, $Vl2c3boclu2o)) + $Vzqw0ieauwu4 * log($V1e1eaicqarh) + $Vl2c3boclu2o * log(1.0 - $V1e1eaicqarh));
		if ($V1e1eaicqarh < ($Vzqw0ieauwu4 + 1.0) / ($Vzqw0ieauwu4 + $Vl2c3boclu2o + 2.0)) {
			return $Vgye1hlnskah * self::_betaFraction($V1e1eaicqarh, $Vzqw0ieauwu4, $Vl2c3boclu2o) / $Vzqw0ieauwu4;
		} else {
			return 1.0 - ($Vgye1hlnskah * self::_betaFraction(1 - $V1e1eaicqarh, $Vl2c3boclu2o, $Vzqw0ieauwu4) / $Vl2c3boclu2o);
		}
	}	


	
	private static $Vooxf3obzvba			= 0.0;
	private static $Vd11pvansody			= 0.0;
	private static $Vucwdhgkbyn5	= 0.0;

	
	private static function _logBeta($Vzqw0ieauwu4, $Vl2c3boclu2o) {
		if ($Vzqw0ieauwu4 != self::$Vooxf3obzvba || $Vl2c3boclu2o != self::$Vd11pvansody) {
			self::$Vooxf3obzvba = $Vzqw0ieauwu4;
			self::$Vd11pvansody = $Vl2c3boclu2o;
			if (($Vzqw0ieauwu4 <= 0.0) || ($Vl2c3boclu2o <= 0.0) || (($Vzqw0ieauwu4 + $Vl2c3boclu2o) > LOG_GAMMA_X_MAX_VALUE)) {
				self::$Vucwdhgkbyn5 = 0.0;
			} else {
				self::$Vucwdhgkbyn5 = self::_logGamma($Vzqw0ieauwu4) + self::_logGamma($Vl2c3boclu2o) - self::_logGamma($Vzqw0ieauwu4 + $Vl2c3boclu2o);
			}
		}
		return self::$Vucwdhgkbyn5;
	}	


	
	private static function _betaFraction($V1e1eaicqarh, $Vzqw0ieauwu4, $Vl2c3boclu2o) {
		$V4y0urwpnd3j = 1.0;
		$Vdnlzysudlmw = $Vzqw0ieauwu4 + $Vl2c3boclu2o;
		$Vzqw0ieauwu4_plus = $Vzqw0ieauwu4 + 1.0;
		$Vzqw0ieauwu4_minus = $Vzqw0ieauwu4 - 1.0;
		$Vvlxmepre4ko = 1.0 - $Vdnlzysudlmw * $V1e1eaicqarh / $Vzqw0ieauwu4_plus;
		if (abs($Vvlxmepre4ko) < XMININ) {
			$Vvlxmepre4ko = XMININ;
		}
		$Vvlxmepre4ko = 1.0 / $Vvlxmepre4ko;
		$Vumeztkoimxg = $Vvlxmepre4ko;
		$Vt54vmttyjzc	 = 1;
		$V4jxxjosqkw5 = 0.0;
		while ($Vt54vmttyjzc <= MAX_ITERATIONS && abs($V4jxxjosqkw5-1.0) > PRECISION ) {
			$Vt54vmttyjzc2 = 2 * $Vt54vmttyjzc;
			
			$Vrec2f1japon = $Vt54vmttyjzc * ($Vl2c3boclu2o - $Vt54vmttyjzc) * $V1e1eaicqarh / ( ($Vzqw0ieauwu4_minus + $Vt54vmttyjzc2) * ($Vzqw0ieauwu4 + $Vt54vmttyjzc2));
			$Vvlxmepre4ko = 1.0 + $Vrec2f1japon * $Vvlxmepre4ko;
			if (abs($Vvlxmepre4ko) < XMININ) {
				$Vvlxmepre4ko = XMININ;
			}
			$Vvlxmepre4ko = 1.0 / $Vvlxmepre4ko;
			$V4y0urwpnd3j = 1.0 + $Vrec2f1japon / $V4y0urwpnd3j;
			if (abs($V4y0urwpnd3j) < XMININ) {
				$V4y0urwpnd3j = XMININ;
			}
			$Vumeztkoimxg *= $Vvlxmepre4ko * $V4y0urwpnd3j;
			
			$Vrec2f1japon = -($Vzqw0ieauwu4 + $Vt54vmttyjzc) * ($Vdnlzysudlmw + $Vt54vmttyjzc) * $V1e1eaicqarh / (($Vzqw0ieauwu4 + $Vt54vmttyjzc2) * ($Vzqw0ieauwu4_plus + $Vt54vmttyjzc2));
			$Vvlxmepre4ko = 1.0 + $Vrec2f1japon * $Vvlxmepre4ko;
			if (abs($Vvlxmepre4ko) < XMININ) {
				$Vvlxmepre4ko = XMININ;
			}
			$Vvlxmepre4ko = 1.0 / $Vvlxmepre4ko;
			$V4y0urwpnd3j = 1.0 + $Vrec2f1japon / $V4y0urwpnd3j;
			if (abs($V4y0urwpnd3j) < XMININ) {
				$V4y0urwpnd3j = XMININ;
			}
			$V4jxxjosqkw5 = $Vvlxmepre4ko * $V4y0urwpnd3j;
			$Vumeztkoimxg *= $V4jxxjosqkw5;
			++$Vt54vmttyjzc;
		}
		return $Vumeztkoimxg;
	}	


	

	
	private static $Vlascbnvpgpi	= 0.0;
	private static $Vsxfyrsesrle		= 0.0;

	private static function _logGamma($V1e1eaicqarh) {
		
		static $Vktj3zcesj13 = -0.5772156649015328605195174;
		static $Vagwt2n1vwoj = 0.4227843350984671393993777;
		static $Vbxb4n1fgval = 1.791759469228055000094023;

		static $Vmggvkv1c53f = array(	4.945235359296727046734888,
								201.8112620856775083915565,
								2290.838373831346393026739,
								11319.67205903380828685045,
								28557.24635671635335736389,
								38484.96228443793359990269,
								26377.48787624195437963534,
								7225.813979700288197698961 );
		static $Ve3qgmclt15h = array(	4.974607845568932035012064,
								542.4138599891070494101986,
								15506.93864978364947665077,
								184793.2904445632425417223,
								1088204.76946882876749847,
								3338152.967987029735917223,
								5106661.678927352456275255,
								3074109.054850539556250927 );
		static $Vkldipl0h1lg = array(	14745.02166059939948905062,
								2426813.369486704502836312,
								121475557.4045093227939592,
								2663432449.630976949898078,
								29403789566.34553899906876,
								170266573776.5398868392998,
								492612579337.743088758812,
								560625185622.3951465078242 );

		static $Vvlurt15cvlm = array(	67.48212550303777196073036,
								1113.332393857199323513008,
								7738.757056935398733233834,
								27639.87074403340708898585,
								54993.10206226157329794414,
								61611.22180066002127833352,
								36351.27591501940507276287,
								8785.536302431013170870835 );
		static $Vh10bdvlxfca = array(	183.0328399370592604055942,
								7765.049321445005871323047,
								133190.3827966074194402448,
								1136705.821321969608938755,
								5267964.117437946917577538,
								13467014.54311101692290052,
								17827365.30353274213975932,
								9533095.591844353613395747 );
		static $Vb0k2shs2jkx = array(	2690.530175870899333379843,
								639388.5654300092398984238,
								41355999.30241388052042842,
								1120872109.61614794137657,
								14886137286.78813811542398,
								101680358627.2438228077304,
								341747634550.7377132798597,
								446315818741.9713286462081 );

		static $Vwb1ie0dh2au  = array(	-0.001910444077728,
								8.4171387781295e-4,
								-5.952379913043012e-4,
								7.93650793500350248e-4,
								-0.002777777777777681622553,
								0.08333333333333333331554247,
								0.0057083835261 );

	
	static $V0ev0hn1ndwq = 2.25e76;
	static $Vzqw0ieauwu4nt68	 = 0.6796875;


	if ($V1e1eaicqarh == self::$Vsxfyrsesrle) {
		return self::$Vlascbnvpgpi;
	}
	$Vqwmp2bx0ii2 = $V1e1eaicqarh;
	if ($Vqwmp2bx0ii2 > 0.0 && $Vqwmp2bx0ii2 <= LOG_GAMMA_X_MAX_VALUE) {
		if ($Vqwmp2bx0ii2 <= EPS) {
			$Ve3oeikqcm5n = -log(y);
		} elseif ($Vqwmp2bx0ii2 <= 1.5) {
			
			
			
			if ($Vqwmp2bx0ii2 < $Vzqw0ieauwu4nt68) {
				$V4y0urwpnd3jorr = -log($Vqwmp2bx0ii2);
				$V1e1eaicqarhm1 = $Vqwmp2bx0ii2;
			} else {
				$V4y0urwpnd3jorr = 0.0;
				$V1e1eaicqarhm1 = $Vqwmp2bx0ii2 - 1.0;
			}
			if ($Vqwmp2bx0ii2 <= 0.5 || $Vqwmp2bx0ii2 >= $Vzqw0ieauwu4nt68) {
				$V1e1eaicqarhden = 1.0;
				$V1e1eaicqarhnum = 0.0;
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 8; ++$Vfhiq1lhsoja) {
					$V1e1eaicqarhnum = $V1e1eaicqarhnum * $V1e1eaicqarhm1 + $Vmggvkv1c53f[$Vfhiq1lhsoja];
					$V1e1eaicqarhden = $V1e1eaicqarhden * $V1e1eaicqarhm1 + $Vvlurt15cvlm[$Vfhiq1lhsoja];
				}
				$Ve3oeikqcm5n = $V4y0urwpnd3jorr + $V1e1eaicqarhm1 * ($Vktj3zcesj13 + $V1e1eaicqarhm1 * ($V1e1eaicqarhnum / $V1e1eaicqarhden));
			} else {
				$V1e1eaicqarhm2 = $Vqwmp2bx0ii2 - 1.0;
				$V1e1eaicqarhden = 1.0;
				$V1e1eaicqarhnum = 0.0;
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 8; ++$Vfhiq1lhsoja) {
					$V1e1eaicqarhnum = $V1e1eaicqarhnum * $V1e1eaicqarhm2 + $Ve3qgmclt15h[$Vfhiq1lhsoja];
					$V1e1eaicqarhden = $V1e1eaicqarhden * $V1e1eaicqarhm2 + $Vh10bdvlxfca[$Vfhiq1lhsoja];
				}
				$Ve3oeikqcm5n = $V4y0urwpnd3jorr + $V1e1eaicqarhm2 * ($Vagwt2n1vwoj + $V1e1eaicqarhm2 * ($V1e1eaicqarhnum / $V1e1eaicqarhden));
			}
		} elseif ($Vqwmp2bx0ii2 <= 4.0) {
			
			
			
			$V1e1eaicqarhm2 = $Vqwmp2bx0ii2 - 2.0;
			$V1e1eaicqarhden = 1.0;
			$V1e1eaicqarhnum = 0.0;
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 8; ++$Vfhiq1lhsoja) {
				$V1e1eaicqarhnum = $V1e1eaicqarhnum * $V1e1eaicqarhm2 + $Ve3qgmclt15h[$Vfhiq1lhsoja];
				$V1e1eaicqarhden = $V1e1eaicqarhden * $V1e1eaicqarhm2 + $Vh10bdvlxfca[$Vfhiq1lhsoja];
			}
			$Ve3oeikqcm5n = $V1e1eaicqarhm2 * ($Vagwt2n1vwoj + $V1e1eaicqarhm2 * ($V1e1eaicqarhnum / $V1e1eaicqarhden));
		} elseif ($Vqwmp2bx0ii2 <= 12.0) {
			
			
			
			$V1e1eaicqarhm4 = $Vqwmp2bx0ii2 - 4.0;
			$V1e1eaicqarhden = -1.0;
			$V1e1eaicqarhnum = 0.0;
			for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 8; ++$Vfhiq1lhsoja) {
				$V1e1eaicqarhnum = $V1e1eaicqarhnum * $V1e1eaicqarhm4 + $Vkldipl0h1lg[$Vfhiq1lhsoja];
				$V1e1eaicqarhden = $V1e1eaicqarhden * $V1e1eaicqarhm4 + $Vb0k2shs2jkx[$Vfhiq1lhsoja];
			}
			$Ve3oeikqcm5n = $Vbxb4n1fgval + $V1e1eaicqarhm4 * ($V1e1eaicqarhnum / $V1e1eaicqarhden);
		} else {
			
			
			
			$Ve3oeikqcm5n = 0.0;
			if ($Vqwmp2bx0ii2 <= $V0ev0hn1ndwq) {
				$Ve3oeikqcm5n = $Vwb1ie0dh2au[6];
				$Vqwmp2bx0ii2sq = $Vqwmp2bx0ii2 * $Vqwmp2bx0ii2;
				for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < 6; ++$Vfhiq1lhsoja)
					$Ve3oeikqcm5n = $Ve3oeikqcm5n / $Vqwmp2bx0ii2sq + $Vwb1ie0dh2au[$Vfhiq1lhsoja];
				}
				$Ve3oeikqcm5n /= $Vqwmp2bx0ii2;
				$V4y0urwpnd3jorr = log($Vqwmp2bx0ii2);
				$Ve3oeikqcm5n = $Ve3oeikqcm5n + log(SQRT2PI) - 0.5 * $V4y0urwpnd3jorr;
				$Ve3oeikqcm5n += $Vqwmp2bx0ii2 * ($V4y0urwpnd3jorr - 1.0);
			}
		} else {
			
			
			
			$Ve3oeikqcm5n = MAX_VALUE;
		}
		
		
		
		self::$Vsxfyrsesrle = $V1e1eaicqarh;
		self::$Vlascbnvpgpi = $Ve3oeikqcm5n;
		return $Ve3oeikqcm5n;
	}	


	
	
	
	private static function _incompleteGamma($Vi3y3l1uvwp3,$V1e1eaicqarh) {
		static $Vt54vmttyjzcax = 32;
		$Vn3xllbkvjad = 0;
		for ($Vmwwo1qnmepz=0; $Vmwwo1qnmepz<=$Vt54vmttyjzcax; ++$Vmwwo1qnmepz) {
			$Vrec2f1japonivisor = $Vi3y3l1uvwp3;
			for ($Vfhiq1lhsoja=1; $Vfhiq1lhsoja<=$Vmwwo1qnmepz; ++$Vfhiq1lhsoja) {
				$Vrec2f1japonivisor *= ($Vi3y3l1uvwp3 + $Vfhiq1lhsoja);
			}
			$Vn3xllbkvjad += (pow($V1e1eaicqarh,$Vmwwo1qnmepz) / $Vrec2f1japonivisor);
		}
		return pow($V1e1eaicqarh,$Vi3y3l1uvwp3) * exp(0-$V1e1eaicqarh) * $Vn3xllbkvjad;
	}	


	
	
	
	private static function _gamma($Vrec2f1japonata) {
		if ($Vrec2f1japonata == 0.0) return 0;

		static $Vzqw0ieauwu40 = 1.000000000190015;
		static $Vzqw0ieauwu4 = array ( 1 => 76.18009172947146,
							2 => -86.50532032941677,
							3 => 24.01409824083091,
							4 => -1.231739572450155,
							5 => 1.208650973866179e-3,
							6 => -5.395239384953e-6
						  );

		$Vqwmp2bx0ii2 = $V1e1eaicqarh = $Vrec2f1japonata;
		$Vdln1z2oxpjs = $V1e1eaicqarh + 5.5;
		$Vdln1z2oxpjs -= ($V1e1eaicqarh + 0.5) * log($Vdln1z2oxpjs);

		$Vn3xllbkvjad = $Vzqw0ieauwu40;
		for ($Vzmnqyqjjodw=1;$Vzmnqyqjjodw<=6;++$Vzmnqyqjjodw) {
			$Vn3xllbkvjad += ($Vzqw0ieauwu4[$Vzmnqyqjjodw] / ++$Vqwmp2bx0ii2);
		}
		return exp(0 - $Vdln1z2oxpjs + log(SQRT2PI * $Vn3xllbkvjad / $V1e1eaicqarh));
	}	


	
	private static function _inverse_ncdf($Vzqw0ieauwu4) {
		
		
		
		
		

		
		
		

		

		
		static $Vi3y3l1uvwp3 = array(	1 => -3.969683028665376e+01,
							2 => 2.209460984245205e+02,
							3 => -2.759285104469687e+02,
							4 => 1.383577518672690e+02,
							5 => -3.066479806614716e+01,
							6 => 2.506628277459239e+00
						 );

		static $V4t3fwdd3eev = array(	1 => -5.447609879822406e+01,
							2 => 1.615858368580409e+02,
							3 => -1.556989798598866e+02,
							4 => 6.680131188771972e+01,
							5 => -1.328068155288572e+01
						 );

		static $V4y0urwpnd3j = array(	1 => -7.784894002430293e-03,
							2 => -3.223964580411365e-01,
							3 => -2.400758277161838e+00,
							4 => -2.549732539343734e+00,
							5 => 4.374664141464968e+00,
							6 => 2.938163982698783e+00
						 );

		static $Vrec2f1japon = array(	1 => 7.784695709041462e-03,
							2 => 3.224671290700398e-01,
							3 => 2.445134137142996e+00,
							4 => 3.754408661907416e+00
						 );

		
		$Vzqw0ieauwu4_low = 0.02425;			
		$Vzqw0ieauwu4_high = 1 - $Vzqw0ieauwu4_low;		

		if (0 < $Vzqw0ieauwu4 && $Vzqw0ieauwu4 < $Vzqw0ieauwu4_low) {
			
			$Vl2c3boclu2o = sqrt(-2 * log($Vzqw0ieauwu4));
			return ((((($V4y0urwpnd3j[1] * $Vl2c3boclu2o + $V4y0urwpnd3j[2]) * $Vl2c3boclu2o + $V4y0urwpnd3j[3]) * $Vl2c3boclu2o + $V4y0urwpnd3j[4]) * $Vl2c3boclu2o + $V4y0urwpnd3j[5]) * $Vl2c3boclu2o + $V4y0urwpnd3j[6]) /
					(((($Vrec2f1japon[1] * $Vl2c3boclu2o + $Vrec2f1japon[2]) * $Vl2c3boclu2o + $Vrec2f1japon[3]) * $Vl2c3boclu2o + $Vrec2f1japon[4]) * $Vl2c3boclu2o + 1);
		} elseif ($Vzqw0ieauwu4_low <= $Vzqw0ieauwu4 && $Vzqw0ieauwu4 <= $Vzqw0ieauwu4_high) {
			
			$Vl2c3boclu2o = $Vzqw0ieauwu4 - 0.5;
			$Vws44nszhvgo = $Vl2c3boclu2o * $Vl2c3boclu2o;
			return ((((($Vi3y3l1uvwp3[1] * $Vws44nszhvgo + $Vi3y3l1uvwp3[2]) * $Vws44nszhvgo + $Vi3y3l1uvwp3[3]) * $Vws44nszhvgo + $Vi3y3l1uvwp3[4]) * $Vws44nszhvgo + $Vi3y3l1uvwp3[5]) * $Vws44nszhvgo + $Vi3y3l1uvwp3[6]) * $Vl2c3boclu2o /
				   ((((($V4t3fwdd3eev[1] * $Vws44nszhvgo + $V4t3fwdd3eev[2]) * $Vws44nszhvgo + $V4t3fwdd3eev[3]) * $Vws44nszhvgo + $V4t3fwdd3eev[4]) * $Vws44nszhvgo + $V4t3fwdd3eev[5]) * $Vws44nszhvgo + 1);
		} elseif ($Vzqw0ieauwu4_high < $Vzqw0ieauwu4 && $Vzqw0ieauwu4 < 1) {
			
			$Vl2c3boclu2o = sqrt(-2 * log(1 - $Vzqw0ieauwu4));
			return -((((($V4y0urwpnd3j[1] * $Vl2c3boclu2o + $V4y0urwpnd3j[2]) * $Vl2c3boclu2o + $V4y0urwpnd3j[3]) * $Vl2c3boclu2o + $V4y0urwpnd3j[4]) * $Vl2c3boclu2o + $V4y0urwpnd3j[5]) * $Vl2c3boclu2o + $V4y0urwpnd3j[6]) /
					 (((($Vrec2f1japon[1] * $Vl2c3boclu2o + $Vrec2f1japon[2]) * $Vl2c3boclu2o + $Vrec2f1japon[3]) * $Vl2c3boclu2o + $Vrec2f1japon[4]) * $Vl2c3boclu2o + 1);
		}
		
		return PHPExcel_Calculation_Functions::NULL();
	}	


	private static function _inverse_ncdf2($Vzqw0ieauwu4rob) {
		
		

		$Vi3y3l1uvwp31 = 2.50662823884;
		$Vi3y3l1uvwp32 = -18.61500062529;
		$Vi3y3l1uvwp33 = 41.39119773534;
		$Vi3y3l1uvwp34 = -25.44106049637;

		$V4t3fwdd3eev1 = -8.4735109309;
		$V4t3fwdd3eev2 = 23.08336743743;
		$V4t3fwdd3eev3 = -21.06224101826;
		$V4t3fwdd3eev4 = 3.13082909833;

		$V4y0urwpnd3j1 = 0.337475482272615;
		$V4y0urwpnd3j2 = 0.976169019091719;
		$V4y0urwpnd3j3 = 0.160797971491821;
		$V4y0urwpnd3j4 = 2.76438810333863E-02;
		$V4y0urwpnd3j5 = 3.8405729373609E-03;
		$V4y0urwpnd3j6 = 3.951896511919E-04;
		$V4y0urwpnd3j7 = 3.21767881768E-05;
		$V4y0urwpnd3j8 = 2.888167364E-07;
		$V4y0urwpnd3j9 = 3.960315187E-07;

		$Vqwmp2bx0ii2 = $Vzqw0ieauwu4rob - 0.5;
		if (abs($Vqwmp2bx0ii2) < 0.42) {
			$V3pn4yoebl40 = ($Vqwmp2bx0ii2 * $Vqwmp2bx0ii2);
			$V3pn4yoebl40 = $Vqwmp2bx0ii2 * ((($Vi3y3l1uvwp34 * $V3pn4yoebl40 + $Vi3y3l1uvwp33) * $V3pn4yoebl40 + $Vi3y3l1uvwp32) * $V3pn4yoebl40 + $Vi3y3l1uvwp31) / (((($V4t3fwdd3eev4 * $V3pn4yoebl40 + $V4t3fwdd3eev3) * $V3pn4yoebl40 + $V4t3fwdd3eev2) * $V3pn4yoebl40 + $V4t3fwdd3eev1) * $V3pn4yoebl40 + 1);
		} else {
			if ($Vqwmp2bx0ii2 > 0) {
				$V3pn4yoebl40 = log(-log(1 - $Vzqw0ieauwu4rob));
			} else {
				$V3pn4yoebl40 = log(-log($Vzqw0ieauwu4rob));
			}
			$V3pn4yoebl40 = $V4y0urwpnd3j1 + $V3pn4yoebl40 * ($V4y0urwpnd3j2 + $V3pn4yoebl40 * ($V4y0urwpnd3j3 + $V3pn4yoebl40 * ($V4y0urwpnd3j4 + $V3pn4yoebl40 * ($V4y0urwpnd3j5 + $V3pn4yoebl40 * ($V4y0urwpnd3j6 + $V3pn4yoebl40 * ($V4y0urwpnd3j7 + $V3pn4yoebl40 * ($V4y0urwpnd3j8 + $V3pn4yoebl40 * $V4y0urwpnd3j9)))))));
			if ($Vqwmp2bx0ii2 < 0) {
				$V3pn4yoebl40 = -$V3pn4yoebl40;
			}
		}
		return $V3pn4yoebl40;
	}	


	private static function _inverse_ncdf3($Vzqw0ieauwu4) {
		
		
		
		
		
		
		$Vfvwpvfgg4bw = 0.425;
		$Vdqasktx3r4f = 5;
		$V4y0urwpnd3jonst1 = 0.180625;
		$V4y0urwpnd3jonst2 = 1.6;

		
		$Vi3y3l1uvwp30 = 3.3871328727963666080;
		$Vi3y3l1uvwp31 = 1.3314166789178437745E+2;
		$Vi3y3l1uvwp32 = 1.9715909503065514427E+3;
		$Vi3y3l1uvwp33 = 1.3731693765509461125E+4;
		$Vi3y3l1uvwp34 = 4.5921953931549871457E+4;
		$Vi3y3l1uvwp35 = 6.7265770927008700853E+4;
		$Vi3y3l1uvwp36 = 3.3430575583588128105E+4;
		$Vi3y3l1uvwp37 = 2.5090809287301226727E+3;

		$V4t3fwdd3eev1 = 4.2313330701600911252E+1;
		$V4t3fwdd3eev2 = 6.8718700749205790830E+2;
		$V4t3fwdd3eev3 = 5.3941960214247511077E+3;
		$V4t3fwdd3eev4 = 2.1213794301586595867E+4;
		$V4t3fwdd3eev5 = 3.9307895800092710610E+4;
		$V4t3fwdd3eev6 = 2.8729085735721942674E+4;
		$V4t3fwdd3eev7 = 5.2264952788528545610E+3;

		
		$V4y0urwpnd3j0 = 1.42343711074968357734;
		$V4y0urwpnd3j1 = 4.63033784615654529590;
		$V4y0urwpnd3j2 = 5.76949722146069140550;
		$V4y0urwpnd3j3 = 3.64784832476320460504;
		$V4y0urwpnd3j4 = 1.27045825245236838258;
		$V4y0urwpnd3j5 = 2.41780725177450611770E-1;
		$V4y0urwpnd3j6 = 2.27238449892691845833E-2;
		$V4y0urwpnd3j7 = 7.74545014278341407640E-4;

		$Vrec2f1japon1 = 2.05319162663775882187;
		$Vrec2f1japon2 = 1.67638483018380384940;
		$Vrec2f1japon3 = 6.89767334985100004550E-1;
		$Vrec2f1japon4 = 1.48103976427480074590E-1;
		$Vrec2f1japon5 = 1.51986665636164571966E-2;
		$Vrec2f1japon6 = 5.47593808499534494600E-4;
		$Vrec2f1japon7 = 1.05075007164441684324E-9;

		
		$Vp5vaacaxzke = 6.65790464350110377720;
		$Vbc0k5ff2nda = 5.46378491116411436990;
		$Vxqjlm1zsuhv = 1.78482653991729133580;
		$V0yd4vpf3klf = 2.96560571828504891230E-1;
		$Ve1ykyspnvms = 2.65321895265761230930E-2;
		$Vxxfwtlg1rww = 1.24266094738807843860E-3;
		$V3tujnpu4si3 = 2.71155556874348757815E-5;
		$Vaxeqm340veu = 2.01033439929228813265E-7;

		$Vghf0bdjit22 = 5.99832206555887937690E-1;
		$Vorb41dfrszd = 1.36929880922735805310E-1;
		$Vpymtb5byk3b = 1.48753612908506148525E-2;
		$Vgnqvdwj2oxi = 7.86869131145613259100E-4;
		$V4f2ojrevrwh = 1.84631831751005468180E-5;
		$Vq0su33c1nbz = 1.42151175831644588870E-7;
		$Vrd2uqwlkhim = 2.04426310338993978564E-15;

		$Vl2c3boclu2o = $Vzqw0ieauwu4 - 0.5;

		
		if (abs($Vl2c3boclu2o) <= split1) {
			$Vwulsk14oxlp = $V4y0urwpnd3jonst1 - $Vl2c3boclu2o * $Vl2c3boclu2o;
			$V3pn4yoebl40 = $Vl2c3boclu2o * ((((((($Vi3y3l1uvwp37 * $Vwulsk14oxlp + $Vi3y3l1uvwp36) * $Vwulsk14oxlp + $Vi3y3l1uvwp35) * $Vwulsk14oxlp + $Vi3y3l1uvwp34) * $Vwulsk14oxlp + $Vi3y3l1uvwp33) * $Vwulsk14oxlp + $Vi3y3l1uvwp32) * $Vwulsk14oxlp + $Vi3y3l1uvwp31) * $Vwulsk14oxlp + $Vi3y3l1uvwp30) /
					  ((((((($V4t3fwdd3eev7 * $Vwulsk14oxlp + $V4t3fwdd3eev6) * $Vwulsk14oxlp + $V4t3fwdd3eev5) * $Vwulsk14oxlp + $V4t3fwdd3eev4) * $Vwulsk14oxlp + $V4t3fwdd3eev3) * $Vwulsk14oxlp + $V4t3fwdd3eev2) * $Vwulsk14oxlp + $V4t3fwdd3eev1) * $Vwulsk14oxlp + 1);
		} else {
			if ($Vl2c3boclu2o < 0) {
				$Vwulsk14oxlp = $Vzqw0ieauwu4;
			} else {
				$Vwulsk14oxlp = 1 - $Vzqw0ieauwu4;
			}
			$Vwulsk14oxlp = pow(-log($Vwulsk14oxlp),2);

			
			If ($Vwulsk14oxlp <= $Vdqasktx3r4f) {
				$Vwulsk14oxlp = $Vwulsk14oxlp - $V4y0urwpnd3jonst2;
				$V3pn4yoebl40 = ((((((($V4y0urwpnd3j7 * $Vwulsk14oxlp + $V4y0urwpnd3j6) * $Vwulsk14oxlp + $V4y0urwpnd3j5) * $Vwulsk14oxlp + $V4y0urwpnd3j4) * $Vwulsk14oxlp + $V4y0urwpnd3j3) * $Vwulsk14oxlp + $V4y0urwpnd3j2) * $Vwulsk14oxlp + $V4y0urwpnd3j1) * $Vwulsk14oxlp + $V4y0urwpnd3j0) /
					 ((((((($Vrec2f1japon7 * $Vwulsk14oxlp + $Vrec2f1japon6) * $Vwulsk14oxlp + $Vrec2f1japon5) * $Vwulsk14oxlp + $Vrec2f1japon4) * $Vwulsk14oxlp + $Vrec2f1japon3) * $Vwulsk14oxlp + $Vrec2f1japon2) * $Vwulsk14oxlp + $Vrec2f1japon1) * $Vwulsk14oxlp + 1);
			} else {
			
				$Vwulsk14oxlp = $Vwulsk14oxlp - $Vdqasktx3r4f;
				$V3pn4yoebl40 = ((((((($Vaxeqm340veu * $Vwulsk14oxlp + $V3tujnpu4si3) * $Vwulsk14oxlp + $Vxxfwtlg1rww) * $Vwulsk14oxlp + $Ve1ykyspnvms) * $Vwulsk14oxlp + $V0yd4vpf3klf) * $Vwulsk14oxlp + $Vxqjlm1zsuhv) * $Vwulsk14oxlp + $Vbc0k5ff2nda) * $Vwulsk14oxlp + $Vp5vaacaxzke) /
					 ((((((($Vrd2uqwlkhim * $Vwulsk14oxlp + $Vq0su33c1nbz) * $Vwulsk14oxlp + $V4f2ojrevrwh) * $Vwulsk14oxlp + $Vgnqvdwj2oxi) * $Vwulsk14oxlp + $Vpymtb5byk3b) * $Vwulsk14oxlp + $Vorb41dfrszd) * $Vwulsk14oxlp + $Vghf0bdjit22) * $Vwulsk14oxlp + 1);
			}
			if ($Vl2c3boclu2o < 0) {
				$V3pn4yoebl40 = -$V3pn4yoebl40;
			}
		}
		return $V3pn4yoebl40;
	}	


	
	public static function AVEDEV() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGE($Vi3y3l1uvwp3Args);
		if ($Vi3y3l1uvwp3Mean != PHPExcel_Calculation_Functions::DIV0()) {
			$Vi3y3l1uvwp3Count = 0;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				}
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					if (is_null($Vws44nszhvgoeturnValue)) {
						$Vws44nszhvgoeturnValue = abs($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean);
					} else {
						$Vws44nszhvgoeturnValue += abs($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean);
					}
					++$Vi3y3l1uvwp3Count;
				}
			}

			
			if ($Vi3y3l1uvwp3Count == 0) {
				return PHPExcel_Calculation_Functions::DIV0();
			}
			return $Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count;
		}
		return PHPExcel_Calculation_Functions::NaN();
	}	


	
	public static function AVERAGE() {
		$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3Count = 0;

		
		foreach (PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args()) as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_bool($Vi3y3l1uvwp3rg)) &&
				((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
				$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
			}
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if (is_null($Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				} else {
					$Vws44nszhvgoeturnValue += $Vi3y3l1uvwp3rg;
				}
				++$Vi3y3l1uvwp3Count;
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			return $Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count;
		} else {
			return PHPExcel_Calculation_Functions::DIV0();
		}
	}	


	
	public static function AVERAGEA() {
		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Count = 0;
		
		foreach (PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args()) as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_bool($Vi3y3l1uvwp3rg)) &&
				(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
			} else {
				if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) && ($Vi3y3l1uvwp3rg != '')))) {
					if (is_bool($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
					} elseif (is_string($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = 0;
					}
					if (is_null($Vws44nszhvgoeturnValue)) {
						$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
					} else {
						$Vws44nszhvgoeturnValue += $Vi3y3l1uvwp3rg;
					}
					++$Vi3y3l1uvwp3Count;
				}
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			return $Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count;
		} else {
			return PHPExcel_Calculation_Functions::DIV0();
		}
	}	


	
	public static function AVERAGEIF($Vi3y3l1uvwp3Args,$V4y0urwpnd3jondition,$Vi3y3l1uvwp3verageArgs = array()) {
		
		$Vws44nszhvgoeturnValue = 0;

		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3Args);
		$Vi3y3l1uvwp3verageArgs = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3verageArgs);
		if (empty($Vi3y3l1uvwp3verageArgs)) {
			$Vi3y3l1uvwp3verageArgs = $Vi3y3l1uvwp3Args;
		}
		$V4y0urwpnd3jondition = PHPExcel_Calculation_Functions::_ifCondition($V4y0urwpnd3jondition);
		
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $Vseq1edikdvg => $Vi3y3l1uvwp3rg) {
			if (!is_numeric($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = PHPExcel_Calculation::_wrapResult(strtoupper($Vi3y3l1uvwp3rg)); }
			$Vyiqw305bhrl = '='.$Vi3y3l1uvwp3rg.$V4y0urwpnd3jondition;
			if (PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Vyiqw305bhrl)) {
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg > $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue += $Vi3y3l1uvwp3rg;
					++$Vi3y3l1uvwp3Count;
				}
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			return $Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count;
		} else {
			return PHPExcel_Calculation_Functions::DIV0();
		}
	}	


	
	public static function BETADIST($Vp4xjtpabm0l,$Vi3y3l1uvwp3lpha,$V4t3fwdd3eeveta,$Vws44nszhvgoMin=0,$Vws44nszhvgoMax=1) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vi3y3l1uvwp3lpha	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);
		$V4t3fwdd3eeveta	= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eeveta);
		$Vws44nszhvgoMin	= PHPExcel_Calculation_Functions::flattenSingleValue($Vws44nszhvgoMin);
		$Vws44nszhvgoMax	= PHPExcel_Calculation_Functions::flattenSingleValue($Vws44nszhvgoMax);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vi3y3l1uvwp3lpha)) && (is_numeric($V4t3fwdd3eeveta)) && (is_numeric($Vws44nszhvgoMin)) && (is_numeric($Vws44nszhvgoMax))) {
			if (($Vp4xjtpabm0l < $Vws44nszhvgoMin) || ($Vp4xjtpabm0l > $Vws44nszhvgoMax) || ($Vi3y3l1uvwp3lpha <= 0) || ($V4t3fwdd3eeveta <= 0) || ($Vws44nszhvgoMin == $Vws44nszhvgoMax)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ($Vws44nszhvgoMin > $Vws44nszhvgoMax) {
				$Vdln1z2oxpjs = $Vws44nszhvgoMin;
				$Vws44nszhvgoMin = $Vws44nszhvgoMax;
				$Vws44nszhvgoMax = $Vdln1z2oxpjs;
			}
			$Vp4xjtpabm0l -= $Vws44nszhvgoMin;
			$Vp4xjtpabm0l /= ($Vws44nszhvgoMax - $Vws44nszhvgoMin);
			return self::_incompleteBeta($Vp4xjtpabm0l,$Vi3y3l1uvwp3lpha,$V4t3fwdd3eeveta);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function BETAINV($Vzqw0ieauwu4robability,$Vi3y3l1uvwp3lpha,$V4t3fwdd3eeveta,$Vws44nszhvgoMin=0,$Vws44nszhvgoMax=1) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vi3y3l1uvwp3lpha			= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);
		$V4t3fwdd3eeveta			= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eeveta);
		$Vws44nszhvgoMin			= PHPExcel_Calculation_Functions::flattenSingleValue($Vws44nszhvgoMin);
		$Vws44nszhvgoMax			= PHPExcel_Calculation_Functions::flattenSingleValue($Vws44nszhvgoMax);

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vi3y3l1uvwp3lpha)) && (is_numeric($V4t3fwdd3eeveta)) && (is_numeric($Vws44nszhvgoMin)) && (is_numeric($Vws44nszhvgoMax))) {
			if (($Vi3y3l1uvwp3lpha <= 0) || ($V4t3fwdd3eeveta <= 0) || ($Vws44nszhvgoMin == $Vws44nszhvgoMax) || ($Vzqw0ieauwu4robability <= 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ($Vws44nszhvgoMin > $Vws44nszhvgoMax) {
				$Vdln1z2oxpjs = $Vws44nszhvgoMin;
				$Vws44nszhvgoMin = $Vws44nszhvgoMax;
				$Vws44nszhvgoMax = $Vdln1z2oxpjs;
			}
			$Vi3y3l1uvwp3 = 0;
			$V4t3fwdd3eev = 2;

			$Vfhiq1lhsoja = 0;
			while ((($V4t3fwdd3eev - $Vi3y3l1uvwp3) > PRECISION) && ($Vfhiq1lhsoja++ < MAX_ITERATIONS)) {
				$Vdnkef1ydi0l = ($Vi3y3l1uvwp3 + $V4t3fwdd3eev) / 2;
				$Ve3oeikqcm5nult = self::BETADIST($Vdnkef1ydi0l, $Vi3y3l1uvwp3lpha, $V4t3fwdd3eeveta);
				if (($Ve3oeikqcm5nult == $Vzqw0ieauwu4robability) || ($Ve3oeikqcm5nult == 0)) {
					$V4t3fwdd3eev = $Vi3y3l1uvwp3;
				} elseif ($Ve3oeikqcm5nult > $Vzqw0ieauwu4robability) {
					$V4t3fwdd3eev = $Vdnkef1ydi0l;
				} else {
					$Vi3y3l1uvwp3 = $Vdnkef1ydi0l;
				}
			}
			if ($Vfhiq1lhsoja == MAX_ITERATIONS) {
				return PHPExcel_Calculation_Functions::NA();
			}
			return round($Vws44nszhvgoMin + $Vdnkef1ydi0l * ($Vws44nszhvgoMax - $Vws44nszhvgoMin),12);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function BINOMDIST($Vp4xjtpabm0l, $Vxwdlbn44lnk, $Vzqw0ieauwu4robability, $V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l			= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l));
		$Vxwdlbn44lnk			= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vxwdlbn44lnk));
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vxwdlbn44lnk)) && (is_numeric($Vzqw0ieauwu4robability))) {
			if (($Vp4xjtpabm0l < 0) || ($Vp4xjtpabm0l > $Vxwdlbn44lnk)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					$Vn3xllbkvjad = 0;
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= $Vp4xjtpabm0l; ++$Vfhiq1lhsoja) {
						$Vn3xllbkvjad += PHPExcel_Calculation_MathTrig::COMBIN($Vxwdlbn44lnk,$Vfhiq1lhsoja) * pow($Vzqw0ieauwu4robability,$Vfhiq1lhsoja) * pow(1 - $Vzqw0ieauwu4robability,$Vxwdlbn44lnk - $Vfhiq1lhsoja);
					}
					return $Vn3xllbkvjad;
				} else {
					return PHPExcel_Calculation_MathTrig::COMBIN($Vxwdlbn44lnk,$Vp4xjtpabm0l) * pow($Vzqw0ieauwu4robability,$Vp4xjtpabm0l) * pow(1 - $Vzqw0ieauwu4robability,$Vxwdlbn44lnk - $Vp4xjtpabm0l) ;
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function CHIDIST($Vp4xjtpabm0l, $Vrec2f1japonegrees) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vrec2f1japonegrees	= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vrec2f1japonegrees));

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vrec2f1japonegrees))) {
			if ($Vrec2f1japonegrees < 1) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ($Vp4xjtpabm0l < 0) {
				if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
					return 1;
				}
				return PHPExcel_Calculation_Functions::NaN();
			}
			return 1 - (self::_incompleteGamma($Vrec2f1japonegrees/2,$Vp4xjtpabm0l/2) / self::_gamma($Vrec2f1japonegrees/2));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function CHIINV($Vzqw0ieauwu4robability, $Vrec2f1japonegrees) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vrec2f1japonegrees		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vrec2f1japonegrees));

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vrec2f1japonegrees))) {

			$V1e1eaicqarhLo = 100;
			$V1e1eaicqarhHi = 0;

			$V1e1eaicqarh = $V1e1eaicqarhNew = 1;
			$Vrec2f1japonx	= 1;
			$Vfhiq1lhsoja = 0;

			while ((abs($Vrec2f1japonx) > PRECISION) && ($Vfhiq1lhsoja++ < MAX_ITERATIONS)) {
				
				$Ve3oeikqcm5nult = self::CHIDIST($V1e1eaicqarh, $Vrec2f1japonegrees);
				$Vyrkodvljby0 = $Ve3oeikqcm5nult - $Vzqw0ieauwu4robability;
				if ($Vyrkodvljby0 == 0.0) {
					$Vrec2f1japonx = 0;
				} elseif ($Vyrkodvljby0 < 0.0) {
					$V1e1eaicqarhLo = $V1e1eaicqarh;
				} else {
					$V1e1eaicqarhHi = $V1e1eaicqarh;
				}
				
				if ($Ve3oeikqcm5nult != 0.0) {
					$Vrec2f1japonx = $Vyrkodvljby0 / $Ve3oeikqcm5nult;
					$V1e1eaicqarhNew = $V1e1eaicqarh - $Vrec2f1japonx;
				}
				
				
				
				if (($V1e1eaicqarhNew < $V1e1eaicqarhLo) || ($V1e1eaicqarhNew > $V1e1eaicqarhHi) || ($Ve3oeikqcm5nult == 0.0)) {
					$V1e1eaicqarhNew = ($V1e1eaicqarhLo + $V1e1eaicqarhHi) / 2;
					$Vrec2f1japonx = $V1e1eaicqarhNew - $V1e1eaicqarh;
				}
				$V1e1eaicqarh = $V1e1eaicqarhNew;
			}
			if ($Vfhiq1lhsoja == MAX_ITERATIONS) {
				return PHPExcel_Calculation_Functions::NA();
			}
			return round($V1e1eaicqarh,12);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function CONFIDENCE($Vi3y3l1uvwp3lpha,$Ve4kcku5fxlp,$V4jbadwq4bzj) {
		$Vi3y3l1uvwp3lpha	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);
		$Ve4kcku5fxlp	= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);
		$V4jbadwq4bzj	= floor(PHPExcel_Calculation_Functions::flattenSingleValue($V4jbadwq4bzj));

		if ((is_numeric($Vi3y3l1uvwp3lpha)) && (is_numeric($Ve4kcku5fxlp)) && (is_numeric($V4jbadwq4bzj))) {
			if (($Vi3y3l1uvwp3lpha <= 0) || ($Vi3y3l1uvwp3lpha >= 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Ve4kcku5fxlp <= 0) || ($V4jbadwq4bzj < 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return self::NORMSINV(1 - $Vi3y3l1uvwp3lpha / 2) * $Ve4kcku5fxlp / sqrt($V4jbadwq4bzj);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function CORREL($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues=null) {
		if ((is_null($V1e1eaicqarhValues)) || (!is_array($Vqwmp2bx0ii2Values)) || (!is_array($V1e1eaicqarhValues))) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getCorrelation();
	}	


	
	public static function COUNT() {
		
		$Vws44nszhvgoeturnValue = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_bool($Vi3y3l1uvwp3rg)) &&
				((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
				$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
			}
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				++$Vws44nszhvgoeturnValue;
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function COUNTA() {
		
		$Vws44nszhvgoeturnValue = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) && ($Vi3y3l1uvwp3rg != '')))) {
				++$Vws44nszhvgoeturnValue;
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function COUNTBLANK() {
		
		$Vws44nszhvgoeturnValue = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_null($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg)) && ($Vi3y3l1uvwp3rg == ''))) {
				++$Vws44nszhvgoeturnValue;
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function COUNTIF($Vi3y3l1uvwp3Args,$V4y0urwpnd3jondition) {
		
		$Vws44nszhvgoeturnValue = 0;

		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3Args);
		$V4y0urwpnd3jondition = PHPExcel_Calculation_Functions::_ifCondition($V4y0urwpnd3jondition);
		
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			if (!is_numeric($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = PHPExcel_Calculation::_wrapResult(strtoupper($Vi3y3l1uvwp3rg)); }
			$Vyiqw305bhrl = '='.$Vi3y3l1uvwp3rg.$V4y0urwpnd3jondition;
			if (PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Vyiqw305bhrl)) {
				
				++$Vws44nszhvgoeturnValue;
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function COVAR($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getCovariance();
	}	


	
	public static function CRITBINOM($Vxwdlbn44lnk, $Vzqw0ieauwu4robability, $Vi3y3l1uvwp3lpha) {
		$Vxwdlbn44lnk			= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vxwdlbn44lnk));
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vi3y3l1uvwp3lpha			= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);

		if ((is_numeric($Vxwdlbn44lnk)) && (is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vi3y3l1uvwp3lpha))) {
			if ($Vxwdlbn44lnk < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Vi3y3l1uvwp3lpha < 0) || ($Vi3y3l1uvwp3lpha > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ($Vi3y3l1uvwp3lpha <= 0.5) {
				$Veca2om3awug = sqrt(log(1 / ($Vi3y3l1uvwp3lpha * $Vi3y3l1uvwp3lpha)));
				$Vxwdlbn44lnkApprox = 0 - ($Veca2om3awug + (2.515517 + 0.802853 * $Veca2om3awug + 0.010328 * $Veca2om3awug * $Veca2om3awug) / (1 + 1.432788 * $Veca2om3awug + 0.189269 * $Veca2om3awug * $Veca2om3awug + 0.001308 * $Veca2om3awug * $Veca2om3awug * $Veca2om3awug));
			} else {
				$Veca2om3awug = sqrt(log(1 / pow(1 - $Vi3y3l1uvwp3lpha,2)));
				$Vxwdlbn44lnkApprox = $Veca2om3awug - (2.515517 + 0.802853 * $Veca2om3awug + 0.010328 * $Veca2om3awug * $Veca2om3awug) / (1 + 1.432788 * $Veca2om3awug + 0.189269 * $Veca2om3awug * $Veca2om3awug + 0.001308 * $Veca2om3awug * $Veca2om3awug * $Veca2om3awug);
			}
			$Vovn1go31wyg = floor($Vxwdlbn44lnk * $Vzqw0ieauwu4robability + $Vxwdlbn44lnkApprox * sqrt($Vxwdlbn44lnk * $Vzqw0ieauwu4robability * (1 - $Vzqw0ieauwu4robability)));
			if ($Vovn1go31wyg < 0) {
				$Vovn1go31wyg = 0;
			} elseif ($Vovn1go31wyg > $Vxwdlbn44lnk) {
				$Vovn1go31wyg = $Vxwdlbn44lnk;
			}

			$Vqlysu0gj4hy = $Vypjrn0rujeq = $Vbyfakmithtp = 0.0;
			$V5oj32ilkevx = 10e-12;

			$Vt54vmttyjzc = floor($Vxwdlbn44lnk * $Vzqw0ieauwu4robability);
			++$Vqlysu0gj4hy;
			if ($Vt54vmttyjzc == $Vovn1go31wyg) { ++$Vypjrn0rujeq; }
			if ($Vt54vmttyjzc <= $Vovn1go31wyg) { ++$Vbyfakmithtp; }

			$V5dsut14ddgb = 1;
			$Vvbwyu2t1b53 = False;
			$V51lf1kcbto4 = $Vt54vmttyjzc + 1;
			while ((!$Vvbwyu2t1b53) && ($V51lf1kcbto4 <= $Vxwdlbn44lnk)) {
				$Varto3w11gce = $V5dsut14ddgb * ($Vxwdlbn44lnk - $V51lf1kcbto4 + 1) * $Vzqw0ieauwu4robability / ($V51lf1kcbto4 * (1 - $Vzqw0ieauwu4robability));
				$Vqlysu0gj4hy += $Varto3w11gce;
				if ($V51lf1kcbto4 == $Vovn1go31wyg) { $Vypjrn0rujeq += $Varto3w11gce; }
				if ($V51lf1kcbto4 <= $Vovn1go31wyg) { $Vbyfakmithtp += $Varto3w11gce; }
				if ($Varto3w11gce <= $V5oj32ilkevx) { $Vvbwyu2t1b53 = True; }
				$V5dsut14ddgb = $Varto3w11gce;
				++$V51lf1kcbto4;
			}

			$V5dsut14ddgb = 1;
			$Vvbwyu2t1b53 = False;
			$V51lf1kcbto4 = $Vt54vmttyjzc - 1;
			while ((!$Vvbwyu2t1b53) && ($V51lf1kcbto4 >= 0)) {
				$Varto3w11gce = $V5dsut14ddgb * $V51lf1kcbto4 + 1 * (1 - $Vzqw0ieauwu4robability) / (($Vxwdlbn44lnk - $V51lf1kcbto4) * $Vzqw0ieauwu4robability);
				$Vqlysu0gj4hy += $Varto3w11gce;
				if ($V51lf1kcbto4 == $Vovn1go31wyg) { $Vypjrn0rujeq += $Varto3w11gce; }
				if ($V51lf1kcbto4 <= $Vovn1go31wyg) { $Vbyfakmithtp += $Varto3w11gce; }
				if ($Varto3w11gce <= $V5oj32ilkevx) { $Vvbwyu2t1b53 = True; }
				$V5dsut14ddgb = $Varto3w11gce;
				--$V51lf1kcbto4;
			}

			$Vab3crevcd3s = $Vypjrn0rujeq / $Vqlysu0gj4hy;
			$Voyopzq23tfh = $Vbyfakmithtp / $Vqlysu0gj4hy;


			$Voyopzq23tfhMinus1 = $Voyopzq23tfh - 1;

			while (True) {
				if (($Voyopzq23tfhMinus1 < $Vi3y3l1uvwp3lpha) && ($Voyopzq23tfh >= $Vi3y3l1uvwp3lpha)) {
					return $Vovn1go31wyg;
				} elseif (($Voyopzq23tfhMinus1 < $Vi3y3l1uvwp3lpha) && ($Voyopzq23tfh < $Vi3y3l1uvwp3lpha)) {
					$Vab3crevcd3sPlus1 = $Vab3crevcd3s * ($Vxwdlbn44lnk - $Vovn1go31wyg) * $Vzqw0ieauwu4robability / $Vovn1go31wyg / (1 - $Vzqw0ieauwu4robability);
					$Voyopzq23tfhMinus1 = $Voyopzq23tfh;
					$Voyopzq23tfh = $Voyopzq23tfh + $Vab3crevcd3sPlus1;
					$Vab3crevcd3s = $Vab3crevcd3sPlus1;
					++$Vovn1go31wyg;
				} elseif (($Voyopzq23tfhMinus1 >= $Vi3y3l1uvwp3lpha) && ($Voyopzq23tfh >= $Vi3y3l1uvwp3lpha)) {
					$Vab3crevcd3sMinus1 = $Vab3crevcd3s * $Vovn1go31wyg * (1 - $Vzqw0ieauwu4robability) / ($Vxwdlbn44lnk - $Vovn1go31wyg + 1) / $Vzqw0ieauwu4robability;
					$Voyopzq23tfh = $Voyopzq23tfhMinus1;
					$Voyopzq23tfhMinus1 = $Voyopzq23tfhMinus1 - $Vab3crevcd3s;
					$Vab3crevcd3s = $Vab3crevcd3sMinus1;
					--$Vovn1go31wyg;
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function DEVSQ() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGE($Vi3y3l1uvwp3Args);
		if ($Vi3y3l1uvwp3Mean != PHPExcel_Calculation_Functions::DIV0()) {
			$Vi3y3l1uvwp3Count = -1;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				}
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					if (is_null($Vws44nszhvgoeturnValue)) {
						$Vws44nszhvgoeturnValue = pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					} else {
						$Vws44nszhvgoeturnValue += pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					}
					++$Vi3y3l1uvwp3Count;
				}
			}

			
			if (is_null($Vws44nszhvgoeturnValue)) {
				return PHPExcel_Calculation_Functions::NaN();
			} else {
				return $Vws44nszhvgoeturnValue;
			}
		}
		return self::NA();
	}	


	
	public static function EXPONDIST($Vp4xjtpabm0l, $Voommskglg2h, $V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Voommskglg2h	= PHPExcel_Calculation_Functions::flattenSingleValue($Voommskglg2h);
		$V4y0urwpnd3jumulative	= PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jumulative);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Voommskglg2h))) {
			if (($Vp4xjtpabm0l < 0) || ($Voommskglg2h < 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					return 1 - exp(0-$Vp4xjtpabm0l*$Voommskglg2h);
				} else {
					return $Voommskglg2h * exp(0-$Vp4xjtpabm0l*$Voommskglg2h);
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FISHER($Vp4xjtpabm0l) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		if (is_numeric($Vp4xjtpabm0l)) {
			if (($Vp4xjtpabm0l <= -1) || ($Vp4xjtpabm0l >= 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return 0.5 * log((1+$Vp4xjtpabm0l)/(1-$Vp4xjtpabm0l));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FISHERINV($Vp4xjtpabm0l) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		if (is_numeric($Vp4xjtpabm0l)) {
			return (exp(2 * $Vp4xjtpabm0l) - 1) / (exp(2 * $Vp4xjtpabm0l) + 1);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function FORECAST($V1e1eaicqarhValue,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		$V1e1eaicqarhValue	= PHPExcel_Calculation_Functions::flattenSingleValue($V1e1eaicqarhValue);
		if (!is_numeric($V1e1eaicqarhValue)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getValueOfYForX($V1e1eaicqarhValue);
	}	


	
	public static function GAMMADIST($Vp4xjtpabm0l,$Vi3y3l1uvwp3,$V4t3fwdd3eev,$V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vi3y3l1uvwp3		= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3);
		$V4t3fwdd3eev		= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eev);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vi3y3l1uvwp3)) && (is_numeric($V4t3fwdd3eev))) {
			if (($Vp4xjtpabm0l < 0) || ($Vi3y3l1uvwp3 <= 0) || ($V4t3fwdd3eev <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					return self::_incompleteGamma($Vi3y3l1uvwp3,$Vp4xjtpabm0l / $V4t3fwdd3eev) / self::_gamma($Vi3y3l1uvwp3);
				} else {
					return (1 / (pow($V4t3fwdd3eev,$Vi3y3l1uvwp3) * self::_gamma($Vi3y3l1uvwp3))) * pow($Vp4xjtpabm0l,$Vi3y3l1uvwp3-1) * exp(0-($Vp4xjtpabm0l / $V4t3fwdd3eev));
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function GAMMAINV($Vzqw0ieauwu4robability,$Vi3y3l1uvwp3lpha,$V4t3fwdd3eeveta) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vi3y3l1uvwp3lpha			= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);
		$V4t3fwdd3eeveta			= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eeveta);

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vi3y3l1uvwp3lpha)) && (is_numeric($V4t3fwdd3eeveta))) {
			if (($Vi3y3l1uvwp3lpha <= 0) || ($V4t3fwdd3eeveta <= 0) || ($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}

			$V1e1eaicqarhLo = 0;
			$V1e1eaicqarhHi = $Vi3y3l1uvwp3lpha * $V4t3fwdd3eeveta * 5;

			$V1e1eaicqarh = $V1e1eaicqarhNew = 1;
			$Vyrkodvljby0 = $Vzqw0ieauwu4df = 0;
			$Vrec2f1japonx	= 1024;
			$Vfhiq1lhsoja = 0;

			while ((abs($Vrec2f1japonx) > PRECISION) && ($Vfhiq1lhsoja++ < MAX_ITERATIONS)) {
				
				$Vyrkodvljby0 = self::GAMMADIST($V1e1eaicqarh, $Vi3y3l1uvwp3lpha, $V4t3fwdd3eeveta, True) - $Vzqw0ieauwu4robability;
				if ($Vyrkodvljby0 < 0.0) {
					$V1e1eaicqarhLo = $V1e1eaicqarh;
				} else {
					$V1e1eaicqarhHi = $V1e1eaicqarh;
				}
				$Vzqw0ieauwu4df = self::GAMMADIST($V1e1eaicqarh, $Vi3y3l1uvwp3lpha, $V4t3fwdd3eeveta, False);
				
				if ($Vzqw0ieauwu4df != 0.0) {
					$Vrec2f1japonx = $Vyrkodvljby0 / $Vzqw0ieauwu4df;
					$V1e1eaicqarhNew = $V1e1eaicqarh - $Vrec2f1japonx;
				}
				
				
				
				if (($V1e1eaicqarhNew < $V1e1eaicqarhLo) || ($V1e1eaicqarhNew > $V1e1eaicqarhHi) || ($Vzqw0ieauwu4df == 0.0)) {
					$V1e1eaicqarhNew = ($V1e1eaicqarhLo + $V1e1eaicqarhHi) / 2;
					$Vrec2f1japonx = $V1e1eaicqarhNew - $V1e1eaicqarh;
				}
				$V1e1eaicqarh = $V1e1eaicqarhNew;
			}
			if ($Vfhiq1lhsoja == MAX_ITERATIONS) {
				return PHPExcel_Calculation_Functions::NA();
			}
			return $V1e1eaicqarh;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function GAMMALN($Vp4xjtpabm0l) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		if (is_numeric($Vp4xjtpabm0l)) {
			if ($Vp4xjtpabm0l <= 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return log(self::_gamma($Vp4xjtpabm0l));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function GEOMEAN() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		$Vi3y3l1uvwp3Mean = PHPExcel_Calculation_MathTrig::PRODUCT($Vi3y3l1uvwp3Args);
		if (is_numeric($Vi3y3l1uvwp3Mean) && ($Vi3y3l1uvwp3Mean > 0)) {
			$Vi3y3l1uvwp3Count = self::COUNT($Vi3y3l1uvwp3Args) ;
			if (self::MIN($Vi3y3l1uvwp3Args) > 0) {
				return pow($Vi3y3l1uvwp3Mean, (1 / $Vi3y3l1uvwp3Count));
			}
		}
		return PHPExcel_Calculation_Functions::NaN();
	}	


	
	public static function GROWTH($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues=array(),$Vmwwo1qnmepzewValues=array(),$V4y0urwpnd3jonst=True) {
		$Vqwmp2bx0ii2Values = PHPExcel_Calculation_Functions::flattenArray($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValues = PHPExcel_Calculation_Functions::flattenArray($V1e1eaicqarhValues);
		$Vmwwo1qnmepzewValues = PHPExcel_Calculation_Functions::flattenArray($Vmwwo1qnmepzewValues);
		$V4y0urwpnd3jonst	= (is_null($V4y0urwpnd3jonst))	? True :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jonst);

		$V4t3fwdd3eevestFitExponential = trendClass::calculate(trendClass::TREND_EXPONENTIAL,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues,$V4y0urwpnd3jonst);
		if (empty($Vmwwo1qnmepzewValues)) {
			$Vmwwo1qnmepzewValues = $V4t3fwdd3eevestFitExponential->getXValues();
		}

		$Vws44nszhvgoeturnArray = array();
		foreach($Vmwwo1qnmepzewValues as $V1e1eaicqarhValue) {
			$Vws44nszhvgoeturnArray[0][] = $V4t3fwdd3eevestFitExponential->getValueOfYForX($V1e1eaicqarhValue);
		}

		return $Vws44nszhvgoeturnArray;
	}	


	
	public static function HARMEAN() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::NA();

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		if (self::MIN($Vi3y3l1uvwp3Args) < 0) {
			return PHPExcel_Calculation_Functions::NaN();
		}
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if ($Vi3y3l1uvwp3rg <= 0) {
					return PHPExcel_Calculation_Functions::NaN();
				}
				if (is_null($Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = (1 / $Vi3y3l1uvwp3rg);
				} else {
					$Vws44nszhvgoeturnValue += (1 / $Vi3y3l1uvwp3rg);
				}
				++$Vi3y3l1uvwp3Count;
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			return 1 / ($Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count);
		} else {
			return $Vws44nszhvgoeturnValue;
		}
	}	


	
	public static function HYPGEOMDIST($Vzqo1nqldn2j, $V05agdi1ss5p, $Vzqw0ieauwu4opulationSuccesses, $Vzqw0ieauwu4opulationNumber) {
		$Vzqo1nqldn2j		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vzqo1nqldn2j));
		$V05agdi1ss5p			= floor(PHPExcel_Calculation_Functions::flattenSingleValue($V05agdi1ss5p));
		$Vzqw0ieauwu4opulationSuccesses	= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4opulationSuccesses));
		$Vzqw0ieauwu4opulationNumber		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4opulationNumber));

		if ((is_numeric($Vzqo1nqldn2j)) && (is_numeric($V05agdi1ss5p)) && (is_numeric($Vzqw0ieauwu4opulationSuccesses)) && (is_numeric($Vzqw0ieauwu4opulationNumber))) {
			if (($Vzqo1nqldn2j < 0) || ($Vzqo1nqldn2j > $V05agdi1ss5p) || ($Vzqo1nqldn2j > $Vzqw0ieauwu4opulationSuccesses)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($V05agdi1ss5p <= 0) || ($V05agdi1ss5p > $Vzqw0ieauwu4opulationNumber)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Vzqw0ieauwu4opulationSuccesses <= 0) || ($Vzqw0ieauwu4opulationSuccesses > $Vzqw0ieauwu4opulationNumber)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return PHPExcel_Calculation_MathTrig::COMBIN($Vzqw0ieauwu4opulationSuccesses,$Vzqo1nqldn2j) *
				   PHPExcel_Calculation_MathTrig::COMBIN($Vzqw0ieauwu4opulationNumber - $Vzqw0ieauwu4opulationSuccesses,$V05agdi1ss5p - $Vzqo1nqldn2j) /
				   PHPExcel_Calculation_MathTrig::COMBIN($Vzqw0ieauwu4opulationNumber,$V05agdi1ss5p);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function INTERCEPT($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getIntersect();
	}	


	
	public static function KURT() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());
		$Vt54vmttyjzcean = self::AVERAGE($Vi3y3l1uvwp3Args);
		$Ve4kcku5fxlp = self::STDEV($Vi3y3l1uvwp3Args);

		if ($Ve4kcku5fxlp > 0) {
			$V4y0urwpnd3jount = $Vn3xllbkvjad = 0;
			
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
				} else {
					
					if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
						$Vn3xllbkvjad += pow((($Vi3y3l1uvwp3rg - $Vt54vmttyjzcean) / $Ve4kcku5fxlp),4) ;
						++$V4y0urwpnd3jount;
					}
				}
			}

			
			if ($V4y0urwpnd3jount > 3) {
				return $Vn3xllbkvjad * ($V4y0urwpnd3jount * ($V4y0urwpnd3jount+1) / (($V4y0urwpnd3jount-1) * ($V4y0urwpnd3jount-2) * ($V4y0urwpnd3jount-3))) - (3 * pow($V4y0urwpnd3jount-1,2) / (($V4y0urwpnd3jount-2) * ($V4y0urwpnd3jount-3)));
			}
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function LARGE() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$V4o5wb5ucdu5 = floor(array_pop($Vi3y3l1uvwp3Args));

		if ((is_numeric($V4o5wb5ucdu5)) && (!is_string($V4o5wb5ucdu5))) {
			$Vt54vmttyjzcArgs = array();
			foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
				}
			}
			$V4y0urwpnd3jount = self::COUNT($Vt54vmttyjzcArgs);
			$V4o5wb5ucdu5 = floor(--$V4o5wb5ucdu5);
			if (($V4o5wb5ucdu5 < 0) || ($V4o5wb5ucdu5 >= $V4y0urwpnd3jount) || ($V4y0urwpnd3jount == 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			rsort($Vt54vmttyjzcArgs);
			return $Vt54vmttyjzcArgs[$V4o5wb5ucdu5];
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function LINEST($Vqwmp2bx0ii2Values, $V1e1eaicqarhValues = NULL, $V4y0urwpnd3jonst = TRUE, $Vd4qtqhdfagv = FALSE) {
		$V4y0urwpnd3jonst	= (is_null($V4y0urwpnd3jonst))	? TRUE :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jonst);
		$Vd4qtqhdfagv	= (is_null($Vd4qtqhdfagv))	? FALSE :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($Vd4qtqhdfagv);
		if (is_null($V1e1eaicqarhValues)) $V1e1eaicqarhValues = range(1,count(PHPExcel_Calculation_Functions::flattenArray($Vqwmp2bx0ii2Values)));

		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);


		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return 0;
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues,$V4y0urwpnd3jonst);
		if ($Vd4qtqhdfagv) {
			return array( array( $V4t3fwdd3eevestFitLinear->getSlope(),
						 		 $V4t3fwdd3eevestFitLinear->getSlopeSE(),
						 		 $V4t3fwdd3eevestFitLinear->getGoodnessOfFit(),
						 		 $V4t3fwdd3eevestFitLinear->getF(),
						 		 $V4t3fwdd3eevestFitLinear->getSSRegression(),
							   ),
						  array( $V4t3fwdd3eevestFitLinear->getIntersect(),
								 $V4t3fwdd3eevestFitLinear->getIntersectSE(),
								 $V4t3fwdd3eevestFitLinear->getStdevOfResiduals(),
								 $V4t3fwdd3eevestFitLinear->getDFResiduals(),
								 $V4t3fwdd3eevestFitLinear->getSSResiduals()
							   )
						);
		} else {
			return array( $V4t3fwdd3eevestFitLinear->getSlope(),
						  $V4t3fwdd3eevestFitLinear->getIntersect()
						);
		}
	}	


	
	public static function LOGEST($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues=null,$V4y0urwpnd3jonst=True,$Vd4qtqhdfagv=False) {
		$V4y0urwpnd3jonst	= (is_null($V4y0urwpnd3jonst))	? True :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jonst);
		$Vd4qtqhdfagv	= (is_null($Vd4qtqhdfagv))	? False :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($Vd4qtqhdfagv);
		if (is_null($V1e1eaicqarhValues)) $V1e1eaicqarhValues = range(1,count(PHPExcel_Calculation_Functions::flattenArray($Vqwmp2bx0ii2Values)));

		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		foreach($Vqwmp2bx0ii2Values as $Vp4xjtpabm0l) {
			if ($Vp4xjtpabm0l <= 0.0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
		}


		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return 1;
		}

		$V4t3fwdd3eevestFitExponential = trendClass::calculate(trendClass::TREND_EXPONENTIAL,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues,$V4y0urwpnd3jonst);
		if ($Vd4qtqhdfagv) {
			return array( array( $V4t3fwdd3eevestFitExponential->getSlope(),
						 		 $V4t3fwdd3eevestFitExponential->getSlopeSE(),
						 		 $V4t3fwdd3eevestFitExponential->getGoodnessOfFit(),
						 		 $V4t3fwdd3eevestFitExponential->getF(),
						 		 $V4t3fwdd3eevestFitExponential->getSSRegression(),
							   ),
						  array( $V4t3fwdd3eevestFitExponential->getIntersect(),
								 $V4t3fwdd3eevestFitExponential->getIntersectSE(),
								 $V4t3fwdd3eevestFitExponential->getStdevOfResiduals(),
								 $V4t3fwdd3eevestFitExponential->getDFResiduals(),
								 $V4t3fwdd3eevestFitExponential->getSSResiduals()
							   )
						);
		} else {
			return array( $V4t3fwdd3eevestFitExponential->getSlope(),
						  $V4t3fwdd3eevestFitExponential->getIntersect()
						);
		}
	}	


	
	public static function LOGINV($Vzqw0ieauwu4robability, $Vt54vmttyjzcean, $Ve4kcku5fxlp) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vt54vmttyjzcean			= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);
		$Ve4kcku5fxlp			= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vt54vmttyjzcean)) && (is_numeric($Ve4kcku5fxlp))) {
			if (($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1) || ($Ve4kcku5fxlp <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return exp($Vt54vmttyjzcean + $Ve4kcku5fxlp * self::NORMSINV($Vzqw0ieauwu4robability));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function LOGNORMDIST($Vp4xjtpabm0l, $Vt54vmttyjzcean, $Ve4kcku5fxlp) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vt54vmttyjzcean	= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);
		$Ve4kcku5fxlp	= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vt54vmttyjzcean)) && (is_numeric($Ve4kcku5fxlp))) {
			if (($Vp4xjtpabm0l <= 0) || ($Ve4kcku5fxlp <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return self::NORMSDIST((log($Vp4xjtpabm0l) - $Vt54vmttyjzcean) / $Ve4kcku5fxlp);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function MAX() {
		
		$Vws44nszhvgoeturnValue = null;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg > $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		if(is_null($Vws44nszhvgoeturnValue)) {
			return 0;
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MAXA() {
		
		$Vws44nszhvgoeturnValue = null;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) && ($Vi3y3l1uvwp3rg != '')))) {
				if (is_bool($Vi3y3l1uvwp3rg)) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				} elseif (is_string($Vi3y3l1uvwp3rg)) {
					$Vi3y3l1uvwp3rg = 0;
				}
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg > $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		if(is_null($Vws44nszhvgoeturnValue)) {
			return 0;
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MAXIF($Vi3y3l1uvwp3Args,$V4y0urwpnd3jondition,$Vrwwirajn0ks = array()) {
		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3Args);
		$Vrwwirajn0ks = PHPExcel_Calculation_Functions::flattenArray($Vrwwirajn0ks);
		if (empty($Vrwwirajn0ks)) {
			$Vrwwirajn0ks = $Vi3y3l1uvwp3Args;
		}
		$V4y0urwpnd3jondition = PHPExcel_Calculation_Functions::_ifCondition($V4y0urwpnd3jondition);
		
		foreach ($Vi3y3l1uvwp3Args as $Vseq1edikdvg => $Vi3y3l1uvwp3rg) {
			if (!is_numeric($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = PHPExcel_Calculation::_wrapResult(strtoupper($Vi3y3l1uvwp3rg)); }
			$Vyiqw305bhrl = '='.$Vi3y3l1uvwp3rg.$V4y0urwpnd3jondition;
			if (PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Vyiqw305bhrl)) {
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg > $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MEDIAN() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::NaN();

		$Vt54vmttyjzcArgs = array();
		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
			}
		}

		$Vt54vmttyjzcValueCount = count($Vt54vmttyjzcArgs);
		if ($Vt54vmttyjzcValueCount > 0) {
			sort($Vt54vmttyjzcArgs,SORT_NUMERIC);
			$Vt54vmttyjzcValueCount = $Vt54vmttyjzcValueCount / 2;
			if ($Vt54vmttyjzcValueCount == floor($Vt54vmttyjzcValueCount)) {
				$Vws44nszhvgoeturnValue = ($Vt54vmttyjzcArgs[$Vt54vmttyjzcValueCount--] + $Vt54vmttyjzcArgs[$Vt54vmttyjzcValueCount]) / 2;
			} else {
				$Vt54vmttyjzcValueCount == floor($Vt54vmttyjzcValueCount);
				$Vws44nszhvgoeturnValue = $Vt54vmttyjzcArgs[$Vt54vmttyjzcValueCount];
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MIN() {
		
		$Vws44nszhvgoeturnValue = null;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg < $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		if(is_null($Vws44nszhvgoeturnValue)) {
			return 0;
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MINA() {
		
		$Vws44nszhvgoeturnValue = null;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) && ($Vi3y3l1uvwp3rg != '')))) {
				if (is_bool($Vi3y3l1uvwp3rg)) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				} elseif (is_string($Vi3y3l1uvwp3rg)) {
					$Vi3y3l1uvwp3rg = 0;
				}
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg < $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		if(is_null($Vws44nszhvgoeturnValue)) {
			return 0;
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function MINIF($Vi3y3l1uvwp3Args,$V4y0urwpnd3jondition,$Vrwwirajn0ks = array()) {
		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray($Vi3y3l1uvwp3Args);
		$Vrwwirajn0ks = PHPExcel_Calculation_Functions::flattenArray($Vrwwirajn0ks);
		if (empty($Vrwwirajn0ks)) {
			$Vrwwirajn0ks = $Vi3y3l1uvwp3Args;
		}
		$V4y0urwpnd3jondition = PHPExcel_Calculation_Functions::_ifCondition($V4y0urwpnd3jondition);
		
		foreach ($Vi3y3l1uvwp3Args as $Vseq1edikdvg => $Vi3y3l1uvwp3rg) {
			if (!is_numeric($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = PHPExcel_Calculation::_wrapResult(strtoupper($Vi3y3l1uvwp3rg)); }
			$Vyiqw305bhrl = '='.$Vi3y3l1uvwp3rg.$V4y0urwpnd3jondition;
			if (PHPExcel_Calculation::getInstance()->_calculateFormulaValue($Vyiqw305bhrl)) {
				if ((is_null($Vws44nszhvgoeturnValue)) || ($Vi3y3l1uvwp3rg < $Vws44nszhvgoeturnValue)) {
					$Vws44nszhvgoeturnValue = $Vi3y3l1uvwp3rg;
				}
			}
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	
	
	
	private static function _modeCalc($Vrec2f1japonata) {
		$Vovbygsk4a4c = array();
		foreach($Vrec2f1japonata as $Vrec2f1japonatum) {
			$Valwom5reivu = False;
			foreach($Vovbygsk4a4c as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				if ((string) $Vp4xjtpabm0l['value'] == (string) $Vrec2f1japonatum) {
					++$Vovbygsk4a4c[$Vseq1edikdvg]['frequency'];
					$Valwom5reivu = True;
					break;
				}
			}
			if (!$Valwom5reivu) {
				$Vovbygsk4a4c[] = array('value'		=> $Vrec2f1japonatum,
										  'frequency'	=>	1 );
			}
		}

		foreach($Vovbygsk4a4c as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			$Vfe3j0timmqg[$Vseq1edikdvg] = $Vp4xjtpabm0l['frequency'];
			$Vp4xjtpabm0lList[$Vseq1edikdvg] = $Vp4xjtpabm0l['value'];
		}
		array_multisort($Vfe3j0timmqg, SORT_DESC, $Vp4xjtpabm0lList, SORT_ASC, SORT_NUMERIC, $Vovbygsk4a4c);

		if ($Vovbygsk4a4c[0]['frequency'] == 1) {
			return PHPExcel_Calculation_Functions::NA();
		}
		return $Vovbygsk4a4c[0]['value'];
	}	


	
	public static function MODE() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::NA();

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		$Vt54vmttyjzcArgs = array();
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
			}
		}

		if (!empty($Vt54vmttyjzcArgs)) {
			return self::_modeCalc($Vt54vmttyjzcArgs);
		}

		
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function NEGBINOMDIST($Vgzmk5fbyurc, $Vpy5bh4rhlib, $Vzqw0ieauwu4robability) {
		$Vgzmk5fbyurc		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vgzmk5fbyurc));
		$Vpy5bh4rhlib		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vpy5bh4rhlib));
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);

		if ((is_numeric($Vgzmk5fbyurc)) && (is_numeric($Vpy5bh4rhlib)) && (is_numeric($Vzqw0ieauwu4robability))) {
			if (($Vgzmk5fbyurc < 0) || ($Vpy5bh4rhlib < 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC) {
				if (($Vgzmk5fbyurc + $Vpy5bh4rhlib - 1) <= 0) {
					return PHPExcel_Calculation_Functions::NaN();
				}
			}
			return (PHPExcel_Calculation_MathTrig::COMBIN($Vgzmk5fbyurc + $Vpy5bh4rhlib - 1,$Vpy5bh4rhlib - 1)) * (pow($Vzqw0ieauwu4robability,$Vpy5bh4rhlib)) * (pow(1 - $Vzqw0ieauwu4robability,$Vgzmk5fbyurc)) ;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function NORMDIST($Vp4xjtpabm0l, $Vt54vmttyjzcean, $Ve4kcku5fxlp, $V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vt54vmttyjzcean	= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);
		$Ve4kcku5fxlp	= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vt54vmttyjzcean)) && (is_numeric($Ve4kcku5fxlp))) {
			if ($Ve4kcku5fxlp < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					return 0.5 * (1 + PHPExcel_Calculation_Engineering::_erfVal(($Vp4xjtpabm0l - $Vt54vmttyjzcean) / ($Ve4kcku5fxlp * sqrt(2))));
				} else {
					return (1 / (SQRT2PI * $Ve4kcku5fxlp)) * exp(0 - (pow($Vp4xjtpabm0l - $Vt54vmttyjzcean,2) / (2 * ($Ve4kcku5fxlp * $Ve4kcku5fxlp))));
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function NORMINV($Vzqw0ieauwu4robability,$Vt54vmttyjzcean,$Ve4kcku5fxlp) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vt54vmttyjzcean			= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);
		$Ve4kcku5fxlp			= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vt54vmttyjzcean)) && (is_numeric($Ve4kcku5fxlp))) {
			if (($Vzqw0ieauwu4robability < 0) || ($Vzqw0ieauwu4robability > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ($Ve4kcku5fxlp < 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return (self::_inverse_ncdf($Vzqw0ieauwu4robability) * $Ve4kcku5fxlp) + $Vt54vmttyjzcean;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function NORMSDIST($Vp4xjtpabm0l) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);

		return self::NORMDIST($Vp4xjtpabm0l, 0, 1, True);
	}	


	
	public static function NORMSINV($Vp4xjtpabm0l) {
		return self::NORMINV($Vp4xjtpabm0l, 0, 1);
	}	


	
	public static function PERCENTILE() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$V4o5wb5ucdu5 = array_pop($Vi3y3l1uvwp3Args);

		if ((is_numeric($V4o5wb5ucdu5)) && (!is_string($V4o5wb5ucdu5))) {
			if (($V4o5wb5ucdu5 < 0) || ($V4o5wb5ucdu5 > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt54vmttyjzcArgs = array();
			foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
				}
			}
			$Vt54vmttyjzcValueCount = count($Vt54vmttyjzcArgs);
			if ($Vt54vmttyjzcValueCount > 0) {
				sort($Vt54vmttyjzcArgs);
				$V4y0urwpnd3jount = self::COUNT($Vt54vmttyjzcArgs);
				$Vfhiq1lhsojandex = $V4o5wb5ucdu5 * ($V4y0urwpnd3jount-1);
				$Vfhiq1lhsojaBase = floor($Vfhiq1lhsojandex);
				if ($Vfhiq1lhsojandex == $Vfhiq1lhsojaBase) {
					return $Vt54vmttyjzcArgs[$Vfhiq1lhsojandex];
				} else {
					$Vfhiq1lhsojaNext = $Vfhiq1lhsojaBase + 1;
					$Vfhiq1lhsojaProportion = $Vfhiq1lhsojandex - $Vfhiq1lhsojaBase;
					return $Vt54vmttyjzcArgs[$Vfhiq1lhsojaBase] + (($Vt54vmttyjzcArgs[$Vfhiq1lhsojaNext] - $Vt54vmttyjzcArgs[$Vfhiq1lhsojaBase]) * $Vfhiq1lhsojaProportion) ;
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function PERCENTRANK($Vp4xjtpabm0lSet,$Vp4xjtpabm0l,$V3strauzuqqj=3) {
		$Vp4xjtpabm0lSet	= PHPExcel_Calculation_Functions::flattenArray($Vp4xjtpabm0lSet);
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$V3strauzuqqj	= (is_null($V3strauzuqqj))	? 3 :	(integer) PHPExcel_Calculation_Functions::flattenSingleValue($V3strauzuqqj);

		foreach($Vp4xjtpabm0lSet as $Vseq1edikdvg => $Vp4xjtpabm0lEntry) {
			if (!is_numeric($Vp4xjtpabm0lEntry)) {
				unset($Vp4xjtpabm0lSet[$Vseq1edikdvg]);
			}
		}
		sort($Vp4xjtpabm0lSet,SORT_NUMERIC);
		$Vp4xjtpabm0lCount = count($Vp4xjtpabm0lSet);
		if ($Vp4xjtpabm0lCount == 0) {
			return PHPExcel_Calculation_Functions::NaN();
		}

		$Vp4xjtpabm0lAdjustor = $Vp4xjtpabm0lCount - 1;
		if (($Vp4xjtpabm0l < $Vp4xjtpabm0lSet[0]) || ($Vp4xjtpabm0l > $Vp4xjtpabm0lSet[$Vp4xjtpabm0lAdjustor])) {
			return PHPExcel_Calculation_Functions::NA();
		}

		$Vzqw0ieauwu4os = array_search($Vp4xjtpabm0l,$Vp4xjtpabm0lSet);
		if ($Vzqw0ieauwu4os === False) {
			$Vzqw0ieauwu4os = 0;
			$Veca2om3awugestValue = $Vp4xjtpabm0lSet[0];
			while ($Veca2om3awugestValue < $Vp4xjtpabm0l) {
				$Veca2om3awugestValue = $Vp4xjtpabm0lSet[++$Vzqw0ieauwu4os];
			}
			--$Vzqw0ieauwu4os;
			$Vzqw0ieauwu4os += (($Vp4xjtpabm0l - $Vp4xjtpabm0lSet[$Vzqw0ieauwu4os]) / ($Veca2om3awugestValue - $Vp4xjtpabm0lSet[$Vzqw0ieauwu4os]));
		}

		return round($Vzqw0ieauwu4os / $Vp4xjtpabm0lAdjustor,$V3strauzuqqj);
	}	


	
	public static function PERMUT($Vmwwo1qnmepzumObjs,$Vmwwo1qnmepzumInSet) {
		$Vmwwo1qnmepzumObjs	= PHPExcel_Calculation_Functions::flattenSingleValue($Vmwwo1qnmepzumObjs);
		$Vmwwo1qnmepzumInSet	= PHPExcel_Calculation_Functions::flattenSingleValue($Vmwwo1qnmepzumInSet);

		if ((is_numeric($Vmwwo1qnmepzumObjs)) && (is_numeric($Vmwwo1qnmepzumInSet))) {
			$Vmwwo1qnmepzumInSet = floor($Vmwwo1qnmepzumInSet);
			if ($Vmwwo1qnmepzumObjs < $Vmwwo1qnmepzumInSet) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return round(PHPExcel_Calculation_MathTrig::FACT($Vmwwo1qnmepzumObjs) / PHPExcel_Calculation_MathTrig::FACT($Vmwwo1qnmepzumObjs - $Vmwwo1qnmepzumInSet));
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function POISSON($Vp4xjtpabm0l, $Vt54vmttyjzcean, $V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vt54vmttyjzcean	= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vt54vmttyjzcean))) {
			if (($Vp4xjtpabm0l < 0) || ($Vt54vmttyjzcean <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					$Vn3xllbkvjad = 0;
					for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja <= floor($Vp4xjtpabm0l); ++$Vfhiq1lhsoja) {
						$Vn3xllbkvjad += pow($Vt54vmttyjzcean,$Vfhiq1lhsoja) / PHPExcel_Calculation_MathTrig::FACT($Vfhiq1lhsoja);
					}
					return exp(0-$Vt54vmttyjzcean) * $Vn3xllbkvjad;
				} else {
					return (exp(0-$Vt54vmttyjzcean) * pow($Vt54vmttyjzcean,$Vp4xjtpabm0l)) / PHPExcel_Calculation_MathTrig::FACT($Vp4xjtpabm0l);
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function QUARTILE() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$V4o5wb5ucdu5 = floor(array_pop($Vi3y3l1uvwp3Args));

		if ((is_numeric($V4o5wb5ucdu5)) && (!is_string($V4o5wb5ucdu5))) {
			$V4o5wb5ucdu5 /= 4;
			if (($V4o5wb5ucdu5 < 0) || ($V4o5wb5ucdu5 > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return self::PERCENTILE($Vi3y3l1uvwp3Args,$V4o5wb5ucdu5);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function RANK($Vp4xjtpabm0l,$Vp4xjtpabm0lSet,$Vkmq2xsnwdk5=0) {
		$Vp4xjtpabm0l = PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vp4xjtpabm0lSet = PHPExcel_Calculation_Functions::flattenArray($Vp4xjtpabm0lSet);
		$Vkmq2xsnwdk5	= (is_null($Vkmq2xsnwdk5))	? 0 :	(integer) PHPExcel_Calculation_Functions::flattenSingleValue($Vkmq2xsnwdk5);

		foreach($Vp4xjtpabm0lSet as $Vseq1edikdvg => $Vp4xjtpabm0lEntry) {
			if (!is_numeric($Vp4xjtpabm0lEntry)) {
				unset($Vp4xjtpabm0lSet[$Vseq1edikdvg]);
			}
		}

		if ($Vkmq2xsnwdk5 == 0) {
			rsort($Vp4xjtpabm0lSet,SORT_NUMERIC);
		} else {
			sort($Vp4xjtpabm0lSet,SORT_NUMERIC);
		}
		$Vzqw0ieauwu4os = array_search($Vp4xjtpabm0l,$Vp4xjtpabm0lSet);
		if ($Vzqw0ieauwu4os === False) {
			return PHPExcel_Calculation_Functions::NA();
		}

		return ++$Vzqw0ieauwu4os;
	}	


	
	public static function RSQ($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getGoodnessOfFit();
	}	


	
	public static function SKEW() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());
		$Vt54vmttyjzcean = self::AVERAGE($Vi3y3l1uvwp3Args);
		$Ve4kcku5fxlp = self::STDEV($Vi3y3l1uvwp3Args);

		$V4y0urwpnd3jount = $Vn3xllbkvjad = 0;
		
		foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_bool($Vi3y3l1uvwp3rg)) &&
				(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
			} else {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vn3xllbkvjad += pow((($Vi3y3l1uvwp3rg - $Vt54vmttyjzcean) / $Ve4kcku5fxlp),3) ;
					++$V4y0urwpnd3jount;
				}
			}
		}

		
		if ($V4y0urwpnd3jount > 2) {
			return $Vn3xllbkvjad * ($V4y0urwpnd3jount / (($V4y0urwpnd3jount-1) * ($V4y0urwpnd3jount-2)));
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function SLOPE($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getSlope();
	}	


	
	public static function SMALL() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$V4o5wb5ucdu5 = array_pop($Vi3y3l1uvwp3Args);

		if ((is_numeric($V4o5wb5ucdu5)) && (!is_string($V4o5wb5ucdu5))) {
			$Vt54vmttyjzcArgs = array();
			foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
				}
			}
			$V4y0urwpnd3jount = self::COUNT($Vt54vmttyjzcArgs);
			$V4o5wb5ucdu5 = floor(--$V4o5wb5ucdu5);
			if (($V4o5wb5ucdu5 < 0) || ($V4o5wb5ucdu5 >= $V4y0urwpnd3jount) || ($V4y0urwpnd3jount == 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			sort($Vt54vmttyjzcArgs);
			return $Vt54vmttyjzcArgs[$V4o5wb5ucdu5];
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function STANDARDIZE($Vp4xjtpabm0l,$Vt54vmttyjzcean,$Ve4kcku5fxlp) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vt54vmttyjzcean	= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzcean);
		$Ve4kcku5fxlp	= PHPExcel_Calculation_Functions::flattenSingleValue($Ve4kcku5fxlp);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vt54vmttyjzcean)) && (is_numeric($Ve4kcku5fxlp))) {
			if ($Ve4kcku5fxlp <= 0) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			return ($Vp4xjtpabm0l - $Vt54vmttyjzcean) / $Ve4kcku5fxlp ;
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function STDEV() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGE($Vi3y3l1uvwp3Args);
		if (!is_null($Vi3y3l1uvwp3Mean)) {
			$Vi3y3l1uvwp3Count = -1;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				}
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					if (is_null($Vws44nszhvgoeturnValue)) {
						$Vws44nszhvgoeturnValue = pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					} else {
						$Vws44nszhvgoeturnValue += pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					}
					++$Vi3y3l1uvwp3Count;
				}
			}

			
			if (($Vi3y3l1uvwp3Count > 0) && ($Vws44nszhvgoeturnValue >= 0)) {
				return sqrt($Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count);
			}
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function STDEVA() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGEA($Vi3y3l1uvwp3Args);
		if (!is_null($Vi3y3l1uvwp3Mean)) {
			$Vi3y3l1uvwp3Count = -1;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
				} else {
					
					if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) & ($Vi3y3l1uvwp3rg != '')))) {
						if (is_bool($Vi3y3l1uvwp3rg)) {
							$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
						} elseif (is_string($Vi3y3l1uvwp3rg)) {
							$Vi3y3l1uvwp3rg = 0;
						}
						if (is_null($Vws44nszhvgoeturnValue)) {
							$Vws44nszhvgoeturnValue = pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
						} else {
							$Vws44nszhvgoeturnValue += pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
						}
						++$Vi3y3l1uvwp3Count;
					}
				}
			}

			
			if (($Vi3y3l1uvwp3Count > 0) && ($Vws44nszhvgoeturnValue >= 0)) {
				return sqrt($Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count);
			}
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function STDEVP() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGE($Vi3y3l1uvwp3Args);
		if (!is_null($Vi3y3l1uvwp3Mean)) {
			$Vi3y3l1uvwp3Count = 0;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					((!PHPExcel_Calculation_Functions::isCellValue($V51lf1kcbto4)) || (PHPExcel_Calculation_Functions::getCompatibilityMode() == PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE))) {
					$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
				}
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					if (is_null($Vws44nszhvgoeturnValue)) {
						$Vws44nszhvgoeturnValue = pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					} else {
						$Vws44nszhvgoeturnValue += pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
					}
					++$Vi3y3l1uvwp3Count;
				}
			}

			
			if (($Vi3y3l1uvwp3Count > 0) && ($Vws44nszhvgoeturnValue >= 0)) {
				return sqrt($Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count);
			}
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function STDEVPA() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());

		
		$Vws44nszhvgoeturnValue = null;

		$Vi3y3l1uvwp3Mean = self::AVERAGEA($Vi3y3l1uvwp3Args);
		if (!is_null($Vi3y3l1uvwp3Mean)) {
			$Vi3y3l1uvwp3Count = 0;
			foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
				if ((is_bool($Vi3y3l1uvwp3rg)) &&
					(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
				} else {
					
					if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) & ($Vi3y3l1uvwp3rg != '')))) {
						if (is_bool($Vi3y3l1uvwp3rg)) {
							$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
						} elseif (is_string($Vi3y3l1uvwp3rg)) {
							$Vi3y3l1uvwp3rg = 0;
						}
						if (is_null($Vws44nszhvgoeturnValue)) {
							$Vws44nszhvgoeturnValue = pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
						} else {
							$Vws44nszhvgoeturnValue += pow(($Vi3y3l1uvwp3rg - $Vi3y3l1uvwp3Mean),2);
						}
						++$Vi3y3l1uvwp3Count;
					}
				}
			}

			
			if (($Vi3y3l1uvwp3Count > 0) && ($Vws44nszhvgoeturnValue >= 0)) {
				return sqrt($Vws44nszhvgoeturnValue / $Vi3y3l1uvwp3Count);
			}
		}
		return PHPExcel_Calculation_Functions::DIV0();
	}	


	
	public static function STEYX($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues) {
		if (!self::_checkTrendArrays($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vqwmp2bx0ii2ValueCount = count($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValueCount = count($V1e1eaicqarhValues);

		if (($Vqwmp2bx0ii2ValueCount == 0) || ($Vqwmp2bx0ii2ValueCount != $V1e1eaicqarhValueCount)) {
			return PHPExcel_Calculation_Functions::NA();
		} elseif ($Vqwmp2bx0ii2ValueCount == 1) {
			return PHPExcel_Calculation_Functions::DIV0();
		}

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues);
		return $V4t3fwdd3eevestFitLinear->getStdevOfResiduals();
	}	


	
	public static function TDIST($Vp4xjtpabm0l, $Vrec2f1japonegrees, $Veca2om3awugails) {
		$Vp4xjtpabm0l		= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vrec2f1japonegrees	= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vrec2f1japonegrees));
		$Veca2om3awugails		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Veca2om3awugails));

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vrec2f1japonegrees)) && (is_numeric($Veca2om3awugails))) {
			if (($Vp4xjtpabm0l < 0) || ($Vrec2f1japonegrees < 1) || ($Veca2om3awugails < 1) || ($Veca2om3awugails > 2)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			
			
			
			
			
			
			
			
			
			$Veca2om3awugterm = $Vrec2f1japonegrees;
			$Veca2om3awugtheta = atan2($Vp4xjtpabm0l,sqrt($Veca2om3awugterm));
			$Veca2om3awugc = cos($Veca2om3awugtheta);
			$Veca2om3awugs = sin($Veca2om3awugtheta);
			$Veca2om3awugsum = 0;

			if (($Vrec2f1japonegrees % 2) == 1) {
				$Veca2om3awugi = 3;
				$Veca2om3awugterm = $Veca2om3awugc;
			} else {
				$Veca2om3awugi = 2;
				$Veca2om3awugterm = 1;
			}

			$Veca2om3awugsum = $Veca2om3awugterm;
			while ($Veca2om3awugi < $Vrec2f1japonegrees) {
				$Veca2om3awugterm *= $Veca2om3awugc * $Veca2om3awugc * ($Veca2om3awugi - 1) / $Veca2om3awugi;
				$Veca2om3awugsum += $Veca2om3awugterm;
				$Veca2om3awugi += 2;
			}
			$Veca2om3awugsum *= $Veca2om3awugs;
			if (($Vrec2f1japonegrees % 2) == 1) { $Veca2om3awugsum = M_2DIVPI * ($Veca2om3awugsum + $Veca2om3awugtheta); }
			$Veca2om3awugValue = 0.5 * (1 + $Veca2om3awugsum);
			if ($Veca2om3awugails == 1) {
				return 1 - abs($Veca2om3awugValue);
			} else {
				return 1 - abs((1 - $Veca2om3awugValue) - $Veca2om3awugValue);
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function TINV($Vzqw0ieauwu4robability, $Vrec2f1japonegrees) {
		$Vzqw0ieauwu4robability	= PHPExcel_Calculation_Functions::flattenSingleValue($Vzqw0ieauwu4robability);
		$Vrec2f1japonegrees		= floor(PHPExcel_Calculation_Functions::flattenSingleValue($Vrec2f1japonegrees));

		if ((is_numeric($Vzqw0ieauwu4robability)) && (is_numeric($Vrec2f1japonegrees))) {
			$V1e1eaicqarhLo = 100;
			$V1e1eaicqarhHi = 0;

			$V1e1eaicqarh = $V1e1eaicqarhNew = 1;
			$Vrec2f1japonx	= 1;
			$Vfhiq1lhsoja = 0;

			while ((abs($Vrec2f1japonx) > PRECISION) && ($Vfhiq1lhsoja++ < MAX_ITERATIONS)) {
				
				$Ve3oeikqcm5nult = self::TDIST($V1e1eaicqarh, $Vrec2f1japonegrees, 2);
				$Vyrkodvljby0 = $Ve3oeikqcm5nult - $Vzqw0ieauwu4robability;
				if ($Vyrkodvljby0 == 0.0) {
					$Vrec2f1japonx = 0;
				} elseif ($Vyrkodvljby0 < 0.0) {
					$V1e1eaicqarhLo = $V1e1eaicqarh;
				} else {
					$V1e1eaicqarhHi = $V1e1eaicqarh;
				}
				
				if ($Ve3oeikqcm5nult != 0.0) {
					$Vrec2f1japonx = $Vyrkodvljby0 / $Ve3oeikqcm5nult;
					$V1e1eaicqarhNew = $V1e1eaicqarh - $Vrec2f1japonx;
				}
				
				
				
				if (($V1e1eaicqarhNew < $V1e1eaicqarhLo) || ($V1e1eaicqarhNew > $V1e1eaicqarhHi) || ($Ve3oeikqcm5nult == 0.0)) {
					$V1e1eaicqarhNew = ($V1e1eaicqarhLo + $V1e1eaicqarhHi) / 2;
					$Vrec2f1japonx = $V1e1eaicqarhNew - $V1e1eaicqarh;
				}
				$V1e1eaicqarh = $V1e1eaicqarhNew;
			}
			if ($Vfhiq1lhsoja == MAX_ITERATIONS) {
				return PHPExcel_Calculation_Functions::NA();
			}
			return round($V1e1eaicqarh,12);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function TREND($Vqwmp2bx0ii2Values,$V1e1eaicqarhValues=array(),$Vmwwo1qnmepzewValues=array(),$V4y0urwpnd3jonst=True) {
		$Vqwmp2bx0ii2Values = PHPExcel_Calculation_Functions::flattenArray($Vqwmp2bx0ii2Values);
		$V1e1eaicqarhValues = PHPExcel_Calculation_Functions::flattenArray($V1e1eaicqarhValues);
		$Vmwwo1qnmepzewValues = PHPExcel_Calculation_Functions::flattenArray($Vmwwo1qnmepzewValues);
		$V4y0urwpnd3jonst	= (is_null($V4y0urwpnd3jonst))	? True :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($V4y0urwpnd3jonst);

		$V4t3fwdd3eevestFitLinear = trendClass::calculate(trendClass::TREND_LINEAR,$Vqwmp2bx0ii2Values,$V1e1eaicqarhValues,$V4y0urwpnd3jonst);
		if (empty($Vmwwo1qnmepzewValues)) {
			$Vmwwo1qnmepzewValues = $V4t3fwdd3eevestFitLinear->getXValues();
		}

		$Vws44nszhvgoeturnArray = array();
		foreach($Vmwwo1qnmepzewValues as $V1e1eaicqarhValue) {
			$Vws44nszhvgoeturnArray[0][] = $V4t3fwdd3eevestFitLinear->getValueOfYForX($V1e1eaicqarhValue);
		}

		return $Vws44nszhvgoeturnArray;
	}	


	
	public static function TRIMMEAN() {
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());

		
		$Vzqw0ieauwu4ercent = array_pop($Vi3y3l1uvwp3Args);

		if ((is_numeric($Vzqw0ieauwu4ercent)) && (!is_string($Vzqw0ieauwu4ercent))) {
			if (($Vzqw0ieauwu4ercent < 0) || ($Vzqw0ieauwu4ercent > 1)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			$Vt54vmttyjzcArgs = array();
			foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
					$Vt54vmttyjzcArgs[] = $Vi3y3l1uvwp3rg;
				}
			}
			$Vrec2f1japoniscard = floor(self::COUNT($Vt54vmttyjzcArgs) * $Vzqw0ieauwu4ercent / 2);
			sort($Vt54vmttyjzcArgs);
			for ($Vfhiq1lhsoja=0; $Vfhiq1lhsoja < $Vrec2f1japoniscard; ++$Vfhiq1lhsoja) {
				array_pop($Vt54vmttyjzcArgs);
				array_shift($Vt54vmttyjzcArgs);
			}
			return self::AVERAGE($Vt54vmttyjzcArgs);
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function VARFunc() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::DIV0();

		$Vn3xllbkvjadA = $Vn3xllbkvjadB = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			if (is_bool($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg; }
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vn3xllbkvjadA += ($Vi3y3l1uvwp3rg * $Vi3y3l1uvwp3rg);
				$Vn3xllbkvjadB += $Vi3y3l1uvwp3rg;
				++$Vi3y3l1uvwp3Count;
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 1) {
			$Vn3xllbkvjadA *= $Vi3y3l1uvwp3Count;
			$Vn3xllbkvjadB *= $Vn3xllbkvjadB;
			$Vws44nszhvgoeturnValue = ($Vn3xllbkvjadA - $Vn3xllbkvjadB) / ($Vi3y3l1uvwp3Count * ($Vi3y3l1uvwp3Count - 1));
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function VARA() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::DIV0();

		$Vn3xllbkvjadA = $Vn3xllbkvjadB = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_string($Vi3y3l1uvwp3rg)) &&
				(PHPExcel_Calculation_Functions::isValue($V51lf1kcbto4))) {
				return PHPExcel_Calculation_Functions::VALUE();
			} elseif ((is_string($Vi3y3l1uvwp3rg)) &&
				(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
			} else {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) & ($Vi3y3l1uvwp3rg != '')))) {
					if (is_bool($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
					} elseif (is_string($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = 0;
					}
					$Vn3xllbkvjadA += ($Vi3y3l1uvwp3rg * $Vi3y3l1uvwp3rg);
					$Vn3xllbkvjadB += $Vi3y3l1uvwp3rg;
					++$Vi3y3l1uvwp3Count;
				}
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 1) {
			$Vn3xllbkvjadA *= $Vi3y3l1uvwp3Count;
			$Vn3xllbkvjadB *= $Vn3xllbkvjadB;
			$Vws44nszhvgoeturnValue = ($Vn3xllbkvjadA - $Vn3xllbkvjadB) / ($Vi3y3l1uvwp3Count * ($Vi3y3l1uvwp3Count - 1));
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function VARP() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::DIV0();

		$Vn3xllbkvjadA = $Vn3xllbkvjadB = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $Vi3y3l1uvwp3rg) {
			if (is_bool($Vi3y3l1uvwp3rg)) { $Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg; }
			
			if ((is_numeric($Vi3y3l1uvwp3rg)) && (!is_string($Vi3y3l1uvwp3rg))) {
				$Vn3xllbkvjadA += ($Vi3y3l1uvwp3rg * $Vi3y3l1uvwp3rg);
				$Vn3xllbkvjadB += $Vi3y3l1uvwp3rg;
				++$Vi3y3l1uvwp3Count;
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			$Vn3xllbkvjadA *= $Vi3y3l1uvwp3Count;
			$Vn3xllbkvjadB *= $Vn3xllbkvjadB;
			$Vws44nszhvgoeturnValue = ($Vn3xllbkvjadA - $Vn3xllbkvjadB) / ($Vi3y3l1uvwp3Count * $Vi3y3l1uvwp3Count);
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function VARPA() {
		
		$Vws44nszhvgoeturnValue = PHPExcel_Calculation_Functions::DIV0();

		$Vn3xllbkvjadA = $Vn3xllbkvjadB = 0;

		
		$Vi3y3l1uvwp3Args = PHPExcel_Calculation_Functions::flattenArrayIndexed(func_get_args());
		$Vi3y3l1uvwp3Count = 0;
		foreach ($Vi3y3l1uvwp3Args as $V51lf1kcbto4 => $Vi3y3l1uvwp3rg) {
			if ((is_string($Vi3y3l1uvwp3rg)) &&
				(PHPExcel_Calculation_Functions::isValue($V51lf1kcbto4))) {
				return PHPExcel_Calculation_Functions::VALUE();
			} elseif ((is_string($Vi3y3l1uvwp3rg)) &&
				(!PHPExcel_Calculation_Functions::isMatrixValue($V51lf1kcbto4))) {
			} else {
				
				if ((is_numeric($Vi3y3l1uvwp3rg)) || (is_bool($Vi3y3l1uvwp3rg)) || ((is_string($Vi3y3l1uvwp3rg) & ($Vi3y3l1uvwp3rg != '')))) {
					if (is_bool($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = (integer) $Vi3y3l1uvwp3rg;
					} elseif (is_string($Vi3y3l1uvwp3rg)) {
						$Vi3y3l1uvwp3rg = 0;
					}
					$Vn3xllbkvjadA += ($Vi3y3l1uvwp3rg * $Vi3y3l1uvwp3rg);
					$Vn3xllbkvjadB += $Vi3y3l1uvwp3rg;
					++$Vi3y3l1uvwp3Count;
				}
			}
		}

		
		if ($Vi3y3l1uvwp3Count > 0) {
			$Vn3xllbkvjadA *= $Vi3y3l1uvwp3Count;
			$Vn3xllbkvjadB *= $Vn3xllbkvjadB;
			$Vws44nszhvgoeturnValue = ($Vn3xllbkvjadA - $Vn3xllbkvjadB) / ($Vi3y3l1uvwp3Count * $Vi3y3l1uvwp3Count);
		}
		return $Vws44nszhvgoeturnValue;
	}	


	
	public static function WEIBULL($Vp4xjtpabm0l, $Vi3y3l1uvwp3lpha, $V4t3fwdd3eeveta, $V4y0urwpnd3jumulative) {
		$Vp4xjtpabm0l	= PHPExcel_Calculation_Functions::flattenSingleValue($Vp4xjtpabm0l);
		$Vi3y3l1uvwp3lpha	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi3y3l1uvwp3lpha);
		$V4t3fwdd3eeveta	= PHPExcel_Calculation_Functions::flattenSingleValue($V4t3fwdd3eeveta);

		if ((is_numeric($Vp4xjtpabm0l)) && (is_numeric($Vi3y3l1uvwp3lpha)) && (is_numeric($V4t3fwdd3eeveta))) {
			if (($Vp4xjtpabm0l < 0) || ($Vi3y3l1uvwp3lpha <= 0) || ($V4t3fwdd3eeveta <= 0)) {
				return PHPExcel_Calculation_Functions::NaN();
			}
			if ((is_numeric($V4y0urwpnd3jumulative)) || (is_bool($V4y0urwpnd3jumulative))) {
				if ($V4y0urwpnd3jumulative) {
					return 1 - exp(0 - pow($Vp4xjtpabm0l / $V4t3fwdd3eeveta,$Vi3y3l1uvwp3lpha));
				} else {
					return ($Vi3y3l1uvwp3lpha / pow($V4t3fwdd3eeveta,$Vi3y3l1uvwp3lpha)) * pow($Vp4xjtpabm0l,$Vi3y3l1uvwp3lpha - 1) * exp(0 - pow($Vp4xjtpabm0l / $V4t3fwdd3eeveta,$Vi3y3l1uvwp3lpha));
				}
			}
		}
		return PHPExcel_Calculation_Functions::VALUE();
	}	


	
	public static function ZTEST($Vrec2f1japonataSet, $Vt54vmttyjzc0, $Vpp0nudpwzrw = NULL) {
		$Vrec2f1japonataSet	= PHPExcel_Calculation_Functions::flattenArrayIndexed($Vrec2f1japonataSet);
		$Vt54vmttyjzc0			= PHPExcel_Calculation_Functions::flattenSingleValue($Vt54vmttyjzc0);
		$Vpp0nudpwzrw		= PHPExcel_Calculation_Functions::flattenSingleValue($Vpp0nudpwzrw);

		if (is_null($Vpp0nudpwzrw)) {
			$Vpp0nudpwzrw = self::STDEV($Vrec2f1japonataSet);
		}
		$Vmwwo1qnmepz = count($Vrec2f1japonataSet);

		return 1 - self::NORMSDIST((self::AVERAGE($Vrec2f1japonataSet) - $Vt54vmttyjzc0)/($Vpp0nudpwzrw/SQRT($Vmwwo1qnmepz)));
	}	

}	
