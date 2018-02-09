<?php




class PHPExcel_Worksheet_AutoFilter
{
	
	private $Vhokuctokfrp = NULL;


	
	private $Vwxmny2ejrmc = '';


	
	private $Vjbnm0l10wjx = array();


    
    public function __construct($Vem4atrpzxcs = '', PHPExcel_Worksheet $Vci1dgyyzjho = NULL)
    {
		$this->_range = $Vem4atrpzxcs;
		$this->_workSheet = $Vci1dgyyzjho;
    }

	
	public function getParent() {
		return $this->_workSheet;
	}

	
	public function setParent(PHPExcel_Worksheet $Vci1dgyyzjho = NULL) {
		$this->_workSheet = $Vci1dgyyzjho;

		return $this;
	}

	
	public function getRange() {
		return $this->_range;
	}

	
	public function setRange($Vem4atrpzxcs = '') {
		
		$V4343a0vl0rl = explode('!',strtoupper($Vem4atrpzxcs));
		if (count($V4343a0vl0rl) > 1) {
			list($V4jvbeui0jzb,$Vem4atrpzxcs) = $V4343a0vl0rl;
		}

		if (strpos($Vem4atrpzxcs,':') !== FALSE) {
			$this->_range = $Vem4atrpzxcs;
		} elseif(empty($Vem4atrpzxcs)) {
			$this->_range = '';
		} else {
			throw new PHPExcel_Exception('Autofilter must be set on a range of cells.');
		}

		if (empty($Vem4atrpzxcs)) {
			
			$this->_columns = array();
		} else {
			
			list($Vfo4g014tbnf,$Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($this->_range);
			foreach($this->_columns as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				$Vh0q2o3bfghw = PHPExcel_Cell::columnIndexFromString($Vseq1edikdvg);
				if (($Vfo4g014tbnf[0] > $Vh0q2o3bfghw) || ($Vaoibuxbewds[0] < $Vh0q2o3bfghw)) {
					unset($this->_columns[$Vseq1edikdvg]);
				}
			}
		}

		return $this;
	}

	
	public function getColumns() {
		return $this->_columns;
	}

	
	public function testColumnInRange($Vn4q2p4mkwa0) {
		if (empty($this->_range)) {
			throw new PHPExcel_Exception("No autofilter range is defined.");
		}

		$Vn4q2p4mkwa0Index = PHPExcel_Cell::columnIndexFromString($Vn4q2p4mkwa0);
		list($Vfo4g014tbnf,$Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($this->_range);
		if (($Vfo4g014tbnf[0] > $Vn4q2p4mkwa0Index) || ($Vaoibuxbewds[0] < $Vn4q2p4mkwa0Index)) {
			throw new PHPExcel_Exception("Column is outside of current autofilter range.");
		}

		return $Vn4q2p4mkwa0Index - $Vfo4g014tbnf[0];
	}

	
	public function getColumnOffset($Voblvrlehdwb) {
		return $this->testColumnInRange($Voblvrlehdwb);
	}

	
	public function getColumn($Voblvrlehdwb) {
		$this->testColumnInRange($Voblvrlehdwb);

		if (!isset($this->_columns[$Voblvrlehdwb])) {
			$this->_columns[$Voblvrlehdwb] = new PHPExcel_Worksheet_AutoFilter_Column($Voblvrlehdwb, $this);
		}

		return $this->_columns[$Voblvrlehdwb];
	}

	
	public function getColumnByOffset($VoblvrlehdwbOffset = 0) {
		list($Vfo4g014tbnf,$Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($this->_range);
		$Voblvrlehdwb = PHPExcel_Cell::stringFromColumnIndex($Vfo4g014tbnf[0] + $VoblvrlehdwbOffset - 1);

		return $this->getColumn($Voblvrlehdwb);
	}

	
	public function setColumn($Voblvrlehdwb)
	{
		if ((is_string($Voblvrlehdwb)) && (!empty($Voblvrlehdwb))) {
			$Vn4q2p4mkwa0 = $Voblvrlehdwb;
		} elseif(is_object($Voblvrlehdwb) && ($Voblvrlehdwb instanceof PHPExcel_Worksheet_AutoFilter_Column)) {
			$Vn4q2p4mkwa0 = $Voblvrlehdwb->getColumnIndex();
		} else {
			throw new PHPExcel_Exception("Column is not within the autofilter range.");
		}
		$this->testColumnInRange($Vn4q2p4mkwa0);

		if (is_string($Voblvrlehdwb)) {
			$this->_columns[$Voblvrlehdwb] = new PHPExcel_Worksheet_AutoFilter_Column($Voblvrlehdwb, $this);
		} elseif(is_object($Voblvrlehdwb) && ($Voblvrlehdwb instanceof PHPExcel_Worksheet_AutoFilter_Column)) {
			$Voblvrlehdwb->setParent($this);
			$this->_columns[$Vn4q2p4mkwa0] = $Voblvrlehdwb;
		}
		ksort($this->_columns);

		return $this;
	}

	
	public function clearColumn($Voblvrlehdwb) {
		$this->testColumnInRange($Voblvrlehdwb);

		if (isset($this->_columns[$Voblvrlehdwb])) {
			unset($this->_columns[$Voblvrlehdwb]);
		}

		return $this;
	}

	
	public function shiftColumn($Vquxhj00yiwj=NULL,$Vp30ws13bzzg=NULL) {
		$Vquxhj00yiwj = strtoupper($Vquxhj00yiwj);
		$Vp30ws13bzzg = strtoupper($Vp30ws13bzzg);

		if (($Vquxhj00yiwj !== NULL) && (isset($this->_columns[$Vquxhj00yiwj])) && ($Vp30ws13bzzg !== NULL)) {
			$this->_columns[$Vquxhj00yiwj]->setParent();
			$this->_columns[$Vquxhj00yiwj]->setColumnIndex($Vp30ws13bzzg);
			$this->_columns[$Vp30ws13bzzg] = $this->_columns[$Vquxhj00yiwj];
			$this->_columns[$Vp30ws13bzzg]->setParent($this);
			unset($this->_columns[$Vquxhj00yiwj]);

			ksort($this->_columns);
		}

		return $this;
	}


	
	private static function _filterTestInSimpleDataSet($V1qnzxgra0ng,$Vsgb1gxjflsh)
	{
		$Vsgb1gxjflshValues = $Vsgb1gxjflsh['filterValues'];
		$Vuxc5l3grl4q = $Vsgb1gxjflsh['blanks'];
		if (($V1qnzxgra0ng == '') || ($V1qnzxgra0ng === NULL)) {
			return $Vuxc5l3grl4q;
		}
		return in_array($V1qnzxgra0ng,$Vsgb1gxjflshValues);
	}

	
	private static function _filterTestInDateGroupSet($V1qnzxgra0ng,$Vsgb1gxjflsh)
	{
		$Vs3gyr42sl01 = $Vsgb1gxjflsh['filterValues'];
		$Vuxc5l3grl4q = $Vsgb1gxjflsh['blanks'];
		if (($V1qnzxgra0ng == '') || ($V1qnzxgra0ng === NULL)) {
			return $Vuxc5l3grl4q;
		}

		if (is_numeric($V1qnzxgra0ng)) {
			$Vtpwoe0nuvf4 = PHPExcel_Shared_Date::ExcelToPHP($V1qnzxgra0ng);
			if ($V1qnzxgra0ng < 1) {
				
				$Vdg11jvswwhz = date('His',$Vtpwoe0nuvf4);
				$Vs3gyr42sl01 = $Vs3gyr42sl01['time'];
			} elseif($V1qnzxgra0ng == floor($V1qnzxgra0ng)) {
				
				$Vdg11jvswwhz = date('Ymd',$Vtpwoe0nuvf4);
				$Vs3gyr42sl01 = $Vs3gyr42sl01['date'];
			} else {
				
				$Vdg11jvswwhz = date('YmdHis',$Vtpwoe0nuvf4);
				$Vs3gyr42sl01 = $Vs3gyr42sl01['dateTime'];
			}
			foreach($Vs3gyr42sl01 as $Vtpwoe0nuvf4) {
				
				if (substr($Vdg11jvswwhz,0,strlen($Vtpwoe0nuvf4)) == $Vtpwoe0nuvf4)
					return TRUE;
			}
		}

		return FALSE;
	}

	
	private static function _filterTestInCustomDataSet($V1qnzxgra0ng, $Vpyapm13sxvd)
	{
		$Vsgb1gxjflsh = $Vpyapm13sxvd['filterRules'];
		$Vs4mjkcbsell = $Vpyapm13sxvd['join'];
		$Veqkpruvdven = isset($Vpyapm13sxvd['customRuleForBlanks']) ? $Vpyapm13sxvd['customRuleForBlanks'] : FALSE;

		if (!$Veqkpruvdven) {
			
			if (($V1qnzxgra0ng == '') || ($V1qnzxgra0ng === NULL)) {
				return FALSE;
			}
		}
		$Vsxpfjmk3mca = ($Vs4mjkcbsell == PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND);
		foreach($Vsgb1gxjflsh as $Vz35i5ovw0xk) {
			if (is_numeric($Vz35i5ovw0xk['value'])) {
				
				switch ($Vz35i5ovw0xk['operator']) {
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng == $Vz35i5ovw0xk['value']);
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng != $Vz35i5ovw0xk['value']);
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_GREATERTHAN :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng > $Vz35i5ovw0xk['value']);
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng >= $Vz35i5ovw0xk['value']);
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng < $Vz35i5ovw0xk['value']);
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL :
						$Vrz0rq2pgagr	= ($V1qnzxgra0ng <= $Vz35i5ovw0xk['value']);
						break;
				}
			} elseif($Vz35i5ovw0xk['value'] == '') {
				switch ($Vz35i5ovw0xk['operator']) {
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL :
						$Vrz0rq2pgagr	= (($V1qnzxgra0ng == '') || ($V1qnzxgra0ng === NULL));
						break;
					case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_NOTEQUAL :
						$Vrz0rq2pgagr	= (($V1qnzxgra0ng != '') && ($V1qnzxgra0ng !== NULL));
						break;
					default :
						$Vrz0rq2pgagr	= TRUE;
						break;
				}
			} else {
				
				$Vrz0rq2pgagr	= preg_match('/^'.$Vz35i5ovw0xk['value'].'$/i',$V1qnzxgra0ng);
			}
			
