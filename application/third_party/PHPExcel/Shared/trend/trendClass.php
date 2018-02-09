<?php



require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/linearBestFitClass.php';
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/logarithmicBestFitClass.php';
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/exponentialBestFitClass.php';
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/powerBestFitClass.php';
require_once PHPEXCEL_ROOT . 'PHPExcel/Shared/trend/polynomialBestFitClass.php';



class trendClass
{
	const TREND_LINEAR				= 'Linear';
	const TREND_LOGARITHMIC			= 'Logarithmic';
	const TREND_EXPONENTIAL			= 'Exponential';
	const TREND_POWER				= 'Power';
	const TREND_POLYNOMIAL_2		= 'Polynomial_2';
	const TREND_POLYNOMIAL_3		= 'Polynomial_3';
	const TREND_POLYNOMIAL_4		= 'Polynomial_4';
	const TREND_POLYNOMIAL_5		= 'Polynomial_5';
	const TREND_POLYNOMIAL_6		= 'Polynomial_6';
	const TREND_BEST_FIT			= 'Bestfit';
	const TREND_BEST_FIT_NO_POLY	= 'Bestfit_no_Polynomials';

	
	private static $Vttohmof5izc = array( self::TREND_LINEAR,
										 self::TREND_LOGARITHMIC,
										 self::TREND_EXPONENTIAL,
										 self::TREND_POWER
									   );
	
	private static $Vig12ahvl44d = array( self::TREND_POLYNOMIAL_2,
												  self::TREND_POLYNOMIAL_3,
												  self::TREND_POLYNOMIAL_4,
												  self::TREND_POLYNOMIAL_5,
												  self::TREND_POLYNOMIAL_6
											    );

	
	private static $V3npdqhirtvd = array();


	public static function calculate($Vlxczpbggqcj=self::TREND_BEST_FIT, $Vuhoubstni5e, $Vkq5aczswteg=array(), $Vegfwhesreey=True) {
		
		$Vypihmh2qfpq = count($Vuhoubstni5e);
		$Vbrtfkckdy5v = count($Vkq5aczswteg);

		
		if ($Vbrtfkckdy5v == 0) {
			$Vkq5aczswteg = range(1,$Vypihmh2qfpq);
			$Vbrtfkckdy5v = $Vypihmh2qfpq;
		} elseif ($Vypihmh2qfpq != $Vbrtfkckdy5v) {
			
			trigger_error("trend(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
		}

		$Vseq1edikdvg = md5($Vlxczpbggqcj.$Vegfwhesreey.serialize($Vuhoubstni5e).serialize($Vkq5aczswteg));
		
		switch ($Vlxczpbggqcj) {
			
			case self::TREND_LINEAR :
			case self::TREND_LOGARITHMIC :
			case self::TREND_EXPONENTIAL :
			case self::TREND_POWER :
				if (!isset(self::$V3npdqhirtvd[$Vseq1edikdvg])) {
					$Vlnozcmllc4v = 'PHPExcel_'.$Vlxczpbggqcj.'_Best_Fit';
					self::$V3npdqhirtvd[$Vseq1edikdvg] = new $Vlnozcmllc4v($Vuhoubstni5e,$Vkq5aczswteg,$Vegfwhesreey);
				}
				return self::$V3npdqhirtvd[$Vseq1edikdvg];
				break;
			case self::TREND_POLYNOMIAL_2	:
			case self::TREND_POLYNOMIAL_3	:
			case self::TREND_POLYNOMIAL_4	:
			case self::TREND_POLYNOMIAL_5	:
			case self::TREND_POLYNOMIAL_6	:
				if (!isset(self::$V3npdqhirtvd[$Vseq1edikdvg])) {
					$Vkmq2xsnwdk5 = substr($Vlxczpbggqcj,-1);
					self::$V3npdqhirtvd[$Vseq1edikdvg] = new PHPExcel_Polynomial_Best_Fit($Vkmq2xsnwdk5,$Vuhoubstni5e,$Vkq5aczswteg,$Vegfwhesreey);
				}
				return self::$V3npdqhirtvd[$Vseq1edikdvg];
				break;
			case self::TREND_BEST_FIT			:
			case self::TREND_BEST_FIT_NO_POLY	:
				
				
				foreach(self::$Vttohmof5izc as $Vfqhkuvocqq4) {
					$Vlnozcmllc4v = 'PHPExcel_'.$Vfqhkuvocqq4.'BestFit';
					$Vzyaosnqvxxc[$Vfqhkuvocqq4] = new $Vlnozcmllc4v($Vuhoubstni5e,$Vkq5aczswteg,$Vegfwhesreey);
					$VzyaosnqvxxcValue[$Vfqhkuvocqq4] = $Vzyaosnqvxxc[$Vfqhkuvocqq4]->getGoodnessOfFit();
				}
				if ($Vlxczpbggqcj != self::TREND_BEST_FIT_NO_POLY) {
					foreach(self::$Vig12ahvl44d as $Vfqhkuvocqq4) {
						$Vkmq2xsnwdk5 = substr($Vfqhkuvocqq4,-1);
						$Vzyaosnqvxxc[$Vfqhkuvocqq4] = new PHPExcel_Polynomial_Best_Fit($Vkmq2xsnwdk5,$Vuhoubstni5e,$Vkq5aczswteg,$Vegfwhesreey);
						if ($Vzyaosnqvxxc[$Vfqhkuvocqq4]->getError()) {
							unset($Vzyaosnqvxxc[$Vfqhkuvocqq4]);
						} else {
							$VzyaosnqvxxcValue[$Vfqhkuvocqq4] = $Vzyaosnqvxxc[$Vfqhkuvocqq4]->getGoodnessOfFit();
						}
					}
				}
				
				arsort($VzyaosnqvxxcValue);
				$VzyaosnqvxxcType = key($VzyaosnqvxxcValue);
				return $Vzyaosnqvxxc[$VzyaosnqvxxcType];
				break;
			default	:
				return false;
		}
	}	

}	