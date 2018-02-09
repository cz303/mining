<?php




class PHPExcel_Worksheet_AutoFilter_Column_Rule
{
	const AUTOFILTER_RULETYPE_FILTER		= 'filter';
	const AUTOFILTER_RULETYPE_DATEGROUP		= 'dateGroupItem';
	const AUTOFILTER_RULETYPE_CUSTOMFILTER	= 'customFilter';
	const AUTOFILTER_RULETYPE_DYNAMICFILTER	= 'dynamicFilter';
	const AUTOFILTER_RULETYPE_TOPTENFILTER	= 'top10Filter';

	private static $Vl3n0atnt0wm = array(
		
		
		
		
		self::AUTOFILTER_RULETYPE_FILTER,
		self::AUTOFILTER_RULETYPE_DATEGROUP,
		self::AUTOFILTER_RULETYPE_CUSTOMFILTER,
		self::AUTOFILTER_RULETYPE_DYNAMICFILTER,
		self::AUTOFILTER_RULETYPE_TOPTENFILTER,
	);

	const AUTOFILTER_RULETYPE_DATEGROUP_YEAR	= 'year';
	const AUTOFILTER_RULETYPE_DATEGROUP_MONTH	= 'month';
	const AUTOFILTER_RULETYPE_DATEGROUP_DAY		= 'day';
	const AUTOFILTER_RULETYPE_DATEGROUP_HOUR	= 'hour';
	const AUTOFILTER_RULETYPE_DATEGROUP_MINUTE	= 'minute';
	const AUTOFILTER_RULETYPE_DATEGROUP_SECOND	= 'second';

	private static $Viguysmvg14j = array(
		self::AUTOFILTER_RULETYPE_DATEGROUP_YEAR,
		self::AUTOFILTER_RULETYPE_DATEGROUP_MONTH,
		self::AUTOFILTER_RULETYPE_DATEGROUP_DAY,
		self::AUTOFILTER_RULETYPE_DATEGROUP_HOUR,
		self::AUTOFILTER_RULETYPE_DATEGROUP_MINUTE,
		self::AUTOFILTER_RULETYPE_DATEGROUP_SECOND,
	);

	const AUTOFILTER_RULETYPE_DYNAMIC_YESTERDAY		= 'yesterday';
	const AUTOFILTER_RULETYPE_DYNAMIC_TODAY			= 'today';
	const AUTOFILTER_RULETYPE_DYNAMIC_TOMORROW		= 'tomorrow';
	const AUTOFILTER_RULETYPE_DYNAMIC_YEARTODATE	= 'yearToDate';
	const AUTOFILTER_RULETYPE_DYNAMIC_THISYEAR		= 'thisYear';
	const AUTOFILTER_RULETYPE_DYNAMIC_THISQUARTER	= 'thisQuarter';
	const AUTOFILTER_RULETYPE_DYNAMIC_THISMONTH		= 'thisMonth';
	const AUTOFILTER_RULETYPE_DYNAMIC_THISWEEK		= 'thisWeek';
	const AUTOFILTER_RULETYPE_DYNAMIC_LASTYEAR		= 'lastYear';
	const AUTOFILTER_RULETYPE_DYNAMIC_LASTQUARTER	= 'lastQuarter';
	const AUTOFILTER_RULETYPE_DYNAMIC_LASTMONTH		= 'lastMonth';
	const AUTOFILTER_RULETYPE_DYNAMIC_LASTWEEK		= 'lastWeek';
	const AUTOFILTER_RULETYPE_DYNAMIC_NEXTYEAR		= 'nextYear';
	const AUTOFILTER_RULETYPE_DYNAMIC_NEXTQUARTER	= 'nextQuarter';
	const AUTOFILTER_RULETYPE_DYNAMIC_NEXTMONTH		= 'nextMonth';
	const AUTOFILTER_RULETYPE_DYNAMIC_NEXTWEEK		= 'nextWeek';
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_1		= 'M1';
	const AUTOFILTER_RULETYPE_DYNAMIC_JANUARY		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_1;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_2		= 'M2';
	const AUTOFILTER_RULETYPE_DYNAMIC_FEBRUARY		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_2;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_3		= 'M3';
	const AUTOFILTER_RULETYPE_DYNAMIC_MARCH			= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_3;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_4		= 'M4';
	const AUTOFILTER_RULETYPE_DYNAMIC_APRIL			= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_4;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_5		= 'M5';
	const AUTOFILTER_RULETYPE_DYNAMIC_MAY			= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_5;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_6		= 'M6';
	const AUTOFILTER_RULETYPE_DYNAMIC_JUNE			= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_6;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_7		= 'M7';
	const AUTOFILTER_RULETYPE_DYNAMIC_JULY			= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_7;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_8		= 'M8';
	const AUTOFILTER_RULETYPE_DYNAMIC_AUGUST		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_8;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_9		= 'M9';
	const AUTOFILTER_RULETYPE_DYNAMIC_SEPTEMBER		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_9;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_10		= 'M10';
	const AUTOFILTER_RULETYPE_DYNAMIC_OCTOBER		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_10;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_11		= 'M11';
	const AUTOFILTER_RULETYPE_DYNAMIC_NOVEMBER		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_11;
	const AUTOFILTER_RULETYPE_DYNAMIC_MONTH_12		= 'M12';
	const AUTOFILTER_RULETYPE_DYNAMIC_DECEMBER		= self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_12;
	const AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_1		= 'Q1';
	const AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_2		= 'Q2';
	const AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_3		= 'Q3';
	const AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_4		= 'Q4';
	const AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE	= 'aboveAverage';
	const AUTOFILTER_RULETYPE_DYNAMIC_BELOWAVERAGE	= 'belowAverage';