			switch ($Vs4mjkcbsell) {
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_OR :
					$Vsxpfjmk3mca = $Vsxpfjmk3mca || $Vrz0rq2pgagr;
					
					
					if ($Vsxpfjmk3mca)
						return $Vsxpfjmk3mca;
					break;
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND :
					$Vsxpfjmk3mca = $Vsxpfjmk3mca && $Vrz0rq2pgagr;
					break;
			}
		}

		return $Vsxpfjmk3mca;
	}

	
	private static function _filterTestInPeriodDateSet($V1qnzxgra0ng, $V0nta0cxox11)
	{
		
		if (($V1qnzxgra0ng == '') || ($V1qnzxgra0ng === NULL)) {
			return FALSE;
		}

		if (is_numeric($V1qnzxgra0ng)) {
			$Vtpwoe0nuvf4 = date('m',PHPExcel_Shared_Date::ExcelToPHP($V1qnzxgra0ng));
			if (in_array($Vtpwoe0nuvf4,$V0nta0cxox11)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	
	private static $V5vbil2kzntd = array('\*', '\?', '~~', '~.*', '~.?');
	private static $Vsyo2pkmukjh   = array('.*', '.',  '~',  '\*',  '\?');


	
	private function _dynamicFilterDateRange($Vojcc1fmxikb, &$V1xcvo1aivrt)
	{
		$Vt1c5sle1d31 = PHPExcel_Calculation_Functions::getReturnDateType();
		PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
		$Vwk2nao2d33x = $V5c2jyk4vfy4 = NULL;

		$Vz35i5ovw0xkValues = array();
		$V0tuh55phnhp = PHPExcel_Calculation_DateTime::DATENOW();
		
		switch ($Vojcc1fmxikb) {
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTWEEK :
				$V0tuh55phnhp = strtotime('-7 days',$V0tuh55phnhp);
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTWEEK :
				$V0tuh55phnhp = strtotime('-7 days',$V0tuh55phnhp);
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTMONTH :
				$V0tuh55phnhp = strtotime('-1 month',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTMONTH :
				$V0tuh55phnhp = strtotime('+1 month',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTQUARTER :
				$V0tuh55phnhp = strtotime('-3 month',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTQUARTER :
				$V0tuh55phnhp = strtotime('+3 month',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTYEAR :
				$V0tuh55phnhp = strtotime('-1 year',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTYEAR :
				$V0tuh55phnhp = strtotime('+1 year',gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
		}

		switch ($Vojcc1fmxikb) {
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_TODAY :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_YESTERDAY :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_TOMORROW :
				$V5c2jyk4vfy4 = (int) PHPExcel_Shared_Date::PHPtoExcel(strtotime('+1 day',$V0tuh55phnhp));
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel($V0tuh55phnhp);
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_YEARTODATE :
				$V5c2jyk4vfy4 = (int) PHPExcel_Shared_Date::PHPtoExcel(strtotime('+1 day',$V0tuh55phnhp));
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel(gmmktime(0,0,0,1,1,date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISYEAR :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTYEAR :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTYEAR :
				$V5c2jyk4vfy4 = (int) PHPExcel_Shared_Date::PHPToExcel(gmmktime(0,0,0,31,12,date('Y',$V0tuh55phnhp)));
				++$V5c2jyk4vfy4;
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel(gmmktime(0,0,0,1,1,date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISQUARTER :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTQUARTER :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTQUARTER :
				$Vhkc111t34x5 = date('m',$V0tuh55phnhp);
				$V3bk5k3a0won = floor(--$Vhkc111t34x5 / 3);
				$V5c2jyk4vfy4 = (int) PHPExcel_Shared_Date::PHPtoExcel(gmmktime(0,0,0,date('t',$V0tuh55phnhp),(1+$V3bk5k3a0won)*3,date('Y',$V0tuh55phnhp)));
				++$V5c2jyk4vfy4;
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel(gmmktime(0,0,0,1,1+$V3bk5k3a0won*3,date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISMONTH :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTMONTH :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTMONTH :
				$V5c2jyk4vfy4 = (int) PHPExcel_Shared_Date::PHPtoExcel(gmmktime(0,0,0,date('t',$V0tuh55phnhp),date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				++$V5c2jyk4vfy4;
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel(gmmktime(0,0,0,1,date('m',$V0tuh55phnhp),date('Y',$V0tuh55phnhp)));
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_THISWEEK :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_LASTWEEK :
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_NEXTWEEK :
				$V01vdk2xaoep = date('w',$V0tuh55phnhp);
				$Vwk2nao2d33x = (int) PHPExcel_Shared_Date::PHPToExcel($V0tuh55phnhp) - $V01vdk2xaoep;
				$V5c2jyk4vfy4 = $Vwk2nao2d33x + 7;
				break;
		}

		switch ($Vojcc1fmxikb) {
			
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_YESTERDAY :
				--$V5c2jyk4vfy4;
				--$Vwk2nao2d33x;
				break;
			case PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_TOMORROW :
				++$V5c2jyk4vfy4;
				++$Vwk2nao2d33x;
				break;
		}

		
		$V1xcvo1aivrt->setAttributes(array(	'val' => $Vwk2nao2d33x,
											'maxVal' => $V5c2jyk4vfy4
										  )
									);

		
		$Vz35i5ovw0xkValues[] = array( 'operator' => PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL,
							   'value' => $Vwk2nao2d33x
							 );
		$Vz35i5ovw0xkValues[] = array( 'operator' => PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN,
							   'value' => $V5c2jyk4vfy4
							 );
		PHPExcel_Calculation_Functions::setReturnDateType($Vt1c5sle1d31);

		return array(
			'method' => '_filterTestInCustomDataSet',
			'arguments' => array( 'filterRules' => $Vz35i5ovw0xkValues,
								  'join' => PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND
								)
		);
	}

	private function _calculateTopTenValue($Vn4q2p4mkwa0ID,$V5jh0lozltx0,$Vx4v30gyjp2b,$Vz35i5ovw0xkType,$Vz35i5ovw0xkValue) {
		$Votjg2jvcmjx = $Vn4q2p4mkwa0ID.$V5jh0lozltx0.':'.$Vn4q2p4mkwa0ID.$Vx4v30gyjp2b;
		$Vqdzdfrfodv0 = PHPExcel_Calculation_Functions::flattenArray(
			$this->_workSheet->rangeToArray($Votjg2jvcmjx,NULL,TRUE,FALSE)
		);

		$Vqdzdfrfodv0 = array_filter($Vqdzdfrfodv0);
		if ($Vz35i5ovw0xkType == PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP) {
			rsort($Vqdzdfrfodv0);
		} else {
			sort($Vqdzdfrfodv0);
		}

		return array_pop(array_slice($Vqdzdfrfodv0,0,$Vz35i5ovw0xkValue));
	}

	
	public function showHideRows()
	{
		list($Vfo4g014tbnf,$Vaoibuxbewds) = PHPExcel_Cell::rangeBoundaries($this->_range);

		

		$this->_workSheet->getRowDimension($Vfo4g014tbnf[1])->setVisible(TRUE);

		$Vn4q2p4mkwa0FilterTests = array();
		foreach($this->_columns as $Vn4q2p4mkwa0ID => $V1xcvo1aivrt) {
			$Vz35i5ovw0xks = $V1xcvo1aivrt->getRules();
			switch ($V1xcvo1aivrt->getFilterType()) {
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER :
					$Vz35i5ovw0xkValues = array();
					
					foreach($Vz35i5ovw0xks as $Vz35i5ovw0xk) {
						$Vz35i5ovw0xkType = $Vz35i5ovw0xk->getRuleType();
						$Vz35i5ovw0xkValues[] = $Vz35i5ovw0xk->getValue();
					}
					
					$Vuxc5l3grl4q = FALSE;
					$Vz35i5ovw0xkDataSet = array_filter($Vz35i5ovw0xkValues);
					if (count($Vz35i5ovw0xkValues) != count($Vz35i5ovw0xkDataSet))
						$Vuxc5l3grl4q = TRUE;
					if ($Vz35i5ovw0xkType == PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_FILTER) {
						
						$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
							'method' => '_filterTestInSimpleDataSet',
							'arguments' => array( 'filterValues' => $Vz35i5ovw0xkDataSet,
												  'blanks' => $Vuxc5l3grl4q
												)
						);
					} else {
						
						$Vy2di2fo5jaz = array(
                            'date' => array(),
                            'time' => array(),
                            'dateTime' => array(),
                        );
						foreach($Vz35i5ovw0xkDataSet as $Vz35i5ovw0xkValue) {
							$Vaxg5pf4dhts = $Vmfehxqto3f3 = '';
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR] !== ''))
								$Vaxg5pf4dhts .= sprintf('%04d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_YEAR]);
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH] != ''))
								$Vaxg5pf4dhts .= sprintf('%02d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH]);
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY] !== ''))
								$Vaxg5pf4dhts .= sprintf('%02d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_DAY]);
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR] !== ''))
								$Vmfehxqto3f3 .= sprintf('%02d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_HOUR]);
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE] !== ''))
								$Vmfehxqto3f3 .= sprintf('%02d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE]);
							if ((isset($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND])) &&
								($Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND] !== ''))
								$Vmfehxqto3f3 .= sprintf('%02d',$Vz35i5ovw0xkValue[PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_SECOND]);
							$Vaxg5pf4dhtsTime = $Vaxg5pf4dhts . $Vmfehxqto3f3;
							$Vy2di2fo5jaz['date'][] = $Vaxg5pf4dhts;
							$Vy2di2fo5jaz['time'][] = $Vmfehxqto3f3;
							$Vy2di2fo5jaz['dateTime'][] = $Vaxg5pf4dhtsTime;
						}
						
						$Vy2di2fo5jaz['date'] = array_filter($Vy2di2fo5jaz['date']);
						$Vy2di2fo5jaz['time'] = array_filter($Vy2di2fo5jaz['time']);
						$Vy2di2fo5jaz['dateTime'] = array_filter($Vy2di2fo5jaz['dateTime']);
						$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
							'method' => '_filterTestInDateGroupSet',
							'arguments' => array( 'filterValues' => $Vy2di2fo5jaz,
												  'blanks' => $Vuxc5l3grl4q
												)
						);
					}
					break;
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_CUSTOMFILTER :
					$Veqkpruvdven = FALSE;
					$Vz35i5ovw0xkValues = array();
					
					foreach($Vz35i5ovw0xks as $Vz35i5ovw0xk) {
						$Vz35i5ovw0xkType = $Vz35i5ovw0xk->getRuleType();
						$Vz35i5ovw0xkValue = $Vz35i5ovw0xk->getValue();
						if (!is_numeric($Vz35i5ovw0xkValue)) {
							
							$Vz35i5ovw0xkValue = preg_quote($Vz35i5ovw0xkValue);
							$Vz35i5ovw0xkValue = str_replace(self::$V5vbil2kzntd,self::$Vsyo2pkmukjh,$Vz35i5ovw0xkValue);
							if (trim($Vz35i5ovw0xkValue) == '') {
								$Veqkpruvdven = TRUE;
								$Vz35i5ovw0xkValue = trim($Vz35i5ovw0xkValue);
							}
						}
						$Vz35i5ovw0xkValues[] = array( 'operator' => $Vz35i5ovw0xk->getOperator(),
											   'value' => $Vz35i5ovw0xkValue
											 );
					}
					$Vs4mjkcbsell = $V1xcvo1aivrt->getJoin();
					$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
						'method' => '_filterTestInCustomDataSet',
						'arguments' => array( 'filterRules' => $Vz35i5ovw0xkValues,
											  'join' => $Vs4mjkcbsell,
											  'customRuleForBlanks' => $Veqkpruvdven
											)
					);
					break;
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER :
					$Vz35i5ovw0xkValues = array();
					foreach($Vz35i5ovw0xks as $Vz35i5ovw0xk) {
						
						$Vojcc1fmxikb = $Vz35i5ovw0xk->getGrouping();
						if (($Vojcc1fmxikb == PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE) ||
							($Vojcc1fmxikb == PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_BELOWAVERAGE)) {
							
							
							$Va1bdupz4lfw = '=AVERAGE('.$Vn4q2p4mkwa0ID.($Vfo4g014tbnf[1]+1).':'.$Vn4q2p4mkwa0ID.$Vaoibuxbewds[1].')';
							$Vriretxflb2s = PHPExcel_Calculation::getInstance()->calculateFormula($Va1bdupz4lfw,NULL,$this->_workSheet->getCell('A1'));
							
							$Vxxvi5lwwffp = ($Vojcc1fmxikb === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE)
								? PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_GREATERTHAN
								: PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN;
							$Vz35i5ovw0xkValues[] = array( 'operator' => $Vxxvi5lwwffp,
												   'value' => $Vriretxflb2s
												 );
							$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
								'method' => '_filterTestInCustomDataSet',
								'arguments' => array( 'filterRules' => $Vz35i5ovw0xkValues,
													  'join' => PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_OR
													)
							);
						} else {
							
							if ($Vojcc1fmxikb{0} == 'M' || $Vojcc1fmxikb{0} == 'Q') {
								
								sscanf($Vojcc1fmxikb,'%[A-Z]%d', $V142h0tnkk0s, $Vpunax15hppx);
								if ($V142h0tnkk0s == 'M') {
									$Vz35i5ovw0xkValues = array($Vpunax15hppx);
								} else {
									--$Vpunax15hppx;
									$Vpunax15hppxEnd = (1+$Vpunax15hppx)*3;
									$Vpunax15hppxStart = 1+$Vpunax15hppx*3;
									$Vz35i5ovw0xkValues = range($Vpunax15hppxStart,periodEnd);
								}
								$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
									'method' => '_filterTestInPeriodDateSet',
									'arguments' => $Vz35i5ovw0xkValues
								);
								$V1xcvo1aivrt->setAttributes(array());
							} else {
								
								$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = $this->_dynamicFilterDateRange($Vojcc1fmxikb, $V1xcvo1aivrt);
								break;
							}
						}
					}
					break;
				case PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_TOPTENFILTER :
					$Vz35i5ovw0xkValues = array();
					$V2puitku1d2z = $Vaoibuxbewds[1] - $Vfo4g014tbnf[1];
					foreach($Vz35i5ovw0xks as $Vz35i5ovw0xk) {
						
						$Vyfxfs2qaw5p = $Vz35i5ovw0xk->getGrouping();
						$Vz35i5ovw0xkValue = $Vz35i5ovw0xk->getValue();
						$Vz35i5ovw0xkOperator = $Vz35i5ovw0xk->getOperator();
					}
					if ($Vz35i5ovw0xkOperator === PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT) {
						$Vz35i5ovw0xkValue = floor($Vz35i5ovw0xkValue * ($V2puitku1d2z / 100));
					}
					if ($Vz35i5ovw0xkValue < 1) $Vz35i5ovw0xkValue = 1;
					if ($Vz35i5ovw0xkValue > 500) $Vz35i5ovw0xkValue = 500;

					$V5c2jyk4vfy4 = $this->_calculateTopTenValue($Vn4q2p4mkwa0ID,$Vfo4g014tbnf[1]+1,$Vaoibuxbewds[1],$Vyfxfs2qaw5p,$Vz35i5ovw0xkValue);

					$Vxxvi5lwwffp = ($Vyfxfs2qaw5p == PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP)
						? PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL
						: PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL;
					$Vz35i5ovw0xkValues[] = array( 'operator' => $Vxxvi5lwwffp,
										   'value' => $V5c2jyk4vfy4
										 );
					$Vn4q2p4mkwa0FilterTests[$Vn4q2p4mkwa0ID] = array(
						'method' => '_filterTestInCustomDataSet',
						'arguments' => array( 'filterRules' => $Vz35i5ovw0xkValues,
											  'join' => PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_OR
											)
					);
					$V1xcvo1aivrt->setAttributes(
						array('maxVal' => $V5c2jyk4vfy4)
					);
					break;
			}
		}




		
		for ($Vexbtekafkvl = $Vfo4g014tbnf[1]+1; $Vexbtekafkvl <= $Vaoibuxbewds[1]; ++$Vexbtekafkvl) {

			$Vwbpa3giaw5f = TRUE;
			foreach($Vn4q2p4mkwa0FilterTests as $Vn4q2p4mkwa0ID => $Vn4q2p4mkwa0FilterTest) {

				$V1qnzxgra0ng = $this->_workSheet->getCell($Vn4q2p4mkwa0ID.$Vexbtekafkvl)->getCalculatedValue();

				
				$Vwbpa3giaw5f = $Vwbpa3giaw5f &&
					call_user_func_array(
						array('PHPExcel_Worksheet_AutoFilter',$Vn4q2p4mkwa0FilterTest['method']),
						array(
							$V1qnzxgra0ng,
							$Vn4q2p4mkwa0FilterTest['arguments']
						)
					);

				
				if (!$Vwbpa3giaw5f)
					break;
			}
			

			$this->_workSheet->getRowDimension($Vexbtekafkvl)->setVisible($Vwbpa3giaw5f);
		}

		return $this;
	}


	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				if ($Vseq1edikdvg == '_workSheet') {
					
					$this->{$Vseq1edikdvg} = NULL;
				} else {
					$this->{$Vseq1edikdvg} = clone $Vp4xjtpabm0l;
				}
			} elseif ((is_array($Vp4xjtpabm0l)) && ($Vseq1edikdvg == '_columns')) {
				
				$this->{$Vseq1edikdvg} = array();
				foreach ($Vp4xjtpabm0l as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
					$this->{$Vseq1edikdvg}[$V51lf1kcbto4] = clone $Vf1kwqxxhqpz;
					
					$this->{$Vseq1edikdvg}[$V51lf1kcbto4]->setParent($this);
				}
			} else {
				$this->{$Vseq1edikdvg} = $Vp4xjtpabm0l;
			}
		}
	}

	
	public function __toString() {
		return (string) $this->_range;
	}

}
