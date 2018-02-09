<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_Logical {

	
	public static function TRUE() {
		return TRUE;
	}	


	
	public static function FALSE() {
		return FALSE;
	}	


	
	public static function LOGICAL_AND() {
		
		$Vbco3t3kne3m = TRUE;

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		$Viggudp1cajb = -1;
		foreach ($Voojdymxtgs1 as $Viggudp1cajb => $Vnpssjjicvbx) {
			
			if (is_bool($Vnpssjjicvbx)) {
				$Vbco3t3kne3m = $Vbco3t3kne3m && $Vnpssjjicvbx;
			} elseif ((is_numeric($Vnpssjjicvbx)) && (!is_string($Vnpssjjicvbx))) {
				$Vbco3t3kne3m = $Vbco3t3kne3m && ($Vnpssjjicvbx != 0);
			} elseif (is_string($Vnpssjjicvbx)) {
				$Vnpssjjicvbx = strtoupper($Vnpssjjicvbx);
				if (($Vnpssjjicvbx == 'TRUE') || ($Vnpssjjicvbx == PHPExcel_Calculation::getTRUE())) {
					$Vnpssjjicvbx = TRUE;
				} elseif (($Vnpssjjicvbx == 'FALSE') || ($Vnpssjjicvbx == PHPExcel_Calculation::getFALSE())) {
					$Vnpssjjicvbx = FALSE;
				} else {
					return PHPExcel_Calculation_Functions::VALUE();
				}
				$Vbco3t3kne3m = $Vbco3t3kne3m && ($Vnpssjjicvbx != 0);
			}
		}

		
		if ($Viggudp1cajb < 0) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		return $Vbco3t3kne3m;
	}	


	
	public static function LOGICAL_OR() {
		
		$Vbco3t3kne3m = FALSE;

		
		$Voojdymxtgs1 = PHPExcel_Calculation_Functions::flattenArray(func_get_args());
		$Viggudp1cajb = -1;
		foreach ($Voojdymxtgs1 as $Viggudp1cajb => $Vnpssjjicvbx) {
			
			if (is_bool($Vnpssjjicvbx)) {
				$Vbco3t3kne3m = $Vbco3t3kne3m || $Vnpssjjicvbx;
			} elseif ((is_numeric($Vnpssjjicvbx)) && (!is_string($Vnpssjjicvbx))) {
				$Vbco3t3kne3m = $Vbco3t3kne3m || ($Vnpssjjicvbx != 0);
			} elseif (is_string($Vnpssjjicvbx)) {
				$Vnpssjjicvbx = strtoupper($Vnpssjjicvbx);
				if (($Vnpssjjicvbx == 'TRUE') || ($Vnpssjjicvbx == PHPExcel_Calculation::getTRUE())) {
					$Vnpssjjicvbx = TRUE;
				} elseif (($Vnpssjjicvbx == 'FALSE') || ($Vnpssjjicvbx == PHPExcel_Calculation::getFALSE())) {
					$Vnpssjjicvbx = FALSE;
				} else {
					return PHPExcel_Calculation_Functions::VALUE();
				}
				$Vbco3t3kne3m = $Vbco3t3kne3m || ($Vnpssjjicvbx != 0);
			}
		}

		
		if ($Viggudp1cajb < 0) {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		return $Vbco3t3kne3m;
	}	


	
	public static function NOT($Vntnopqubikz=FALSE) {
		$Vntnopqubikz = PHPExcel_Calculation_Functions::flattenSingleValue($Vntnopqubikz);
		if (is_string($Vntnopqubikz)) {
			$Vntnopqubikz = strtoupper($Vntnopqubikz);
			if (($Vntnopqubikz == 'TRUE') || ($Vntnopqubikz == PHPExcel_Calculation::getTRUE())) {
				return FALSE;
			} elseif (($Vntnopqubikz == 'FALSE') || ($Vntnopqubikz == PHPExcel_Calculation::getFALSE())) {
				return TRUE;
			} else {
				return PHPExcel_Calculation_Functions::VALUE();
			}
		}

		return !$Vntnopqubikz;
	}	

	
	public static function STATEMENT_IF($V20znxhrljlq = TRUE, $Vbafq0j5qyt5 = 0, $Vfzbalxszchf = FALSE) {
		$V20znxhrljlq		= (is_null($V20znxhrljlq))		? TRUE :	(boolean) PHPExcel_Calculation_Functions::flattenSingleValue($V20znxhrljlq);
		$Vbafq0j5qyt5	= (is_null($Vbafq0j5qyt5))	? 0 :		PHPExcel_Calculation_Functions::flattenSingleValue($Vbafq0j5qyt5);
		$Vfzbalxszchf	= (is_null($Vfzbalxszchf))	? FALSE :	PHPExcel_Calculation_Functions::flattenSingleValue($Vfzbalxszchf);

		return ($V20znxhrljlq) ? $Vbafq0j5qyt5 : $Vfzbalxszchf;
	}	


	
	public static function IFERROR($V41nfkbsz42i = '', $Vtgkwft4kod4 = '') {
		$V41nfkbsz42i	= (is_null($V41nfkbsz42i))	? '' :	PHPExcel_Calculation_Functions::flattenSingleValue($V41nfkbsz42i);
		$Vtgkwft4kod4	= (is_null($Vtgkwft4kod4))	? '' :	PHPExcel_Calculation_Functions::flattenSingleValue($Vtgkwft4kod4);

		return self::STATEMENT_IF(PHPExcel_Calculation_Functions::IS_ERROR($V41nfkbsz42i), $Vtgkwft4kod4, $V41nfkbsz42i);
	}	

}	