	private static $Vffkcwkdzsju = array(
		self::AUTOFILTER_RULETYPE_DYNAMIC_YESTERDAY,
		self::AUTOFILTER_RULETYPE_DYNAMIC_TODAY,
		self::AUTOFILTER_RULETYPE_DYNAMIC_TOMORROW,
		self::AUTOFILTER_RULETYPE_DYNAMIC_YEARTODATE,
		self::AUTOFILTER_RULETYPE_DYNAMIC_THISYEAR,
		self::AUTOFILTER_RULETYPE_DYNAMIC_THISQUARTER,
		self::AUTOFILTER_RULETYPE_DYNAMIC_THISMONTH,
		self::AUTOFILTER_RULETYPE_DYNAMIC_THISWEEK,
		self::AUTOFILTER_RULETYPE_DYNAMIC_LASTYEAR,
		self::AUTOFILTER_RULETYPE_DYNAMIC_LASTQUARTER,
		self::AUTOFILTER_RULETYPE_DYNAMIC_LASTMONTH,
		self::AUTOFILTER_RULETYPE_DYNAMIC_LASTWEEK,
		self::AUTOFILTER_RULETYPE_DYNAMIC_NEXTYEAR,
		self::AUTOFILTER_RULETYPE_DYNAMIC_NEXTQUARTER,
		self::AUTOFILTER_RULETYPE_DYNAMIC_NEXTMONTH,
		self::AUTOFILTER_RULETYPE_DYNAMIC_NEXTWEEK,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_1,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_2,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_3,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_4,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_5,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_6,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_7,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_8,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_9,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_10,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_11,
		self::AUTOFILTER_RULETYPE_DYNAMIC_MONTH_12,
		self::AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_1,
		self::AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_2,
		self::AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_3,
		self::AUTOFILTER_RULETYPE_DYNAMIC_QUARTER_4,
		self::AUTOFILTER_RULETYPE_DYNAMIC_ABOVEAVERAGE,
		self::AUTOFILTER_RULETYPE_DYNAMIC_BELOWAVERAGE,
	);

	
	const AUTOFILTER_COLUMN_RULE_EQUAL				= 'equal';
	const AUTOFILTER_COLUMN_RULE_NOTEQUAL			= 'notEqual';
	const AUTOFILTER_COLUMN_RULE_GREATERTHAN		= 'greaterThan';
	const AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL	= 'greaterThanOrEqual';
	const AUTOFILTER_COLUMN_RULE_LESSTHAN			= 'lessThan';
	const AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL	= 'lessThanOrEqual';

	private static $Vvp4pchjucrr = array(
		self::AUTOFILTER_COLUMN_RULE_EQUAL,
		self::AUTOFILTER_COLUMN_RULE_NOTEQUAL,
		self::AUTOFILTER_COLUMN_RULE_GREATERTHAN,
		self::AUTOFILTER_COLUMN_RULE_GREATERTHANOREQUAL,
		self::AUTOFILTER_COLUMN_RULE_LESSTHAN,
		self::AUTOFILTER_COLUMN_RULE_LESSTHANOREQUAL,
	);

	const AUTOFILTER_COLUMN_RULE_TOPTEN_BY_VALUE	= 'byValue';
	const AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT		= 'byPercent';

	private static $Vmzeom1v4npa = array(
		self::AUTOFILTER_COLUMN_RULE_TOPTEN_BY_VALUE,
		self::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT,
	);

	const AUTOFILTER_COLUMN_RULE_TOPTEN_TOP			= 'top';
	const AUTOFILTER_COLUMN_RULE_TOPTEN_BOTTOM		= 'bottom';

