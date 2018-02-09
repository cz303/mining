<?php




if (!defined('PHPEXCEL_ROOT')) {
	
	define('PHPEXCEL_ROOT', dirname(__FILE__) . '/../../');
	require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



class PHPExcel_Calculation_LookupRef {


	
	public static function CELL_ADDRESS($Vexbtekafkvl, $Vn4q2p4mkwa0, $Vcno1hfezlg1=1, $V4xcd1yeecxs=True, $Vi1gddylipym='') {
		$Vexbtekafkvl		= PHPExcel_Calculation_Functions::flattenSingleValue($Vexbtekafkvl);
		$Vn4q2p4mkwa0		= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4q2p4mkwa0);
		$Vcno1hfezlg1	= PHPExcel_Calculation_Functions::flattenSingleValue($Vcno1hfezlg1);
		$Vi1gddylipym	= PHPExcel_Calculation_Functions::flattenSingleValue($Vi1gddylipym);

		if (($Vexbtekafkvl < 1) || ($Vn4q2p4mkwa0 < 1)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if ($Vi1gddylipym > '') {
			if (strpos($Vi1gddylipym,' ') !== False) { $Vi1gddylipym = "'".$Vi1gddylipym."'"; }
			$Vi1gddylipym .='!';
		}
		if ((!is_bool($V4xcd1yeecxs)) || $V4xcd1yeecxs) {
			$VexbtekafkvlRelative = $Vn4q2p4mkwa0Relative = '$';
			$Vn4q2p4mkwa0 = PHPExcel_Cell::stringFromColumnIndex($Vn4q2p4mkwa0-1);
			if (($Vcno1hfezlg1 == 2) || ($Vcno1hfezlg1 == 4)) { $Vn4q2p4mkwa0Relative = ''; }
			if (($Vcno1hfezlg1 == 3) || ($Vcno1hfezlg1 == 4)) { $VexbtekafkvlRelative = ''; }
			return $Vi1gddylipym.$Vn4q2p4mkwa0Relative.$Vn4q2p4mkwa0.$VexbtekafkvlRelative.$Vexbtekafkvl;
		} else {
			if (($Vcno1hfezlg1 == 2) || ($Vcno1hfezlg1 == 4)) { $Vn4q2p4mkwa0 = '['.$Vn4q2p4mkwa0.']'; }
			if (($Vcno1hfezlg1 == 3) || ($Vcno1hfezlg1 == 4)) { $Vexbtekafkvl = '['.$Vexbtekafkvl.']'; }
			return $Vi1gddylipym.'R'.$Vexbtekafkvl.'C'.$Vn4q2p4mkwa0;
		}
	}	


	
	public static function COLUMN($V4343a0vl0rl=Null) {
		if (is_null($V4343a0vl0rl) || trim($V4343a0vl0rl) === '') { return 0; }

		if (is_array($V4343a0vl0rl)) {
			foreach($V4343a0vl0rl as $Vn4q2p4mkwa0Key => $Vp4xjtpabm0l) {
				$Vn4q2p4mkwa0Key = preg_replace('/[^a-z]/i','',$Vn4q2p4mkwa0Key);
				return (integer) PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0Key);
			}
		} else {
			if (strpos($V4343a0vl0rl,'!') !== false) {
				list($Vzg4jtrmmzdy,$V4343a0vl0rl) = explode('!',$V4343a0vl0rl);
			}
			if (strpos($V4343a0vl0rl,':') !== false) {
				list($Vuthtgt2ubmo,$V1ay2j5sudts) = explode(':',$V4343a0vl0rl);
				$Vuthtgt2ubmo = preg_replace('/[^a-z]/i','',$Vuthtgt2ubmo);
				$V1ay2j5sudts = preg_replace('/[^a-z]/i','',$V1ay2j5sudts);
				$Vbco3t3kne3m = array();
				do {
					$Vbco3t3kne3m[] = (integer) PHPExcel_Cell::columnIndexFromString($Vuthtgt2ubmo);
				} while ($Vuthtgt2ubmo++ != $V1ay2j5sudts);
				return $Vbco3t3kne3m;
			} else {
				$V4343a0vl0rl = preg_replace('/[^a-z]/i','',$V4343a0vl0rl);
				return (integer) PHPExcel_Cell::columnIndexFromString($V4343a0vl0rl);
			}
		}
	}	


	
	public static function COLUMNS($V4343a0vl0rl=Null) {
		if (is_null($V4343a0vl0rl) || $V4343a0vl0rl === '') {
			return 1;
		} elseif (!is_array($V4343a0vl0rl)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		$V1e1eaicqarh = array_keys($V4343a0vl0rl);
		$V1e1eaicqarh = array_shift($V1e1eaicqarh);
		$Vbknbl2sblrj = (is_numeric($V1e1eaicqarh));
		list($Vn4q2p4mkwa0s,$Vexbtekafkvls) = PHPExcel_Calculation::_getMatrixDimensions($V4343a0vl0rl);

		if ($Vbknbl2sblrj) {
			return $Vexbtekafkvls;
		} else {
			return $Vn4q2p4mkwa0s;
		}
	}	


	
	public static function ROW($V4343a0vl0rl=Null) {
		if (is_null($V4343a0vl0rl) || trim($V4343a0vl0rl) === '') { return 0; }

		if (is_array($V4343a0vl0rl)) {
			foreach($V4343a0vl0rl as $Vn4q2p4mkwa0Key => $VexbtekafkvlValue) {
				foreach($VexbtekafkvlValue as $VexbtekafkvlKey => $V1qnzxgra0ng) {
					return (integer) preg_replace('/[^0-9]/i','',$VexbtekafkvlKey);
				}
			}
		} else {
			if (strpos($V4343a0vl0rl,'!') !== false) {
				list($Vzg4jtrmmzdy,$V4343a0vl0rl) = explode('!',$V4343a0vl0rl);
			}
			if (strpos($V4343a0vl0rl,':') !== false) {
				list($Vuthtgt2ubmo,$V1ay2j5sudts) = explode(':',$V4343a0vl0rl);
				$Vuthtgt2ubmo = preg_replace('/[^0-9]/','',$Vuthtgt2ubmo);
				$V1ay2j5sudts = preg_replace('/[^0-9]/','',$V1ay2j5sudts);
				$Vbco3t3kne3m = array();
				do {
					$Vbco3t3kne3m[][] = (integer) $Vuthtgt2ubmo;
				} while ($Vuthtgt2ubmo++ != $V1ay2j5sudts);
				return $Vbco3t3kne3m;
			} else {
				list($V4343a0vl0rl) = explode(':',$V4343a0vl0rl);
				return (integer) preg_replace('/[^0-9]/','',$V4343a0vl0rl);
			}
		}
	}	


	
	public static function ROWS($V4343a0vl0rl=Null) {
		if (is_null($V4343a0vl0rl) || $V4343a0vl0rl === '') {
			return 1;
		} elseif (!is_array($V4343a0vl0rl)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		$Vfhiq1lhsoja = array_keys($V4343a0vl0rl);
		$Vbknbl2sblrj = (is_numeric(array_shift($Vfhiq1lhsoja)));
		list($Vn4q2p4mkwa0s,$Vexbtekafkvls) = PHPExcel_Calculation::_getMatrixDimensions($V4343a0vl0rl);

		if ($Vbknbl2sblrj) {
			return $Vn4q2p4mkwa0s;
		} else {
			return $Vexbtekafkvls;
		}
	}	


	
	public static function HYPERLINK($Vnz1yywt0vkw = '', $Vwlbbmoxohxv = null, PHPExcel_Cell $Vp0mtfiyrfm5 = null) {
		$Vrukcxz5icxf = func_get_args();
		$Vp0mtfiyrfm5 = array_pop($Vrukcxz5icxf);

		$Vnz1yywt0vkw		= (is_null($Vnz1yywt0vkw))		? '' :	PHPExcel_Calculation_Functions::flattenSingleValue($Vnz1yywt0vkw);
		$Vwlbbmoxohxv	= (is_null($Vwlbbmoxohxv))	? '' :	PHPExcel_Calculation_Functions::flattenSingleValue($Vwlbbmoxohxv);

		if ((!is_object($Vp0mtfiyrfm5)) || (trim($Vnz1yywt0vkw) == '')) {
			return PHPExcel_Calculation_Functions::REF();
		}

		if ((is_object($Vwlbbmoxohxv)) || trim($Vwlbbmoxohxv) == '') {
			$Vwlbbmoxohxv = $Vnz1yywt0vkw;
		}

		$Vp0mtfiyrfm5->getHyperlink()->setUrl($Vnz1yywt0vkw);

		return $Vwlbbmoxohxv;
	}	


	
	public static function INDIRECT($V4343a0vl0rl = NULL, PHPExcel_Cell $Vp0mtfiyrfm5 = NULL) {
		$V4343a0vl0rl	= PHPExcel_Calculation_Functions::flattenSingleValue($V4343a0vl0rl);
		if (is_null($V4343a0vl0rl) || $V4343a0vl0rl === '') {
			return PHPExcel_Calculation_Functions::REF();
		}

		$V4343a0vl0rl1 = $V4343a0vl0rl;
		$V4343a0vl0rl2 = NULL;
		if (strpos($V4343a0vl0rl,':') !== false) {
			list($V4343a0vl0rl1,$V4343a0vl0rl2) = explode(':',$V4343a0vl0rl);
		}

		if ((!preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_CELLREF.'$/i', $V4343a0vl0rl1, $Vt3xexsia3ta)) ||
			((!is_null($V4343a0vl0rl2)) && (!preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_CELLREF.'$/i', $V4343a0vl0rl2, $Vt3xexsia3ta)))) {
			if (!preg_match('/^'.PHPExcel_Calculation::CALCULATION_REGEXP_NAMEDRANGE.'$/i', $V4343a0vl0rl1, $Vt3xexsia3ta)) {
				return PHPExcel_Calculation_Functions::REF();
			}

			if (strpos($V4343a0vl0rl,'!') !== FALSE) {
				list($Vzg4jtrmmzdyName, $V4343a0vl0rl) = explode('!',$V4343a0vl0rl);
				$Vzg4jtrmmzdyName = trim($Vzg4jtrmmzdyName, "'");
				$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet()->getParent()->getSheetByName($Vzg4jtrmmzdyName);
			} else {
				$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet();
			}

			return PHPExcel_Calculation::getInstance()->extractNamedRange($V4343a0vl0rl, $Vci1dgyyzjho, FALSE);
		}

		if (strpos($V4343a0vl0rl,'!') !== FALSE) {
			list($Vzg4jtrmmzdyName,$V4343a0vl0rl) = explode('!',$V4343a0vl0rl);
			$Vzg4jtrmmzdyName = trim($Vzg4jtrmmzdyName, "'");
			$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet()->getParent()->getSheetByName($Vzg4jtrmmzdyName);
		} else {
			$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet();
		}

		return PHPExcel_Calculation::getInstance()->extractCellRange($V4343a0vl0rl, $Vci1dgyyzjho, FALSE);
	}	


	
	public static function OFFSET($V4343a0vl0rl=Null,$Vexbtekafkvls=0,$Vn4q2p4mkwa0s=0,$Vzo4g5xb4yip=null,$Vojs2qdgagwv=null) {
		$Vexbtekafkvls		= PHPExcel_Calculation_Functions::flattenSingleValue($Vexbtekafkvls);
		$Vn4q2p4mkwa0s	= PHPExcel_Calculation_Functions::flattenSingleValue($Vn4q2p4mkwa0s);
		$Vzo4g5xb4yip		= PHPExcel_Calculation_Functions::flattenSingleValue($Vzo4g5xb4yip);
		$Vojs2qdgagwv		= PHPExcel_Calculation_Functions::flattenSingleValue($Vojs2qdgagwv);
		if ($V4343a0vl0rl == Null) {
			return 0;
		}

		$Vrukcxz5icxf = func_get_args();
		$Vp0mtfiyrfm5 = array_pop($Vrukcxz5icxf);
		if (!is_object($Vp0mtfiyrfm5)) {
			return PHPExcel_Calculation_Functions::REF();
		}

		$Vzg4jtrmmzdyName = NULL;
		if (strpos($V4343a0vl0rl,"!")) {
			list($Vzg4jtrmmzdyName,$V4343a0vl0rl) = explode("!",$V4343a0vl0rl);
			$Vzg4jtrmmzdyName = trim($Vzg4jtrmmzdyName, "'");
		}
		if (strpos($V4343a0vl0rl,":")) {
			list($Vafq11amiamr,$V4wgbnkx4myk) = explode(":",$V4343a0vl0rl);
		} else {
			$Vafq11amiamr = $V4wgbnkx4myk = $V4343a0vl0rl;
		}
		list($Vafq11amiamrColumn,$Vafq11amiamrRow) = PHPExcel_Cell::coordinateFromString($Vafq11amiamr);
		list($V4wgbnkx4mykColumn,$V4wgbnkx4mykRow) = PHPExcel_Cell::coordinateFromString($V4wgbnkx4myk);

		$Vafq11amiamrRow += $Vexbtekafkvls;
		$Vafq11amiamrColumn = PHPExcel_Cell::columnIndexFromString($Vafq11amiamrColumn) - 1;
		$Vafq11amiamrColumn += $Vn4q2p4mkwa0s;

		if (($Vafq11amiamrRow <= 0) || ($Vafq11amiamrColumn < 0)) {
			return PHPExcel_Calculation_Functions::REF();
		}
		$V4wgbnkx4mykColumn = PHPExcel_Cell::columnIndexFromString($V4wgbnkx4mykColumn) - 1;
		if (($Vojs2qdgagwv != null) && (!is_object($Vojs2qdgagwv))) {
			$V4wgbnkx4mykColumn = $Vafq11amiamrColumn + $Vojs2qdgagwv - 1;
		} else {
			$V4wgbnkx4mykColumn += $Vn4q2p4mkwa0s;
		}
		$Vafq11amiamrColumn = PHPExcel_Cell::stringFromColumnIndex($Vafq11amiamrColumn);

		if (($Vzo4g5xb4yip != null) && (!is_object($Vzo4g5xb4yip))) {
			$V4wgbnkx4mykRow = $Vafq11amiamrRow + $Vzo4g5xb4yip - 1;
		} else {
			$V4wgbnkx4mykRow += $Vexbtekafkvls;
		}

		if (($V4wgbnkx4mykRow <= 0) || ($V4wgbnkx4mykColumn < 0)) {
			return PHPExcel_Calculation_Functions::REF();
		}
		$V4wgbnkx4mykColumn = PHPExcel_Cell::stringFromColumnIndex($V4wgbnkx4mykColumn);

		$V4343a0vl0rl = $Vafq11amiamrColumn.$Vafq11amiamrRow;
		if (($Vafq11amiamrColumn != $V4wgbnkx4mykColumn) || ($Vafq11amiamrRow != $V4wgbnkx4mykRow)) {
			$V4343a0vl0rl .= ':'.$V4wgbnkx4mykColumn.$V4wgbnkx4mykRow;
		}

		if ($Vzg4jtrmmzdyName !== NULL) {
			$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet()->getParent()->getSheetByName($Vzg4jtrmmzdyName);
		} else {
			$Vci1dgyyzjho = $Vp0mtfiyrfm5->getWorksheet();
		}

		return PHPExcel_Calculation::getInstance()->extractCellRange($V4343a0vl0rl, $Vci1dgyyzjho, False);
	}	


	
	public static function CHOOSE() {
		$Vrpxakolqrjq = func_get_args();
		$Vmxwlgazrxsi = PHPExcel_Calculation_Functions::flattenArray(array_shift($Vrpxakolqrjq));
		$Vvpjtijzb2ud = count($Vrpxakolqrjq) - 1;

		if(is_array($Vmxwlgazrxsi)) {
			$Vmxwlgazrxsi = array_shift($Vmxwlgazrxsi);
		}
		if ((is_numeric($Vmxwlgazrxsi)) && (!is_bool($Vmxwlgazrxsi))) {
			--$Vmxwlgazrxsi;
		} else {
			return PHPExcel_Calculation_Functions::VALUE();
		}
		$Vmxwlgazrxsi = floor($Vmxwlgazrxsi);
		if (($Vmxwlgazrxsi < 0) || ($Vmxwlgazrxsi > $Vvpjtijzb2ud)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (is_array($Vrpxakolqrjq[$Vmxwlgazrxsi])) {
			return PHPExcel_Calculation_Functions::flattenArray($Vrpxakolqrjq[$Vmxwlgazrxsi]);
		} else {
			return $Vrpxakolqrjq[$Vmxwlgazrxsi];
		}
	}	


	
	public static function MATCH($V0qo5aua3ryu, $V5xgtesr24am, $V4llkmjaxzn5=1) {
		$V5xgtesr24am = PHPExcel_Calculation_Functions::flattenArray($V5xgtesr24am);
		$V0qo5aua3ryu = PHPExcel_Calculation_Functions::flattenSingleValue($V0qo5aua3ryu);
		$V4llkmjaxzn5	= (is_null($V4llkmjaxzn5)) ? 1 : (int) PHPExcel_Calculation_Functions::flattenSingleValue($V4llkmjaxzn5);
		
		$V0qo5aua3ryu = strtolower($V0qo5aua3ryu);

		
		if ((!is_numeric($V0qo5aua3ryu)) && (!is_string($V0qo5aua3ryu)) && (!is_bool($V0qo5aua3ryu))) {
			return PHPExcel_Calculation_Functions::NA();
		}

		
		if (($V4llkmjaxzn5 !== 0) && ($V4llkmjaxzn5 !== -1) && ($V4llkmjaxzn5 !== 1)) {
			return PHPExcel_Calculation_Functions::NA();
		}

		
		$V0wqfu3kvjfz = count($V5xgtesr24am);
		if ($V0wqfu3kvjfz <= 0) {
			return PHPExcel_Calculation_Functions::NA();
		}

		
		foreach($V5xgtesr24am as $Vfhiq1lhsoja => $Vt0fct3sfdpe) {
			
			if ((!is_numeric($Vt0fct3sfdpe)) && (!is_string($Vt0fct3sfdpe)) &&
				(!is_bool($Vt0fct3sfdpe)) && (!is_null($Vt0fct3sfdpe))) {
				return PHPExcel_Calculation_Functions::NA();
			}
			
			if (is_string($Vt0fct3sfdpe)) {
				$V5xgtesr24am[$Vfhiq1lhsoja] = strtolower($Vt0fct3sfdpe);
			}
			if ((is_null($Vt0fct3sfdpe)) && (($V4llkmjaxzn5 == 1) || ($V4llkmjaxzn5 == -1))) {
				$V5xgtesr24am = array_slice($V5xgtesr24am,0,$Vfhiq1lhsoja-1);
			}
		}

		
		if ($V4llkmjaxzn5 == 1) {
			asort($V5xgtesr24am);
			$Vrnlwn4uu3cb = array_keys($V5xgtesr24am);
		} elseif($V4llkmjaxzn5 == -1) {
			arsort($V5xgtesr24am);
			$Vrnlwn4uu3cb = array_keys($V5xgtesr24am);
		}

		
		
		
		


		foreach($V5xgtesr24am as $Vfhiq1lhsoja => $Vt0fct3sfdpe) {
			if (($V4llkmjaxzn5 == 0) && ($Vt0fct3sfdpe == $V0qo5aua3ryu)) {
				
				return ++$Vfhiq1lhsoja;
			} elseif (($V4llkmjaxzn5 == -1) && ($Vt0fct3sfdpe <= $V0qo5aua3ryu)) {






				$Vfhiq1lhsoja = array_search($Vfhiq1lhsoja,$Vrnlwn4uu3cb);

				
				if ($Vfhiq1lhsoja < 1){
					
					break;
				} else {
					
					return $Vrnlwn4uu3cb[$Vfhiq1lhsoja-1]+1;
				}
			} elseif (($V4llkmjaxzn5 == 1) && ($Vt0fct3sfdpe >= $V0qo5aua3ryu)) {






				$Vfhiq1lhsoja = array_search($Vfhiq1lhsoja,$Vrnlwn4uu3cb);

				
				if ($Vfhiq1lhsoja < 1){
					
					break;
				} else {
					
					return $Vrnlwn4uu3cb[$Vfhiq1lhsoja-1]+1;
				}
			}
		}

		
		return PHPExcel_Calculation_Functions::NA();
	}	


	
	public static function INDEX($V4baluiyezek,$VexbtekafkvlNum = 0,$Vn4q2p4mkwa0Num = 0) {

		if (($VexbtekafkvlNum < 0) || ($Vn4q2p4mkwa0Num < 0)) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		if (!is_array($V4baluiyezek)) {
			return PHPExcel_Calculation_Functions::REF();
		}

		$VexbtekafkvlKeys = array_keys($V4baluiyezek);
		$Vn4q2p4mkwa0Keys = @array_keys($V4baluiyezek[$VexbtekafkvlKeys[0]]);

		if ($Vn4q2p4mkwa0Num > count($Vn4q2p4mkwa0Keys)) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($Vn4q2p4mkwa0Num == 0) {
			if ($VexbtekafkvlNum == 0) {
				return $V4baluiyezek;
			}
			$VexbtekafkvlNum = $VexbtekafkvlKeys[--$VexbtekafkvlNum];
			$Vy5akrmaqqpc = array();
			foreach($V4baluiyezek as $Vwtcab3i14u3) {
				if (is_array($Vwtcab3i14u3)) {
					if (isset($Vwtcab3i14u3[$VexbtekafkvlNum])) {
						$Vy5akrmaqqpc[] = $Vwtcab3i14u3[$VexbtekafkvlNum];
					} else {
						return $V4baluiyezek[$VexbtekafkvlNum];
					}
				} else {
					return $V4baluiyezek[$VexbtekafkvlNum];
				}
			}
			return $Vy5akrmaqqpc;
		}
		$Vn4q2p4mkwa0Num = $Vn4q2p4mkwa0Keys[--$Vn4q2p4mkwa0Num];
		if ($VexbtekafkvlNum > count($VexbtekafkvlKeys)) {
			return PHPExcel_Calculation_Functions::VALUE();
		} elseif ($VexbtekafkvlNum == 0) {
			return $V4baluiyezek[$Vn4q2p4mkwa0Num];
		}
		$VexbtekafkvlNum = $VexbtekafkvlKeys[--$VexbtekafkvlNum];

		return $V4baluiyezek[$VexbtekafkvlNum][$Vn4q2p4mkwa0Num];
	}	


	
	public static function TRANSPOSE($Vv1t0l03554r) {
		$Vydrijdk2zwd = array();
		if (!is_array($Vv1t0l03554r)) { $Vv1t0l03554r = array(array($Vv1t0l03554r)); }

		$Vn4q2p4mkwa0 = 0;
		foreach($Vv1t0l03554r as $Vuazyvrryre5) {
			$Vexbtekafkvl = 0;
			foreach($Vuazyvrryre5 as $Vjfepifgo21k) {
				$Vydrijdk2zwd[$Vexbtekafkvl][$Vn4q2p4mkwa0] = $Vjfepifgo21k;
				++$Vexbtekafkvl;
			}
			++$Vn4q2p4mkwa0;
		}
		return $Vydrijdk2zwd;
	}	


	private static function _vlookupSort($Vi3y3l1uvwp3,$V4t3fwdd3eev) {
		$Vtbbah5lqvpo = array_keys($Vi3y3l1uvwp3);
		$Vtbbah5lqvpoirstColumn = array_shift($Vtbbah5lqvpo);
		if (strtolower($Vi3y3l1uvwp3[$Vtbbah5lqvpoirstColumn]) == strtolower($V4t3fwdd3eev[$Vtbbah5lqvpoirstColumn])) {
			return 0;
		}
		return (strtolower($Vi3y3l1uvwp3[$Vtbbah5lqvpoirstColumn]) < strtolower($V4t3fwdd3eev[$Vtbbah5lqvpoirstColumn])) ? -1 : 1;
	}	


	
	public static function VLOOKUP($V0qo5aua3ryu, $V5xgtesr24am, $Vfhiq1lhsojandex_number, $Vxfhvkqpr1xd=true) {
		$V0qo5aua3ryu	= PHPExcel_Calculation_Functions::flattenSingleValue($V0qo5aua3ryu);
		$Vfhiq1lhsojandex_number	= PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojandex_number);
		$Vxfhvkqpr1xd	= PHPExcel_Calculation_Functions::flattenSingleValue($Vxfhvkqpr1xd);

		
		if ($Vfhiq1lhsojandex_number < 1) {
			return PHPExcel_Calculation_Functions::VALUE();
		}

		
		if ((!is_array($V5xgtesr24am)) || (empty($V5xgtesr24am))) {
			return PHPExcel_Calculation_Functions::REF();
		} else {
			$Vtbbah5lqvpo = array_keys($V5xgtesr24am);
			$Vtbbah5lqvpoirstRow = array_pop($Vtbbah5lqvpo);
			if ((!is_array($V5xgtesr24am[$Vtbbah5lqvpoirstRow])) || ($Vfhiq1lhsojandex_number > count($V5xgtesr24am[$Vtbbah5lqvpoirstRow]))) {
				return PHPExcel_Calculation_Functions::REF();
			} else {
				$Vn4q2p4mkwa0Keys = array_keys($V5xgtesr24am[$Vtbbah5lqvpoirstRow]);
				$V4jx1vnkbkkv = $Vn4q2p4mkwa0Keys[--$Vfhiq1lhsojandex_number];
				$Vtbbah5lqvpoirstColumn = array_shift($Vn4q2p4mkwa0Keys);
			}
		}

		if (!$Vxfhvkqpr1xd) {
			uasort($V5xgtesr24am,array('self','_vlookupSort'));
		}

		$VexbtekafkvlNumber = $VexbtekafkvlValue = False;
		foreach($V5xgtesr24am as $VexbtekafkvlKey => $VexbtekafkvlData) {
			if ((is_numeric($V0qo5aua3ryu) && is_numeric($VexbtekafkvlData[$Vtbbah5lqvpoirstColumn]) && ($VexbtekafkvlData[$Vtbbah5lqvpoirstColumn] > $V0qo5aua3ryu)) ||
				(!is_numeric($V0qo5aua3ryu) && !is_numeric($VexbtekafkvlData[$Vtbbah5lqvpoirstColumn]) && (strtolower($VexbtekafkvlData[$Vtbbah5lqvpoirstColumn]) > strtolower($V0qo5aua3ryu)))) {
				break;
			}
			$VexbtekafkvlNumber = $VexbtekafkvlKey;
			$VexbtekafkvlValue = $VexbtekafkvlData[$Vtbbah5lqvpoirstColumn];
		}

		if ($VexbtekafkvlNumber !== false) {
			if ((!$Vxfhvkqpr1xd) && ($VexbtekafkvlValue != $V0qo5aua3ryu)) {
				
				return PHPExcel_Calculation_Functions::NA();
			} else {
				
				return $V5xgtesr24am[$VexbtekafkvlNumber][$V4jx1vnkbkkv];
			}
		}

		return PHPExcel_Calculation_Functions::NA();
	}	



    public static function HLOOKUP($V0qo5aua3ryu, $V5xgtesr24am, $Vfhiq1lhsojandex_number, $Vxfhvkqpr1xd=true) {
        $V0qo5aua3ryu   = PHPExcel_Calculation_Functions::flattenSingleValue($V0qo5aua3ryu);
        $Vfhiq1lhsojandex_number   = PHPExcel_Calculation_Functions::flattenSingleValue($Vfhiq1lhsojandex_number);
        $Vxfhvkqpr1xd    = PHPExcel_Calculation_Functions::flattenSingleValue($Vxfhvkqpr1xd);

        
        if ($Vfhiq1lhsojandex_number < 1) {
            return PHPExcel_Calculation_Functions::VALUE();
        }

        
        if ((!is_array($V5xgtesr24am)) || (empty($V5xgtesr24am))) {
            return PHPExcel_Calculation_Functions::REF();
        } else {
            $Vtbbah5lqvpo = array_keys($V5xgtesr24am);
            $Vtbbah5lqvpoirstRow = array_pop($Vtbbah5lqvpo);
            if ((!is_array($V5xgtesr24am[$Vtbbah5lqvpoirstRow])) || ($Vfhiq1lhsojandex_number > count($V5xgtesr24am[$Vtbbah5lqvpoirstRow]))) {
                return PHPExcel_Calculation_Functions::REF();
            } else {
                $Vn4q2p4mkwa0Keys = array_keys($V5xgtesr24am[$Vtbbah5lqvpoirstRow]);
                                $Vtbbah5lqvpoirstkey = $Vtbbah5lqvpo[0] - 1;
                $V4jx1vnkbkkv = $Vtbbah5lqvpoirstkey + $Vfhiq1lhsojandex_number;
                $Vtbbah5lqvpoirstColumn = array_shift($Vtbbah5lqvpo);
            }
        }

        if (!$Vxfhvkqpr1xd) {
            $Vtbbah5lqvpoirstRowH = asort($V5xgtesr24am[$Vtbbah5lqvpoirstColumn]);
        }

        $VexbtekafkvlNumber = $VexbtekafkvlValue = False;
        foreach($V5xgtesr24am[$Vtbbah5lqvpoirstColumn] as $VexbtekafkvlKey => $VexbtekafkvlData) {
			if ((is_numeric($V0qo5aua3ryu) && is_numeric($VexbtekafkvlData) && ($VexbtekafkvlData > $V0qo5aua3ryu)) ||
				(!is_numeric($V0qo5aua3ryu) && !is_numeric($VexbtekafkvlData) && (strtolower($VexbtekafkvlData) > strtolower($V0qo5aua3ryu)))) {
                break;
            }
            $VexbtekafkvlNumber = $VexbtekafkvlKey;
            $VexbtekafkvlValue = $VexbtekafkvlData;
        }

        if ($VexbtekafkvlNumber !== false) {
            if ((!$Vxfhvkqpr1xd) && ($VexbtekafkvlValue != $V0qo5aua3ryu)) {
                
                return PHPExcel_Calculation_Functions::NA();
            } else {
                
                return $V5xgtesr24am[$V4jx1vnkbkkv][$VexbtekafkvlNumber];
            }
        }

        return PHPExcel_Calculation_Functions::NA();
    }   


	
	public static function LOOKUP($V0qo5aua3ryu, $V42prvzjtlgd, $Vlfoukpcpguj=null) {
		$V0qo5aua3ryu	= PHPExcel_Calculation_Functions::flattenSingleValue($V0qo5aua3ryu);

		if (!is_array($V42prvzjtlgd)) {
			return PHPExcel_Calculation_Functions::NA();
		}
		$Vkkyc5ql1f3a = count($V42prvzjtlgd);
		$Vxlmgxcqqg2w = array_keys($V42prvzjtlgd);
		$Vxlmgxcqqg2w = array_shift($Vxlmgxcqqg2w);
		$Vxlmgxcqqg2wookupColumns = count($V42prvzjtlgd[$Vxlmgxcqqg2w]);
		if ((($Vkkyc5ql1f3a == 1) && ($Vxlmgxcqqg2wookupColumns > 1)) || (($Vkkyc5ql1f3a == 2) && ($Vxlmgxcqqg2wookupColumns != 2))) {
			$V42prvzjtlgd = self::TRANSPOSE($V42prvzjtlgd);
			$Vkkyc5ql1f3a = count($V42prvzjtlgd);
			$Vxlmgxcqqg2w = array_keys($V42prvzjtlgd);
			$Vxlmgxcqqg2wookupColumns = count($V42prvzjtlgd[array_shift($Vxlmgxcqqg2w)]);
		}

		if (is_null($Vlfoukpcpguj)) {
			$Vlfoukpcpguj = $V42prvzjtlgd;
		}
		$Vfjivt1mmltf = count($Vlfoukpcpguj);
		$Vxlmgxcqqg2w = array_keys($Vlfoukpcpguj);
		$Vxlmgxcqqg2w = array_shift($Vxlmgxcqqg2w);
		$V5h0q5nbia3t = count($Vlfoukpcpguj[$Vxlmgxcqqg2w]);
		if ((($Vfjivt1mmltf == 1) && ($V5h0q5nbia3t > 1)) || (($Vfjivt1mmltf == 2) && ($V5h0q5nbia3t != 2))) {
			$Vlfoukpcpguj = self::TRANSPOSE($Vlfoukpcpguj);
			$Vfjivt1mmltf = count($Vlfoukpcpguj);
			$Vws44nszhvgo = array_keys($Vlfoukpcpguj);
			$V5h0q5nbia3t = count($Vlfoukpcpguj[array_shift($Vws44nszhvgo)]);
		}

		if ($Vkkyc5ql1f3a == 2) {
			$Vlfoukpcpguj = array_pop($V42prvzjtlgd);
			$V42prvzjtlgd = array_shift($V42prvzjtlgd);
		}
		if ($Vxlmgxcqqg2wookupColumns != 2) {
			foreach($V42prvzjtlgd as &$Vp4xjtpabm0l) {
				if (is_array($Vp4xjtpabm0l)) {
					$V51lf1kcbto4 = array_keys($Vp4xjtpabm0l);
					$V51lf1kcbto4ey1 = $V51lf1kcbto4ey2 = array_shift($V51lf1kcbto4);
					$V51lf1kcbto4ey2++;
					$Vn11nrige4cm = $Vp4xjtpabm0l[$V51lf1kcbto4ey1];
				} else {
					$V51lf1kcbto4ey1 = 0;
					$V51lf1kcbto4ey2 = 1;
					$Vn11nrige4cm = $Vp4xjtpabm0l;
				}
				$Vypwke30ogpg = array_shift($Vlfoukpcpguj);
				if (is_array($Vypwke30ogpg)) {
					$Vypwke30ogpg = array_shift($Vypwke30ogpg);
				}
				$Vp4xjtpabm0l = array($V51lf1kcbto4ey1 => $Vn11nrige4cm, $V51lf1kcbto4ey2 => $Vypwke30ogpg);
			}
			unset($Vp4xjtpabm0l);
		}

		return self::VLOOKUP($V0qo5aua3ryu,$V42prvzjtlgd,2);
 	}	

}	
