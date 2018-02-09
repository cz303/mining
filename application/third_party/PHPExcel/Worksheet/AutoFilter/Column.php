<?php




class PHPExcel_Worksheet_AutoFilter_Column
{
	const AUTOFILTER_FILTERTYPE_FILTER			= 'filters';
	const AUTOFILTER_FILTERTYPE_CUSTOMFILTER	= 'customFilters';
	
	
	const AUTOFILTER_FILTERTYPE_DYNAMICFILTER	= 'dynamicFilter';
	
	
	const AUTOFILTER_FILTERTYPE_TOPTENFILTER	= 'top10';

	
	private static $V2a2z4gbxjtk = array(
		
		
		
		
		self::AUTOFILTER_FILTERTYPE_FILTER,
		self::AUTOFILTER_FILTERTYPE_CUSTOMFILTER,
		self::AUTOFILTER_FILTERTYPE_DYNAMICFILTER,
		self::AUTOFILTER_FILTERTYPE_TOPTENFILTER,
	);

	
	const AUTOFILTER_COLUMN_JOIN_AND	= 'and';
	const AUTOFILTER_COLUMN_JOIN_OR		= 'or';

	
	private static $Vz32zqigmjxn = array(
		self::AUTOFILTER_COLUMN_JOIN_AND,
		self::AUTOFILTER_COLUMN_JOIN_OR,
	);

	
	private $Vq20emrsdn3q = NULL;


	
	private $Vs5giznb4xra = '';


	
	private $Vkrqxxpm5cnm = self::AUTOFILTER_FILTERTYPE_FILTER;


	
	private $Vesey4jshoj1 = self::AUTOFILTER_COLUMN_JOIN_OR;


	
	private $Vfkavgtnmoxu = array();


	
	private $Vjosbbhzubq2 = array();


	
	public function __construct($Voblvrlehdwb, PHPExcel_Worksheet_AutoFilter $Vcvzwaqkjcsw = NULL)
	{
		$this->_columnIndex = $Voblvrlehdwb;
		$this->_parent = $Vcvzwaqkjcsw;
	}

	
	public function getColumnIndex() {
		return $this->_columnIndex;
	}

	
	public function setColumnIndex($Voblvrlehdwb) {
		
		$Voblvrlehdwb = strtoupper($Voblvrlehdwb);
		if ($this->_parent !== NULL) {
			$this->_parent->testColumnInRange($Voblvrlehdwb);
		}

		$this->_columnIndex = $Voblvrlehdwb;

		return $this;
	}

	
	public function getParent() {
		return $this->_parent;
	}

	
	public function setParent(PHPExcel_Worksheet_AutoFilter $Vcvzwaqkjcsw = NULL) {
		$this->_parent = $Vcvzwaqkjcsw;

		return $this;
	}

	
	public function getFilterType() {
		return $this->_filterType;
	}

	
	public function setFilterType($V1cg0gkaprht = self::AUTOFILTER_FILTERTYPE_FILTER) {
		if (!in_array($V1cg0gkaprht,self::$V2a2z4gbxjtk)) {
			throw new PHPExcel_Exception('Invalid filter type for column AutoFilter.');
		}

		$this->_filterType = $V1cg0gkaprht;

		return $this;
	}

	
	public function getJoin() {
		return $this->_join;
	}

	
	public function setJoin($Vu2sjbpkpeyi = self::AUTOFILTER_COLUMN_JOIN_OR) {
		
		$Vu2sjbpkpeyi = strtolower($Vu2sjbpkpeyi);
		if (!in_array($Vu2sjbpkpeyi,self::$Vz32zqigmjxn)) {
			throw new PHPExcel_Exception('Invalid rule connection for column AutoFilter.');
		}

		$this->_join = $Vu2sjbpkpeyi;

		return $this;
	}

	
	public function setAttributes($V3ccxamttrcc = array()) {
		$this->_attributes = $V3ccxamttrcc;

		return $this;
	}

	
	public function setAttribute($Vsyidwvjoowz, $Vqujkwol1zut) {
		$this->_attributes[$Vsyidwvjoowz] = $Vqujkwol1zut;

		return $this;
	}

	
	public function getAttributes() {
		return $this->_attributes;
	}

	
	public function getAttribute($Vsyidwvjoowz) {
		if (isset($this->_attributes[$Vsyidwvjoowz]))
			return $this->_attributes[$Vsyidwvjoowz];
		return NULL;
	}

	
	public function getRules() {
		return $this->_ruleset;
	}

	
	public function getRule($V4z43kvcbihn) {
		if (!isset($this->_ruleset[$V4z43kvcbihn])) {
			$this->_ruleset[$V4z43kvcbihn] = new PHPExcel_Worksheet_AutoFilter_Column_Rule($this);
		}
		return $this->_ruleset[$V4z43kvcbihn];
	}

	
	public function createRule() {
		$this->_ruleset[] = new PHPExcel_Worksheet_AutoFilter_Column_Rule($this);

		return end($this->_ruleset);
	}

	
	public function addRule(PHPExcel_Worksheet_AutoFilter_Column_Rule $Vcxovcm5z4gz, $Vvpkcztbv03o=TRUE) {
		$Vcxovcm5z4gz->setParent($this);
		$this->_ruleset[] = $Vcxovcm5z4gz;

		return ($Vvpkcztbv03o) ? $Vcxovcm5z4gz : $this;
	}

	
	public function deleteRule($V4z43kvcbihn) {
		if (isset($this->_ruleset[$V4z43kvcbihn])) {
			unset($this->_ruleset[$V4z43kvcbihn]);
			
			if (count($this->_ruleset) <= 1) {
				$this->setJoin(self::AUTOFILTER_COLUMN_JOIN_OR);
			}
		}

		return $this;
	}

	
	public function clearRules() {
		$this->_ruleset = array();
		$this->setJoin(self::AUTOFILTER_COLUMN_JOIN_OR);

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
			} elseif ((is_array($Vp4xjtpabm0l)) && ($Vseq1edikdvg == '_ruleset')) {
				
				$this->$Vseq1edikdvg = array();
				foreach ($Vp4xjtpabm0l as $V51lf1kcbto4 => $Vf1kwqxxhqpz) {
					$this->$Vseq1edikdvg[$V51lf1kcbto4] = clone $Vf1kwqxxhqpz;
					
					$this->$Vseq1edikdvg[$V51lf1kcbto4]->setParent($this);
				}
			} else {
				$this->$Vseq1edikdvg = $Vp4xjtpabm0l;
			}
		}
	}

}