	private static $Vfqm2l3eaoz5 = array(
		self::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP,
		self::AUTOFILTER_COLUMN_RULE_TOPTEN_BOTTOM,
	);


	

	




	




	





















	
	private $Vq20emrsdn3q = NULL;


	
	private $Vgo25f1hyaq0 = self::AUTOFILTER_RULETYPE_FILTER;


	
	private $Vcaslgtcnulz = '';

	
	private $V0v120vcwb1a = '';

	
	private $Vztpt4d3ga3e = '';


	
	public function __construct(PHPExcel_Worksheet_AutoFilter_Column $Vcvzwaqkjcsw = NULL)
	{
		$this->_parent = $Vcvzwaqkjcsw;
	}

	
	public function getRuleType() {
		return $this->_ruleType;
	}

	
	public function setRuleType($Viuzzekaoesg = self::AUTOFILTER_RULETYPE_FILTER) {
		if (!in_array($Viuzzekaoesg,self::$Vl3n0atnt0wm)) {
			throw new PHPExcel_Exception('Invalid rule type for column AutoFilter Rule.');
		}

		$this->_ruleType = $Viuzzekaoesg;

		return $this;
	}

	
	public function getValue() {
		return $this->_value;
	}

	
	public function setValue($Vqujkwol1zut = '') {
		if (is_array($Vqujkwol1zut)) {
			$Via00vmdum5s = -1;
			foreach($Vqujkwol1zut as $Vseq1edikdvg => $Vp4xjtpabm0l) {
				
				if (!in_array($Vseq1edikdvg,self::$Viguysmvg14j)) {
					
					unset($Vqujkwol1zut[$Vseq1edikdvg]);
				} else {
					
					$Via00vmdum5s = max($Via00vmdum5s,array_search($Vseq1edikdvg,self::$Viguysmvg14j));
				}
			}
			if (count($Vqujkwol1zut) == 0) {
				throw new PHPExcel_Exception('Invalid rule value for column AutoFilter Rule.');
			}
			
			$this->setGrouping(self::$Viguysmvg14j[$Via00vmdum5s]);
		}
		$this->_value = $Vqujkwol1zut;

		return $this;
	}

	
	public function getOperator() {
		return $this->_operator;
	}

	
	public function setOperator($Vf0cf20zvqmb = self::AUTOFILTER_COLUMN_RULE_EQUAL) {
		if (empty($Vf0cf20zvqmb))
			$Vf0cf20zvqmb = self::AUTOFILTER_COLUMN_RULE_EQUAL;
		if ((!in_array($Vf0cf20zvqmb,self::$Vvp4pchjucrr)) &&
			(!in_array($Vf0cf20zvqmb,self::$Vmzeom1v4npa))) {
			throw new PHPExcel_Exception('Invalid operator for column AutoFilter Rule.');
		}
		$this->_operator = $Vf0cf20zvqmb;

		return $this;
	}

	
	public function getGrouping() {
		return $this->_grouping;
	}

	
	public function setGrouping($Vjauvlzfh0ox = NULL) {
		if (($Vjauvlzfh0ox !== NULL) &&
			(!in_array($Vjauvlzfh0ox,self::$Viguysmvg14j)) &&
			(!in_array($Vjauvlzfh0ox,self::$Vffkcwkdzsju)) &&
			(!in_array($Vjauvlzfh0ox,self::$Vfqm2l3eaoz5))) {
			throw new PHPExcel_Exception('Invalid rule type for column AutoFilter Rule.');
		}

		$this->_grouping = $Vjauvlzfh0ox;

		return $this;
	}

	
	public function setRule($Vf0cf20zvqmb = self::AUTOFILTER_COLUMN_RULE_EQUAL, $Vqujkwol1zut = '', $Vjauvlzfh0ox = NULL) {
		$this->setOperator($Vf0cf20zvqmb);
		$this->setValue($Vqujkwol1zut);
		
		
		
		if ($Vjauvlzfh0ox !== NULL)
			$this->setGrouping($Vjauvlzfh0ox);

		return $this;
	}

	
	public function getParent() {
		return $this->_parent;
	}

	
	public function setParent(PHPExcel_Worksheet_AutoFilter_Column $Vcvzwaqkjcsw = NULL) {
		$this->_parent = $Vcvzwaqkjcsw;

		return $this;
	}

	
	public function __clone() {
		$Vtf0r1rll31w = get_object_vars($this);
		foreach ($Vtf0r1rll31w as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if (is_object($Vp4xjtpabm0l)) {
				if ($Vseq1edikdvg == '_parent') {
					
					$this->$Vseq1edikdvg = NULL;
				} else {
					$this->$Vseq1edikdvg = clone $Vp4xjtpabm0l;
				}
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}

}
